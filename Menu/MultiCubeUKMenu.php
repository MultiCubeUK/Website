<?php echo '
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="http://fonts.googleapis.com/css?family=Quicksand:400,300,700" rel="stylesheet" type="text/css">
  <script src="../effects/snowStorm.js"></script>
  <script src="../Menu/MultiCubeUKMenuJS.js"></script>
    
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="http://www.multicube.co/"><img class="smalllogoimg" alt="MultiCubeUK" /></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="../root/index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Community <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Forums</a></li>
            <li><a href="../servers/MultiCubeUKNetworkStatistics.php">Network Statistics</a></li>
            <li><a href="../rules/MultiCubeUKRules.php">Network Rules</a></li>
            <li><a href="../Dynmap/MultiCubeUKDynmap.php">Server Maps</a></li>
            <li><a href="#">Apply For Staff</a></li>
          </ul>
        </li>
        <li><a href="http://store.multicube.co/">Store</a></li>
        <li><a href="../Vote/MultiCubeUKVote2.php">Vote</a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Support <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Forums</a></li>
            <li><a href="#">Support Tickets</a></li>
            <li><a href="../faq/MultiCubeUKFAQ.php">FAQ</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a>hub.multicube.co</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<img id="snowtoggle" alt="effectToggle" onclick="toggleSnow()" />
<img id="heartstoggle" alt="effectToggle" onclick="toggleSnow()" />
<script>
   var d = new Date();
   var day = d.getDate();
   var month = d.getMonth();
   var sbutton = document.getElementById("snowtoggle");
   var hbutton = document.getElementById("heartstoggle");
   
if (day >= 1 && day <= 31 && month == 11){
   hbutton.style.display = "none";
   sbutton.style.display = "block";
   snowStorm.resume();
}else if (day >= 1 && day <= 4 && month == 0){
   hbutton.style.display = "none";
   sbutton.style.display = "block";
   snowStorm.resume();
}else if (month == 1) {
   sbutton.style.display = "none";
   hbutton.style.display = "block";
   snowStorm.resume();
   snowStorm.snowColor = "#F00000";
   snowStorm.snowCharacter = "&hearts;";
   snowStorm.animationInterval = 50;
}else{
   sbutton.style.display = "none";
   hbutton.style.display = "none";
   snowStorm.stop();
}
</script>
'; ?>
