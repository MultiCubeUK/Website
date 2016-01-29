<!DOCTYPE html>
<html>

<head>
    <title>MultiCubeUK | Network Statistics</title>
    <link rel="stylesheet" type="text/css" href="../Menu/MultiCubeUKMenuLayout.css">
    <link rel="stylesheet" type="text/css" href="../Footer/MultiCubeUKFooterLayout.css">
    <link rel="stylesheet" type="text/css" href="MultiCubeUKServersLayout.css">
    
</head>

<style>
</style>

<body>
<!-- Menu -->
<?php include("../Menu/MultiCubeUKMenu.php"); ?>

<!-- Network Wide Player Count -->
<?php include_once '../root/status.class.php'; 
$status = new MinecraftServerStatus(); 
$response = $status->getStatus('151.80.33.216', 25565, '1.7.10');
?>
<div class="multicube-top"><img src="../root/BigLogo20161.png" alt="MulticubeUK Logo" /></div>
<div class="multicube-player-count"><span><?php echo $response['players']; ?><strong> Players</strong> Online</div>

<!-- Crundee Server Status -->
<?php
require('../api/MulticraftAPI.php');
$api = new MulticraftAPI('http://multicraft.multicube.co/api.php ', 'Sander', 'e35cbba78574b71346b5');
$a = serialize($api->getServerStatus(22));
$b = serialize($api->getServerStatus(25));
$c = serialize($api->getServerStatus(6));
$d = serialize($api->getServerStatus(35));
$e = serialize($api->getServerStatus(38));
$f = serialize($api->getServerStatus(33));
$g = serialize($api->getServerStatus(20));
$h = serialize($api->getServerStatus(23));
$i = serialize($api->getServerStatus(32));

if ($a[77] == "f") {
    $serverOutput = "<strong>Server</strong> Offline";
} else if ($a[111] != '"') {
    $playerCount = $a[110].$a[111]/30*100;
    $serverOutput = $a[110].$a[111]."/".$a[137].$a[138]." "."<strong>Players</strong> Online";
} else {
    $playerCount = $a[110]/30*100;
    $serverOutput = $a[110]."/".$a[136].$a[137]." "."<strong>Players</strong> Online";
}

if ($b[77] == "f") {
    $serverOutputB = "<strong>Server</strong Offline";
} else if ($b[111] != '"') {
    $playerCountB = $b[110].$b[111]/30*100;
    $serverOutputB = $b[110].$b[111]."/".$b[137].$b[138]." "."<strong>Players</strong> Online";
} else {
    $playerCountB = $b[110]/30*100;
    $serverOutputB = $b[110]."/".$b[136].$b[137]." "."<strong>Players</strong> Online";
}

if ($c[77] == "f") {
    $serverOutputC = "<strong>Server</strong> Offline";
} else if ($c[111] != '"') {
    $playerCountC = $c[110].$c[111]/30*100;
    $serverOutputC = $c[110].$c[111]."/".$c[137].$c[138]." "."<strong>Players</strong> Online";
} else {
    $playerCountC = $c[110]/30*100;
    $serverOutputC = $c[110]."/".$c[136].$c[137]." "."<strong>Players</strong> Online";
}

if ($d[77] == "f") {
    $serverOutputD = "<strong>Server</strong> Offline";
} else if ($d[111] != '"') {
    $playerCountD = $d[110].$d[111]/30*100;
    $serverOutputD = $d[110].$d[111]."/".$d[137].$d[138]." "."<strong>Players</strong> Online";
} else {
    $playerCountD = $d[110]/30*100;
    $serverOutputD = $d[110]."/".$d[136].$d[137]." "."<strong>Players</strong> Online";
}

if ($e[77] == "f") {
    $serverOutputE = "<strong>Server</strong> Offline";
} else if ($e[111] != '"') {
    $playerCountE = $e[110].$e[111]/30*100;
    $serverOutputE = $e[110].$e[111]."/".$e[137].$e[138]." "."<strong>Players</strong> Online";
} else {
    $playerCountE = $e[110]/30*100;
    $serverOutputE = $e[110]."/".$e[136].$e[137]." "."<strong>Players</strong> Online";
}

if ($f[77] == "f") {
    $serverOutputF = "<strong>Server</strong> Offline";
} else if ($f[111] != '"') {
    $playerCountF = $f[110].$f[111]/30*100;
    $serverOutputF = $f[110].$f[111]."/".$f[137].$f[138]." "."<strong>Players</strong> Online";
} else {
    $playerCountF = $f[110]/30*100;
    $serverOutputF = $f[110]."/".$f[136].$f[137]." "."<strong>Players</strong> Online";
}

