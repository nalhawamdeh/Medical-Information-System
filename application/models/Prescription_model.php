<?php
    class Prescription_model extends CI_Model {
        public function __construct() {
            $this -> load -> database();
        }

        public function get_prescriptions($slug = FALSE) {
            if($slug === FALSE) {
                $query = $this -> db -> get('prescription');
                return $query -> result_array();
            }

            $query = $this -> db -> get_where('prescription', array('slug' => $slug));

            return $query -> row_array();
        }

        public function create() {
            #create slug before entering into database
            $slug = url_title($this -> input -> post('prescription_id'));

            #data coming from form
            $data = array(
                'slug' => $slug,
                'prescription_id' => $this->input->post('prescription_id'),
                'patient_email' => $this->input->post('patient_email'),
                'doctor_email' => $this->session -> userdata('email'),
                'prescription_date' => $this->input->post('date'),
                'medication' => $this->input->post('medication')
            );

            #insert into database
            return $this -> db -> insert('prescription', $data);
        }

        public function delete($prescription_id) {
            $this -> db -> where('prescription_id', $prescription_id);
            $this -> db -> delete('prescription');
            return true;
        }

        public function update() {
            #create slug before entering into database
            $slug = url_title($this -> input -> post('prescription_id'));

            #data coming from form
            $data = array(
                'slug' => $slug,
                'prescription_id' => $this->input->post('prescription_id'),
                'patient_email' => $this->input->post('patient_email'),
                'doctor_email' => $this->session -> userdata('email'),
                'prescription_date' => $this->input->post('date'),
                'medication' => $this->input->post('medication')
            );

            #update db
            $this -> db -> where('prescription_id', $slug);
            return $this -> db -> update('prescription', $data);
        }
    }