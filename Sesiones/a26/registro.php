<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro de usuario</title>
    <style>

    </style>
  </head>
  <body>
    <div>
      <h2>Formulario de registro</h2>
      <form method="post" action="registro.php">

        <label for="user">Email</label><br>
        <input type="text" id="user" name="usuario" placeholder="Tu email.."><br><br>

        <label for="pass0">Contraseña</label><br>
        <input type="password" id="pass0" name="pass0" placeholder="Contraseña.."><br><br>

        <label for="pass1">Repite Contraseña</label><br>
        <input type="password" id="pass1" name="pass1" placeholder="Contraseña.."><br><br>

        <label for="fname">Nombre</label><br>
        <input type="text" id="fname" name="nombre" placeholder="Tu nombre.."><br><br>

        <label for="lname">Apellidos</label><br>
        <input type="text" id="lname" name="apellidos" placeholder="Tus apellidos.."><br><br>

        <input type="hidden" name="accion" value="registro">

        <input type="submit" value="Registrar"><br><br>
      </form>

<header valign="top">
      <?php

      include 'db.php';
      include 'Seguridad.php';

      if(isset($_POST["accion"])){
        //GEneramos el nuevo objeto
        $user=new db();
        $seguridad=new Seguridad();
        //Registro de usuario
        if($_POST["accion"]=="registro"){
          if ($_POST["usuario"]!=null && $_POST["nombre"]!=null && $_POST["apellidos"]!=null && $_POST["pass0"]!=null && $_POST["pass1"]!=null) {
          if($_POST["pass0"]==$_POST["pass1"]){
            $usurioReg=$user->insertarUsuario($_POST["nombre"],$_POST["apellidos"],
                                   $_POST["usuario"],$_POST["pass0"]);
            if($usurioReg!=null)
            {
              echo "<h2>Usuario encontrado</h2></br>";
              header('Location: index.php');
            }else{
              //Usuario no insertado
              echo "<h2>El usuario no ha sido insertado. Revisa los datos</h2></br>";
              echo "<a href=registro.php>Volver al formulario de registro</a>";
            }
          }else{
            //Contraseñas diferentes
            echo "<h2>Las contraseñas no son iguales</h2></br>";
            echo "<a href=registro.php>Volver al formulario de registro</a>";
          }
        }else {
          echo "ERROR: Introduce todos los campos";
        }
        }
      }



       ?>
    </header>
  </div>
  </body>
</html>
