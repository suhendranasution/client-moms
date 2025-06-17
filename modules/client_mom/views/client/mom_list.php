<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<h4 class="tw-mt-0 tw-font-semibold tw-text-lg tw-text-neutral-700">
  <?php echo _l('client_mom'); ?>
</h4>
<table class="table" id="client_mom_table">
  <thead>
    <tr>
      <th><?php echo _l('mom_title'); ?></th>
      <th><?php echo _l('mom_date'); ?></th>
      <th><?php echo _l('mom_project'); ?></th>
      <th><?php echo _l('mom_token_link'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($moms as $mom){ ?>
      <tr>
        <td><?php echo $mom->title; ?></td>
        <td><?php echo _d($mom->mom_date); ?></td>
        <td><?php echo get_project_name_by_id($mom->project_id); ?></td>
        <td><a href="<?php echo site_url('mom/'.$mom->token); ?>" target="_blank">Link</a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
