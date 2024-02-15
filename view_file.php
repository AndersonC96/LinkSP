<?php
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "link";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn->connect_error){
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }
        $id = $_GET['id'];
        $sql = "SELECT * FROM files WHERE id=$id";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $file_path = $row['file_path'];
            echo "<h2>Link de compartilhamento:</h2>";
            echo "<a href='$file_path' target='_blank'>Link</a>";
        }else{
            echo "Arquivo não encontrado.";
        }
        $conn->close();
    }else{
        echo "ID do arquivo não especificado.";
    }
?>