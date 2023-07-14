<?php 

include_once		('connect.php');


		/*if (isset($_POST['btnLogin'])) {

		$email 			= $_POST['email'];
		$pass 			= $_POST['pass'];

		$queryLogin = mysqli_query($con, "SELECT * FROM utilisateurs WHERE email='$email' AND pass='$pass' ");

		if (isset($queryLogin)) {
			echo 'log';
		}else{
			echo 'no';
		}
		



	}*/


	if (isset($_POST['btnLogin'])) {
		$email	= $_POST['email'];
		$pass	= $_POST['pass'];


		$queryLogin 	= mysqli_query($con, "SELECT * FROM utilisateurs WHERE email='$email' AND pass='$pass' ");

		if (isset($queryLogin)) {
			echo 'Saving...';
			//header('refresh:1; url=homepage.php');
		}else{
			echo "Try Again...";
			//header('location:index.php');
		}
	}



?>