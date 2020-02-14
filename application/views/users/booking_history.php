<!--<div class="container padding-p-0 banner">
   <div class="row">
      <div class="col-md-8 padding-p-l">
         <aside class="hedding"><?php echo $title;?></aside>
      </div>
      <div class="col-md-4 padding-p-r">
         <aside class="bradecom">
            <ul>
               <li> <a href="#"> <?php echo $this->lang->line('home_page');?> </a> </li>
               <li>>></li>
               <li class="active"> <a href="#"><?php echo $title;?></a> </li>
            </ul>
         </aside>
      </div>
   </div>
</div>-->
</header>
<div class="container-fluid body-bg">
    <div class="container body-border">
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
        <div class="scroll-up">
           <div class="container-fluid">
              <div class="padding-p-0">
                 <div class="row" style="margin-bottom:30px;">
                    <div class="col-md-12">
                       <div class="left-side-cont">
                          <div class="col-md-12 padding-p-0">
                             <div class="data-table">
                                <table id="example" class="cell-border example" cellspacing="0" width="100%">
                                   <thead>
                                      <tr>
                                         <th>#</th>
                                         <th><?php echo $this->lang->line('booking_date');?></th>
                                         <th><?php echo $this->lang->line('booking_source');?></th>
                                         <th><?php echo $this->lang->line('booking_destination');?></th>
                                         <th><?php echo $this->lang->line('distance');?></th>
                                         <th><?php echo $this->lang->line('amount');?></th>
                                         <th><?php echo $this->lang->line('status');?></th>
                                         <th><?php echo $this->lang->line('action');?></th>
                                      </tr>
                                   </thead>
                                   <tfoot>
                                      <tr>
                                         <th>#</th>
                                         <th><?php echo $this->lang->line('booking_date');?></th>
                                         <th><?php echo $this->lang->line('booking_source');?></th>
                                         <th><?php echo $this->lang->line('booking_destination');?></th>
                                         <th><?php echo $this->lang->line('distance');?></th>
                                         <th><?php echo $this->lang->line('amount');?></th>
                                         <th><?php echo $this->lang->line('status');?></th>
                                         <th><?php echo $this->lang->line('action');?></th>
                                      </tr>
                                   </tfoot>
                                   <tbody>
                                      <?php 
                                         $i=1;
                                         foreach($booking_history as $row):?>
                                      <tr>
                                         <td class="center"><?php echo $i++; ?></td>
                                         <td class="center"><?php echo $row->pick_date;?></td>
                                         <td><?php echo $row->pick_point;?></td>
                                         <td><?php echo $row->drop_point;?></td>
                                         <td><?php echo $row->distance;?></td>
                                         <td><?php echo $row->cost_of_journey;?></td>
                                         <td>
                                            <?php if($row->is_conformed=="pending") { ?>
                                            <span class="label label-warning"><?php echo $this->lang->line('status_pending'); // $row->is_conformed;?></span>
                                            <?php } else if($row->is_conformed=="confirm") { ?>
                                            <span class="label label-success"><?php echo $this->lang->line('status_confirm'); // $row->is_conformed;?></span>
                                            <?php } else if($row->is_conformed=="cancelled") { ?>
                                            <span class="label label-danger"><?php echo $this->lang->line('status_canceled'); // $row->is_conformed;?></span>
                                            <?php }?>
                                         </td>
                                         <td>
                                            <?php if($row->is_conformed=="pending") { ?>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="changeStatus(<?php echo $row->id;?>)"><i><?php echo $this->lang->line('cancel');?></i></button>
                                            <?php } ?>
                                         </td>
                                      </tr>
                                      <?php endforeach;?>
                                   </tbody>
                                </table>
                             </div>
                          </div>
                       </div>
                    </div>
                    <!--<div class="col-md-3">
                       <?php // $this->load->view('site/common/reasons_to_book'); ?>
                    </div>-->
                 </div>
              </div>
           </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo $this->lang->line('close');?></span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('warning');?></h4>
         </div>
         <div class="modal-body">
            <?php echo $this->lang->line('sure_delete');?>
         </div>
         <div class="modal-footer">
            <a type="button" class="btn btn-default" id="change_status" href=""><?php echo $this->lang->line('yes');?></a>
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close');?></button>
         </div>
      </div>
   </div>
</div>
<script>
   function changeStatus(x) {
      
   	var str = "<?php echo site_url(); ?>/users/myBookings/Cancel/" + x;
   	
       $("#change_status").attr("href",str);
    
   }
</script>