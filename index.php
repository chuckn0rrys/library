<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba</title>
    <script type="text/javascript" src="test1.js"></script>
</head>
<body>
    <?php
    $servername = "localhost";
        $username = "root";
        $password = "pwdpwd";
        // Create connection

        $conn = new mysqli("localhost", "root", "","library");
        // Check connection
        if ($conn->connect_error) {
            echo "Connection failed: " . $conn->connect_error;
        }
        echo "Connected successfully <br>";

echo "<a href=home.php>hola</a>";

        //book
        $sql = "SELECT * from books";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
                
                echo "<h1>book</h1>";

                $tabla = "<table border='2px'>";
                while($row = $result->fetch_assoc()) {

                $tabla.="<tr><td>id libro</td>";
                $tabla.="<td>" . $row["id_libro"] . "</td>";
                $tabla.="<td>nombre</td>";
                $tabla.="<td>" . $row["name"] . "</td>";
                
                $tabla.="</table>";
                echo $tabla;
} 
    else {
    echo "0 results";
            }

        //career
        $sql = "SELECT * from career";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h1>career</h1>";
                
                $tabla = "<table border='2px'>";
                while($row = $result->fetch_assoc()) {

                 $tabla.="<tr><td>id career</td>";
                 $tabla.="<td>" . $row["id_career"] . "</td>";
                 $tabla.="<td>name_career</td>";
                 $tabla.="<td>" . $row["name_career"] . "</td>";
                }
                 $tabla.="</table>";
                 echo $tabla;
   
} 
    else {
    echo "0 results";
            }


        //gender
        $sql = "SELECT * from gender";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h1>gender</h1>";
                
                $tabla = "<table border='2px'>";
                while($row = $result->fetch_assoc()) {

                 $tabla.="<tr><td>id gender</td>";
                 $tabla.="<td>" . $row["id_gender"] . "</td>";
                 $tabla.="<td>gender</td>";
                 $tabla.="<td>" . $row["gender"] . "</td>";
                }
                 $tabla.="</table>";
                 echo $tabla;
                    
         }

    else {
    echo "0 results";
            }

        //students
        $sql = "SELECT * from student";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h1>stundets</h1>";
                
                $tabla = "<table border='2px'>";
                while($row = $result->fetch_assoc()) {

                 $tabla.="<tr><td>id estudiante</td>";
                 $tabla.="<td>" . $row["id_alumno"] . "</td>";
                 $tabla.="<td>nombre</td>";
                 $tabla.="<td>" . $row["name"] . "</td>";
                 $tabla.="<td>id_career</td>";
                 $tabla.="<td>" . $row["id_career"] . "</td>";
                 $tabla.="<td>celphone</td>";
                 $tabla.="<td>" . $row["cel"] . "</td>";
                 $tabla.="<td>active</td>";
                 $tabla.="<td>" . $row["active"] . "</td>";
                }
                 $tabla.="</table>";
                 echo $tabla;  
         
} 
    else {
    echo "0 results";
            }


$conn->close();


    ?>
</body>
</html>