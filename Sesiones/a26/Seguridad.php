<?php
/**
 * Clase encargada del control de seguridad de la app
 */

 class Seguridad
{
  private $usuario=null;
  function __construct()
  {
    //Arrancamos la sesion
    session_start();
    if(isset($_SESSION["usuario"])) $this->usuario=$_SESSION["usuario"];
  }
  public function getUsuario(){
    return $this->usuario;
  }
  public function addUsuario($usuario){
    $_SESSION["usuario"]=$usuario;
    $this->usuario=$usuario;
  }
  public function logOut(){
    $_SESSION=[];
    session_destroy();
  }
  public function cookieColor(){
  if (isset($_COOKIE["color"])) {
    $color=$_COOKIE["color"];
  }
  return $color;
}
}
 ?>
