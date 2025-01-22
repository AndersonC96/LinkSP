<?php
    include '../includes/header.php';
    include '../config/db.php';
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
            <?php
            require_once "../config/db.php";
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
<?php
    include '../includes/footer.php';
?>