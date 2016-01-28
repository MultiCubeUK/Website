<?php if (!defined('APPLICATION')) exit();
echo $this->Form->Open();
echo $this->Form->Errors();
?>
<h1><?php echo T("MCServer"); ?></h1>
      <div class="Info"><?php echo T('What is the Minecraft Server\'s IP address and Port?'); ?></div>
      <table class="AltRows">
           <tr>
              <th><?php
                 echo $this->Form->TextBox('MCServer.IP');
                 ?></th>
              <td class="Alt"><?php echo T("The IP / Domain Name of the Minecraft Server"); ?></td>
           </tr>
           <tr>
              <th><?php
                  echo $this->Form->TextBox('MCServer.Port');
              ?></th>
                  <td class="Alt"><?php echo T("The port on which the Minecraft Server runs on"); ?></td>
              </tr>
      </table>

<?php echo $this->Form->Close('Save');
