<?php 
$locale_info = localeconv(); ?>
<style type="text/css">
    label{font-weight: 600; font-size: 13px;}
    .custom_style_row{margin-top: 30px; margin-bottom: 30px;}
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
                    <div class="module-body table-responsive">
                        <?php
                        
                        ?>
                  <table id="example" class="cell-border" cellspacing="0" width="100%" data-selected_id="">
                    <thead>
                      <tr>
                        <th class="no-sort text-center">#</th>
                        <th class="column-id"><?php echo $this->lang->line('id');?></th>
                        <th class="column-date">Created at</th>
                        <th>Short Code</th>
                        <th>Language</th>
                        <th>Flag</th>
                        
                        <th>Status</th>
                        <th>Action</th>
                        <th>Since</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                      foreach ($language as $key => $value) {
                        ?>
                          <tr>
                            <td>
                                <input type="checkbox" data-id="<?=$value['id'];?>" class="checkbox singleSelect">
                            </td>
                            <td>
                                <a href="<?=site_url("admin/language/".$value['id']."/edit")?>">
                                    <?=create_timestamp_uid($value['created_at'],$value['id']);?>
                                </a>
                            </td>
                            <td><?= $value['updated_at']; ?></td>
                            <td><?= $value['short_code']; ?></td>
                            <td><?= ucwords($value['title']); ?></td>
                            <td><img class="flag" src="<?= base_url('assets/system_design/images/'.$value['flag']); ?>"></td>
                            
                            <td><?
                              if($value['status'] == 1){
                                ?>
                                  <span class="label label-success">Show</span>
                                <?
                              }
                              else if($value['status'] == 2){
                                ?>
                                  <span class="label label-info">Default</span>
                                <?
                              }
                              else{
                                ?>
                                  <span class="label label-danger">Hide</span>
                                <?
                              }
                             ?></td>
                            <td>
                              <a class="btn btn-default" href="<?= base_url('/admin/translations/'.$value['short_code']); ?>">Translations</a>
                            </td>
                            <td style="white-space: nowrap"><?=timeDiff($value['created_at']);?></td>
                          </tr>
                        <?
                      }
                      ?>
                      
                    </tbody>
                  </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div>
<div id="table-filter" class="hide">
    <span class="pull-left">Short Code:</span>
    <input type="text" placeholder="Short Code" data-name="short_code" class="form-control">
    <span class="pull-left">Langugae:</span>
    <input type="number" placeholder="Langugae" data-name="language" class="form-control">
    
</div>

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

<script type="text/javascript">
</script>