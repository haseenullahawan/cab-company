<style>
    .close span {
        text-indent: 0;
        display: inline;
    }
</style>
<?php if(isset($alert['message']) && !empty($alert['message'])){?>
    <br>
    <div style="padding: 5px 12px" class="alert <?=$alert['class']?>">
        <strong><?=$alert['type']?></strong> <?=$alert['message']?>
        <button type="button" class="close" style="padding: 0" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>
<?php
$flashAlert =  $this->session->flashdata('alert');
if(isset($flashAlert['message']) && !empty($flashAlert['message'])){?>
    <br>
    <div style="padding: 5px 12px" class="alert <?=$flashAlert['class']?>">
        <strong><?=$flashAlert['type']?></strong> <?=$flashAlert['message']?>
        <button type="button" class="close" style="padding: 0" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>
