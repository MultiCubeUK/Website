<!DOCTYPE html>
<html>

<head>
    <title>Home | MultiCubeUK</title>
    <link rel="stylesheet" type="text/css" href="MultiCubeUKHomeLayout.css">
    <link rel="stylesheet" type="text/css" href="../Menu/MultiCubeUKMenuLayout.css">
    <link rel="stylesheet" type="text/css" href="../Footer/MultiCubeUKFooterLayout.css">
    <link rel="stylesheet" type="text/css" href="NewsLayout.css">
    <link href="http://fonts.googleapis.com/css?family=Quicksand:400,300,700" rel="stylesheet" type="text/css">
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
?>
<div class="multicube-top"><img src="BigLogo20161.png" alt="MulticubeUK Logo" /></div>
<div class="multicube-player-count"><span><?php echo $response['players']; ?><strong> Players</strong> Online</div>

<!-- News Module -->
<div class="newsdiv">
<?php include("News.php"); ?>
</div>

<!-- Footer -->
<?php include("../Footer/MultiCubeUKFooter.php"); ?>
</body>

</html>