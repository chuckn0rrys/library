
<?php
    session_start();
?>
<?php

    $conn = new mysqli("localhost", "root","","library");
        
        // Check connection
        if ($conn->connect_error) {
        echo 'Connection failed: ' . $conn->connect_error;
        }
        //students
        $sql = "SELECT * from login";
        $result = $conn->query($sql);
        
        if(isset($_POST["login"]) && isset($_POST["pass"])){
            $idusuario=$_POST["login"];
            $passusuario=$_POST["pass"];

            if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) 
                        {  
                        $id=$row["id"];
                        $pass=$row["pass"];
                        $admin=$row["admin"];
                        $nombre=$row["nombre"];

                        if($id===$idusuario && $pass===$passusuario && $admin==1){
                            $_SESSION["usuario"]=$id;
                            $_SESSION["admin"]=$admin;
                            $_SESSION["nombre"]=$nombre;

                            echo "<script type='text/javascript'>
                            alert('Bienvenido $nombre');
                            window.location.href='admin/librosedit.php';
                            </script>";
                        }
                        if($id===$idusuario && $pass===$passusuario && $admin==0){
                            $_SESSION["usuario"]=$id;
                            $_SESSION["admin"]=$admin;
                            $_SESSION["nombre"]=$nombre;
                            echo "<script type='text/javascript'>
                                        alert('Bienvenido $nombre');
                                        window.location.href='usuario/iniciousuario.php';
                                        </script>";
                        }
                        
                        } 
            echo '<script type="text/javascript">
            alert("ID o password incorrecto");
            window.location.href="login.php";
            </script>';
                
        } 
        }
    $conn->close();

?>
