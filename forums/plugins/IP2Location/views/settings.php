<?php if (!defined('APPLICATION')) exit();
echo $this->Form->Open();
echo $this->Form->Errors();
?>
<h1><?php echo T('Introduction'); ?></h1>
<div class="Info">
	<?php echo T('This plugin shows location of users by geolocate their IP address using IP2Location database.'); ?>
</div>

<h1><?php echo T('Lookup Mode') . ' ' . Anchor('Location Lookup', '/settings/ip2location/lookup', 'Popup SmallButton'); ?></h1>
<div class="Configuration">
	<ul>
		<li>
			<?php
			echo $this->Form->Radio('Plugins.IP2Location.LookupMode', T('Use BIN Database to lookup'), array('id' => 'IP2Location-Lookup-Mode-BIN', 'value' => 'bin'));

			echo ' &nbsp; ' . Anchor('Update Database', '/settings/ip2location/update', 'Popup SmallButton');
			?>
		</li>
		<li>
			<div class="Info">
			<?php
			if (!file_exists(C('Plugins.IP2Location.Database'))) {
				echo '<p class="Warning">' . T('No IP2Location BIN database is found.') . '</p>';
			}
			else{
				echo '<label>' . T('Database Date') . '</label>' . date('F, Y', filemtime(C('Plugins.IP2Location.Database')));
			}
			?>
			</div>
		</li>
		<li>&nbsp;</li>
		<li>
			<?php echo $this->Form->Radio('Plugins.IP2Location.LookupMode', T('Use Web Service to lookup'), array('id' => 'IP2Location-Lookup-Mode-WS', 'value' => 'ws')); ?>
		</li>
		<li>
			<div class="Info"><?php echo T('Inserts IP2Location <a href="http://www.ip2location.com/web-service" target="_blank">Web Service</a> API Key.'); ?></div>
		</li>
		<li>
			<label for="IP2Location-WS-API-Key"><?php echo T('IP2Location WS API Key'); ?></label>
			<?php echo $this->Form->TextBox('Plugins.IP2Location.APIKey', array('id' => 'IP2Location-WS-API-Key', 'size' => 80, 'class' => 'InputBox')); ?>
		</li>
	</ul>
</div>
<?php echo $this->Form->Close('Save Changes'); ?>