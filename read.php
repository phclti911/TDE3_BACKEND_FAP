<?php
require 'db.php';

$sql = "SELECT * FROM veiculos";
$stmt = $pdo->query($sql);
$veiculos = $stmt->fetchAll();

foreach ($veiculos as $v) {
    echo "ID: {$v['id']} | Marca: {$v['marca']} | Modelo: {$v['modelo']} | Ano: {$v['ano']} | Disponível: " . ($v['disponivel'] ? 'Sim' : 'Não') . "<br>";
    echo "<a href='update.php?id={$v['id']}'>Editar</a><hr>";
}
?>
