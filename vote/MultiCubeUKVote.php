<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../Menu/MultiCubeUKMenuLayout.css">
    <link rel="stylesheet" type="text/css" href="../Footer/MultiCubeUKFooterLayout.css">
    <link rel="stylesheet" type="text/css" href="MultiCubeUKVoteLayout.css">
    
</head>
<body>
<!-- Menu -->
<?php include("../Menu/MultiCubeUKMenu.php"); ?>

<!-- Vote -->
<script type="text/javascript">

 $(document).ready(function(){
console.log("document loaded");

function scrollTo(x,y){}

function ignoreerror()
{
   return true
}
window.onerror=ignoreerror();

$('#iframe1').click(function() {
$('#iframebox').fadeOut(600).attr('src', 'https://servers.atlauncher.com/server/1445').fadeIn(600);
       $('#span1').css('color','#396e9f');
       $('#span2').css('color','#f0f0f0');
       $('#span3').css('color','#f0f0f0');
	   $('#span4').css('color','#f0f0f0');
	   $('#span5').css('color','#f0f0f0');
	   $('#span6').css('color','#f0f0f0');
iframeState = 1;
});

$('#iframe2').click(function() {
$('#iframebox').fadeOut(600).attr('src', 'https://servers.atlauncher.com/server/1446').fadeIn(600);
       $('#span1').css('color','#f0f0f0');
       $('#span2').css('color','#396e9f');
       $('#span3').css('color','#f0f0f0');
	   $('#span4').css('color','#f0f0f0');
	   $('#span5').css('color','#f0f0f0');
	   $('#span6').css('color','#f0f0f0');
iframeState = 2;
});

$('#iframe3').click(function() {
$('#iframebox').fadeOut(600).attr('src', 'https://servers.atlauncher.com/server/MultiCubeNetworkPixelmon').fadeIn(600);
       $('#span1').css('color','#f0f0f0');
       $('#span2').css('color','#f0f0f0');
       $('#span3').css('color','#396e9f');
	   $('#span4').css('color','#f0f0f0');
	   $('#span5').css('color','#f0f0f0');
	   $('#span6').css('color','#f0f0f0');
iframeState = 3;
});

$('#iframe4').click(function() {
$('#iframebox').fadeOut(600).attr('src', 'http://minecraft-server-list.com/server/305408/vote/').fadeIn(600);
       $('#span1').css('color','#f0f0f0');
       $('#span2').css('color','#f0f0f0');
       $('#span3').css('color','#f0f0f0');
	   $('#span4').css('color','#396e9f');
	   $('#span5').css('color','#f0f0f0');
	   $('#span6').css('color','#f0f0f0');
iframeState = 4;
});

$('#iframe5').click(function() {
$('#iframebox').fadeOut(600).attr('src', 'http://www.planetminecraft.com/server/multicubeuk-factions/vote/').fadeIn(600);
       $('#span1').css('color','#f0f0f0');
       $('#span2').css('color','#f0f0f0');
       $('#span3').css('color','#f0f0f0');
	   $('#span4').css('color','#f0f0f0');
	   $('#span5').css('color','#396e9f');
	   $('#span6').css('color','#f0f0f0');
iframeState = 5;
});

var iframeState = 1;

$(document).on('click','#back',function() {

  if (iframeState >= 2 && iframeState <= 3) {
    iframeState = iframeState - 1;
  } else {
    iframeState = 6;
  }
  iframeSelector();
});


$(document).on('click','#next',function() {

  if (iframeState >= 1 && iframeState <= 2) {
    iframeState = iframeState + 1;
  } else {
    iframeState = 1;
  }
  iframeSelector();
});

function iframeOne(){

$('#iframebox').fadeOut(600).attr('src', 'https://servers.atlauncher.com/server/1445').fadeIn(600);
       $('#span1').css('color','#396e9f');
       $('#span2').css('color','#f0f0f0');
       $('#span3').css('color','#f0f0f0');
	   $('#span4').css('color','#f0f0f0');
	   $('#span5').css('color','#f0f0f0');
	   $('#span6').css('color','#f0f0f0');
iframeState = 1;
};

function iframeTwo(){

$('#iframebox').fadeOut(600).attr('src', 'https://servers.atlauncher.com/server/1446').fadeIn(600);
       $('#span1').css('color','#f0f0f0');
       $('#span2').css('color','#396e9f');
       $('#span3').css('color','#f0f0f0');
	   $('#span4').css('color','#f0f0f0');
	   $('#span5').css('color','#f0f0f0');
	   $('#span6').css('color','#f0f0f0');
iframeState = 2;
};

function iframeThree(){

$('#iframebox').fadeOut(600).attr('src', 'https://servers.atlauncher.com/server/MultiCubeNetworkPixelmon').fadeIn(600);
       $('#span1').css('color','#f0f0f0');
       $('#span2').css('color','#f0f0f0');
       $('#span3').css('color','#396e9f');
	   $('#span4').css('color','#f0f0f0');
	   $('#span5').css('color','#f0f0f0');
	   $('#span6').css('color','#f0f0f0');
iframeState = 3;
};

function iframeFour(){

$('#iframebox').fadeOut(600).attr('src', 'http://minecraft-server-list.com/server/305408/vote/').fadeIn(600);
       $('#span1').css('color','#f0f0f0');
       $('#span2').css('color','#f0f0f0');
       $('#span3').css('color','#f0f0f0');
	   $('#span4').css('color','#396e9f');
	   $('#span5').css('color','#f0f0f0');
	   $('#span6').css('color','#f0f0f0');
iframeState = 4;
};

function iframeFive(){

$('#iframebox').fadeOut(600).attr('src', 'http://www.planetminecraft.com/server/multicubeuk-factions/vote/').fadeIn(600);
       $('#span1').css('color','#f0f0f0');
       $('#span2').css('color','#f0f0f0');
       $('#span3').css('color','#f0f0f0');
	   $('#span4').css('color','#f0f0f0');
	   $('#span5').css('color','#396e9f');
	   $('#span6').css('color','#f0f0f0');
iframeState = 5;
};

function iframeSelector(){
switch(iframeState)
{
case 1:
  iframeOne();
  break;

case 2:
  iframeTwo();
  break;


case 3:
  iframeThree();
  break;
  
case 4:
  iframeFour();
  
case 5:
  iframeFive();

default:
  iframeState=1;
  iframeOne();
}
}
})

