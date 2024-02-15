<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "link";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM files";
    $result = $conn->query($sql);
    echo "<h2>Arquivos</h2>";
    echo "<ul>";
    while($row = $result->fetch_assoc()){
        echo "<li><a href='view_file.php?id=".$row['id']."'>".$row['file_name']."</a></li>";
    }
    echo "</ul>";
    $conn->close();
?>