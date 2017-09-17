<?php

require 'conector.php';
session_start();


$conexion=new ConectorBD();
$response['conexion']=$conexion->initConexion('agenda');
if ($response['conexion']!='OK') {
  $response['msg']= "Eror en la conexion con la base de datos";
}
else {
  $tablas='evento';
  $condicion='id="'.$_POST['id'].'"';
  $data['`start_date`']="'".$_POST['start_date']."'";
  $data['`start_hour`']="'".$_POST['start_hour']."'";
  $data['`end_hour`']="'".$_POST['end_hour']."'";
  $data['`end_date`']="'".$_POST['end_date']."'";
  if($conexion->actualizarRegistro($tablas,$data,$condicion)){
    $response['msg']="OK";
  }
  else {
    $response['msg']="No se ha podido actualizar el evento";
  }
  $conexion->cerrarConexion();
  echo json_encode($response);
}


 ?>
