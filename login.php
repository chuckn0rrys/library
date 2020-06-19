<?php
    session_start();
?>
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
                $session="<form action='/login.php' method='post' id='iniciosesion'><br>";
                $session.="<label for='login' >ID:</label>";
                $session.="<input name='login' type='cel'><br>";
                $session.="<label for='Pass'>Pass:</label>";
                $session.="<input type='password'name='Pass'><br>";
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

<?php
    $conn = new mysqli("localhost", "root","","library");
        
        // Check connection
        if ($conn->connect_error) {
        echo 'Connection failed: ' . $conn->connect_error;
        }
        //students
        $sql = "SELECT * from login";
        $result = $conn->query($sql);
        echo $_POST["login"];
        echo $_POST["Pass"];
        if(isset($_POST["login"]) && isset($_POST["Pass"])){
            $idusuario=$_POST["login"];
            $passusuario=$_POST["Pass"];
            echo $idusuario;
            echo $passusuario;
            echo $id;
            echo $pass;
            if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) 
                        {  
                        echo $row["id"];
                        echo $row["pass"];
                        echo $row["admin"];
                        $id=$row["id"];
                        $pass=$row["pass"];
                        $admin=$row["admin"];

                        if($id===$idusuario && $pass===$passusuario && $admin==1){
                            echo '<script type="text/javascript">
                            alert("BIENVENIDO ADMIN");
                            window.location.href="admin/librosedit.php";
                            </script>';
                        }
                        if($id===$idusuario && $pass===$passusuario && $admin==0){
                            echo '<script type="text/javascript">
                            alert("BIENVENIDO USUARIO");
                            </script>';
                        
                        }
                        } 
                } 
        }
        
        else {
        echo '<script type="text/javascript">
                alert("ID o Password incorrecto");
                </script>';
        }
    $conn->close();

?>
