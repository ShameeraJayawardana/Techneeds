<?php

class InvoiceC extends CI_Controller {

    public function invoicing() {
        $this->load->model('InvoiceM');
        $data['records'] = $this->InvoiceM->getInvoiceData();
        $data['records2'] = $this->InvoiceM->getInvoiceData2();
        $data['records3'] = $this->InvoiceM->getCatogaryData();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/invoice/invoice_menu_view");
        $this->load->view("/invoice/invoicing_view", $data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function cust_order() {
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/stores/stores_menu_view");
        $this->load->view("/stores/form_additem_view");
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }
    
        public function payment() {
        $this->load->model('InvoiceM');
        $data['records'] = $this->InvoiceM->getData();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/invoice/invoice_menu_view");
        $this->load->view("/invoice/invoice_view", $data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }
    
        public function reports() {
        $this->load->model('InvoiceM');
        $data['records'] = $this->InvoiceM->getData();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/invoice/invoice_menu_view");
        $this->load->view("/invoice/invoice_view", $data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function form_validation() {

        $this->load->library('form_validation');

        if ($this->form_validation()->run()) {
            //true
            $this->load->model("InvoiceM");
        }
    }

}
