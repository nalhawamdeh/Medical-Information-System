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
                $this -> session -> set_flashdata('doctor_registered','Doctor registration successful.');
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
                    
                    $this -> session -> set_flashdata('doctor_loggedin','Doctor login successful.');
                    redirect('home');

                } else {
                    $this -> session -> set_flashdata('doctor_notloggedin','Doctor login failed.');
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

            $this -> session -> set_flashdata('doctor_loggedout','Doctor logout successful.');
            redirect('home');
        }

        public function viewprofile() {
            $data['title'] = 'Your Profile';
            $email = $this -> session -> userdata('email');

            //$p = $this -> patient_model -> get_patient($email);
            $data['doctor'] = $this -> doctor_model -> get_doctor($email);

            if(empty($data['doctor'])){
                die('empty');
            } else {
                $this -> load -> view('templates/header');
                $this -> load -> view('doctors/viewprofile', $data);
                $this -> load -> view('templates/footer'); 
            }
        }

        public function editprofile(){
            $data['title'] = 'Edit Your Profile';
            $email = $this -> session -> userdata('email');
            $data['doctor'] = $this -> doctor_model -> get_doctor($email);

            if(empty($data['doctor'])){
                die('empty edit');
            }

            $this -> load -> view('templates/header');
            $this -> load -> view('doctors/editprofile', $data);
            $this -> load -> view('templates/footer'); 
        }

        public function update() {
            $this -> doctor_model -> edit();
            
            
            //Message
            $this -> session -> set_flashdata('doctor_updateprofile','You have successfully edited your doctor profile.');

            redirect('doctors/viewprofile');
        }

        public function vieworg() {
            $data['title'] = 'Your Organization';
            $email = $this -> session -> userdata('email');

            
            $data['doctor'] = $this -> doctor_model -> get_doctor($email);
            $org = $data['doctor']['org_id'];
        
            $data['org'] = $this -> doctor_model -> get_org($org);

            if(empty($data['org'])){
                die('empty');
            } else {
                $this -> load -> view('templates/header');
                $this -> load -> view('doctors/vieworg', $data);
                $this -> load -> view('templates/footer'); 
            }
        }

        public function editorg(){
            $data['title'] = 'Edit Your Organization Details';
            $email = $this -> session -> userdata('email');
            $data['doctor'] = $this -> doctor_model -> get_doctor($email);
            $org = $data['doctor']['org_id'];
            $data['org'] = $this -> doctor_model -> get_org($org);
            
            if(empty($data['org'])){
                die('empty edit org');
            }

            $this -> load -> view('templates/header');
            $this -> load -> view('doctors/editorg', $data);
            $this -> load -> view('templates/footer'); 
        }

        public function updateorg() {
            $this -> doctor_model -> editorg();
            
            //Message
            $this -> session -> set_flashdata('doctor_updateorg','You have successfully updated your organizations details.');
            redirect('doctors/vieworg');
        }

    }