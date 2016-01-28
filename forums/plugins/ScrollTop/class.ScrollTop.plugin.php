<?php if(!defined('APPLICATION')) exit();
/* 
 * 	This program is free software: you can redistribute it and/or modify
 * 	it under the terms of the GNU General Public License as published by
 * 	the Free Software Foundation, either version 3 of the License, or
 * 	(at your option) any later version.
 *
 * 	This program is distributed in the hope that it will be useful,
 * 	but WITHOUT ANY WARRANTY; without even the implied warranty of
 * 	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * 	GNU General Public License for more details.
 *
 * 	You should have received a copy of the GNU General Public License
 * 	along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
$PluginInfo['ScrollTop'] = array(
    'Name' => 'Scroll to Top',
    'Description' => 'Provides an element to scroll to the top of the page. Fades element out when not needed.',
    'Version' => '1.0',
    'RequiredApplications' => array('Vanilla' => '2.0.0'),
    'Author' => 'steam',
    'AuthorEmail' => 'grandebuzon@gmail.com',
    'AuthorUrl' => 'http://www.planamigo.org',
    'License' => 'GPLv3'
);

class ScrollTopPlugin extends Gdn_Plugin {

	  // runs once every page load
	  public function __construct() {
		parent::__construct();
	  }
	  
	  public function Base_Render_Before($Sender) {
		// Do not show scroll on the dashboard or on embedded forums
		if($Sender->MasterView != 'admin' && !C('EnabledPlugins.embedvanilla', FALSE)) {
		  // add style
		  $Sender->AddCSSFile($this->GetResource('design/scrolltop.css', FALSE, FALSE));
		}
	  }

	 public function Base_AfterBody_Handler($Sender) {
		// echo div with a little bit of javascript
		echo '<div id="scroller" class="btop" style="display: none;"><span class="btop-but">'.T('top').'</span></div>
		<script type="text/javascript">jQuery(document).ready(function(){
		$(window).scroll(function () {if ($(this).scrollTop() > 0) {$(\'#scroller\').fadeIn();} else {$(\'#scroller\').fadeOut();}});
		$(\'#scroller\').click(function () {$(\'body,html\').animate({scrollTop: 0}, 400); return false;});
		});</script>';
	 }
}
