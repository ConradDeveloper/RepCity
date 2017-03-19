<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Localidad extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    
    function buscar_todo(){   
        $this->db->order_by('nom_localidad', 'ASC');
        $query = $this->db->get('localidad'); 
        return $query->result_array();
    }
    
}