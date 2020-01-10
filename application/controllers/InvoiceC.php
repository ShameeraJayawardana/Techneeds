<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InvoiceC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('InvoiceM');
        $this->load->library('fpdf');
    }

    public function invoicing() {
        $this->load->model('InvoiceM');
//        $data['records'] = $this->InvoiceM->getInvoiceData();
//        $data['records2'] = $this->InvoiceM->getInvoiceData2();
        $data['records3'] = $this->InvoiceM->getCatogaryData();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/invoice/invoice_menu_view");
        $this->load->view("/invoice/invoicing_view", $data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function fetchItem() {
        if ($this->input->post('itm_grp')) {
            echo $this->InvoiceM->fetchItem($this->input->post('itm_grp'));
        }
    }

    public function add() {
        $this->load->library("cart");
        $data = array(
            "id" => $_POST["product_id"],
            "name" => $_POST["product_name"],
            "qty" => $_POST["quantity"],
            "price" => $_POST["product_price"]
        );
        $this->cart->insert($data); //return rowid
        echo $this->view();
    }

    public function load() {
        echo $this->view();
    }

    public function remove() {
        $this->load->library("cart");
        $row_id = $_POST["row_id"];
        $data = array(
            'rowid' => $row_id,
            'qty' => 0
        );
        $this->cart->update($data);
        echo $this->view();
    }

    public function clear() {
        $this->load->library("cart");
        $this->cart->destroy();
        echo $this->view();
    }

    public function view() {
        $this->load->library("cart");
        $output = '';
        $output .= '
  <h3>Shopping Cart</h3><br />
  <div class="table-responsive">
   <div align="right">
    <button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>
   </div>
   <br />
   <table class="table table-bordered">
    <tr>
     <th width="40%">Name</th>
     <th width="15%">Quantity</th>
     <th width="15%">Price</th>
     <th width="15%">Total</th>
     <th width="15%">Action</th>
    </tr>

  ';
        $count = 0;
        foreach ($this->cart->contents() as $items) {
            $count++;
            $output .= '
   <tr> 
    <td>' . $items["name"] . '</td>
    <td>' . $items["qty"] . '</td>
    <td>' . $items["price"] . '</td>
    <td>' . $items["subtotal"] . '</td>
    <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="' . $items["rowid"] . '">Remove</button></td>
   </tr>
   ';
        }
        $output .= '
   <tr>
    <td colspan="4" align="right">Total</td>
    <td>' . $this->cart->total() . '</td>
   </tr>
  </table>

  </div>
  ';

        if ($count == 0) {
            $output = '<h3 align="center">Cart is Empty</h3>';
        }
        return $output;
    }
    public function fetchItemDetails() {
        if ($this->input->post('itmsub_grp')) {
            echo $this->InvoiceM->fetchItemDetails($this->input->post('itmsub_grp'));
        }
    }

    {
$data['getcustomer'] = $this->InvoiceM->getCustomerData();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/stores/stores_menu_view");
        $this->load->view("/stores/form_additem_view");
        $this->load->view("/invoice/invoice_menu_view");
        $this->load->view("/invoice/customer_view", $data);
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

    public function addCustomer() {
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $nic = $this->input->post('nic');
        $adrs = $this->input->post('adrs');
        $mobile = $this->input->post('mobile');
        $home = $this->input->post('home');
        $shop = $this->input->post('shop');
        $custgrp = $this->input->post('custgrp_select');

        $cusArray = array(
            'custGrpCd' => $custgrp,
            'nm1' => $fname,
            'nm2' => $lname,
            'adrs' => $adrs,
            'phnM' => $mobile,
            'phnH' => $home,
            'phnS' => $shop,
            'nic' => $nic,
        );
        $this->InvoiceM->saveCustomer($cusArray);
        redirect(base_url() . 'InvoiceC/invoicing');
    }

    public function fetchCustomer() {
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
       <td>
       <form method="post" action="' . base_url() . 'invoiceC/searchCustomer" id="myform">
            <input type="radio" id="customer" name="customer" value="' . $row->custId . '" />
       </form>
       </td>
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

    public function searchCustomer() {
        $customer = $_POST["customer"];
        $newdata = array();
        $newdata = $this->InvoiceM->searchCustomer($customer);
        $this->session->set_userdata($newdata);
    }

    public function printReceipt() {
        $this->load->library("cart");
        $output = '';
        $output .= '
  <h3>Shopping Cart</h3><br />
  <div class="table-responsive">
   <div align="right">
    <button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>
   </div>
   <br />
   <table class="table table-bordered">
    <tr>
     <th width="40%">Name</th>
     <th width="15%">Quantity</th>
     <th width="15%">Price</th>
     <th width="15%">Total</th>
     <th width="15%">Action</th>
    </tr>

  ';
        $count = 0;
        foreach ($this->cart->contents() as $items) {
            $this->InvoiceM->printReceipt($items["id"], $items["qty"]);
            $count++;
            $output .= '
   <tr> 
    <td>' . $items["name"] . '</td>
    <td>' . $items["qty"] . '</td>
    <td>' . $items["price"] . '</td>
    <td>' . $items["subtotal"] . '</td>
    <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="' . $items["rowid"] . '">Remove</button></td>
   </tr>
   ';
        }

        $output .= '
   <tr>
    <td colspan="4" align="right">Total</td>
    <td>' . $this->cart->total() . '</td>
   </tr>
  </table>

  </div>
  ';
        $this->pdf->loadHtml($output);
        $this->pdf->render();
        $this->pdf->stream("new.pdf", array("Attachment" => 0));
    }

    public function pdfdetails() {
        $this->load->library("cart");
        $nm1 = $this->session->userdata('nm1');
        $output = '';
        $output .= '
  <div class="table-responsive">
   <br />
   <p>' . $nm1 . " " . $nm1 . '</p>
       
   <table class="table table-bordered">
   <tr>
   <td width=55%><img src="assets/images/logo_techneeds.jpg"/></td>      
     <td width=45%> Tel   :     0112733222 <br> Hotline  :    0719555500 <br>
     Email  :    info@recent.lk <br> 
     Website  :  www.techneeds.lk 
     </td></tr>
     <tr> <td width=25%></td><td width=75%>      
     94/1/1,Pepiliyana Road,Nedimala,Dehiwala,Sri Lanka.<br> 
     ___________________________________________________</td>
    </tr></table>
    
    <table>
    <tr><td > Customer Name:<br> 
    Customer Address:<br>
     Print By : </td>
     <td> Invioce No: <br>
     Invoice Date: <br>
     PO No:
     </td>
     </tr></table>
     
       
    <table class="table table-bordered">
    <tr>
     <th width="10%">Item Code</th>
     <th width="45%">Description</th>
     <th width="10%">Quantity</th>
     <th width="10%">Price</th>    
     <th width="10%">Discount</th>
     <th width="10%">Total</th>
    </tr>
    
    

  ';
        $count = 0;
        foreach ($this->cart->contents() as $items) {
            $count++;
            $output .= '
   <tr> 
    <td>' . $items["name"] . '</td>
    <td>' . $items["name"] . '</td>
    <td>' . $items["qty"] . '</td>
    <td>' . $items["price"] . '</td>
    <td>' . $items["subtotal"] . '</td>
   </tr>
   ';
        }

        $output .= '
   <tr>
    <td colspan="4" align="right">Total</td>
    <td>' . $this->cart->total() . '</td>
   </tr>
  </table>

  </div>
  ';
        $this->pdf->loadHtml($output);
        $this->pdf->render();
        $this->pdf->stream("" . $nm1 . ".pdf", array("Attachment" => 0));
    }

}
