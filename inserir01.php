<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventos";
$table = "leitura";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
	echo "Erro de conexao: " . $conn->connect_error;
}else{
	for ($i=0; $i<22;$i++){
		$stmt = $conn->prepare("INSERT INTO $table (topico,id_sensor,valor) VALUES(?,?,?)");
    	$stmt->bind_param("sss", $topi, $idsen, $vall);
    	//empresa/unidade/placa CLP
    	$topi = "1/2/3";
    	$idsen = "4";//temperatura
    	$vall = rand(0,40);
    	$stmt->execute();
    	
    	$idsen = "5";
    	$vall = rand(50,100);//umidade
    	$stmt->execute();

    	$idsen = "2";
    	$vall = "1";//falta de fase
    	$stmt->execute();

    	$idsen = "1";
    	$vall = "1";//presença
    	$stmt->execute();

    	//if($stmt->execute()===TRUE){
    	//	echo "salvei: " . $i ."<br>";
    	//}

    	sleep(5);
	}
	$stmt->close();
	echo "Registros salvos" ."<br>";

}
?>