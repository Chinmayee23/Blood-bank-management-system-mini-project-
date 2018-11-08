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
</head>
<style>
table{
table-hover;
}
</style>
<body>
<div class="conainer-fluid">
<div class="navbar-fixed">


  <nav class="#ed0004" role="navigation">
    <div class="nav-wrapper container">
	
      <a id="logo-container" href="index.html" class="brand-logo">Blood donation system</a>
      <ul class="right  hide-on-med-and-down">
	          <li><a href="index.html">Home</a></li>
		<li><a href="trackblood.php">Track blood</a></li>
    <li><a href="trackreq.php">Track requests </a></li>
			<li><a href="createevent.php">Create event</a></li>

    <li><a href="logout.php">Logout </a></li>
      </ul>

      
    </div>
  </nav>
</div>
  <div class="container">
 <div class="card mb-4 wow fadeIn">
                <!--Card content-->
                <div class="card-body d-flex justify-content-center">
				<h4>Track events</h4>
				</div>
			</div>
				
				<?php
				require 'connect.inc.php';
				session_start();
				$req_id=$_SESSION['id'];
				$query="SELECT * FROM `events` where `did`='$req_id'";
				if($query_run=mysqli_query($connect,$query))
							{
								$rows=mysqli_num_rows($query_run);
								if($rows==0)
								{
									echo 'No events';
								}
								else
								{
									while($row = mysqli_fetch_assoc($query_run)) 
									{
										$location=$row['location'];
										$date=$row['time'];
										$contact=$row['contact'];
										$email=$row['email'];
										$eid=$row['e_id'];
										/*$query1="SELECT * FROM `stakeholders` WHERE `sthid`='$sthid'";
										$query1_run=mysqli_query($connect,$query1);
										$row1 = mysqli_fetch_assoc($query1_run);
										$name=$row1['name'];*/
										echo '<div class="card mb-4 wow fadeIn"><div class="card-body justify-content-center">';
										echo "Location: ".$location."<br>";
										echo "Date and time: ".$date."<br>";
										echo "Contact no.: ".$contact."<br>";
										echo "Email: ".$email."<br>";
										echo '<form  action="hub.php?C=0&ID='.$eid.'" method="post">
										Edit Status:
					
						<input type="submit" name="save" class="btn red btn-block my-4" style="width:20%;" value="Cancel" "/></form>
										</div></div>
										';
									
										
									}
								}
								if(isset($_POST['recieved'])){
									
									
								}
								
							}
				else{echo "query not run";}
				
				/*if ( isset( $_POST['save'] ) ) {
				$update=	$_POST['designation'];
				$query1="UPDATE `requests` SET `status`='$update'  WHERE `reqid`='$reqid' ";
				mysqli_query($connect,$query1);
				}*/
				
				?>
				
				
				
				
			</div>

        
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
