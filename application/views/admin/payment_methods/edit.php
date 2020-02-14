<?php $locale_info = localeconv(); ?>
    <script src="<?php echo base_url(); ?>/assets/system_design/scripts/bootstrap-datepicker.min.js" type="text/javascript"></script>
<?php // print_r($data); ?> 
<div class="col-md-12"><!--col-md-10 padding white right-p-->
    <div class="content">
        <?php $this->load->view('admin/common/breadcrumbs');?>
        <br>
        <div class="row">
            <div class="col-md-12">
                <a href="<?= base_url();?>admin/payment_methods.php"> <button>Pyment Methods</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php $this->load->view('admin/common/alert');?>
                <div class="module">
                    <?php echo $this->session->flashdata('message'); ?>
                    <div class="module-head">
                    </div>

                        <div class="module-body">
                        <?=form_open("admin/payment_methods/".$data['id']."/update")?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-lg-4"></div>
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                <div class="form-group">
                                    <label>Payment Method Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="name" value="<?=set_value('name',$data['name'])?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-lg-4"></div>
                            
                            
                            <div class="text-right">
                            <button class="btn btn-default">Save</button>
                            <a href="<?=base_url("admin/payment_methods")?>" class="btn btn-default">Cancel</a>
                        </div>
                       
                    </div>

                </div>
                        <?php echo form_close(); ?>
                   
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