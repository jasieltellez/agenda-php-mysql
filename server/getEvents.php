<?php
require 'conector.php';
session_start();


$conexion=new ConectorBD();
$response['conexion']=$conexion->initConexion('agenda');
if ($response['conexion']!='OK') {
  $response['msg']= "Eror en la conexion con la base de datos";
}
else {
  $tablas=['evento'];
  $campos=['id', 'titulo','start_date','start_hour','end_hour','end_date','allDay'];
  $condicion='WHERE email="'.$_SESSION['email'].'"';
  $resultado_consulta = $conexion->consultar($tablas,$campos, $condicion);

  $i=0;
      while ($fila = $resultado_consulta->fetch_assoc()) {
        $response['eventos'][$i]['id']=$fila['id'];
        $response['eventos'][$i]['titulo']=$fila['titulo'];
        $response['eventos'][$i]['start']=$fila['start_date'];
        $response['eventos'][$i]['tstart']=$fila['start_hour'];
        $response['eventos'][$i]['tend']=$fila['end_hour'];
        $response['eventos'][$i]['end']=$fila['end_date'];
        $response['eventos'][$i]['allDay']=$fila['allDay'];

        $i++;
      }
$response['msg']="OK";
}
$conexion->cerrarConexion();
echo json_encode($response);

 ?>
