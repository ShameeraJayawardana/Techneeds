<?php

class repairM extends CI_Model {
   public function __construct() {
        parent::__construct();
    }
    
     public function saveNewrepairItem($addrepairitem) {
        //insert data in to item table
        $this->db->insert("itemreturn", $addrepairitem); //insert(table name,data array)
    }
}
