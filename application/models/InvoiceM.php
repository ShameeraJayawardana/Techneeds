<?php

class InvoiceM extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getInvoiceData() {
        $query = $this->db->get('item'); //SELECT*FROM item table
        return $query->result();
    }
    
    public function getInvoiceData2() {
        $query = $this->db->get('itemsubgroup'); //SELECT*FROM item table
        return $query->result();
    }
    
    public function getCatogaryData() {
        $query = $this->db->get('itemgroup'); //SELECT*FROM item table
        return $query->result();
    }
}
