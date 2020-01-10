<?php


class repaireC extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('repairM');
    }

    public function addRepairItem()
    {
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/repairCentre/repair_main_view");
        $this->load->view("/repairCentre/repairCentreItems_view");
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }
    
    public function addRepairItemDetails() {
        $itemcode = $this->input->post('itm_cod');
        $itemid = $this->input->post('itm_id');
        $re_date = $this->input->post('ret_date');
        $reason = $this->input->post('reason');
                
        $addrepairitem = array(
            'itemCd' => $itemcode,
            'itemId' => $itemid,
            'rtnDt' => $re_date,
                      
        );

        //save data to data base
        $this->repairM->saveNewrepairItem($addrepairitem);
        redirect(base_url() . 'repaireC/addRepairItem');
    }
        
    public function viewRepairItem()
    {
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/repairCentre/repair_main_view");
        $this->load->view("/repairCentre/repairList_view");
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }
    
    public function deleteAll()
    {
        if ($this->input->post('checkbox_value')) {
            $id = $this->input->post('checkbox_value');
            for ($count = 0; $count < count($id); $count++) {
                $this->repairM->deleteAll($id[$count]);
            }
        }
    }
   
}
