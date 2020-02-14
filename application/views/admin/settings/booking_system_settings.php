<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="col-md-6 padding-p-l">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
            </div>
            <div class="module-body">
               <?php echo form_open('settings/bookingSystemSettings');?>
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('distance')." ".$this->lang->line('type');?></label>											
                  <?php 					 
                     $options = array(						
                     "km" => "km",
                     "mile" => "mile"								
                     						
                     );	
                     
                     $select = array();
                     if(isset($booking_system_settings->distance_type)) {
                     $select = array(								
                     			$booking_system_settings->distance_type		
                     			);					  			
                     }
                     echo form_dropdown('distance_type',$options,$select,'class = "chzn-select"');					 ?>          
               </div>
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('waiting')." ".$this->lang->line('time');?></label>											  <?php 					 
                     $options = array(						
                     "enable" => "enable",								
                     "disable" => "disable"						
                     );	
                     
                     $select = array();
                     if(isset($booking_system_settings->waiting_time)) {
                     	$select = array(								
                     					$booking_system_settings->waiting_time		
                     					);
                     
                     }				  
                     echo form_dropdown('waiting_time',$options,$select,'class = "chzn-select"');					 ?>          
               </div>
               <input type="hidden" value="<?php  if(isset($booking_system_settings->max_advance_booking_days))
                  echo $booking_system_settings->id;
                  ?>" name="update_record_id" />               
               <input type="submit" value="Update" name="submit" />              
               <?php echo form_close();?>                  
            </div>
         </div>
      </div>
   </div>
</div>