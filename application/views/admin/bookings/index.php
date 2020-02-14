
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

                                <th class="column-civility"><?php echo $this->lang->line('cost');?></th>

                                <th class="column-first_name" ><?php echo $this->lang->line('first_name');?></th>

                                <th class="column-email"><?php echo $this->lang->line('email');?></th>

                                <th class="column-phone"><?php echo $this->lang->line('phone');?></th>

                                <th class="column-status"><?php echo $this->lang->line('status');?></th>

                                <th class="column-since"><?php echo $this->lang->line('since');?></th>

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

                                            <a href="<?=site_url("admin/bookings/".$item->id."/edit")?>">

                                                <?=create_timestamp_uid($item->pick_date,$item->id);?>

                                            </a>

                                        </td>

                                        <td><?=from_unix_date($item->pick_date)?></td>

                                        <td><?=from_unix_time($item->pick_time)?></td>

                                        <td><?=$item->cost_of_journey;?></td>

                                        <td><?=$item->registered_name;?></td>

                                        <td><?=$item->email?></td>

                                        <td><?=$item->phone?></td>

                                        <td><?=$item->is_conformed?></td>

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