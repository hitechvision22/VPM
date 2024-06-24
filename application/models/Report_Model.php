<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_reports($employee_id = null) {
        if ($employee_id) {
            $this->db->where('employee_id', $employee_id);
        }
        return $this->db->get('reports')->result();
    }

    public function get_all_reports() {
        return $this->db->get('reports')->result();
    }

    public function get_report($id) {
        return $this->db->get_where('reports', ['id' => $id])->row();
    }

    public function create_report($data) {
        return $this->db->insert('reports', $data);
    }

    public function search_reports($query) {
        $this->db->like('title', $query);
        $this->db->or_like('content', $query);
        return $this->db->get('reports')->result();
    }
}
?>
