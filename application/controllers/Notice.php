<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model'); 
        $this->load->model('notice_model');
        $this->load->model('settings_model');
        $this->load->model('leave_model');
    }
    
    public function index() {
        if ($this->session->userdata('user_login_access') == 1)
            redirect('dashboard/Dashboard');
        $data=array();
        $this->load->view('login');
    }

    public function All_notice() {
        if($this->session->userdata('user_login_access') != False) {
            $data['notice'] = $this->notice_model->GetNotice();
            $data['employees'] = $this->employee_model->GetAllEmployee();
            $this->load->view('backend/notice',$data);
        } else {
            redirect(base_url() , 'refresh');
        }        
    }

    public function Published_Notice() {
        if($this->session->userdata('user_login_access') != False) {    
            $title = $this->input->post('title');           
            $description = $this->input->post('description');
            $employee_id = $this->input->post('employee_id');
            
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();
            $this->form_validation->set_rules('title', 'title', 'trim|required|min_length[5]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('description', 'description', 'trim|required|xss_clean');
            $this->form_validation->set_rules('employee_id', 'employee', 'trim|required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                echo validation_errors();
            } else {
                $data = array(
                    'title' => $title,
                    'description' => $description,
                    'employee_id' => $employee_id
                );
                $success = $this->notice_model->Published_Notice($data); 
                if($success) {
                    $this->session->set_flashdata('feedback','Successfully Added');
                    //echo "Successfully Added";
                } else {
                    //echo "Failed to add notice";
                }
            }
        } else {
            redirect(base_url() , 'refresh');
        }        
    }
}
