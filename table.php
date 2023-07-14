<?php 

include_once        ('connect.php');
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style00.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
    .table-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: auto;
        padding: 30px;
    }

    table {
        position: relative;

        border: 1px gray solid;
    }

    table th {
        font-weight: bold;
        padding: 15px;
    }

    table tr {
        border-bottom: 1px gray solid;
    }

    table td {
        font-style: italic;
        padding: 10px;
    }

    td img {
        width: 150px;
    }

    td a {
        text-decoration: none;
        color: red;
        font-weight: bold;
    }

    .div-total {
        display: flex;
        justify-content: left;
        align-items: center;
        width: 100%;
        background-color: black;
        padding: 10px;
        color: white;
    }

    .div-total a {
        text-decoration: none;
        color: white;
    }
    </style>
</head>

<body>

    <div class="table-container">

        <table>
            <caption style="font-weight:bold; font-size:30px;background-color:black;color:white;padding:10px">MON PANIER
            </caption>

            <thead>
                <th>Image</th>
                <th>Marque</th>
                <th>Prix</th>
                <th>Action</th>
            </thead>

            <tbody>
                <?php 

                    $id_client = $_SESSION['id_utilisateur'];

                    $querySelectItems = mysqli_query($con, "SELECT * FROM panier WHERE client_id = '$id_client' ");

                    while($rowsItems = mysqli_fetch_array($querySelectItems)){
                        $_SESSION['id_panier'] = $rowsItems['id'];
                        $_SESSION['client_id'] = $rowsItems['client_id'];
                ?>

                <tr>
                    <td><img src="images/<?php echo $rowsItems['imageAuto']; ?> "></td>
                    <td><?php echo $rowsItems['marque'] ?></td>
                    <td><?php echo $rowsItems['prix'] ?></td>
                    <td><a href="effacer.php?id=<?php echo $_SESSION['id_utilisateur']; ?>">EFFACER</a></td>
                </tr>

                <?php }; ?>
            </tbody>

            <tfoot>

                <tr>
                    <td>
                        <div class="div-total">


                            $<a href="id=<?php echo $_SESSION['id_utilisateur']; ?>">
                                <?php
                
                                        if(isset($_SESSION['id_utilisateur'])){
                                            $id_Prix = $_SESSION['id_utilisateur'];
                                            $queryTotal = mysqli_query($con, "SELECT SUM(prix) AS prix FROM panier WHERE client_id = '$id_Prix' ");

                                            $rowsPrix = mysqli_fetch_array($queryTotal);

                                            echo $rowsPrix['prix'];
                                        }
                                    
                                    ?>

                        </div>

                        </a>
                    </td>

                </tr>

            </tfoot>

        </table>


        <a href="homepage.php?id=<?php echo $_SESSION['id_utilisateur']; ?>"
            style="text-decoration:none;color:black;padding:10px">Retour</a>
    </div>

</body>

</html>