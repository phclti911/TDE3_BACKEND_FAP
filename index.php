<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM veiculos");
$veiculos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Locadora de Veículos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        h1 { color: #333; }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        a.button {
            padding: 6px 12px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-right: 5px;
        }
        a.button.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h1>Locadora de Veículos</h1>
    <a href="create.php" class="button">Adicionar Veículo</a>
    <br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Disponível</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($veiculos as $v): ?>
            <tr>
                <td><?= $v['id'] ?></td>
                <td><?= htmlspecialchars($v['marca']) ?></td>
                <td><?= htmlspecialchars($v['modelo']) ?></td>
                <td><?= $v['ano'] ?></td>
                <td><?= $v['disponivel'] ? 'Sim' : 'Não' ?></td>
                <td>
                <td>
    <a class="button" href="update.php?id=<?= $v['id'] ?>">Editar</a>
    <a class="button delete" href="delete.php?id=<?= $v['id'] ?>" onclick="return confirm('Deseja realmente deletar este veículo?')">Excluir</a>
    <?php if ($v['disponivel']): ?>
        <a class="button" style="background-color: #28a745;" href="alugar.php?id=<?= $v['id'] ?>">Alugar</a>
    <?php endif; ?>
</td>

            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
