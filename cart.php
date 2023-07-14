<?php 

include_once        ('connect.php');
session_start();

if(isset($_POST['btnPrice'])){
    $id = $_SESSION['id_utilisateur'];
    $image = $_POST['image'];
    $marque = $_POST['marque'];
    $prix   = $_POST['prix'];

    //echo $id;

    $queryInserer = mysqli_query($con, "INSERT INTO panier (imageAuto, marque, prix, client_id)VALUES('$image', '$marque','$prix', '$id')");

    if(isset($queryInserer)){
        header('refresh:1; url=homepage.php');
    }else{
        header('location:homepage.php');
    }
    
    /*if(isset($queryInserer)){
        $queryCount = mysqli_query($con, "SELECT COUNT(client_id) AS count_id FROM panier WHERE client_id = '$id' " );

        $rowsCount = mysqli_fetch_array($queryCount);

        if(isset($rowsCount)){
            $_SESSION['count_id'] = $rowsCount['count_id'];

            header('location:homepage.php');

            echo $_SESSION['count_id'];
        }
    }*/
}

?>