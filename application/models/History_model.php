<?php
    class History_model extends CI_Model {
        public function __construct() {
            $this -> load -> database();
        }

        public function get_histories($slug = FALSE) {
            if($slug === FALSE) {
                $query = $this -> db -> get('history');
                return $query -> result_array();
            }

            $query = $this -> db -> get_where('history', array('slug' => $slug));

            return $query -> row_array();
        }

        public function create() {
            #create slug before entering into database
            $slug = url_title($this->input->post('patient_email'));

            #data coming from form
            $data = array(
                'slug' => $slug,
                'birthday' => $this->input->post('date'),
                'patient_id' => $this->input->post('patient_id'),
                'patient_surname' => $this->input->post('patient_surname'),
                'patient_email' => $this->input->post('patient_email'),
                'doctor_email' => $this->session -> userdata('email'),
                'illness' => $this->input->post('illness'),
                'weight' => $this->input->post('weight'),
                'height' => $this->input->post('height')
            );

            #insert into database
            return $this -> db -> insert('history', $data);
        }

        public function delete($patient_id) {
            $this -> db -> where('patient_id', $patient_id);
            $this -> db -> delete('history');
            return true;
        }

        public function update() {
            #create slug before entering into database
            $slug = url_title($this->input->post('patient_email'));

            #data coming from form
            $data = array(
                'slug' => $slug,
                'birthday' => $this->input->post('date'),
                'patient_id' => $this->input->post('patient_id'),
                'patient_surname' => $this->input->post('patient_surname'),
                'patient_email' => $this->input->post('patient_email'),
                'doctor_email' => $this->session -> userdata('email'),
                'illness' => $this->input->post('illness'),
                'weight' => $this->input->post('weight'),
                'height' => $this->input->post('height')
            );

            $this -> db -> where('patient_id', $this -> input -> post('patient_id'));
            return $this -> db -> update('history', $data);
        }
    }