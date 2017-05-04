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
    
    function updateCiudadano($id_usr_ciudadano,$nombre,$p_apellido,$s_apellido,$direccion,$email,$id_localidad){
        $registro = array(
            'nombre' => $nombre,
            'p_apellido' => $p_apellido,
            's_apellido' => $s_apellido,
            'direccion' => $direccion,
            'email' => $email,
            'id_localidad' => $id_localidad,
         );

        $this->db->where('id_usr_ciudadano', $id_usr_ciudadano);
        $this->db->update('usr_ciudadano', $registro); 
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
        $from_email = 'reportcitymail@gmail.com'; 
        $subject = 'Verificacion de la direccion correo electronico';
        $message = 'Estimado usuario,<br /><br />Porfavor pulsa en el link de validacion para validar tu correo electronico.<br /><br /> <a href="http://localhost/ReportCity/home/verificaremail/' .  $email  . '">http://localhost/ReportCity/home/verificaremail/' .  $email  . '</a><br /><br /><br />Gracias<br />El equipo de ReportCity';
        
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; 
        //$config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = $from_email; 
        $config['smtp_pass'] = 'reportcitymail123'; 
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
    
    
    function sendEmailUP($email, $nom_user, $pass)
    {
        $from_email = 'reportcitymail@gmail.com'; 
        $subject = 'Recordatorio usuario y clave';
        $message = 'Estimado usuario,<br /><br />Te adjuntamos tu usuario y clave para que puedas acceder a nuestro portal web.<br /><br /> Usuario: ' .  $nom_user  . '<br /><br />Clave: ' .  $pass  . '<br /><br />Gracias,<br /><br />Equipo de ReportCity';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; 
        //$config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = $from_email; 
        $config['smtp_pass'] = 'reportcitymail123'; 
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