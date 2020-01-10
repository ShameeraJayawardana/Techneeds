<?php

class PurchasingOrderC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PurchaseOrderM');
        $this->load->model('StoresM');
    }

    public function new_order() {
        
        $data['grpRecords'] = $this->StoresM->getItmGrp();
        $getItmSubGrp = $this->StoresM->getItmSubGrp();
        $data['sizeRecords'] = $this->StoresM->getItmSize();
        $data['packRecords'] = $this->StoresM->getItmPack();
        $data['supplier'] = $this->PurchaseOrderM->getSupplierData();

        $cal_itmGrp = $this->input->post('itm_grp');
        $cal_itmSubGrp = $this->input->post('itmsub_grp');
        $cal_itmSize = $this->input->post('itm_size');
        $cal_itmCod = $cal_itmGrp + $cal_itmSubGrp + $cal_itmSize;
        
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/purchasingOrder/purchasing_menu_view");
        $this->load->view("/purchasingOrder/newOrder_view",$data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }
    
    public function savePo() {
        $itm_cod = $this->input->post('itm_cod');       
        $quantity = $this->input->post('quantity');
        $orderdate = $this->input->post('orderdate');
        $expectdate = $this->input->post('expectdate');
        $supID = $this->input->post('supplier');
        $user = $this->input->post('createby');
//        
        $poarray = array(
            'orderNo' => "orderNo",
            'itemCd' => $itm_cod,
            'quantity' => $quantity,
            'orderDate' => $orderdate,            
            'dateNeed' => $expectdate,            
            'action' => "",            
            'supplierId' => $supID,            
            'empId' => $user          
            
        );
        //save data to data base
        $this->PurchaseOrderM->savePO($poarray);
        redirect(base_url() . 'PurchasingOrderC/new_order');
    }
    public function new_order2() {
        
        
        $data['grpRecords'] = $this->PurchaseOrderM->getItmGrp();
        //$data['supGrpRecords']= $this->PurchaseOrderM->getItmSubGrp();
       // $data['sizeRecords'] = $this->PurchaseOrderM->getItmSize();
       // $data['packRecords'] = $this->PurchaseOrderM->getItmPack();

        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/purchasingOrder/purchasing_menu_view");
        $this->load->view("/purchasingOrder/newOrder2",$data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }
    
    public function fetchItem()
    {
        if ($this->input->post('itm_grp')) {
            echo $this->PurchaseOrderM->fetchItem($this->input->post('itm_grp'));
        }
    }

    public function viewOrder_list() {
        $data['podata'] = $this->PurchaseOrderM->getPOData();
       // $data['podata'] = $this->PurchaseOrderM->getPODataJoin();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/purchasingOrder/purchasing_menu_view");
        $this->load->view("/purchasingOrder/poList_view",$data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function purchse_order() {
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/purchasingOrder/purchasing_menu_view");
        $this->load->view("/purchasingOrder/purchasingOrder_view");
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function addSupplier() {

        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/purchasingOrder/purchasing_menu_view");
        $this->load->view("/purchasingOrder/addsupplier_view");
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function addSupplierDetails() {
        $supname = $this->input->post('Supname');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $tel1 = $this->input->post('tel1');
        $tel2 = $this->input->post('tel2');
        $type = $this->input->post('SupType');
        //$add2 = $this->input->post('add2');
        //$add3 = $this->input->post('add3');
        // $role = $this->input->post('role');
        $supplier = array(
            'companyName' => $supname,
            'mailAsdress' => $email,
            'Address' => $address,
            'phone1' => $tel1,
            'phone2' => $tel2,
            'supplierType' => $type,
                //'adrs2' => $add2,
                //'adrs3' => $add3,
                //'profile_pic' => "",
                //'roleId' => $role
        );
        //save data to data base
        $this->PurchaseOrderM->saveNewSupplier($supplier);
        redirect(base_url() . 'PurchasingOrderC/addSupplier');
    }

    public function viewSupplier() {

        $data['records'] = $this->PurchaseOrderM->getSupplierData();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/purchasingOrder/purchasing_menu_view");
        $this->load->view("/purchasingOrder/supplierList_view",$data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }
    
    public function deleteAll()
    {
        if ($this->input->post('checkbox_value')) {
            $id = $this->input->post('checkbox_value');
            for ($count = 0; $count < count($id); $count++) {
                $this->PurchaseOrderM->deleteAll($id[$count]);
            }
        }
    }
    

}
