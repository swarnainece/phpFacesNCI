<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class My_dashboard extends CI_Controller {
    
            	
            	public function index() {
            	
            	  #echo "Anshu Dashboard"      ;
            	  
            	  $this->load->helper('url')   ;
                  $this->load->view("takesnapshot")  ;
                  
                 # redirect(base_url().  "My_dashboard/imageDetection") ;
            	   
                 }
	
	       public function imageDetection() {
            	
            	  $this->load->view("imageDetection")  ;
            	   
                 }

}




?>