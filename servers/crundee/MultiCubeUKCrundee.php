<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../../Menu/MultiCubeUKMenuLayout.css">
    <link rel="stylesheet" type="text/css" href="../../Footer/MultiCubeUKFooterLayout.css">
    <link rel="stylesheet" type="text/css" href="MultiCubeUKCrundeeLayout.css">
    
</head>

<style>
</style>

<body>
<!-- Menu -->
<?php include("../../Menu/MultiCubeUKMenu.php"); ?>

<!-- Crundee Player Count -->
<?php include_once '../../root/status.class.php'; 
$status = new MinecraftServerStatus(); 
$response = $status->getStatus('151.80.33.216', 25565, '1.7.10'); 
$playerFile = fopen("PlayerCount.php", "w");
fwrite($playerFile, $response['players'] . '/' . $response['maxplayers']);
fclose($playerFile);
?>
<div class="multicube-top"><img src="../../root/BigLogo20161.png" alt="MulticubeUK Logo" /></div>
<div class="multicube-player-count"><span><?php include("PlayerCount.php"); ?><strong> Players</strong> Online</div>


<?php
require('MulticraftAPI.php');
$api = new MulticraftAPI('http://multicraft.multicube.co/api.php ', 'Sander', 'e35cbba78574b71346b5');
print_r($api->getServerStatus(22));
?>

<!-- Footer -->
<?php include("../../Footer/MultiCubeUKFooter.php"); ?>
</body>

</html>