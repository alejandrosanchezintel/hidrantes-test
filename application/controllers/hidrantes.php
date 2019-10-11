<?php
class Hidrantes extends CI_Controller {

        public function __construct(){
                parent::__construct();
                $this->load->model('hidrantes_model');
                $this->load->helper('url_helper');

                $this->load->library('session');
                if(! $this->session->userdata('validated')){
                    redirect('usuarios/login');
                }
        }

        public function index()
        {
                $data['hidrantes'] = $this->hidrantes_model->get_hidrantes();
                $data['title'] = 'Hidrantes';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('hidrantes/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($id = NULL)
        {
                $data['hidrantes_item'] = $this->hidrantes_model->get_hidrantes($id);
                if (empty($data['hidrantes_item'])){
                        show_404();
                }

                $data['title'] = $data['hidrantes_item']['nombre'];

                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('hidrantes/view', $data);
                $this->load->view('templates/footer');
        }

        public function create(){
                $data['title'] = 'Hidrantes';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('hidrantes/create', $data);
                $this->load->view('templates/footer');
        }

        public function delete(){
                $data['title'] = 'Eliminar Usuario';
                $this->hidrantes_model->delete_hidrantes();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('hidrantes/deleted');
                $this->load->view('templates/footer');
        }

        public function update(){
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['hidrantes'] = $this->hidrantes_model->get_hidrantes($this->input->get('id'));

                $data['title'] = 'Modificar Hidrante';

                $this->form_validation->set_rules('nombre', 'Nombre', 'required');
                $this->form_validation->set_rules('calle', 'Calle', 'required');
                $this->form_validation->set_rules('avenida', 'Avenida', 'required');
                $this->form_validation->set_rules('caudal', 'Caudal', 'required');
                $this->form_validation->set_rules('localizacion', 'Localizacion', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('hidrantes/update', $data);
                        $this->load->view('templates/footer');
                }
                else
                {
                        $this->hidrantes_model->update_hidrantes();
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('hidrantes/success_update');
                        $this->load->view('templates/footer');
                }
        }

        public function search_name(){
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['hidrantes'] = $this->hidrantes_model->get_hidrantes_nombre($this->input->get('nombre'));
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('hidrantes/search_name', $data);
                        $this->load->view('templates/footer');

                
        }
}