<?php 
$locale_info = localeconv(); ?>
<style type="text/css">
    label{font-weight: 600; font-size: 13px;}
    .custom_style_row{margin-top: 30px; margin-bottom: 30px;}
       .table-filter {
    float: left;
    width: 50%;
}
.google_translate {
    cursor: pointer;
}
</style>
<script src="./assets/js/inlineEdit.js"></script>
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
                       
                          <?=form_open_multipart("language/update_language/".$short_code,'name="trasUser"')?>
                          <table id="example_language" class="cell-border" cellspacing="0" width="100%" data-selected_id="">
                            <thead>
                              <tr>
                                <th class="no-sort text-center"><input type="checkbox" id="chkParent" /></th>
                                <th class="column-id"><?php echo $this->lang->line('id');?></th>
                                <th>English</th>
                                <th><?= ucwords($lang_title); ?></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?
                              foreach ($language as $key => $value) {
                                ?>
                                  <tr>
                                    <td>
                                        <input type="checkbox" value="<?=$value['id'];?>" class="checkbox" id="<?= $value['id']; ?>" name="translation[]" data-id = "<?= $value['id']; ?>" data-value="<?= $value['description']; ?>" data-token="<?= $value['token_id']; ?>">
                                    </td>
                                    <td >
                                        <?=create_timestamp_uid($value['created_at'],$value['id']);?>
                                    </td>
                                    
                                    <td contenteditable="true"
                                        onBlur="change_token(this, 'description','<?= $lang_id; ?>', '<?= $value['token_id']; ?>')"
                                        onClick="showEdit(this);" ><?= $value['description']; ?></td>
                                    <td id="<?= $value['id']; ?>_tdpre" contenteditable="true"
                                        onBlur="saveToDatabase(this, 'translation','<?= $lang_id; ?>', '<?= $value['token_id']; ?>','<?= $value['id']; ?>')"
                                        onClick="showEdit(this);" class="transalate_td"><?= $value['translation']; ?> </td>
                                  </tr>
                                <?
                              }
                              ?>
                              
                            </tbody>
                          </table>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div><?php $locale_info = localeconv(); ?>
<div id="table-filter" class="hide">
    <span class="pull-left">Module : </span>
    <input type="text" placeholder="Short Code" data-name="short_code" class="form-control">
    <span class="pull-left"></span>
    <a href="#" class="btn btn-sm btn-default " onclick="setUpdateAction();"><i class="fa fa-pencil"></i> Show</a>
    
</div>
<style>
    @media only screen and (min-width: 1400px){
        .table-filter input, .table-filter select{
            max-width: 20% !important;
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
    $('.google_translate').click(function(){
        var sentence = $(this).attr('data-value');
        var data_id = $(this).attr('data-id');
        var data_token = $(this).attr('data-token');
        var td_id = $(this).attr('id');
        $('#'+td_id+'pre')
                .css("background", "#FFF url(<?= base_url('assets/system_design/images/ajax-loader.gif'); ?>) no-repeat center right 5px / 25px");
        $.ajax({
            url: "https://www.googleapis.com/language/translate/v2?key=AIzaSyB-ktxnSZFDZnKjjPz6tbk_iDMN2FxkXmo&q="+sentence+"&source=en&target=<?= $subtitle; ?>",
            dataType: 'json',
            success: function(res){
                var translated = "";
                $.each(res.data.translations, function(index, val) {
                    translated = val.translatedText;
                });
                $.ajax({
                    url : '<?= base_url("language/update_translation"); ?>',
                    type : "GET",
                    data : 'column=translation&data=' + translated
                            + '&id=' + data_id+ '&lang_id=' + <?= $lang_id; ?>+ '&token_id=' + data_token,
                    success : function(data) {
                        $('#'+td_id+'pre').html(translated);
                        $('#'+td_id+'pre').css("background", "#FDFDFD");
                    }
                });
            }
        });
    });
    function showEdit(editableObj) {
        $(editableObj).css("background", "#FFF");
    }

    function saveToDatabase(editableObj, column, lang_id, token_id, id) {
        $(editableObj)
                .css("background", "#FFF url(<?= base_url('assets/system_design/images/ajax-loader.gif'); ?>) no-repeat center right 5px / 25px");
        $.ajax({
            url : '<?= base_url("language/update_translation"); ?>',
            type : "GET",
            data : 'column=' + column + '&data=' + editableObj.innerHTML
                    + '&id=' + id+ '&lang_id=' + lang_id+ '&token_id=' + token_id,
            success : function(data) {
                $(editableObj).css("background", "#FDFDFD");
            }
        });
    }
    function change_token(editableObj, column, lang_id, token_id) {
        $(editableObj)
                .css("background", "#FFF url(<?= base_url('assets/system_design/images/ajax-loader.gif'); ?>) no-repeat center right 5px  / 25px");
        $.ajax({
            url : '<?= base_url("language/update_token"); ?>',
            type : "GET",
            data : 'column=' + column + '&data=' + editableObj.innerHTML
                    + '&lang_id=' + lang_id+ '&token_id=' + token_id,
            success : function(data) {
                $(editableObj).css("background", "#FDFDFD");
            }
        });
    }
    $(document).ready(function() {
        $('#chkParent').click(function() {
            var isChecked = $(this).prop("checked");
            $('#example_language tr:has(td)').find('input[type="checkbox"]').prop('checked', isChecked);
        });

        $('#example_language tr:has(td)').find('input[type="checkbox"]').click(function() {
            var isChecked = $(this).prop("checked");
            var isHeaderChecked = $("#chkParent").prop("checked");
            if (isChecked == false && isHeaderChecked){
                $("#chkParent").prop('checked', isChecked);
            }
            else {
                $('#example_language tr:has(td)').find('input[type="checkbox"]').each(function() {
                    if ($(this).prop("checked") == false)
                        isChecked = false;
                });
                $("#chkParent").prop('checked', isChecked);
            }
        });
    });
</script>
<script type="text/javascript">
$('input[type="checkbox"]').click(function(){
    if($(this).prop("checked") == true){
        $('.lang_edit').attr('data-edit','1');
    }
});
</script>