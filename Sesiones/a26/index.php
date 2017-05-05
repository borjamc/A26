<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio</title>
  </head>
  <body>
    <div>
      <h2>Login</h2>
      <form method="post" action="index.php">
        <label for="user">Usuario:</label><br>
        <input type="text" id="user" name="usuario" placeholder="Tu usuario.."><br><br>

        <label for="pass0">Contraseña</label><br>
        <input type="password" id="pass0" name="pass0" placeholder="Contraseña.."><br><br>

        <input type="hidden" name="accion" value="login">

        <input type="submit" value="Login">
      </form>
      <br>
      <a href="registro.php">Registrarse</a>
      <br>
      <br>




<?php

include 'Seguridad.php';
include 'db.php';

//Si envia el campo oculto hace esto

if(isset($_POST["accion"])){
  //Genereamos un nuevo objeto
  $seguridad=new Seguridad();
  $user=new db();

  if ($_POST["accion"]=="login") {
    $usurioReg=$user->LoginUsuario($_POST["usuario"]);
    if($usurioReg!=null)
    {
      //Comparamos los passwords
      if($usurioReg["pass"]==sha1($_POST["pass0"])){
        echo "<h2>Usuario encontrado</h2></br>";
        $seguridad->addUsuario($usurioReg["usuario"]);
        header('Location: MiPerfil.php');
      }else{
        echo "<h2>ERROR: La contraseña no coincide</h2></br>";
        echo "<a href=index.php>Volver al formulario de login</a>";
      }
    }else{
      echo "<h2>ERROR: Usuario no encontrado</h2></br>";
      echo "<a href=registro.php>Registra tu usuario aqui</a>";
    }
  }
}
 ?>
</div>
</body>
</html>
