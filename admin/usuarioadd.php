<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <h1 id="bienvenida">AGREGAR UN ALUMNO</h1>
</head>
<body>
    <header>

    </header>
        
    <main id="main-home">
    <?php

        $form = "<form action='/usuarioadd.php' method='post' id='form1'><br> ";
        $form .= "<label for='nombre'>Nombre:</label>";
        $form .= "<input type=text name='nombre'><br>";
        $form .= "<label for='id_career'>id_career:</label>";
        $form .= "<select name='id_career'>
                <option value='CEL'>CEL</option>
                <option value='COM'>COM</option>
                <option value='QFB'>QFB</option>
                <option value='MAT'>MAT</option>
                <option value='FS'>FS</option>
                <option value='MEC'>MEC</option>
                <option value='MT'>MT</option>
                <option value='CI'>CI</option>
                </select> <br>";
        $form .= "<label for='cel'>cel:</label>";
        $form .= "<input type='tel' name='cel'><br>";
        $form .= "<label for='active'>active:</label>";
        $form .= "<input type=radio name='active' value=1 checked><br>";
        $form .= "<label for='active'>no active:</label>";
        $form .= "<input type=radio name='active' value=0><br>";
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
        if(isset($_POST["nombre"])  && isset($_POST["cel"]) && isset($_POST["id_career"]) && isset($_POST["active"])){
            $nombre = $_POST["nombre"];
            $id_career = $_POST["id_career"];
            $cel = $_POST["cel"];
            $active = $_POST["active"];
            $sql = "INSERT INTO Student (name, id_career, cel,active) VALUES ('$nombre', '$id_career', '$cel','$active')";
            if(mysqli_query($conn,$sql)){  
                echo'<script type="text/javascript">
                alert("nuevo usuario agregado");
                window.location.href="usuariosedit.php";
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
            <button class='boton' onclick="location.href='usuariosedit.php'">Regresar</button>
        </div>
        <div>
            <img id="imagen-biblioteca" src="img/img1.jpg" alt="BIENVENIDOS A LA BIBLIOTECA">
        </div>
    </footer>
</body>
</html>

