<div class="col-md-12 padding white right-p reason-tobook"><!--col-md-10 padding white right-p-->
   <?php echo $this->session->flashdata('message'); ?>
   <div class="main-hed"> 
      <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
      <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
   </div>
   <div class="col-md-6 padding-p-l">
      <div class="content">
         <div class="module">
             <!--<div class="module-head">
              <h3><?php echo $title;?></h3>
            </div>-->
            <?php 
               $attributes = array('name' => 'add_reasons_to_book_form', 'id' => 'add_reasons_to_book_form');
               		  echo form_open("settings/reasonsToBook/reasons",$attributes) ?>
            <div class="module-body">
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('reasons_to_book');?></label>    
                  <input type="text" name="title" value="<?php 
                     if(isset($reasons_rec->title))
                     echo $reasons_rec->title;echo set_value('title');
                     ?>" /> <?php echo form_error('title');?>   
               </div>
               <label><?php echo $this->lang->line('content');?></label>
               <div class="form-group">                    
                  <textarea class="ckeditor" id="editor1" name="content" cols="100" rows="10"><?php if(isset($reasons_rec->content))
                     echo $reasons_rec->content;echo set_value('content'); ?></textarea>
                  <?php echo form_error('content');?> 
               </div>
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>											
                  <?php 					 
                     $options = array(						
                     "Active" => "Active",
                     "Inactive" => "Inactive"								
                     						
                     );	
                     
                     $select = array();
                     if(isset($reasons_rec->status)) {
                     $select = array(								
                     			$reasons_rec->status		
                     			);					  			
                     }
                     echo form_dropdown('status',$options,$select,'class = "chzn-select"');					 
                     
                     ?> 
               </div>
               <input type="hidden" value="<?php if(isset($reasons_rec->id)) echo $reasons_rec->id?>" name="update_rec_id">
               <input type="submit"  value="<?php echo $this->lang->line('update');?>" name="submit" />
               <?php echo form_close();?>                      
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 padding-p-l">
      <div class="content">
         <div class="module">
            <!--<div class="module-head">
               <h3><?php echo $this->lang->line('instructions');?></h3>
            </div>-->
            <?php 
               $attributes = array('name' => 'add_instructions_form', 'id' => 'add_instructions_form');
               		  echo form_open("settings/reasonsToBook/instructions",$attributes) ?>
            <div class="module-body">
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('instructions');?></label>    
                  <input type="text" name="instructions_title" value="<?php 
                     if(isset($instructions_rec->title))
                     echo $instructions_rec->title;echo set_value('instructions_title');
                     ?>" /> 
                  <?php echo form_error('instructions_title');?>				  
               </div>
               <label><?php echo $this->lang->line('content');?></label>
               <div class="form-group">                    
                  <textarea class="ckeditor" id="editor1" name="instructions_content" cols="100" rows="10">
                  <?php if(isset($instructions_rec->content))
                     echo $instructions_rec->content;echo set_value('instructions_content'); ?></textarea>
                  <?php echo form_error('instructions_content');?>	
               </div>
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>											
                  <?php 					 
                     $options = array(						
                     "Active" => "Active",
                     "Inactive" => "Inactive"								
                     						
                     );	
                     
                     $select = array();
                     if(isset($instructions_rec->status)) {
                     $select = array(								
                     			$instructions_rec->status		
                     			);					  			
                     }
                     echo form_dropdown('status',$options,$select,'class = "chzn-select"');					 
                     
                     ?> 
               </div>
               <input type="hidden" value="<?php if(isset($instructions_rec->id)) echo $instructions_rec->id?>"  name="update_rec_id">
               <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
               <?php echo form_close();?>                      
            </div>
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
             }, "Please enter valid name.");
             //form validation rules
             $("#add_instructions_form").validate({
                 rules: {
                     title: {
                         required: true,
                         lettersonly: true
                     }
                 },
                 messages: {
                     title: {
                         required: "<?php echo $this->lang->line('title_valid');?>"
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
<!--	Validations	-->
<script type="text/javascript"> 
   (function($, W, D) {
    var JQUERY4U = {};
    JQUERY4U.UTIL = {
        setupFormValidation: function() {
            //Additional Methods			
            $.validator.addMethod("lettersonly", function(a, b) {
                return this.optional(b) || /^[a-z ]+$/i.test(a)
            }, "<?php echo $this->lang->line('valid_name');?>");
            //form validation rules
            $("#add_reasons_to_book_form").validate({
                rules: {
                    title: {
                        required: true,
                        lettersonly: true
                    }
                },
                messages: {
                    title: {
                        required: "<?php echo $this->lang->line('title_valid');?>"
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