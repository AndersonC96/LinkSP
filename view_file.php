<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compartilhamento de Arquivo</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body{
                font-family: Arial, sans-serif;
                margin: 50px;
            }
            .container{
                max-width: 600px;
                margin: auto;
            }
            .message{
                text-align: center;
                margin-bottom: 20px;
            }
            .link-container{
                text-align: center;
            }
            .link-container a{
                display: inline-block;
                padding: 10px 20px;
                background-color: #007bff;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }
            .link-container a:hover{
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Simple Pharma</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_files.php">Ver arquivos</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <?php
                if(isset($_GET['id']) && !empty($_GET['id'])){
                    require_once('db.php');
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
    </body>
</html>
