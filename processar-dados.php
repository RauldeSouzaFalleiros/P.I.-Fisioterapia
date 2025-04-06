<?php 
require_once "Config.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];
$data_atual = date("d/m/Y");
$hora_atual = date("H:i:s");


$smtp = $conn -> prepare("INSERT INTO dados(nome, email, mensagem, data, hora) VALUES(?,?,?,?,?,?)");
$smtp -> bind_param("ssssss", $nome, $email, $mensagem, $data_atual, $hora_atual) ;

if($smtp->execute()){
    echo"Dados coletados com sucesso"; 
}else{
    echo"Erro na coleta:".$smtp->error;
}

$smtp->close();
$conn->close();

?> <br><br>
<a href="Agendamento.html" class="btn btn-primary">Voltar</a> 