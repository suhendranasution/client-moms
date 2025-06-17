<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<h3><?php echo $mom->title; ?></h3>
<p><?php echo _d($mom->mom_date); ?> - <?php echo get_project_name_by_id($mom->project_id); ?></p>
<div>
  <?php echo $mom->content; ?>
</div>
