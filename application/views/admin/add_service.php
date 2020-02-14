<div class="col-md-12 padding white right-p">
   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>
      <div class="col-md-12 padding-p-l">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
            </div>
            <div class="module-body">
               <?php 
                  $attributes = array('name' => 'add_service', 'id' => 'add_service');
                   echo form_open_multipart("settings/services/".$operation,$attributes) ;  ?>
               <div class="col-md-6">
                   <h3>French</h3> 
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('title');?></label>    
                     <input type="text" name="title_fr" placeholder="<?php echo $this->lang->line('title');?>" value="<?php 
                        if(isset($aboutus_rec->name_fr))
                        echo $aboutus_rec->name_fr;echo set_value('title');
                        ?>" />   
                     <?php echo form_error('title');?>			  
                  </div>
                  <label><?php echo $this->lang->line('description');?></label>
                  <div class="form-group">                    
                     <textarea class="ckeditor" id="editor1" name="description_fr" cols="100" rows="10"><?php if(isset($aboutus_rec->description_fr))
                        echo $aboutus_rec->description_fr; ?></textarea>
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('meta_tag');?></label>    
                     <textarea rows="2" cols="40" name="meta_tag_fr" placeholder="<?php echo $this->lang->line('meta_tag');?>"><?php if(isset($aboutus_rec->meta_tag_fr))
                        echo $aboutus_rec->meta_tag_fr; ?></textarea>
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('meta_tag_keywords');?></label>    
                     <textarea rows="2" cols="40" name="meta_description_fr" placeholder="<?php echo $this->lang->line('meta_tag_keywords');?>"><?php if(isset($aboutus_rec->meta_description_fr))
                        echo $aboutus_rec->meta_description_fr; ?></textarea>
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('seo_keywords');?></label>    
                     <textarea rows="2" cols="40" name="seo_keywords_fr" placeholder="<?php echo $this->lang->line('seo_keywords');?>"><?php if(isset($aboutus_rec->seo_keywords_fr))
                        echo $aboutus_rec->seo_keywords_fr; ?></textarea>
                  </div>
               </div>
               <div class="col-md-6">
                   <h3>English</h3> 
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('title');?></label>    
                     <input type="text" name="title_en" placeholder="<?php echo $this->lang->line('title');?>" value="<?php 
                        if(isset($aboutus_rec->name_en))
                        echo $aboutus_rec->name_en;echo set_value('title');
                        ?>" />   
                     <?php echo form_error('title');?>			  
                  </div>
                  <label><?php echo $this->lang->line('description');?></label>
                  <div class="form-group">                    
                     <textarea class="ckeditor" id="editor1" name="description_en" cols="100" rows="10"><?php if(isset($aboutus_rec->description_en))
                        echo $aboutus_rec->description_en; ?></textarea>
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('meta_tag');?></label>    
                     <textarea rows="2" cols="40" name="meta_tag_en" placeholder="<?php echo $this->lang->line('meta_tag');?>"><?php if(isset($aboutus_rec->meta_tag_en))
                        echo $aboutus_rec->meta_tag_en; ?></textarea>
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('meta_tag_keywords');?></label>    
                     <textarea rows="2" cols="40" name="meta_description_en" placeholder="<?php echo $this->lang->line('meta_tag_keywords');?>"><?php if(isset($aboutus_rec->meta_description_en))
                        echo $aboutus_rec->meta_description_en; ?></textarea>
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('seo_keywords');?></label>    
                     <textarea rows="2" cols="40" name="seo_keywords_en" placeholder="<?php echo $this->lang->line('seo_keywords');?>"><?php if(isset($aboutus_rec->seo_keywords_en))
                        echo $aboutus_rec->seo_keywords_en; ?></textarea>
                  </div>
               </div>
                <div class="col-md-6">
                    
                  <div class="form-group">                     
                     <label class="control-label"><?php echo $this->lang->line('package');?></label>											
                     <?php 					 
                        $select = array();
                        
                        if(isset($aboutus_rec->package_id)) {
                        $select = array(								
                        				$aboutus_rec->package_id		
                        				);					  			
                        }
                         
                         echo form_dropdown('package_id',$package_opts,$select,'class = "chzn-select"');					 
                         
                         ?>   
                  </div>
                  <div class="form-group">                     
                     <label class="control-label"><?php echo $this->lang->line('status');?></label>											
                     <?php 					 
                        $options = array(						
                        "Active" => "Active",
                        "Inactive" => "Inactive"								
                        						
                        );	
                        
                        $select = array();
                        if(isset($aboutus_rec->status)) {
                        $select = array(								
                        			$aboutus_rec->status		
                        			);					  			
                        }
                        echo form_dropdown('status',$options,$select,'class = "chzn-select"');					 
                        
                        ?>   
                  </div>
                   <div class="form-group">                    
                      <label>Sequence</label>    
                      <input type="text" name="order_no" placeholder="Order No" value="<?php 
                         if(isset($aboutus_rec->order_no))
                         echo $aboutus_rec->order_no;echo set_value('order_no');
                         ?>" />   
                      <?php echo form_error('order_no');?>			  
                   </div>
                   
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo $this->lang->line('image'); ?></label>
                         <input name="servicefile" id="image" type="file" title="<?php echo $this->lang->line('services')." ".$this->lang->line('image');?>" onchange="readURL(this)" style="width:80px;">
                        <br/>
                        <?php 

                                $src = "";
                                $style="display:none;";

                                if(isset($aboutus_rec->image) && $aboutus_rec->image != "") {

                                        $src = base_url()."uploads/service_images/".$aboutus_rec->image;
                                        $style="";

                                }
                        ?>
                        <img id="service_image" src="<?php echo $src;?>" height="120" style="<?php echo $style;?>" />
                    </div>
                  <div class="form-group">
                     <?php 
                        if($operation == "Add" ) {?>
                     <input type="submit" value="<?php echo $this->lang->line('add');?>" name="submit" />
                     <? } else { ?>
                     <input name="current_img" id="current_img" type="hidden" value="<?php if(isset($aboutus_rec->image)) echo $aboutus_rec->image; ?>">
                     <input type="hidden" value="<?php echo $aboutus_rec->id?>" name="update_rec_id">
                     <input type="submit" value="<?php echo $this->lang->line('update');?>" name="submit" />
                     <?php } ?>    
                  </div>
                </div>
            </div>
            <?php echo form_close();?>                      
         </div>
      </div>
   </div>
</div>
<!--validations-->
<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              //Additional Methods			
   		
   		
   		$.validator.addMethod("lettersonly",function(a,b){return this.optional(b)||/^[a-z ]+$/i.test(a)},"Please enter valid name.");
   		
   		
   		
   	
   		//form validation rules
              $("#add_about_us").validate({
                  rules: {
                      title: {
                          required: true,
                          lettersonly: true,
   					rangelength: [1, 30]
                      },
   		description: {
                          required: true,
                      },  
                  },
   			
   			messages: {
   				title: {
                          required: "<?php echo $this->lang->line('title_valid');?>"
                      },
   				description: {
                          required: "<?php echo $this->lang->line('description_valid');?>"
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
   function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {

                    input.style.width = '100%';
                                    $('#service_image')
                        .attr('src', e.target.result);
                                    $('#service_image').fadeIn();
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>