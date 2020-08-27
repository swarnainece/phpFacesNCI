<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_model extends CI_Model {    
    
    
     public function insert_data($data) {
          
            $this->db->insert("webcam" , $data) ;
         
     }
     
      public function get_images() {
          
           $query = $this->db->get("webcam") ;
           
           if ($query->num_rows() > 0)     # check whether the number of rows is greater than 0 
           
           { 
                return  $query->result() ;
                
           } 
     }
     


     
}

?>