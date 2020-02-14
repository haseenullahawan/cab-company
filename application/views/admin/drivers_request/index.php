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

    .table-filter{
            float:left;
            width:60%;
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

                        <table id="example" class="cell-border" cellspacing="0" width="100%" data-selected_id="" style="text-align:center;">

                            <thead>

                            <tr>

                                <th class="no-sort text-center">#</th>

                                <th class="column-id"><?php echo $this->lang->line('id');?></th>

                                <th class="column-date"><?php echo $this->lang->line('date');?></th>

                                <th class="column-date"><?php echo $this->lang->line('time');?></th>

                                <th class="column-time" style="min-width: 55px;"><?php echo $this->lang->line('type');?></th>

                                <th class="column-date">Driver</th>

                                <th class="column-time"><?php echo $this->lang->line('from_date');?></th>

                                <th class="column-time"><?php echo $this->lang->line('to_date');?></th>

                                <th class="column-time"><?php echo $this->lang->line('amount');?></th>

                                <th class="column-time">Times</th>

                                <th class="column-time">Amount To Deduce</th>

                                <th class="column-time">Already Paid</th>

                                <th class="column-time">Rest to Pay</th>

                                <th class="column-time">Paid</th>

                                <th class="column-time">Date of payment</th>

                                <th class="column-time"><?php echo $this->lang->line('payment_method');?></th>

                                <th class="column-time">Due Amount</th>

                                <th class="column-status"><?php echo $this->lang->line('status');?></th>

                                <th class="column-status">Since</th>

                            </tr>

                            </thead>

                            <tbody>

                            <?php if(isset($data) && !empty($data)):?>

                                <?php foreach($data as $key => $item):
                                    if($item->request_type == 1){
                                        $type_name = "Absence";
                                    }else if($item->request_type == 2){
                                        $type_name = "Medical Vacation";
                                    }else if($item->request_type == 3){
                                        $type_name = "Salary Advance";
                                    }else if($item->request_type == 4){
                                        $type_name = "Notes Refund";
                                    }

                                    if($item->status == 1){
                                        $status_name = "New";
                                    }else if($item->status == 2){
                                        $status_name = "Pending";
                                    }else if($item->status == 3){
                                        $status_name = "Approved";
                                    }else if($item->status == 4){
                                        $status_name = "Denied";
                                    }else if($item->status == 5){
                                        $status_name = "Closed";
                                    }

                                    if($item->from_date==0){
                                        $from_date = "";
                                    }else{
                                        $from_date = $item->from_date;
                                    }

                                    if($item->to_date==0){
                                        $to_date = "";
                                    }else{
                                        $to_date = $item->to_date;
                                    }

                                    if($item->amount==0){
                                        $amount = "";
                                    }else{
                                        $amount = $item->amount;
                                    }



                                    if($item->payment_method=="0"){
                                        $payment_method = "";
                                    }else{
                                        $payment_method = $item->payment_method;
                                    }

                                    if($item->notes_time =="0"){
                                        $notes_time = "";
                                    }else{
                                        $notes_time = $item->notes_time;
                                    }

                                    if($item->time_deduce =="0"){
                                        $time_deduce = "";
                                        $d_amount = "";
                                    }else{
                                        $time_deduce = $item->time_deduce;
                                        $d_amount = $amount / $item->time_deduce;
                                    }

                                   
                                    if($item->request_type == 3){
                                        if($item->rest_due =="0"){
                                            $rest_due = "0";
                                        }else{
                                            $rest_due = $item->rest_due;
                                        }
                                }else{
                                    $rest_due = "";
                                }

                                    if($item->driver_name == 1){
                                        $driver = "Driver 1";
                                    }else if($item->driver_name == 2){
                                        $driver = "Driver 2";
                                    }else if($item->driver_name == 3){
                                        $driver = "Driver 3";
                                    }else{
                                        $driver = "";
                                    }

                                    if($notes_time == ""){
                                        $time = date("H:i", $item->time);
                                    }else{
                                        $time = $notes_time;
                                    }
                                    
                                    if($item->request_type == 4){
                                        $due_amount = $amount - $item->paid_by_employee;

                                        
                                    }elseif($item->request_type == 3){
                                        $due_amount = $item->paid_by_employee - $item->paid_by_driver;
                                    }
                                    

                                    // Salary Advance Request
                                    if($item->request_type == 3){
                                        if($item->paid_by_driver==0){
                                            $paid_amount = "0";
                                        }else{
                                            $paid_amount = $item->paid_by_driver;
                                        }


                                    }else{
                                        $paid_amount = "";
                                        // $paid_by_employee = "";
                                    }

                                    if($item->request_type == 4){
                                        if($item->paid_by_employee==0){
                                            $paid_by_employee = "0";
                                        }else{
                                            $paid_by_employee = $item->paid_by_employee;
                                        }
                                        
                                    }elseif($item->request_type == 3){
                                        if($item->paid_by_employee==0){
                                            $paid_by_employee = "0";
                                        }else{
                                            $paid_by_employee = $item->paid_by_employee - $rest_due;
                                        }
                                    }


                                    $new_payment = str_replace("_"," ",$payment_method);

                                    ?>

                                    <tr <?php if(isset($item->unread) && $item->unread == 1){ ?> class="unread" <?php }?>>

                                        <td>

                                            <input type="checkbox" data-id="<?=$item->id;?>" class="checkbox singleSelect">

                                        </td>

                                        <td>

                                            <a href="<?=site_url("admin/drivers_requests/".$item->id."/edit")?>">

                                                <?=create_timestamp_uid($item->date,$item->id);?>
                                            </a>

                                        </td>

                                        <td><?=from_unix_date($item->date)?></td>
                                        <td><?=$time ?></td>
                                        <td><?=$type_name?></td>
                                        <td><?php echo $driver; ?></td>
                                        <td><?php echo $from_date ?></td>
                                        <td><?php echo $to_date?></td>
                                        <td><?php echo $amount; ?></td>

                                        <td><?php echo $time_deduce; ?></td> 

                                        <td><?php if($d_amount == ""){ echo $d_amount; }else{ echo number_format($d_amount,2); } // Amount To Deduce ?></td>
                                        
                                        <td><?php echo $paid_amount; // Already paid?></td>

                                        <td><?php echo $rest_due; // Rest to pay ?></td>
                                        
                                        <td><?php echo $paid_by_employee; //paid ?></td>

                                        <td><?=from_unix_date($item->date)?></td>
                                        <td><?php echo ucwords($new_payment);?></td>

                                        <td><?php  if($due_amount > 0){ echo $due_amount; }else{ echo 0; }  ?></td>
                                        
                                        <?php
                                                // $dayQuery =  $this->db->query("SELECT  * FROM vbs_driver_request_attachments WHERE  driver_request_id = $item->id");

                                                // $attachments = $dayQuery->result();

                                        ?>
                                        <td><?=$status_name?></td>
                                        <td style="white-space: nowrap">
                                        <?php
                                        $time_ago = ' ';
                                        $time = time() - $item->time; // to get the time since that moment
                                        $tokens = array (
                                        31536000 => 'year',2592000 => 'month',604800 => 'week',86400 => 'day',3600 => 'hour',
                                        60  => 'minute',1 => 'second');
                                        foreach ($tokens as $unit => $text) {
                                        if ($time < $unit)continue;
                                        $numberOfUnits = floor($time / $unit);
                                        $time_ago = ' '.$time_ago. $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'').'  ';
                                        $time = $time % $unit;} echo $time_ago;
                                            // echo $time;
                                            // echo $time;
                                        ?>
                                        </td>
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

