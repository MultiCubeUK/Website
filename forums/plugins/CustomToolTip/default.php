<?php if (!defined('APPLICATION'))  exit();


// Define the plugin:
$PluginInfo['CustomToolTip'] = array(
    'Name' => 'CustomToolTip',
    'Description' => 'This plugin allows you to style the tooltip to match your theme using jquery tooltip ui. Simply edit the css file for style and the tooltip.js to add more functions',
    'Version' => '1.2',
    'Author' => "VrijVlinder",
    'License'=>"GNU GPL2",
);

class CustomToolTipPlugin extends Gdn_Plugin {

   

       public function Base_Render_Before($Sender){
       
    
       $Controller = $Sender->ControllerName;
       $ShowOnController = array(
          'discussioncontroller',
          'categoriescontroller',
          'discussionscontroller',
          'profilecontroller',
          'activitycontroller',
          'plugincontroller',
          'postcontroller',
          'entrycontroller'
        );
   
   if (!InArrayI($Controller, $ShowOnController)) return; 
    
       $Sender->AddCssFile('tooltip.css', 'plugins/CustomToolTip');
       $Sender->AddJsFile('jquery-ui.js', 'plugins/CustomToolTip/js');

   $ToolTipJQuerySource = 

   '<script type="text/javascript">
   jQuery(document).ready(function($) {
    $( document ).tooltip({
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });
  });</script>';

    $Sender->Head->AddString($ToolTipJQuerySource);
  }

    public function Setup() {
        
    }


}

