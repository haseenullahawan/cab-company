<div class="col-md-12"><!--col-md-10 padding white right-p-->
   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Vehicles Settings >> ".$title;?>
      </div>
      <?php echo $this->session->flashdata('message'); ?>
      <div class="col-md-12 padding-p-r">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
               <a class="btn btn-primary add-btn" href="<?php echo site_url(); ?>/settings/vehicleCategories/Add">
               <i class="fa fa-plus">&nbsp;<?php echo $this->lang->line('add');?></i></a>
            </div>
            <div class="module-body">
               <table id="example" class="cell-border example" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('category');?></th>
                        <th><?php echo $this->lang->line('status');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('category');?></th>
                        <th><?php echo $this->lang->line('status');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                     </tr>
                  </tfoot>
                  <tbody>
                     <?php 
                        $i=1;
                        foreach($vehicle_categories as $row):?>
                     <tr>
                        <td><?php echo $i; $i++;?></td>
                        <td><?php echo $row->category;?></td>
                        <td><?php echo $row->status;?></td>
                        <td>
                           <a class="btn btn-warning" type="button" href="<?php echo site_url(); ?>/settings/vehicleCategories/Edit/<?php echo $row->id?>" ><i class="fa fa-edit"></i></a>
                           <?php
                              $this->db->where('category_id',$row->id);
                              $noOfVehiclesInThisCat = $this->db->count_all_results($this->db->dbprefix('vehicle'));
                              
                              if($noOfVehiclesInThisCat == 0) {						 
                              ?>
                           <a class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="changeDeleteId(<?php echo $row->id;?>)" ><i class="fa fa-trash"></i></a>
                           <?php } else { ?>
                           <a class="btn btn-danger" data-toggle="modal" data-target="#myModal1" ><i class="fa fa-trash"></i></a>
                           <?php } ?>
                        </td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!--/.module--> 
   </div>
   <!--/.content--> 
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
            <a type="button" class="btn btn-default" id="delete_no"  href="<?php echo site_url(); ?>/settings/vehicleCategories/Delete/<? echo $row->id; ?>">  <?php echo $this->lang->line('yes');?></a>
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close');?></button>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo $this->lang->line('close');?></span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('info');?></h4>
         </div>
         <div class="modal-body">
            <?php echo $this->lang->line('delete_vehicle');?>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close');?></button>
         </div>
      </div>
   </div>
</div>
<script>
   function changeDeleteId(x) {
   	var str = "<?php echo site_url(); ?>/settings/vehicleCategories/Delete/" + x;
       $("#delete_no").attr("href",str);
   }
</script>