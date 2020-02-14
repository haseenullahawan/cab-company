<?php 
$locale_info = localeconv(); ?>
<style type="text/css">
    label{font-weight: 600; font-size: 13px;}
    .custom_style_row{margin-top: 30px; margin-bottom: 30px;}
    input[type=submit], button[type=submit]{
    color: #333;
    cursor: pointer;
    height: 34px;
    font-size: 16px;
    padding: 1px 28px 3px;
    border-radius: 5px;
    text-transform: none;
    font-family: inherit;
    font-weight: 500;
    }
    .body-border{
      min-height: 500px;
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
                          <?=form_open_multipart("language/update_language/".$language[0]['id'])?>
                          <div class="col-xs-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Short Code</label>
                              <input type="text" class="form-control" id="short_code" name="short_code" aria-describedby="languageHelp" placeholder="Enter Short Code" value="<?= @$language[0]['short_code'];?>">
                              <small id="languageHelp" class="form-text text-muted">Put the Short Code e.g.( en,fr,sp ) hare</small>
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Language Name</label>
                              <input type="text" class="form-control" id="language" name="language" aria-describedby="languageHelp" placeholder="Enter Language" value="<?= @$language[0]['title'];?>">
                              <small id="languageHelp" class="form-text text-muted">Put the Language name hare</small>
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <div class="form-group">
                              <label for="status">Status</label>
                              <select class="form-control" id="status" name="status">
                                <option value="1" <?= ($language[0]['status'] == 1 ? 'selected':'') ?>>Show</option>
                                <option value="0" <?= ($language[0]['status'] == 0 ? 'selected':'') ?>>Hide</option>
                                <option value="0" <?= ($language[0]['status'] == 2 ? 'selected':'') ?>>Default</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <div class="form-group">
                              <label for="status">Flag : </label>
                              <img src="<?= base_url('assets/system_design/images/'.$language[0]['flag']); ?>">
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <div class="form-group">
                              <label for="flag">Flag png</label>
                              <input type="file" class="form-control-file" id="flag" name="flag">
                              <small id="languageHelp" class="form-text text-muted"> Chnage Flag Only put PNG file</small>
                            </div>
                          </div>
                          <div class="col-xs-12">
                            <div class="text-right">
                                <button type="submit" class="btn btn-default">Save</button>
                                <a href="<?= base_url('admin/language'); ?>" class="btn btn-default">Cancel</a>
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