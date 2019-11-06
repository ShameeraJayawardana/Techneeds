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

    public function saveCustomer($cusArray) {
        $this->db->insert("customer", $cusArray);
    }

    public function fetchCustomer($query){
        $this->db->select("*");
        $this->db->from("customer");
        if($query != '')
        {
            $this->db->like('nm1', $query);
            $this->db->or_like('nm2', $query);
            $this->db->or_like('adrs', $query);
            $this->db->or_like('phnM', $query);
            $this->db->or_like('phnH', $query);
            $this->db->or_like('nic', $query);
        }
        $this->db->order_by('custId', 'DESC');
        return $this->db->get();
    }
}
