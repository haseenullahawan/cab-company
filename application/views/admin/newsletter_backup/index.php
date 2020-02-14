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
                                <th class="column-date"><?php echo $this->lang->line('date');?></th>
                                <th class="column-time"><?php echo $this->lang->line('time');?></th>
                                <th class="column-send_time"><?php echo $this->lang->line('send_time');?></th>
                                <th class="column-user_type" ><?php echo $this->lang->line('user_type');?></th>
                                <th class="column-category"><?php echo $this->lang->line('category');?></th>
                                <th class="column-company"><?php echo $this->lang->line('status');?></th>
                                <th class="column-user_status"><?php echo $this->lang->line('user_status');?></th>
                                <th class="column-since"><?php echo $this->lang->line('since');?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($data) && !empty($data)):?>
                                <?php foreach($data as $key => $item):?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" data-id="<?=$item->id;?>" class="checkbox singleSelect">
                                        </td>
                                        <td>
                                            <a href="<?=site_url("admin/newsletter/".$item->id."/edit")?>">
                                                <?=create_timestamp_uid($item->created_at,$item->id);?>
                                            </a>
                                        </td>
                                        <td><?=from_unix_date($item->created_at)?></td>
                                        <td><?=from_unix_time($item->created_at)?></td>
                                        <td><?=$item->send_date_hour;?> : <?=$item->send_date_minute;?></td>
                                        <td><?=$item->user_type;?></td>
                                        <td><?=$item->category;?></td>
                                        <td><?=$item->status?></td>
                                        <td><?=$item->user_status?></td>
                                        <td style="white-space: nowrap"><?=timeDiff($item->last_action);?></td>
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
    <input type="text" placeholder="Name" class="form-control" data-name="name">
    <select class="form-control" data-name="subject">
        <option>All Subject</option>
        <?php foreach(config_model::$subjects as $key => $subject):?>
        <?php $selected = $key == 1 ? "selected" : ""?>
        <option <?=$selected?> value="<?=$subject?>"><?=$subject?></option>
        <?php endforeach;?>
    </select>
    <input type="text" placeholder="Email" data-name="email" class="form-control">
    <input type="text" placeholder="Phone" data-name="phone" class="form-control">
    <input type="text" placeholder="From" data-name="date_from" class="dpo">
    <input type="text" placeholder="To" data-name="date_to" class="dpo">
    <select class="form-control" data-name="status">
        <option value="">All Status</option>
        <?php foreach(config_model::$status as $key => $status):?>
            <option <?=set_value('status',$this->input->post('status')) == $status ? "selected" : ""?> value="<?=$status?>"><?=$status?></option>
        <?php endforeach;?>
    </select>
</div>