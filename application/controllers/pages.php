<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

        public function __construct(){
                parent::__construct();
                $this->load->model('usuarios_model');
                $this->load->helper('url_helper');

                $this->load->library('session');
                if(! $this->session->userdata('validated')){
                    redirect('usuarios/login');
                }
        }
        
	public function view($page = 'home'){
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
	}
}
