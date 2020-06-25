
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">

    <meta http-equiv="Last-Modified" content="0">

    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">

    <meta http-equiv="Pragma" content="no-cache">
    <title>BIBLIOTECA</title>
    <script type="text/javascript" src="test1.js"></script>
    
    <link rel="stylesheet" href="css/style.css">
</head>
    <h1 id="bienvenida">BIENVENIDO A LA BIBLIOTECA</h1>
</head>

<body>

    <header>
        <h2 id="seleccion">
            Ingresa tu usuario</p>
        </h2>
    </header>

    <main id="main-home">
    <?php
                $session="<form action='/validacionuser.php' method='post' id='iniciosesion'><br>";
                $session.="<label for='login' >ID:</label>";
                $session.="<input name='login' type='cel'><br>";
                $session.="<label for='pass'>Pass:</label>";
                $session.="<input type='password'name='pass'><br>";
                $session.="</form>";
                $session.="<div>
                            <button type='submit'  class='boton' form='iniciosesion'>login</button>         
                            </div>";
                echo $session;
    ?>
    </main>
    <footer id="footer-home">
        <div>
            <img id="imagen-biblioteca" src="img/img1.jpg" alt="BIENVENIDOS A LA BIBLIOTECA">
        </div>
    </footer>
</body>
</html>
