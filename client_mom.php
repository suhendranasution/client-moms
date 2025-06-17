<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: Client MOM
Description: Menambahkan fitur share notes project ke publik dengan link khusus
Version: 1.0.0
Author: Tim Anda
*/

define('CLIENT_MOM_MODULE_NAME', 'client_mom');

register_activation_hook(CLIENT_MOM_MODULE_NAME, 'client_mom_module_activate');
register_deactivation_hook(CLIENT_MOM_MODULE_NAME, 'client_mom_module_deactivate');

hooks()->add_action('admin_init', 'client_mom_init_menu');
hooks()->add_action('app_admin_head', 'client_mom_assets');
hooks()->add_action('after_project_notes_table_row', 'client_mom_add_share_icon_to_notes_row');
hooks()->add_action('app_customers_head', 'client_mom_assets');

function client_mom_module_activate() {
    require_once(__DIR__.'/install.php');
}

function client_mom_module_deactivate() {
    // nothing
}

function client_mom_init_menu() {
    // tidak ada menu khusus, fitur langsung pada projects
}

function client_mom_assets() {
    echo '<link href="'.module_dir_url(CLIENT_MOM_MODULE_NAME, 'assets/css/client_mom_public.css').'"  rel="stylesheet" type="text/css" />';
    echo '<script src="'.module_dir_url(CLIENT_MOM_MODULE_NAME, 'assets/js/client_mom_notes.js').'"></script>';

}

function client_mom_add_share_icon_to_notes_row($note) {
    $CI =& get_instance();
    $CI->load->view('client_mom/notes_share_icon', ['note' => $note]);
}