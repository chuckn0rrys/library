<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="test1.js"></script>
    
    <link rel="stylesheet" href="css/style.css">
</head>
    <h1 id="bienvenida">BIENVENIDO A LA BIBLIOTECA</h1>
</head>
<body>
<?php
    $panel="<header>
        <h2 id='seleccion'>
            seleccione una opcion</p>
        </h2>
    </header>

    <main id='main-home'>
                <div>
                    <button type='button'  class='boton' onclick='location.href='usuarios.php'' >usuarios</button>     
                    <button type='button'  class='boton' onclick='location.href='libros.php''>libro</button> 
                </div>
    </main>
    <footer id='footer-home'>
        <div>
            <img id='imagen-biblioteca' src='img/img1.jpg' alt='BIENVENIDOS A LA BIBLIOTECA'>
        </div>
    </footer>"
    if($_POST['admin']==1){
        echo $panel;
    }
    else{
        '<script>alert("NO ESTAS AUTORIZADO");
        window.location.href="login.php";
        </script>';
    }
?>
</body>
</html>