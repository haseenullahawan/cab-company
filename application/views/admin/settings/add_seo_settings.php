<div class="col-md-12"><!--col-md-10 padding white right-p-->
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
               $attributes = array('name' => 'seo_settings_form', 'id' => 'seo_settings_form');
               echo form_open("settings/seoSettings/".$operation,$attributes) ?>
            <div class="module-body">
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('name');?></label>    
                  <input type="text" name="name" placeholder="<?php echo $this->lang->line('name');?>" value="<?php 
                     if(isset($seo_setting_rec->name))
                     echo $seo_setting_rec->name;
                      echo set_value('name');?>"/>   
                  <?php echo form_error('name');?>
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('site_title');?></label>    
                  <input type="text" name="site_title" placeholder="<?php echo $this->lang->line('site_title');?>" value="<?php 
                     if(isset($seo_setting_rec->site_title))
                     echo $seo_setting_rec->site_title;echo set_value('site_title');
                     ?>" />    
                  <?php echo form_error('site_title');?>
               </div>
               <label><?php echo $this->lang->line('site_description');?></label>
               <div class="form-group">                    
                  <textarea class="ckeditor" id="editor1" name="site_description" cols="100" rows="10"><?php if(isset($seo_setting_rec->site_description))
                     echo $seo_setting_rec->site_description;echo set_value('site_description'); ?></textarea>
                  <?php echo form_error('site_description');?>
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('site_keywords');?></label>    
                  <input type="text" name="site_keywords" placeholder="<?php echo $this->lang->line('site_keywords');?>" value="<?php 
                     if(isset($seo_setting_rec->site_keywords))
                     echo $seo_setting_rec->site_keywords;echo set_value('site_keywords');
                     ?>" />    <?php echo form_error('site_keywords');?>
               </div>
               <div class="form-group">                    
                  <label><?php echo $this->lang->line('google_analytics');?></label>    
                  <input type="text" name="google_analytics" placeholder="<?php echo $this->lang->line('google_analytics');?>" value="<?php 
                     if(isset($seo_setting_rec->google_analytics))
                     echo $seo_setting_rec->google_analytics;echo set_value('google_analytics');
                     ?>" />    <?php echo form_error('google_analytics');?>
               </div>
               <?php 
                  if($operation == "Add" ) {?>
               <input type="submit" value="<?php echo $this->lang->line('add');?>" name="submit" />
               <?php   } 
                  else { 
                  ?>
               <input type="hidden" value="<?php if(isset($seo_setting_rec->id)) echo $seo_setting_rec->id?>" name="update_rec_id">
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
            //form validation rules
            $("#seo_settings_form").validate({
                rules: {
                    name: {
                        required: true,
                        lettersonly: true
                    },
                    site_title: {
                        required: true
                    },
                    site_description: {
                        required: true
                    },
                    site_keywords: {
                        required: true
                    },
                    google_analytics: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "<?php echo $this->lang->line('name_valid');?>"
                    },
                    site_title: {
                        required: "<?php echo $this->lang->line('site_title_valid');?>"
                    },
                    site_description: {
                        required: "<?php echo $this->lang->line('site_description_valid');?>"
                    },
                    site_keywords: {
                        required: "<?php echo $this->lang->line('site_keywords_valid');?>"
                    },
                    google_analytics: {
                        required: "<?php echo $this->lang->line('google_analytics_valid');?>"
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