<!-- Twitch Button -->
<div class="container">
  <!-- Trigger the modal with a button -->
       <img class="twbutton" src="../social/twitch/twitchlogo.png" data-toggle="modal" data-target="#myModalTW">

  <!-- Modal -->
  <div class="modal fade" id="myModalTW" role="dialog">
    <div class="modal-dialog" style="width:90%;">
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color:#212121;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="background-color:white;border-radius:15px;">&times;</button>
<div class="container">                                         
    <div class="dropdown">
        <button class=" dropdown-toggle" type="button" data-toggle="dropdown">Choose Your Streamer
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li onclick="switchStreamer1()" style="cursor:pointer;">MultiCubeUK</li>
            <li onclick="switchStreamer2()" style="cursor:pointer;">untamemadman</li>
            <li onclick="switchStreamer3()" style="cursor:pointer;">maxbullet52</li>
            <li onclick="switchStreamer4()" style="cursor:pointer;"></li>
            <li onclick="switchStreamer5()" style="cursor:pointer;"></li>
            <li onclick="switchStreamer6()" style="cursor:pointer;"></li>
            <li onclick="switchStreamer7()" style="cursor:pointer;"></li>
            <li onclick="switchStreamer8()" style="cursor:pointer;"></li>
        </ul>
    </div>
</div>
        </div>
        <div class="modal-body">
		 <div>
         <div id="streamer1">
            <object type="application/x-shockwave-flash" style="height:500px;width:70%;" id="live_embed_player_flash" data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=clodbegamingnetwork" bgcolor="#000000">
                <param name="allowFullScreen" value="true" />
                <param name="allowScriptAccess" value="always" />
                <param name="allowNetworking" value="all" />
                <param name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" />
                <param name="flashvars" value="hostname=www.twitch.tv&channel=MultiCubeUK&auto_play=true&start_volume=25" />
            </object>
            <iframe frameborder="0" scrolling="no" src="http://twitch.tv/MultiCubeUK/chat?popout="style="margin-left:3%;width:25%;height:500px;">
            </iframe>
         </div>
         <div id="streamer2" style="display:none;">
            <object type="application/x-shockwave-flash" style="height:500px;width:70%;" id="live_embed_player_flash" data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=clodbegamingnetwork" bgcolor="#000000">
                <param name="allowFullScreen" value="true" />
                <param name="allowScriptAccess" value="always" />
                <param name="allowNetworking" value="all" />
                <param name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" />
                <param name="flashvars" value="hostname=www.twitch.tv&channel=untamemadman&auto_play=true&start_volume=25" />
            </object>
            <iframe frameborder="0" scrolling="no" src="http://twitch.tv/untamemadman/chat?popout="style="margin-left:3%;width:25%;height:500px;">
            </iframe>
         </div>
         <div id="streamer3" style="display:none;">
            <object type="application/x-shockwave-flash" style="height:500px;width:70%;" id="live_embed_player_flash" data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=clodbegamingnetwork" bgcolor="#000000">
                <param name="allowFullScreen" value="true" />
                <param name="allowScriptAccess" value="always" />
                <param name="allowNetworking" value="all" />
                <param name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" />
                <param name="flashvars" value="hostname=www.twitch.tv&channel=maxbullet52&auto_play=true&start_volume=25" />
            </object>
            <iframe frameborder="0" scrolling="no" src="http://twitch.tv/maxbullet52/chat?popout="style="margin-left:3%;width:25%;height:500px;">
            </iframe>
         </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
  </div>
</div>
<script>
    var s1 = document.getElementById("streamer1");
    var s2 = document.getElementById("streamer2");
    var s3 = document.getElementById("streamer3");
    function resetStream() {
        s1.style.display = "none";
        s2.style.display = "none";
        s3.style.display = "none";
    }
    function switchStreamer1() {
        resetStream();
        s1.style.display = "block";
    }
    function switchStreamer2() {
        resetStream();
        s2.style.display = "block";
    }
    function switchStreamer3() {
        resetStream();
        s3.style.display = "block";
    }
</script>