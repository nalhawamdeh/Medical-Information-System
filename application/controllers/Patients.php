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


        public function login() {
            $data['title'] = 'Login';

            $this -> form_validation ->set_rules('patient_email', 'Patient Email', 'required');
            $this -> form_validation ->set_rules('password', 'Password', 'required');
           

            if($this -> form_validation -> run() === FALSE){
                $this -> load -> view('templates/header');
                $this -> load -> view('patients/login', $data);
                $this -> load -> view('templates/footer');
            } else {        
                //Get email
                $email = $this -> input -> post('patient_email');
                $password = md5($this-> input -> post('password'));
                
                //Login user
                $p_id = $this -> patient_model -> login($email, $password);

                if($p_id){
                    //create the session and alert message
                    $patient_data = array(
                        'p_id' => $p_id,
                        'email' => $email,
                        'logged_in' => true
                    );

                    $this -> session -> set_userdata($patient_data);
                    
                    $this -> session -> set_flashdata('patient_loggedin','You have logged in successfully.');
                    redirect('appointments');

                } else {
                    $this -> session -> set_flashdata('patient_notloggedin','Login failed.');
                    redirect('patients/login');
                }
                
            }

        }

        public function logout() {
            //unset data
            $this -> session -> unset_userdata('logged_in');
            $this -> session -> unset_userdata('p_id');
            $this -> session -> unset_userdata('email');

            $this -> session -> set_flashdata('patient_loggedout','You have logged out successfully.');
            redirect('patients/login');
        }

    }