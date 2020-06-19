<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
    <h1 id="bienvenida">BIENVENIDO A NUESTRA SECCION DE EDICION DE USUARIOS</h1>
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
        $sql = "SELECT * from student";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {       
                $tabla = "<table border='3px'>";
                $tabla.="<tr><th>ID ESTUDIANTE</th>";
                $tabla.="<th>NOMBRE</th>";
                $tabla.="<th>ID CARRERA</th>";
                $tabla.="<th>CELLPHONE</th>";
                $tabla.="<th>ACTIVE</th>";
                $tabla.="<th>EDITAR</th>". "</tr>";
                $i=1;
                while($row = $result->fetch_assoc()) 
                        {
                            
                            $tabla.= "<form action='/usuariosedit.php' method='post' id='$i'><br> ";
                            $id_alumno=$row["id_alumno"];
                            $name=$row["name"];
                            $id_career=$row["id_career"];
                            $cel=$row["cel"];
                            $active=$row["active"];

                        $tabla.="<tr><td><input type=text onlyread value='$id_alumno' name='id_alumno'></td>";
                        $tabla.="<td><input type=text name='nombre' value='$name' ></td>";
                        $tabla.="<td><input type=text  name='id_career'value='$id_career'></td>";
                        $tabla.="<td><input type='tel' name='cel' value='$cel'></td>";
                        $tabla.="<td><input type=text name='active' value='$active'></td> ";                        
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
        

        if(isset($_POST["nombre"])  && isset($_POST["cel"]) && isset($_POST["id_career"]) && isset($_POST["active"])){
            $nombre = $_POST["nombre"];
            $id_career = $_POST["id_career"];
            $cel = $_POST["cel"];
            $active = $_POST["active"];
            $id_alumno = $_POST["id_alumno"];
            
            $sql = "UPDATE Student  SET name='$nombre', id_career='$id_career', cel='$cel',active='$active' WHERE id_alumno=$id_alumno";
            if(mysqli_query($conn,$sql)){  
                echo'<script type="text/javascript">
                alert("USUARIO EDITADO");
                window.location.href="usuariosedit.php";
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
            <button type="button"  class="boton" onclick="location.href='usuarios.php'">Regresar</button> 
            <button type='button' class='boton' onclick="location.href='usuarioadd.php'">Add</button>
        </div>
    </footer>
</body>
</html>
