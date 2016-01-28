<?php if (!defined('APPLICATION')) exit(); ?>
<h1><?php echo $this->Data('Title'); ?></h1>
<?php
echo $this->Form->Open();
echo $this->Form->Errors();
echo $this->Form->Label(T(''), 'Result');
?>
<div>
	Inserts an IP address to lookup its location
</div>
<ul>
	<li>
		<?php
		echo $this->Form->Label(T('IP Address'), 'IPAddress');
		echo $this->Form->TextBox('IPAddress');
		?>
	</li>
</ul>
<?php echo $this->Form->Close('Lookup');