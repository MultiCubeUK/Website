<?php if (!defined('APPLICATION')) exit();

// Define the plugin:
$PluginInfo['MCServer'] = array(
   'Name' => 'MCServer',
   'Description' => "Displays a Minecraft Server's Status",
   'Version' => '1.0.1',
   'Author' => "Sandon Joubert",
   'AuthorEmail' => 'clethrill@gmail.com',
   'AuthorUrl' => 'http://www.gamequarters.com',   
   'SettingsPermission' => FALSE
);

class MCServerPlugin extends Gdn_Plugin {

	public function PluginController_MCServer_Create(&$Sender) {
      $Sender->AddCssFile($this->GetResource('design/mcserver.css', FALSE, FALSE));
		$Sender->AddSideMenu('plugin/MCServer');
		$Sender->Form = new Gdn_Form();
		$Validation = new Gdn_Validation();
		$ConfigurationModel = new Gdn_ConfigurationModel($Validation);
		$ConfigurationModel->SetField(array(
			'MCServer.IP' => 'localhost', 
			'MCServer.Port' => '25565'
		));
		$Sender->Form->SetModel($ConfigurationModel);
			
		if ($Sender->Form->AuthenticatedPostBack() === FALSE) {    
			$Sender->Form->SetData($ConfigurationModel->Data);    
		} else {
			$ConfigurationModel->Validation->ApplyRule('MCServer.Port', 'Integer');
			//$Data = $Sender->Form->FormValues();
			$Saved = $Sender->Form->Save();
			if ($Saved) {
				$Sender->StatusMessage = Gdn::Translate("Your settings have been saved.");
			}
		}
		$MCServerModule = new mcservermodule($Sender);	  
		$Sender->Render($this->GetView('mcserver.php'));
	}

	public function Base_Render_Before(&$Sender) {
		include_once(PATH_PLUGINS.DS.'MCServer'.DS.'class.mcservermodule.php');
		$MCServerModule = new MCServerModule($Sender);
		$MCServerModule->GetData();	   
		$Sender->AddModule($MCServerModule);
	}

	public function Base_GetAppSettingsMenuItems_Handler(&$Sender) {
		$Menu = $Sender->EventArguments['SideMenu'];
		$Menu->AddLink('Add-ons', 'Minecraft Server', 'plugin/MCServer', 'Garden.Themes.Manage');
	}   

	public function Setup() { 
		SaveToConfig("MCServer.IP", "localhost");
		SaveToConfig("MCServer.Port", "25565");
	}
}
