<?php $locale_info = localeconv(); ?>
<div class="col-md-12"><!--col-md-10 padding white right-p-->
    <div class="content">
        <div class="main-hed">
            <a href="<?php echo site_url();?>/admin/dashboard"><?php echo $this->lang->line('home');?></a>
            <?php if(isset($title)) echo " >> ".$title;?>
        </div>
        <div class="col-md-12 padding-p-r">
            <div class="module">
                <?php echo $this->session->flashdata('message'); ?>
                <div class="module-head">
                    <!--<h3> <?php if(isset($title)) echo $title;?></h3>-->
                </div>
                <div class="module-body">
                    <table id="example" class="cell-border example" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo $this->lang->line('name');?></th>
                            <th><?php echo $this->lang->line('email');?></th>
                            <th><?php echo $this->lang->line('phone');?></th>
                            <th><?php echo $this->lang->line('age');?></th>
                            <th><?php echo $this->lang->line('zip_code');?></th>
                            <th><?php echo $this->lang->line('cv');?></th>
                            <th><?php echo $this->lang->line('letter');?></th>
                            <th><?php echo $this->lang->line('action');?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($data) && !empty($data)):?>
                            <?php foreach($data as $key => $item):?>
                                <tr>
                                    <td><?=$key + 1?></td>
                                    <td><?=$item->civility;?> <?=$item->first_name;?> <?=$item->last_name;?></td>
                                    <td><?=$item->email;?></td>
                                    <td><?=$item->telephone;?></td>
                                    <td><?=$item->age;?></td>
                                    <td><?=$item->postal_code;?></td>
                                    <td><?=$item->cv != "" ? "<i class='fa fa-check'></i>" : "<i class='fa fa-times'></i>";?></td>
                                    <td><?=$item->letter != "" ? "<i class='fa fa-check'></i>" : "<i class='fa fa-times'></i>";?></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-default"><i class="fa fa-eye"></i></a>
                                        <a href="#" class="btn btn-sm btn-default"><i class="fa fa-reply"></i></a>
                                        <a href="#" class="btn btn-sm btn-default"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th><?php echo $this->lang->line('name');?></th>
                            <th><?php echo $this->lang->line('email');?></th>
                            <th><?php echo $this->lang->line('phone');?></th>
                            <th><?php echo $this->lang->line('age');?></th>
                            <th><?php echo $this->lang->line('zip_code');?></th>
                            <th><?php echo $this->lang->line('cv');?></th>
                            <th><?php echo $this->lang->line('letter');?></th>
                            <th><?php echo $this->lang->line('action');?></th>
                        </tr>
                        </tfoot>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div>