<?php
$host = "db";
$user = "root";
$pass = "root";
$db   = "concessionaria1";
$port = 3306;

$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) die("Erro na conexão: " . $conn->connect_error);

$busca = $_GET['busca'] ?? "";

$sql = "SELECT a.codigo, a.nome AS carro, a.placa, a.chassi, m.nome AS montadora
        FROM automoveis a
        INNER JOIN montadoras m ON a.montadora = m.codigo
        WHERE a.nome LIKE ?";

$stmt = $conn->prepare($sql);
$param = "%" . $busca . "%";
$stmt->bind_param("s", $param);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de Automóveis</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Lista de Automóveis</h3>
        </div>
        <div class="card-body">
            <form class="row g-3 mb-4" method="GET" action="/listaautomoveis.php">
                <div class="col-md-8">
                    <input type="text" class="form-control" name="busca" placeholder="Buscar pelo nome do carro" value="<?= htmlspecialchars($busca) ?>">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="/index.php" class="btn btn-success ms-2">Cadastrar Novo</a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Coude</th>
                            <th>Name</th>
                            <th>Placa</th>
                            <th>Xáçi</th>
                            <th>Montadora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['codigo'] ?></td>
                                <td><?= $row['carro'] ?></td>
                                <td><?= $row['placa'] ?></td>
                                <td><?= $row['chassi'] ?></td>
                                <td><?= $row['montadora'] ?></td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Nenhum automóvel encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
