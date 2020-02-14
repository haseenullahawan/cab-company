<?php $locale_info = localeconv(); ?>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
</script>


<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
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
<div class="col-md-12"><!--col-md-10 padding white right-p-->
    <div class="content">
        <?php $this->load->view('admin/common/breadcrumbs'); ?>

        <div class="row">
            <div class="col-md-12">
                <br>
                <div id="google_translate_element"></div>
                <br>
            </div>
        </div>

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
                                    <th class="column-date"><?php echo $this->lang->line('date'); ?></th>
                                    <th class="column-time"><?php echo $this->lang->line('task_time'); ?></th>
                                    <th class="column-added_by"><?php echo $this->lang->line('added_by'); ?></th>
                                    <th class="column-from_department" ><?php echo $this->lang->line('from_department'); ?></th>
                                    <th class="column-affected_to"><?php echo $this->lang->line('affected_to'); ?></th>
                                    <th class="column-from_department"><?php echo $this->lang->line('from_department'); ?></th>
                                    <th class="column-delay_date"><?php echo $this->lang->line('delay_date'); ?></th>
                                    <th class="column-delay_time"><?php echo $this->lang->line('delay_time'); ?></th>
                                    <th class="column-priority"><?php echo $this->lang->line('priority'); ?></th>
                                    <th class="column-status"><?php echo $this->lang->line('status'); ?></th>
                                    <th class="column-old"><?php echo $this->lang->line('old'); ?></th>
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
                                                <a href="<?= site_url("admin/tasks/" . $item->id . "/edit") ?>">
                                                    <?= create_timestamp_uid($item->created_at, $item->id); ?>
                                                </a>
                                            </td>
                                            <td><?= from_unix_date($item->date) ?></td>
                                            <td><?= $item->date_hour . ':' . $item->date_minute ?></td>
                                            <td><?= $item->added_by_firstname . ' ' . $item->added_by_lastname ?></td>
                                            <td><?= $item->department; ?></td>
                                            <td><?= $item->username; ?></td>
                                            <td><?= $item->department; ?></td>
                                            <td><?= from_unix_date($item->date2); ?></td>
                                            <td><?= $item->date2_hour . ':' . $item->date2_minute ?></td>
                                            <td><?= $item->priority; ?></td>
                                            <td><?= $item->status ?></td>
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
    <input type="text" placeholder="<?= $this->lang->line('added_by') ?>" data-name="added_by" class="form-control">
    <input type="text" placeholder="<?= $this->lang->line('from_department') ?>" data-name="from_department" class="form-control">
    <input type="text" placeholder="<?= $this->lang->line('affected_to') ?>" data-name="affected_to" class="form-control">
    <input type="text" placeholder="<?= $this->lang->line('from_department') ?>" data-name="from_department" class="form-control">
    <input type="text" placeholder="<?= $this->lang->line('priority') ?>" data-name="priority" class="form-control">
    <input type="text" placeholder="<?= $this->lang->line('status') ?>" data-name="status" class="form-control">
<!--    <select onchange="this.options[this.selectedIndex].value && (window.location = '<?= base_url() ?>' + this.options[this.selectedIndex].value + '<?= '/' . $this->router->class ?>');" class="form-control">
        <option>All Languages</option>
    <?php foreach (config_model::$languages as $key => $language): ?>
        <?php $selected = $this->lang->lang() == $language['code'] ? "selected" : "" ?>
                <option <?= $selected ?> value="<?= $language['code'] ?>"><?= $language['label'] ?></option>
    <?php endforeach; ?>
    </select>-->
</div>