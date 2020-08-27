<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Webcam extends CI_Controller {
	


	public function index() {
	   
	   $this->load->helper('directory');               #Loading directory helper 
	   $this->load->helper('file') ;                   # Loading the file hepler
	   
       #$string = read_file("xml/haarcascade_frontalface_default.xml");      # reading a file from a certain directory
       #echo  $string ;
       
      
       $fileDetection  = "xml/detection.dat" ;   #folder path of the image
      # $fileImage     = "assets/image/input_Images/lenna.jpg" ;                    # folder path of the Leena image 
      # $fileImage     =  "assets/image/input_Images/20171016215037.jpg";           # folder path of the test image
        
        
       $dir   = 'webcamRequirements/webcamImage';       # Getting the file name at 'webcamRequirements/webcamImage'  
       $array = scandir($dir) ;                         # Fetches an array of elements in the array variable 
       $nameOfFile  = trim($array[2])  ;                # fetched the 3rd element which is is the pic name 
       
        
       $fileImage = $dir."/".$nameOfFile ;                  # concatenating the total path
       $fileImage = trim($fileImage) ;
       
       #echo $fileImage ; 
       
      # $fileImage  =  "webcamRequirements/webcamImage/20171016233218.jpg";
        
       # $this->load->model('Webcam_model');
       # $this->Webcam_model->face_detect($file) ;   # calls "face_detect" function in model  "Webcam_model"
        
       # $data["name"] =  $file ;  # passing the image folder path to the views
       #$this->load->view( 'webcam_message' , $data  ) ; # passing the image folder path to the views
            
       #$this->face_detect($file) ;  # call  face_detect function written bellow
       
     #  
       
        $this->load->library('facedetector') ;  # Loading the the custom library named 'facedetctor'
        
        $detector  = new FaceDetector('xml/detection.dat');
        $detector ->faceDetect($fileImage);
        $detector ->cropFaceToJpeg('assets/image/output_Images/OutputImage.jpg') ;  # set the image to the declared path
      
        $file =  $fileImage  ;
      
        if (!unlink($file))
       
           {
              echo ("Error deleting $file");
           }
     
        else
        
        {
           echo ("Deleted $file");
         }
      
  
      #$this->load->helper('html');
      #$this->load->view('swarna.html') ;        # displaying html 
      
      #$python = exec("python python/mypython.py");   # DEALING  with python scripts
      #echo $python;
      
      #$mystring = system("python python/mypython.py", $retval);  
      #echo $mystring ;
  
      
	}
}	


?>	