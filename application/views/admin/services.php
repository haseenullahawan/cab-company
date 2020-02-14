<div class="col-md-12 padding white right-p">
   <div class="content">
      <div class="main-hed"> 
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
         <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
      </div>
      <?php echo $this->session->flashdata('message'); ?>
      <div class="col-md-12 padding-p-r">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
               <a class="btn btn-primary add-btn" href="<?php echo site_url(); ?>/settings/services/Add">
               <i class="fa fa-plus">&nbsp;<?php echo $this->lang->line('add');?></i></a>
            </div>
            <div class="module-body">
               <table id="example" class="cell-border example" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('image');?></th>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('meta_tag');?></th>
                        <th><?php echo $this->lang->line('meta_description');?></th>
                        <th><?php echo $this->lang->line('seo_keywords');?></th>
                        <th><?php echo $this->lang->line('package');?></th>
                        <th><?php echo $this->lang->line('status');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('image');?></th>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('meta_tag');?></th>
                        <th><?php echo $this->lang->line('meta_description');?></th>
                        <th><?php echo $this->lang->line('seo_keywords');?></th>
                        <th><?php echo $this->lang->line('package');?></th>
                        <th><?php echo $this->lang->line('status');?></th>
                        <th><?php echo $this->lang->line('index_action_th');?></th>
                     </tr>
                  </tfoot>
                  <tbody>
                     <?php 
                        $i=1;
                        foreach($aboutus_recs as $row):?>
                     <tr>
                        <td><?php echo $i; $i++;?></td>
                        <?php if($row->image != ""): ?>
                            <td><img src="<?php echo base_url();?>uploads/service_images/<?php echo $row->image; ?>" width="60"></td>
                        <?php else: ?>
                            <td></td>
                        <?php endif;?>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->meta_tag;?></td>
                        <td><?php echo $row->meta_description;?></td>
                        <td><?php echo $row->seo_keywords;?></td>
                        <td><?php echo $row->package_id;?></td>
                        <td><?php echo $row->status;?></td>
                        <td>
                           <a class="btn btn-warning" type="button" href="<?php echo site_url(); ?>/settings/services/Edit/<?php echo $row->id?>" ><i class="fa fa-edit"></i></a>
                           <a class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="changeDeleteId(<?php echo $row->id;?>)" ><i class="fa fa-trash"></i></a>
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
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Warning</h4>
         </div>
         <div class="modal-body">
            Are you sure to delete ?
         </div>
         <div class="modal-footer">
            <a type="button" class="btn btn-default" id="delete_no" href="">Yes</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<script>
   function changeDeleteId(x) {
      
   	var str = "<?php echo site_url(); ?>/settings/services/Delete/" + x;
   	
       $("#delete_no").attr("href",str);
    
   }
</script>