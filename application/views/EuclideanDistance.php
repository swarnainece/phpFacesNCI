<html>
<head>

  <title>EuclideanDistance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>  
<body>
       
  <h2>Euclidean Distance</h2>
  
    <?  #php  echo  count($ImageArrays) ; ?> <!-- count of some num proves that the image array has been passed-->
    
<?php   if(count($percentages) > 0):  ?>   
  <?php   for ( $icount = 0 ;  $icount < count($percentages) ; $icount++ ):  ?> 
  
  <div class="container">
                 
        <?php  echo $percentages[$icount] ; ?> 
        <img src= "<?php echo base_url("ResizedImage")."/".$ImageArrays[$icount];?>"  class="img-rounded" alt="" > 
        
    <div class="progress">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow= <?php echo $percentages[$icount] ; ?> aria-valuemin="0" aria-valuemax="100" style= "width:<?php echo $percentages[$icount] ; ?>%">
      <?php  echo $percentages[$icount] ; ?>
    </div>
  </div>
  
              
 </div> 
            
             
  <?php endfor;  ?>
<?php  endif;  ?>  
    
<div style="background-color:black;color:white;padding:20px;">    
  <p>The total time taken is :- <?php  echo  $time ;   ?>  Milli Seconds  
</div>  


  
       
</body>
</html>