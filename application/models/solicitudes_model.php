<?php
class Solicitudes_model extends CI_Model {

    public function __construct(){
            $this->load->database();
    }

    public function get_solicitudes($id = FALSE){
        if ($id === FALSE){
            return $this->db->query("select * from solicitudes_obtener();")->result_array();
        }
        else{
            return $this->db->query("select * from solicitudes_obtener_id($id);")->result_array();
        }
        
    }

    public function create_solicitudes(){
        $this->load->helper('url');

        $in_inspeccion = $this->input->post('inspeccion');
        $in_estado = $this->input->post('estado');
        
        return $this->db->query("select solicitudes_crear($in_inspeccion, $in_estado);");
    }

    public function delete_solicitudes(){
            $in_id = $this->input->get('id');
            return $this->db->query("select solicitudes_eliminar($in_id);");
        
    }

    public function update_solicitudes(){
        $this->load->helper('url');

        $in_id = $this->input->get('id');
        $in_estado = $this->input->post('estado');
        
        return $this->db->query("select solicitudes_modificar($in_id, $in_estado);");
    }
}