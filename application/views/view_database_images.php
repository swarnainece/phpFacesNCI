<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Freebie: 4 Bootstrap Gallery Templates</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href= "<?php echo base_url(); ?>assets/css/fluid-gallery.css">

</head>  

<body>
<div class="container gallery-container">

    <h1> Pre-Detected Images in Database </h1>

    <p class="page-description text-center">Images those are stored in the database</p>
    <div class="tz-gallery">
        <div class="row">

                    <?php   if(count($images) > 0):  ?> 
                        <?php   foreach($images as $img):    ?> 
                    
                                <div class="col-sm-12 col-md-4">
                                   <a class = "lightbox" href = "<?php echo $img->Image ; ?> ">
                                      <img src= <?php echo $img->Image ; ?>   class="img-rounded" > <!-- Display images in the array , so $img->Image is important-->
                                    </a>
                                </div>    
                        
                        <?php endforeach;?>
                     <?php endif;  ?> 
      

                </div>
            </div>
        </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
  //baguetteBox.run('tz-gallery');
  
  
</script>
</body>
</html>






