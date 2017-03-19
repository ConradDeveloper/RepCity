<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Contacto extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    
    function insertar($registro){
        $this->db->insert('contact_admin_public', $registro);
    }
 }