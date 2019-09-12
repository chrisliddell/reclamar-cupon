<?php
	

	
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){


	//datos del cupon
	$cedula = $_POST['cedula'];
	$reclamar = $_POST['reclamar'];
	
	//credenciales de la base de datos
	$servername = "localhost";
	$username = "root";
	$password = "L2SNS=Hoirm0LL7";
	$dbname = "cuepatijera";

	//conexion con las base de datos
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	//consulta que va a ejecutarse
	$sql = "UPDATE cupon SET activado = true WHERE cedula = " . $cedula . ";";
	
	
	if($conn->query($sql) === FALSE){
		echo "Error";
	}
	echo $sql;

	$conn->close();
	
}

?>