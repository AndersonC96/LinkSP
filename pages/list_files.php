<?php
include '../includes/header.php';
include '../config/db.php';

function getFiles($conn) {
    $sql = "SELECT * FROM files ORDER BY id DESC";
    $result = $conn->query($sql);
    if (!$result) {
        die("Erro na consulta: " . $conn->error);
    }
    return $result;
}

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$files = getFiles($conn);
?>

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
            <?php while ($row = $files->fetch_assoc()): ?>
                <tr>
                    <td><a href='view_file.php?id=<?= htmlspecialchars($row['id']) ?>'><?= htmlspecialchars($row['file_name']) ?></a></td>
                    <td><?= htmlspecialchars(date('d/m/Y H:i:s', strtotime($row['data']))) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php
$conn->close();
include '../includes/footer.php';
?>