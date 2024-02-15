<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Simple Pharma - Upload de Arquivos</title>
        <link rel="icon" type="image/png" href="https://static.wixstatic.com/media/5ede7b_719545c97a084f288b8566db52756425%7Emv2.png/v1/fill/w_32%2Ch_32%2Clg_1%2Cusm_0.66_1.00_0.01/5ede7b_719545c97a084f288b8566db52756425%7Emv2.png"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <br>
            <h2>Upload de Arquivo</h2>
            <br>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <!--<label for="file">Selecione o arquivo:</label>-->
                    <input type="file" name="file" id="file" class="form-control-file">
                </div>
                <br>
                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div>
    </body>
</html>