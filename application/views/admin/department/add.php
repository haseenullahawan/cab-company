<?php $locale_info = localeconv(); ?>
<style type="text/css">
    input[type="checkbox"] {
        float: left !important;
        margin: 6px auto !important;
    }
    .module_row{
        background: #fff;
    }
    .module_name_row{
        background: #f7f5f5;
        margin: 5px 0px;
        border-radius: 4px;
        padding: 7px 0px;
    }
    .module_name_row p{
        margin: 0 !important;
    }
</style>
<div class="col-md-12"><!--col-md-10 padding white right-p-->
    <div class="content">
        <?php $this->load->view('admin/common/breadcrumbs');?>
        <div class="row">
            <div class="col-md-12">
                <?php $this->load->view('admin/common/alert');?>
                <div class="module">
                    <?php
                        echo $this->session->flashdata('message');
                        $validation_erros = $this->session->flashdata('validation_errors');
                        if(!empty($validation_erros)){
                    ?>
                        <div class="form-validation-errors alert alert-danger">
                            <h3 style="font-size: 20px; text-align: center;">Validation Errors</h3>
                            <?php echo $validation_erros; ?>
                        </div>
                    <?php } ?>
                    <div class="module-head">
                    </div>
                    <div class="module-body">
                        <?=form_open("admin/departments/save")?>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Status*</label>
                                            <select class="form-control" name="status">
                                                <option value="active">Active</option>
                                                <option value="disable">Disable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Department Name*</label>
                                            <input type="text" class="form-control" required name="name" placeholder="Department Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="5" name="description" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 module_row">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-10">
                                                <h2>Modules</h2>
                                            </div>
                                            <div class="col-xs-2">
                                                <h2>View</h2>
                                            </div>
                                        </div>
                                        <?php foreach($modules as $module){ ?>
                                            <div class="row module_name_row">
                                                <div class="col-xs-10">
                                                    <p><?= $module['name']; ?></p>
                                                </div>
                                                <div class="col-xs-2">
                                                    <input type="checkbox" name="module[]" value="<?= $module['id']; ?>">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 30px;">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button class="btn btn-default">Save</button>
                                    <a href="<?=base_url("admin/departments")?>" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div><?php $locale_info = localeconv(); ?>
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