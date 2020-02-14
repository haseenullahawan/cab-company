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
        <br>
        <div class="row">
            <div class="col-md-12">
                <a href="<?= base_url();?>admin/payment_methods.php"> <button>Pyment Methods</button></a>
                <a href="<?= base_url();?>admin/supplier.php"> <button>Supplier</button></a>
                <a href="<?= base_url();?>admin/supplier_category.php"> <button>Supplier Category</button></a>
            </div>
        </div>
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
                        <h3> <?php if(isset($title)) echo $title;?></h3>
                    </div>
                    <div class="module-body table-responsive">
                        <table id="example" class="cell-border" cellspacing="0" width="100%" data-selected_id="">
                            <thead>
                            <tr>
                                <th class="no-sort text-center">#</th>
                                <th class="column-id"><?php echo $this->lang->line('id');?></th>
                                <th class="column-date"><?php echo $this->lang->line('date');?></th>
                                <th class="column-time"><?php echo $this->lang->line('time');?></th>
                                <th class="column-civility"><?php echo $this->lang->line('civility');?></th>
                                <th class="column-first_name"><?php echo $this->lang->line('first_name');?></th>
                                <th class="column-last_name"><?php echo $this->lang->line('last_name');?></th>

                                <th class="column-phone"><?php echo "Phone"; ?></th>
                                <th class="column-email"><?php echo "Email"; ?></th>
                                <th class="column-fax"><?php echo "Fax"; ?></th>
                                <th class="column-delay"><?php echo "delay";?></th>
                                <th class="column-VAT"><?php echo "VAT";?></th>
                                <!--<th class="column-to_pay" ><?php echo "To pay";?></th>-->
                                <th class="column-reccurency" ><?php echo "Reccurency (Months)";?></th>
                                <!--<th class="column-invoice_number"><?php echo "Invoice Number";?></th>-->
                                <th class="column-category"><?php echo "Category";?></th>
                                <!--<th class="column-invoice_date"><?php echo "Invoice Date";?></th>-->
                                <th class="column-period"><?php echo "Period";?></th>
                                <th class="column-status"><?php echo $this->lang->line('status');?></th>
                                <th class="column-payment_method"><?php echo "Payment Method";?></th>
                                <!--<th class="column-timer"><?php echo $this->lang->line('timer');?></th>-->
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($data) && !empty($data)):?>
                                <?php foreach($data as $key => $item):?>
                                <?php //echo $item; ?>
                                <?php // if($item['unread'] == 1){ } ?> 
                                    <tr class="unread">
                                        <td>
                                            <input type="checkbox" data-id="<?=$item['id'];?>" class="checkbox singleSelect">
                                        </td>
                                        <td>
                                            <a href="<?=site_url("admin/supplier/".$item['id']."/edit")?>">
                                                <?=create_timestamp_uid($item['created_at'],$item['id']);?>
                                            </a>
                                        </td>
                                        <td><?=from_unix_date($item['created_at'])?></td>
                                        <td><?=from_unix_time($item['created_at'])?></td>
                                        <td><?=$item['civility'];?></td>
                                        <td><?=$item['first_name'];?></td>
                                        <td><?=$item['last_name'];?></td>
                                        <td><?=$item['phone'];?></td>
                                        <td><?=$item['email'];?></td>
                                        <td><?=$item['fax'];?></td>
                                        <td><?=$item['delay'];?></td>
                                        <td><?=$item['VAT'];?></td>
                                        <td><?=$item['reccurency']?></td>
                                        <td><?=$item['category']?></td>
                                        <td><?=$item['period']?></td>
                                        <td><?=$item['status']?></td>
                                        <td>
                                          <?=   getPayMethodsById($item['payment_method_id']); ?>
                                            
                                            </td>
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