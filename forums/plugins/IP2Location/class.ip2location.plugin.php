<?php if (!defined('APPLICATION')) exit();

defined( 'DS' ) or define( 'DS', DIRECTORY_SEPARATOR );
define( 'IP2LOCATION_ROOT', dirname( __FILE__ ) . DS );

$PluginInfo['IP2Location'] = array(
	'Name' => 'IP2Location',
    'Description' => 'Display the location of user by IP address.',
    'Version' => '1.0.0',
    'Author' => '<a href="www.ip2location.com" target="_blank">IP2Location</a>',
    'MobileFriendly' => TRUE,
	'RequiredApplications'	=> array('Vanilla' => '>=2.1'),
    'SettingsUrl' => '/dashboard/settings/ip2location',
);

class IP2LocationPlugin extends Gdn_Plugin {

	public function Setup() {
		// Look for IP2Location BIN database
		$Files = scandir(IP2LOCATION_ROOT . 'extras' . DS);

		foreach($Files as $File){
			if(strtoupper(substr($File, -4)) == '.BIN') {
				SaveToConfig('Plugins.IP2Location.Database', IP2LOCATION_ROOT . 'extras' . DS . $File);
				break;
			}
		}
        SaveToConfig('Plugins.IP2Location.LookupMode', 'bin');
    }

	public function SettingsController_IP2Location_Create($Sender, $Args) {
		$Sender->Permission('Garden.Settings.Manage');
		return $this->Dispatch($Sender);
	}

	public function Controller_Index($Sender) {
		$Sender->Permission('Garden.Settings.Manage');
        $Sender->Form = new Gdn_Form();
        $Validation = new Gdn_Validation();
        $ConfigurationModel = new Gdn_ConfigurationModel($Validation);

		$ConfigurationModel->SetField(array(
			'Plugins.IP2Location.Database',
			'Plugins.IP2Location.LookupMode',
			'Plugins.IP2Location.APIKey',
        ));

        $Sender->Form->SetModel($ConfigurationModel);
		$Sender->AddSideMenu('settings/IP2Location');

		$Validation->ApplyRule('Plugins.IP2Location.LookupMode', 'Required', T('You must select lookup mode.'));

        if ($Sender->Form->AuthenticatedPostBack() === FALSE) {
            $Sender->Form->SetData($ConfigurationModel->Data);
        }
		else {
            $Data = $Sender->Form->FormValues();

			if ($Data['Plugins.IP2Location.LookupMode'] == 'ws') {
				$Validation->ApplyRule('Plugins.IP2Location.APIKey', 'Required', T('Please enter API Key.'));
			}

            if ($Sender->Form->Save() !== FALSE)
                $Sender->StatusMessage = T('Your settings have been saved.');
        }
		$Sender->Render('settings', '', 'plugins/IP2Location');
	}

	public function Controller_Update($Sender) {
		$Sender->AddSideMenu('settings/ip2location');
		$Sender->Title('Update Database');

		if ($Sender->Form->AuthenticatedPostBack()) {
			$EmailAddress = $Sender->Form->GetFormValue('EmailAddress');
			$Password = $Sender->Form->GetFormValue('Password');
			$Database = $Sender->Form->GetFormValue('Database');

			if (!filter_var($EmailAddress, FILTER_VALIDATE_EMAIL))
				$Sender->Form->AddError(T('You must enter a valid email address.'));
			elseif (!is_writable(IP2LOCATION_ROOT . 'extras' . DS)) {
				$Sender->Form->AddError(T('Do not have write permission to "' . IP2LOCATION_ROOT . 'extras' . DS . '".'));
			}
			else {
				$this->Download($EmailAddress, $Password, $Database);

				if (!file_exists(IP2LOCATION_ROOT . 'extras' . DS . 'database.zip')) {
					$Sender->Form->AddError(T('Download process failed.'));
				}
				elseif(filesize(IP2LOCATION_ROOT . 'extras' . DS . 'database.zip') < 5120){
					$Content = file_get_contents(IP2LOCATION_ROOT . 'extras' . DS . 'database.zip');

					if (preg_match('/NO PERMISSION/', $Content)) {
						$Sender->Form->AddError(T('You do not have permission to download this database.'));
					}
					else{
						$Sender->Form->AddError(T('Your license is already expired.'));
					}
				}
				else{
					// Decompress the package.
					$Zip = zip_open(IP2LOCATION_ROOT . 'extras' . DS . 'database.zip');

					if (!is_resource($Zip)) {
						$Sender->Form->AddError(T('Downloaded file is corrupted.'));
					}
					else{
						while($Entries = zip_read($Zip)) {
							// Extract the BIN file only.
							$FileName = zip_entry_name($Entries);

							if (substr($FileName, -4) != '.BIN') {
								continue;
							}

							// Remove existing BIN files before extrac the latest BIN file.
							$Files = scandir(IP2LOCATION_ROOT . 'extras' . DS);

							foreach($Files as $File){
								if (strtoupper(substr($File, -4)) == '.BIN'){
									@unlink(IP2LOCATION_ROOT . 'extras' . DS . $File);
								}
							}

							$Handle = fopen(IP2LOCATION_ROOT . 'extras' . DS . $FileName, 'w+');
							fwrite($Handle, zip_entry_read($Entries, zip_entry_filesize($Entries)));
							fclose($Handle);

							if (!file_exists(IP2LOCATION_ROOT . 'extras' . DS . $FileName)) {
								$Sender->Form->AddError(T('Downloaded file is corrupted.'));
							}
							else{
								SaveToConfig('Plugins.IP2Location.Database', IP2LOCATION_ROOT . 'extras' . DS . $FileName);
								$Sender->InformMessage(T('IP2Location database has been updated. Please refresh this page.'));
							}

							break;
						}
					}

					zip_close($Zip);
					@unlink(IP2LOCATION_ROOT . 'extras' . DS . 'database.zip');
				}
			}
		}
		$Sender->Render('update', '', 'plugins/IP2Location');
   }

