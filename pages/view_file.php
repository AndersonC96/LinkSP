<?php
    include '../includes/header.php';
    include '../config/db.php';
?>
        <div class="container">
            <?php
                if(isset($_GET['id']) && !empty($_GET['id'])){
                    require_once('../config/db.php');
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM files WHERE id=$id";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        $row = $result->fetch_assoc();
                        $file_path = $row['file_path'];
                        echo "<div class='message'><h2>Link de compartilhamento</h2></div>";
                        echo "<div class='link-container'><a href='$file_path' target='_blank'>Clique aqui para gerar o link do arquivo</a></div>";
                    }else{
                        echo "<div class='message'><p>Arquivo não encontrado.</p></div>";
                    }
                    $conn->close();
                }else{
                    echo "<div class='message'><p>ID do arquivo não especificado.</p></div>";
                }
            ?>
        </div>
<?php
    include '../includes/footer.php';
?>