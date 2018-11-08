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
<body>
<div class="conainer-fluid">
<div class="navbar-fixed">


  <nav class="#ed0004" role="navigation">
    <div class="nav-wrapper container">
	
      <a id="logo-container" href="#" class="brand-logo">Blood donation system</a>
      <ul class="right hide-on-med-and-down">
	          <li><a href="index.html">Home</a></li>

      </ul>

      
    </div>
  </nav>
</div>
  <div class="container">

    <form class="col s12" class="logindon.php" method="post">
	         <div class="row">
			 </div>
			 <div class="row">
			 </div>

  <div class="row">

  
  </div>
     <div class="row">
        <div class="input-field col s6">
          <input id="email" name="email"type="email" class="validate" required>
          <label for="email">Email</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s6">
          <input id="password" name="pwd" type="password" class="validate" required>
          <label for="password">Password</label>
        </div>
      </div>
          
	<div class="row">
            <button class="btn waves-effect waves-light red" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
          
        </div>
    
	
  
  </form>
  <?php
  require 'connect.inc.php';

 
 

					if (isset ($_POST['email'])&&isset($_POST['pwd']))
					{
						echo 'ok';
						$email=$_POST['email'];
						$password=$_POST['pwd'];
						echo $email;
						echo $password;
						if(!empty($email)&&!empty($password))
						{
							$login_query="SELECT * FROM `users` WHERE `useremail`='$email' AND `userpwd`='$password' ";
							
							if($login_query_run=mysqli_query($connect,$login_query))
							{
								$rows=mysqli_num_rows($login_query_run);
								if($rows==0)
								{
									echo '<div class="message">Enter valid username and password combination</div>';
								}
								else if($rows==1)
								{
									
									//$user_id=mysql_result($login_query_run,0,'id');
									while($row = mysqli_fetch_assoc($login_query_run)) 
									{
										$id=$row['user_id'];
										
									   $name=$row['username'];
									   $email=$row['useremail'];
									   $usertype=$row['usertype'];
									   $_SESSION['name']=$name;
									$_SESSION['email']=$email;
									$_SESSION['id']=$id;
									$_SESSION['usertype']=$usertype;

									}
									
									
									
									/*echo 'session set';
									echo $user_id;*/
									//header('Location:loggedin_inc.php');
									if(isset ($_SESSION['name'])&& !empty($_SESSION['name'])&& isset ($_SESSION['email'])&& !empty($_SESSION['email']))
									{
										if($_SESSION['usertype']=="hospital"){
											
											
											header('Location:trackbloodh.php');}
										
										else if($_SESSION['usertype']=="donation camp"){
											
											
										header('Location:createevent.php');	
					
										}
										else if($_SESSION['usertype']=="donor"){
											echo"hi";
											$email=$_SESSION['email'];
											$login2_query="SELECT * FROM `donors` WHERE `useremail`='$email'  ";
						if($login2_query_run=mysqli_query($connect,$login2_query))
							{
								while($row1 = mysqli_fetch_assoc($login2_query_run)) {
						$bg=$row1['dbgroup'];
					$_SESSION['blood_group']=$bg;}}
					//echo "".$_SESSION['blood_group']."";
										header('Location:trackreqd.php');	
										}
										
										
									}
									else
									{
										echo 'Not logged in';
									}
								}
							}
							else
							{
									echo 'query not run';
							}
							
							
						}
						else
						{
							echo '<div class="message">Enter username and password </div><br>';
						}
					}else{echo 'no';}
					
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