if ($g[77] == "f") {
    $serverOutputG = "<strong>Server</strong> Offline";
} else if ($g[111] != '"') {
    $playerCountG = $g[110].$g[111]/50*100;
    $serverOutputG = $g[110].$g[111]."/".$g[137].$g[138]." "."<strong>Players</strong> Online";
} else {
    $playerCountG = $g[110]/30*100;
    $serverOutputG = $g[110]."/".$g[136].$g[137]." "."<strong>Players</strong> Online";
}

if ($h[77] == "f") {
    $serverOutputH = "<strong>Server</strong> Offline";
} else if ($h[111] != '"') {
    $playerCountH = $h[110].$h[111]/40*100;
    $serverOutputH = $h[110].$h[111]."/".$h[137].$h[138]." "."<strong>Players</strong> Online";
} else {
    $playerCountH = $h[110]/30*100;
    $serverOutputH = $h[110]."/".$h[136].$h[137]." "."<strong>Players</strong> Online";
}
if ($i[77] == "f") {
    $serverOutputI = "<strong>Server</strong> Offline";
} else if ($i[111] != '"') {
    $playerCountI = $i[110].$i[111]/50*100;
    $serverOutputI = $i[110].$i[111]."/".$i[137].$i[138]." "."<strong>Players</strong> Online";
} else {
    $playerCountI = $i[110]/30*100;
    $serverOutputI = $i[110]."/".$i[136].$i[137]." "."<strong>Players</strong> Online";
}
?>
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
    <div class="server-status-node2">
        <p class="status-title">MultiCubeUK - Project Flux</p>
        <span style="font-size:15px;color:#337ab7;">hub.multicube.co/flux.multicube.co</span>
        
        <div class="container">
            <br/>
            <div class="progress" style="width:83%;text-align:center;">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $playerCountC; ?>%;">
                    <?php echo $serverOutputC; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="server-status-node2">
        <p class="status-title">MultiCubeUK - Resonant Rise 3 Mainline</p>
        <span style="font-size:15px;color:#337ab7;">hub.multicube.co/mainline.multicube.co</span>
        
        <div class="container">
            <br/>
            <div class="progress" style="width:83%;text-align:center;">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $playerCountD; ?>%;">
                    <?php echo $serverOutputD; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="server-status-node2">
        <p class="status-title">MultiCubeUK - FTB Regrowth</p>
        <span style="font-size:15px;color:#337ab7;">hub.multicube.co/regrowth.multicube.co</span>
        
        <div class="container">
            <br/>
            <div class="progress" style="width:83%;text-align:center;">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $playerCountE; ?>%;">
                    <?php echo $serverOutputE; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="server-status-node2">
        <p class="status-title">MultiCubeUK - Infinity Evolved</p>
        <span style="font-size:15px;color:#337ab7;">hub.multicube.co/infinity.multicube.co</span>
        
        <div class="container">
            <br/>
            <div class="progress" style="width:83%;text-align:center;">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $playerCountF; ?>%;">
                    <?php echo $serverOutputF; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="server-status-node2">
        <p class="status-title">MultiCubeUK - Vanilla Factions</p>
        <span style="font-size:15px;color:#337ab7;">hub.multicube.co/factions.multicube.co</span>
        
        <div class="container">
            <br/>
            <div class="progress" style="width:83%;text-align:center;">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $playerCountG; ?>%;">
                    <?php echo $serverOutputG; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="server-status-node2">
        <p class="status-title">MultiCubeUK - Vanilla Creative</p>
        <span style="font-size:15px;color:#337ab7;">hub.multicube.co/creative.multicube.co</span>
        
        <div class="container">
            <br/>
            <div class="progress" style="width:83%;text-align:center;">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $playerCountH; ?>%;">
                    <?php echo $serverOutputH; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="server-status-node2">
        <p class="status-title">MultiCubeUK - Pixelmon Survival</p>
        <span style="font-size:15px;color:#337ab7;">pixelmon.multicube.co/survival.pokecube.co</span>
        
        <div class="container">
            <br/>
            <div class="progress" style="width:83%;text-align:center;">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $playerCountI; ?>%;">
                    <?php echo $serverOutputI; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<?php include("../Footer/MultiCubeUKFooter.php"); ?>
</body>

</html>