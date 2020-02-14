<?php $locale_info = localeconv(); ?>
<style type="text/css">
    label{font-weight: 600; font-size: 13px;}
    .custom_style_row{margin-top: 30px; margin-bottom: 30px;}
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
                        <?=form_open_multipart("admin/company/save")?>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Type*</label>
                                            <select class="form-control" name="type" required>
                                                <option disabled="" selected="">-- Select Type --</option>
                                                <option value="SAS" <?php if($company['type'] == 'SAS'){ echo 'selected=""'; } ?>>SAS</option>
                                                <option value="SARL" <?php if($company['type'] == 'SARL'){ echo 'selected=""'; } ?>>SARL</option>
                                                <option value="SA" <?php if($company['type'] == 'SA'){ echo 'selected=""'; } ?>>SA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Company Name*</label>
                                            <input type="text" class="form-control" required name="name" placeholder="Name*" value="<?= $company['name']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Email*</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <input maxlength="100" type="email" class="form-control" required name="email" placeholder="Companu Email" value="<?= $company['email']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Telephone*</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input maxlength="50" type="text" class="form-control" required name="phone" placeholder="Telephone" value="<?= $company['phone']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 text-center" style="vertical-align: center; max-height: 175px">
                                <!-- company logo will be here -->
                                <img id="company_logo_preview"
                                    <?php if(isset($company['logo']) && !empty($company['logo'])){ ?>
                                        src="<?= base_url('uploads/company/').'/'.$company['logo']; ?>"
                                    <?php } ?>
                                     style="max-width: 200px; margin-top: 10%; max-height: 150px ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Fax</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input maxlength="50" type="text" class="form-control" name="fax" placeholder="Fax" value="<?= $company['fax']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Website</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                        <input type="text" class="form-control" name="website" placeholder="Website URL" value="<?= $company['website']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Company Logo</label>
                                    <input type="file" name="logo" id="company_logo">
                                    <input type="hidden" name="old_logo" value="<?= $company['logo']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row custom_style_row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Number + Street</label>
                                    <input type="text" class="form-control"  name="street" placeholder="Number Street" value="<?= $company['street']; ?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control"  name="zip_code" placeholder="Zip Code" value="<?= $company['zip_code']; ?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control"  name="city" placeholder="City" value="<?= $company['city']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row custom_style_row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control"  name="country" placeholder="Country" value="<?= $company['country']; ?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>SIRFT</label>
                                    <input type="text" class="form-control"  name="sirft" placeholder="SIRFT" value="<?= $company['sirft']; ?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>RCS</label>
                                    <input type="text" class="form-control"  name="rcs" placeholder="RCS" value="<?= $company['rcs']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row custom_style_row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Licence</label>
                                    <input type="text" class="form-control"  name="licence" placeholder="Licence" value="<?= $company['licence']; ?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>NUMERO TVA</label>
                                    <input type="text" class="form-control"  name="numero_tva" placeholder="NUMERO TVA" value="<?= $company['numero_tva']; ?>">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Capital</label>
                                    <input type="text" class="form-control"  name="capital" placeholder="Capital" value="<?= $company['capital']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row custom_style_row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                        <input type="text" class="form-control"  name="facebook_link" placeholder="Facebook URL" value="<?= $company['facebook_link']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                                        <input type="text" class="form-control"  name="youtube_link" placeholder="Youtube URL" value="<?= $company['youtube_link']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                        <input type="text" class="form-control"  name="instagram_link" placeholder="Instagram URL" value="<?= $company['instagram_link']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button class="btn btn-default">Update</button>
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
    $(document).on('change','#company_logo',function(e)
    {
        if(this.files)
        {
            var reader = new FileReader();
            reader.onload = function (e){ $('#company_logo_preview').attr('src', reader.result); }
            reader.readAsDataURL(this.files[0]);
        }
        else
        {
            console.log('No Image');
        }
    });
</script>