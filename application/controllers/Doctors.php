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
                redirect('home');
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

        public function login() {
            $data['title'] = 'Login';

            $this -> form_validation ->set_rules('doctor_email', 'Doctor Email', 'required');
            $this -> form_validation ->set_rules('password', 'Password', 'required');
           

            if($this -> form_validation -> run() === FALSE){
                $this -> load -> view('templates/header');
                $this -> load -> view('doctors/login', $data);
                $this -> load -> view('templates/footer');
            } else {        
                //Get email
                $email = $this -> input -> post('doctor_email');
                $password = md5($this-> input -> post('password'));
                $profile = "doctor";

                //Login user
                $d_id = $this -> doctor_model -> login($email, $password);

                if($d_id){
                    //create the session and alert message
                    $doctor_data = array(
                        'd_id' => $d_id,
                        'email' => $email,
                        'logged_in' => true,
                        'profile' => $profile
                    );

                    $this -> session -> set_userdata($doctor_data);
                    
                    $this -> session -> set_flashdata('doctor_loggedin','You have logged in successfully as a Doctor.');
                    redirect('home');

                } else {
                    $this -> session -> set_flashdata('doctor_notloggedin','Login failed.');
                    redirect('doctors/login');
                }
                
            }

        }

        public function logout() {
            //unset data
            $this -> session -> unset_userdata('logged_in');
            $this -> session -> unset_userdata('d_id');
            $this -> session -> unset_userdata('email');
            $this -> session -> unset_userdata('profile');

            $this -> session -> set_flashdata('doctor_loggedout','You have logged out successfully as a Doctor.');
            redirect('home');
        }
    }