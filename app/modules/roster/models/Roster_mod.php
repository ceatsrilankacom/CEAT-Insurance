<?php
/**
 * Created by Earrow.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 10/18/2019
 * Time: 8:43 AM
 */

class Roster_mod extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

}