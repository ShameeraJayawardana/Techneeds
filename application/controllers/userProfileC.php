<?php

class userProfileC extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
       // $this->load->model('ControlPanelM');
    }
     public function userProfile() {
        $this->load->view("/userProfile/user_view");
     }
}
