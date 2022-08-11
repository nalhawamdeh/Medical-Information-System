<?php
    class Appointment_model extends CI_Model {
        public function __construct() {
            $this -> load -> database();
        }

        public function get_appointments($slug = FALSE) {

            $this -> db -> order_by("date ASC, time ASC");

            if($slug === FALSE) {
                $query = $this -> db -> get('appointments');
                return $query -> result_array();
            }

            $query = $this -> db -> get_where('appointments', array('slug' => $slug));

            return $query -> row_array();
        }

        public function book() {
            #create slug before entering into database
            $slug = url_title($this->input->post('patient_id'));

            #data coming from form
            $data = array(
                'slug' => $slug,
                'date' => $this->input->post('date'),
                'time' => $this->input->post('time'),
                'patient_id' => $this->input->post('patient_id'),
                'patient_surname' => $this->input->post('patient_surname'),
                'patient_email' => $this->input->post('patient_email'),
                'doctor_id' => $this->input->post('doctor_id'),
                'doctor_surname' => $this->input->post('doctor_surname'),
                'doctor_email' => $this->input->post('doctor_email')
            );

            #insert into database
            return $this -> db -> insert('appointments', $data);
        }
    }