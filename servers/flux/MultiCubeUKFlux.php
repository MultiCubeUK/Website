<!DOCTYPE html>
<html>

<head>
    <title>MultiCubeUK | Project Flux</title>
    <link rel="stylesheet" type="text/css" href="../../Menu/MultiCubeUKMenuLayout.css">
    <link rel="stylesheet" type="text/css" href="../../Footer/MultiCubeUKFooterLayout.css">
    <link rel="stylesheet" type="text/css" href="../MultiCubeUKServersLayout.css">
    
</head>

<style>
</style>

<body>
<!-- Menu -->
<?php include("../../Menu/MultiCubeUKMenu.php"); ?>

<!-- Big Logo -->
<div class="multicube-top"><img src="../../root/BigLogo20161.png" alt="MulticubeUK Logo" /></div>

<!-- Flux Server Information -->
<div class="server">
    <div class="server-header">
        <h1><strong>Project </strong>Flux</h1>
    </div>
    <div class="server-info">
        <p><br /><span style="color: #ffffff;">Resonant Rise returns with it&rsquo;s 3rd iteration. Offering the classic modded sandbox experience as well as slimmed sub-packs(currently wip) that help to focus your game play and use mods you may not be familiar with. </span><br /><br /><span style="color: #ffffff;">We also offer sub-packs designed by and for youtubers: </span><br /><span style="color: #ffffff;">Project Flux - This sub-pack was built for the Yogscast and has a number of series currently devoted to it. </span><br /><span style="color: #ffffff;">Absque Sole - This sub-pack was designed at the request of KirinDave for his Sunless Minecraft series. </span><br /><br /><span style="color: #ffffff;">=================================== </span><br /><span style="color: #ffffff;">Currently built against Forge #1448. </span><br /><br /><span style="color: #ffffff;">Though not enabled by default, this pack includes Fastcraft, a mod made by player, this mod is designed to improve many aspects of game-play. Some mod developers may not accept errors with this mod installed, please test them again with out Fastcraft in you instance. More information can be found here - <a href="http://forum.industrial-craft.net/index.php?page=Thread&amp;threadID=10820" target="_blank">http://forum.industrial-craft.net/index.php?page=Thread&amp;threadID=10820</a></span></p>
    </div>
</div>

<!-- Flux Server Status -->
<?php
require('../../api/MulticraftAPI.php');
$api = new MulticraftAPI('http://multicraft.multicube.co/api.php ', 'Sander', 'e35cbba78574b71346b5');
$a = serialize($api->getServerStatus(6));
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
        <p class="status-title">MultiCubeUK - Project Flux</p>
        <span style="font-size:15px;color:#337ab7;">hub.multicube.co/flux.multicube.co</span>
        
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
        <p><spoiler><span style="color: #ffffff;">Drone Case (Tier 1), Drone Case (Tier 2), Flint Duster, Turtle, Advanced Turtle, Aqua Accelerator, Earth Former, Network Tool, SDX1, SDX2, High Explosives, Light Explosives, Miners' Explosives, Death Explosives, Precision Explosives, Flint Duster, Quarry, Quarry, Sacred Rubber Sapling, Super Sacred Rubber Sapling, World Hole Upgrade, Elite Universal Cable, Crystal Chest, Sorting Crystal Chest, Poppet Shelf, Chunk Loader, Simple Chunk Loader, Deluxe Chunk Loader, Chunkloader Upgrade, Chunk Loader, World Anchor, Passive Anchor, Personal Anchor, Admin Anchor, Basic Logistics Pipe, Magnetic Force, Garage Door, Essentia Coil, Staff of Power, Analyzer, Imperfect Ritual Stone, Sun Dial, Weather Controller, Digital Miner</span></spoiler></p>
    </div>
</div>

<!-- Footer -->
<?php include("../../Footer/MultiCubeUKFooter.php"); ?>
</body>

</html>