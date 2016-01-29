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
ul {
    list-style:none;
}
h2 {
    padding:10px;
}
#vote2, #vote3 {
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
/*var v4 = document.getElementById("vote4");
var v5 = document.getElementById("vote5");
var v6 = document.getElementById("vote6");
var v7 = document.getElementById("vote7");
var v8 = document.getElementById("vote8");
var v9 = document.getElementById("vote9");
var v10 = document.getElementById("vote10");*/
var frame = document.getElementById("voteiframe");
var vote = 1;
function voteReset(){
    v1.style.display = "none";
    v2.style.display = "none";
    v3.style.display = "none";
    /*v4.style.display = "none";
    v5.style.display = "none";
    v6.style.display = "none";
    v7.style.display = "none";
    v8.style.display = "none";
    v9.style.display = "none";
    v10.style.display = "none";*/
}
function votePre() {
    if (vote >= 2){
        vote = vote - 1;
    } else {
        vote = 3;
    }
    switchVote();
}
function voteNext() {
    if (vote <= 2){
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
        /*case 4:
            voteReset();
            v4.style.display = "block";
            frame.src = "";
            break;
        case 5:
            voteReset();
            v5.style.display = "block";
            frame.src = "";
            break;
        case 6:
            voteReset();
            v6.style.display = "block";
            frame.src = "";
            break;
        case 7:
            voteReset();
            v7.style.display = "block";
            frame.src = "";
            break;
        case 8:
            voteReset();
            v8.style.display = "block";
            frame.src = "";
            break;
        case 9:
            voteReset();
            v9.style.display = "block";
            frame.src = "";
            break;
        case 10:
            voteReset();
            v10.style.display = "block";
            frame.src = "";
            break;*/
    }
}
</script>

<!-- Footer -->
<?php include("../Footer/MultiCubeUKFooter.php"); ?>
</body>

</html>