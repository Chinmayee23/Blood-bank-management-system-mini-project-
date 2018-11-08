<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blood donation system</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link href="https://mdbootstrap.com/javascript/alerts/" rel="stylesheet">


  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style>
  /* Required for full background image */

html,
body,
header,
.jarallax {
  height: 100%;
}

@media (max-width: 740px) {
  html,
  body,
  header,
  .jarallax {
    height: 100vh;
  }
}

.top-nav-collapse {
  background-color: #82b1ff !important;
  text-color:red;

}

.navbar:not(.top-nav-collapse) {
  background: transparent !important;
  text-color:red;

}

@media (max-width: 991px) {
  .navbar:not(.top-nav-collapse) {
    background: #b21c1c !important;
  }
}

h5 {
  letter-spacing: 3px;
}
navbar-light{
text-color:red;
}

  </style>
</head>
<body>
<div class="conainer-fluid">
<div class="navbar-fixed">


  <nav class="#ed0004" role="navigation">
    <div class="nav-wrapper container">
	
      <a id="logo-container" href="index.html" class="brand-logo">Blood donation system</a>
      <ul class="right  hide-on-med-and-down">
	          <li><a href="index.html">Home</a></li>
			<li><a href="logindon.php">Login</a></li>
      </ul>

      
    </div>
  </nav>
</div>
  <div class="container">

    <form class="col s12" action="regdonor.php" method="post">
	<br/>
	<br/>
	<?php
require 'connect.inc.php';
	
echo'regdonor';
if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['phone'])&&isset($_POST['address'])&&isset($_POST['pwd']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$pwd=$_POST['pwd'];
	if(!empty($name)&&!empty($email)&&!empty($phone))
	{	
			$email_query="SELECT `useremail` FROM `users` WHERE `useremail`='$email'";
			$emailindb=NULL;
			if($email_query_run=mysqli_query($connect,$email_query))
			{
				while($row = mysqli_fetch_assoc($email_query_run)) 
							{
							   $emailindb=$row['useremail'];
							   
							   
							}
				
					if($email==$emailindb)
				{
				?><div class="alert alert-warning" role="alert">
					Email has already been registered.
					</div><?php				}else{
					$signup_query = "INSERT INTO `users` (`username`,`useremail`,`userphone`,`useraddress`,`userpwd`,`usertype`) VALUES ('$name','$email','$phone','$address','$pwd','donor')";
					if(!mysqli_query($connect,$signup_query))
					{
						//echo 'not inserted';
						?>
					<div class="alert alert-warning" role="alert">
							There was a problem with registration.</div><?php
					}
					else
					{
						?>
					<div class="alert alert-warning" role="alert">
							There was a problem with registration.</div><?php
					
					header('Location:logindon.php');
				
				}
			}}
			else
			{
				//echo 'query not run';
				?><div class="alert alert-warning" role="alert">
There was a problem with registration.</div><?php
			}
		
		
		
	}
	else
	{
?><div class="alert alert-warning" role="alert">
Fill all fields.</div><?php	}
	
}
else
{
	//echo 'no';
}
	
//header("refresh:0;url=signuptemp.php");	


?>
	         <div class="row">
			 </div>
			 <div class="row">
			 </div>
		<div class="row">
        <div class="input-field col s6">
          <input id="name" name="name" type="text" class="validate" required>
          <label for="name">Name</label>
        </div>
		</div>

     <div class="row">
        <div class="input-field col s6">
          <input id="email" type="email" name="email" class="validate" required >
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="phone" type="number" name="phone"class="validate" required >
          <label for="phone">Phone</label>
        </div>
      </div>
	  <div class="row">
        <div class="input-field col s6">
          <textarea id="address" name="address"class="materialize-textarea" required></textarea>
          <label for="address">Address</label>
        </div>
		</div>
			 
      <div class="row">
        <div class="input-field col s6">
          <input id="password" type="password" class="validate" name="pwd"required  >
          <label for="password">Password</label>
        </div>
      </div>
            
		<div class="row">
<div class="wow fadeInDown" data-wow-delay="0.3s">
<input type="submit" class="btn red btn-block my-4" value="Sign Up"/>              
            </div>   
          
        </div>
		  </form>


		</div>
    
	
  
  
</div>




  <!--  Scripts-->
  <script src="https://www.gstatic.com/firebasejs/5.2.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBZcK1ZPAJ_V1OKu8WSUBnU3QOsO3h6Eps",
    authDomain: "blood-donation-44a3e.firebaseapp.com",
    databaseURL: "https://blood-donation-44a3e.firebaseio.com",
    projectId: "blood-donation-44a3e",
    storageBucket: "",
    messagingSenderId: "661459326816"
  };
  firebase.initializeApp(config);
</script>

    <!-- update the version number as needed -->
    <script defer src="/__/firebase/5.2.0/firebase-app.js"></script>
    <!-- include only the Firebase features as you need -->
    <script defer src="/__/firebase/5.2.0/firebase-auth.js"></script>
    <script defer src="/__/firebase/5.2.0/firebase-database.js"></script>
    <script defer src="/__/firebase/5.2.0/firebase-messaging.js"></script>
    <script defer src="/__/firebase/5.2.0/firebase-storage.js"></script>
    <!-- initialize the SDK after all desired features are loaded -->
    <script defer src="/__/firebase/init.js"></script>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
