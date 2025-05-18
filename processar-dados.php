<?php 
require_once "config.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$agendamento = $_POST["agendamento"];
$data_atual = date("d/m/Y");
$hora_atual = date("H:i:s");


$smtp = $conn -> prepare("INSERT INTO agenda(nome, email, agendamento, data, hora) VALUES(?,?,?,?,?)");
$smtp -> bind_param("sssss", $nome, $email, $agendamento, $data_atual, $hora_atual) ;

if($smtp->execute()){
    echo"Dados coletados com sucesso"; 
}else{
    echo"Erro na coleta:".$smtp->error;
}

$smtp->close();
$conn->close();

?> <br><br>
<a href="Agendamento.html" class="btn btn-primary">Voltar</a> 