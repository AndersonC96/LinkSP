<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "link";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }
    if($_FILES["file"]["error"] > 0){
        echo "Erro: " . $_FILES["file"]["error"] . "<br>";
    }else{
        $target_dir = "./Uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
        $file_name = $_FILES["file"]["name"];
        $file_path = $target_file;
        $sql = "INSERT INTO files (file_name, file_path) VALUES ('$file_name', '$file_path')";
        if($conn->query($sql) === TRUE){
            echo "Arquivo enviado com sucesso.";
        }else{
            echo "Erro ao enviar o arquivo: " . $conn->error;
        }
    }
    $conn->close();
?>