<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    public $alertLabel = 'Doctor';
    public $doctorIds = array();

    public function __construct() {
        parent::__construct();
        $this->load->helper();
        $this->load->model('User_model');
        $this->load->model('Master_Model');

        $this->load->library('form_validation');
    }

    public function index() {
        $data = array();
        $message = '';
        if ($this->input->post()) {
            if ($this->input->post('username') == $this->input->post('password')) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $tmexist = $this->User_model->tmauthentication($username, $password);
                if (!empty($tmexist)) {
                    $this->session->set_userdata('Emp_Id', $tmexist['TM_Emp_Id']);
                    $this->session->set_userdata('smswayid', $tmexist['smsWayID']);
                    $this->session->set_userdata('Full_Name', $tmexist['TM_Name']);
                    $this->session->set_userdata('TM_Emp_Id', $tmexist['TM_Emp_Id']);
                    $this->session->set_userdata('BM_Emp_Id', $tmexist['BM_Emp_Id']);
                    $this->session->set_userdata('SM_Emp_Id', $tmexist['SM_Emp_Id']);
                    $this->session->set_userdata('SSM_Emp_Id', $tmexist['SSM_Emp_Id']);
                    $this->session->set_userdata('Reporting_Id', $tmexist['BM_Emp_Id']);
                    $this->session->set_userdata('Designation', 'TM');
                    redirect('User/dashboard', 'refresh');
                } else {
                    $bmexist = $this->User_model->bmauthentication($username, $password);
                    if (!empty($bmexist)) {
                        $this->session->set_userdata('Emp_Id', $bmexist['BM_Emp_Id']);
                        $this->session->set_userdata('TM_Emp_Id', $bmexist['TM_Emp_Id']);
                        $this->session->set_userdata('BM_Emp_Id', $bmexist['BM_Emp_Id']);
                        $this->session->set_userdata('SM_Emp_Id', $bmexist['SM_Emp_Id']);
                        $this->session->set_userdata('SSM_Emp_Id', $bmexist['SSM_Emp_Id']);
                        $this->session->set_userdata('Reporting_Id', $bmexist['SM_Emp_Id']);
                        $this->session->set_userdata('Full_Name', $bmexist['BM_Name']);
                        $this->session->set_userdata('smswayid', $bmexist['smsWayID']);
                        $this->session->set_userdata('Designation', 'BM');
                        redirect('User/dashboard', 'refresh');
                    } else {
                        $smexist = $this->User_model->smauthentication($username, $password);
                        if (!empty($smexist)) {
                            $this->session->set_userdata('Emp_Id', $smexist['SM_Emp_Id']);
                            $this->session->set_userdata('TM_Emp_Id', $smexist['TM_Emp_Id']);
                            $this->session->set_userdata('BM_Emp_Id', $smexist['BM_Emp_Id']);
                            $this->session->set_userdata('SM_Emp_Id', $smexist['SM_Emp_Id']);
                            $this->session->set_userdata('SSM_Emp_Id', $smexist['SSM_Emp_Id']);
                            $this->session->set_userdata('Reporting_Id', $smexist['SSM_Emp_Id']);
                            $this->session->set_userdata('Full_Name', $smexist['SM_Name']);
                            $this->session->set_userdata('smswayid', $smexist['smsWayID']);
                            $this->session->set_userdata('Designation', 'SM');
                            redirect('User/dashboard', 'refresh');
                        } else {
                            $this->session->set_userdata('message', $this->Master_Model->DisplayAlert('Incorrect Username/Password', 'danger'));
                        }
                    }
                }
            } else {
                $this->session->set_userdata('message', $this->Master_Model->DisplayAlert('Incorrect Username/Password', 'danger'));
            }
        }
        $data = array('title' => 'Login', 'content' => 'User/login', 'view_data' => $data);
        $this->load->view('template1', $data);
    }

    public function dashboard() {

        $data = array('title' => 'Dashboard', 'content' => 'User/dashboard', 'view_data' => 'blank');
        $this->load->view('template3', $data);
    }

    public function addDoctor() {
        if ($this->is_logged_in('TM')) {
            if ($this->input->post()) {
                $data = array(
                    'Doctor_Name' => $this->input->post('Doctor_Name'),
                    'hq' => $this->input->post('hq'),
                    'spl' => $this->input->post('spl'),
                    'ASTHALIN_MDI' => $this->input->post('ASTHALIN_MDI'),
                    'ASTHALIN_DPI' => $this->input->post('ASTHALIN_DPI'),
                    'AEROCORT_FORTE_ROTACAPS' => $this->input->post('AEROCORT_FORTE_ROTACAPS'),
                    'AEROCORT_ROTACAPS' => $this->input->post('AEROCORT_ROTACAPS'),
                    'AEROCORT_MDI' => $this->input->post('AEROCORT_MDI'),
                    'Other' => $this->input->post('Other'),
                    'part_of_fun' => $this->input->post('part_of_fun'),
                    'Status' => 1,
                    'tm_id' => $this->Emp_Id,
                );
                $this->User_model->addDoctor($data);
                redirect('User/view_doctor', 'refresh');
            }
            $data = array('title' => 'Add  Doctor', 'content' => 'User/add_doctor', 'view_data' => 'blank', 'page_title' => 'Add Doctor');
            $this->load->view('template3', $data);
        } else {
            $this->logout();
        }
    }

    public function addchemist() {
        if ($this->is_logged_in('TM')) {

            if ($this->input->post()) {
                $lcm = implode(",", $this->input->post('Legendary_Chemist_Met'));
                $Mobile_no = implode(",", $this->input->post('Mobile_no'));
                $data = array(
                    'No_of_Chemist_Met' => $this->input->post('No_of_Chemist_Met'),
                    'Legendary_Chemist_Met' => $lcm,
                    'ASTHALIN_MDI' => $this->input->post('ASTHALIN_MDI'),
                    'ASTHALIN_DPI' => $this->input->post('ASTHALIN_DPI'),
                    'AEROCORT_FORTE_ROTACAPS' => $this->input->post('AEROCORT_FORTE_ROTACAPS'),
                    'AEROCORT_ROTACAPS' => $this->input->post('AEROCORT_ROTACAPS'),
                    'AEROCORT_MDI' => $this->input->post('AEROCORT_MDI'),
                    'Other' => $this->input->post('Other'),
                    'Mobile_no' => $Mobile_no,
                    'Status' => 1,
                    'tm_id' => $this->Emp_Id,
                );
                $this->User_model->addchemist($data);
                redirect('User/view_pgdoctor', 'refresh');
            }
            $data = array('title' => 'Add Chemist', 'content' => 'User/chemist', 'view_data' => 'blank', 'page_title' => 'Add Chemist');
            $this->load->view('template3', $data);
        } else {
            $this->logout();
        }
    }

    public function SCAT() {
        if ($this->is_logged_in('TM')) {
            if ($this->input->post()) {
                $data = array(
                    'No_of_SCAT' => $this->input->post('No_of_SCAT'),
                    'No_of_Attendee' => $this->input->post('No_of_Attendee'),
                    'ASTHALIN_MDI' => $this->input->post('ASTHALIN_MDI'),
                    'ASTHALIN_DPI' => $this->input->post('ASTHALIN_DPI'),
                    'AEROCORT_FORTE_ROTACAPS' => $this->input->post('AEROCORT_FORTE_ROTACAPS'),
                    'AEROCORT_ROTACAPS' => $this->input->post('AEROCORT_ROTACAPS'),
                    'AEROCORT_MDI' => $this->input->post('AEROCORT_MDI'),
                    'Other' => $this->input->post('Other'),
                    'Status' => 1,
                    'tm_id' => $this->Emp_Id,
                );
                $this->User_model->SCAT($data);
                redirect('User/view_pgdoctor', 'refresh');
            }
            $data = array('title' => 'Add SCAT', 'content' => 'User/scat', 'view_data' => 'blank', 'page_title' => 'Add SCAT');
            $this->load->view('template3', $data);
        } else {
            $this->logout();
        }
    }

    public function tour() {
        if ($this->is_logged_in('TM')) {
            if ($this->input->post()) {
                $data = array(
                    'Taxi_Tour' => $this->input->post('Taxi_Tour'),
                    'Location_taxi' => $this->input->post('Location_taxi'),
                    'chemist_taxi' => $this->input->post('chemist_taxi'),
                    'bike_tour' => $this->input->post('bike_tour'),
                    'chemist_bike' => $this->input->post('chemist_bike'),
                    'Location_bike' => $this->input->post('Location_bike'),
                    'ASTHALIN_MDI' => $this->input->post('ASTHALIN_MDI'),
                    'ASTHALIN_DPI' => $this->input->post('ASTHALIN_DPI'),
                    'AEROCORT_FORTE_ROTACAPS' => $this->input->post('AEROCORT_FORTE_ROTACAPS'),
                    'AEROCORT_ROTACAPS' => $this->input->post('AEROCORT_ROTACAPS'),
                    'AEROCORT_MDI' => $this->input->post('AEROCORT_MDI'),
                    'Other' => $this->input->post('Other'),
                    'Status' => 1,
                    'tm_id' => $this->Emp_Id,
                );
                $this->User_model->tour($data);
                redirect('User/view_pgdoctor', 'refresh');
            }
            $data = array('title' => 'Add Tour', 'content' => 'User/tour', 'view_data' => 'blank', 'page_title' => 'Add Tour');
            $this->load->view('template3', $data);
        } else {
            $this->logout();
        }
    }

    public function view_doctor() {
        $conditions = array();
        $data = array();
        if ($this->is_logged_in('TM') || $this->input->get('TM_Emp_Id')) {
            $conditions = array(
                'status = 1'
            );
            $tm_id = $this->is_logged_in('TM') ? $this->TM_Emp_Id : $this->input->get('TM_Emp_Id');
            array_push($conditions, 'd.tm_id = ' . $tm_id);
        }
        
        if ($this->is_logged_in('SM')) {
            $SM_Emp_Id = $this->Emp_Id;
            $bmlist = $this->User_model->getbm(array('SM_Emp_Id = ' . $SM_Emp_Id));
            $data['bmlist'] = '<select class="btn btn-default" name="BM_Emp_Id"><option value="0" >Select BM</option>' . $this->Master_Model->generateDropdown($bmlist, 'BM_Emp_Id', 'BM_Name') . '</select>';
            if ($this->input->get('Bm_Emp_Id') > 0) {
                $data['tmlist'] = '<select class="btn btn-default" name="TM_Emp_Id"><option value="0"  >Select TM</option>' . $this->Master_Model->generateDropdown($tmlist, 'TM_Emp_Id', 'TM_Name', $this->input->get('TM_Emp_Id')) . '</select>';
            }
            $data['show'] = $this->User_model->getDoctor(array(
                'status = 1', 'SM_Emp_Id = ' . $SM_Emp_Id
            ));
        }
        
        if ($this->is_logged_in('BM') || $this->input->get('BM_Emp_Id')) {
            $BM_Emp_Id = $this->is_logged_in('BM') ? $this->Emp_Id : $this->input->get('BM_Emp_Id');
            $tmlist = $this->User_model->getEmployee(array('BM_Emp_Id = ' . $BM_Emp_Id));
            $data['tmlist'] = '<select class="btn btn-default" name="TM_Emp_Id"><option value="0" >Select TM</option>' . $this->Master_Model->generateDropdown($tmlist, 'TM_Emp_Id', 'TM_Name') . '</select>';
            if ($this->input->get('TM_Emp_Id') > 0) {
                $data['tmlist'] = '<select class="btn btn-default" name="TM_Emp_Id"><option value="0"  >Select TM</option>' . $this->Master_Model->generateDropdown($tmlist, 'TM_Emp_Id', 'TM_Name', $this->input->get('TM_Emp_Id')) . '</select>';
            }
        }
        
        if (!empty($conditions)) {
            $data['show'] = $this->User_model->getDoctor($conditions);
        }

        $data = array('title' => 'Young Doctor List', 'content' => 'User/view_doctor', 'view_data' => $data, 'page_title' => ' Doctor List');
        $this->load->view('template3', $data);



//        
//        $tm_id = $this->TM_Emp_Id;
//            $data['show'] = $this->User_model->getDoctor($tm_id);
//                $data = array('title' => 'Doctor List', 'content' => 'User/view_doctor', 'view_data' => $data, 'page_title' => 'Doctor List');
//        $this->load->view('template3', $data);
    }

    public function view_chemist() {
        $tm_id = $this->TM_Emp_Id;
        $data['show'] = $this->User_model->getchemist($tm_id);
        $data = array('title' => 'Chemist List', 'content' => 'User/view_chemist', 'view_data' => $data, 'page_title' => 'Chemist List');
        $this->load->view('template3', $data);
    }

    public function view_scat() {
        $tm_id = $this->TM_Emp_Id;
        $data['show'] = $this->User_model->getscat($tm_id);
        $data = array('title' => 'SCAT List', 'content' => 'User/view_scat', 'view_data' => $data, 'page_title' => 'SCAT  List');
        $this->load->view('template3', $data);
    }

    public function view_tour() {
        $tm_id = $this->TM_Emp_Id;
        $data['show'] = $this->User_model->gettour($tm_id);
        $data = array('title' => 'Tour List', 'content' => 'User/view_tour', 'view_data' => $data, 'page_title' => 'Tour List');
        $this->load->view('template3', $data);
    }

    public function youngdoc_del() {
        $id = $_GET['id'];
        $data = array('status' => 0);
        $this->User_model->del_youngdoc($id, $data);
        redirect('User/view_doctor', 'refresh');
    }

    public function chemist_del() {
        $id = $_GET['id'];
        $data = array('status' => 0);
        $this->User_model->del_chemist($id, $data);
        redirect('User/view_chemist', 'refresh');
    }

    public function scat_del() {
        $id = $_GET['id'];
        $data = array('status' => 0);
        $this->User_model->del_scat($id, $data);
        redirect('User/view_scat', 'refresh');
    }

    public function tour_del() {
        $id = $_GET['id'];
        $data = array('status' => 0);
        $this->User_model->del_tour($id, $data);
        redirect('User/view_tour', 'refresh');
    }

    public function view_pgdoctor() {
        $data['Institution'] = null;
        $conditions = array();
        if ($this->is_logged_in('SM')) {
            $SM_Emp_Id = $this->Emp_Id;
            $tmlist = $this->User_model->getbm(array('SM_Emp_Id = ' . $SM_Emp_Id));
            $data['bmlist'] = '<select class="btn btn-default" name="BM_Emp_Id"><option value="0" >Select BM</option>' . $this->Master_Model->generateDropdown($tmlist, 'BM_Emp_Id', 'BM_Name') . '</select>';
            if ($this->input->get('TM_Emp_Id') > 0) {
                $data['bmlist'] = '<select class="btn btn-default" name="BM_Emp_Id"><option value="0"  >Select BM</option>' . $this->Master_Model->generateDropdown($tmlist, 'BM_Emp_Id', 'BM_Name', $this->input->get('BM_Emp_Id')) . '</select>';
            }
            $data['show'] = $this->User_model->view_all(array(
                'DrStatus = 2', 'delstatus = 1', 'SM_Emp_Id = ' . $SM_Emp_Id
            ));
        }
        if ($this->is_logged_in('BM') || $this->input->get('BM_Emp_Id')) {
            $BM_Emp_Id = $this->is_logged_in('BM') ? $this->Emp_Id : $this->input->get('BM_Emp_Id');
            $tmlist = $this->User_model->getEmployee(array('BM_Emp_Id = ' . $BM_Emp_Id));
            $data['tmlist'] = '<select class="btn btn-default" name="TM_Emp_Id"><option value="0"  >Select TM</option>' . $this->Master_Model->generateDropdown($tmlist, 'TM_Emp_Id', 'TM_Name') . '</select>';
            if ($this->input->get('TM_Emp_Id') > 0) {
                $data['tmlist'] = '<select class="btn btn-default" name="TM_Emp_Id"><option value="0"  >Select TM</option>' . $this->Master_Model->generateDropdown($tmlist, 'TM_Emp_Id', 'TM_Name', $this->input->get('TM_Emp_Id')) . '</select>';
            }
        }
        if ($this->is_logged_in('TM') || $this->input->get('TM_Emp_Id') != '') {
            $conditions = array(
                'DrStatus = 2', 'delstatus = 1'
            );
            $tm_id = $this->is_logged_in('TM') ? $this->TM_Emp_Id : $this->input->get('TM_Emp_Id');
            $result = $this->User_model->find_Institution($tm_id);
            $data['Institution'] = $this->Master_Model->generateDropdown($result, 'Institution', 'Institution');
            if ($this->input->get('id') != '') {
                $data['Institution'] = $this->Master_Model->generateDropdown($result, 'Institution', 'Institution', $this->input->get('id'));
            }
            array_push($conditions, 'TM_EmpID = ' . $tm_id);
        }
        if ($this->input->get('id') != '') {
            $institute = $this->input->get('id');
            array_push($conditions, "Institution = '$institute' ");
        }
        if (!empty($conditions)) {
            $data['show'] = $this->User_model->getDoctor($conditions);
        }
        $data = array('title' => 'PG Doctor List', 'content' => 'User/view_pgdoctor', 'view_data' => $data, 'page_title' => 'PG Doctor List');
        $this->load->view('template3', $data);
    }

    public function update_doc() {
        $id = $_GET['id'];
        $data['row'] = $this->User_model->find_by_id($id);
        if ($this->input->post()) {
            $data = array(
                'Doctor_Name' => $this->input->post('Doctor_Name'),
                'hq' => $this->input->post('hq'),
                'spl' => $this->input->post('spl'),
                'ASTHALIN_MDI' => $this->input->post('ASTHALIN_MDI'),
                'ASTHALIN_DPI' => $this->input->post('ASTHALIN_DPI'),
                'AEROCORT_FORTE_ROTACAPS' => $this->input->post('AEROCORT_FORTE_ROTACAPS'),
                'AEROCORT_ROTACAPS' => $this->input->post('AEROCORT_ROTACAPS'),
                'AEROCORT_MDI' => $this->input->post('AEROCORT_MDI'),
                'Other' => $this->input->post('Other'),
                'part_of_fun' => $this->input->post('part_of_fun'),
                'Status' => 1,
                'tm_id' => $this->Emp_Id,
            );
            $this->User_model->del_youngdoc($this->input->post('DoctorId'), $data);
            redirect('User/view_doctor', 'refresh');
        }

        $data = array('title' => 'Upadte Doctor', 'content' => 'User/edit_doc', 'page_title' => 'Update Doctor', 'view_data' => $data);
        $this->load->view('template3', $data);
    }

    public function update_chemist() {
        $id = $_GET['id'];
        $data['row'] = $this->User_model->find_by_chemistid($id);
        if ($this->input->post()) {
            $data = array(
                'No_of_Chemist_Met' => $this->input->post('No_of_Chemist_Met'),
                'Legendary_Chemist_Met' => $lcm,
                'ASTHALIN_MDI' => $this->input->post('ASTHALIN_MDI'),
                'ASTHALIN_DPI' => $this->input->post('ASTHALIN_DPI'),
                'AEROCORT_FORTE_ROTACAPS' => $this->input->post('AEROCORT_FORTE_ROTACAPS'),
                'AEROCORT_ROTACAPS' => $this->input->post('AEROCORT_ROTACAPS'),
                'AEROCORT_MDI' => $this->input->post('AEROCORT_MDI'),
                'Other' => $this->input->post('Other'),
                'Mobile_no' => $Mobile_no,
                'Status' => 1,
                'tm_id' => $this->Emp_Id,
            );

            $this->User_model->del_chemist($this->input->post('chemist_id'), $data);
            redirect('User/view_chemist', 'refresh');
        }

        $data = array('title' => 'Upadte Chemist', 'content' => 'User/edit_chemist', 'page_title' => 'Update Chemist', 'view_data' => $data);
        $this->load->view('template3', $data);
    }

    public function update_scat() {
        $id = $_GET['id'];
        $data['row'] = $this->User_model->find_by_scatid($id);
        if ($this->input->post()) {
            $data = array(
                'No_of_SCAT' => $this->input->post('No_of_SCAT'),
                'No_of_Attendee' => $this->input->post('No_of_Attendee'),
                'ASTHALIN_MDI' => $this->input->post('ASTHALIN_MDI'),
                'ASTHALIN_DPI' => $this->input->post('ASTHALIN_DPI'),
                'AEROCORT_FORTE_ROTACAPS' => $this->input->post('AEROCORT_FORTE_ROTACAPS'),
                'AEROCORT_ROTACAPS' => $this->input->post('AEROCORT_ROTACAPS'),
                'AEROCORT_MDI' => $this->input->post('AEROCORT_MDI'),
                'Other' => $this->input->post('Other'),
                'Status' => 1,
                'tm_id' => $this->Emp_Id,
            );

            $this->User_model->del_scat($this->input->post('Scat_id'), $data);
            redirect('User/view_scat', 'refresh');
        }

        $data = array('title' => 'Upadte SCAT', 'content' => 'User/edit_scat', 'page_title' => 'Update SCAT', 'view_data' => $data);
        $this->load->view('template3', $data);
    }

    public function update_tour() {
        $id = $_GET['id'];
        $data['row'] = $this->User_model->find_by_tourid($id);
        if ($this->input->post()) {
            $data = array(
                'Taxi_Tour' => $this->input->post('Taxi_Tour'),
                'Location_taxi' => $this->input->post('Location_taxi'),
                'chemist_taxi' => $this->input->post('chemist_taxi'),
                'bike_tour' => $this->input->post('bike_tour'),
                'chemist_bike' => $this->input->post('chemist_bike'),
                'Location_bike' => $this->input->post('Location_bike'),
                'ASTHALIN_MDI' => $this->input->post('ASTHALIN_MDI'),
                'ASTHALIN_DPI' => $this->input->post('ASTHALIN_DPI'),
                'AEROCORT_FORTE_ROTACAPS' => $this->input->post('AEROCORT_FORTE_ROTACAPS'),
                'AEROCORT_ROTACAPS' => $this->input->post('AEROCORT_ROTACAPS'),
                'AEROCORT_MDI' => $this->input->post('AEROCORT_MDI'),
                'Other' => $this->input->post('Other'),
                'Status' => 1,
                'tm_id' => $this->Emp_Id,
            );

            $this->User_model->del_tour($this->input->post('tour_id'), $data);
            redirect('User/view_tour', 'refresh');
        }

        $data = array('title' => 'Upadte Tour', 'content' => 'User/edit_tour', 'page_title' => 'Update Tour', 'view_data' => $data);
        $this->load->view('template3', $data);
    }

}
