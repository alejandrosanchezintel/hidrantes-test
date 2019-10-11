<?php
class Usuarios extends CI_Controller {

        public function __construct(){
                parent::__construct();
                $this->load->model('usuarios_model');
                $this->load->helper('url_helper');
                $this->load->library('session');
        }

        public function index()
        {
                
                if(! $this->session->userdata('validated')){ redirect('usuarios/login');}

                $data['usuarios'] = $this->usuarios_model->get_usuarios();
                $data['title'] = 'Usuarios';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('usuarios/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($id = NULL)
        {
                if(! $this->session->userdata('validated')){ redirect('usuarios/login');}

                $data['usuarios_item'] = $this->usuarios_model->get_usuarios($id);
                if (empty($data['usuarios_item'])){
                        show_404();
                }

                $data['title'] = $data['usuarios_item']['nombre'];

                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('usuarios/view', $data);
                $this->load->view('templates/footer');
        }

        public function create(){
                if(! $this->session->userdata('validated')){ redirect('usuarios/login');}

                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Registro de Usuario';

                $this->form_validation->set_rules('cedula', 'Cedula', 'required');
                $this->form_validation->set_rules('nombre', 'Nombre', 'required');
                $this->form_validation->set_rules('apellido_1', 'Primer Apellido', 'required');
                $this->form_validation->set_rules('apellido_2', 'Segundo Apellido', 'required');
                $this->form_validation->set_rules('telefono', 'Telefono', 'required');
                $this->form_validation->set_rules('tipo', 'Tipo', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('usuarios/create');
                        $this->load->view('templates/footer');

                }
                else
                {
                        $this->usuarios_model->create_usuarios();
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('usuarios/success');
                        $this->load->view('templates/footer');
                }
        }

        public function delete(){
                if(! $this->session->userdata('validated')){ redirect('usuarios/login');}

                $data['title'] = 'Eliminar Usuario';
                $this->usuarios_model->delete_usuarios();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('usuarios/deleted');
                $this->load->view('templates/footer');
        }

        public function update(){
                if(! $this->session->userdata('validated')){ redirect('usuarios/login');}

                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['usuario'] = $this->usuarios_model->get_usuarios($this->input->get('cedula'));

                $data['title'] = 'Modificar Usuario';


                $this->form_validation->set_rules('cedula', 'Cedula', 'required');
                $this->form_validation->set_rules('nombre', 'Nombre', 'required');
                $this->form_validation->set_rules('apellido_1', 'Primer Apellido', 'required');
                $this->form_validation->set_rules('apellido_2', 'Segundo Apellido', 'required');
                $this->form_validation->set_rules('telefono', 'Telefono', 'required');
                $this->form_validation->set_rules('tipo', 'Tipo', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('usuarios/update', $data);
                        $this->load->view('templates/footer');

                }
                else
                {
                        $this->usuarios_model->update_usuarios();
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('usuarios/success_update');
                        $this->load->view('templates/footer');
                }
        }

        public function login( $msg = NULL){

                $result = $this->usuarios_model->validate();
                if(! $result){
                        $data['msg'] = "Datos incorrectos";
                        $this->load->view('templates/header');
                        $this->load->view('templates/nav');
                        $this->load->view('usuarios/login', $data);
                        $this->load->view('templates/footer');
                }else{
                        redirect('home');
                } 
        }
        public function logout(){
                $this->session->sess_destroy();
                redirect('login');
        }
}