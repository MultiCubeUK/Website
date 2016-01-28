<!DOCTYPE html>
<html>

<head>
    <title>MultiCubeUK | Worstenbroodje</title>
    <link rel="stylesheet" type="text/css" href="../Menu/MultiCubeUKMenuLayout.css">
    <link rel="stylesheet" type="text/css" href="../Footer/MultiCubeUKFooterLayout.css">
    <link rel="stylesheet" type="text/css" href="MultiCubeUKServersLayout.css">
    
</head>

<style>
</style>

<body>
<!-- Menu -->
<?php include("../Menu/MultiCubeUKMenu.php"); ?>

<!-- Big Logo -->
<div class="multicube-top"><img src="../root/BigLogo20161.png" alt="MulticubeUK Logo" /></div>

<!-- Flux Server Information -->
<div class="server">
    <div class="server-header">
        <h1><strong>Worstenbroodje </strong></h1>
    </div>
    <div class="server-info">
        <p><br /><span style="color: #ffffff;">Worstenbroodje is the most amazing modpack ever made in this universe. The moment you start playing this pack you're life will be over, because once you go worstenbroodje, you never go not worstenbroodje!</span></p>
    </div>
</div>

<!-- Flux Server Status -->
<?php
require('../api/MulticraftAPI.php');
$api = new MulticraftAPI('http://multicraft.multicube.co/api.php ', 'Sander', 'e35cbba78574b71346b5');
$a = serialize($api->getServerStatus(35));
if ($a[77] == "f") {
    $serverOutput = "<strong>Server</strong> Offline";
} else if ($a[111] != '"') {
    $playerCount = $a[110].$a[111]/30*100;
    $serverOutput = $a[110].$a[111]."/".$a[137].$a[138]." "."<strong>Players</strong> Online";
} else {
    $playerCount = $a[110]/30*100;
    $serverOutput = $a[110]."/".$a[136].$a[137]." "."<strong>Players</strong> Online";
}?>
<div class="server">
    <div class="server-header">
        <h1><strong>Server </strong>Status</h1>
    </div>
    <div class="server-status">
        <p class="status-title">MultiCubeUK - Worstenbroodje</p>
        <span style="font-size:15px;color:#337ab7;">hub.multicube.co/worstenbroodje.multicube.co</span>
        
        <div class="container">
            <br/>
            <div class="progress" style="width:83%;text-align:center;">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                    9999/9999 Players Online
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Flux Server Installation / Banned Item List -->
<div class="server">
    <div class="server-header">
        <h1><strong>Important </strong>Information</h1>
    </div>
    <div class="server-info">
        <p><span style="font-size: 24pt; color: #ffffff;">How to Install the Pack</span></p>
        <p><span style="color: #ffffff; font-size: 24pt;"></span></p>
        <p><span style="color: #ffffff;">Step 1: Go to the Store</span></p>
        <p><span style="color: #ffffff;">Step 2: Buy worstenbroodjes</span></p>
        <p><span style="color: #ffffff;">Step 3: Go to your base</span></p>
        <p><span style="color: #ffffff;">Step 4: Put worstenbroodjes in the furnace with some nice coal to cook it</span></p>
        <p><span style="color: #ffffff;">Step 5: After some time the worstenbroodjes will be hot, now they be yummy</span></p>
        <p><span style="color: #ffffff;">Step 6: Shift click the worstenbroodjes into your inventory</span></p>
        <p><span style="color: #ffffff;">Step 7: Eat the worstenbroodjes and repeat from step 1</span></p>
        <p><span style="color: #ffffff; font-size: 24pt;"></span></p>
        <p><span style="color: #ffffff; font-size: 24pt;">Banned Items</span></p>
        <p><span style="color: #ffffff;"></span></p>
        <p><spoiler><span style="color: #ffffff;">Friends to share your worstenbroodjes with, you should never share such a delicious meal!</span></spoiler></p>
    </div>
</div>

<!-- Footer -->
<?php include("../Footer/MultiCubeUKFooter.php"); ?>
</body>

</html>