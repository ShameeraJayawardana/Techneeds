<?php

class PdfC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ReportsM');
    }

    public function allCategories_Cf() {
        //load library 1st
        $this->load->library('myfpdf');
        //lets send some data from controller to view file
        //$this->load->model('ReportsM');
        $data['catList'] = $this->ReportsM->getCatList_Mf();
        //see it in the view file
        $this->load->view("/printPdf/allcategoriesPdf_view", $data);
    }

    public function allitems_Cf() {
        $this->load->library('myfpdf');
        //$this->load->model('ReportsM');
        $data['allitemList'] = $this->ReportsM->getItemQnty_Mf();
        //see it in the view file
        $this->load->view("/printPdf/allitemsPdf_view", $data);
    }

    public function fpdf() {
        //load library 1st
        $this->load->library('myfpdf');
        //lets send some data from controller to view file
        $data['txt'] = 'Piyathilaka FPDF test page';
        //see it in the view file
        $this->load->view("/printPdf/allItemsPdf", $data);
    }

    public function form_validation() {

        $this->load->library('form_validation');

        if ($this->form_validation()->run()) {
            //true
            $this->load->model("ReportsM");
        }
    }

}
