<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    
	public function index() {
	   
	#  	echo  Anshu <br>" ;
	#  	$this->sup() ;
	  	
	#	$this->load->model('Blog'); # Loading the model
	#	$this->Blog->testModel() ;   # calling the functions of the model
	  
	#  $data["name"] = "Reenu" ;
 	#  $data["surname"]  =  "Sharma" ;

       # $this->load->view('firstsignup', $data ) ;
        
        $this->load->view("firstsignup") ;
     #  $this->load->view("secondsignup") ;
	}
	
	public function form_validation() {
	   
	  #echo  "Anshui " ;
	  
	  $this->load->library('form_validation') ;
	  $this->form_validation->set_rules("first_name" , "First Name" , "required") ;
	  $this->form_validation->set_rules("last_name" , "Last Name" , "required") ;
		
	  if 	($this->form_validation->run()) {
	  	
	  	     $this->load->model("Blog") ;
	  	     $data = array(
	  	     	
	  	     "first_name"  =>$this->input->post("first_name") , 
	  	     "last_name"   =>$this->input->post("last_name") 
	  	     
	  	   	) ;
	  	   
	  	   
	  	   $this->Blog->insert_data($data) ;   # calls insert_data func in model
	  	   
	  	   redirect(base_url().  "Main/inserted") ;
	  	     
	  	     
	  }
	  
	  else {
	  	
	  	$this->index() ;
	  	 
	  }
		
	}
	
	      public function inserted() {
		
		                $this->index() ;
	              }
	
	
	
}