<?php


function canjeado($b){
	if($b == 1) 
		return "si";
	else 
		return "no";
}
	
	$style =   "background-color: #4CAF50; 
  border: none;
  color: white;
  float: right;
  padding: 2%;
  text-decoration: none;
  font-size: 14px;
  margin-left: 0px;
  margin-right:20px;";

	//credenciales de la base de datos
	$servername = "localhost";
	$username = "root";
	$password = "L2SNS=Hoirm0LL7";
	$dbname = "cuepatijera";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM cupon;";
	$result = $conn->query($sql);


while($row =  $result->fetch_assoc()){
		echo  $row["nombre"] . ",";
		echo  $row["cedula"] . ",";
		echo  $row["correo"] . ",";
		echo  $row["telefono"] . ",";
		echo  $row["genero"] . ",";
		echo  $row["edad"] . ",";
		echo  $row["tienda"] . ",";
		if($row["activado"] == 0){
			echo  canjeado($row["activado"]) . "<button type='button'  value='".$row["cedula"]."' onclick='reclamar( this.value)' style='".$style."'>Reclamar</button> ";
		}
		else{
			echo 'si';
		}

		
echo "*";
}


	$conn->close();

?>