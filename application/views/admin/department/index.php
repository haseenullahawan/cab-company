<?php $locale_info = localeconv(); ?>
<style>
    .table-filter .dpo {
        max-width: 62px;
    }
    .table-filter span {
        margin: 4px 2px 0 3px;
    }
    .table-filter input[type="number"]{
        max-width: 48px;
    }
    tbody tr td{text-align: center;}
    @media only screen and (min-width: 1400px){
        .table-filter input, .table-filter select{
            max-width: 6% !important;
        }
        .table-filter select{
            max-width: 85px !important;
        }
        .table-filter .dpo {
            max-width: 90px !important;
        }
    }
</style>
<div class="col-md-12"><!--col-md-10 padding white right-p-->
    <div class="content">
        <?php $this->load->view('admin/common/breadcrumbs');?>
        <div class="row">
            <div class="col-md-12">
                <?php
                $flashAlert =  $this->session->flashdata('alert');
                if(isset($flashAlert['message']) && !empty($flashAlert['message'])){?>
                    <br>
                    <div style="padding: 5px 12px" class="alert <?=$flashAlert['class']?>">
                        <strong><?=$flashAlert['type']?></strong> <?=$flashAlert['message']?>
                        <button type="button" class="close" style="padding: 0" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
                <div class="module">
                    <?php echo $this->session->flashdata('message'); ?>
                    <div class="module-head">
                        <!--<h3> <?php if(isset($title)) echo $title;?></h3>-->
                    </div>
                    <div class="module-body table-responsive">
                        <table id="example" class="cell-border" cellspacing="0" width="100%" data-selected_id="">
                            <thead>
                            <tr>
                                <th class="no-sort text-center">#</th>
                                <th><?php echo $this->lang->line('id');?></th>
                                <th>Department</th>
                                <?php foreach($modules as $module): ?>
                                    <th><?= $module['name']; ?></th>
                                <?php endforeach; ?>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach($departments as $item):?>
                                    <?php if(empty($item['modules'])){ $row_modules = array(); }else{ $row_modules = json_decode($item['modules'],true); } ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" data-id="<?=$item['id'];?>" class="checkbox singleSelect">
                                        </td>
                                        <td>
                                            <a href="<?=site_url("admin/departments/".$item['id']."/edit")?>"><?=create_timestamp_uid($item['created_at'],$item['id']);?></a>
                                        </td>
                                        <td><?=$item['name'];?></td>
                                        <?php foreach($modules as $module): ?>
                                            <td>
                                                <?php
                                                if(in_array($module['id'], $row_modules))
                                                {
                                                    echo 'View';
                                                }
                                                else
                                                {
                                                    echo 'No Access';
                                                }
                                                ?>
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div>