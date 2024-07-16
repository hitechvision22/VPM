<?php

class Notice_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function GetNotice() {
        $sql = "SELECT n.id, n.title, n.description, n.date, e.first_name, e.last_name 
                FROM notice n 
                JOIN employee e ON n.employee_id = e.id 
                ORDER BY n.date DESC;";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function Published_Notice($data) {
        $this->db->insert('notice', $data);
    }

    public function GetNoticelimit() {
        $sql = "SELECT n.id, n.title, n.description, n.date, e.first_name, e.last_name 
                FROM notice n 
                JOIN employee e ON n.employee_id = e.id 
                ORDER BY n.date DESC 
                LIMIT 1000000;";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
	// Récupère une notice spécifique par son ID
    public function GetNoticeById($id) {
		$sql = "SELECT n.*, e.id as employee_id, e.first_name, e.last_name 
				FROM notice n 
				JOIN employee e ON n.employee_id = e.id 
				WHERE n.id = ?";
		$query = $this->db->query($sql, array($id));
		return $query->row();
	}
	
	public function UpdateNotice($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update('notice', $data);
	}
	
	public function DeleteNotice($id) {
		$sql = "DELETE FROM notice WHERE id = ?";
		return $this->db->query($sql, array($id));
	}
	
	public function CountNotices() {
		$sql = "SELECT COUNT(*) as count FROM notice";
		$query = $this->db->query($sql);
		$result = $query->row();
		return $result->count;
	}
	
	public function GetNoticeByEmployee($employee_id) {
		$sql = "SELECT n.*, e.id as employee_id, e.first_name, e.last_name 
				FROM notice n 
				JOIN employee e ON n.employee_id = e.id 
				WHERE n.employee_id = ? 
				ORDER BY n.date DESC";
		$query = $this->db->query($sql, array($employee_id));
		return $query->result();
	}
	
	public function SearchNotices($search_term) {
		$sql = "SELECT n.*, e.id as employee_id, e.first_name, e.last_name 
				FROM notice n 
				JOIN employee e ON n.employee_id = e.id 
				WHERE n.title LIKE ? OR n.description LIKE ? 
				ORDER BY n.date DESC";
		$query = $this->db->query($sql, array("%$search_term%", "%$search_term%"));
		return $query->result();
	}
	
	public function GetNoticeByDateRange($start_date, $end_date) {
		$sql = "SELECT n.*, e.id as employee_id, e.first_name, e.last_name 
				FROM notice n 
				JOIN employee e ON n.employee_id = e.id 
				WHERE n.date BETWEEN ? AND ? 
				ORDER BY n.date DESC";
		$query = $this->db->query($sql, array($start_date, $end_date));
		return $query->result();
	}
}
?>
