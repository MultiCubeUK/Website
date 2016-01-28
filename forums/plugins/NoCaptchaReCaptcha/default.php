<?php  if (!defined('APPLICATION')) exit();
$PluginInfo['NoCaptchaReCaptcha'] = array(
    'Name' => 'No Captcha ReCaptcha',
    'Description' => 'Use the new No Captcha ReCaptcha',
    'RequiredApplications' => array('Vanilla' => '2.1'),
    'Version' => '0.1.6b',
    'Author' => "Paul Thomas",
    'AuthorEmail' => 'dt01pqt_pt@yahoo.com',
    'SettingsUrl' => 'settings/registration',
    'MobileFriendly' => TRUE
);

class NoCaptchaReCaptcha extends Gdn_Plugin {
    
    public function SettingsController_Render_Before($Sender){
        if(strtolower($Sender->RequestMethod)=='registration'){
            $Sender->RegistrationMethods['NoCaptcha'] = "New users fill out a simple form with No Captcha ReCaptcha and are granted access immediately.";
            $Sender->AddDefinition('NoCaptchaSettingsTxt', FormatString(T('Please get an reCaptcha account <a href="{Url}">here</a> register the site, and save the Private/Private Key bellow. If you used the old system you may need new keys.'),array('Url'=>'https://www.google.com/recaptcha')));
            $Sender->AddJsFile('registration.js', 'plugins/NoCaptchaReCaptcha');
        }
    }
    
    public function EntryController_RegisterNoCaptcha_Create($Sender, $Args){
        $Sender->FireEvent("Register");
        $Sender->Form->SetModel($Sender->UserModel);

        // Define gender dropdown options
        $Sender->GenderOptions = array(
            'u' => T('Unspecified'),
            'm' => T('Male'),
            'f' => T('Female')
        );

        // Make sure that the hour offset for new users gets defined when their account is created
        $Sender->AddJsFile('entry.js');
         
        $Sender->Form->AddHidden('ClientHour', date('Y-m-d H:00')); // Use the server's current hour as a default
        $Sender->Form->AddHidden('Target', $Sender->Target());

        $Sender->SetData('NoEmail', UserModel::NoEmail());
        Gdn::UserModel()->AddPasswordStrength($Sender);
        if ($Sender->Form->IsPostBack() === TRUE) {
            // Add validation rules that are not enforced by the model
            $Sender->UserModel->DefineSchema();
            $Sender->UserModel->Validation->ApplyRule('Name', 'Username', $Sender->UsernameError);
            $Sender->UserModel->Validation->ApplyRule('TermsOfService', 'Required', T('You must agree to the terms of service.'));
            $Sender->UserModel->Validation->ApplyRule('Password', 'Required');
            $Sender->UserModel->Validation->ApplyRule('Password', 'Strength');
            $Sender->UserModel->Validation->ApplyRule('Password', 'Match');
            // $Sender->UserModel->Validation->ApplyRule('DateOfBirth', 'MinimumAge');
         
            $Sender->FireEvent('RegisterValidation');
         
            try {
                $Values = $Sender->Form->FormValues();
                unset($Values['Roles']);
                //hack to force Captcha registration
                Gdn::Config()->Set('Garden.Registration.Method','Captcha',TRUE, FALSE);
                $AuthUserID = $Sender->UserModel->Register($Values, array('CheckCaptcha'=>TRUE));
                Gdn::Config()->Set('Garden.Registration.Method', 'NoCaptcha',TRUE, FALSE);
                if ($AuthUserID == UserModel::REDIRECT_APPROVE) {
                    $Sender->Form->SetFormValue('Target', '/entry/registerthanks');
                    $Sender->_SetRedirect();
                    return;
                } elseif (!$AuthUserID) {
                    $Sender->Form->SetValidationResults($Sender->UserModel->ValidationResults());
                    if ($Sender->DeliveryType() != DELIVERY_TYPE_ALL)
                        $Sender->DeliveryType(DELIVERY_TYPE_MESSAGE);

                } else {
                    // The user has been created successfully, so sign in now.
                    if (!Gdn::Session()->IsValid())
                        Gdn::Session()->Start($AuthUserID, TRUE, (bool)$Sender->Form->GetFormValue('RememberMe'));

                    try {
                        $Sender->UserModel->SendWelcomeEmail($AuthUserID, '', 'Register');
                    } catch (Exception $Ex) {
                    }

                    $Sender->FireEvent('RegistrationSuccessful');

                    // ... and redirect them appropriately
                    $Route = $Sender->RedirectTo();
                    if ($Sender->DeliveryType() != DELIVERY_TYPE_ALL) {
                        $Sender->RedirectUrl = Url($Route);
                    } else {
                        if ($Route !== FALSE)
                            Redirect($Route);
                    }
                }
            } catch (Exception $Ex) {
                $Sender->Form->AddError($Ex);
            }
        }
        
        $Sender->RequestMethod = 'register';
        $Sender->Head->AddScript('https://www.google.com/recaptcha/api.js');
        $Sender->View = 'RegisterCaptcha';
        $Sender->Render();
    }
    
