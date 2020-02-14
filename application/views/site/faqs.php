</header>
<div class="container-fluid body-bg">
   <div class="container body-border"><!--padding-p-0 -->
       <div class="breadcrumb">
            <div class="row">
               <aside class="nav-links">
                  <ul>
                     <li> <a href="<?php echo site_url(); ?>/"> <?php echo $this->lang->line('home_page');?>  </a> </li>
                     <li class="active"><a href="javascript:void(0)">&nbsp;<?php if(isset($sub_heading)) echo $sub_heading; ?> </a></li>
                  </ul>
               </aside>
            </div>
        </div>
      <div class="row">
         <div class="col-md-6">
            <div class="left-side-cont" style="margin:0px 0px 200px 15px;">
               <article class="content">
                  <!--<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                     <?php 			 $i=0;			 foreach($faqs as $row):			 $i++;			 ?>
                     <div class="panel panel-default">
                        <div class="panel-heading faq-hed" role="tab" id="heading<?php echo $i;?>">
                           <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapseOne">
                              <?php echo $row->question;?>
                              </a>
                           </h4>
                        </div>
                        <div id="collapse<?php echo $i;?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                           <div class="panel-body">
                              <?php echo $row->answer;?>
                           </div>
                        </div>
                     </div>
                     <?php endforeach;?>	
                  </div>-->
                  <div class="faqs">
                    <div class="faq-container">
                          <?php   $i=0;			 
                                  foreach($faqs as $row): $i++;   ?>
                                      <section class="faq">
                                          <h3 class="heade"><?php echo $row->question;?></h3>
                                          <div class="answer"><?php echo $row->answer;?></div>
                                      </section>    
                          <?php   endforeach; ?>	
                    </div>
                </div>      
               </article>
            </div>
         </div>
         <div class="col-md-6">
            <?php //    $this->load->view('site/common/reasons_to_book'); ?>
         </div>
      </div>
   </div>
</div>
 <script type="text/javascript" language="javascript">    
    $("#faqs .faq-content").hide();
    $("#faqs .faq-head").click(function () {
        $(this).next("#faqs .faq-content").slideToggle(500);
        $(this).toggleClass("expanded");
    });
    
     $('.faq h3').click(function() {
        $(this).next('.answer').slideToggle(500);
        $(this).toggleClass('closed');
    });
    
    
</script>    