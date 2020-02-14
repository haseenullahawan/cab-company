<style type="text/css">
</style>
<div class="col-md-12 padding white right-p flighttraffic-page">
   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>
      <?php echo $this->session->flashdata('message'); ?>
        <div class="col-md-12 padding-p-r">
         <div class="row">
             <div id="destinationForm">
                <form action="" method="post" name="track_flight" id="track_flight">
                    <div class="col-md-4">
                       <label><?php echo $this->lang->line("flight_id");?> :</label>
                       <input type="text" name="flight_id" id="flight_id">
                        <input type="button" value="<?php echo $this->lang->line('track');?>" onclick="javascript:trackFlightByID()">
                        <div id="panel"></div>
                    </div>
                    <div class="col-md-8">
                        <div id="track_status" style="display:none;">
                            <p><?php echo $this->lang->line("loading_flight_status");?></p>
                        </div>
                    </div>
                </form>
            </div>
            
            
         </div>
      </div>
      <!--/.module--> 
   </div>
   <!--/.content--> 
</div>
<script type="text/javascript"> 
function trackFlightByID() {
    flightID = $("#flight_id").val();
    $.ajax({			 
            type: 'POST',			  
            url: "<?php echo site_url();?>/settings/getFlightStatus",
            data: '<?php echo $this->security->get_csrf_token_name();?>=<?php echo $this->security->get_csrf_hash();?>&flight_id='+flightID,
            cache: false,			 
            success: function(data) {			
            //alert(data);
            $('#track_status').show();
            $('#track_status').html(data);
            }		  		

           });
}
</script>
    
    