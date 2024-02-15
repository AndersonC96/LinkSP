<?php
    define('DB_HOST', 'localhost');//endereço do banco
    define('DB_USER', 'seu_usuario');//usuário do banco
    define('DB_PASS', '');//senha do banco
    define('DB_NAME', 'linkclientes');//nome do banco
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);//conexão com o banco
    if(!$conn){
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());//mensagem de erro
    }
?>
