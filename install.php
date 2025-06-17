<?php
defined('BASEPATH') or exit('No direct script access allowed');
$CI = &get_instance();

if (!$CI->db->table_exists(db_prefix() . 'client_mom_notes_share')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . "client_mom_notes_share` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `note_id` INT NOT NULL,
        `token` VARCHAR(64) NOT NULL,
        `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
        `created_by` INT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `note_id` (`note_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');
}
