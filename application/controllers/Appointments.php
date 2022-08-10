<?php
    class Appointments extends CI_Controller {
        public function index() {
            #display page title 
            $data['title'] = 'Appointments';

            $data['appointments'] = $this -> appointment_model -> get_appointments();
            
            # load header page and footer
            $this -> load -> view('templates/header');
            $this -> load -> view('appointments/index', $data);
            $this -> load -> view('templates/footer');

        }

        public function view($slug = NULL) {
            $data['appointment'] = $this -> appointment_model -> get_appointments($slug);

            if(empty($data['appointment'])){
                show_404();
            }

            $data['title'] = $data['appointment']['appointment_id'];

            $this -> load -> view('templates/header');
            $this -> load -> view('appointments/details', $data);
            $this -> load -> view('templates/footer');

        }
    }