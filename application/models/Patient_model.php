<?php
    class Patient_model extends CI_Model {
        public function register($password) {
            //Set array
            $data = array(
                'patient_id' => $this -> input -> post('patient_id'),
                'patient_forename' => $this -> input -> post('patient_forename'),
                'patient_surname' => $this -> input -> post('patient_surname'),
                'patient_email' => $this -> input -> post('patient_email'),
                'password' => $password
            );

            //create the new record
            return $this -> db -> insert('patient', $data);
        }

        public function check_email_exists($email) {
            $query = $this -> db -> get_where('patient', array('patient_email' => $email));

            if(empty($query->row_array())) {
                return true;
            } else {
                return false;
            }
        }

        public function login($email, $password) {
            $this -> db -> where('patient_email', $email);
            $this -> db -> where('password', $password);

            $result = $this -> db -> get('patient');

            //get patient id from db
            if($result -> num_rows() == 1){
                return $result -> row(0) -> patient_id;
            } else {
                return false;
            }
        }
    }