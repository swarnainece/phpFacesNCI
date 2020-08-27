<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {
    
	       public function index() {
	   
	 	         #echo  "Anshu Image" ;

                 $this->load->view("image_message")  ;
    
            }
  
  
# 'uploadPic' helps in uploading the picture and store it in a particular directory with reference to the root directory
  	  
  	     public function uploadPic() {
	   
        	 	    $config['upload_path']      = 'UploadImageRepository/';
                    $config['allowed_types']    = 'gif|jpg|png'; 
                    
                    $this->load->library('upload', $config);
                    $this->form_validation->set_error_delimiters();
                    
            
            if ($this->upload->do_upload()) {
                
                $data = $this->input->post()  ;
                $info = $this->upload->data() ;
                $image_path = base_url("UploadImageRepository/" . $info['raw_name'] . $info['file_ext']) ;
                $file_path  = "UploadImageRepository/" . $info['file_name'] ;   #input file path
                $file_path  = trim($file_path) ; 
                
                $data['Image'] = $image_path ;    # 'Image' is a field in the database, 
                
                
            /*  echo '<pre>'    ;
                   print_r($info)  ;
                 #  print_r($image_path)  ;
                   print_r($file_path)  ;
                echo '</pre>'   ;    */   


                 unset($data['submit']) ;
 
                 $this->load->model("Image_model") ;       # loading the  'Image_model' model
                 $this->Image_model->insert_data($data) ;  # Calling the insert_data function 
                
          }

# Below is the  '$outputFilePath' output folder which stores the cropped picture jpeg files post detection

                  $outputFilePath = 'PostFaceDetectionRepository/' . $info['file_name'] ; # output folder and file
                
                  $this->load->helper('directory');  #Loading directory helper 
	              $this->load->helper('file') ;      # Loading the file hepler
          
                  $this->load->library('facedetector') ;  # Loading the the custom library named 'facedetctor'
   
   
# Below are the three functions which detect face in the loaded image

                  $detector  = new FaceDetector('xml/detection.dat');  #folder path of the detection.dat file
                  $detector ->faceDetect($file_path);                  #Calling the face detection algorithm
                  $detector ->cropFaceToJpeg($outputFilePath) ;        #set the image in jpg to the declared output path
                  
                  redirect(base_url(). "Image/Publish") ;
        }
  
        
         public function Publish()             # func will be called after the publish button has been pressed
         
         {   
             
               $this->load->view("image_message")  ;
             
         }
  
  
 	      public function viewImages() {
	   
                $this->load->model("Image_model") ;                 # loading the  'Image_model' model
                
                $image = $this->Image_model->get_images() ;         # Calling the get_images function
                # print_r($images) ;
               
                $this->load->view('view_database_images' , ['images'=> $image]) ;
               
         }
         
         public function viewDetectedImages() {
              
              $this->load->helper('directory'); 
              $this->load->helper('file') ; 
              
              $dirname = "PostFaceDetectionRepository/" ;  # Folder containing the detected images 
              $map =   directory_map($dirname);    # This function reads the directory path specified in the 
                                                   # first parameter and builds an array representation of it 
                                                   # and all its contained files.
               /*  foreach ($map as $k)
                      {
                     
                        {?>
                            <img src="<?php echo base_url($dirname)."/".$k;?>" alt=""> 
                        <?php }     
                                     }  */
                                                  
                 $this->load->view('view_detected_image' , ['map'=> $map] ) ; # passing the array into the view in the form of array
         }



# 'takesnapshot' function redirects the url to 'My_dashboard' controller and by default the 'index; function is called and
# 'takesnapshot' view is loaded.
         	
         	 public function takesnapshot() {
	   
	 	            redirect('My_dashboard') ;
            }
         
  }

?>