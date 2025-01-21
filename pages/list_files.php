<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Phrma - Lista de Arquivos</title>
    <link rel="icon" type="image/png" href="https://static.wixstatic.com/media/5ede7b_719545c97a084f288b8566db52756425%7Emv2.png/v1/fill/w_192%2Ch_192%2Clg_1%2Cusm_0.66_1.00_0.01/5ede7b_719545c97a084f288b8566db52756425%7Emv2.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

<div class="container mt-4">
    <h2 class="mb-4">Arquivos PDF</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nome do Arquivo</th>
                <th>Data de Upload</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "db.php";
            $sql = "SELECT * FROM files ORDER BY id DESC";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><a href='view_file.php?id=".$row['id']."'>".$row['file_name']."</a></td>";
                echo "<td>".date('d/m/Y H:i:s', strtotime($row['data']))."</td>"; // Formata a data
                echo "</tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
