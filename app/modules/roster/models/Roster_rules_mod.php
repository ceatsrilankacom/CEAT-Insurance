<?php
/**
 * Created by Earrow.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 10/18/2019
 * Time: 3:26 PM
 */

class Roster_rules_mod extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}