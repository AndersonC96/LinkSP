<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Simple Pharma - Upload de Arquivo</title>
        <link rel="icon" type="image/png" href="https://static.wixstatic.com/media/5ede7b_719545c97a084f288b8566db52756425%7Emv2.png/v1/fill/w_192%2Ch_192%2Clg_1%2Cusm_0.66_1.00_0.01/5ede7b_719545c97a084f288b8566db52756425%7Emv2.png"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            .container{
                margin-top: 20px;
            }
            .custom-file-input{
                cursor: pointer;
            }
            #file-label{
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
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
            <h2 class="mb-4">Upload de Arquivo PDF</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file" accept=".pdf" required>
                        <label class="custom-file-label" for="file" id="file-label">Selecione o arquivo PDF</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div>
        <script>
            function showSuccessPopup(){
                alert("Arquivo adicionado com sucesso");
            }
            window.onload = function(){
                const urlParams = new URLSearchParams(window.location.search);
                const success = urlParams.get('success');
                if(success === 'true'){
                    showSuccessPopup();
                }
            };
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            document.getElementById('file').addEventListener('change', function(e){
                var fileName = e.target.files[0].name;
                var label = document.getElementById('file-label');
                label.innerText = fileName;
            });
        </script>
    </body>
</html>