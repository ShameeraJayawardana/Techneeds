<?php

class UserProfileM extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUserData() {
//        $username = $this->session->userdata('username');
        $empId = $this->session->userdata('emp_id');
        $this->db->select('*');
        $this->db->from('emp');
        $this->db->join('role', 'role.roleId = emp.roleId');
        $this->db->join('users', 'users.empId = emp.empId');
        $this->db->where('users.empId', $empId);
        return $this->db->get()->result();
    }

    public function updateImageData($image) {
        $empId = $this->session->userdata('emp_id');
        $sql = "UPDATE emp SET profile_pic='".$image."' WHERE empId = '".$empId."'";
        $this->db->query($sql);
    }
}
