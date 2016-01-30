<!DOCTYPE html>
<html>

<head>
    <title>MultiCubeUK | Crundee Craft</title>
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

<!-- Crundee Server Information -->
<div class="server">
    <div class="server-header">
        <h1><strong>Crundee </strong>Craft</h1>
    </div>
    <div class="server-info">
        <p><span style="color: #ffffff;">Crundee Craft - By SSundee, MrCrainer and Kehaan</span></p>
        <p><span style="color: #ffffff;">This pack is the pack being used in the series Crundee Craft, made by SSundee and MrCrainer. Now you are able to play the same pack, as they do, and join the adventure!</span></p>
        <p><span style="color: #ffffff;">SSundee channel: <a href="https://www.youtube.com/user/SSundee" target="_blank">https://www.youtube.com/user/SSundee</a> </span><br /><span style="color: #ffffff;">MrCrainer channel: <a href="https://www.youtube.com/user/MisterCrainer" target="_blank">https://www.youtube.com/user/MisterCrainer</a> </span><br /><span style="color: #ffffff;">Pack Developer: <a href="https://twitter.com/KehaanDK" target="_blank">https://twitter.com/KehaanDK</a> </span><br /><span style="color: #ffffff;">Art Pack Design: siyliss.com</span></p>
        <span style="color: #ffffff;">You are allowed to make videos/stream the pack, but please link back to the pack page in your description - <a href="https://www.atlauncher.com/pack/CrundeeCraft" target="_blank">https://www.atlauncher.com/pack/CrundeeCraft</a></span></div>
    </div>
</div>

<!-- Crundee Server Status -->
<?php
require('../api/MulticraftAPI.php');
$api = new MulticraftAPI('http://multicraft.multicube.co/api.php ', 'Sander', 'e35cbba78574b71346b5');
$a = serialize($api->getServerStatus(22));
$b = serialize($api->getServerStatus(25));
/* Node 1 */
if ($a[77] == "f") {
    $serverOutput = "<strong>Server</strong> Offline";
} else if ($a[111] != '"') {
    $aa = $a[110].$a[111];
    $playerCount = $aa / 30 * 100;
    $serverOutput = $aa."/".$a[137].$a[138]." "."<strong>Players</strong> Online";
} else {
    $playerCount = $a[110] / 30 * 100;
    $serverOutput = $a[110]."/".$a[136].$a[137]." "."<strong>Players</strong> Online";
}
/* Node 2*/
if ($b[77] == "f") {
    $serverOutputB = "<strong>Server</strong Offline";
} else if ($b[111] != '"') {
    $bb = $b[110].$b[111];
    $playerCountB = $bb / 30 * 100;
    $serverOutputB = $bb."/".$b[137].$b[138]." "."<strong>Players</strong> Online";
} else {
    $playerCountB = $b[110] / 30 * 100;
    $serverOutputB = $b[110]."/".$b[136].$b[137]." "."<strong>Players</strong> Online";
}?>
<!-- Node 1 -->
<div class="server">
    <div class="server-header">
        <h1><strong>Server </strong>Status</h1>
    </div>
    <div class="server-status">
        <p class="status-title">MultiCubeUK - Crundee Craft Node 1</p>
        <span style="font-size:15px;color:#337ab7;">hub.multicube.co/crundee.multicube.co</span>
        
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
<!-- Node 2 -->
<div class="server">
    <div class="server-status-node2">
        <p class="status-title">MultiCubeUK - Crundee Craft Node 2</p>
        <span style="font-size:15px;color:#337ab7;">hub.multicube.co/crundee2.multicube.co</span>
        
        <div class="container">
            <br/>
            <div class="progress" style="width:83%;text-align:center;">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $playerCountB; ?>%;">
                    <?php echo $serverOutputB; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Crundee Server Installation / Banned Item List -->
<div class="server">
    <div class="server-header">
        <h1><strong>Important </strong>Information</h1>
    </div>
    <div class="server-info">
        <p><span style="font-size: 24pt; color: #ffffff;">How to Install the Pack</span></p>
        <p><span style="color: #ffffff; font-size: 24pt;"></span></p>
        <p><span style="color: #ffffff;"><iframe width="494px;" src="https://www.youtube.com/embed/L9NhP2N7mhA" frameborder="0" allowfullscreen></iframe></span></p>
        <p><span style="color: #ffffff; font-size: 24pt;"></span></p>
        <p><span style="color: #ffffff; font-size: 24pt;">Banned Items</span></p>
        <p><span style="color: #ffffff;"></span></p>
        <p><span style="color: #ffffff;">Robotics Redstone Board, Bound Pickaxe, Operator Key, Robotics Robot, Ice Bomb, Coconut Bomb, Self-Propelled Anti Material Rocket, MFR Tracking Self-Propelled Anti Material Rocket, MFR SPAMR launcher, Network Tool, Sponge Pet, Cloud Pet, Earth Former, Ore Magnet, Cloud in a Bottle, SDX1, SDX2, Sacred Rubber Sapling, Super Sacred Rubber Sapling, Ender Quarry World Hole Upgrade, Illuminati Pet, Bottled Taint, Chunk Loader, Magnetic Force, Draconic Staff Of Power, Drawbridge, Advanced Drawbridge, Extended Drawbridge, Display Pedestal, Luggage, Double Chest Pet, Sun Dial, Weather Controller, Imperfect Ritual Stone, Buildcraft Quarry, Ender-Thermic Pump, Magnetic Force Field, Poppet Shelves</span></p><br/>
        <p><span style="color: #ffffff;">All Chunk Loaders are banned, we use a plugin for that.</span></p>
    </div>
</div>

<!-- Footer -->
<?php include("../Footer/MultiCubeUKFooter.php"); ?>
</body>

</html>