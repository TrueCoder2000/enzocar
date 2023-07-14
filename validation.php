<?php

include_once		('connect.php');

session_start();


	if (isset($_POST['btnSignup'])) {
		$prenom 		= $_POST['prenom'];
		$nom 			= $_POST['nom'];
		$adresse 		= $_POST['adresse'];
		$email 			= $_POST['email'];
		$pass 			= $_POST['pass'];

		$queryInserer = mysqli_query($con, "INSERT INTO utilisateurs (prenom, nom, adresse, email, pass)VALUES('$prenom', '$nom', '$adresse', '$email', '$pass')");

		if (isset($queryInserer)) {
			echo 'Les données sont envoyées avec succès...';
			header('refresh:1;url=index.php');
		}else{
			header('location:index.php');
		}
	}


	if (isset($_POST['btnLogin'])) {
		$email	= $_POST['email'];
		$pass	= $_POST['pass'];


		$queryLogin 	= mysqli_query($con, "SELECT * FROM utilisateurs WHERE email='$email' AND pass='$pass' ");

		while($rows = mysqli_fetch_array($queryLogin)){
			$_SESSION['id_utilisateur'] = $rows['id'];
			$_SESSION['email'] = $rows['email'];
			$_SESSION['nom'] = $rows['nom'];
			$_SESSION['prenom'] = $rows['prenom'];

			if(isset($_SESSION['id_utilisateur'])){
				echo 'Login...';
				header('refresh:1; url=homepage.php?id= ' .$_SESSION['id_utilisateur'] );

			}else{
					header('location:index.php');
		}
	}

//if (isset($queryLogin)) {
//echo 'Log...';
//header('refresh:1; url=homepage.php');
//}else{
//echo "Try Again...";
//header('location:index.php');
//}
}

	//if(isset($_POST['btnPrice'])){
		//$image = $_POST['product-image'];
		//echo"<img  src='images/".$image."' width='100'>". $_POST['product-marque'].' '.$_POST['product-price'];
	//}
?>