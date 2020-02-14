<?php $locale_info = localeconv(); ?>
<?php 

// $driver_civilites = [];
// foreach ($drivers as $driver) {
// 	$driver_civilites[$driver->id] = $driver->civilite;
// }

?>
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
                        <?=form_open(base_url("admin/infraction/".$infraction->id."/edit/"))?>
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="pending" <?= ($infraction->status == 'pending') ? 'selected': false; ?>>pending</option>
                                        <option value="paid" <?= ($infraction->status == 'paid') ? 'selected': false; ?>>paid</option>
                                        <option value="designed" <?= ($infraction->status == 'designed') ? 'selected': false; ?>>designed</option>
                                        <option value="closed" <?= ($infraction->status == 'closed') ? 'selected': false; ?>>closed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Infraction date</label>
                                    <input type="date" maxlength="100" class="form-control bdatepicker" required name="infraction_date"  value="<?= $infraction->infraction_date ?>">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Infraction number</label>
                                    <input type="text" maxlength="100" class="form-control" required name="infraction_number"  value="<?= $infraction->infraction_number ?>">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Stationary fast category</label>
                                    <select class="form-control" name="stationary_fast_category" required>
                                        <option value="">Select</option>
                                        <option value="stationary" <?= ($infraction->stationary_fast_category == 'stationary') ? 'selected': false; ?>>stationary</option>
                                        <option value="fast" <?= ($infraction->stationary_fast_category == 'fast') ? 'selected': false; ?>>fast</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-1">
                                <div class="form-group">
                                    <label>Deduced points</label>
                                    <select class="form-control" name="deduced_points" required>
                                        <option value="">Select</option>
                                        <option value="0" <?= ($infraction->deduced_points == 0) ? 'selected' : false; ?>>0</option>
                                        <option value="1" <?= ($infraction->deduced_points == 1) ? 'selected' : false; ?>>1</option>
                                        <option value="2" <?= ($infraction->deduced_points == 2) ? 'selected' : false; ?>>2</option>
                                        <option value="3" <?= ($infraction->deduced_points == 3) ? 'selected' : false; ?>>3</option>
                                        <option value="4" <?= ($infraction->deduced_points == 4) ? 'selected' : false; ?>>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-1">
                                <div class="form-group">
                                    <label>Driver</label>
                                    <select class="form-control" name="driver" required>
                                        <option value="">Select</option>
                                        <?php foreach ($drivers as $driver): ?>
                                        <option value="<?= $driver->id ?>" <?= ($driver->id == $infraction->driver) ? 'selected' : false; ?>><?= $driver->civilite ?></option>
	                                      <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-2">
                              <div class="form-group">
                                <label>Infraction date</label>
                                <input type="date" maxlength="100" class="form-control bdatepicker" required name="infraction_date2"  value="<?= $infraction->infraction_date2; ?>">
                              </div>
                            </div>
                            <div class="col-xs-2">
                              <div class="form-group">
                                <label>Infraction time</label>
                                <input type="time" maxlength="100" class="form-control btimepicker" required name="infraction_time"  value="<?= $infraction->infraction_time; ?>">
                              </div>
                            </div>
                            <div class="col-xs-2">
                              <div class="form-group">
                                <label>Address</label>
                                <input type="text" maxlength="100" class="form-control" required name="address"  value="<?= $infraction->address; ?>">
                              </div>
                            </div>
                            <div class="col-xs-2">
                              <div class="form-group">
                                <label>Postal code</label>
                                <input type="text" maxlength="100" class="form-control" required name="postal_code"  value="<?= $infraction->postal_code; ?>">
                              </div>
                            </div>
                            <div class="col-xs-2">
                              <div class="form-group">
                                <label>City</label>
                                <input type="text" maxlength="100" class="form-control" required name="city"  value="<?= $infraction->city; ?>">
                              </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-2">
                            <div class="form-group">
                              <label>Amount</label>
                              <input type="text" maxlength="100" class="form-control btimepicker" required name="amount1"  value="<?= $infraction->amount1; ?>">
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <div class="form-group">
                              <label>Delay</label>
                              <input type="text" maxlength="100" class="form-control btimepicker" required name="delay1"  value="<?= $infraction->delay1; ?>">
                            </div>
                          </div>

                          <div class="col-xs-2">
                            <div class="form-group">
                              <label>Amount</label>
                              <input type="text" maxlength="100" class="form-control btimepicker" required name="amount2"  value="<?= $infraction->amount2; ?>">
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <div class="form-group">
                              <label>Delay</label>
                              <input type="text" maxlength="100" class="form-control btimepicker" required name="delay2"  value="<?= $infraction->delay2; ?>">
                            </div>
                          </div>

                          <div class="col-xs-2">
                            <div class="form-group">
                              <label>Amount</label>
                              <input type="text" maxlength="100" class="form-control btimepicker" required name="amount3"  value="<?= $infraction->amount3; ?>">
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <div class="form-group">
                              <label>Delay</label>
                              <input type="text" maxlength="100" class="form-control btimepicker" required name="delay3"  value="<?= $infraction->delay3; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-4">
                            <div class="form-group">
                              <label>Paid amount</label>
                              <input type="text" maxlength="100" class="form-control" required name="paid_amount"  value="<?= $infraction->paid_amount; ?>">
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <div class="form-group">
                              <label>Payment method</label>
                              <select class="form-control" name="payment_method" required>
                                <option value="">Select</option>
                                <?php foreach($payment_methods as $method): ?>
                                <option value="<?= $method->id; ?>" <?= ($method->id == $infraction->payment_method) ? 'selected': false; ?>><?= $method->payment; ?></option>
	                              <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Message*</label>
                                    <textarea name="message" required class="form-control"><?= $infraction->message; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button name="save" class="btn btn-default">Save</button>
                            <a href="<?=base_url("admin/request")?>" class="btn btn-default">Cancel</a>
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
  // $(".bdatepicker").datepicker({
  //     format: "dd/mm/yyyy"
  // });
  // $('.btimepicker').datetimepicker({
  //     format: 'LT'
  // });
});
</script>