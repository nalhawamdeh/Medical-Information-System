<?php
    class Doctors extends CI_Controller {
        public function register() {
            $data['title'] = 'Register as a Doctor';

            $this -> form_validation ->set_rules('doctor_id', 'Doctor ID', 'required');
            $this -> form_validation ->set_rules('doctor_forename', 'Doctor Forename', 'required');
            $this -> form_validation ->set_rules('doctor_surname', 'Doctor Surname', 'required');
            $this -> form_validation ->set_rules('doctor_email', 'Doctor Email', 'required|callback_check_email_exists');
            $this -> form_validation ->set_rules('med_speciality', 'Speciality', 'required');
            $this -> form_validation ->set_rules('org_id', 'Organization ID', 'required');
            $this -> form_validation ->set_rules('password', 'Password', 'required');
            $this -> form_validation ->set_rules('password2', 'Confirm Password', 'matches[password]');

            if($this -> form_validation -> run() === FALSE){
                $this -> load -> view('templates/header');
                $this -> load -> view('doctors/register', $data);
                $this -> load -> view('templates/footer');
            } else {
                //Encryption
                $enc = md5($this -> input -> post('password'));
                $this -> doctor_model -> register($enc);
                
                //Message
                $this -> session -> set_flashdata('doctor_registered','You have successfully registered as a Doctor.');
                redirect('appointments');
            }

        }

        public function check_email_exists($email) {
            $this -> form_validation -> set_message('check_email_exists', 'That email is already in use');

            if($this -> doctor_model -> check_email_exists($email)){
                return true;
            } else {
                return false;
            }
        }
    }