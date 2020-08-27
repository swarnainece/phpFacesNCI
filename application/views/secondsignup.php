<html>
    <head>
       <meta http-equiv="Content-Type" content="text/html ; charset=UTF-8">
	   
	   <title> </title>
	   <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/style.css">
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	   
	   <style type = "text/css">
         body {
                 background-image: url("<?php echo base_url();?>assets/image/BG1.PNG")  !important ;
              }
       </style>
	   
	   
    </head>
    <body>
       
	   <header>
	        <nav>
			 
			 <div class = "main-wrapper">
			    <ul>
				    
					<li><a href= "<?php echo base_url('Main');?> ">Home</a></li>  <!-- Redirect to Main Page -->
					
				</ul>
			   
			     <div class = "nav-login">     
				 
				 
				    <?php echo form_open('Welcome/SignIn'); ?>	
				    	
					    <?php echo form_input(["name"=>"email" ,"placeholder"=>"email" , "class"=>"text"]); ?>
					    <?php echo form_password(["name"=>"password" ,"placeholder"=>"password" , "class" => "text"]); ?>
<!--#this line is commented <? #php echo form_submit(["name"=>"submit" ,"value"=>"Login" , "class" => "button"]); ?> this line is commented-->
					    <button type = "submit"   name = "submit"> Login </button>
				    <?php echo form_close(); ?>
				    
					<a href = "signup.php">Sign Up </a>
				 
				 </div>
			 
			 </div>			 						
			</nav>	   	   
	   </header>
	   
	  <section class = "main-container">
	
	   <div class = "main-wrapper">
	   	
	           <h2>Sign Up</h2>
	           
	         <form class = "signup-form" method = "post"  action= "<?php echo base_url() ?>Welcome/SignUp" >
	         	
	         	<?php
                     if($this->uri->segment(2) == "inserted_registration_data")
                     {
                         echo  '<p class="text-success">Registered Successfully</p>' ;
                     }
                 ?>     
	         	
	         	
	         	
	         	<div class = "form-group">
				        <label style="color:PaleGreen ;">Name</label>      
				           <input type="text" name="name" class="form-control" />
				         <span class="text-danger" <?php echo form_error('name'); ?> </span>
				</div> 
				
				<div class = "form-group">
				        <label style="color:PaleGreen ;">Email</label>      
				           <input type="text" name="email" class="form-control" />
				         <span class="text-danger" <?php echo form_error('email'); ?> </span>
				</div>
					
			    <div class = "form-group">
				       <label style="color:PaleGreen ;">User Name</label>      
				           <input type="text" name="username" class="form-control" />
				         <span class="text-danger" <?php echo form_error('username'); ?> </span>
				</div>
				
			    <div class = "form-group">
				        <label style="color:PaleGreen ;">Password</label>      
				           <input type="password" name="password" class="form-control" />
				           <span class="text-danger" <?php echo form_error('password'); ?> </span>
				</div>
				
				<div class = "form-group">
				        <label style="color:PaleGreen ;">Mobile</label>      
				        <input type="text" name="mobile" class="form-control" />
				        <span class="text-danger" <?php echo form_error('password'); ?> </span>
				</div> 
			
			     <div class = "form-group">
			     	 
				         <input type="submit"  name="submit" value="Sign Up" class= "btn btn-info" />
				  </div> 
				  
				  
				  
			 <!--  <input type = "text" name= "first" placeholder = "Firstname">
	    
			       <input type = "text" name= "last" placeholder = "Lastname">
				   <input type = "text" name= "email" placeholder = "E-mail">
				   <input type = "text" name= "uid" placeholder = "Username">
				   <input type = "password" name= "pwd" placeholder = "Password">
				      -->
				   
			   </form>

	   </div>
	
    </section>	
	   	 	
    </body>
</html> 