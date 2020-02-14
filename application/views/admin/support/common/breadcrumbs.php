
<div class="main-hed" style="margin-top: 15px;box-shadow: 0 0 1px #fff;">
    <a href="<?php echo site_url();?>/support/home"><i class="fa fa-home" style="font-size: 15px;margin-right: 5px;"></i>Home</a>
    <?php if(isset($title)) {
        echo " > ";
        echo isset($title_link) ? "<a href='" . $title_link . "'>$title</a>" : $title;
    } ?>
    <?php if(isset($subtitle)) echo " >> ".$subtitle;?>
</div>