<!-- TeamSpeak Button -->
<div class="container">
  <!-- Trigger the modal with a button -->
       <img class="tsbutton" src="../social/teamspeak/tsicon.png" data-toggle="modal" data-target="#myModalTS">

  <!-- Modal -->
  <div class="modal fade" id="myModalTS" role="dialog">
    <div class="modal-dialog" >
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color:#212121;color:#fff;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="background-color:white;border-radius:15px;">&times;</button>
          
        </div>
        <div class="modal-body" style="text-align:center;">
		 <div>
            <div class="row">
             <div>Name:</div><div id="name">-</div>
         </div>
         <div class="row">
             <div>Status:</div><div id="status">-</div>
         </div>
         <div class="row">
             <div>Users:</div><div id="users">-</div>
         </div>
         <a href="ts3server://ts.multicube.co:4753"><h3>Join the server!</h3></a>
        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
  </div>
</div>
<script>
$.getJSON('https://api.planetteamspeak.com/serverstatus/216.127.64.88:4753/', function(json)
{
    if(json.status == 'success')
    {
        $('#name').html(json.result.name);
        
        // check status
        if(json.result.online)
        {
            $('#status').html('<span class="text-success">Online</span>');
        }
        else
        {
            $('#status').html('<span class="text-danger">Offline</span>');
        }
        
        $('#users').html(json.result.users + ' / ' + json.result.slots);
    }
    else
    {
        $('#status').html('<span class="text-danger">' + json.result.message + '</span>');
    }
});
</script>
