<?php
class Inspecciones extends CI_Controller {

        public function __construct(){
                parent::__construct();
                $this->load->model('inspecciones_model');
                $this->load->model('usuarios_model');
                $this->load->model('hidrantes_model');
                $this->load->helper('url_helper');

                $this->load->library('session');
                if(! $this->session->userdata('validated')){
                    redirect('usuarios/login');
                }
        }

        public function index()
        {
                $data['inspecciones'] = $this->inspecciones_model->get_inspecciones();
                $data['title'] = 'Inspecciones';

                foreach($data['inspecciones'] as $key => $inspeccion){
                        $bombero = $this->usuarios_model->get_usuarios($inspeccion['bombero']);
                        $data['inspecciones'][$key]['bombero_nombre'] = $bombero[0]['nombre'] . ' ' . $bombero[0]['apellido_1'] . ' ' . $bombero[0]['apellido_2'];

                        $hidrante =  $this->hidrantes_model->get_hidrantes($inspeccion['hidrante']);
                        if(isset($hidrante[0]['nombre'])){
                                $data['inspecciones'][$key]['hidrante_nombre'] = $hidrante[0]['nombre'];
                        }
                        else{
                                $data['inspecciones'][$key]['hidrante_nombre'] = 'Pendiente';
                        }
                        

                        if($inspeccion['completo'] == "f"){
                                $data['inspecciones'][$key]['completo'] = 'Pendiente';
                        }
                        else{
                                $data['inspecciones'][$key]['completo'] = 'Completada';
                        }

                        if($inspeccion['accion'] == ''){
                                $data['inspecciones'][$key]['accion'] = 'Pendiente';
                        }

                        if($inspeccion['fecha_finalizacion'] == ''){
                                $data['inspecciones'][$key]['fecha_finalizacion'] = 'Pendiente';
                        }
                }

                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('inspecciones/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($id = NULL)
        {
                $data['inspecciones_item'] = $this->inspecciones_model->get_inspecciones($id);
                if (empty($data['inspecciones_item'])){
                        show_404();
                }

                $data['title'] = $data['inspecciones_item']['nombre'];

                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('inspecciones/view', $data);
                $this->load->view('templates/footer');
        }

        public function create(){
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Inspecciones';
                $data['bomberos'] = $this->usuarios_model->get_bomberos();
                $data['hidrantes'] = $this->hidrantes_model->get_hidrantes();

                $this->form_validation->set_rules('bombero', 'Bombero', 'required');
                $this->form_validation->set_rules('hidrante', 'Hidrante', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('inspecciones/create', $data);
                        $this->load->view('templates/footer');
                }
                else
                {
                        $hidrante = $this->input->post('hidrante');
                        if($hidrante == 'n'){
                                $this->form_validation->set_rules('localizacion', 'Localizacion', 'required');
                                $this->form_validation->set_rules('hidrante_nuevo', 'Hidrante Nuevo', 'required');
                                if ($this->form_validation->run() === FALSE){
                                        $this->load->view('templates/header', $data);
                                        $this->load->view('templates/nav', $data);
                                        $this->load->view('inspecciones/create', $data);
                                        $this->load->view('templates/footer');
                                }
                                else{
                                        $this->inspecciones_model->create_inspecciones_localizacion();
                                        $this->load->view('templates/header', $data);
                                        $this->load->view('templates/nav', $data);
                                        $this->load->view('inspecciones/success');
                                        $this->load->view('templates/footer');
                                }
                        }
                        else{
                                $this->inspecciones_model->create_inspecciones();
                                $this->load->view('templates/header', $data);
                                $this->load->view('templates/nav', $data);
                                $this->load->view('inspecciones/success');
                                $this->load->view('templates/footer');
                        }
                        
                }
        }

        public function delete(){
                $data['title'] = 'Eliminar Inspeccion';
                $this->inspecciones_model->delete_inspecciones();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('inspecciones/deleted');
                $this->load->view('templates/footer');
        }

        public function update(){
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['bomberos'] = $this->usuarios_model->get_bomberos();
                $data['hidrantes'] = $this->hidrantes_model->get_hidrantes();

                $data['inspeccion'] = $this->inspecciones_model->get_inspecciones($this->input->get('id'));

                $data['title'] = 'Modificar Inspeccion';

                foreach($data['inspeccion'] as $key => $inspeccion){
                        $bombero = $this->usuarios_model->get_usuarios($inspeccion['bombero']);
                        $data['inspeccion'][$key]['bombero_nombre'] = $bombero[0]['nombre'] . ' ' . $bombero[0]['apellido_1'] . ' ' . $bombero[0]['apellido_2'];

                        $hidrante =  $this->hidrantes_model->get_hidrantes($inspeccion['hidrante']);

                        isset($hidrante[0]['nombre']) ? 
                                $data['inspeccion'][$key]['hidrante_nombre'] = $hidrante[0]['nombre'] : 
                                $data['inspeccion'][$key]['hidrante_nombre'] = 'Pendiente';

                        if($inspeccion['completo'] == "f"){
                                $data['inspeccion'][$key]['completo'] = 'Pendiente';
                        }
                        else{
                                $data['inspeccion'][$key]['completo'] = 'Completada';
                        }

                        if($inspeccion['fecha_finalizacion'] == ''){
                                $data['inspeccion'][$key]['fecha_finalizacion'] = 'Pendiente';
                        }
                }

                $this->form_validation->set_rules('bombero', 'Bombero', 'required');
                $this->form_validation->set_rules('hidrante', 'Hidrante', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('inspecciones/update', $data);
                        $this->load->view('templates/footer');

                }
                else
                {
                        $this->inspecciones_model->update_inspecciones();
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('inspecciones/success_update');
                        $this->load->view('templates/footer');
                }
        }
}