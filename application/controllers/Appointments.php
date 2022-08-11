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

        public function book() {
            $data['title'] = 'Book an Appointment with your Doctor';

            $this -> form_validation -> set_rules('date','Date', 'required');
            $this -> form_validation -> set_rules('time','Time', 'required');
            $this -> form_validation -> set_rules('patient_id','Patient ID', 'required');
            $this -> form_validation -> set_rules('patient_surname','Patient Surname', 'required');
            $this -> form_validation -> set_rules('patient_email','Patient Email', 'required');
            $this -> form_validation -> set_rules('doctor_id','Doctor ID', 'required');
            $this -> form_validation -> set_rules('doctor_surname','Doctor Surname', 'required');
            $this -> form_validation -> set_rules('doctor_email','Doctor Email', 'required');

            if($this-> form_validation-> run() === FALSE) {
                $this -> load -> view('templates/header');
                $this -> load -> view('appointments/book', $data);
                $this -> load -> view('templates/footer');
            } else {
                $this -> appointment_model -> book();
                redirect('appointments');
            }
        }
    }