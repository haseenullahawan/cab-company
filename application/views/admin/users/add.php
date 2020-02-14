<?php $locale_info = localeconv(); ?>
<style type="text/css">
    h2{
        font-size: 22px;
        font-weight: 600;
    }
    .image-file-wrap {
        width: 100%;
        min-height: 220px;
        margin-top: 30px;
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
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: inline-block;
        overflow: hidden;
    }
    .profile_circle img{
        width: 100%;
    }
    .text_company{
        margin-top: 30px;
    }
    .text_company > p >span:nth-child(1){
        font-weight: 600;
        font-size: 16px;
        width: 140px;
        display: inline-block;
    }
    .circle_image{
        width: 200px;
        height: 200px;
        border-radius: 100% !important;
        overflow: hidden;
        margin-top: 15px;
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
        background: -webkit-linear-gradient(#efefef, #ECECEC, #CECECE);
        margin: 10px 0px;
        max-height: 600px;
        border: 2px solid #a4a8ab;
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
                        <?=form_open_multipart("admin/users/save")?>

                        <div class="row">
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Disable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label>Civility</label>
                                            <select class="form-control" name="gender" id="civ_trg" onchange="active_civ_spider()">
                                                <option value="Mr">Mr</option>
                                                <option value="Mme">Mme</option>
                                                <option value="Mlle">Mlle</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label>Nom*</label>
                                            <input type="text" class="form-control" id="first_trg" onkeyup="active_first_spider()" required name="first_name" placeholder="Nom">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label>Prenom*</label>
                                            <input type="text" class="form-control" id="last_trg" onkeyup="active_last_spider()" required name="last_name" placeholder="Prenom">
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label>Email*</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <input maxlength="50" type="email" class="form-control" required name="email" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label>Username*</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input maxlength="50" type="text" class="form-control" required name="username" placeholder="Username">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label>Password*</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                <input maxlength="50" type="password" class="form-control" required name="password" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input maxlength="50" type="text" class="form-control" name="phone" placeholder="Telephone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label>Link</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                                <input type="text" class="form-control" name="link" placeholder="URL">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="image-file-wrap text-center">
                                    <img src="" class="user_avatar_preview" style="max-width: 100%; max-height: 220px;">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Department*</label>
                                    <select class="form-control" required name="department" id="department_trg" onchange="active_dep_spider()">
                                        <option disabled="" selected="">--Select Department--</option>
                                        <?php foreach($departments as $row){ ?>
                                            <option value="<?=$row['id'];?>"><?=$row['name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Role*</label>
                                    <select class="form-control" required name="role" id="role_trg" onchange="active_rol_spider()">
                                        <option disabled="" selected="">--Select Role--</option>
                                        <?php foreach($roles as $row){ ?>
                                            <option value="<?=$row['id'];?>"><?=$row['name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Upload Picture</label>
                                    <input type="file" name="avatar" id="user_avatar">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Signature View</h2>
                            </div>
                        </div>
                        <div class="row section-company-info">
                            <div class="col-md-4">
                                <div class="profile_image circle_image">
                                    <img style="width: 100%; height: 100%" class="user_avatar_preview" src="" alt="">
                                </div>
                                <div class="text_company">
                                    <?php if(isset($company_data['name']) && !empty($company_data['name'])){?>
                                    <p><span><?php echo $company_data['name']; ?></span></p>
                                    <?php } ?>
                                    <p class="name-spider"><span style="width: 0;"></span><span style="font-size: 14px; font-weight: 600;" id="civ-spider-area">Mr</span>  <span style="font-size: 14px; font-weight: 600;" id="first-spider-area"></span>  <span style="font-size: 14px; font-weight: 600;" id="last-spider-area"></span></p>
                                    <p class="dep-spider"><span style="width: 0;"></span><span style="font-size: 14px; font-weight: 600;" id="dep-spider-area"></span></p>
                                    <p class="rol-spider"><span style="width: 0;"></span><span style="font-size: 14px; font-weight: 600;" id="rol-spider-area"></span></p>
                                    <?php if(isset($company_data['email']) && !empty($company_data['email'])){?>
                                    <p><span>Email:</span><span><?php echo $company_data['email']; ?></span></p>
                                    <?php } ?>
                                    <?php if(isset($company_data['phone']) && !empty($company_data['phone'])){?>
                                    <p><span>Phone:</span><span><?php echo $company_data['phone']; ?></span></p>
                                    <?php } ?>
                                    <?php if(isset($company_data['fax']) && !empty($company_data['fax'])){?>
                                    <p><span>Fax:</span><span><?php echo $company_data['fax']; ?></span></p>

                                    <?php } ?>
                                    <?php if(isset($company_data['website']) && !empty($company_data['website'])){?>
                                    <p><span>Website:</span><span><?php echo $company_data['website']; ?></span></p>
                                    <?php } ?>
                                    <?php if(isset($company_data['city']) && !empty($company_data['city'])){?>
                                    <p><span>Address:</span><span><?php echo $company_data['city'].' '.$company_data['country']; ?></span></p>
                                    <?php } ?>
                                    <p class="social_icons">
                                        <?php if(isset($company_data['facebook_link']) && !empty($company_data['facebook_link'])){?>
                                        <a href="<?php echo $company_data['facebook_link']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <?php } ?>
                                        <?php if(isset($company_data['youtube_link']) && !empty($company_data['youtube_link'])){?>
                                        <a href="<?php echo $company_data['youtube_link']; ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                                        <?php } ?>
                                        <?php if(isset($company_data['instagram_link']) && !empty($company_data['instagram_link'])){?>
                                        <a href="<?php echo $company_data['instagram_link']; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-8" style="margin-top: 180px;">
                                <div class="profile_image">
                                    <a href="" class="company_image"><img
                                            <?php if(isset($company_data['logo']) && !empty($company_data['logo'])){?>
                                            src="<?= base_url('uploads/company').'/'.$company_data['logo'];?>"
                                            <?php } ?> alt=""></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button class="btn btn-default">Save</button>
                                    <a href="<?=base_url("admin/users")?>" class="btn btn-default">Cancel</a>
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


<script type="text/javascript">
    $(document).on('change','#user_avatar',function(e)
    {
        if(this.files)
        {
            var reader = new FileReader();
            reader.onload = function (e){ $('.user_avatar_preview').attr('src', reader.result); }
            reader.readAsDataURL(this.files[0]);
        }
        else
        {
            console.log('No Image');
        }
    });

    function active_dep_spider()
    {
        dep_name = $('#department_trg option:selected').text();
        $('#dep-spider-area').text(dep_name);
    }
    
    function active_rol_spider()
    {
        role_name = $('#role_trg option:selected').text();
        $('#rol-spider-area').text(role_name);
    }
    function active_civ_spider()
    {
        civ_name = $('#civ_trg option:selected').text();
        $('#civ-spider-area').text(civ_name);
    }

    function active_first_spider()
    {
        first_name = $('#first_trg').val();
        $('#first-spider-area').text(first_name);
    }

    function active_last_spider()
    {
        last_name = $('#last_trg').val();
        $('#last-spider-area').text(last_name);
    }
</script>