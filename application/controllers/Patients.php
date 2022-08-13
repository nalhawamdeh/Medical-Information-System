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
                $this -> session -> set_flashdata('patient_registered','Patient registration successful.');
                redirect('home');
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
                $profile = "patient";
                
                //Login user
                $p_id = $this -> patient_model -> login($email, $password);

                if($p_id){
                    //create the session and alert message
                    $patient_data = array(
                        'p_id' => $p_id,
                        'email' => $email,
                        'logged_in' => true,
                        'profile' => $profile
                    );

                    $this -> session -> set_userdata($patient_data);
                    
                    $this -> session -> set_flashdata('patient_loggedin','Patient login successful.');
                    redirect('appointments');

                } else {
                    $this -> session -> set_flashdata('patient_notloggedin','Patient login failed.');
                    redirect('patients/login');
                }
                
            }

        }

        public function logout() {
            //unset data
            $this -> session -> unset_userdata('logged_in');
            $this -> session -> unset_userdata('p_id');
            $this -> session -> unset_userdata('email');
            $this -> session -> unset_userdata('profile');

            $this -> session -> set_flashdata('patient_loggedout','Patient logout successful.');
            redirect('home');
        }

        public function viewprofile() {
            $data['title'] = 'Your Profile';
            $email = $this -> session -> userdata('email');

            //$p = $this -> patient_model -> get_patient($email);
            $data['patient'] = $this -> patient_model -> get_patient($email);

            if(empty($data['patient'])){
                die('empty');
            } else {
                $this -> load -> view('templates/header');
                $this -> load -> view('patients/viewprofile', $data);
                $this -> load -> view('templates/footer'); 
            }
        }

        public function editprofile(){
            $data['title'] = 'Edit Your Profile';
            $email = $this -> session -> userdata('email');
            $data['patient'] = $this -> patient_model -> get_patient($email);

            if(empty($data['patient'])){
                die('empty edit');
            }

            $this -> load -> view('templates/header');
            $this -> load -> view('patients/editprofile', $data);
            $this -> load -> view('templates/footer'); 
        }

        public function update() {
            $this -> patient_model -> edit();
            
            
            //Message
            $this -> session -> set_flashdata('patient_updateprofile','You have successfully edited your patient profile.');

            redirect('patients/viewprofile');
        }

    }