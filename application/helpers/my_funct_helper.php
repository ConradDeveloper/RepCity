<?php

defined('BASEPATH') OR exit('No direct script access allowed');



//funcion creada para dar formato a los mensajes de error recividos de la funcion de codeigniter validation_errors()

if (!function_exists('my_validador_errores')) {

    function my_validador_errores($errors) {
        $salida = '';

        if ($errors) {
            $salida = '<div class="alert alert-error">';
            $salida = $salida . '<h5>Mensajes de validación</h5>';
            $salida = $salida . '' . $errors;
            $salida = $salida . '</div>';
        }
        return $salida;
    }

}

//funcion creada para configurar las opciones de la barra superior en funcion de si el user se ha logueado o no
if (!function_exists('my_menu_index')) {

    function my_menu_index() {
        $opciones = '<li>' . anchor('home/index', 'Inicio') . '</li>';
        $opciones = $opciones . '<li>' . anchor('home/reportcityinfo', 'Información') . '</li>';
        $opciones = $opciones . '<li>' . anchor('home/contactar', 'Contactar') . '</li>';

        //get_instance nos permite hacer una instancia del objeto que llama esta funcion y por ello obtener el valor del usuario

        if (get_instance()->session->userdata('typ_user')) {
            $opciones = $opciones . '<li>' . anchor('home/cambiopass', 'Cambiar Password') . '</li>';
            $opciones = $opciones . '<li>' . anchor('home/salir', 'Salir') . '</li>';
        } else {
            $opciones = $opciones . '<li>' . anchor('home/ingreso', 'Entrar') . '</li>';
            $opciones = $opciones . '<li>' . anchor('home/registro','Regístrate') . '</li>';
        }
        return $opciones;
    }
    
//funcion creada para retornar el thumbnails o fotos de los 3 últimos reportes presentados en el indice
    
if (!function_exists('my_rep_index')) {
     function my_rep_index() {

            $this->load->model('Model_Report');
            $thumbnails = '';
            $query = $this->Model_Report->report_index();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    
                    $thumbnails = $thumbnails . '<li class="span4">';
                    $thumbnails = $thumbnails . '<div class="thumbnail">';
                    $thumbnails = $thumbnails . '<img class="img-responsive" src="' . $row->fotografia . '" alt="" > ';
                    $thumbnails = $thumbnails . '<h3>' . $row->titulo . '</h3>';
                    $thumbnails = $thumbnails . '<p>' . $row->descripcion . '</p>';
                    $thumbnails = $thumbnails . '</div>';
                    $thumbnails = $thumbnails . '</li>';
                }
                return $thumbnails;
            }
        }
    }
 
    //funcion creada para listar las ciudades en el select menu del registro usuario_c
    if (!function_exists('my_desp_ciudad')) {
     function my_desp_ciudad() {

            $this->load->model('Model_Localidad');
            $selectmenu = '';
            $query = $this->Model_Localidad->buscar_todo();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $selectmenu = $selectmenu . '<option value="'.$row->id_localidad.'">'.$row->nom_localidad.'</option>';
                }
                return $selectmenu;
                
            }
        }
    }
}
