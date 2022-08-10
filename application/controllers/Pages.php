<?php
    class Pages extends CI_Controller {
        public function view($pagename = 'home') {
            #check f page exists
            if(!file_exists(APPPATH.'views/pages/'. $pagename . '.php')) {
                show_404();
            }

            #display page title 
            $data['title'] = ucfirst($pagename);

            # load header page and footer
            $this -> load -> view('templates/header');
            $this -> load -> view('pages/' .$pagename, $data);
            $this -> load -> view('templates/footer');
        }
    }