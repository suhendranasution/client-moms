<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php echo form_open(admin_url('client_mom/form'.($mom ? '/' . $mom->id : ''))); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo render_input('title','mom_title',isset($mom)?$mom->title:''); ?>
  </div>
  <div class="col-md-6">
    <?php echo render_date_input('mom_date','mom_date',isset($mom)?_d($mom->mom_date):''); ?>
  </div>
  <div class="col-md-12">
    <?php echo render_select('project_id',$projects,array('id','name'),'mom_project',isset($mom)?$mom->project_id:''); ?>
  </div>
  <div class="col-md-12">
    <?php echo render_textarea('content','mom_content',isset($mom)?$mom->content:'',array(),array(),'','tinymce'); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-12 text-center">
    <button type="submit" class="btn btn-primary"><?php echo _l('submit'); ?></button>
  </div>
</div>
<?php echo form_close(); ?>
<?php init_tail(); ?>
<script>
$(function(){
    init_editor('#content');
});
</script>
