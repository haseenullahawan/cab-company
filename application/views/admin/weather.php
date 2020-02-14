<?php $locale_info = localeconv(); ?>
<style type="text/css">
    h2{
        font-size: 22px;
        font-weight: 600;
    }
    .text_company p{
        margin-bottom:0px;
    }

    .text_company p:nth-last-child(1){  
     margin-top:15px;
     margin-bottom:10px;
    }
    .image-file-wrap {
        width: 100%;
        min-height: 220px;
        margin-top: 30px;
    }
   
    .social_icons {
        position:absolute;
        bottom:11px;
        left:41%;
        margin-bottom:0px;
    }
    .social_icons a{
        font-size: 12px;
        display: inline-block;
        height: 25px;
        width: 25px;
        background: #fff;
        border-radius: 50%;
        text-align: center;
        line-height: 25px;
        margin-right: 15px;
    }
    .profile_circle{
        width: 200px;
        height: 200px;
        border-radius: 50%;
        display: inline-block;
        overflow: hidden;
        margin-top: 15px;
    }
    .profile_circle img{
        width: 100%;
    }
    .text_company{
        margin-top: 24px;
    }
    .text_company > p >span:nth-child(1){
        font-weight: 600;
        font-size: 16px;
        width: auto;
        display: inline-block;
    }
    .circle_image{
        width: 200px;
        height: 200px;
        border-radius: 100% !important;
        overflow: hidden;
    }
    .circle_image img{
        max-width: 100%;
        height: 100%;
    }
    .company_image img{
        width: 100%;
        max-width: 300px;
        max-height: 370px;
    }
    .section-company-info{
        margin: 10px 0px;
        max-height: 600px;
        border: 2px solid #a4a8ab;
        position:relative;
    }
    .main-signature{
        background: -webkit-linear-gradient(white, white, whitesmoke, whitesmoke, #ECECEC, #CECECE);
    }
</style>
<link href="<?php echo base_url(); ?>assets/system_design/css/simple-rating.css" rel="stylesheet">
<div class="col-md-12"><!--col-md-10 padding white right-p-->
    <div class="content">
        <?php $this->load->view('admin/common/breadcrumbs');?>
        <div class="row">
            <div class="col-md-12">
                <?php $this->load->view('admin/common/alert');?>
                <div class="module">
                    <?php echo $this->session->flashdata('message'); ?>
                    <div class="module-head">
                    </div>
                    <div class="module-body">
                        <?=form_open("admin/weather/".$data->id."/update")?>
                        
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Show Description*</label>
                                    <select class="form-control" name="showDiscription">
                                            <option <?= $data->showDiscription == 'true' ? 'selected' : ''; ?> value="true">Yes</option>
                                            <option <?= $data->showDiscription == 'false' ? 'selected' : ''; ?> value="false">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Show Region*</label>
                                    <select class="form-control" name="showRegion" >
                                            <option <?= $data->showRegion == 'true' ? 'selected' : ''; ?> value="true">Yes</option>
                                            <option <?= $data->showRegion == 'false' ? 'selected' : ''; ?> value="false">No</option>
                                    </select>
                                </div>
                            </div>
                           <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Show Country*</label>
                                    <select class="form-control" name="showCountry" >
                                            <option <?= $data->showCountry == 'true' ? 'selected' : ''; ?> value="true">Yes</option>
                                            <option <?= $data->showCountry == 'false' ? 'selected' : ''; ?> value="false">No</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Show Details*</label>
                                    <select class="form-control" name="showDetails" >
                                            <option <?= $data->showDetails == 'true' ? 'selected' : ''; ?> value="true">Yes</option>
                                            <option <?= $data->showDetails == 'false' ? 'selected' : ''; ?> value="false">No</option>
                                    </select>
                                </div>
                            </div>
                             <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Show Forcasts*</label>
                                    <select class="form-control" name="forecasts" >
                                            <option <?= $data->forecasts == 'true' ? 'selected' : ''; ?> value="true">Yes</option>
                                            <option <?= $data->forecasts == 'false' ? 'selected' : ''; ?> value="false">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Enable Search*</label>
                                    <select class="form-control" name="enableSearch" >
                                            <option <?= $data->enableSearch == 'true' ? 'selected' : ''; ?> value="true">Yes</option>
                                            <option <?= $data->enableSearch == 'false' ? 'selected' : ''; ?> value="false">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Location*</label>
                                    <input type="text" value="<?= $data->location; ?>" class="form-control" name="location">
                                            
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Days *</label>
                                    <input type="number" maxlength="7"  value="<?= $data->nbForecastDays; ?>" class="form-control" name="nbForecastDays">
                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary" name="submit">Update</button>
                            </div>
                        </div>
                        <br>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div>
<input type="hidden" id = "replyType" value="1">
<script src="<?php echo base_url(); ?>assets/system_design/scripts/simple-rating.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var rating = $('.rating').rating();
        $(".bdatepicker").datepicker({
            format: "dd/mm/yyyy"
        });
        // $("select[id='num2']").change(function(){
        //     var val = $(this).val();
        //     CKEDITOR.instances['reply_message'].insertHtml(val);
        // });
    });

</script>