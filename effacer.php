<?php 


include_once        ('connect.php');
session_start();

if(isset($_SESSION['id_panier'])){
    $id_panier = $_SESSION['id_panier'];

    $queryDelete = mysqli_query($con, "DELETE FROM panier WHERE id = '$id_panier' ");

    if($queryDelete){
        header('location:table.php');
    }
}

?>