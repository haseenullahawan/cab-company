<?php $locale_info = localeconv(); 
var_dump($categoryedit);
?>

    <script src="<?php echo base_url(); ?>/assets/system_design/scripts/bootstrap-datepicker.min.js" type="text/javascript"></script>



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

                        <?=form_open("admin/bookings/".$categoryedit->ID."/category_update")?>

                        <div class="row">

                            <div class="col-xs-4">

                                <div class="form-group">

                                    <label>Parent*</label>

                                    <select class="form-control" name="ParentID" required>
                                        <option  value="0">Empty</option>

                                        <?php foreach($category as $key => $cat):?>
<?php if($categoryedit->Title != $cat->Title) {?>
<option <?=set_value('ParentID',$cat->ID) == strtolower($categoryedit->ParentID) ? "selected" : ""?> value="<?=$cat->ID?>"><?=$cat->Title?></option>

                                        <?php
}
                                         endforeach;?>

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

                                        <input id="Title" maxlength="100" type="text" class="form-control" required name="Title" placeholder="Votre Title" value="<?php echo $categoryedit->Title; ?>">

                                    </div>

                                </div>

                            </div>

                           

                        </div>
                        <div class="row">

                            <div class="col-xs-4">

                                <div class="form-group">

                                    <label>Type*</label>

                                    <select class="form-control" name="Type" required>

                                        <option <?php if( $categoryedit->Type == 'service_category') echo "selected"; ?> value="service_category">service category</option>
                                        <option <?php if( $categoryedit->Type == 'service_kind') echo "selected"; ?> value="service_kind">service kind</option>
                                        <option <?php if( $categoryedit->Type == 'service_mode') echo "selected"; ?> value="service_mode">service mode</option>
                                            


                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-xs-4">

                                <div class="form-group">

                                    <label>Status*</label>

                                    <select class="form-control" name="Status" required>

                                            <option <?php if( $categoryedit->Statis == 1) echo "selected"; ?> value="1">Active</option>
                                            <option <?php if( $categoryedit->Statis == 0) echo "selected"; ?> value="0">Deactive</option>

                                    </select>

                                </div>

                            </div>

                        </div>
<div class="row">

                            <div class="col-xs-4">
                        

                        <div class="text-right">

                            <button class="btn btn-default">Update</button>

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