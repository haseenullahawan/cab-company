<div class="col-md-12 padding white right-p">
   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>
      <div class="col-md-6 padding-p-l">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
            </div>
            <?php 
               $attributes = array('name' => 'testimony_settings_form', 'id' => 'testimony_settings_form');
               echo form_open_multipart("settings/testimonials/".$operation,$attributes) ?>
            <div class="module-body">
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('title');?></label>    
                  <input type="text" name="title" placeholder="<?php echo $this->lang->line('title');?>" value="<?php if(isset($testimony->title))echo $testimony->title;?>" />    
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('author');?></label>    
                  <input type="text" name="author" placeholder="<?php echo $this->lang->line('author');?>" value="<?php if(isset($testimony->user_name))echo $testimony->user_name;
                     echo set_value('author'); ?>" />   
                  <?php echo form_error('author'); ?>
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('description');?></label>    
                  <textarea rows="2" cols="40" name="description" ><?php 
                     if(isset($testimony->content))
                     echo $testimony->content;
                     ?></textarea>    
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('photo');?></label>    
                  <input type="file" name="userfile" value="<?php if(isset($testimony->user_photo)) echo $testimony->user_photo;?>" onchange="readURL(this)" style="width:80px;"/>   
                  <br/>
                        <?php 

                                $src = "";
                                $style="display:none;";

                                if(isset($testimony->user_photo) && $testimony->user_photo != "") {

                                        $src = base_url()."uploads/testimonials_images/".$testimony->user_photo;
                                        $style="";

                                }
                        ?>
                        <img id="testimonial_image" src="<?php echo $src;?>" height="120" style="<?php echo $style;?>" />
               </div>
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>											
                  <?php 					 
                     $options = array(						
                     "Active" => "Active",
                     "Inactive" => "Inactive"								
                     );	
                     
                     $select = array();
                     if(isset($testimony->status)) {
                     $select = array(								
                     			$testimony->status		
                     			);					  			
                     }
                     echo form_dropdown('status',$options,$select,'class = "chzn-select"');					 
                     
                     ?>   
               </div>
               <?php 
                  if($operation == "Add" ) {?>
               <input type="submit" value="<?php echo $this->lang->line('add');?>" name="submit" />
               <?php } else { ?>
               <input name="current_img" id="current_img" type="hidden" value="<?php if(isset($testimony->user_photo)) echo $testimony->user_photo; ?>">
               <input type="hidden" value="<?php echo $testimony->id?>" name="update_rec_id">
               <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
               <?php } ?>     
            </div>
            <?php echo form_close();?>                      
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
             $.validator.addMethod("lettersonly", function(a, b) {
                 return this.optional(b) || /^[a-z ]+$/i.test(a)
             }, "<?php echo $this->lang->line('valid_name');?>");
             $.validator.addMethod("letters", function(a, b) {
                 return this.optional(b) || /^[a-z ]+$/i.test(a)
             }, "<?php echo $this->lang->line('valid_description');?>");
             //form validation rules
             $("#testimony_settings_form").validate({
                 rules: {
                     author: {
                         required: true,
                         lettersonly: true
                     },
                     description: {
                         required: true
                     }
                 },
                 messages: {
                     author: {
                         required: "<?php echo $this->lang->line('author_valid');?>"
                     },
                     description: {
                         required: "<?php echo $this->lang->line('description_valid');?>"
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
 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {

                    input.style.width = '100%';
                                    $('#testimonial_image')
                        .attr('src', e.target.result);
                                    $('#testimonial_image').fadeIn();
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>