<!DOCTYPE html>
<html>

<head>
    <title>MultiCubeUK | Vote</title>
    <link rel="stylesheet" type="text/css" href="../Menu/MultiCubeUKMenuLayout.css">
    <link rel="stylesheet" type="text/css" href="../Footer/MultiCubeUKFooterLayout.css">
    <link href="http://fonts.googleapis.com/css?family=Quicksand:400,300,700" rel="stylesheet" type="text/css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    
</head>
<style>
.votenav {
    width:100%;
    height:50px;
    margin:0 auto;
    background-color:#333333;
    color:#fff;
    text-align:center;
}
#vote1, #vote2, #vote3, #vote4, #vote5, #vote6, #vote7, #vote8, #vote9, #vote10, #vote11, #vote12, #vote13 {
    padding:10px;
}
#vote2, #vote3, #vote4, #vote5, #vote6, #vote7, #vote8, #vote9, #vote10, #vote11, #vote12, #vote13 {
    display:none;
}
#voteiframe {
    width:100%;
    height:1500px;
}
</style>
<body>
<!-- Menu -->
<?php include("../Menu/MultiCubeUKMenu.php"); ?>

<!-- Vote -->
<div class="votenav">
    <div class="backward">
        <span class="glyphicon glyphicon-backward" onclick="votePre()" style="float:left;cursor:pointer;z-index:99;margin-top:15px;"></span>
    </div>
    <div class="votes">
            <h2 id="vote1"> Vote Page 1 </h2>
            <h2 id="vote2"> Vote Page 2 </h2>
            <h2 id="vote3"> Vote Page 3 </h2>
            <h2 id="vote4"> Vote Page 4 </h2>
            <h2 id="vote5"> Vote Page 5 </h2>
            <h2 id="vote6"> Vote Page 6 </h2>
            <h2 id="vote7"> Vote Page 7 </h2>
            <h2 id="vote8"> Vote Page 8 </h2>
            <h2 id="vote9"> Vote Page 9 </h2>
            <h2 id="vote10"> Vote Page 10 </h2>
            <h2 id="vote11"> Vote Page 11 </h2>
            <h2 id="vote12"> Vote Page 12 </h2>
            <h2 id="vote13"> Vote Page 13 </h2>
    </div>
    <div class="forward">
        <span class="glyphicon glyphicon-forward" onclick="voteNext()" style="float:right;cursor:pointer;z-index:99;margin-top:-48px;"></span>
    </div>
</div>
<div class="voteframes">
    <iframe id="voteiframe" src="https://servers.atlauncher.com/server/1445"></iframe>
</div>

<script>
var v1 = document.getElementById("vote1");
var v2 = document.getElementById("vote2");
var v3 = document.getElementById("vote3");
var v4 = document.getElementById("vote4");
var v5 = document.getElementById("vote5");
var v6 = document.getElementById("vote6");
var v7 = document.getElementById("vote7");
var v8 = document.getElementById("vote8");
var v9 = document.getElementById("vote9");
var v10 = document.getElementById("vote10");
var v11 = document.getElementById("vote11");
var v12 = document.getElementById("vote12");
var v13 = document.getElementById("vote13");
var frame = document.getElementById("voteiframe");
var vote = 1;
function voteReset(){
    v1.style.display = "none";
    v2.style.display = "none";
    v3.style.display = "none";
    v4.style.display = "none";
    v5.style.display = "none";
    v6.style.display = "none";
    v7.style.display = "none";
    v8.style.display = "none";
    v9.style.display = "none";
    v10.style.display = "none";
    v11.style.display = "none";
    v12.style.display = "none";
    v13.style.display = "none";
}
function votePre() {
    if (vote >= 2){
        vote = vote - 1;
    } else {
        vote = 13;
    }
    switchVote();
}
function voteNext() {
    if (vote <= 12){
        vote = vote + 1;
    } else {
        vote = 1;
    }
    switchVote();
}
function switchVote() { 
    switch (vote) {
        case 1:
            voteReset();
            v1.style.display = "block";
            frame.src = "https://servers.atlauncher.com/server/1445";
            break;
        case 2:
            voteReset();
            v2.style.display = "block";
            frame.src = "https://servers.atlauncher.com/server/1446";
            break;
        case 3:
            voteReset();
            v3.style.display = "block";
            frame.src = "https://servers.atlauncher.com/server/1539";
            break;
        case 4:
            voteReset();
            v4.style.display = "block";
            frame.src = "http://www.minecraft-servers-list.org/index.php?a=in&u=MultiCubeUK";
            break;
        case 5:
            voteReset();
            v5.style.display = "block";
            frame.src = "http://ftb-infinity-servers.com/server/297/multicubeuk";
            break;
        case 6:
            voteReset();
            v6.style.display = "block";
            frame.src = "http://minecraft-mp.com/server-s109979";
            break;
        case 7:
            voteReset();
            v7.style.display = "block";
            frame.src = "https://www.minestatus.net/142484-multicubeuk/vote";
            break;
        case 8:
            voteReset();
            v8.style.display = "block";
            frame.src = "http://ftbservers.com/server/iEHJ01ef/vote";
            break;
        case 9:
            voteReset();
            v9.style.display = "block";
            frame.src = "http://minecraftservers.net/server/80852/vote/";
            break;
        case 10:
            voteReset();
            v10.style.display = "block";
            frame.src = "http://resonantriseservers.com/server/YTtgdcRL/vote";
            break;
        case 11:
            voteReset();
            v11.style.display = "block";
            frame.src = "http://topg.org/Minecraft/in-424526";
            break;
        case 12:
            voteReset();
            v12.style.display = "block";
            frame.src = "http://minecraft-server-list.com/server/305408/vote/";
            break;
        case 13:
            voteReset();
            v13.style.display = "block";
            frame.src = "http://www.planetminecraft.com/server/multicubeuk-factions/vote/";
            break;
    }
}
</script>

<!-- Footer -->
<?php include("../Footer/MultiCubeUKFooter.php"); ?>
</body>

</html>