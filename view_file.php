<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('db.php');
    // Obtém o ID do arquivo
    $id = $_GET['id'];

    // Consulta o arquivo no banco de dados
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Gera o link de compartilhamento
        $file_path = $row['file_path'];
        echo "<h2>Link de compartilhamento:</h2>";
        echo "<a href='$file_path' target='_blank'>Link</a>";
    } else {
        echo "Arquivo não encontrado.";
    }

    $conn->close();
} else {
    echo "ID do arquivo não especificado.";
}
?>
