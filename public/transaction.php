<?php 
/***************************************************************************
Este archivo hace el llamado a la clase que se conecta con la base de
datos e inserta un anueva transaccion 
***************************************************************************/
include_once "CTransaction.php";
if(isset($_POST["accion"])){
  $accion = $_POST["accion"];
  if($accion=="guardarKey"){

   $key = $_POST["key"];
   $userId=$_POST["userId"];
   $cTr= new CTransaction();
   echo $cTr->agregarTransaccion($key, $userId);

 }
}

?>