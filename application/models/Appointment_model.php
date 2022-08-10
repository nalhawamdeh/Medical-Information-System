<?php
    class Appointment_model extends CI_Model {
        public function __construct() {
            $this -> load -> database();
        }

        public function get_appointments($slug = FALSE) {
            if($slug === FALSE) {
                $query = $this -> db -> get('appointments');
                return $query -> result_array();
            }

            $query = $this -> db -> get_where('appointments', array('slug' => $slug));

            return $query -> row_array();
        }
    }