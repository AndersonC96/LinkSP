<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];

if (isset($_POST['upload'])) {
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_destination = 'uploads/' . $file_name;

    if (move_uploaded_file($file_tmp, $file_destination)) {
        $query = "INSERT INTO files (user_id, filename, file_path) VALUES ((SELECT id FROM users WHERE username='$username'), '$file_name', '$file_destination')";
        mysqli_query($conn, $query);
        $success = "Arquivo enviado com sucesso!";
    } else {
        $error = "Erro ao enviar o arquivo.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload de Arquivo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Upload de Arquivo</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" class="form-control-file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary" name="upload">Enviar</button>
        </form>
        <?php if (isset($success)) : ?>
            <div class="alert alert-success mt-3" role="alert"><?php echo $success; ?></div>
        <?php endif; ?>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger mt-3" role="alert"><?php echo $error; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
