<!DOCTYPE html>
<html>

<head>
    <title>MultiCubeUK | Maps</title>
    <link rel="stylesheet" type="text/css" href="../Menu/MultiCubeUKMenuLayout.css">
    <link rel="stylesheet" type="text/css" href="../Footer/MultiCubeUKFooterLayout.css">
    <link rel="stylesheet" type="text/css" href="MultiCubeUKDynmapLayout.css">
    
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
</head>

<style>
</style>

<body>
<!-- Menu -->
<?php include("../Menu/MultiCubeUKMenu.php"); ?>

<!-- Dynmap Menu -->
<div class="container">                                         
  <div class="dropdown">
    <button class=" dropdown-toggle" type="button" data-toggle="dropdown">Choose Your Server
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li onclick="hubSwitch()" class="dynLi">Hub</li>
      <li onclick="fluxSwitch()" class="dynLi">Project Flux</li>
      <li onclick="crundeeSwitch()" class="dynLi">Crundee Craft</li>
      <li onclick="crundee2Switch()" class="dynLi">Crundee Craft Node 2</li>
      <li onclick="creativeSwitch()" class="dynLi">Vanilla Creative</li>
    </ul>
  </div>
</div>

<!-- Dynmaps -->
<div id="hub-frame">
    <iframe class="dynmap" src="http://server2.multicube.co:8120">    
    </iframe>
</div>
<div id="flux-frame">
    <iframe class="dynmap" src="http://server2.multicube.co:8122">   
    </iframe>
</div>
<div id="crundee-frame">
    <iframe class="dynmap" src="http://server2.multicube.co:8121">
    </iframe>
</div>
<div id="crundee2-frame">
    <iframe class="dynmap" src="http://server2.multicube.co:8127">    
    </iframe>
</div>
<div id="creative-frame">
    <iframe class="dynmap" src="http://server2.multicube.co:8123">    
    </iframe>
</div>
<script>
    var hub = document.getElementById("hub-frame");
    var flux = document.getElementById("flux-frame");
    var crundee = document.getElementById("crundee-frame");
    var crundee2 = document.getElementById("crundee2-frame");
    var creative = document.getElementById("creative-frame");
    function resetDyn() {
        hub.style.display = "none";
        flux.style.display = "none";
        crundee.style.display = "none";
        crundee2.style.display = "none";
        creative.style.display = "none";
    }
    function hubSwitch() {
        resetDyn();
        hub.style.display = "block";
    }
    function fluxSwitch() {
        resetDyn();
        flux.style.display = "block";
    }
    function crundeeSwitch() {
        resetDyn();
        crundee.style.display = "block";
    }
    function crundee2Switch() {
        resetDyn();
        crundee2.style.display = "block";
    }
    function creativeSwitch() {
        resetDyn();
        creative.style.display = "block";
    }
</script>
<!-- Footer -->
<?php include("../Footer/MultiCubeUKFooter.php"); ?>
</body>

</html>