<?php

class InvoiceM extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getInvoiceData()
    {
        $query = $this->db->get('item'); //SELECT*FROM item table
        return $query->result();
    }

    public function getInvoiceData2()
    {
        $query = $this->db->get('itemsubgroup'); //SELECT*FROM item table
        return $query->result();
    }

    public function getCatogaryData()
    {
        $query = $this->db->get('itemgroup');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function fetchItem($itemData)
    {
        $this->db->select('*');
        $this->db->from('itemsubgroup as a');
        $this->db->where('a.grpCd', $itemData);
        $this->db->join('unitprice as b', "b.itemCd = CONCAT_WS('',a.grpCd,a.subGrpCd, 'AA')");
        $this->db->join('item as c', 'c.itemCd = b.itemCd');

        $query = $this->db->get();
        $output = '';
        foreach ($query->result() as $row) {
            $output .= '<div class="col-md-4" style="padding:16px; background-color:#f1f1f1; border:1px solid #ccc; margin-bottom:16px; height:400px" align="center">
     <h4>' . $row->subGrp . '</h4>
     <h3 class="text-danger">$' . $row->priceWs . '</h3>
     <input type="text" name="quantity" class="form-control quantity" id="' . $row->itemCd . '" /><br />
     <button type="button" name="add_cart" class="btn btn-success add_cart" data-productname="' . $row->subGrp . '" data-price="' . $row->priceWs . '" data-productid="' . $row->itemCd . '">Add to Cart</button>
    </div>';
        }
        return $output;
    }

    public function fetchItemDetails($itemData)
    {
        $this->db->select('*');
        $this->db->from('item as a');
        $this->db->where('a.itemCd', $itemData);
        $this->db->join('unitprice as b', 'b.itemCd = a.itemCd');

        $query = $this->db->get();
        $output = [];
        foreach ($query->result() as $row) {
//            $output = $row->id;
            array_push($output, $row->priceCd, $row->itemCd, $row->priceWs, $row->priceR, $row->cost, $row->wsDisMin, $row->wsDisMax, $row->rDisMax, $row->quantity, $row->sNo, $row->storeCd);
        }
        return json_encode($output);
//        return $query->result();
    }

    public function saveCustomer($cusArray)
    {
        $this->db->insert("customer", $cusArray);
    }

    public function fetchCustomer($query)
    {
        $this->db->select("*");
        $this->db->from("customer");
        if ($query != '') {
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
