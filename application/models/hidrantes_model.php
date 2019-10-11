<?php
class Hidrantes_model extends CI_Model {

    public function __construct(){
            $this->load->database();
    }

    public function get_hidrantes($id = FALSE){
        if ($id === FALSE){
            return $this->db->query("select * from hidrantes_obtener();")->result_array();
        }
        else{
            return $this->db->query("select * from hidrantes_obtener_id($id);")->result_array();
        }
        
    }

    public function create_hidrantes(){
        $this->load->helper('url');

        $in_nombre = $this->input->post('nombre');
        $in_calle = $this->input->post('calle');
        $in_avenida = $this->input->post('avenida');
        $in_caudal = $this->input->post('caudal');
        $in_localizacion = $this->input->post('localizacion');
        
        return $this->db->query("select hidrantes_crear($in_nombre, '$in_calle', '$in_avenida', '$in_caudal', $in_localizacion);");
    }

    public function delete_hidrantes(){
            $in_id = $this->input->get('cedula');
            return $this->db->query("select hidrantes_eliminar($in_id);");
        
    }

    public function update_hidrantes(){
        $this->load->helper('url');

        $in_id = $this->input->get('id');
        $in_nombre = $this->input->post('nombre');
        $in_calle = $this->input->post('calle');
        $in_avenida = $this->input->post('avenida');
        $in_caudal = $this->input->post('caudal');
        $in_localizacion = $this->input->post('localizacion');

        if (strpos($in_localizacion, ',') !== false) {
            $coordenadas = explode(",", $in_localizacion);
            $latitud = trim($coordenadas[0]);
            $longitud = trim($coordenadas[1]);

            return $this->db->query("select hidrantes_modificar_latlon($in_id, '$in_nombre', $in_calle, $in_avenida, $in_caudal, $latitud, $longitud);");
        }
        else{
            return $this->db->query("select hidrantes_modificar($in_id, '$in_nombre', $in_calle, $in_avenida, $in_caudal, '$in_localizacion');");
        }
    }
    public function get_hidrantes_nombre($nombre){

        $in_id = $this->input->get('nombre');
        return $this->db->query("select * from hidrantes_obtener_nombre('$nombre');")->result_array();
    }
}