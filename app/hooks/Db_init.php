<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_init {
    public function disable_only_full_group_by() {
        $CI =& get_instance();
        $CI->db->query("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
    }
}