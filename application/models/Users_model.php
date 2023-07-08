<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }

        function authenticate($email , $password){
            $query = $this->db->query("SELECT *  FROM `admin` where email='$email' AND password = '$password' ");
            if ($query->num_rows() > 0) {
                return $query->result();
            }
                return 0;

        }

        function fetch_all($table){
            $query = $this->db->query("SELECT * FROM $table ");
            return $query->result();

        }
        public function getResidents()
{
    $query = $this->db->get('resident');
    return $query->result();
}
        public function getResidentData($resident_id)
{
    $query = $this->db->get_where('resident', array('resident_id' => $resident_id));
    return $query->row();
}
        function fetch_info() {
            $query = $this->db->query("SELECT * FROM `users` ");
            return $query->result();

        }

        function fetch_webinfo() {
            $query = $this->db->query("SELECT * FROM `cath` ");
            return $query->result();

        }

        function insert_data($data) {
            $this->db->insert('users', $data);
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                $error = $this->db->error();
                error_log('Database Error: ' . $error['message']);
                return FALSE;
            }
        }
        
        function insert_webdata($data) {
            $this->db->insert('cath', $data);
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                $error = $this->db->error();
                error_log('Database Error: ' . $error['message']);
                return FALSE;
            }
        }

    
    
        public function get_list()
        {
            $search_query = $this->input->get('search_query');
            $this->db->select('*');
            $this->db->from('users');
            
            if (!empty($search_query)) {
                $this->db->like('field_name', $search_query);
                // Add other relevant search conditions
            }
            
            $query = $this->db->get();
            $list = $query->result();
            
            return $list;
        }
    
		                                               
        public function getSettings() {
            $query = $this->db->get_where('users', array('resident_id' => 1));
            return $query->row_array();
        }


}

?>
