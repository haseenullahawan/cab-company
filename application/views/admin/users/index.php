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
                        <table id="example" class="cell-border" cellspacing="0" width="100%" data-selected_id="">
                            <thead>
                            <tr>
                                <th class="no-sort text-center">#</th>
                                <th><?php echo $this->lang->line('id');?></th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Department</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Last Update</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users_data as $item):?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" data-id="<?=$item['id'];?>" class="checkbox singleSelect">
                                        </td>
                                        <td>
                                            <a href="<?=site_url("admin/users/".$item['id']."/edit")?>"><?=create_timestamp_uid($item['created_at'],$item['id']);?></a>
                                        </td>
                                        <td><?=$item['first_name'];?></td>
                                        <td><?=$item['last_name'];?></td>
                                        <td><?=$item['email'];?></td>
                                        <td><?=$item['phone'];?></td>
                                        <td><?=$item['role']?></td>
                                        <td><?=$item['department'];?></td>
                                        <td><?=$item['username'];?></td>
                                        <td><?=$item['active'] == 1 ? "Active" : "Disable";?></td>
                                        <td style="white-space: nowrap"><?=timeDiff($item['updated_at'])?></td>
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
<!-- <div id="table-filter" class="hide">
    <select class="form-control">
        <option>All Jobs</option>
    </select>
    <span class="pull-left">Age:</span>
    <input type="number" placeholder="From" class="form-control">
    <input type="number" placeholder="To" class="form-control">
    <select class="form-control">
        <option>Civility</option>
    </select>
    <select class="form-control dep-filter">
        <option>Department</option>
    </select>
    <input type="text" placeholder="From" class="dpo">
    <input type="text" placeholder="To" class="dpo">
    <select class="form-control">
        <option>All Status</option>
    </select>
</div> -->