<?php

        class dbconnect{
          
        	private $hostname = "localhost";
        	private $username = "valornut_admin";
       		private $password = "720i.beta";
       		private $db_id = null;
       		
       		public function getDBConnection(){
			$this->db_id =  mysql_connect($this->hostname, $this->username, $this->password);
			if (!$this->db_id) {
    				die('No pudo conectarse: ' . mysql_error());
			}
			mysql_select_db('qm_recetas',$this->db_id);
			//mysql_query("SET NAMES 'ISO-8859-1'",$this->db_id);
			return $this->db_id;
		}
		
		public function closeDBConnection(){
		  	mysql_close($this->db_id);
  		}
 	
	 	public function Crear_Contacto($conexion, $nombre, $email, $mensaje, $telefono)
		{
		  	$sql = "INSERT INTO `contactos` (`IDContacto`, `Nombre`, `Email`, `Mensaje`, `Fecha`, `Telefono`) VALUES (NULL, '$nombre', '$email', '$mensaje', NOW(), '$telefono');";
			mysql_query($sql,$conexion);
			if(mysql_errno($conexion)==0)
			{
				return "Ok";
			}
			else
			{
				$numerror = mysql_errno($conexion);
				$descrerror = mysql_error($conexion);
				return "Se ha producido un error ($numerror) que corresponde a:<br /><br />$descrerror";
			}
		}	
	}
?>
