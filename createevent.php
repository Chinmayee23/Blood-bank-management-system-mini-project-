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
  
      <a id="logo-container" href="index.html" class="brand-logo">Blood donation system</a>
      <ul class="right  hide-on-med-and-down">
            <li><a href="index.html">Home</a></li>
    <li><a href="trackevents.php">Track events </a></li>
    <li><a href="trackblood.php">Track blood </a></li>
    <li><a href="trackreq.php">Track requests </a></li>
    <li><a href="logout.php">Logout </a></li>

      </ul>

      
    </div>
  </nav>
</div>
  <div class="container">
<h4>Create event</h4>
    <form class="col s12" action="createevent.php" method="post">
           <div class="row">
           <?php
require 'connect.inc.php';
  session_start();
   $id=$_SESSION['usertype'];
echo $id;
if(isset($_POST['Location'])&&isset($_POST['Email'])&&isset($_POST['Phone'])&&isset($_POST['Time'])){
  $name=$_POST['Location'];
  $email=$_POST['Email'];
  $phone=$_POST['Phone'];
  $time=$_POST['Time'];
  $id=$_SESSION['id'];
  
  if(!empty($name)&&!empty($email)&&!empty($phone))
  { 
          $signup_query = "INSERT INTO `events` (`did`,`location`,`time`,`contact`,`email`) VALUES ('$id','$name','$time','$phone','$email')";
          if(!mysqli_query($connect,$signup_query))
          {
            //echo 'not inserted';
            ?>
          <div class="alert alert-warning" role="alert">
              There was a problem with registration.</div><?php
          }
          else
          {?>
            <div class="alert alert-success" role="alert">
            Your event has been created!
            </div><?php
      }
    
    
    
  }
  else
  {
?><div class="alert alert-warning" role="alert">
Fill all fields.</div><?php }
  
}
else
{
 // echo 'no';
}
  
//header("refresh:0;url=signuptemp.php"); 


?>
       </div>
       <div class="row">
       </div>
    <div class="row">
        <div class="input-field col s6">
          <input id="name" name="Location" type="text" class="validate" required>
          <label for="name">Location</label>
        </div>
    </div>

     <div class="row">
        <div class="input-field col s6">
          <input id="email" name="Email" type="email" class="validate" required >
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="phone" name="Phone" type="number" class="validate" required >
          <label for="phone">Phone</label>
        </div>
      </div>
    <div class="row">
        <div class="input-field col s6">
          <input id="phone" name="Time" type="text" class="validate" required >
          <label for="address">Date and Time:</label>
        </div>
    </div>
        
  
            
    <div class="row">
    <div class=" col s6">
            <button class="btn waves-effect waves-light red" type="submit" name="action">Create event
    <i class="material-icons right">send</i>
  </button>
          </div>
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
