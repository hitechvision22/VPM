<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ReportModel');
        $this->load->model('EmployeeModel');
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index() {
        if ($this->session->userdata('user_role') == 'admin') {
            $data['reports'] = $this->ReportModel->get_all_reports();
        } else {
            $data['reports'] = $this->ReportModel->get_reports($this->session->userdata('employee_id'));
        }
        $this->load->view('backend/reports', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $data = [
                'employee_id' => $this->session->userdata('employee_id'),
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'created_at' => date('Y-m-d H:i:s')
            ];
            $this->ReportModel->create_report($data);
            redirect('reports');
        } else {
            $this->load->view('backend/create_report');
        }
    }

    public function view($id) {
        $data['report'] = $this->ReportModel->get_report($id);
        $this->load->view('backend/view_report', $data);
    }

    public function search() {
        $query = $this->input->post('query');
        $data['reports'] = $this->ReportModel->search_reports($query);
        $this->load->view('backend/reports', $data);
    }
}
?>
