<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Usuario_P extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    function actualizar($registro){
        $this->db->set($registro);
        $this->db->where('id_admin_public', $registro['id_admin_public']);
        $this->db->update('usr_admin_public');
    }
    
    function obtener_login($user,$pass){
        $this->db->where('name_user', $user);
        $this->db->where('password', $pass);
        return $this->db->get('usr_admin_public');
    }
    
     function buscar_por_id($id){
        return $this->db->get_where('usr_admin_public', array('id_admin_public' => $id));

    }
   
}