<?php

class connectionClass extends mysqli{
    public $host="localhost",$dbname="loginsystem",$dbpass="",$dbuser="swarnainece";
    public $con;
    
    public function __construct() {
        if($this->connect($this->host, $this->dbuser, $this->dbpass, $this->dbname)){}
        else
        {
            return "<h1>Error while connecting database</h1>";
        }
    }
}

class webcamClass extends connectionClass{
     
    
    //This function will create a new name for every image captured using the current data and time.
    private function getNameWithPath(){
        
        $imageFolder = "webcamImage/" ;
        $name = $imageFolder.date('YmdHis').".jpg";
       # echo $name ;
        return $name;
    }
    
    //function will get the image data and save it to the provided path with the name and save it to the database
    public function showImage(){
        $file = file_put_contents( $this->getNameWithPath(), file_get_contents('php://input') );
        if(!$file){
            return "ERROR: Failed to write data to ".$this->getNameWithPath().", check permissions\n";
        }
        else
        {
            $this->saveImageToDatabase($this->getNameWithPath());         // this line is for saveing image to database
            return $this->getNameWithPath();
        }
        
    }
    
    //function for changing the image to base64
    public function changeImagetoBase64($image){
        $path = $image;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
    
    public function saveImageToDatabase($imageurl){
        $image=$imageurl;
//        $image=  $this->changeImagetoBase64($image);          //if you want to go for base64 encode than enable this line
        if($image){
            $query="Insert into snapshot (Image) values('$image')";
            $result= $this->query($query);
            if($result){
                return "Image saved to database";
            }
            else{
                return "Image not saved to database";
            }
        }
    }
    
    
}




$webcamClass=new webcamClass();   # $webcamClass is an object of  'webcamClass' class
echo $webcamClass->showImage();

?>