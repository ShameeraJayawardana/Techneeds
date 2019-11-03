<?php

class StoresC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('StoresM');
    }

    public function stores_allitems() {
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

     public function additem() {
        $ItmGrp = $this->input->post('itm_grp');
        $ItemSubGrp = $this->input->post('itmsub_grp');
        $ItmCod = $this->input->post('itm_cod');
        $StoreCd = "12";
        $SNo = $this->input->post('itm_cod');

        //get Data to $data1 array
        $itemArray = array(
            'itemCd' => $ItmCod,
            'sNo' => $SNo,
            'storeCd' => $StoreCd
        );


        //save data to data base
        $this->StoresM->saveAddItem($itemArray);
    }
    public function stores_additem() {
        
         $getItmGrp = $this->StoresM->getItmGrp();
        $getItmSubGrp = $this->StoresM->getItmSubGrp();

        $cal_itmGrp = $this->input->post('itm_grp');
        $cal_itmSubGrp = $this->input->post('itmsub_grp');
        $cal_itmCod = $cal_itmGrp + $cal_itmSubGrp;
        
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/stores/stores_menu_view");
        $this->load->view("/stores/additem_view",['getItmGrp' => $getItmGrp, 'getItmSubGrp' => $getItmSubGrp, $cal_itmGrp, $cal_itmCod]);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function stores_additemcat() {
        $this->load->view("/stores/additemcat_header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/stores/stores_menu_view");
        $this->load->view("/stores/additemcat_view");
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function form_validation() {

        $this->load->library('form_validation');

        if ($this->form_validation()->run()) {
            //true
            $this->load->model("StoresM");
           // $this->additem();
        }
    }

}
