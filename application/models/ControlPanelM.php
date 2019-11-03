<?php

class ControlPanelM extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUserData() {
        $query = $this->db->get('users'); //SELECT*FROM item table
        return $query->result();
    }

    public function getEmpData() {
        $this->db->select('empId, nm1, nm2, nic, phnM, phnH, adrs1, adrs2, adrs3, roleId');
        $this->db->from('emp');
        return $this->db->get()->result();
    }

    public function getRole() {
        $query = $this->db->get('role'); //SELECT*FROM item table
        return $query->result();
    }

    public function saveUser($userArray) {
        $this->db->insert("users", $userArray);
    }
    
    public function saveEmployee($empArray) {
        $this->db->insert("emp", $empArray);
    }

    public function fetchEmployee($roleData) {
        $this->db->where('roleId', $roleData);
        $this->db->order_by('nm1', 'ASC');
        $query = $this->db->get('emp');
        $output = '<option value="">Select Employee</option>';
        foreach ($query->result() as $row){
            $output .= '<option value="'.$row->empId.'">'.$row->nm1.'</option>';
        }
        return $output;
    }
}
