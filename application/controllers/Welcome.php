<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	    public function index() {
	
	            #  $this->load->view('firstsignup');
	            #  $this->load->view('secondsignup');
	            
		           $this->load->view('secondsignup');
	    }
	
	
	public function SignIn()
	
	{
	     
	            #echo  ' Anshu Love U' ;
	           
	            $this->load->model("Welcome_model") ;
	           
	            $this->form_validation->set_rules("email",   "Email" , "required") ;
		        $this->form_validation->set_rules("password",   "Password" , "required") ;
		        
		        if ($this->form_validation->run()) {
		        	
		          $email    = $this->input->post('email')	;
		          $password = $this->input->post('password')	;
		          
		          $user     = $this->Welcome_model->login_checker($email , $password) ; # fetch data from login_checker function
		          
		       /*   echo '<pre>' ;
		          print_r($user) ;
		          echo '</pre>' ;      #print the value ofo $user   */   
		          
		               if (!empty($user)) {
		          	
		          	
		          	           $session_data =  array (
		          	           	                 'ID'  => $user->ID , 
		          	           	                 'name'  => $user->name ,
		          	           	                 'email'  => $user->email ,
		          	           	                 'username'  => $user->username ,
		          	           	                 'mobile'  => $user->mobile
		          	           	                  
		          	           	                ) ;
		          	           	                
		          	           	       $this->session->set_userdata($session_data);  
		          	           	      
		          	           	      #  redirect('My_dashboard') ;  # redirect to My_dashboard controller
		          	           	      
		          	           	        redirect('Image') ;   # redirect to Image controller
		          	           	                
		          	
		                         }
		        }
		        
	            else{
	            	
	            	
	            	 $this->load->view('secondsignup') ;
	            }
	
	}
	
    public function SignUp () 
    
    {    
             # echo  'Supreeti Love U' ;
             
             
             $this->load->model("Welcome_model") ;
             
             $this->load->library('form_validation') ;
             
             $this->form_validation->set_rules("name",       "Name"     , "required") ;
		     $this->form_validation->set_rules("email",      "Email"    , "required") ;
		     $this->form_validation->set_rules("username",   "Username" , "required") ;
		     $this->form_validation->set_rules("password",   "Password" , "required") ;
		     $this->form_validation->set_rules("mobile",     "Mobile"   , "required") ;
		
		if 	($this->form_validation->run()) {
			
			
		      	$data = array(  
 	
							 "name"       =>$this->input->post("name") , 
					  	     "email"      =>$this->input->post("email") ,
							 "username"   =>$this->input->post("username") , 
					  	     "password"   =>$this->input->post("password") ,	
							 "mobile"     =>$this->input->post("password") ,	
				
			             	);
		      
	             
	           $this->Welcome_model->insert_data($data) ;   # calls insert_data func in model
	           unset($data['submit']) ;
	           
	            redirect(base_url().  "Welcome/inserted_registration_data") ;
		}
	
        else {
       	
       		$this->index() ;
       	
            }	
    }
	
	
	
	public function inserted_registration_data() {
										
					$this->index() ;
    }
}
