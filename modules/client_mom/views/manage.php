<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="panel_s">
      <div class="panel-body">
        <a href="<?php echo admin_url('client_mom/form'); ?>" class="btn btn-info pull-right display-block">
          <?php echo _l('new_mom'); ?>
        </a>
        <h4 class="_title"><?php echo _l('client_mom'); ?></h4>
        <div class="clearfix"></div>
        <table class="table table-client-mom" id="mom_table">
          <thead>
            <tr>
              <th><?php echo _l('mom_title'); ?></th>
              <th><?php echo _l('mom_date'); ?></th>
              <th><?php echo _l('project'); ?></th>
              <th><?php echo _l('options'); ?></th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
$(function(){
    initDataTable('#mom_table', admin_url+'client_mom');
});
</script>
