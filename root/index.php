<!DOCTYPE html>
<html>

<head>
    <title>Home | MultiCubeUK</title>
    <link rel="stylesheet" type="text/css" href="MultiCubeUKHomeLayout.css">
    <link rel="stylesheet" type="text/css" href="../Menu/MultiCubeUKMenuLayout.css">
    <link rel="stylesheet" type="text/css" href="../Footer/MultiCubeUKFooterLayout.css">
</head>

<style>
</style>

<body>
<!-- Menu -->
<?php include("../Menu/MultiCubeUKMenu.php"); ?>

<!-- Network Wide Player Count -->
<?php include_once 'status.class.php'; 
$status = new MinecraftServerStatus(); 
$response = $status->getStatus('151.80.33.216', 25565, '1.7.10'); 
$playerFile = fopen("PlayerCount.php", "w");
fwrite($playerFile, $response['players']);
fclose($playerFile);
?>
<div class="multicube-top"><img src="BigLogo20161.png" alt="MulticubeUK Logo" /></div>
<div class="multicube-player-count"><span><?php include("PlayerCount.php"); ?><strong> Players</strong> Online</div>

<!-- Footer -->
<?php include("../Footer/MultiCubeUKFooter.php"); ?>
</body>

</html>