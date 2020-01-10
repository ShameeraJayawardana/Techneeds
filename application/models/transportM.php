<?php

class transportM extends  CI_Model {

    public function __construct() {
        parent::__construct();
        
    }
    
     public function getwarehouseData() {
        $query = $this->db->get('stores'); //SELECT*FROM item table
        return $query->result();
    }
    
    
    
}
