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
        $this->db->select('*');
        $this->db->from('emp');
        $this->db->join('role', 'role.roleId = emp.roleId');
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
    
    public function deleteAll($id){
        $this->db->where('empId', $id);
        $this->db->delete('emp');
    }
}
