<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>BIENVENDIDO USUARIO</title>
</head>
<body style=" background-color: lightblue;">
    <header>
    <?php
    $hola=$_SESSION['nombre'];
    $navegacion="
                <nav class='navbar navbar-dark bg-dark'>
        <ul class='nav nav-pills' style='align: center'>
            <li class='nav-item' style='margin: 3px'>
                <a class='nav-link active' href='/usuario/prestamos.php'>Prestamo</a>
            </li>
            <li class='nav-item' style='margin: 3px'>
                <a class='nav-link active' href='#'>TOP 10</a>
            </li>
            <li class='nav-item' style='margin: 3px'>
                <a class='nav-link active' href='#'>Tickets</a>
            </li>
            <li class='nav-item' style='margin: 3px'>
                <a class='nav-link active' href='#'>Multas</a>
            </li>
            <li class='nav-item' style='margin: 3px'>
                <a class='nav-link active' href=''>Carrito</a>
            </li>
            <li class='nav-item' style='margin: 3px'>
                <a class='nav-link active' href=''>Usuario</a>
            </li>
            <li class='nav-item' style='margin: 3px'>
                <a class='nav-link active' href='../salir.php'>SALIR</a>
            </li>

        </ul>
            <p style=>Bienvenido a la biblioteca $hola</p>
                </nav>";
    echo $navegacion;
    ?>
    </header>
    
</body>
</html>
