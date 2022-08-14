<?php
    class Prescriptions extends CI_Controller {
        public function index() {
            #display page title 
            $data['title'] = 'Patient Prescriptions';

           $data['prescriptions'] = $this -> prescription_model -> get_prescriptions();
            
            # load header page and footer
            $this -> load -> view('templates/header');
            $this -> load -> view('prescriptions/index', $data);
            $this -> load -> view('templates/footer');

        }

        public function patientview($slug = NULL) {
            #display page title 
            $data['title'] = 'Your Prescriptions';

            $data['prescriptions'] = $this -> prescription_model -> get_prescriptions();
            
            # load header page and footer
            $this -> load -> view('templates/header');
            $this -> load -> view('prescriptions/patientview', $data);
            $this -> load -> view('templates/footer');

        }

        public function create() {
            //check login
            if(!$this-> session -> userdata('logged_in')){
                redirect('home');
            }
            
            $data['title'] = 'Create a new Prescription';

            
            $this -> form_validation -> set_rules('patient_email','Patient Email', 'required');
            $this -> form_validation -> set_rules('date','Prescription Date', 'required');
            $this -> form_validation -> set_rules('medication','Medication', 'required');

            if($this-> form_validation-> run() === FALSE) {
                $this -> load -> view('templates/header');
                $this -> load -> view('prescriptions/create', $data);
                $this -> load -> view('templates/footer');
            } else {
                $this -> prescription_model -> create();
                $this -> session -> set_flashdata('prescription_created','Prescription creation successful.');
                redirect('prescriptions');
            }

        }

        public function delete($prescription_id) {
            #call function from model
            $this -> prescription_model -> delete($prescription_id);

            $this -> session -> set_flashdata('prescription_deleted','Prescription deletion successful.');
            redirect('prescriptions');
        }

        public function edit($slug) {
            $data['prescription'] = $this -> prescription_model -> get_prescriptions($slug);

            if(empty($data['prescription'])){
                show_404();
            }

            $data['title'] = 'Edit Prescription';

            $this -> load -> view('templates/header');
            $this -> load -> view('prescriptions/edit', $data);
            $this -> load -> view('templates/footer');
            
        }

        public function update() {
            $this -> prescription_model -> update();
            $this -> session -> set_flashdata('prescription_updated','Prescription update successful.');
            redirect('prescriptions');
        }
    }