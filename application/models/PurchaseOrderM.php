<?php
class PurchaseOrderM extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
     public function saveNewSupplier($supplier) {
        //insert data in to item table
        $this->db->insert("supplier", $supplier); //insert(table name,data array)
    }
    
     public function getSupplierData() {
        $query = $this->db->get('supplier'); //SELECT*FROM item table
        return $query->result();
    }
    
     public function savePO($poarray) {
        //insert data in to po table
        $this->db->insert("purchaseorder", $poarray); //insert(table name,data array)
    }
    
    public function getPOData() {
        
        $query = $this->db->get('purchaseorder'); //SELECT*FROM item table
        return $query->result();
    }
     public function getPODataJoin() {
        $this->db->select('a.supplierId');
        $this->db->from('supplier as a');
        $this->db->join('purchaseorder as b','b.supplierId = a.supplierId');
        $query = $this->db->get(); //SELECT*FROM item table
        return $query->result();
     }
    
    public function getItmGrp(){
        $query = $this->db->get('itemgroup');
        if ($query->num_rows() > 0){
            return $query->result();
        }
    }
     public function fetchItem($itemData) {
        $this->db->where('grpCd', $itemData);
        $this->db->order_by('subGrpCd', 'ASC');
        $query = $this->db->get('itemsubgroup');
        $output = '<option value="" selected disabled>Select Item</option>';
        foreach ($query->result() as $row){
            $output .= '<option value="'.$row->subGrpCd.'">'.$row->subGrp.'</option>';
        }
        return $output;
    }
    public function deleteAll($id){
        $this->db->where('supplierId', $id);
        $this->db->delete('supplier');
    }
    
    
    
}
