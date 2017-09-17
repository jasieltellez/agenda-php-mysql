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
        $response['eventos'][$i]['title']=$fila['titulo'];
        $response['eventos'][$i]['start']=$fila['start_date']."T".$fila['start_hour'];
        $response['eventos'][$i]['end']=$fila['end_date']."T".$fila['end_hour'];
        if ($fila['allDay']=='1') {
            $response['eventos'][$i]['allDay']=true;
        }
        else {
            $response['eventos'][$i]['allDay']=false;
        }


        $i++;
      }
$response['msg']="OK";
}
$conexion->cerrarConexion();
echo json_encode($response);

 ?>
