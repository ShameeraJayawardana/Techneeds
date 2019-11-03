<?php

class StoresM extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function saveAddItem($itemArray) {
        //insert data in to item table
        $this->db->insert("item", $itemArray); //insert(table name,data array)
    }
    
    public function getItmGrp(){
        $query = $this->db->get('itemgroup');
        if ($query->num_rows() > 0){
            return $query->result();
        }
    }
    
     public function getItmSubGrp(){
        $query = $this->db->get('itemsubgroup');
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

}
