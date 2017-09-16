<?php
require 'conector.php';

  $conexion = new ConectorBD();

  $user1['email']="'jtellez@gmail.com'";
  $user1['nombre']="'jasiel tellez'";
  $user1['password']="'".password_hash('nextu1',PASSWORD_DEFAULT)."'";
  $user1['fecha_nacimiento']="'1990/12/22'";

  $user2['email']="'nextu@gmail.com'";
  $user2['nombre']="'next university'";
  $user2['password']="'".password_hash('nextu2',PASSWORD_DEFAULT)."'";
  $user2['fecha_nacimiento']="'1995/10/02'";

  $user3['email']="'jasiel@gmail.com'";
  $user3['nombre']="'jasiel perez'";
  $user3['password']="'".password_hash('nextu3',PASSWORD_DEFAULT)."'";
  $user3['fecha_nacimiento']="'2000/07/10'";


$con=$conexion->initConexion('agenda');
if ($con!='OK') {
  echo "Eror en la conexion con la base de datos";
}
else {
  if ($conexion->insertData('usuario',$user1)) {
     echo 'usuario1 insertado </br>';
  }
  else {
    echo "Error insertando usuario 1 </br>";
  }
  if ($conexion->insertData('usuario',$user2)) {
     echo 'usuario2 insertado </br>';
  }
  else {
    echo "Error insertando usuario 2 </br>";
  }
  if ($conexion->insertData('usuario',$user3)) {
     echo 'usuario3 insertado </br>';
  }
  else {
    echo "Error insertando usuario 3 </br>";
  }
}

$conexion->cerrarConexion();



 ?>
