<?php
//instalando o xamp
//https://www.youtube.com/watch?v=JRhZi10lmOU

echo "olá mundo eu estou aqui" . "<br>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventos";
$table = "empresa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){;
	echo "Erro de conexao: " . $conn->connect_error;
}else{
	
	
	echo "Conexao com sucesso" . "<br>";
	
	$result_empresa = "SELECT * FROM $table";
	$resultado_empresa = mysqli_query($conn, $result_empresa);
	while ($row_empresa = mysqli_fetch_assoc($resultado_empresa)) {
		echo "ID: " . $row_empresa['id_empresa'] . "<br>";
		echo "Nome: " . $row_empresa['nome_empresa'] . "<br>";
	}
    
    echo "<br>";

	/*
    $sql = "INSERT INTO " . $table . " (nome_empresa)  VALUES 
                                       ('Sapo')
                                     ";
    if (mysqli_query($conn,$sql)){
    	echo "Registro gravado com sucesso" . "<br>";
    }else{
    	echo "Erro de gravação: " . mysqli_error($conn);
    }
    */

    $stmt = $conn->prepare("INSERT INTO $table (nome_empresa) VALUES(?)");
    $stmt->bind_param("s", $newnome);
    $newnome = "Casa das Antenas";
    $stmt->execute();
    $newnome = "Fazenda Nova Cruz";
    $stmt->execute();

    $data = array();

    $result = $conn->query("SELECT * FROM $table");
    while ($row = $result->fetch_assoc()) {
    	
    //while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    	//var_dump($row);
    	
    	array_push($data,$row);//gerar um json
    }

    echo "<br>";

    echo json_encode($data);

}

?>