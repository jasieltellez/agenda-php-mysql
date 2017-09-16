<?php
require 'conector.php';

$conexion=new ConectorBD();
$response['conexion']=$conexion->initConexion('agenda');
if ($response['conexion']!='OK') {
  $response['msg']= "Eror en la conexion con la base de datos";
}
else {
  $tablas=['usuario'];
  $campos=['email', 'password'];
  $condicion='WHERE email="'.$_POST['username'].'"';
      $resultado_consulta = $conexion->consultar($tablas,
        $campos, $condicion);

        if ($resultado_consulta->num_rows != 0) {
          $fila = $resultado_consulta->fetch_assoc();
          if (password_verify($_POST['password'], $fila['password'])) {
            $response['msg'] = 'OK';

          }else {
              $response['msg'] = 'Clave incorrecta';
          }
        }else{
          $response['msg'] = 'Email incorrecto';

        }
}

echo json_encode($response);

 ?>
