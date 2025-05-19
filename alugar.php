<?php
require 'db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM veiculos WHERE id = ?");
$stmt->execute([$id]);
$veiculo = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = $_POST['cliente'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];

    // Inserir aluguel
    $stmt = $pdo->prepare("INSERT INTO alugueis (veiculo_id, cliente, data_inicio, data_fim) VALUES (?, ?, ?, ?)");
    $stmt->execute([$id, $cliente, $data_inicio, $data_fim]);

    // Marcar veículo como indisponível
    $stmt = $pdo->prepare("UPDATE veiculos SET disponivel = 0 WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Alugar Veículo</title>
</head>
<body>
    <h2>Alugar: <?= $veiculo['marca'] . ' ' . $veiculo['modelo'] ?></h2>
    <form method="post">
        Nome do Cliente: <input type="text" name="cliente" required><br><br>
        Data Início: <input type="date" name="data_inicio" required><br><br>
        Data Fim: <input type="date" name="data_fim" required><br><br>
        <input type="submit" value="Confirmar Aluguel">
    </form>
</body>
</html>
