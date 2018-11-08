<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blood donation system</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="right collapse navbar-collapse text-danger" id="navbarSupportedContent-7">
      <ul class="right  hide-on-med-and-down">
	          <li class="nav-item active"><a href="index.html">Home</a></li>
			 	          <li class="nav-item "><a href="trackreqd.php">Track requests</a></li>

						  	          <li class="nav-item "><a href="trackeventsd.php">Track events</a></li>
						  	          <li class="nav-item "><a href="logout.php">Logout</a></li>


      </ul>

      </div>
    </div>
  </nav>
</div>
  <div class="container">

    <form class="col s12" method="post" action="donorinfo.php">
	<br/>
	<br/>
	<?php
require 'connect.inc.php';
	session_start();
	

if(isset($_POST['age'])&&isset($_SESSION['email'])&&isset($_POST['bg'])&&isset($_POST['lastdonated']))
{
					$email=$_SESSION['email'];
	$age=$_POST['age'];
	$disease=$_POST['disease'];
	$bgroup=$_POST['bg'];
	$ldon=$_POST['lastdonated'];
	
	
			
				
					$signup_query = "INSERT INTO donors (`useremail`,`age`,`disease`,`dbgroup`,`dlastdonated`) VALUES ('$email','$age','$disease','$bgroup','$ldon')";
					if(!mysqli_query($connect,$signup_query))
					{
						echo 'There was a problem. Please try again.';
					}
					else
					{
					echo 'Your information has been updated!';
					$login2_query="SELECT * FROM `donors` WHERE `useremail`='$email'  ";
						if($login2_query_run=mysqli_query($connect,$login2_query))
							{
								while($row1 = mysqli_fetch_assoc($login2_query_run)) {
						$bg=$row1['dbgroup'];
						$_SESSION['blood_group']=$bg;
					
					
				}
							}
}}
else
{
	//echo 'There was a problem. Please try again.';
}
	
//header("refresh:0;url=signuptemp.php");	


?>
	         <div class="row">
			 </div>
			 <div class="row">
			 </div>
		<div class="row">
		<p>Donor details:</p>
        <div class="input-field col s6">
          <input id="name" name="age" type="number" class="validate" required>
          <label for="name">Age</label>
        </div>
		</div>

     <div class="row">
        <div class="input-field col s6">
          <input id="email" type="text" name="disease" class="validate"  >
          <label for="email">Disease(if any)</label>
        </div>
      </div>
     
			  <div class="row">

		 <div class="input-field col s6">
    <select name="bg" required>
      <option value="" disabled selected>Blood type</option>
      <option value="O+ve">O+ve</option>
      <option value="O-ve">O-ve</option>
      <option value="A+ve">A+ve</option>
	  <option value="A-ve">A-ve</option>
	  <option value="B+ve">B+ve</option>
	  <option value="B-ve">B-ve</option>
	  <option value="AB+ve">AB+ve</option>
	  <option value="AB-ve">AB-ve</option>
    </select>
    <label>Blood type</label>
  </div>
  </div>
  <div class="row">
        <div class="input-field col s6">
           <input type="text" class="datepicker" name="lastdonated">
          <label for="lastdonated">Last donated on:</label>
        </div>
  </div>
      
            
		<div class="row">
<div class="wow fadeInDown" data-wow-delay="0.3s">
<input type="submit" class="btn red btn-block my-4" value="Submit"/>              
              
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
