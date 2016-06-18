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

    public function adminauthentication($username, $password) {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where(array('admin_id' => $username, 'admin_id' => $username));
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
    }

    public function addchemist_data($data) {
        $this->db->insert('chemist_data', $data);

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

    public function del_chemistdata($id, $data) {
        $this->db->where('chemist_id', $id);
        $this->db->update('chemist_data', $data);
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

        $sql = "Select *,c.chemist_id as id ,cd.chemist_id as data_id from chemist c left join  chemist_data cd on c.chemist_id=cd.chemist_id where c.chemist_id ='$id'and c.status='1'";

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
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function countDoctor($conditions = array()) {
        $sql = "select count(d.doctor_id)  AS doctor  from doctor d INNER JOIN tbl_employee_master e ON e.TM_Emp_Id = d.tm_id ";
        if (!empty($conditions)) {
            $sql.=" WHERE " . join(" AND ", $conditions);
        }
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function getchemist($conditions = array()) {
        $sql = "select * from chemist d INNER JOIN tbl_employee_master e ON e.TM_Emp_Id = d.tm_id left JOIN chemist_data cd on d.chemist_id= cd.chemist_id ";

        if (!empty($conditions)) {
            $sql.=" WHERE " . join(" AND ", $conditions);
        }

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function countchemist($conditions = array()) {
        $sql = "select COUNT(d.chemist_id) AS CHEMIST  from chemist d INNER JOIN tbl_employee_master e ON e.TM_Emp_Id = d.tm_id left JOIN chemist_data cd on d.chemist_id= cd.chemist_id ";

        if (!empty($conditions)) {
            $sql.=" WHERE " . join(" AND ", $conditions);
        }

        $query = $this->db->query($sql);
        return $query->row();
    }

    public function getscat($conditions = array()) {
        $sql = "select * from SCAT d INNER JOIN tbl_employee_master e ON e.TM_Emp_Id = d.tm_id ";
        if (!empty($conditions)) {
            $sql.=" WHERE " . join(" AND ", $conditions);
        }
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function countscat($conditions = array()) {
        $sql = "select SUM(d.NO_of_SCAT) as Scat from SCAT d INNER JOIN tbl_employee_master e ON e.TM_Emp_Id = d.tm_id ";
        if (!empty($conditions)) {
            $sql.=" WHERE " . join(" AND ", $conditions);
        }
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function gettour($conditions = array()) {
        $sql = "select * from tour d INNER JOIN tbl_employee_master e ON e.TM_Emp_Id = d.tm_id ";

        if (!empty($conditions)) {
            $sql.=" WHERE " . join(" AND ", $conditions);
        }

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function counttour($conditions = array()) {
        $sql = "select SUM(d.Taxi_Tour) AS taxi,sum(d.bike_tour) as bike  from tour d INNER JOIN tbl_employee_master e ON e.TM_Emp_Id = d.tm_id ";

        if (!empty($conditions)) {
            $sql.=" WHERE " . join(" AND ", $conditions);
        }

        $query = $this->db->query($sql);
        return $query->row();
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

    public function dashboardStatus($ID) {
        $sql = "SELECT count(doctor_id)  AS doctor "
                . " FROM  tbl_employee_master em INNER JOIN doctor dm  ON dm.tm_id = em.TM_Emp_Id where dm.tm_id='$ID' AND dm.Status='1' ";

        $query = $this->db->query($sql);
        return $query->row();
    }

    public function dashboardStatus1($ID) {
        $sql = "SELECT count(chemist_id) AS CHEMIST "
                . " FROM  tbl_employee_master em INNER JOIN chemist dm  ON dm.tm_id = em.TM_Emp_Id where dm.tm_id='$ID' AND dm.Status='1' ";

        $query = $this->db->query($sql);
        return $query->row();
    }

    public function dashboardStatus2($ID) {
        $sql = "SELECT SUM(NO_of_SCAT) AS Scat "
                . " FROM tbl_employee_master em INNER JOIN SCAT dm  ON dm.tm_id = em.TM_Emp_Id where dm.tm_id='$ID' AND dm.Status='1' ";

        $query = $this->db->query($sql);
        return $query->row();
    }

    public function dashboardStatus3($ID) {
        $sql = "SELECT SUM(dm.Taxi_Tour) AS taxi,sum(dm.bike_tour) as bike "
                . " FROM  tbl_employee_master em INNER JOIN tour dm ON dm.tm_id = em.TM_Emp_Id where tm_id='$ID' and dm.Status =1  ";

        $query = $this->db->query($sql);
        return $query->row();
    }

}
