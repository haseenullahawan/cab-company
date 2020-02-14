<div class="col-md-12"><!--col-md-10 padding white right-p-->
   <div class="content">
      <?php echo $this->session->flashdata('message'); ?>
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>
      <div class="col-md-6 padding-p-l">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
            </div>
            <div class="module-body">
               <!----><?php 
                  $attributes = array('name' => 'android_app_settings_form', 'id' => 'android_app_settings_form');
                  echo form_open_multipart('settings/appSettings',$attributes);?>            
               <div class="form-group">                    
                  <label><strong> <?php echo $this->lang->line('android');?> </strong> </label> 
                  <input type="file" name="userfile" >
               </div>
              
               <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
            </div>
			            <div class="module-body">
			<?php echo form_close();?> 

			<!----><?php 
                  $attributes = array('name' => 'ios_app_settings_form', 'id' => 'ios_app_settings_form');
                  echo form_open_multipart('settings/appSettings',$attributes);?>            
               <div class="form-group">                    
                  <label><strong> <?php echo $this->lang->line('ios');?></strong> </label> 
                  <input type="file" name="userfile" >
               </div>
              
               <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
            </div>
         </div>
         <?php echo form_close();?>  
			</div>
         </div>
         
      </div>
   </div>
</div>
</div>
<script type="text/javascript"> 
   (function($, W, D) {
     var JQUERY4U = {};
     JQUERY4U.UTIL = {
         setupFormValidation: function() {
             //Additional Methods			
             $.validator.addMethod("numbersonly", function(a, b) {
                 return this.optional(b) || /^[0-9 ]+$/i.test(a)
             }, "<?php echo $this->lang->line('valid_number');?>");
             //form validation rules
             $("#android_app_settings_form").validate({
                 rules: {
                     userfile: {
                         required: true
                     }
                 },
                 messages: {
                     userfile: {
                         required: "<?php echo $this->lang->line('file');?>"
                     }
                 },
                 submitHandler: function(form) {
                     form.submit();
                 }
             });
			 
			 
			  $("#ios_app_settings_form").validate({
                 rules: {
                     userfile: {
                         required: true
                     }
                 },
                 messages: {
                     userfile: {
                         required: "<?php echo $this->lang->line('file');?>"
                     }
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