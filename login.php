<?php
    session_start();//inicia a sessão
    require_once 'config.php';//inclui o arquivo de configuração
    if(isset($_POST['login'])){
        $username = $_POST['username'];//pega o usuário
        $password = $_POST['password'];//pega a senha
        $query = "SELECT * FROM users WHERE username='$username'";//seleciona o usuário
        $result = mysqli_query($conn, $query);//executa a query
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])){
                $_SESSION['username'] = $username;
                header('Location: index.php');
                exit;
            }else{
                $error = "Senha incorreta";
            }
        }else{
            $error = "Usuário não encontrado";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./CSS/styleLogin.css"/>
    </head>
    <body>
        <div class="container">
            <h2>Login</h2>
            <form method="post">
                <div class="form-group">
                    <!--<label for="username">Usuário:</label>-->
                    <input type="text" class="form-control" id="username" name="username" placeholder="Usuário" required>
                </div>
                <br>
                <div class="form-group">
                    <!--<label for="password">Senha:</label>-->
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                </div>
                <br>
                <button type="submit" class="btn btn-success" name="login">Entrar</button>
            </form>
            <?php if (isset($error)) : ?>
            <div class="alert alert-danger mt-3" role="alert"><?php echo $error; ?></div>
            <?php endif; ?>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>