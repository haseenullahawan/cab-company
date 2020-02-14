<style>
   #myList { margin:0; padding:0; }
   #myList li{ display: none;
   float: left;
   list-style: outside none none;
   margin: 0px 6px;
   padding: 0;
 width: 47.5%;
   }
   #loadMore {
   background: none repeat scroll 0 0 #121e31;
   color: #fff;
   cursor: pointer;
   float: left;
   margin: 40px 16px;
   padding: 6px 11px;
   }
   #loadMore:hover {
   color:#ffda31
   }
   #showLess {
   background: none repeat scroll 0 0 #121e31;
   color: #fff;
   cursor: pointer;
   float: left;
   margin:20px 16px;
   padding: 6px 11px;
   }
   #showLess:hover {
   color:#ffda31
   } 
</style>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"> <?php echo $this->lang->line('terms_conditions');?> </h4>
         </div>
         <div class="modal-body" id="tnc">	   
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close');?> </button>
         </div>
      </div>
   </div>
</div>
<div class="container padding-p-0 banner">
   <div class="row">
      <div class="col-md-8 padding-p-l">
         <aside class="hedding"> <?php echo $this->lang->line('packages');?>  </aside>
      </div>
      <div class="col-md-4 padding-p-r">
         <aside class="bradecom">
            <ul>
               <li> <a href="#"> <?php echo $this->lang->line('home');?> </a> </li>
               <li>>></li>
               <li class="active"> <a href="#"> <?php echo $sub_heading;?> </a> </li>
            </ul>
         </aside>
      </div>
   </div>
</div>
</header>
<div class="container-fluid body-bg">
   <div class="container body-border"> <!--padding-p-0 -->
       <div class="breadcrumb">
            <div class="row">
               <aside class="nav-links">
                  <ul>
                     <li> <a href="<?php echo site_url(); ?>/"> <?php echo $this->lang->line('home');?>  </a> </li>
                     <li class="active"><a href="javascript:void(0)">&nbsp;<?php if(isset($sub_heading)) echo $sub_heading; ?> </a></li>
                  </ul>
               </aside>
            </div>
        </div>
      <div class="row">
         <div class="col-md-9">
            <div class="left-side-cont">
               <article class="content">
			   <?php if(count($records)>0) { ?>
                  <ul id="myList">
                     <?php 
                        $sno = 1; foreach ($records as $r) { ?>
                     <li class="dum">
                        <div class="col-md-12 padding">
                           <div class="first-car white padding">
                              <div class="first-car-hed"><?php echo $r->name;?></div>
                              <div class="first-car-img"> <img width="100%" src="<?php echo base_url();?>uploads/vehicle_images/<?php if($r->image != "") echo $r->image; else echo "default-car.jpg";?>"title="<?php echo $r->vehicle_name." - ".$r->model;?>"> </div>
                              <div class="rl">
                                 <div class="col-md-12 padding-p-r">
                                    <div class="de">
                                       <ul>
                                          <div class="de-hed"><?php echo $this->lang->line('package_details_caps');?></div>
                                          <li><strong> <?php echo $this->lang->line('hours');?> :</strong> <?php echo $r->hours;?> </li>
                                          <li><strong> <?php echo $this->lang->line('distance');?> : </strong><?php echo $r->distance;?> </li>
                                          <li><strong><?php echo $this->lang->line('fare');?>: </strong> <?php echo $r->min_cost;?></li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div class="list-pass">
                                 <div class="col-md-12 padding-p-r">
                                    <div class="de-extra">
                                       <ul>
                                          <div class="de-hed"><?php echo $this->lang->line('package_extras');?></div>
                                          <li><strong> <?php echo $this->lang->line('after_distance');?>(<?php echo $this->lang->line('per_km');?>) :</strong> <?php echo $r->charge_distance;?> </li>
                                          <li><strong> <?php echo $this->lang->line('after_time');?>(<?php echo $this->lang->line('per_hr');?>) : </strong><?php echo $r->charge_hour;?> </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group margin-p-b">
                                    <div class="panel panel-default bb">
                                       <div id="headingOne" role="tab" class="panel-heading ters-hed">
                                          <h4 class="panel-title pp">
                                             <a aria-controls="CollapseOne" aria-expanded="false" data-toggle="modal" data-target="#myModal" href="#<?php echo $sno;?>" class="collapsed" id="<?php echo htmlentities($r->terms_conditions);?>" onclick="append_tnc(this.id)">
                                             <?php echo $this->lang->line('terms_conditions');?>	</a>	 
                                          </h4>
                                       </div>
                                       <!--  <div aria-labelledby="headingOne" role="tabpanel" class="panel-collapse out collapse" id="collapse<?php echo $sno++;?>" aria-expanded="false" style="height: 0px;">
                                          <div class="panel-body">
                                            <?php if(isset($r->terms_conditions) && $r->terms_conditions!='') echo $r->terms_conditions; else echo "No Alcoholic beverages allowed in the car.";?>
                                          </div>
                                          </div>-->
                                    </div>
                                 </div>
                              </div>
							 
                              <div class="book">
                                 <a href="<?php echo site_url();?>/packages/booking/<?php echo $r->id;?>" class="pa-cbook"><?php echo $this->lang->line('book_now');?></a>
                              </div>
							 
                           </div>
                        </div>
                     </li>
                     <?php } ?>
                  </ul>
				   <?php if(count($records)>4) {?>
                  <div class="col-md-12 padding">
                     <div id="loadMore"> <i class="fa fa-search-plus"></i> <?php echo $this->lang->line('load_more');?></div>
                     <br/>
                     <div id="showLess" style="display:none;"> <i class="fa fa-search-minus"></i> <?php echo $this->lang->line('show_less');?></div>
                  </div>
				   <?php }?>
				 <?php } else {echo "<h4 align='middle' style='margin:100px 0px;'>Coming Soon.</h4>";}?>
               </article>
            </div>
         </div>
         <div class="col-md-3">
            <?php $this->load->view('site/common/reasons_to_book'); ?>
         </div>
      </div>
   </div>
</div>
</div>
<script>
   $(document).ready(function () {
   	tot_records = <?php echo count($records)?>;
       size_li = $(".dum").size();
       x=4;
       $('.dum:lt('+x+')').show();
       $('#loadMore').click(function () {
           x= (x+6 <= size_li) ? x+6 : size_li;
           $('.dum:lt('+x+')').slideDown();		
   		if(tot_records == $('.dum:visible').size()) {
   		
   			$('#loadMore').hide();
   			$('#showLess').show();
   		}
       });
       $('#showLess').click(function () {
   
           $('.dum').not(':lt('+4+')').slideUp();		
   			$('#showLess').hide();
   			$('#loadMore').show();
       });
   });
   
   function append_tnc(id)
   {
   	$('#tnc').html(id);
   }
   
</script>