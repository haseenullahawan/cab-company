<style>
    .close span {
        text-indent: 0;
        display: inline;
    }
</style>
<?php if(isset($alert['message']) && !empty($alert['message'])){?>
    <div class="alert <?=$alert['class']?>">
        <strong><?=$alert['type']?></strong> <?=$alert['message']?>
        <button type="button" class="close" style="padding: 0" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

<?php
    $flashAlert =  $this->session->flashdata('alert');
?>

<?php if(isset($flashAlert['message']) && !empty($flashAlert['message'])){?>
    <div class="alert <?=$flashAlert['class']?>">
        <strong><?=$flashAlert['type']?></strong> <?=$flashAlert['message']?>
        <button type="button" class="close" style="padding: 0" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>
