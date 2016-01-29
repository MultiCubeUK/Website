<div class="news-module">
<div class="news-title"><strong>Network</strong> News</div>
<div class="news-content">
<div id="news">
    <img src="./NewsImages/opening.png" class="news-img"/>
    <div class="news-article">
        <?php include("./articles/pixelmonOpening.php");?>
    </div>
</div>
<div id="news2">
    <img src="./NewsImages/closure.png" class="news-img"/>
    <div class="news-article">
        <?php include("./articles/crainerClosure.php");?>
    </div>
</div>
<div id="news3">
    <img src="./NewsImages/sale.png" class="news-img"/>
    <div class="news-article">
    <?php include("./articles/christmasSale.php");?>
    </div>
</div>
</div>
</div>
</div>

<script>
var n = document.getElementById("news");
var n2 = document.getElementById("news2");
var n3 = document.getElementById("news3");
var spanh = document.getElementById("hide");
var spanh2 = document.getElementById("hide2");
var spanh3 = document.getElementById("hide3");
function expandNews(){
    if (n.style.height.match("300px")){
        spanh.style.display = "block";
        n.style.height = "auto";
    } else {
        n.style.height = "300px";
        spanh.style.display = "none";
    }
}
function expandNews2(){
    if (n2.style.height.match("300px")){
        spanh2.style.display = "block";
        n2.style.height = "auto";
    } else {
        n2.style.height = "300px";
        spanh2.style.display = "none";
    }
}
function expandNews3(){
    if (n3.style.height.match("300px")){
        spanh3.style.display = "block";
        n3.style.height = "auto";
    } else {
        n3.style.height = "300px";
        spanh3.style.display = "none";
    }
}
</script>
