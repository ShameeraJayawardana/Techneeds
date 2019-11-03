<?php

class MainM extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    

    public function veryfyUser($username, $password) {
        $this->db->where("username", $username);
        $this->db->where("password", $username);
        $query = $this->db->get('users'); //'SELECT*FROM users';
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $newdata = array(
                    'user_id' => $rows->userId,
                    'user_name' => $rows->userNm,
                    'logged_in' => true,
                );
            }
            $this->session->set_userdata($newdata);
            return TRUE;
        }
        return FALSE;
    }

    function can_login($username, $password) { 
        //'like binary' do casesensitive validation for userNm & userPw
        $this->db->where('userNm like binary', $username);
        $this->db->where('userPw like binary', $password);
        $query = $this->db->get('users');
        //SELECT * FROM users WHERE userNm = '$username' AND userPw = '$password'
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


}
