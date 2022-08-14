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

        public function patientview($slug = NULL) {
        
            #display page title 
            $data['title'] = 'Your Medical History';

           $data['histories'] = $this -> history_model -> get_histories();
            
            # load header page and footer
            $this -> load -> view('templates/header');
            $this -> load -> view('histories/patientview', $data);
            $this -> load -> view('templates/footer');

        }

        public function create() {
            //check login
            if(!$this-> session -> userdata('logged_in')){
                redirect('appointments');
            }
            
            $data['title'] = 'Create a new Medical History Record';

            $this -> form_validation -> set_rules('patient_id','Patient ID', 'required');
            $this -> form_validation -> set_rules('patient_surname','Patient Surname', 'required');
            $this -> form_validation -> set_rules('patient_email','Patient Email', 'required');
            $this -> form_validation -> set_rules('date','Patient Birthday', 'required');
            $this -> form_validation -> set_rules('illness','Illness', 'required');
            $this -> form_validation -> set_rules('weight','Weight', 'required');
            $this -> form_validation -> set_rules('height','Height', 'required');

            if($this-> form_validation-> run() === FALSE) {
                $this -> load -> view('templates/header');
                $this -> load -> view('histories/create', $data);
                $this -> load -> view('templates/footer');
            } else {
                $this -> history_model -> create();
                $this -> session -> set_flashdata('history_created','History creation successful.');
                redirect('histories');
            }

        }

        public function delete($patient_id) {
            #call function from model
            $this -> history_model -> delete($patient_id);

            $this -> session -> set_flashdata('history_deleted','History deletion successful.');
            redirect('histories');
        }

        public function edit($slug) {
            $data['history'] = $this -> history_model -> get_histories($slug);

            if(empty($data['history'])){
                show_404();
            }

            $data['title'] = 'Edit Patient History';

            $this -> load -> view('templates/header');
            $this -> load -> view('histories/edit', $data);
            $this -> load -> view('templates/footer');
            
        }

        public function update() {
            $this -> history_model -> update();
            $this -> session -> set_flashdata('history_updated','History update successful.');
            redirect('histories');
        }
    }