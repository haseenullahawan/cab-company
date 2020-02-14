<div class="col-md-10 padding white right-p">
   <div class="content">
      <div class="col-md-12 padding-p-l">
         <?php echo $this->session->flashdata('message');?>              
         <div class="module">
            <div class="main-hed">
               <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a> 
               <?php if(isset($title)) echo " >> Dashboard >> ".$title;?>
            </div>
            <div class="module-head">
               <!--<h3><?php // echo $title;?></h3>-->
            </div>
            <div class="module-body">
               <div class="col-md-8 padding-p-l">
                  <div class="panel panel-default">
                     <div class="panel-body padding-p-l padding-p-r">
                        <table class="table table-striped">
                           <?php foreach($users as $row):?>
                           <tr>
                              <!--<td colspan="4"> 
                                 <img src="<?php //echo base_url(); ?>/assets/system_design/images/profile-img.jpg"/>
                                 
                                 </td>-->
                           </tr>
                           <tr>
                              <td><strong><?php echo $this->lang->line('first_name');?> : </strong></td>
                              <td><?php if(isset($row->first_name)) echo $row->first_name;?> </td>
                              <td> <strong><?php echo $this->lang->line('phone');?> :</strong> </td>
                              <td> <?php if(isset($row->phone)) echo $row->phone;?></td>
                           </tr>
                           <tr>
                              <td> <strong><?php echo $this->lang->line('last_name');?> : </strong></td>
                              <td> <?php if(isset($row->last_name)) echo $row->last_name;?> </td>
                              <td> <strong> <?php echo $this->lang->line('email');?>: </strong></td>
                              <td><?php if(isset($row->email)) echo $row->email;?></td>
                           </tr>
                           <tr>
                              <td> <strong><?php echo $this->lang->line('user_name');?>:</strong> </td>
                              <td> <?php if(isset($row->username)) echo $row->username;?> </td>
                              <td> <strong><?php echo $this->lang->line('date_of_registration');?>  :</strong> </td>
                              <td> <?php if(isset($row->date_of_registration)) echo $row->date_of_registration;?> </td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group">   
                     <?php echo ($row->active) ? anchor("admin/deactivate/".$row->id."/users", lang('index_active'),'class="btn btn-primary"') : anchor("admin/activate/".$row->id."/users", lang('index_inactive'),'class="btn btn-warning"');?> 
                  </div>
               </div>
               <?php endforeach;?> 
            </div>
         </div>
         <?php echo form_close();?>  
      </div>
   </div>
</div>
</div>