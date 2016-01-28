<?php if (!defined('APPLICATION')) exit(); ?>
<h1><?php echo $this->Data('Title'); ?></h1>
<?php
echo $this->Form->Open();
echo $this->Form->Errors();
?>
<div>
	Inserts your IP2Location account information below.
</div>
<ul>
	<li>
		<?php
		echo $this->Form->Label(T('Email Address'), 'EmailAddress');
		echo $this->Form->TextBox('EmailAddress');
		?>
	</li>
	<li>
		<?php
		echo $this->Form->Label(T('Password'), 'Password');
		echo $this->Form->Input('Password', 'password');
		?>
	</li>
	<li>
		<?php
		echo $this->Form->Label(T('Database'), 'Database');
		echo $this->Form->DropDown('Database', array('DB1LITEBIN' => 'DB1LITEBIN', 'DB3LITEBIN' => 'DB3LITEBIN', 'DB1BIN' => 'DB1BIN', 'DB3BIN' => 'DB3BIN'), array('TextField' => 'Code', 'ValueField' => 'Database'));
		?>
	</li>
</ul>
<?php echo $this->Form->Close('Update Now');