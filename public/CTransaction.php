<?php

/***************************************************************************
Este archivo se conecta a la base de datos para insertar una 
 nueva transaccion 
 ***************************************************************************/ 
 include_once "dbconnect.php";

 class CTransaction{



  public function agregarTransaccion($key,$idUser){

    $mdbconnect = new dbconnect();
    $mdb = $mdbconnect->getDBConnection();

/***************************************************************************
En esta consulta se obtiene un transaccion del usuario que no esté borrada
***************************************************************************/ 
$resultado = "error";
$command = "select * from transactions where idUser=$idUser and borrado=0;";
$resul=mysql_query($command,$mdb);
$insertar=0;
while ($fila = mysql_fetch_assoc($resul)) {

      //si existe una transaccion entonces no se debe agregar otro
  if($fila['id']>0){
    $insertar=1;
  }
  if($fila['borrado']==0 && $fila['keyTransaction'] != '$key' ){
      $id=$fila['id'];
      $command = "Update qm_recetas.transactions set borrado=1 where id=$id";
      mysql_query($command,$mdb) or die(mysql_error());
      $insertar=0;
  }else{
    $insertar=1;
  }

}  
/***************************************************************************
En esta consulta se obtiene el estado de la cuenta del usuario
***************************************************************************/ 
$command = "select * from account_details where user_id=$idUser;";
$resul=mysql_query($command,$mdb);

while ($fila = mysql_fetch_assoc($resul)) {
 
      //si está  activa entonces no se debe agregar otro
  if($fila['status']=="Activa"){
    $insertar=1;
  }

}  
//inserto va a estar con valor '0' cuando si se deba insertar la transaccion de lo contrario 
//significa que ya hay una transaccion insertada o la cuenta ya está activada 
if($insertar==0){
  $command = "insert into transactions (autorizado,comprobante,tramite,pagado ,idUser,KeyTransaction,borrado)
 values(0,0,0,0,'$idUser','$key',0);";

  if(mysql_query($command,$mdb)){


   $resultado="CORRECTO";
 }
} 
$mdbconnect->closeDBConnection();
return $resultado;
}

}



?>