   public function Controller_Lookup($Sender) {
		$Sender->AddSideMenu('settings/ip2location');
		$Sender->Title('Location Lookup');

		if ($Sender->Form->AuthenticatedPostBack()) {
			$IPAddress = $Sender->Form->GetFormValue('IPAddress');

			if (!filter_var($IPAddress, FILTER_VALIDATE_IP))
				$Sender->Form->AddError(T('You must enter a valid IP address.'));

			else {
				$Data = $this->GetLocation($IPAddress);

				if (isset($Data['countryCode']) && $Data['countryCode'] != '-') {
					$Location = array($Data['cityName'], $Data['regionName'], $Data['countryName']);
					$Location = implode(', ', array_unique(array_diff($Location, array(''))));

					$Sender->Form->AddError(T('<div style="background:#00cc00;padding:5px 10px;margin:-8px -14px">IP "' . $IPAddress . '" is belongs to <strong>' . $Location . '</strong>.</div>'));
				}
				else {
					$Sender->Form->AddError(T('No records found.'));
				}
			}
		}
		$Sender->Render('lookup', '', 'plugins/IP2Location');
   }

   public function UserInfoModule_OnBasicInfo_Handler($Sender) {
		$Data = $this->GetLocation($Sender->User->LastIPAddress);

		if (isset($Data['countryCode']) && $Data['countryCode'] != '-') {
			$Location = array($Data['cityName'], $Data['regionName'], $Data['countryName']);
			$Location = implode(', ', array_unique(array_diff($Location, array(''))));

			echo '
			<dt>Location</dt>
			<dd>
				<img src="' . Url('plugins/IP2Location/design/flags/') . strtolower($Data['countryCode']) . '.png" align="absMiddle" /> ' . $Location . '
			</dd>';
		}
	}

	public function UserController_UserCell_Handler($Sender) {
		if (!isset($Sender->EventArguments['User'])) {
			echo '<th>Location</th>';
		}
		else{
			$Content = '<td>-</td>';
			$Data = $this->GetLocation($Sender->EventArguments['User']->LastIPAddress);

			if (isset($Data['countryCode']) && strlen($Data['countryCode']) == 2) {
				$Location = array($Data['cityName'], $Data['regionName'], $Data['countryName']);
				$Location = implode(', ', array_unique(array_diff($Location, array(''))));

				$Content = '
				<td>
					<div title="' . $Location . '"><img src="' . Url('plugins/IP2Location/design/flags/') . strtolower($Data['countryCode']) . '.png" align="absMiddle" /> ' . $Data['countryName'] . '</div>
				</td>';
			}

			echo $Content;
		}
	}

	private function GetLocation($IP) {
		switch (C('Plugins.IP2Location.LookupMode')) {
			case 'bin':
				require_once(IP2LOCATION_ROOT . 'extras' . DS . 'ip2location.class.php');

				$IP2Location = new IP2Location(C('Plugins.IP2Location.Database'));

				// Get geolocation by IP address.
				$Results = $IP2Location->lookup($IP);

				return array(
					'countryCode' => $Results->countryCode,
					'countryName' => $Results->countryName,
					'regionName' => (!preg_match('/unavailable/', $Results->regionName) ? $Results->regionName : ''),
					'cityName' => (!preg_match('/unavailable/', $Results->cityName) ? $Results->cityName : ''),
				);
			break;

			case 'ws':
				$Response = $this->Http('http://api.ip2location.com/?' . http_build_query(array(
					'key' => C( 'Plugins.IP2Location.APIKey' ),
					'ip' => $IP,
					'package' => 'WS5',
					'format' => 'json',
				)));

				if (is_null( $json = json_decode($Response)) === FALSE) {
					return array(
						'countryCode' => $json->country_code,
						'countryName' => $json->country_name,
						'regionName' => $json->region_name,
						'cityName' => $json->city_name,
					);
				}
			break;
		}
	}

	private function Http($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 3);
		$Response = curl_exec($ch);
		curl_close($ch);

		return $Response;
	}

	private function Download($Email, $Password, $Database) {
		$fp = fopen(IP2LOCATION_ROOT . 'extras' . DS . 'database.zip', 'w');

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, 'http://www.ip2location.com/download?' . http_build_query(array(
			'login' => $Email,
			'password' => $Password,
			'productcode' => $Database,
		)));

		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_TIMEOUT, 180);
		curl_exec($ch);
		curl_close($ch);
	}
}
?>
