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
                    <div class="row">
                        <a href="<?php echo base_url() ?>admin/accounting/bills.php" class="btn btn-lg btn-default">Bill</a>
                        <a href="<?php echo site_url('admin/supplier'); ?>" class="btn btn-lg btn-default">Supplier</a>
                    </div>
                    
                    <hr>
                    
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