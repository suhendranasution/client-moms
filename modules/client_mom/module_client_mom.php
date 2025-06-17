<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Client MOM module
 */

define('CLIENT_MOM_MODULE_NAME', 'client_mom');

register_activation_hook(CLIENT_MOM_MODULE_NAME, 'client_mom_install');
register_deactivation_hook(CLIENT_MOM_MODULE_NAME, 'client_mom_uninstall');

hooks()->add_action('admin_init', 'client_mom_init_menu');

function client_mom_install(){
    require_once(__DIR__.'/install.php');
}
function client_mom_uninstall(){
    require_once(__DIR__.'/uninstall.php');
}

function client_mom_init_menu(){
    $CI = &get_instance();
    if (is_staff_logged_in()) {
        $CI->app_menu->add_sidebar_menu_item('client_mom', [
            'slug'     => 'client_mom',
            'name'     => _l('client_mom'),
            'icon'     => 'fa fa-file-text',
            'href'     => admin_url('client_mom'),
            'position' => 30,
        ]);
    }
}

