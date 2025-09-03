<?php
$host = "localhost";
$user = "root";
$pass = "root";
$db   = "concessionaria1";
$port = 8889;

$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) die("Erro na conexão: " . $conn->connect_error);

$montadoras = $conn->query("SELECT codigo, nome FROM montadoras");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastro de Automóveis</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Cadastro de Automóveis</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/sistema_automoveis/insere_automovel.php">
                <div class="mb-3">
                    <label class="form-label">Nome do Automóvel</label>
                    <input type="text" class="form-control" name="nome" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Placa</label>
                    <input type="text" class="form-control" name="placa" maxlength="10" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Chassi</label>
                    <input type="text" class="form-control" name="chassi" maxlength="50" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Montadora</label>
                    <select class="form-select" name="montadora" required>
                        <option value="">-- Selecione --</option>
                        <?php while($row = $montadoras->fetch_assoc()): ?>
                            <option value="<?= $row['codigo']; ?>"><?= $row['nome']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="/sistema_automoveis/listaautomoveis.php" class="btn btn-primary ms-2">Ver Automóveis</a>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
