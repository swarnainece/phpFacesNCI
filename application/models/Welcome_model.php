<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {
    
     public function login_checker($email , $password )
        {
               
               #echo " luv u anshu " ;
               
               $query = $this->db->where(['email'=>$email ,'password' => $password ])->get(['users']) ;
               
               if ($query->num_rows() > 0) {
                    
                  return $query->row() ;
                  
               }
               
        }
        

        
     public function insert_data($data) {
          
            $this->db->insert("users" , $data) ;
     }  
}