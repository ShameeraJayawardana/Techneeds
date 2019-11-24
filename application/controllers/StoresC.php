<?php

class StoresC extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('StoresM');
    }

    public function stores_allitems()
    {
        $this->load->model('StoresM');
        $data['records'] = $this->StoresM->getAllitemsData();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/stores/stores_menu_view");
        $this->load->view("/stores/allitems_view", $data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function additem()
    {
        $itm_cod = $this->input->post('itm_cod');
        $itm_wprc1 = $this->input->post('itm_wprc1');
        $itm_wprc2 = $this->input->post('itm_wprc2');
        $itm_wp = $itm_wprc1.".".$itm_wprc2;
        $itm_rprc1 = $this->input->post('itm_rprc1');
        $itm_rprc2 = $this->input->post('itm_rprc2');
        $itm_rp = $itm_rprc1.".".$itm_rprc2;
        $itm_cost1 = $this->input->post('itm_cost1');
        $itm_cost2 = $this->input->post('itm_cost2');
        $itm_cost = $itm_cost1.".".$itm_cost2;
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
        redirect(base_url() . 'StoresC/stores_additem');
    }

    public function stores_additem()
    {

        $data['records'] = $this->StoresM->getItmGrp();
        $getItmSubGrp = $this->StoresM->getItmSubGrp();

        $cal_itmGrp = $this->input->post('itm_grp');
        $cal_itmSubGrp = $this->input->post('itmsub_grp');
        $cal_itmCod = $cal_itmGrp + $cal_itmSubGrp;

        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/stores/stores_menu_view");
        $this->load->view("/stores/additem_view", $data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function fetchItem()
    {
        if ($this->input->post('itm_grp')) {
            echo $this->StoresM->fetchItem($this->input->post('itm_grp'));
        }
    }

    public function stores_additemcat()
    {
        $this->load->view("/stores/additemcat_header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/stores/stores_menu_view");
        $this->load->view("/stores/additemcat_view");
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function form_validation()
    {

        $this->load->library('form_validation');

        if ($this->form_validation()->run()) {
            //true
            $this->load->model("StoresM");
            // $this->additem();
        }
    }

}
