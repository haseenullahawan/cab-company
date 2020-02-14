<div class="col-md-12"><!--col-md-10 padding white right-p-->
   <div class="content">
      <div class="main-hed">
         <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a> 
         <?php if(isset($title)) echo " >> Users >> ".$title;?>
      </div>
      <?php echo $this->session->flashdata('message'); ?>
      <div class="col-md-12 padding-p-r">
         <div class="module">
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
               <a class="btn btn-primary add-btn" href="<?php echo site_url(); ?>/admin/addCustomers">
               <i class="fa fa-plus">&nbsp;<?php echo $this->lang->line('add');?></i></a>
            </div>
            <div class="module-body">
               <table id="example" class="cell-border example" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('user_name');?></th>
                        <th><?php echo $this->lang->line('email');?></th>
                        <th><?php echo $this->lang->line('phone');?></th>
                        <th><?php echo $this->lang->line('date');?></th>
                        <th><?php echo $this->lang->line('status');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('user_name');?></th>
                        <th><?php echo $this->lang->line('email');?></th>
                        <th><?php echo $this->lang->line('phone');?></th>
                        <th><?php echo $this->lang->line('date');?></th>
                        <th><?php echo $this->lang->line('status');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                     </tr>
                  </tfoot>
                  <tbody>
                     <?php 
                        $i=1;
                        foreach($customers as $row):?>
                     <tr>
                        <td><?php echo $i; $i++;?></td>
                        <td><?php echo $row->first_name." ".$row->last_name;?></td>
                        <td><?php echo $row->email;?></td>
                        <td><?php echo $row->phone;?></td>
                        <td><?php echo $row->date_of_registration;?></td>
                        <td><?php if($row->active=='1') echo 'Active'; else echo 'Inactive'; ?></td>
                        <td>
                           <?php echo ($row->active) ? anchor("admin/deactivate/".$row->id, lang('index_active'),'class="btn btn-primary"') : anchor("admin/activate/". $row->id, lang('index_inactive'),'class="btn btn-warning"');?> 
                           <a class="btn btn-success" type="button" href="<?php echo site_url(); ?>/admin/editCustomers/Edit/<?php echo $row->id?>" ><i class="fa fa-edit"></i></a>
                           <a class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="changeDeleteId(<?php echo $row->id;?>)"><i class="fa fa-trash"></i></a>
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
    <div class="modal-dialog" style="margin-top:375px;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo $this->lang->line('close');?></span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('warning');?></h4>
         </div>
         <div class="modal-body">
            <?php echo $this->lang->line('sure_delete');?>
         </div>
         <div class="modal-footer">
            <a type="button" class="btn btn-default" id="delete_no" href=""><?php echo $this->lang->line('yes');?></a>
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('close');?></button>
         </div>
      </div>
   </div>
</div>
<script>
   function changeDeleteId(x) {
   	var str = "<?php echo site_url(); ?>/admin/deleteCustomer/Delete/" + x;
       $("#delete_no").attr("href",str);
   }
</script>