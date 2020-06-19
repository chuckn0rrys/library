<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <h1 id="bienvenida">AGREGAR UN LIBRO</h1>
</head>
<body>
    <header>

    </header>
        
    <main id="main-home">
    <?php

        $form = "<form action='/librosadd.php' method='post' id='form1'><br> ";
        $form .= "<label for='nombre'>Nombre:</label>";
        $form .= "<input type=text name='nombre'><br>";
        $form .= "<label for='cantidad'>cantidad:</label>";
        $form .= "<input type=number name='cantidad'><br>";
        $form .= "<label for='gender'>genero:</label>";
        $form .= "<select name='gender' type='text'>
                <option value='thriller'>thriller</option>
                <option value='literatura'>literatura</option>
                <option value='romance'>romance</option>
                </select> <br>";
        $form .= "<label for='editorial'>editorial:</label>";
        $form .= "<input type='text' name='editorial'><br>";
        $form .= "</form>";
        $form .= "<button type='submit' form='form1' class='boton' value='submit'>Submit</button>";
        echo $form;
        ?>


        <?php
        //conecting to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = mysqli_connect($servername, $username, $password, "library");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error); 
        }
        if(isset($_POST["nombre"])  && isset($_POST["cantidad"]) && isset($_POST["gender"]) && isset($_POST["editorial"])){
            $nombre = $_POST["nombre"];
            $cantidad = $_POST["cantidad"];
            $gender = $_POST["gender"];
            $editorial = $_POST["editorial"];
            $sql = "INSERT INTO books (nombre, cantidad, gender,editorial) VALUES ('$nombre', '$cantidad', '$gender','$editorial')";
            if(mysqli_query($conn,$sql)){  
                echo'<script type="text/javascript">
                alert("nuevo libro agregado");
                window.location.href="librosedit.php";
                </script>';
            }
        else{
            echo "failed to receive data";
        }
    }
    ?>
    </main>
    <footer id="footer-home">
        <div id="regreso">
            <button class='boton' onclick="location.href='librosedit.php'">Regresar</button>
        </div>
        <div>
            <img id="imagen-biblioteca" src="img/img1.jpg" alt="BIENVENIDOS A LA BIBLIOTECA">
        </div>
    </footer>
</body>
</html>

