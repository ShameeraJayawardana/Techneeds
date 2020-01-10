<?php

class UserProfileM extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUserData()
    {
//        $username = $this->session->userdata('username');
        $empId = $this->session->userdata('emp_id');
        $this->db->select('*');
        $this->db->from('emp');
        $this->db->join('role', 'role.roleId = emp.roleId');
        $this->db->join('users', 'users.empId = emp.empId');
        $this->db->where('users.empId', $empId);
        return $this->db->get()->result();
    }

    public function updateImageData($image)
    {
        $empId = $this->session->userdata('emp_id');
        $sql = "UPDATE emp SET profile_pic='" . $image . "' WHERE empId = '" . $empId . "'";
        $this->db->query($sql);
    }

    public function getUser($userid)
    {
        $query = $this->db->query("select * from users where userId='" . $userid . "'");
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        throw new Exception("no user data found");
    }

    public function change_pass($session_id, $new_pass)
    {
        $update_pass = $this->db->query("UPDATE users set userPw='$new_pass'  where userId='$session_id'");
    }
}
