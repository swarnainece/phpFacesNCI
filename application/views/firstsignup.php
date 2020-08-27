<!DOCTYPE html>
<html>
<head>
<title>MAin</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>
<body>

<h1>Welcome To DataBase Page</h1>

  <div class = "container">
  <form method = "post" action= "<?php echo base_url() ?>Main/form_validation">
         
            <?php
            if($this->uri->segment(2) == "inserted")
            {
                echo  '<p class="text-success">Data Inserted </p>' ;
            }
            ?>      
         
        
      <div class = "form-group">
        <label>First Name </label>      
           <input type="text" name="first_name" class="form-control" />
         <a class="text-danger" <?php echo form_error('first_name'); ?> </a>
       </div>  
       
       <div class = "form-group">
        <label>Last Name </label>      
           <input type="text" name="last_name" class="form-control" />
          <a class="text-danger" <?php echo form_error('last_name'); ?> </a>
       </div>
         
      <div class = "form-group">
          <input type="submit"  name="insert" value="submit" class="btn btn-info" />
          
      </div>
         
    </form>
  </div>      
      
<ul>
</ul>

</body>
</html>