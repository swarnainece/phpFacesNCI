<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GD_ImageProcessing extends CI_Controller {
    
	 public function imageResizing() {    
	              
                 
                 
 #******************************************Procure the height, width of the main image**************************************************************
 
                      
      list($out_width, $out_height, $out_type, $out_attr) = getimagesize("assets/image/output_Images/OutputImage.jpg");
                      
          #      echo      "$out_width   <br>"    ;
          #      echo      "$out_height  <br> "   ;   
    
               $out_width  = (int)$out_width  ;          
               $out_height = (int)$out_height ;  
               
               #echo  $out_width ;
 
 #*************************************Image Resizing Technique and storing it in a folder*************************************************************
 
               $dir   = 'PostFaceDetectionRepository'; 
               $array = array_slice(scandir($dir) , 2 ) ;  # array_slice discards the '.' and '..'
            #  print_r($array) ;
                 
               foreach ($array as $filename) 
   
               {
                     
                  $filename = trim($filename) ;
              #   echo " $filename <br> "  ;
                     
                  $filepath = 'PostFaceDetectionRepository/' .   $filename ;
                     
                  list($width, $height, $type, $attr) = getimagesize($filepath); # returns a array containes the elements
                                                                                    # height , width , type , attr of image 
                   
                  $width  = (int)$width  ;
                  $height = (int)$height ;                                                                   
                                                                                    
                  if   ($width >= $out_width)                                                                
                                               
                        {
                     
                             $percent   =  ($out_width) / ($width) ;
                             $percent   =  (float)$percent    ;
                             $newwidth  =  $width * $percent  ;
                             $newheight =  $newwidth          ;        
                  
                      #      echo  "New width of  $filepath is :- $newwidth <br>";
                      #      echo  "New height of $filepath is :-  $newheight <br>";
                  
                          }
                          
                  else  
                  
                  {
                        $percent   =  ($out_width) / ($width) ;
                        $percent   =  (float)$percent         ;
                        $newwidth  =  $width * $percent       ;
                        $newheight =  $newwidth               ; 
                        
                #       echo  "New width of  $filepath is :-  $newwidth <br>";
                #       echo  "New height of $filepath is :-  $newheight <br>";
                  }            
                                               
                      $thumb = imagecreatetruecolor($newwidth, $newheight);
                      $source = imagecreatefromjpeg($filepath);
                
                     imagecopyresized($thumb, $source, 0, 0, 0, 0, 240 , 240  , $width, $height); 
                
                    // Output the image
                    imagejpeg($thumb , 'ResizedImage/'. $filename );    

                 }  
      
              }
              
              
                public function hammingdistance() {  
                    
                     $this->load->library('Hammingdistance')  ;
                     
           #    **********  Calculating the time difference************************************
           
                $currentTime = microtime(true);
           
           #    *****************************************************************************
                     
  
                     $dir   = 'ResizedImage'; 
                     $array = array_slice(scandir($dir) , 2 ) ;  # array_slice discards the '.' and '..'
                     
                     $arrayPercentage = array(); # decl an array to store all the percentage values that we will calculate
                     
                      
                      foreach ($array as $filename) 
   
                        {
                           $filename = trim($filename) ;
                           #   echo " $filename <br> "  ;
                     
                           $filepath = 'ResizedImage/' .   $filename ;
                           #echo "$filepath <br>" ;
     
                           $class = new Hammingdistance      ;
                           $hammingdist =  $class->compare('assets/image/output_Images/OutputImage.jpg', $filepath)  ;
                           $hammingdist = floatval($hammingdist) ; # convertimg to float 
                           #echo  "$hammingdist <br>" ;   
                           
                           if ($hammingdist <  5)
                           {
                               $percentageOfDisimilarity = ($hammingdist /10) *100  ;
                           }
                           
                           elseif ( $hammingdist >= 5  &&  $hammingdist < 10  ) {
                               
                               $percentageOfDisimilarity = ($hammingdist /10) *100  ;
                           }
                           
                           else {
                               
                              $percentageOfDisimilarity =  100;
                               
                           }
                           
                           $arrayPercentage[] = $percentageOfDisimilarity ; 
  
                           #echo count($percentageOfDisimilarity)  ;
                        }  
                        #echo count($arrayPercentage)  ;
                        $data['percentages'] = $arrayPercentage ;  # passing the array of percentages onto the view 
                        $data['ImageArrays'] = $array  ;  # passing the array of image names onto the view
                        
                       # ******************Computing the Time***********************                 
                        
                         $timediff= round(microtime(true) - $currentTime,3)*1000; 
                           
                       # ************************End***********************     
                        $data['time'] = $timediff  ; 
                        $this->load->view('HammingDistance' , $data ) ;
                 }
                
                
                public function EuclideanDistance() {  

 
                    $this->load->library('EuclideanDistance')  ;
                    
          #    **********  Calculating the time difference************************************
                      $currentTime = microtime(true);
          #    *****************************************************************************
                    
                    
                    
                    $dir   = 'ResizedImage';
                    $array = array_slice(scandir($dir) , 2 ) ;  # array_slice discards the '.' and '..'
                    
                    $array1 = array(); # decl an array to store all the percentage values that we will calculate
                
                     foreach ($array as $filename) 
   
                        {
                           $filename = trim($filename) ;
                           #echo " $filename <br> "  ;
                     
                           $filepath = 'ResizedImage/' .   $filename ;
                           $filepath = trim($filepath) ;
                        #  echo "$filepath <br>" ;
                    
                           $image1 = new Image('assets/image/output_Images/OutputImage.jpg');
                           $image2 = new Image($filepath);
                           
                           $difference = $image1->difference($image2, new EuclideanDistance());
                           $percentage = $difference->percentage();
                          
                       #   echo  $filepath."$percentage <br>" ;
                           
                           $array1[] = $percentage ; #storing all the percent values generated in each loop
                        }    

                        #print_r($array1) ;
                        
                    # ******************Computing the Time***********************                 
                        
                         $timediff= round(microtime(true) - $currentTime,3)*1000; 
                           
                    # ************************End***********************     
                        $data['time'] = $timediff  ;    
                        
                        
                        $data['percentages'] = $array1 ;  # passing the array of percentages onto the view 
                        $data['ImageArrays'] = $array  ;  # passing the array of image names onto the view
                        
                        $this->load->view('EuclideanDistance' , $data ) ;  
                        
                }
                
                
            public function BitCountMethod() {  

 
                    $this->load->library('BitCountMethod')  ;
                    
          #    **********  Calculating the time difference************************************
                      $currentTime = microtime(true);
          #    *****************************************************************************
                        
                    
                    
                    $dir   = 'ResizedImage';
                    $array = array_slice(scandir($dir) , 2 ) ;  # array_slice discards the '.' and '..'
                    
                    $array1 = array(); # decl an array to store all the percentage values that we will calculate.
                    
                    # print_r($array) ;
                    
                    foreach ($array as $filename) 
   
                    {
                        $filename = trim($filename) ;
                        #echo " $filename <br> "  ;
                     
                        $filepath = 'ResizedImage/' .   $filename ;
                        $filepath = trim($filepath) ;

                        $phasher = new BitCountMethod() ;
                        $phash1 = $phasher->getHash('assets/image/output_Images/OutputImage.jpg', false) ;
                        $phash2 = $phasher->getHash($filepath , false) ;
                        
                        
                        //using BIT COUNT METHOD FOR DIS-SIMILARITY
                        $dissimilarityPercent = $phasher->getSimilarity($phash1 , $phash2 , 'BITS');
                        
                        #echo  $dissimilarityPercent . "<br>" ;
                        
                         $array1[] = $dissimilarityPercent ;  #storing all the percent values generated in each loop
                    }   
                    
                    
                # ******************Computing the Time***********************                 
                        
                         $timediff= round(microtime(true) - $currentTime,3)*1000; 
                           
                # ************************End***********************     
                        $data['time'] = $timediff  ;    
                    
                    
                        $data['percentages'] = $array1 ;  # passing the array of percentages onto the view 
                        $data['ImageArrays'] = $array  ;  # passing the array of image names onto the view
                        
                        $this->load->view('BitCountMethod' , $data ) ;
                    
            }

    }    
         
?>         