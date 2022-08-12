<?php
    class Doctor_model extends CI_Model {
        public function register($password) {
            //Set array
            $data = array(
                'doctor_id' => $this -> input -> post('doctor_id'),
                'doctor_forename' => $this -> input -> post('doctor_forename'),
                'doctor_surname' => $this -> input -> post('doctor_surname'),
                'doctor_email' => $this -> input -> post('doctor_email'),
                'org_id' => $this -> input -> post('org_id'),
                'med_speciality' => $this -> input -> post('med_speciality'),
                'password' => $password
            );

            //create the new record
            return $this -> db -> insert('doctor', $data);
        }

        public function check_email_exists($email) {
            $query = $this -> db -> get_where('doctor', array('doctor_email' => $email));

            if(empty($query->row_array())) {
                return true;
            } else {
                return false;
            }
        }

        public function login($email, $password) {
            $this -> db -> where('doctor_email', $email);
            $this -> db -> where('password', $password);

            $result = $this -> db -> get('doctor');

            //get doctor id from db
            if($result -> num_rows() == 1){
                return $result -> row(0) -> doctor_id;
            } else {
                return false;
            }
        }
    }