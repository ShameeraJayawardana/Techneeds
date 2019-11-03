<?php

class ReportsC extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function allitemsR() {
        $this->load->model('ReportsM');
        $data['records'] = $this->ReportsM->getAllitemsData();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/reports/reports_menu_view");
        $this->load->view("/reports/allitemsR_view", $data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }
    
    public function itemCategoriesR() {
        $this->load->model('ReportsM');
        $data['records'] = $this->ReportsM->getitemCatData();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/reports/reports_menu_view");
        $this->load->view("/reports/itemcategoriesR_view", $data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function form_validation() {

        $this->load->library('form_validation');

        if ($this->form_validation()->run()) {
            //true
            $this->load->model("ReportsM");
        }
    }

}
