<?php 
$locale_info = localeconv(); ?>
<style type="text/css">
    label{font-weight: 600; font-size: 13px;}
    .custom_style_row{margin-top: 30px; margin-bottom: 30px;}
    .form-inline .form-group{
        margin:10px;
    }
    input[type=submit], button[type=submit] {
    text-transform: uppercase;
    color: #6a6a6a;
    cursor: pointer;
    font-weight: 500;
    height: 34px;
    font-size: 14px;
    padding: 1px 28px 3px;
    border-radius: 5px;
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
                       <!--  <form method="post" action="<?= base_url('language/store_language'); ?>" enctype="multipart/form-data" accept-charset="utf-8" > -->
                          <?=form_open_multipart("language/store_translation")?>
                          <input type="hidden" name="lang_id" value="<?= $lang_id; ?>">
                          <div class="form-inline tran_form">
                            <div class="form-group">
                              <input type="text" class="form-control" name="hook[]" onkeyup = "updateKey(this)" onfocusout="getgoogle(this)" placeholder="Enter Hook" style="width: 300px;" name="email">&nbsp;&nbsp;
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control trans_google" name="trans[]" placeholder="Enter Translation" style="width: 350px;" name="pwd">&nbsp;&nbsp;
                            </div>
                            <div class="checkbox">
                              <button type="button" onclick="add_row()" class="btn btn-info add_form">+</button>&nbsp;&nbsp;
                            </div>
                          </div>
                          <div class="col-xs-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-default">Save</button>
                                <a href="<?= base_url('admin/translations/'.$subtitle); ?>" class="btn btn-default">Cancel</a>
                            </div>
                          </div>
                        <!-- </form> -->
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

<script type="text/javascript">
</script>