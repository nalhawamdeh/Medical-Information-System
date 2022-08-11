<?php
    class Patients extends CI_Controller {
        public function register() {
            $data['title'] = 'Register as a Patient';

            $this -> form_validation ->set_rules('patient_id', 'Patient ID', 'required');
            $this -> form_validation ->set_rules('patient_forename', 'Patient Forename', 'required');
            $this -> form_validation ->set_rules('patient_surname', 'Patient Surname', 'required');
            $this -> form_validation ->set_rules('patient_email', 'Patient Email', 'required|callback_check_email_exists');
            $this -> form_validation ->set_rules('password', 'Password', 'required');
            $this -> form_validation ->set_rules('password2', 'Confirm Password', 'matches[password]');

            if($this -> form_validation -> run() === FALSE){
                $this -> load -> view('templates/header');
                $this -> load -> view('patients/register', $data);
                $this -> load -> view('templates/footer');
            } else {
                //Encryption
                $enc = md5($this -> input -> post('password'));
                $this -> patient_model -> register($enc);
                
                //Message
                $this -> session -> set_flashdata('patient_registered','You have successfully registered as a Patient.');
                redirect('appointments');
            }

        }

        public function check_email_exists($email) {
            $this -> form_validation -> set_message('check_email_exists', 'That email is already in use');

            if($this -> patient_model -> check_email_exists($email)){
                return true;
            } else {
                return false;
            }
        }
    }