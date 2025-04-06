<?php

$conn = new mysqLi("localhost", "root", "", "agendamento");

if($conn ->connect_error){
    die("Falha na comunicação com o banco de dados: ". $conn ->connect_error);} 
?>