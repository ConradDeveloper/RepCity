<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Report extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    
    //me retornara los 3 ultimos reports
    function report_index(){

        $this->db->order_by('id_report', 'DESC');
        $this->db->limit('3');
        $query = $this->db->get('report');
        return $query->result_array();
        
        
        
    }
     function report_index2(){
      $query =$this->db->query("select titulo_rep , descripcion , foto_ruta from report order by id_report DESC limit 1");
      return $query->row();

     }
 }