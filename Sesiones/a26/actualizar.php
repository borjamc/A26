<?php
  include 'db.php';
  $usuario= new db();
  $actualizarperfil=$usuario->actualizarUsuario($_POST['usuario'], $_POST['nombre'], $_POST['apellidos'], $_POST['roles']);

  if ($actualizarperfil==true) {
    header('Location: MiPerfil.php');
  }else {
    echo "Error al actualizar los datos. <br><br>";
    echo "<a href='MiPerfil.php'>Volver a mi perfil,</a>";
  }
  if (isset($_POST['color'])) {
    setcookie("color", $_POST["color"], time()+2419200);
  }
 ?>
