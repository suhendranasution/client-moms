<?php
defined('BASEPATH') or exit('No direct script access allowed');

$CI = &get_instance();
if (!$CI->db->table_exists(db_prefix() . 'client_mom')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . "client_mom" . '` (
        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `title` VARCHAR(191) NOT NULL,
        `mom_date` DATE NOT NULL,
        `project_id` INT UNSIGNED NOT NULL,
        `content` MEDIUMTEXT NULL,
        `token` VARCHAR(32) NULL,
        `staff_id` INT UNSIGNED NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;');
}
