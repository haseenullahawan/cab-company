<div class="col-md-12 padding white right-p">
   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Dynamic Pages >> ".$title;?>
      </div>
      <div class="col-md-12 padding-p-l">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
            </div>
            <div class="module-body">
               <?php 
                  $attributes = array('name' => 'add_about_us', 'id' => 'add_about_us');
                   echo form_open("settings/aboutUs/".$operation,$attributes) ?>
               <div class="col-md-6">
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('title');?></label>    
                     <input type="text" name="title" placeholder="<?php echo $this->lang->line('title');?>" value="<?php 
                        if(isset($aboutus_rec->name))
                        echo $aboutus_rec->name;echo set_value('title');
                        ?>" />   
                     <?php echo form_error('title');?>			  
                  </div>
                  <label><?php echo $this->lang->line('description');?></label>
                  <div class="form-group">                    
                     <textarea class="ckeditor" id="editor1" name="description" cols="100" rows="10"><?php if(isset($aboutus_rec->description))
                        echo $aboutus_rec->description; ?></textarea>
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('meta_tag');?></label>    
                     <textarea rows="2" cols="40" name="meta_tag" placeholder="<?php echo $this->lang->line('meta_tag');?>"><?php if(isset($aboutus_rec->meta_tag))
                        echo $aboutus_rec->meta_tag; ?></textarea>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('meta_tag_keywords');?></label>    
                     <textarea rows="2" cols="40" name="meta_tag_keywords" placeholder="<?php echo $this->lang->line('meta_tag_keywords');?>"><?php if(isset($aboutus_rec->meta_keywords))
                        echo $aboutus_rec->meta_keywords; ?></textarea>
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('seo_keywords');?></label>    
                     <textarea rows="2" cols="40" name="seo_keywords" placeholder="<?php echo $this->lang->line('seo_keywords');?>"><?php if(isset($aboutus_rec->seo_keywords))
                        echo $aboutus_rec->seo_keywords; ?></textarea>
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('bottom')?></label>   &nbsp; 
                     <input type="checkbox" name="bottom"  value="1" <?php if(isset($aboutus_rec->is_bottom)  && 
                        ($aboutus_rec->is_bottom) == "1") echo "checked"; ?>/>
                  </div>
                  <div class="form-group">                    
                     <label><?php echo $this->lang->line('sort_order')?></label>  
                     <input type="text" name="sort_order" placeholder="<?php echo $this->lang->line('sort_order')?>" value="<?php if(isset($aboutus_rec->sort_order)) echo $aboutus_rec->sort_order;?>"/>
                  </div>
                  <div class="form-group">                     
                     <label class="control-label"><?php echo $this->lang->line('under_category');?></label>											
                     <?php 					 
                        $select = array();
                        
                        if(isset($aboutus_rec->parent_id)) {
                        $select = array(								
                        				$aboutus_rec->parent_id		
                        				);					  			
                        }
                         
                         echo form_dropdown('under_category',$category_opts,$select,'class = "chzn-select"');					 
                         
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
                     <?php 
                        if($operation == "Add" ) {?>
                     <input type="submit" value="<?php echo $this->lang->line('add');?>" name="submit" />
                     <? } else { ?>
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
</script>