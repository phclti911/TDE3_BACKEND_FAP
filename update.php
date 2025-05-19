<?php
require 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM veiculos WHERE id = ?");
$stmt->execute([$id]);
$veiculo = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $disponivel = isset($_POST['disponivel']) ? 1 : 0;

    $sql = "UPDATE veiculos SET marca=?, modelo=?, ano=?, disponivel=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$marca, $modelo, $ano, $disponivel, $id]);

    echo "Veículo atualizado com sucesso!";
    header("Location: read.php");
    exit;
}
?>

<form method="post">
    Marca: <input type="text" name="marca" value="<?= $veiculo['marca'] ?>"><br>
    Modelo: <input type="text" name="modelo" value="<?= $veiculo['modelo'] ?>"><br>
    Ano: <input type="number" name="ano" value="<?= $veiculo['ano'] ?>"><br>
    Disponível: <input type="checkbox" name="disponivel" <?= $veiculo['disponivel'] ? 'checked' : '' ?>><br>
    <input type="submit" value="Atualizar">
</form>
