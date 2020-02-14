<?php $locale_info = localeconv(); 
var_dump($category);?>

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

                        <?=form_open("admin/bookings/categoryadd")?>

                        <div class="row">

                            <div class="col-xs-4">

                                <div class="form-group">

                                    <label>Parent*</label>

                                    <select class="form-control" name="ParentID" required>
                                        <option  value="0">Empty</option>

                                        <?php foreach($category as $key => $cat):?>

                                        <option <?=set_value('cat',$this->input->post('cat'))?> value="<?=$cat->Title?>"><?=$cat->Title?></option>

                                        <?php endforeach;?>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-xs-4">

                                <div class="form-group">

                                    <label>Title*</label>

                                    <div class="input-group">

                                        <span class="input-group-addon"></span>

                                        <input id="Title" maxlength="100" type="text" class="form-control" required name="Title" placeholder="Votre Title" value="<?=set_value('Title',$this->input->post('Title'))?>">

                                    </div>

                                </div>

                            </div>

                           

                        </div>
                        <div class="row">

                            <div class="col-xs-4">

                                <div class="form-group">

                                    <label>Type*</label>

                                    <select class="form-control" name="Type" required>

                                            <option value="service_category">service category</option>
                                            <option value="service_kind">service kind</option>
                                            <option value="service_mode">service mode</option>
                                            


                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-xs-4">

                                <div class="form-group">

                                    <label>Status*</label>

                                    <select class="form-control" name="Status" required>


<option value="1">Active</option>
                                            <option value="0">Deactive</option>

                                           


                                    </select>

                                </div>

                            </div>

                        </div>
<div class="row">

                            <div class="col-xs-4">
                        

                        <div class="text-right">

                            <button class="btn btn-default">Save</button>

                            <a href="<?=base_url("admin/booking/category")?>" class="btn btn-default">Cancel</a>

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

</div>

<script type="text/javascript">

    $(document).ready(function(){

        $(".bdatepicker").datepicker({

            format: "dd/mm/yyyy"

        });

    });

</script>