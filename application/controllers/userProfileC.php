<?php

class userProfileC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->model('ControlPanelM');
    }

    public function userProfile() {
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/userProfile/user_view");
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

}
