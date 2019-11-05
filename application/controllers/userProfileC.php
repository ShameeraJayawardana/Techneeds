<?php

class userProfileC extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
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

}
