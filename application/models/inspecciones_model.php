<?php
class Inspecciones_model extends CI_Model {

    public function __construct(){
            $this->load->database();
    }

    public function get_inspecciones($id = FALSE){
        if ($id === FALSE){
            return $this->db->query("select * from inspecciones_obtener();")->result_array();
        }
        else{
            return $this->db->query("select * from inspecciones_obtener_id($id);")->result_array();
        }
        
    }

    public function create_inspecciones(){
        $this->load->helper('url');

        $in_bombero = $this->input->post('bombero');
        $in_hidrante = $this->input->post('hidrante');
        
        return $this->db->query("select inspecciones_crear($in_bombero, $in_hidrante);");
    }

    public function create_inspecciones_localizacion(){
        $this->load->helper('url');

        $in_bombero = $this->input->post('bombero');
        $in_hidrante_nuevo = $this->input->post('hidrante_nuevo');
        $in_localizacion = $this->input->post('localizacion');

        $coordenadas = explode(",", $in_localizacion);
            $latitud = trim($coordenadas[0]);
            $longitud = trim($coordenadas[1]);
        
        return $this->db->query("select inspecciones_crear_latlon($in_bombero, '$in_hidrante_nuevo', $latitud, $longitud);");
    }

    public function delete_inspecciones(){
            $in_id = $this->input->get('id');
            return $this->db->query("select inspecciones_eliminar($in_id);");
        
    }

    public function update_inspecciones(){
        $this->load->helper('url');
        
        $in_id = $this->input->get('id');
        $in_bombero = $this->input->post('bombero');
        $in_hidrante = $this->input->post('hidrante');
        $in_accion = $this->input->post('accion');

        if($in_accion == ''){
            $in_accion = '-1';
        }

        if($in_hidrante == 'n'){
            $in_hidrante = 0;
        }
        
        return $this->db->query("select inspecciones_modificar($in_id, $in_bombero, $in_hidrante, $in_accion);");
    }
}