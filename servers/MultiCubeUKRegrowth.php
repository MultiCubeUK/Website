<!DOCTYPE html>
<html>

<head>
    <title>MultiCubeUK | Regrowth</title>
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
        <h1><strong>FTB </strong>Regrowth</h1>
    </div>
    <div class="server-info">
        <p><br /><span style="color: #ffffff;">FTB Regrowth is a HQM driven pack where you find yourself in a desolate wasteland, lacking in natural growth and sparse of materials except for a few boulders and dead, charred trees. You'll quickly discover the depths of the earth to be barren as well, devoid of any form of ore. You will need to find a way to start restoring the presence of nature back to the world, and in doing so find yourself a way to start producing the materials you'll need to produce a thriving industry.

        The pack is heavily adjusted to be a more cohesive experience through the usage of minetweaker and modtweaker, with just over 1000 lines of scripts at the time of writing this.
        A large part of the idea behind the pack came from a couple of "what if?"s. Specifically, the pack was designed to be without ore, but while still having a world to work with. The other was to do so without the use of something like Ex Nihilo, finding a way to unlock access to resources for the player with the standard mods that exist in the pack.</span></p>
    </div>
</div>

<!-- Flux Server Status -->
<?php
require('../api/MulticraftAPI.php');
$api = new MulticraftAPI('http://multicraft.multicube.co/api.php ', 'Sander', 'e35cbba78574b71346b5');
$a = serialize($api->getServerStatus(38));
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
        <p class="status-title">MultiCubeUK - FTB Regrowth</p>
        <span style="font-size:15px;color:#337ab7;">hub.multicube.co/regrowth.multicube.co</span>
        
        <div class="container">
            <br/>
            <div class="progress" style="width:83%;text-align:center;">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $playerCount; ?>%;">
                    <?php echo $serverOutput; ?>
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
        <p><span style="color: #ffffff;">Coming Soon</span></p>
        <p><span style="color: #ffffff; font-size: 24pt;"></span></p>
        <p><span style="color: #ffffff; font-size: 24pt;">Banned Items</span></p>
        <p><span style="color: #ffffff;"></span></p>
        <p><spoiler><span style="color: #ffffff;">...</span></spoiler></p>
    </div>
</div>

<!-- Footer -->
<?php include("../Footer/MultiCubeUKFooter.php"); ?>
</body>

</html>