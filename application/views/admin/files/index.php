<?php $locale_info = localeconv(); ?>
<!--<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>-->

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
        
<!--        <div class="row">
            <div class="col-md-12">
                <br>
                <div id="google_translate_element"></div>
                <br>
            </div>
        </div>-->
        
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
                                    <th class="column-type"><?php echo $this->lang->line('type'); ?></th>
                                    <th class="column-user_type" ><?php echo $this->lang->line('date'); ?></th>
                                    <th class="column-name"><?php echo $this->lang->line('name'); ?></th>
                                    <th class="column-alert"><?php echo $this->lang->line('alert'); ?></th>
                                    <th class="column-delay_date"><?php echo $this->lang->line('delay_date'); ?></th>
                                    <th class="column-destination"><?php echo $this->lang->line('destination'); ?></th>
                                    <th class="column-priority"><?php echo $this->lang->line('priority'); ?></th>
                                    <th class="column-file"><?php echo $this->lang->line('file'); ?></th>
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
                                                <?= create_timestamp_uid($item->created_at, $item->id); ?>
                                            </td>
                                            <td><?= from_unix_date($item->created_at) ?></td>
                                            <td><?= ucfirst($item->type); ?></td>
                                            <td><?= from_unix_date($item->date) ?></td>
                                            <td><?= ucfirst($item->name); ?></td>
                                            <td><?= ucfirst($item->alert) ?></td>
                                            <td><?= from_unix_date($item->delay_date) ?></td>
                                            <td><?= ucfirst($item->destination) ?></td>
                                            <td><?= ucfirst($item->priority) ?></td>
                                            <td><button onclick="window.open('<?=base_url().'uploads/files/'.$item->file?>','popUpWindow','height=400,width=600,left=10,top=10,,scrollbars=yes,menubar=no')" class="btn btn-default">View</button></td>
                                            <td><?= ucfirst($item->status) ?></td>
                                            <td style="white-space: nowrap; <?=dayDiff($item->date,$item->alert_before_day)?>"><?= timeDiff($item->last_action); ?></td>
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
    <input type="text" placeholder="<?= $this->lang->line('type') ?>" data-name="type" class="form-control">
    <input type="text" placeholder="<?= $this->lang->line('name') ?>" data-name="name" class="form-control">
    <input type="text" placeholder="<?= $this->lang->line('alert') ?>" data-name="alert" class="form-control">
    <input type="text" placeholder="<?= $this->lang->line('destination') ?>" data-name="destination" class="form-control">
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

<style>
    .editBtn{
        display: none;
    }
</style>