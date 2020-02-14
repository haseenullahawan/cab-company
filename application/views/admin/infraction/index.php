<?php $locale_info = localeconv(); ?>
<?php 

$all_drivers = [];
foreach ($drivers as $driver) {
  $all_drivers[$driver->id] = $driver->civilite; 
}

$all_payment_methods = [];
foreach ($payment_methods as $method) {
  $all_payment_methods[$method->id] = $method->payment; 
}

?>
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
                    <?php $this->load->model('request_model'); ?>
                    <div class="module-body table-responsive">
                        <table id="infraction_table" class="cell-border infraction_table" cellspacing="0" width="100%" data-selected_id="">
                            <thead>
                            <tr>
                                <th class="no-sort text-center">#</th>
                                <th class="column-infraction-number">infraction number</th>
                                <th class="column-date">date</th>
                                <th class="column-time">time</th>
                                <th class="column-driver">driver</th>
                                <th class="column-city" >city</th>
                                <th class="column-category">category</th>
                                <th class="column-points">points</th>
                                <th class="column-designation-date">designation date</th>
                                <th class="column-amount">amount</th>
                                <th class="column-delay-date">delay date</th>
                                <th class="column-amount">amount</th>
                                <th class="column-delay-date">delay date</th>
                                <th class="column-method">method</th>
                                <th class="column-paid-amount">paid amount</th>
                                <th class="column-due-amount">due amount</th>
                                <th class="column-due-status">status</th>
                                <th class="column-due-status">since</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($data) && !empty($data)):?>
                                <?php $days = (int) $popups->request_closing_days_3; ?>
                                <?php foreach($infractions as $infraction): ?>
                                    <tr <?php 
                                    if(false){ // $item->unread == 1 
                                        ?> class="unread" <?php 
                                    }?>>
                                        <td>
                                            <input type="checkbox" data-selected_id="<?=$infraction->id;?>" class="checkbox singleSelect">
                                        </td>
                                        <!-- <td> -->
                                            <!-- <a href="<?=site_url("admin/request/".$infraction->id."/edit")?>"> -->
                                                <?php // echo create_timestamp_uid($item->created_at,$infraction->id); ?>
                                            <!-- </a> -->
                                        <!-- </td> -->
                                        <td><?= $infraction->infraction_number; ?></td>
                                        <td><?= $infraction->infraction_date; ?></td>
                                        <?php 
                                        $time = date_create("2013-03-15 " . $infraction->infraction_time);
                                        ?>
                                        <td><?= date_format($time,"h:m a"); ?></td>
                                        <td><?= (isset($all_drivers[$infraction->driver])) ? $all_drivers[$infraction->driver] : ''; ?></td>
                                        <td><?= $infraction->city; ?></td>
                                        <td><?= $infraction->stationary_fast_category; ?></td>
                                        <td><?= $infraction->deduced_points; ?></td>
                                        <td><?= $infraction->infraction_date2; ?></td>
                                        <td><?= $infraction->amount1; ?></td>
                                        <td><?= $infraction->delay1; ?></td>
                                        <td><?= $infraction->amount2; ?></td>
                                        <td><?= $infraction->delay2; ?></td>
                                        <td><?= (isset($all_payment_methods[$infraction->payment_method])) ? $all_payment_methods[$infraction->payment_method] : ''; ?></td>
                                        <td><?= '-'; ?></td>
                                        <td><?= '-'; ?></td>
                                        <td><?= $infraction->status; ?></td>
                                        <td style="white-space: nowrap"><?=timeDiff($infraction->infraction_date);?></td>
                                        <!-- <td><a title="Replies" href="<?=site_url("admin/request/".$item->id."/edit")?>" class="btn btn-default btn-small" ><i class="fa fa-commenting"></i></a></td> -->
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