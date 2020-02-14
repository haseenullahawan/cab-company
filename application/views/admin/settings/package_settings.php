<div class="col-md-12 padding white right-p">
          <div class="content">
        <?php echo $this->session->flashdata('message'); ?>
          <div class="col-md-12 padding-p-r">
              <div class="main-hed"> 
                    <a href="<?php echo site_url();?>/auth"><?php echo $this->lang->line('home');?></a>
                    <?php if(isset($title)) echo " >> Master Settings >> ".$title;?>
                </div>
            <div class="module">
                    
			
			
			
			
			
				
                  <div class="module-head">
                <!--<h3><?php echo $this->lang->line('package_settings');?></h3>-->
				
				<a class="btn btn-primary add-btn" href="<?php echo site_url(); ?>/settings/packageSettings/Add">
					<i class="fa fa-plus">&nbsp;<?php echo $this->lang->line('add');?></i></a>
					
		 
              </div>
			  
			 
                  <div class="module-body">
				  
				  
				  
				  <table id="example" class="cell-border example" cellspacing="0" width="100%">
                      <thead>
                    <tr>
                          <th>#</th>
						  <th><?php echo $this->lang->line('name');?></th>
						  <th><?php echo $this->lang->line('hours');?></th>
                          <th><?php echo $this->lang->line('distance');?></th>
                           <th><?php echo $this->lang->line('min_cost');?></th>
						   <th><?php echo $this->lang->line('charge_distance');?></th>
                          <th><?php echo $this->lang->line('charge_hour');?></th>
						   <th><?php echo $this->lang->line('status');?></th>
						   <th><?php echo $this->lang->line('action');?></th>
                        </tr>
                  </thead>
                      <tfoot>
                    <tr>
                        <th>#</th>
						<th><?php echo $this->lang->line('name');?></th>
						<th><?php echo $this->lang->line('hours');?></th>
                        <th><?php echo $this->lang->line('distance');?></th>
						<th><?php echo $this->lang->line('min_cost');?></th>
						<th><?php echo $this->lang->line('charge_distance');?></th>
                        <th><?php echo $this->lang->line('charge_hour');?></th>
						<th><?php echo $this->lang->line('status');?></th>
						<th><?php echo $this->lang->line('action');?></th>
                        </tr>
                        </tr>
                  </tfoot>
				  
				  
				  <tbody>
				  
				  <?php 
					 $i=1;
					 foreach($package_settings as $row):?>
                    <tr>
						  <td><?php echo $i; $i++;?></td>
						  <td><?php echo $row->name;?></td>
                          <td><?php echo $row->hours;?></td>
                          <td><?php echo $row->distance;?></td>
						  <td><?php echo $row->min_cost;?></td>
						  <td><?php echo $row->charge_distance;?></td>
						  <td><?php echo $row->charge_hour;?></td>
						  <td><?php echo $row->status;?></td>
						  <td>
						  
						  <a class="btn btn-warning" type="button" href="<?php echo site_url(); ?>/settings/packageSettings/Edit/<?php echo $row->id;?>" ><i class="fa fa-edit"></i></a>
						 
						<button class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="changeDeleteId(<?php echo $row->id;?>)"><i class="fa fa-trash"></i></button>

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
   
	var str = "<?php echo site_url(); ?>/settings/packageSettings/Delete/" + x;
	
    $("#delete_no").attr("href",str);
 
}
</script>

