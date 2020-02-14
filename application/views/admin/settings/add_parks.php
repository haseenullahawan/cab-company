<div class="col-md-12"><!--col-md-10 padding white right-p-->
   <div class="content">
      <div class="main-hed">
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a> 
         <?php if(isset($title)) echo " >> Park Settings >> ".$title;?>
      </div>
      <div class="col-md-12 padding-p-l">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
                <a class="btn btn-primary add-btn" href="<?php echo site_url();?>/settings/parks"> <i class="fa fa-list">&nbsp;<?php echo $this->lang->line('parks');?></i></a>
            </div>
            <?php 
               $attributes = array('name' => 'add_parks_form', 'id' => 'add_parks_form');
               echo form_open("settings/parks/".$operation,$attributes) ?>
            <div class="module-body" style="border:none !important;">
                <div class="col-md-6">
                    <div class="form-group">                    
                       <label><?php echo $this->lang->line('park_name');?></label>    
                       <input type="text" class="park_name" name="park_name" placeholder="<?php echo $this->lang->line('enter_park_name');?>" value="<?php 
                          if(isset($park_rec->park_name))
                          echo $park_rec->park_name;echo set_value('park_name');
                          ?>" />    
                    </div>
                    <?php echo form_error('park_name');?>
                    <div class="form-group">                     
                       <label class="control-label"><?php echo $this->lang->line('status');?></label>											
                       <?php 					 
                          $options = array(						
                          "Active" => "Active",
                          "Inactive" => "Inactive"								

                          );	

                          $select = array();
                          if(isset($park_rec->status)) {
                          $select = array(								
                                             $park_rec->status		
                                             );					  			
                          }
                          echo form_dropdown('status',$options,$select,'class = "chzn-select"');					 

                          ?>   
                    </div>
               </div>
                <div class="col-md-6">
                    <label><?php echo $this->lang->line('park_address');?></label>    
                    <textarea class="location" name="park_address" id="park_address" rows="6" style="height:auto;"><?php 
                          if(isset($park_rec->address))
                          echo $park_rec->address;echo set_value('park_address');
                          ?></textarea>
                </div>
                 <?php echo form_error('park_address');?>
                <?php 
                    if($operation == "Add" ) {?>
                 <input type="submit" value="<?php echo $this->lang->line('add');?>" name="submit" />
                 <?php } else { ?>
                 <input type="hidden" value="<?php echo $park_rec->id?>" name="update_rec_id">
                 <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
                 <?php } ?> 
            </div>
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>
<!--	Validations	-->
<script type="text/javascript"> 
   (function($, W, D) {
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function() {
            //Additional Methods			
            $.validator.addMethod("lettersonly", function(a, b) {
                return this.optional(b) || /^[a-z ]+$/i.test(a)
            }, "Please enter valid park name.");
            //form validation rules
            $("#add_parks_form").validate({
                rules: {
                    park_name: {
                        required: true,
                    },
                },
                messages: {
                    park_name: {
                        required: "<?php echo $this->lang->line('park_valid');?>"
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }
    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
})(jQuery, window, document);

</script>
 <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="<?php echo base_url();?>assets/system_design/scripts/jquery.geocomplete.js"></script>
<script>
/*$(".airprt_name").geocomplete({	 
            country: '<?php //  echo $site_settings->site_country;?>'	 
     });*/
</script>