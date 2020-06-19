<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <h1 id="bienvenida">BIENVENIDO A NUESTRA SECCION DE EDICION DE LIBROS</h1>
</head>
<body>

    <header>
        <h2 id="seleccion">
            <p>seleccione una opcion</p>
        </h2>
    </header>

    <main id="main-usuarios">


        <div>
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
                $tabla = "<table border='3px'>";
                $tabla.="<tr><th>ID LIBRO</th>";
                $tabla.="<th>NOMBRE</th>";
                $tabla.="<th>CANTIDAD</th>";
                $tabla.="<th>GENERO</th>";
                $tabla.="<th>EDITORIAL</th>";
                $tabla.="<th>EDITAR</th>". "</tr>"; 
                $i=1;
                while($row = $result->fetch_assoc()) 
                        {
                            
                            $tabla.= "<form action='/librosedit.php' method='post' id='$i'><br> ";
                            $id_libro=$row["id_libro"];
                            $name=$row["nombre"];
                            $cantidad=$row["cantidad"];
                            $gender=$row["gender"];
                            $editorial=$row["editorial"];

                        $tabla.="<tr><td><input type=text onlyread value='$id_libro' name='id_libro'></td>";
                        $tabla.="<td><input type=text name='nombre' value='$name' ></td>";
                        $tabla.="<td><input type=text  name='cantidad'value='$cantidad'></td>";
                        $tabla.="<td><input type='tel' name='gender' value='$gender'></td>";
                        $tabla.="<td><input type=text name='editorial' value='$editorial'></td> ";                        
                        $tabla.="<td>" . "<input type='submit' form='$i' class='boton' value='submit'></td></tr></form>";    
                        $i++;                   
                        }                       
                $tabla.="</table>";
                echo $tabla;  
} 
    else {
    echo "0 results";
    }
    $conn->close();

    ?>
        </div>
        <?php
        //conecting to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = mysqli_connect($servername, $username, $password, "library");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error); 
        }
        

        if(isset($_POST["id_libro"])  && isset($_POST["nombre"]) && isset($_POST["cantidad"]) && isset($_POST["gender"])){
            $id_libro = $_POST["id_libro"];
            $nombre = $_POST["nombre"];
            $cantidad = $_POST["cantidad"];
            $gender = $_POST["gender"];
            $editorial = $_POST["editorial"];
            
            $sql = "UPDATE books  SET editorial='$editorial', nombre='$nombre', cantidad='$cantidad',gender='$gender' WHERE id_libro=$id_libro";
            if(mysqli_query($conn,$sql)){  
                echo'<script type="text/javascript">
                alert("LIBRO EDITADO");
                window.location.href="librosedit.php";
                </script>';
            }
        else{
            echo "failed to receive data";
        } 
    }
    ?>
    </main>
    <footer>
        <div>     
            <button type="button"  class="boton" onclick="location.href='libros.php'">Regresar</button> 
            <button type='button' class='boton' onclick="location.href='librosadd.php'">Add</button>
        </div>
    </footer>
</body>
</html>
