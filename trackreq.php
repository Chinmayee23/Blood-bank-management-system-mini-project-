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
	  <li><a href="trackevents.php">Track events </a></li>
	    <li><a href="trackreq.php">Track requests </a></li>
<li><a href="trackblood.php">Track blood </a></li>
    <li><a href="createevent.php">Create events </a></li>
    <li><a href="logout.php">Logout </a></li>      </ul>
      </ul>

      
    </div>
  </nav>
</div>
  <div class="container">
  				<h4>Track requests</h4>

 <?php
				require 'connect.inc.php';
				session_start();
				$req_id=$_SESSION['id'];
				$query="SELECT * FROM `requests` where `blrequired`>0";
				if($query_run=mysqli_query($connect,$query))
							{
								$rows=mysqli_num_rows($query_run);
								if($rows==0)
								{
									echo 'No requests';
								}
								else
								{
									while($row = mysqli_fetch_assoc($query_run)) 
									{
										$blgroup=$row['blood_group'];
										$blavailable=$row['blavailable'];
										$blreq=$row['blrequired'];
										$hid=$row['hid'];
										$rid=$row['reqid'];
										$query1="SELECT * FROM `users` WHERE `user_id`='$hid'";
										$query1_run=mysqli_query($connect,$query1);
										$row1 = mysqli_fetch_assoc($query1_run);
										$name=$row1['username'];
										$contact=$row1['userphone'];
										$email=$row1['useremail'];
										$address=$row1['useraddress'];
										echo '<div class="card mb-4 wow fadeIn"><div class="card-body justify-content-center">';
										echo "Blood group: ".$blgroup."<br>";
										echo "Amount of blood available: ".$blavailable."<br>";
										echo "Amount of blood required: ".$blreq."<br>";
										echo "Hospital name: ".$name."<br>";
										echo "Email: ".$email."<br>";
										echo "Contact no.: ".$contact."<br>";
										echo "Address: ".$address."<br>";
										echo '<form  action="hub.php?C=2&ID='.$rid.'&bg='.$blgroup.'" method="post">
										Add amount of blood you can provide(in ml):
					              <input id="email" name="add"type="number" class="validate" required>

						<input type="submit" name="save" class="btn red btn-block my-4" style="width:20%;" value="Accept request" "/></form>
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