<div id="table-filter" class="hide" style="" > 
    <?=form_open("admin/drivers_requests/search")?>
    <input type="text" placeholder="Name" class="form-control" name="name" style="max-width: 70px !important;" >

    <select class="form-control" name="type" style="max-width: 220px !important;">

        <option value="">--- All ---</option>
        <option value="1">Absence Request</option>
        <option value="2">Medical Vacation Request</option>
        <option value="3">Salary Advance Request</option>
        <option value="4">Notes Refund Request</option>

    </select>

    <select class="form-control" name="driver">

        <option value="">--- All ---</option>
        <option value="1">Driver 1</option>
        <option value="2">Driver 2</option>
        <option value="3">Driver 3</option>

    </select>

    <input type="text" placeholder="From" data-name="date_from" name="from" autocomplete="off" class="dpo">

    <input type="text" placeholder="To" data-name="date_to" name="to" autocomplete="off" class="dpo">

    <select class="form-control" name="status">

        <option value="">All Status</option>

        <option value="1">New</option>

        <option value="2">Pending</option>

        <option value="3">approved</option>

        <option value="4">Denied</option>

        <option value="5">Closed</option>
        
    </select>
    <button class="dt-button buttons-pdf buttons-html5" type="submit" style="font-size: 11px;color: #000;height: unset;padding: 6px 10px 6px 10px;font-weight: 100;">Submit</button>
    <?php echo form_close(); ?>
</div>