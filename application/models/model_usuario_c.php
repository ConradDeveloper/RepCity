<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Usuario_C extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    
    function buscar_todo(){
        $query = $this->db->get('usr_ciudadano');  // Produces: SELECT * FROM mytable
        //retorna un array
        return $query->result();
    }

    function insertar($registro){
        $this->db->insert('usr_ciudadano', $registro);
    }
    
    function buscar_por_id($id){
        return $this->db->get_where('usr_ciudadano', array('id_usr_ciudadano' => $id));
    }
    
    function buscar_por_name_user($name_user){
        return $this->db->get_where('usr_ciudadano', array('name_user' => $name_user));
    }
    
    function buscar_por_email($email){
        return $this->db->get_where('usr_ciudadano', array('email' => $email));
    }
    
    
    function actualizar($registro){
        $this->db->set($registro);
        $this->db->where('id_usr_ciudadano', $registro['id_usr_ciudadano']);
        $this->db->update('usr_ciudadano');
    }
    
    function obtener_login($user,$pass){
        $this->db->where('name_user', $user);
        $this->db->where('password', $pass);
        return $this->db->get('usr_ciudadano');
    }
    
     
    //-------------------------------Validacion de email--------------------------
    
    
     //send verification email to user's email id
    function sendEmail($email)
    {
        $from_email = 'conrad083@gmail.com'; 
        $subject = 'Verify Your Email Address';
        $message = 'Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> <a href="http://localhost/ReportCity/home/verificaremail/' .  $email  . '">http://localhost/ReportCity/home/verificaremail/' .  $email  . '</a><br /><br /><br />Thanks<br />Mydomain Team';
        
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; 
        //$config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = $from_email; 
        $config['smtp_pass'] = 'Antracita1423'; 
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";
        
        //$this->load->library('email', $config);
        
        //send mail
        
        $this->email->initialize($config);
        $this->email->from($from_email,'ReportCity');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        //return $this->email->send();
        return $this->email->send();
        //echo $this->email->print_debugger();
        
    }
    
    //activate user account
    function verificaremailID($emailval)
    {
        $data = array('status' => 1);
        $this->db->where('email', $emailval);
        return $this->db->update('usr_ciudadano', $data);
    }
    
 }