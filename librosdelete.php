<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src=""></script>
    <link rel="stylesheet" href="css/style.css">

</head>
    <h1 id="bienvenida">ELIMINAR UN ALUMNO</h1>
</head>
<body>
    <header>

    </header>
        
    <main id="main-home">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "pwdpwd";

        // Create connection
        $conn = new mysqli("localhost", "root","","library");
        
        // Check connection
        if ($conn->connect_error) {
        echo 'Connection failed: ' . $conn->connect_error;
        }
        //students
        $sql = "SELECT * from books";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) { 
                $form = "<form action='/librosdelete.php' method='post' id='form2'><br> "; //modificar desde aqui
                $form .= "<select name='nombre'>";
                while($row = $result->fetch_assoc()) 
                        {  
                        $nombre=$row["nombre"]; 
                        $form .="<option value='$nombre'>". $row["nombre"]. "</option>";
                        } 
                $form.="</select> <br>";
                $form .= "</form>";
                $form .= "<button type='submit' form='form2' class='boton' value='submit'>Eliminar</button>";
                echo $form;
                } 
    else {
    echo "0 results";
    }
    $conn->close();
    ?>

    </main>
    <footer id="footer-home">
        <div id="regreso">
            <button class='boton' onclick="location.href='libros.php'">Regresar</button>
        </div>
        <div>
            <img id="imagen-biblioteca" src="img/img1.jpg" alt="BIENVENIDOS A LA BIBLIOTECA">
        </div>
    </footer>

    <?php
        //conecting to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = mysqli_connect($servername, $username, $password, "library");
        echo $_POST["nombre"];
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error); 
        }
        if(isset($_POST["nombre"])){
            $nombre = $_POST["nombre"];
            echo "si llego aqui";
            $sql = "DELETE FROM books WHERE nombre='$nombre'";

            if(mysqli_query($conn,$sql)){  
                echo'<script type="text/javascript">
                alert("Libro borrado");
                window.location.href="librosedit.php";
                </script>';
            }
        else{
            echo "failed to receive data";
        }
    }
    $conn -> close();
    ?>
</body>
</html>

