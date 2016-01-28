<!DOCTYPE html>
<html>

<head>
    <title>MultiCubeUK | Infinity Evolved</title>
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
        <h1><strong>Infinity </strong>Evolved</h1>
    </div>
    <div class="server-info">
        <p><span style="color: #ffffff;">Infinity Evolved - FTB</span></p>
        <p><span style="color: #ffffff;">Infinity Evolved adds game modes!  Two modes are currently included; 'normal' and 'expert'.  New and existing worlds are automatically in 'normal' mode, to switch to the all-new game mode type the following command (without quotes):  "/ftb_mode set expert"  At any time you can return to 'normal' to typing the command: "/ftb_mode set normal"  These same commands can be executed by server ops either in game or from console.  Players joining a server will be switched to the server's game mode upon login automatically.  World resets are not required with the update to 2.0.0 but highly suggested if you are planning to play 'expert' mode due to the massive amount of progression changes.

 

        The pack for all people. Infinity is the general all-purpose pack from the FTB team that is designed for solo play as well as small and medium population servers.</span></p>
    </div>
</div>

<!-- Flux Server Status -->
<?php
require('../api/MulticraftAPI.php');
$api = new MulticraftAPI('http://multicraft.multicube.co/api.php ', 'Sander', 'e35cbba78574b71346b5');
$a = serialize($api->getServerStatus(33));
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
        <p class="status-title">MultiCubeUK - Infinity Evolved</p>
        <span style="font-size:15px;color:#337ab7;">hub.multicube.co/infinity.multicube.co</span>
        
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
        <p><span style="color: #ffffff;">Redstone Board, Network Tool, Earth Former, Quarry, Robotics Robot, Cloud in a bottle, Advanced Turtle, Turtle, MFR SPAMR launcher, MFR Tracking Self-Propelled Anti Material Rocket, SDX1, SDX2, Ice Bomb, Ore Magnet, Nuke, Florb, Magmatic Florb, Aqua Imbued Fire, Ordo Imbued Fire, Perditio  Imbued Fire, Terra  Imbued Fire, Aer  Imbued Fire, Ignis  Imbued Fire, Ender-Thermic Pump, Ender Quarry World Hole Upgrade, Sacred Rubber Sapling, Super Sacred Rubber Sapling, Crystal Chest, Diamond to Crystal Chest Upgrade, Bottled Taint, Chunk Loader, Admin Anchor, Admin Anchor Cart, Passive Anchor, Personal Anchor, Personal Anchor Cart, World Anchor, Anchor Cart, Chunk Loader, Poppet Shelf, Basic Logistics Pipe, Draconic Staff Of Power, Luggage, Drawbridge, Adavanced Drawbridge, Extended Drawbridge, Dimension Builder, Imperfect Ritual Stone, Sun Dial, Weather Controller</span></p>
    </div>
</div>

<!-- Footer -->
<?php include("../Footer/MultiCubeUKFooter.php"); ?>
</body>

</html>