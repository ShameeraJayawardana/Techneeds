<?php

class InvoiceC extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('InvoiceM');
    }

    public function invoicing()
    {
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

    public function cust_order()
    {
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/stores/stores_menu_view");
        $this->load->view("/stores/form_additem_view");
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function payment()
    {
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

    public function reports()
    {
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

    public function form_validation()
    {

        $this->load->library('form_validation');

        if ($this->form_validation()->run()) {
            //true
            $this->load->model("InvoiceM");
        }
    }

    public function addCustomer()
    {
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $nic = $this->input->post('nic');
        $adrs = $this->input->post('adrs');
        $mobile = $this->input->post('mobile');
        $home = $this->input->post('home');
        $custgrp = $this->input->post('custgrp_select');

        $cusArray = array(
            'custGrpCd' => $custgrp,
            'nm1' => $fname,
            'nm2' => $lname,
            'adrs' => $adrs,
            'phnM' => $mobile,
            'phnH' => $home,
            'phnS' => "",
            'nic' => $nic,
        );
        $this->InvoiceM->saveCustomer($cusArray);
        redirect(base_url() . 'InvoiceC/invoicing');
    }

    public function fetchCustomer()
    {
        $output = '';
        $query = '';
        $this->load->model('InvoiceM');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->InvoiceM->fetchCustomer($query);
        $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th></th>
       <th>Customer Name</th>
       <th>Address</th>
       <th>Mobile</th>
       <th>Home</th>
       <th>NIC</th>
       <th>Customer Group</th>
      </tr>
  ';
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
      <tr>
       <td><input type="radio" name="customer" value="'. $row->custId .'" /></td>
       <td>' . $row->nm1 . " " . $row->nm2 . '</td>
       <td>' . $row->adrs . '</td>
       <td>' . $row->phnM . '</td>
       <td>' . $row->phnH . '</td>
       <td>' . $row->nic . '</td>
       <td>' . $row->custGrpCd . '</td>
      </tr>
    ';
            }
        } else {
            $output .= '<tr>
       <td colspan="6">No Data Found</td>
      </tr>';
        }
        $output .= '</table>';
        echo $output;
    }
}
