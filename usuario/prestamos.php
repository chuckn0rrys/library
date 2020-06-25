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
    <link rel="stylesheet" href="../css/style.css">

</head>
    <?php
        if($_SESSION['admin']!=0)
        echo '<script type="text/javascript">
        alert("No se ha iniciado sessión");
        window.location.href="../login.php"
        </script>';
    ?>
</head>
<body style=" background-color: lightblue;">
    <header>
    <?php
    $hola=$_SESSION['nombre'];
    $navegacion="
                <nav class='navbar navbar-dark bg-dark'>
        <ul class='nav nav-pills' style='align: center'>
            <li class='nav-item' style='margin: 3px'>
                <a class='nav-link active' href='#'>Prestamo</a>
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
            <p style='color:white;'>Bienvenido a la biblioteca $hola</p>
                </nav>";
    echo $navegacion;
    ?>
    <h1 id="bienvenida" style="align=center">BIENVENIDO A NUESTRA SECCION DE PRESTAMOS DE LIBROS</h1>
    </header>
    <main>
        <?php
        $barra="<p>Si quieres todos los libros en biblioteca, deja los espacios vacios o puedes buscar mas especificamente llenando el formulario</p>
        <form action='/usuario/prestamos.php' method='post'>
        <label for='nombre'>Nombre:</label>
        <input type='search' id='nombre' name='nombre'><br>
        <label for='genero'>Genero:</label>
        <select name='genero'>
                <option></option>
                <option value='thriller'>thriller</option>
                <option value='literatura'>literatura</option>
                </select> <br>;
        <input type='submit' class='boton' value='BUSCAR'>";

        echo $barra;
        ?>
        <?php
        //busqueda y muestra de libros
            $conn = new mysqli("localhost", "root", "","library");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error); 
            }
            $nombre=$_POST["nombre"];
            $genero=$_POST["genero"];

            if($nombre!='' && $genero==''){
                $nombre = $_POST["nombre"];
                $sql = "SELECT*FROM books WHERE nombre LIKE '%$nombre%'";
                $result = $conn->query($sql);
                muestra($result);
            }
            if($nombre=='' && $genero!=''){
                $genero = $_POST["genero"];
                $sql = "SELECT*FROM books WHERE gender LIKE '%$genero%'";
                $result = $conn->query($sql);
                muestra($result);
            }
            if($nombre=='' && $genero==''){
                $sql = "SELECT*FROM books";
                $result = $conn->query($sql);
                muestra($result);
            }
            
        ?>
</form>
    </main>
    
</body>
</html>

<?php
function muestra($result){
    $i=0;
    $tabla = "<form action='/usuario/carrito.php' method='post' id='$i'><table border='3px' >";
                    $tabla.="<tr><th>ID LIBRO</th>";
                    $tabla.="<th>NOMBRE</th>";
                    $tabla.="<th>CANTIDAD</th>";
                    $tabla.="<th>GENERO</th>";
                    $tabla.="<th>EDITORIAL</th>";
                    $tabla.="<th>PRESTAMO</th></tr>";   
                if($result->num_rows > 0){ 
                            
                            while($row = $result->fetch_assoc()) {
                            $tabla.="<tr><td>".$row['id_libro']."</td>";
                            $tabla.="<td>".$row['nombre']."</td>";
                            $tabla.="<td>".$row['cantidad']."</td>";
                            $tabla.="<td>".$row['gender']."</td>";
                            $tabla.="<td>".$row['editorial']."</td>"; 
                            $tabla.="<td><input type='submit' form='$i' class='boton' value='AGREGAR'></td></tr><br></form>";             
                        } //while                    
                $tabla.="</table>";
                echo $tabla; 
            }// if del rows
            if($result->num_rows <= 0){
                echo"no hay resultados en la busqueda";
            }

}
?>