</script>

<div id="everything" style="background-color: rgba(0, 0, 0, 0.2); padding:10px;width:1000px;padding-top:75px;margin:0 auto;">
<div id="selectbox" align="center">
    <input id="iframe1" name="options" value="website1" type="radio">  
    <label for="iframe1"><span id="span1">Vote #1</span></label>  

    <input id="iframe2" name="options" value="website2" type="radio">  
    <label for="iframe2"><span id="span2">Vote #2</span></label>  

    <input id="iframe3" name="options" value="website3" type="radio">
    <label for="iframe3"><span id="span3">Vote #3</span></label>  

    <input id="iframe4" name="options" value="website4" type="radio">
    <label for="iframe4"><span id="span4">Vote #4</span></label>  

    <input id="iframe5" name="options" value="website5" type="radio">
    <label for="iframe5"><span id="span4">Vote #5</span></label>
</div>
<!--
<div id="buttons" align="center">
<img id="back" src="http://files.enjin.com/748560/Design/back.png" alt="back">
 
<img id="next" src="http://files.enjin.com/748560/Design/next.png" alt="next">
</div>
-->
<div id="iframes" align="center">
<iframe id="iframebox" src="https://servers.atlauncher.com/server/1445" height="600px" width="100%">
</iframe> 
</div>
</div>

<!-- Footer -->
<?php include("../Footer/MultiCubeUKFooter.php"); ?>
</body>

</html>