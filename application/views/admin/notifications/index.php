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
                        <style>
                            .paginate_button.current.btn.btn-default{
                                background: linear-gradient(to bottom,#e0e0e0 0,#fff 100%) !important;
                                /* color: white !important; */
                            }
                            .paginate_button.btn.btn-default:hover{
                                background: linear-gradient(to bottom,#e0e0e0 0,#fff 100%) !important;
                                color: black !important;
                                /* border: none !important; */
                            }
                        </style>
                        <table id="example" class="cell-border" cellspacing="0" width="100%" data-selected_id="">
                            <thead>
                            <tr>
                                <th class="no-sort text-center">#</th>
                                <th class="column-id"><?php echo $this->lang->line('id');?></th>
                                <th class="column-date"><?php echo $this->lang->line('date');?></th>
                                <th class="column-date"><?php echo $this->lang->line('time');?></th>
                                <th class="column-name" ><?php echo $this->lang->line('name');?></th>
                                <th class="column-name" ><?php echo $this->lang->line('module');?></th>
                                <th class="column-name" ><?php echo $this->lang->line('status');?></th>
                                <th class="column-name" ><?php echo $this->lang->line('send_copy');?></th>
                                <th class="column-name" ><?php echo $this->lang->line('subject');?></th>
                                <th class="column-name" ><?php echo $this->lang->line('message');?></th>
                                <th class="column-name" ><?php echo $this->lang->line('status');?></th>
                                <th class="column-name"><?php echo $this->lang->line('since');?></th>
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
                                            <a href="<?=site_url("admin/notifications/".$item->id."/edit")?>">
                                                <?=create_timestamp_uid($item->created_at,$item->id);?>
                                            </a>
                                        </td>
                                        <td><?=from_unix_date($item->created_at)?></td>
                                        <td><?=from_unix_time($item->created_at)?></td>
                                        <td><?=$item->name;?></td>
                                        <td><?php if($item->department == 1){echo 'Job Applications';}else if($item->department == 2){echo 'Quote Requests';}else if($item->department == 3){echo 'Calls';}else if($item->department == 4){echo 'Quote Invoices';}else if($item->department == 5){echo 'Support';}else{echo '-';} ?></td>
                                        <td><?php if($item->status == 1){echo 'New';}else if($item->status == 2){echo 'Pending';}else if($item->status == 3){echo 'Replied';}else if($item->status == 4){echo 'Closed';}else{echo '-';} ?></td>
                                        <td><?php if($item->send_copy_to_department_operator == 1){echo 'On';}else{echo 'Off';} ?></td>
                                        <td><?=$item->subject;?></td>
                                        <td><?php $out = strlen($item->message) > 12 ? substr($item->message,0,12)."....." : $item->message; ?><?=$out;?></td>
                                        <td><?php if($item->notification_status == 1){echo 'Enabled';}else{echo 'Disabled';} ?></td>
                                        <td style="white-space: nowrap"><?=timeDiff($item->updated_at);?></td>
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
<!-- <div id="table-filter" class="hide">
    <select class="form-control" data-name="offer">
        <option value="">All Jobs</option>
        <?php foreach(config_model::$job_offers as $key => $offer):?>
            <option value="<?=$offer?>"><?=$offer?></option>
        <?php endforeach;?>
    </select>
    <span class="pull-left">Age:</span>
    <input type="number" placeholder="From" data-name="age_from" class="form-control">
    <input type="number" placeholder="To" data-name="age_to" class="form-control">
    <select class="form-control" data-name="civility">
        <option value="">All Civility</option>
            <?php foreach(config_model::$civility as $key => $civil):?>
                <option <?=set_value('civility',$this->input->post('civility')) == $civil ? "selected" : ""?> value="<?=$civil?>"><?=$civil?></option>
            <?php endforeach;?>
    </select>
    <select class="form-control dep-filter" data-name="department">
        <option value="">All Departments</option>
    </select>
    <input type="text" placeholder="From" class="dpo" data-name="date_from">
    <input type="text" placeholder="To" class="dpo" data-name="date_to">
    <select class="form-control" data-name="status">
        <option value="">All Status</option>
        <?php foreach(config_model::$job_status as $key => $status):?>
            <option <?=set_value('status',$this->input->post('status')) == $status ? "selected" : ""?> value="<?=$status?>"><?=$status?></option>
        <?php endforeach;?>
    </select>
</div> -->