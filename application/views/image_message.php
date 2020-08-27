<!DOCTYPE html>
<html>
<head>

  <title>Upload Image</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  

</head>



<body>



<h1>Welcome To Image Upload Page</h1>


<div class="container">
   
    <div class="btn-group btn-group-justified">
        
        
        <?php
           
            if($this->uri->segment(2) == "Publish")
            {
                echo  '<p class="text-success"> Public Published </p>' ;
           
            }
        ?> 
        


<!--Below is the script to Upload Faces in the  database -->

<?php echo form_open_multipart('Image/uploadPic') ;                                  ?> 
        <?php echo form_upload(['name'=>'userfile' , 'value'=>'Save']) ;             ?>
        
        <button id="submit-buttons" type="submit" button type="button" class="btn btn-warning btn-lg">Publish Image</button>
        
     <!--   <? #php echo form_submit(['name'=>'submit' , 'value'=>'Publish Image']) ; ?> -->
        
        <?php # echo anchor( "Image/viewImages" , 'View Pre_Detected Images Present in the Database') ;                      ?>  
        
<?php echo form_close() ; ?>


     <form method="" action="<?php  echo base_url(); ?>Image/viewImages">
       <button id="submit-buttons" type="submit" button type="button" class="btn btn-primary btn-lg">View Pre-Detected Images Present in the Database</button>
     </form>
     
     
     <form method="" action="<?php  echo base_url(); ?>Image/viewDetectedImages">
          <button id="submit-buttons" type="submit" button type="button" class="btn btn-success btn-lg">View Post-Detected Images</button>
     </form>
     
<!--Navigate to 'GD_ImageProcessing' controller and then 'imageProcessing'  Function   -->     
     <form method="" action="<?php  echo base_url(); ?>GD_ImageProcessing/imageResizing">
          <button id="submit-buttons" type="submit" button type="button" class="btn btn-danger navbar-btn btn-lg">ImageProcessing</button>
     </form>    

<!--Navigate to 'My_dashboard' controller and then 'index' Function   -->
     <form method="" action="<?php  echo base_url(); ?>Image/takesnapshot">
        <button id="submit-buttons" type="submit" button type="button" class="btn btn-info btn-lg"><span class="btn-label"><i class="glyphicon glyphicon-camera"></i></span>Take Your Selfie</button>
     </form>  
     
     
     
<!--Navigate to 'My_dashboard' controller and then 'index' Function   -->
     <form method="" action="<?php  echo base_url(); ?>GD_ImageProcessing/hammingdistance">
          <button id="submit-buttons" type="submit" button type="button" class="btn btn-info btn-lg">HammingDistance</button>
     </form>     
     



<!--Navigate to 'My_dashboard' controller and then 'index' Function   -->
     <form method="" action="<?php  echo base_url(); ?>GD_ImageProcessing/EuclideanDistance">
          <button id="submit-buttons" type="submit" button type="button" class="btn btn-info btn-lg">EuclideanDistance</button>
     </form>  


    <form method="" action="<?php  echo base_url(); ?>GD_ImageProcessing/BitCountMethod">
          <button id="submit-buttons" type="submit" button type="button" class="btn btn-info btn-lg">BitCountMethod</button>
     </form>
     
 

    </div>
 </div>



</body>
</html>


















