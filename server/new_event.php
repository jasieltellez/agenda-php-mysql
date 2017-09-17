<?php
require 'conector.php';
session_start();

$conexion=new ConectorBD();
$response['conexion']=$conexion->initConexion('agenda');
if ($response['conexion']!='OK') {
  $response['msg']= "Eror en la conexion con la base de datos";
}
else {
  $data['`titulo`']="'".$_POST['titulo']."'";
  $data['`start_date`']="'".$_POST['start_date']."'";
  $data['`start_hour`']="'".$_POST['start_hour']."'";
  $data['`end_hour`']="'".$_POST['end_hour']."'";
  $data['`end_date`']="'".$_POST['end_date']."'";
  $data['`allDay`']="'".$_POST['allDay']."'";
  $data['`email`']="'".$_SESSION['email']."'";


  if ($conexion->insertData('`evento`', $data)) {
    $response['msg']= 'OK';
  }else {
    $response['msg']= 'No se pudo realizar la insercion de los datos';


  }
}
$conexion->cerrarConexion();
echo json_encode($response);
?>
