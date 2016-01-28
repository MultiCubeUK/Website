<?php if (!defined('APPLICATION')) exit();

class mcservermodule extends Gdn_Module {

	protected $_MCServer;
	
	public function GetData() {
	}

	public function getMCServer(){
		return $this->_MCServer;
	}

	public function AssetTarget() {
		return 'Panel';
	}

	public function ToString() {
		$String = '';
		$Session = Gdn::Session();
		$mc_host=C('MCServer.IP'); 
		$mc_port=C('MCServer.Port'); 
		ob_start();
		?>
		<style type="text/css">
		.Server {
			text-align: center;
			color: black;
			font-weight: bold;
			width: 100%;
		}
		.Status {
			text-align: center;
			vertical-align: center;
			font-weight: bold;
			color: white;
			padding: 5px 60px;
			margin: 3px auto;
			display: block;
			border-radius: 3px;
			-webkit-border-radius: 3px;
		}
		.Online {
			background-color: green;
		}
		.Offline {
			background-color: red;
		}
		</style>
			<div class="Box MCServer">
			<h4><?php echo T("Server Status"); ?></h4>
			<ul>
				<li class="Server"><?php echo $mc_host.':'.$mc_port ?></li>
				<li>
					<?php 
						if (! $sock = @fsockopen($mc_host, $mc_port, $num, $error, 3)) 
							echo '<span class="Offline Status">Offline</span>'; 
						else{ 
							echo '<span class="Online Status">Online</span>'; 
							fclose($sock); 
						} 
					?>
				</li>
			</ul>		
		</div>
		<?php
		$String = ob_get_contents();
		@ob_end_clean();
		return $String;
	}
}