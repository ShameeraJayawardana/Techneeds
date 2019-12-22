<?php

class ControlPanelC extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ControlPanelM');
    }

    public function controlPanel()
    {
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/controlPanel/controlPanel_menu");
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function activityControl()
    {

        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/controlPanel/controlPanel_menu");
        $this->load->view("/controlPanel/activityControl_view");
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function addUser()
    {
        $this->load->model('ControlPanelM');
        $data['records'] = $this->ControlPanelM->getRole();
//        $data['records2'] = $this->ControlPanelM->getUserData();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/controlPanel/controlPanel_menu");
        $this->load->view("/controlPanel/addUser_view", $data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function addUserDetails()
    {
        $emp = $this->input->post('emp');
//        $this->load->model('ControlPanelM');
//        $data = $this->ControlPanelM->getEmpData($role);
//        $array = json_decode(json_encode($data), True);
        $username = $this->input->post('username');
        $pwd = $this->input->post('pwd');
        $cpwd = $this->input->post('cpwd');
        if ($pwd != $cpwd) {
//            $error = "Password should be matached";
            $this->session->set_flashdata('error', 'Password should be matached');
            redirect(base_url() . 'ControlPanelC/addUser');
        } else {
            $userArray = array(
                'empId' => $emp,
                'userNm' => $username,
                'userPw' => $pwd
            );
            $this->ControlPanelM->saveUser($userArray);
            redirect(base_url() . 'ControlPanelC/addUser');
        }
    }

    public function addEmployee()
    {
        $this->load->model('ControlPanelM');
        $data['records'] = $this->ControlPanelM->getRole();
//        $data['records2'] = $this->ControlPanelM->getUserData();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/controlPanel/controlPanel_menu");
        $this->load->view("/controlPanel/addEmployee_view", $data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function addEmployeeDetails()
    {
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $nic = $this->input->post('nic');
        $mobile = $this->input->post('mobile');
        $home = $this->input->post('home');
        $add1 = $this->input->post('add1');
        $add2 = $this->input->post('add2');
        $add3 = $this->input->post('add3');
        $role = $this->input->post('role');
        $empArray = array(
            'nm1' => $fname,
            'nm2' => $lname,
            'nic' => $nic,
            'phnM' => $mobile,
            'phnH' => $home,
            'adrs1' => $add1,
            'adrs2' => $add2,
            'adrs3' => $add3,
            'profile_pic' => "",
            'roleId' => $role
        );
        $this->ControlPanelM->saveEmployee($empArray);
        redirect(base_url() . 'ControlPanelC/addEmployee');
    }

    public function fetchEmp()
    {
        if ($this->input->post('roleData')) {
            echo $this->ControlPanelM->fetchEmployee($this->input->post('roleData'));
        }
    }

    public function viewUser()
    {
        $this->load->model('ControlPanelM');
        $data['records'] = $this->ControlPanelM->getEmpData();
//        $data['records2'] = $this->ControlPanelM->getUserData();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/controlPanel/controlPanel_menu");
        $this->load->view("/controlPanel/userList_view", $data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");
    }

    public function deleteAll()
    {
        if ($this->input->post('checkbox_value')) {
            $id = $this->input->post('checkbox_value');
            for ($count = 0; $count < count($id); $count++) {
                $this->ControlPanelM->deleteAll($id[$count]);
            }
        }
    }
    
     public function fpdf (){
            $this->load->library('Myfpdf');
            $data['text']='dfgfdg';
            $this->load->view('fpdf',$data);
        }
}
