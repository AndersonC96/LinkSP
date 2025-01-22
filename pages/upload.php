<?php
    require_once "../config/db.php";
    if($_FILES["file"]["error"] > 0){
        echo "Erro: " . $_FILES["file"]["error"] . "<br>";
    }else{
        $target_dir = "../Uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
            $file_name = $_FILES["file"]["name"];
            $file_path = $target_file;
            $sql = "INSERT INTO files (file_name, file_path) VALUES ('$file_name', '$file_path')";
            if ($conn->query($sql) === TRUE){
                header("Location: ../index.php?success=true");
                exit();
            }else{
                echo "Erro ao enviar o arquivo: " . $conn->error;
            }
        }else{
            echo "Erro ao mover o arquivo para o diretório de upload.";
        }
    }
    $conn->close();
?>