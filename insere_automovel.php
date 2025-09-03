<?php
$host = "localhost";
$user = "root";
$pass = "root";
$db   = "concessionaria1";
$port = 8889;

$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) die("Erro na conexão: " . $conn->connect_error);

$message = "";
$messageClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome      = $_POST['nome'];
    $placa     = $_POST['placa'];
    $chassi    = $_POST['chassi'];
    $montadora = $_POST['montadora'];

    $sql = "INSERT INTO automoveis (nome, placa, chassi, montadora) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nome, $placa, $chassi, $montadora);

    if ($stmt->execute()) {
        $message = "✅ Automóvel cadastrado com sucesso!";
        $messageClass = "alert-success";
    } else {
        $message = "❌ Erro ao cadastrar: " . $stmt->error;
        $messageClass = "alert-danger";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Resultado Cadastro</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Resultado do Cadastro</h3>
        </div>
        <div class="card-body">
            <?php if($message): ?>
                <div class="alert <?= $messageClass ?> text-center" role="alert">
                    <?= $message ?>
                </div>
            <?php endif; ?>
            <div class="text-center">
                <a href="/sistema_automoveis/index.php" class="btn btn-success me-2">Voltar para Cadastro</a>
                <a href="/sistema_automoveis/listaautomoveis.php" class="btn btn-primary">Ver Automóveis</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
