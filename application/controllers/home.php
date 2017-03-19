<?php

//Convencion CI --> no cerramos la etiqueta ?php para ahorrar tiempo de ejecucion del servidor
//insertamos esta linea para que no pueda navergarse por url directamente
defined('BASEPATH') OR exit('No direct script access allowed');

//Convencion CI --> el nombre del controlador ha de ser igual que el del fichero php pero con la primera letra mayusculas y lo demas minusculas
//el archivo con minusculas
class Home extends CI_Controller {

    public function registro() {
        $this->load->model('Model_Localidad');
        $registros = $this->Model_Localidad->buscar_todo();
        $listadoRegistros = array();
        foreach ($registros as $registro) {
            $itemRegistro = array();
            $itemRegistro['id_localidad'] = $registro['id_localidad'];
            $itemRegistro['nom_localidad'] = $registro['nom_localidad'];
            $listadoRegistros[] = $itemRegistro;
        }

        $data = array(
            'contenido' => 'usuario_c/registro',
            'titulo' => 'Registro',
            'registros' => $listadoRegistros,
        );
        $this->load->view('templateform', $data);
    }

    public function valida_registro() {
        $this->load->model('Model_Usuario_C');

       /* $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('p_apellido', 'Primer apellido', 'required');
        $this->form_validation->set_rules('s_apellido', 'Segundo apellido', 'required');
        $this->form_validation->set_rules('nif', 'NIF', 'required');
        $this->form_validation->set_rules('direccion', 'Dirección', 'required');*/
        $this->form_validation->set_rules('email', 'Correo electrónico', 'required|valid_email');
       // $this->form_validation->set_rules('telf_contact', 'Teléfono', 'required|numeric');
        $this->form_validation->set_rules('name_user', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|matches[passwordval]');
        $this->form_validation->set_rules('passwordval', 'Repetir contraseña', 'required');
        $this->form_validation->set_rules('localidad', 'Localidad', 'callback_validalocalidad',array('validalocalidad' => 'Es necesario seleccionar una localidad.'));


        if ($this->form_validation->run() == FALSE) {
            $this->registro();
        } else {
            $this->form_validation->set_rules('name_user', 'Usuario', 'callback_validarusuario',array('validarusuario' => 'El nombre de usuario ya esta en uso.'));
            if ($this->form_validation->run() == FALSE) {
                $this->registro();
            } else {
                $this->load->model('Model_Usuario_C');

               /* $nombre = $this->input->post('nombre');
                $p_apellido = $this->input->post('p_apellido');
                $s_apellido = $this->input->post('s_apellido');
                $nif = $this->input->post('nif');
                $direccion = $this->input->post('direccion');*/
                $email = $this->input->post('email');
               // $telf_contact = $this->input->post('telf_contact');
                $name_user = $this->input->post('name_user');
                $password = $this->input->post('password');
                $localidad = $this->input->post('localidad');
                
                $datos = array(/*'nombre' => $nombre,
                'p_apellido' => $p_apellido,
                's_apellido' => $s_apellido,
                'nif' => $nif,
                'direccion' => $direccion,*/
                'email' => $email,
                //'telf_contac' => $telf_contact,
                'name_user' => $name_user,
                'password' => $password,
                'id_localidad' => $localidad,
                );

                $this->Model_Usuario_C->insertar($datos);
                if ($this->Model_Usuario_C->sendEmail($email)){
                    $this->okregistro();
                }
                else{
                  $this->registro();  
                    
                }
            }
        }
    }
    
    
 function verificaremail($emailval)
    {
     $this->load->model('Model_Usuario_C');
     $emailval= trim($emailval);
    // echo $emailval;
        if ($this->Model_Usuario_C->verificaremailID($emailval))
        {
            $this->ingreso();
        }
        else
        {
            echo 'mallllllllllllllllllllllllllllllllllllllllllllllll';
        }
    }
    
    
    public function validarusuario() {
        $user = $this->input->post('name_user');
        $this->load->model('Model_Usuario_C');
        $query = $this->Model_Usuario_C->buscar_por_name_user($user);
        if ($query->num_rows() > 0) {
            return FALSE;
        }
    }

    public function validalocalidad() {
        $localidad = $this->input->post('localidad');

        if ($localidad === "ninguna") {
            return FALSE;
        }
    }
    
    public function okregistro() {
        $data['contenido'] = 'usuario_c/okregistro';
        $data['titulo'] = 'Registro correcto';
        $this->load->view('templateform', $data);
    }


    public function index() {
        $this->load->model('Model_Report');
        $registros = $this->Model_Report->report_index();

        $listadoRegistros = array();
        foreach ($registros as $registro) {
            $itemRegistro = array();
            $itemRegistro['titulo_rep'] = $registro['titulo_rep'];
            $itemRegistro['descripcion'] = $registro['descripcion'];
            $itemRegistro['foto_ruta'] = $registro['foto_ruta'];
            $listadoRegistros[] = $itemRegistro;
        }

        $data = array(
            'contenido' => 'home/index',
            'titulo' => 'Indice',
            'registros' => $listadoRegistros,
        );

        $this->load->view('template', $data);
    }

    public function contactar() {
        $data['contenido'] = 'home/contactar';
        $data['titulo'] = 'Contactar';
        $this->load->view('templateform', $data);
    }

    public function valida_contacto() {
        $this->load->model('Model_Contacto');

        $this->form_validation->set_rules('nom_ayunt', 'Nombre del ayuntamiento', 'required');
        $this->form_validation->set_rules('mail_contact', 'Correo de contacto', 'required|valid_email');
        $this->form_validation->set_rules('telf_contact', 'Teléfono de contacto', 'required|numeric');
        $this->form_validation->set_rules('text_solicitud', 'Texto de solicitud', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->contactar();
        } else {

            $nom_ayuntamiento = $this->input->post('nom_ayunt');
            $mail_contact = $this->input->post('mail_contact');
            $telf_contact = $this->input->post('telf_contact');
            $text_solicitud = $this->input->post('text_solicitud');

            $datos = array('nom_ayuntamiento' => $nom_ayuntamiento,
                'mail_contact' => $mail_contact,
                'telf_contact' => $telf_contact,
                'text_solicitud' => $text_solicitud,);
            $this->Model_Contacto->insertar($datos);
            redirect('home/index');
        }
    }

    public function reportcityinfo() {
        $data['contenido'] = 'home/reportcityinfo';
        $data['titulo'] = 'Informacion';
        $this->load->view('templateform', $data);
    }

    public function salir() {
        $this->session->sess_destroy();
        redirect('home/index');
    }

    public function menuciudadano() {
       // if($this->session->userdata('typ_user')!== NULL){
            $data['contenido'] = 'usuario_c/menu';
            $data['titulo'] = 'Menu';
            $this->load->view('templateform', $data);
       /* }
        else{
            $this->ingreso();  
            
        }*/
    }

    public function menuayuntamiento() {
      if($this->session->userdata('typ_user')!== NULL){
            $data['contenido'] = 'ayuntamiento/menu';
            $data['titulo'] = 'Menu';
            $this->load->view('templateform', $data);
         }
        else{
            $this->ingreso();  
            
        }
    }

    public function ingreso() {
        $data['contenido'] = 'home/login';
        $data['titulo'] = 'Login';
        $this->load->view('templateform', $data);
    }

    public function validarlogin() {

        $this->form_validation->set_message('validabdlogin', 'User o Password inorrecto');
        $this->form_validation->set_rules('loginuser', 'Usuario', 'required');
        $this->form_validation->set_rules('clave', 'Clave', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->ingreso();
        } else {
            $this->form_validation->set_rules('loginuser', 'Usuario', 'callback_validabdlogin');
            if ($this->form_validation->run() == FALSE) {
                $this->ingreso();
            } else {
                //$user = $this->input->post('loginuser');
                $typ_user = $this->session->userdata('typ_user');
                $status = $this->session->userdata('status');
                if ($typ_user === '1') {
                    if ($status === '1'){
                        $this->menuciudadano();
                    }
                    else{
                       $this->ingreso();    
                    }
                } else {
                    $this->menuayuntamiento();
                }
            }
        }
    }

    public function validabdlogin() {
        //$this->session->sess_destroy();
        $user = $this->input->post('loginuser');
        $pass = $this->input->post('clave');
        $this->load->model('Model_Usuario_C');
        $this->load->model('Model_Usuario_P');
        //Convencion CI --> la primera letra del nombre del modelo siempre va con mayusculas al llamarla
        $query = $this->Model_Usuario_C->obtener_login($user, $pass);
        $query2 = $this->Model_Usuario_P->obtener_login($user, $pass);

        if ($query->num_rows() > 0) {
            $usuarioc = $query->row();
            $datosSession = array('usuario_user' => $usuarioc->name_user,
                'usuario_id' => $usuarioc->id_usr_ciudadano,
                'typ_user' => $usuarioc->typ_user,
                'status' => $usuarioc->status,
                'id_localidad' => $usuarioc->id_localidad,);
            $this->session->set_userdata($datosSession);


            return TRUE;
        } elseif ($query2->num_rows() > 0) {
            $usuariop = $query2->row();
            $datosSession = array('usuario_user' => $usuariop->name_user,
                'usuario_id' => $usuariop->id_admin_public,
                'typ_user' => $usuariop->typ_user,
                'id_localidad' => $usuariop->id_localidad,);
            $this->session->set_userdata($datosSession);

            return TRUE;
        } else {
            $this->session->sess_destroy();
            return FALSE;
        }
    }

    public function cambiopass() {
       if($this->session->userdata('typ_user')!== NULL){
            $data['contenido'] = 'home/cambiopass';
            $data['titulo'] = 'Cambiar Contraseña';
            $this->load->view('templateform', $data);
         }
        else{
            $this->ingreso();  
            
        }
    }

    public function validarcambiopass() {
        //$loguin= $this->input->post('loginuser');
        //$pass= $this->input->post('clave');

        $this->form_validation->set_message('validarcambiodbpass', 'Contraseña actual introducida incorrecta');

        $this->form_validation->set_rules('passact', 'Contraseña Actual', 'required');
        $this->form_validation->set_rules('passnew', 'Contraseña Nuevo', 'required|matches[passrep]');
        $this->form_validation->set_rules('passrep', 'Repita Contraseña', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->cambiopass();
        } else {
            $this->form_validation->set_rules('passact', 'Contraseña Actual', 'callback_validarcambiodbpass');
            if ($this->form_validation->run() == FALSE) {
                $this->cambiopass();
            } else {
                $this->okcambiopass();
            }
        }
    }

    public function okcambiopass() {
      if($this->session->userdata('typ_user')!== NULL){
            $data['contenido'] = 'home/okcambiopass';
            $data['titulo'] = 'Contraseña Cambiada';
            $this->load->view('templateform', $data);
         }
        else{
            $this->ingreso();  
            
        }
    }

    public function validarcambiodbpass() {


        $pass_act = $this->input->post('passact');
        $pass_new = $this->input->post('passnew');

        //con este comando cogemos los datos de sesion onde guardamos el id

        $id = $this->session->userdata('usuario_id');
        $typ_user = $this->session->userdata('typ_user');

        if ($typ_user === '1') {
            $this->load->model('Model_Usuario_C');
            $query = $this->Model_Usuario_C->buscar_por_id($id);
            $usuario = $query->row();
            //si la clave actual es igual a la insertada por ek user llamamos al metodo para actualizar
            if ($usuario->password === $pass_act) {
                $data = array('id_usr_ciudadano' => $id,
                    'password' => $pass_new);
                $this->Model_Usuario_C->actualizar($data);
            }
            //si no coincide el password es que es incorrecto
            else {
                return FALSE;
            }
        } elseif ($typ_user === '2') {
            $this->load->model('Model_Usuario_P');
            $query = $this->Model_Usuario_P->buscar_por_id($id);
            $usuario = $query->row();
            //si la clave actual es igual a la insertada por ek user llamamos al metodo para actualizar
            if ($usuario->password === $pass_act) {
                $data = array('id_admin_public' => $id,
                    'password' => $pass_new);
                $this->Model_Usuario_P->actualizar($data);
            }
            //si no coincide el password es que es incorrecto
            else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

}
