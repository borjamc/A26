<?php
include 'Seguridad.php';
$sesion=new Seguridad();
if (isset($_SESSION['usuario'])==false) {
  header('Location: index.php');
}else {



 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mi Perfil</title>
    <style>
      body{
        background-color: <?php echo $color=$sesion->cookieColor(); ?>;}
    </style>
  </head>
  <body>
    <div>
      <h2>Actualizar</h2>
      <form method="post" action="actualizar.php">
        <?php

        include 'db.php';
          //Genereamos un nuevo objeto
          $user=new db();

          $usuario=$user->buscarUsuario($_SESSION['usuario']);

          foreach ($usuario as $fila) {

            echo "<input type='text' name='usuario' value='".$fila['usuario']."' readonly><br><br>";
            echo "<input type='text' name='nombre' value='".$fila['nombre']."'><br><br>";
            echo "<input type='text' name='apellidos' value='".$fila['apellidos']."'><br><br>";
            echo "<input type='text' name='rol' value='".$fila['rol']."' readonly><br><br>";
          }
         ?>
         <select class="" name="color">
           <option value="red" name="red">Rojo</option>
           <option value="green" name="green">Verde</option>
           <option value="blue" name="blue">Azul</option>
           <option value="white" name="white">Blanco</option>
         </select>
         <select class="" name="roles">
           <?php
           $roles=$user->Roles();
           foreach ($roles as $fila) {
             echo "<option value='".$fila['rol']."' name='".$fila['rol']."'>".$fila['rol']."</option>";
           }
            ?>

            <input type="submit" value="Actualizar">
         </select>
         <br><br>
      </form>



      </form>

  </body>
</html>
<?php
}
 ?>
