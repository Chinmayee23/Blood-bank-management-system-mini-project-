<?php
require 'logindon.php';
	//require 'reghosp.php';
	//require 'regdonor.php';
	//require 'regdoncamp.php';

session_destroy();
header('Location:logindon.php?email=1&pwd=1');
?>