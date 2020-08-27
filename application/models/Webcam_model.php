<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webcam_model extends CI_Model {
    
     public function face_detect($file) {
         
         
               if (!is_file($file)) {
                     throw new Exception("Can not load $file") ;
               }
  
     echo "Success" ;
    
     }   
	
}

?>