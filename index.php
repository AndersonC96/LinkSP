<?php
    include './includes/header.php';
    include './config/db.php';
?>
<div class="container d-flex justify-content-center align-items-center" style="height: 70vh;">
    <div class="card shadow p-4" style="border-radius: 15px; width: 500px;">
        <h2 class="mb-4 text-center">Upload de Arquivo PDF</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data" class="text-center">
            <div class="custom-file mb-4">
                <input type="file" class="custom-file-input" id="file" name="file" accept=".pdf" required>
                <label class="custom-file-label" for="file" id="file-label">Selecione o arquivo PDF</label>
            </div>
            <button type="submit" class="btn btn-success btn-lg w-100">Enviar</button>
        </form>
    </div>
</div>
<script>
    // Atualizar o texto do label quando o arquivo for selecionado
    document.getElementById('file').addEventListener('change', function(e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : 'Selecione o arquivo PDF';
        document.getElementById('file-label').innerText = fileName;
    });
</script>
<?php
    include './includes/footer.php';
?>
