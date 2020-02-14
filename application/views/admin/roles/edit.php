<?php $locale_info = localeconv(); ?>
<style type="text/css">
    input[type="checkbox"] {
        display: block !important;
        margin: 0 auto !important;
        float: none !important;
    }
    .text-label{
        margin-bottom: 16px !important;
    }
    label{
        font-weight: 600;
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
                        <?=form_open("admin/roles/".$row_data['id']."/update")?>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status*</label>
                                            <select class="form-control" name="status">
                                                <option value="active" <?php if($row_data['status'] == 'active'){ echo 'selected="selected"'; } ?>>Active</option>
                                                <option value="disable" <?php if($row_data['status'] == 'disable'){ echo 'selected="selected"'; } ?>>Disable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name*</label>
                                            <input type="text" class="form-control" required name="name" value="<?=$row_data['name']?>" placeholder="Department Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group text-center">
                                            <label class="text-label">View</label>
                                            <input type="checkbox" value="yes" name="role_view" <?php if($row_data['role_view'] == 'yes'){ echo 'checked="checked"'; } ?>>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group text-center">
                                            <label class="text-label">Add</label>
                                            <input type="checkbox" value="yes" name="role_add" <?php if($row_data['role_add'] == 'yes'){ echo 'checked="checked"'; } ?>>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group text-center">
                                            <label class="text-label">Edit</label>
                                            <input type="checkbox" value="yes" name="role_edit" <?php if($row_data['role_edit'] == 'yes'){ echo 'checked="checked"'; } ?>>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group text-center">
                                            <label class="text-label">Delete</label>
                                            <input type="checkbox" value="yes" name="role_delete" <?php if($row_data['role_delete'] == 'yes'){ echo 'checked="checked"'; } ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button class="btn btn-default">Update</button>
                                    <a href="<?=base_url("admin/roles")?>" class="btn btn-default">Cancel</a>
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