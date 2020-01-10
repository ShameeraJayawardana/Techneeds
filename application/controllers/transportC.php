<?php

class transportC extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('transportM');
    }

    public function newAssign()
    {
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/transport/transport_main_view");
        $this->load->view("/transport/vehicleAssign_view");
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }
    
     public function warehouseList()
    {
          $data['warehouse'] = $this->transportM->getwarehouseData();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/transport/transport_main_view");
        $this->load->view("/transport/listwarehouse_view",$data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }
}