    public function Setup(){
        if(!function_exists('curl_init') || !function_exists('curl_setopt') || !function_exists('curl_exec')){
            throw new Exception(T('Curl required'));
        }
    }
    
    public function Base_BeforeLoadRoutes_Handler($Sender, &$Args){
        if(C('Garden.Registration.Method')=='NoCaptcha'){
            $QueryStr = http_build_query(Gdn::Request()->Get());
            $this->DynamicRoute($Args['Routes'],'^entry/register([/\?]{1}.*)?$','entry/registernocaptcha?'.$QueryStr,'Internal');
        }
    }
    
    public function DynamicRoute(&$Routes, $Route, $Destination, $Type = 'Internal', $Oneway = FALSE){
        $Key = str_replace('_','/',base64_encode($Route));
        $Routes[$Key] = array($Destination, $Type);
        if($Oneway && $Type == 'Internal'){
            if(strtolower(Gdn::Request()->Path()) && strpos(strtolower($Destination), strtolower(Gdn::Request()->Path()))===0){
                Gdn::Dispatcher()->Dispatch('Default404');
                exit;
            }
        }
    }
    
}

if(C('EnabledPlugins.NoCaptchaReCaptcha') && C('Garden.Registration.Method')=='NoCaptcha'){
    if(!function_exists('ValidateCaptcha')){
        function ValidateCaptcha($Value){
            $Response = ArrayValue('g-recaptcha-response', $_POST, '');
            
            if(!$Response)
                return FALSE;
            
            $Url = 'https://www.google.com/recaptcha/api/siteverify';
            $Data = array(
                'secret' => C('Garden.Registration.CaptchaPrivateKey'),
                'response' => $Response
            );

            $Handler = curl_init();
            curl_setopt($Handler, CURLOPT_URL, $Url);
            curl_setopt($Handler, CURLOPT_PORT, '443');
            curl_setopt($Handler, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($Handler, CURLOPT_HEADER, FALSE);
            curl_setopt($Handler, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded")); 
            curl_setopt($Handler, CURLOPT_USERAGENT, ArrayValue('HTTP_USER_AGENT', $_SERVER, 'NoCaptchaReCaptcha Vanilla'));
            curl_setopt($Handler, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($Handler, CURLOPT_POST, TRUE);
            curl_setopt($Handler, CURLOPT_POSTFIELDS, http_build_query($Data));
            
            $Response = curl_exec($Handler);
            
            if($Response){
                $Result = json_decode($Response);
                $ErrorCodes = GetValue('error_codes',$Result);
                if($Result && GetValue('success', $Result)){
                    return TRUE;
                }else if(!empty($ErrorCodes) && $ErrorCodes!=array('invalid-input-response')){
                    throw new Exception(FormatString(T('Could not get check if human! Error codes: {ErrorCodes}'), array('ErrorCodes'=>join(', ',$ErrorCodes))));
                }
            }else{
                throw new Exception(T('Could not get check if human!'));
            }

            return FALSE;
        }
        
    }

    if(!function_exists('recaptcha_get_html')){
        function recaptcha_get_html($CaptchaPublicKey, $Error = NULL, $UseSsl = FALSE){
            $Attributes =  C('Plugins.NoCaptchaReCaptcha.Attributes', array());
            $Attributes = array_merge($Attributes,array('class'=>'g-recaptcha', 'data-sitekey'=>$CaptchaPublicKey));
            $Plugin = Gdn::PluginManager()->GetPluginInstance('NoCaptchaReCaptcha');
            if($Plugin){
                $Plugin->EventArguments['Attributes'] = &$Attributes;
                $Plugin->FireEvent('BeforeDivReturn');
            }
            return'<div '.Attribute($Attributes).'></div>';
        }
    }
}
