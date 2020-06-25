<?php
session_start();
?>
<?php
session_unset();

session_destroy();
echo '<script type="text/javascript">
                            alert("Gracias por venir");
                            window.location.href="login.php";
                            </script>';
?>