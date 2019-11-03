<?php

class MainC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MainM');
        $this->load->model('StoresM');
        $this->load->model('InvoiceM');
    }

    public function index() {
        //$this->login();
        $this->load->view("/login/login_view");
        //$this->test();
    }

    function test() {
        //$this->load->view("/test/login");
    }

    public function login() {
        //http://localhost/techneeds/mainC/login
        $data['title'] = 'Techneeds login page';
        $this->load->view("/login/login_view", $data);
    }

    public function login_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');
        if ($this->form_validation->run()) {
            //true
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            //model function
            $this->load->model('MainM');
            if ($this->MainM->can_login($username, $password)) {
                $session_data = array(
                    'username' => $username
                );
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'mainC/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid Username and Password');
                redirect(base_url() . 'mainC/login');
            }
        } else {
            //false
            $this->login();
        }
    }

    function dashboard() {
        if ($this->session->userdata('username') != '') {
            $this->load->view("/common/header_view");
            $this->load->view("/common/body_start_view");
            $this->load->view("/dashboard/dashboard_view");
            $this->load->view("/common/body_end_view");
            $this->load->view("/common/footer_view");
        }
    }

    function dashboard0() {
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/dashboard/dashboard_view");
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    

    function aboutUs() {
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/techneeds/aboutUs_view");
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    function logout() {
        $this->session->unset_userdata('username');
        redirect(base_url() . 'mainC/login');
    }

}
