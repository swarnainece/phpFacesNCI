<html>
<head>

  <title>Hamming Distance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

   
<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
<link rel="stylesheet" href= "<?php echo base_url(); ?>assets/css/fluid-gallery.css">


</head>  
<body>
       
  <h2>Hamming Distance</h2>
  
  <p class="page-description text-center"></p>
  <div class="tz-gallery">
  <div class="row">
  
  
  
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

 
  </div>
 </div>
</div>


<div style="background-color:black;color:white;padding:20px;">    
  <p>The total time taken is :- <?php  echo  $time ;   ?>  Milli Seconds  
</div>    


<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
  //baguetteBox.run('tz-gallery');
</script>    
    
    
</body>
</html>