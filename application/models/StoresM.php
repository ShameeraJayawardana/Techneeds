<?php

class StoresM extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function saveAddCat($catArray) {
        //insert data in to catogry table
        $this->db->insert("itemgroup", $catArray); //insert(table name,data array)
    }
    
    public function saveAddItemCat($catArray) {
        //insert data in to catogry table
        $this->db->insert("itemsubgroup", $catArray); //insert(table name,data array)
    }
    
    
    public function saveAddItem($itemArray) {
        //insert data in to item table
        $this->db->insert("unitprice", $itemArray); //insert(table name,data array)
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
    
     public function getItmSubGrp(){
        $query = $this->db->get('itemsubgroup');
        if ($query->num_rows() > 0){
            return $query->result();
        }
    }
    
    public function getItmSize(){
        $query = $this->db->get('itemsize');
        if ($query->num_rows() > 0){
            return $query->result();
        }
    }
    
    public function getItmPack(){
        $query = $this->db->get('itempack');
        if ($query->num_rows() > 0){
            return $query->result();
        }
    }

    public function getAllitemsData() {

        $this->db->select('a.itemCd,e.subGrp,d.grp,f.dst,g.storeTyp,c.storeNo'); // SELECT colomn data FROM corresponding table
        $this->db->from('item as a'); // SELECT item FROM item table

        $this->db->join('itemcode as b', 'b.itemCd = a.itemCd'); // JOIN itemcode table with item table by itemcode.itemCd = table.itemCd
        $this->db->join('stores as c', 'c.storeCd = a.storeCd');
        $this->db->join('itemgroup as d', 'd.grpCd = b.grpCd');
        $this->db->join('itemsubgroup as e', 'e.subGrpCd = b.subGrpCd');
        $this->db->join('district as f', 'f.dstCd = c.dstCd');
        $this->db->join('storetype as g', 'g.storeTypCd = c.storeTypCd');

        $query = $this->db->get(); //SELECT*FROM item table
        return $query->result();
    }
    
     public function fetchItemSearch($query)
    {
        $this->db->select("*");
        $this->db->from("itemsubgroup");
        if ($query != '') {
            $this->db->like('subGrpCd', $query);
            $this->db->or_like('subGrp', $query);
            //$this->db->or_like('adrs', $query);
           // $this->db->or_like('phnM', $query);
           // $this->db->or_like('phnH', $query);
           // $this->db->or_like('nic', $query);
        }
        $this->db->order_by('Id', 'DESC');
        return $this->db->get();
    }
    
     public function searchItem($item)
    {
        $this->db->select("*");
        $this->db->from("itemsubgroup");
        $this->db->where('Id', $item);
        $query = $this->db->get();
        return $query->result();
    }
    //--------------------
     public function editItem($item)
    {
        $this->db->select("*");
        $this->db->from("itemsubgroup");
        $this->db->where('itemsubgroup.itemCd', $item);
        $query = $this->db->get();
        return $query->result();
    }
    //-----------------------
    

}
