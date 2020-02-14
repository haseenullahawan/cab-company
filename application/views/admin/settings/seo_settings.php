<div class="col-md-12"><!--col-md-10 padding white right-p-->
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
              
            </div>
            <div class="module-body">
               <table id="example" class="cell-border example" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('site_title');?></th>
                        <th><?php echo $this->lang->line('site_description');?></th>
                        <th><?php echo $this->lang->line('site_keywords');?></th>
                        <th><?php echo $this->lang->line('google_analytics');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('site_title');?></th>
                        <th><?php echo $this->lang->line('site_description');?></th>
                        <th><?php echo $this->lang->line('site_keywords');?></th>
                        <th><?php echo $this->lang->line('google_analytics');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                     </tr>
                  </tfoot>
                  <tbody>
                     <?php 
                        $i=1;
                        foreach($seo_settings as $row):?>
                     <tr>
                        <td><?php echo $i; $i++;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->site_title;?></td>
                        <td><?php echo $row->site_description;?></td>
                        <td><?php echo $row->site_keywords;?></td>
                        <td><?php echo $row->google_analytics;?></td>
                        <td>
                           <a class="btn btn-warning" type="button" href="<?php echo site_url(); ?>/settings/seoSettings/Edit/<?php echo $row->id;?>" ><i class="fa fa-edit"></i></a>
                          
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
