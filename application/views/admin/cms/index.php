<?php $locale_info = localeconv(); ?>
<style>
    @media only screen and (min-width: 1400px){
        .table-filter input, .table-filter select{
            max-width: 9% !important;
        }
        .table-filter select{
            max-width: 95px !important;
        }
        .table-filter .dpo {
            max-width: 90px !important;
        }
    }
</style>
<div class="col-md-12"><!--col-md-10 padding white right-p-->
    <div class="content">
        <?php $this->load->view('admin/common/breadcrumbs');?>
        <div>
            <span><a href="<?=base_url("cms/add/")?>"><button class="btn-primary">Add CMS Page</button></a></span>
        </div>
        <hr>
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
                                <th class="column-id"><?php echo $this->lang->line('id');?></th>
                                <th class="column-title">Title Page</th>
                                <th class="column-subject">Subject</th>
                                <th class="column-status"><?php echo $this->lang->line('status');?></th>
                                <th class="column-editdel">Edit / Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($data) && !empty($data)):?>
                                <?php foreach($data as $key => $item):?>
                                    <tr <?php if(isset($item->unread) && $item->unread == 1){ ?> class="unread" <?php }?>>
                                        <td>
                                            <input type="checkbox" data-id="<?=$item->id;?>" class="checkbox singleSelect">
                                        </td>
                                        <td>
                                            <a href="<?=base_url("cms/edit/".$item->id)?>">
                                                <?=create_timestamp_uid($item->name,$item->id);?>
                                            </a>
                                        </td>
                                        <td><?=$item->name?></td>
                                        <td><?=$item->subject?></td>
                                        <td>
                                            <?php if($item->status == 1){
                                                echo "Enabled";
                                            }elseif($item->status == 2){
                                                echo "Disabled";
                                            } ?>
                                        </td>
                                        <td> <span><a href="<?= base_url('cms/edit/'.$item->id) ?>">Edit</a></span> /  <span><a href="<?= base_url('cms/delete/'.$item->id) ?>">Delete</a></span></td>
                                        <!--<td><?=$item->email?></td>-->
                                        <!--<td><?=$item->phone?></td>-->
                                        <!--<td><?=$item->is_conformed?></td>-->
                                        <!--<td style="white-space: nowrap"><?=timeDiff($item->last_action);?></td>-->
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
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
<div id="table-filter" class="hide">
    <input type="text" placeholder="Title Page" class="form-control" data-name="name">
    <input type="text" placeholder="Subject" class="form-control" data-name="subject">
    <select class="form-control" data-name="status">
        <option value="">All Status</option>
        <option value="">Enabled</option>
        <option value="">Disabled</option>
        <?php //foreach(config_model::$status as $key => $status):?>
            <!--<option <?=set_value('status',$this->input->post('status')) == $status ? "selected" : ""?> value="<?=$status?>"><?=$status?></option>-->
        <?php //endforeach;?>
    </select>
</div>