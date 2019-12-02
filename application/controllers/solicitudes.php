<?php
class Solicitudes extends CI_Controller {

        public function __construct(){
                parent::__construct();
                $this->load->model('solicitudes_model');
                $this->load->model('hidrantes_model');
                $this->load->model('inspecciones_model');
                $this->load->helper('url_helper');
                
                $this->load->library('session');
                if(! $this->session->userdata('validated')){
                    redirect('usuarios/login');
                }
        }

        public function index()
        {
                $data['solicitudes'] = $this->solicitudes_model->get_solicitudes();
                $data['title'] = 'Solicitudes';
                
                foreach($data['solicitudes'] as $key => $solicitud){
                        $inspeccion = $this->inspecciones_model->get_inspecciones($solicitud['inspeccion']);
                        $data['solicitudes'][$key]['accion'] = $inspeccion[0]['accion'];
                        $hidrante = $this->hidrantes_model->get_hidrantes($inspeccion[0]['hidrante']);
                        isset($hidrante[0]['nombre']) ? 
                                $data['solicitudes'][$key]['hidrante_nombre'] = $hidrante[0]['nombre'] : 
                                $data['solicitudes'][$key]['hidrante_nombre'] = 'Pendiente';
                }

                //$data['title'] = 'Solicitudes';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('solicitudes/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($id = NULL)
        {
                $data['solicitudes_item'] = $this->solicitudes_model->get_solicitudes($id);
                if (empty($data['solicitudes_item'])){
                        show_404();
                }

                $data['title'] = $data['solicitudes_item']['nombre'];

                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('solicitudes/view', $data);
                $this->load->view('templates/footer');
        }

        public function create(){
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Nueva Solicitud';

                $this->form_validation->set_rules('inspeccion', 'Inspeccion', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('solicitudes/create');
                        $this->load->view('templates/footer');

                }
                else
                {
                        $this->solicitudes_model->create_solicitudes();
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('solicitudes/success');
                        $this->load->view('templates/footer');
                }
        }

        public function delete(){
                $data['title'] = 'Eliminar Usuario';
                $this->solicitudes_model->delete_solicitudes();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('solicitudes/deleted');
                $this->load->view('templates/footer');
        }

        public function update(){
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['solicitudes'] = $this->solicitudes_model->get_solicitudes($this->input->get('id'));

                foreach($data['solicitudes'] as $key => $solicitud){
                        $inspeccion = $this->inspecciones_model->get_inspecciones($solicitud['inspeccion']);
                        $data['solicitudes'][$key]['accion'] = $inspeccion[0]['accion'];
                        $hidrante = $this->hidrantes_model->get_hidrantes($inspeccion[0]['hidrante']);

                        if(isset($hidrante[0]['nombre'])){
                                $data['solicitudes'][$key]['hidrante_nombre'] = $hidrante[0]['nombre'];
                        }
                        else{
                                $query = $this->inspecciones_model->get_inspecciones($data['solicitudes'][$key]['inspeccion']);
                                $data['solicitudes'][$key]['hidrante_nombre'] = $query[0]['hidrante_nuevo'];
                        }
                                
                }

                $data['title'] = 'Modificar Solicitud';

                $this->form_validation->set_rules('estado', 'Estado', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('solicitudes/update');
                $this->load->view('templates/footer');
                }
                else{
                        $this->solicitudes_model->update_solicitudes();
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('solicitudes/success_update');
                        $this->load->view('templates/footer');   
                }
        }
}