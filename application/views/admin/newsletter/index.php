<?php $locale_info = localeconv(); ?>
<script type="text/javascript">
    // function googleTranslateElementInit() {
    //     new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    // }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<style>
    /*@media only screen and (min-width: 1400px){*/
    /*    .table-filter input, .table-filter select{*/
    /*        max-width: 9% !important;*/
    /*    }*/
    /*    .table-filter select{*/
    /*        max-width: 95px !important;*/
    /*    }*/
    /*    .table-filter .dpo {*/
    /*        max-width: 90px !important;*/
    /*    }*/
    /*}*/
</style>
<div class="col-md-12"><!--col-md-10 padding white right-p-->
    <div class="content">
        <?php $this->load->view('admin/common/breadcrumbs'); ?>

        <!--<div class="row">-->
        <!--    <div class="col-md-12">-->
        <!--        <br>-->
        <!--        <div id="google_translate_element"></div>-->
        <!--        <br>-->
        <!--    </div>-->
        <!--</div>-->
        
        
        <div class="row">
            <div class="col-md-12">
                <?php
                $flashAlert = $this->session->flashdata('alert');
                if (isset($flashAlert['message']) && !empty($flashAlert['message'])) {
                    ?>
                    <br>
                    <div style="padding: 5px 12px" class="alert <?= $flashAlert['class'] ?>">
                        <strong><?= $flashAlert['type'] ?></strong> <?= $flashAlert['message'] ?>
                        <button type="button" class="close" style="padding: 0" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
                <div class="module">
                    <?php echo $this->session->flashdata('message'); ?>
                    <div class="module-head">
                        <!--<h3> <?php if (isset($title)) echo $title; ?></h3>-->
                    </div>
                    <div class="module-body table-responsive">
                        <table id="example" class="cell-border" cellspacing="0" width="100%" data-selected_id="">
                            <thead>
                                <tr>
                                    <th class="no-sort text-center">#</th>
                                    <th class="column-id"><?php echo $this->lang->line('id'); ?></th>
                                    <th class="column-date"><?php echo $this->lang->line('send_date'); ?></th>
                                    <th class="column-time"><?php echo $this->lang->line('send_time'); ?></th>
                                    <!--<th class="column-send_time"><?php echo $this->lang->line('send_time'); ?></th>-->
                                    <th class="column-user_type" ><?php echo $this->lang->line('user_type'); ?></th>
                                    <th class="column-category"><?php echo $this->lang->line('category'); ?></th>
                                    <th class="column-status"><?php echo $this->lang->line('status'); ?></th>
                                    <th class="column-user_status"><?php echo $this->lang->line('status'); ?></th>
                                    <th class="column-since"><?php echo $this->lang->line('old'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($data) && !empty($data)): ?>
                                    <?php foreach ($data as $key => $item): ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" data-id="<?= $item->id; ?>" class="checkbox singleSelect">
                                            </td>
                                            <td>
                                                <a href="<?= site_url("admin/newsletters/" . $item->id . "/edit") ?>">
                                                    <?= create_timestamp_uid($item->created_at, $item->id); ?>
                                                </a>
                                            </td>
                                            <td><?= from_unix_date($item->created_at) ?></td>
                                            <!--<td><?= from_unix_time($item->created_at) ?></td>-->
                                            <td><?= $item->send_date_hour; ?> : <?= $item->send_date_minute; ?></td>
                                            <td><?= config_model::$user_types[$item->user_type - 1]['label']; ?></td>
                                            <td><?= $item->category; ?></td>
                                            <td><?= $item->status ?></td>
                                            <td><?= $item->user_status ?></td>
                                            <td style="white-space: nowrap"><?= timeDiff($item->last_action); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
</div>
<div id="table-filter" class="hide">
    <input type="text" placeholder="<?= $this->lang->line('category') ?>" data-name="category" class="form-control">
    <input type="text" placeholder="<?= $this->lang->line('user_type') ?>" data-name="user_type" class="form-control">
    <input type="text" placeholder="<?= $this->lang->line('status') ?>" data-name="status" class="form-control">
    <input type="text" placeholder="<?= $this->lang->line('user_status') ?>" data-name="user_status" class="form-control">

</div>