<link href="<?php echo base_url(); ?>assets/system_design/css/login.css" rel="stylesheet">
</header>

<div class="container-fluid body-bg">
    <div class="container body-border">
        <div class="breadcrumb">
            <div class="row">
                <aside class="nav-links">
                    <ul>
                        <li> <a href="<?php echo site_url(); ?>/"> <?php echo $this->lang->line('home_page'); ?>  </a> </li>
                        <li class="active"><a href="javascript:void(0)">&nbsp;<?php if (isset($sub_heading)) echo $sub_heading; ?> </a></li>
                    </ul>
                </aside>
            </div>
        </div>
        <?php if ($journey_details != "") : ?>
            <div class="bcp" style="margin-top:0px;">
                <ul class='nav nav-wizard'>
                    <li><span class="steps">1</span><a style="color:#fff !important"><?php echo $this->lang->line('journey_details'); ?></a></li>
                    <li class='active'><span class="steps">2</span><a style="color:#fff !important"><?php echo $this->lang->line('identification'); ?></a></li>
                    <li><span class="steps">3</span><a><?php echo $this->lang->line('quote'); ?></a></li>
                    <li><span class="steps">4</span><a><?php echo $this->lang->line('payment_details'); ?></a></li>
                </ul>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-12">
                <div id="total-login" style="width:101.2%;margin-bottom:0px;">
                    <?php   if ($this->lang->lang() == 'en') {    ?>
                                <iframe src="https://navetteo.limovtc.fr/en/login/" width="1140" height="500" frameborder="0" scrolling="no"></iframe>
                    <?php   } else { ?>
                                <iframe src="https://navetteo.limovtc.fr/login/" width="1140" height="500" frameborder="0" scrolling="no"></iframe>
                    <?php   } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">$(document).ready(function () {
        $.colorbox({inline: true, href: ".ajax"});

    });
</script> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/system_design/scripts/bootstrap.min.js"></script>
</body>
</html>