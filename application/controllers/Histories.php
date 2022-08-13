<?php
    class Histories extends CI_Controller {
        public function index() {
            #display page title 
            $data['title'] = 'Patient Histories';

           $data['histories'] = $this -> history_model -> get_histories();
            
            # load header page and footer
            $this -> load -> view('templates/header');
            $this -> load -> view('histories/index', $data);
            $this -> load -> view('templates/footer');

        }

        public function view($slug = NULL) {
        
            $data['history'] = $this -> history_model -> get_histories($slug);

            if(empty($data['history'])){
                show_404();
            }

            $data['title'] = 'History of ' . $data['history']['patient_id'];

            $this -> load -> view('templates/header');
            $this -> load -> view('histories/details', $data);
            $this -> load -> view('templates/footer');

        }
    }