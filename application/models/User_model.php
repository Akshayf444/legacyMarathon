<?php

class User_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->table_name = 'tbl_employee_master';
    }

    public function tmauthentication($username, $password) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where(array('TM_Emp_Id' => $username, 'TM_Emp_Id' => $username));
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->row_array();
    }

    public function bmauthentication($username, $password) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where(array('BM_Emp_Id' => $username, 'BM_Emp_Id' => $username));
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->row_array();
    }

    public function smauthentication($username, $password) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where(array('SM_Emp_Id' => $username, 'SM_Emp_Id' => $username));
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->row_array();
    }

    public function addDoctor($data) {
        $this->db->insert('doctor', $data);
//        return $this->db->insert_id;
    }

    public function addchemist($data) {
        $this->db->insert('chemist', $data);
//        return $this->db->insert_id;
    }

    public function SCAT($data) {
        $this->db->insert('SCAT', $data);
//        return $this->db->insert_id;
    }

    public function tour($data) {
        $this->db->insert('tour', $data);
//        return $this->db->insert_id;
    }

    public function del_youngdoc($id, $data) {
        $this->db->where('doctor_id', $id);
        $this->db->update('doctor', $data);
    }

    public function del_chemist($id, $data) {
        $this->db->where('chemist_id', $id);
        $this->db->update('chemist', $data);
    }

    public function del_scat($id, $data) {
        $this->db->where('Scat_id', $id);
        $this->db->update('SCAT', $data);
    }

    public function del_tour($id, $data) {
        $this->db->where('tour_id', $id);
        $this->db->update('tour', $data);
    }

    public function find_by_id($id) {
        $sql = "Select * from doctor where doctor_id ='$id'and status='1'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function find_by_chemistid($id) {
        $sql = "Select * from chemist where chemist_id ='$id'and status='1'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function find_by_scatid($id) {
        $sql = "Select * from SCAT where Scat_id ='$id' and status='1'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function find_by_tourid($id) {
        $sql = "Select * from tour  where tour_id ='$id' and status='1'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function getDoctor($conditions = array()) {
        $sql = "select * from doctor d INNER JOIN tbl_employee_master e ON e.TM_Emp_Id = d.tm_id ";

        if (!empty($conditions)) {
            $sql.=" WHERE " . join(" AND ", $conditions);
        }
        
      echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getChemist($tm_id) {
        $sql = "select * from chemist where tm_id ='$tm_id'and status='1'   ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getscat($conditions = array()) {
        $sql = "select * from SCAT d INNER JOIN tbl_employee_master e ON e.TM_Emp_Id = d.tm_id ";

        if (!empty($conditions)) {
            $sql.=" WHERE " . join(" AND ", $conditions);
        }
        
      echo $sql;
        $query = $this->db->query($sql);
    }

    public function gettour($conditions = array()) {
        $sql = "select * from tour d INNER JOIN tbl_employee_master e ON e.TM_Emp_Id = d.tm_id ";

        if (!empty($conditions)) {
            $sql.=" WHERE " . join(" AND ", $conditions);
        }
        
      echo $sql;
        $query = $this->db->query($sql);
    }

    public function getEmployee($conditions = array()) {
        $sql = " select *  FROM tbl_employee_master ";
        if (!empty($conditions)) {
            $sql.=" WHERE " . join(" AND ", $conditions);
        }
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getbm($conditions = array()) {
        $sql = " SELECT DISTINCT(BM_Emp_Id) AS BM_Emp_Id,`BM_Name` FROM tbl_employee_master ";
        if (!empty($conditions)) {
            $sql.=" WHERE " . join(" AND ", $conditions);
        }
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function view_all($conditions = array()) {
        $sql = "SELECT dm.*,em.*,dm.State as State,dm.Region as Region FROM  tbl_employee_master  em Left JOIN tbl_doctor dm    ON dm.TM_EmpID=em.TM_Emp_Id ";
        if (!empty($conditions)) {
            $sql.=" WHERE " . join(" AND ", $conditions);
        }
        $sql.= "  ";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
