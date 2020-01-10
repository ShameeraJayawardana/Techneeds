<?php

class userProfileC extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        /*load database libray manually*/
        $this->load->database();
        $this->load->library('session');
        /*load Model*/
        $this->load->helper('url');
        $this->load->model('UserProfileM');
    }

    public function userProfile()
    {
        $data['row'] = $this->UserProfileM->getUserData();
        $this->load->view("/common/header_view");
        $this->load->view("/common/body_start_view");
        $this->load->view("/common/main_menu_view");
        $this->load->view("/userProfile/user_view", $data);
        $this->load->view("/common/body_end_view");
        $this->load->view("/common/footer_view");


    }

    public function uploadImage()
    {
        if (isset($_FILES["image_upload"]["name"])) {
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_upload')) {
                echo $this->upload->display_errors();
            } else {
                $data = $this->upload->data();
                $image = base_url() . "upload/" . $data["file_name"];
                $this->UserProfileM->updateImageData($image);
            }
        }
    }

    public function changePwd()
    {
        $old_pass = $this->input->post('current');
        $new_pass = $this->input->post('new');
        $confirm_pass = $this->input->post('confirm');
        $session_id = $this->session->userdata('emp_id');
//        $que = $this->db->query("select * from users where userId='$session_id'");
//        $row = $que->row();
        $this->load->model('UserProfileM');
        $objUser = $this->UserProfileM->getUser($session_id);
//        print_r($objUser->userPw);
        if ((!strcmp($old_pass, $objUser->userPw)) && (!strcmp($new_pass, $confirm_pass))) {
            $this->UserProfileM->change_pass($session_id, $new_pass);
            echo "Password changed successfully !";
        } else {
            echo "Invalid";
        }
    }

}
