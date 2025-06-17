<?php
defined('BASEPATH') or exit('No direct script access allowed');

$CI = &get_instance();
if ($CI->db->table_exists(db_prefix() . 'client_mom')) {
    $CI->db->query('DROP TABLE `' . db_prefix() . 'client_mom`');
}
