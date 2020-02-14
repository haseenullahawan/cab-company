<div class="col-md-12 padding white right-p">
   <div class="content">
      <div class="main-hed">
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a> 
         <?php if(isset($title)) echo " >> ".$title;?>
      </div>
      <div class="col-md-6 padding-p-l">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
            </div>
            <?php 
               $attributes = array('name' => 'add_faqs_form', 'id' => 'add_faqs_form');
               echo form_open("settings/faqs/".$operation,$attributes) ?>
            <div class="module-body">
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('question');?></label>    
                  <input type="text" name="question" placeholder="<?php echo $this->lang->line('question');?>" value="<?php 
                     if(isset($faqs_rec->question))
                     echo $faqs_rec->question;echo set_value('question');
                     ?>" />    
                  <?php echo form_error('question');?>
               </div>
               <div>
                  <label><?php echo $this->lang->line('answer');?></label>
                  <textarea rows="2" cols="40" name="answer">
                  <?php if(isset($faqs_rec->answer))
                     echo $faqs_rec->answer;echo set_value('answer'); ?>
                  </textarea>
                  <?php echo form_error('answer');?>
               </div>
               <div class="form-group">                     
                  <label class="control-label"><?php echo $this->lang->line('status');?></label>											
                  <?php 					 
                     $options = array(						
                     "Active" => "Active",
                     "Inactive" => "Inactive"								
                     						
                     );	
                     
                     $select = array();
                     if(isset($faqs_rec->status)) {
                     $select = array(								
                     			$faqs_rec->status		
                     			);					  			
                     }
                     echo form_dropdown('status',$options,$select,'class = "chzn-select"');	
                     
                     ?>   
               </div>
               <?php 
                  if($operation == "Add" ) {?>
               <input type="submit" value="<?php echo $this->lang->line('add');?>" name="submit" />
               <?php } else { ?>
               <input type="hidden" value="<?php echo $faqs_rec->id?>" name="update_rec_id">
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
             //form validation rules
             $("#add_faqs_form").validate({
                 rules: {
                     question: {
                         required: true
                     },
                     answer: {
                         required: true
                     }
                 },
                 messages: {
                     question: {
                         required: "<?php echo $this->lang->line('question_valid');?>"
                     },
                     answer: {
                         required: "<?php echo $this->lang->line('answer_valid');?>"
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