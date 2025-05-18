<?php
require_once "Config.php";

$senhaSecreta = "admin";
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $senhadigitada = $_POST["senha"];

    if($senhadigitada === $senhaSecreta){
        $sql = "SELECT * FROM agenda";
        $result = $conn->query($sql);
    }else{
        echo "<h1>Senha incorreta</h1>";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VER AGENDAMENTO</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div>
        <div class="administração">
            <form method="post">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" required placeholder="Digite a senha"> <br>
                <button type="submit" id="btn_login">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>CONCLUIR OPERAÇÃO       
                </button>
            </form>
</div>
    <div class="agenda">
            <?php if(isset($result) && $result->num_rows >0) : ?> 
                <h2 style="text-align:center">Agenda</h2>
                <ul>
                    <?php while($row = $result->fetch_assoc()) : ?>
                        <li>
                            <strong>Nome: </strong> <?php echo $row["nome"]; ?><br>
                            <strong>email: </strong> <?php echo $row["email"]; ?><br>
                            <strong>agendamento: </strong> <?php echo $row["agendamento"]; ?><br>
                            <strong>Data e Hora: </strong> <?php echo $row["data"]." às ".$row["hora"]; ?><br><br>
                    </li>
                    <?php endwhile; ?>
                </ul> 
                <?php else : ?>
                    <p>Nenhum agendamento encontrado. </p>
                    <?php endif; ?>
    </div>
                    
                    <a href="index.html">Voltar</a>
                    
                    <script src="app.js"></script>
</body>

</html>