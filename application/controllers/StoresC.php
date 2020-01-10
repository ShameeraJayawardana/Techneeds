<?php

class StoresC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('StoresM');
        $this->load->library('pagination');
    }

    public function stores_allitems() {
        $this->load->model('StoresM');
        $data['records'] = $this->StoresM->getAllitemsData();
        $data['grpRecords'] = $this->StoresM->getItmGrp();
        $data['storeRecords'] = $this->StoresM->getStore();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/stores/stores_menu_view");
        $this->load->view("/stores/allitems_view", $data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function additem() {
        $itm_cod = $this->input->post('itm_cod');
        $itm_wprc1 = $this->input->post('itm_wprc1');
        $itm_wprc2 = $this->input->post('itm_wprc2');
        $itm_wp = $itm_wprc1 . "." . $itm_wprc2;
        $itm_rprc1 = $this->input->post('itm_rprc1');
        $itm_rprc2 = $this->input->post('itm_rprc2');
        $itm_rp = $itm_rprc1 . "." . $itm_rprc2;
        $itm_cost1 = $this->input->post('itm_cost1');
        $itm_cost2 = $this->input->post('itm_cost2');
        $itm_cost = $itm_cost1 . "." . $itm_cost2;
        $mn_whl_dis = $this->input->post('mn_whl_dis');
        $mx_whl_dis = $this->input->post('mx_whl_dis');
        $mx_rtl_dis = $this->input->post('mx_rtl_dis');
        $quantity = $this->input->post('quantity');
//        $StoreCd = "12";
//        $SNo = $this->input->post('itm_cod');
        //get Data to $data1 array
        $itemArray = array(
            'priceCd' => "priceCd",
            'itemCd' => $itm_cod,
            'priceWs' => $itm_wp,
            'priceR' => $itm_rp,
            'cost' => $itm_cost,
            'wsDisMin' => $mn_whl_dis,
            'wsDisMax' => $mx_whl_dis,
            'rDisMax' => $mx_rtl_dis,
            'quantity' => $quantity
        );

        //save data to data base
        $this->StoresM->saveAddItem($itemArray);
        redirect(base_url() . 'StoresC/stores_addstock');
    }

    public function stores_addstock() {
        $data['grpRecords'] = $this->StoresM->getItmGrp();
        $getItmSubGrp = $this->StoresM->getItmSubGrp();
        $data['sizeRecords'] = $this->StoresM->getItmSize();
        $data['packRecords'] = $this->StoresM->getItmPack();

        $cal_itmGrp = $this->input->post('itm_grp');
        $cal_itmSubGrp = $this->input->post('itmsub_grp');
        $cal_itmSize = $this->input->post('itm_size');
        $cal_itmCod = $cal_itmGrp + $cal_itmSubGrp + $cal_itmSize;

        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/stores/stores_menu_view");
        $this->load->view("/stores/addstock_view", $data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function fetchItem() {
        if ($this->input->post('itm_grp')) {
            echo $this->StoresM->fetchItem($this->input->post('itm_grp'));
        }
    }

    public function stores_newitemcat() {
        $data['grpRecords'] = $this->StoresM->getItmGrp();

        $this->load->view("/stores/newitemcat_header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/stores/stores_menu_view");
        $this->load->view("/stores/newitemcat_view", $data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }
    
     public function addNewCategory() {
        $itm_cat_id = $this->input->post('itm_cat_id');
        $itm_cat = $this->input->post('itm_cat');

        $catArray = array(
            'grpCd' => $itm_cat_id,
            'grp' => $itm_cat
        );
        $this->StoresM->saveAddCat($catArray);
        redirect(base_url() . 'StoresC/stores_newitemcat');
    }
   

    public function addNewItem() {

        $ItemGrp = $this->input->post('itm_grp');
        $itemSupCode = $this->input->post('itm_sup_cod');
        $itemDis = $this->input->post('item_Dis');
        //$itemSize = $this->input->post('itmsize');
        //$itempack = $this->input->post('itmpack');

        $catArray = array(
            'grpCd' => $ItemGrp,
            'subGrpCd' => $itemSupCode,
            'subGrp' => $itemDis,
            
        );
        $this->StoresM->saveAddItemCat($catArray);
        redirect(base_url() . 'StoresC/stores_newitemcat');
    }
    
     public function fetchItemSearch() {
        $output = '';
        $query = '';
        $this->load->model('StoresM');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->StoresM->fetchItemSearch($query);
        $output .= '
   <div class="container">         
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th>Item Code</th>
       <th>id </th>
       <th>subgupcode</th>
       <th>subgroup</th>
       <th>Home</th>
       <th>NIC</th>
       <th>Customer Group</th>
      </tr>
  ';
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
      <tr>
      
       <td>' . $row->subGrpCd . " " . /* $row->nm2 . */'</td>
       <td>' . $row->subGrp . '</td>
       <td>' . $row->grpCd . '</td>
       <td>' . /* $row->phnH . */ '</td>
       <td>' . /* $row->nic . */'</td>
       <td>' . /* $row->custGrpCd . */ '</td>
      </tr>
    ';
            }
        } else {
            $output .= '<tr>
       <td colspan="6">No Data Found</td>
      </tr>';
        }
        $output .= '</table> </div> </div>';

        echo $output;
    }


    public function searchItem() {
        $item = $_POST["item"];
        $newdata = array();
        $newdata = $this->StoresM->searchCustomer($item);
        $this->session->set_userdata($newdata);
    }
    
    public function viewItem() {
        $this->load->model('StoresM');
        $data['records'] = $this->StoresM->getAllitemsData();
        $data['grpRecords'] = $this->StoresM->getItmGrp();
       // $data['itemdis'] = $this->StoresM->getItemCode();
        $data['itemdis'] = $this->StoresM->getItmSubGrp();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/stores/stores_menu_view");
        $this->load->view("/stores/item_view", $data);
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/stores/stores_menu_view");
        $this->load->view("/stores/newitemcat_view", $data);

        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }
    
    public function addNewCategory() {
        $itm_cat_id = $this->input->post('itm_cat_id');
        $itm_cat = $this->input->post('itm_cat');

        $catArray = array(
            'grpCd' => $itm_cat_id,
            'grp' => $itm_cat
        );
        $this->StoresM->saveAddCat($catArray);
        redirect(base_url() . 'StoresC/stores_newitemcat');
    }

    public function addCategory() {
        $itemCode = $this->input->post('itm_grp');
        $itemSubCat = $this->input->post('itm_sup_cod');
        $itemDis = $this->input->post('item_Dis');

        $catArray = array(
            'subGrpCd' => $itemSubCat,
            'subGrp' => $itemDis,
            'grpCd' => $itemCode
        );
        $this->StoresM->saveAddItemCat($catArray);
        redirect(base_url() . 'StoresC/stores_newitemcat');
    }

    public function addNewItem() {

        $ItemGrp = $this->input->post('itm_grp');
        $itemSupCode = $this->input->post('itm_sup_cod');
        $itemDis = $this->input->post('item_Dis');
        //$itemSize = $this->input->post('itmsize');
        //$itempack = $this->input->post('itmpack');

        $newItem = array(
            'grpCd' => $ItemGrp,
            'subGrpCd' => $itemSupCode,
            'subGrp' => $itemDis,
            'sizeCd' => '',
            'packCd' => ''
        );
        $this->StoresM->saveAddNewItem($newItem);
        redirect(base_url() . 'StoresC/stores_newitemcat');
    }

    public function fetchItemSearch() {
        $output = '';
        $query = '';
        $this->load->model('StoresM');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->StoresM->fetchItemSearch($query);
        $output .= '
   <div class="container">         
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th></th>
       <th>id </th>
       <th>subgupcode</th>
       <th>subgroup</th>
       <th>Home</th>
       <th>NIC</th>
       <th>Customer Group</th>
      </tr>
  ';
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
      <tr>
      
       <td>' . $row->subGrpCd . " " . /* $row->nm2 . */'</td>
       <td>' . $row->subGrp . '</td>
       <td>' . $row->grpCd . '</td>
       <td>' . /* $row->phnH . */ '</td>
       <td>' . /* $row->nic . */'</td>
       <td>' . /* $row->custGrpCd . */ '</td>
      </tr>
    ';
            }
        } else {
            $output .= '<tr>
       <td colspan="6">No Data Found</td>
      </tr>';
        }
        $output .= '</table> </div> </div>';
        
        echo $output;
    }

//    public function searchItem() {
//        $item = $_POST["itemsubgroup"];
//        $newdata = array();
//        $newdata = $this->StoresM->searchItem($item);
//        $this->session->set_userdata($newdata);
//    }

    public function form_validation() {

        $this->load->library('form_validation');

        if ($this->form_validation()->run()) {
            //true
            $this->load->model("StoresM");
            // $this->additem();
        }
    }

}

