<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Model {
    
     public function testModel()
        {
               echo " luv u  shu " ;
        }
     
     
     public function insert_data($data) {
          
            $this->db->insert("name" , $data) ;
          
          
     }

	
	
	
}

?>