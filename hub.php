<html>
<body>
<?php
require 'connect.inc.php';
session_start();
				$ID = mysqli_real_escape_string($connect,$_GET['ID']);
				$C = mysqli_real_escape_string($connect,$_GET['C']);
				if($ID!=0 && $C==0){
				$query2="delete from `events` where `e_id`='$ID' ";
				mysqli_query($connect,$query2);
				echo("Approving");
				header('Location:trackevents.php');
				}
				else if($ID!=0 && $C==1){
					$add=$_POST['add'];

				$query2="UPDATE `blood` SET `blavailable`=blavailable+$add  WHERE `b_id`='$ID' ";
				mysqli_query($connect,$query2);
				echo("Delivering");
				header('Location:trackblood.php');
				}
				else if($ID!=0 && $C==2){
					$add=$_POST['add'];
					$did=$_SESSION['id'];
					$bl = mysqli_real_escape_string($connect,$_GET['bl']);
					$query2="UPDATE `requests` SET `blrequired`=blrequired-$add  WHERE `reqid`='$ID' ";
				mysqli_query($connect,$query2);
				$query3="UPDATE `requests` SET `blavailable`=blavailable+$add  WHERE `reqid`='$ID' ";
				mysqli_query($connect,$query3);
				$query4="UPDATE `blood` SET `blavailable`=blavailable-$add  WHERE `id`='$did' and `blgroup`='$bl' ";
				mysqli_query($connect,$query4);
				echo("Updating");
				header('Location:trackreq.php');
				}
				else if($ID!=0 && $C==3){
										$add=$_POST['add'];

					$query2="UPDATE `requests` SET `blavailable`='$add'  WHERE `reqid`='$ID' ";
				mysqli_query($connect,$query2);
				echo("Updating");
				header('Location:trackbloodh.php');
				}
				else if($ID!=0 && $C==4){
					$add=$_POST['add'];

					$query2="UPDATE `requests` SET `blrequired`='$add'  WHERE `reqid`='$ID' ";
				mysqli_query($connect,$query2);
				echo("Updating");
				header('Location:trackbloodh.php');
				}
				else if($ID!=0 && $C==5){
					$add=$_POST['add'];
					$did=$_SESSION['id'];
					$bl = mysqli_real_escape_string($connect,$_GET['bl']);
					$query2="UPDATE `requests` SET `blrequired`=blrequired-$add  WHERE `reqid`='$ID' ";
				mysqli_query($connect,$query2);
				$query3="UPDATE `requests` SET `blavailable`=blavailable+$add  WHERE `reqid`='$ID' ";
				mysqli_query($connect,$query3);
				
				echo("Updating");
				header('Location:trackreqd.php');
				}
				else if($ID!=0 && $C==6){
										$add=$_POST['add'];

					$query2="UPDATE `patients` SET `blrequired`='$add'  WHERE `pid`='$ID' ";
				mysqli_query($connect,$query2);
				
				header('Location:trackpatients.php');
				}
				else if($ID!=0 && $C==7){
															$add=$_POST['add'];

					$query3="UPDATE `patients` SET `blreceived`='$add'  WHERE `pid`='$ID' ";
				mysqli_query($connect,$query3);
				header('Location:trackpatients.php');
				}
					else if($ID!=0 && $C==8){
					$did = mysqli_real_escape_string($connect,$_GET['DID']);
					$uid=$_SESSION['id'];
					$query2="insert into `event_registrations`(`eid`,`did`,`userid`) values('$ID','$did','$uid') ";
				mysqli_query($connect,$query2);
				
				header('Location:trackeventsh.php?ID=0');
				}
				else if($ID!=0 && $C==9){
							$did = mysqli_real_escape_string($connect,$_GET['DID']);
					$uid=$_SESSION['id'];
					$query2="insert into `event_registrations`(`eid`,`did`,`userid`) values('$ID','$did','$uid') ";
				mysqli_query($connect,$query2);
				
				header('Location:trackeventsd.php?ID=0');
				}
				
				
?>
</body>
</html>