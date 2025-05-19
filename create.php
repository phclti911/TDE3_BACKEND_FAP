<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $disponivel = isset($_POST['disponivel']) ? 1 : 0;

    $sql = "INSERT INTO veiculos (marca, modelo, ano, disponivel) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$marca, $modelo, $ano, $disponivel]);

    echo "Veículo cadastrado com sucesso!";
}
?>

<form method="post">
    Marca: <input type="text" name="marca"><br>
    Modelo: <input type="text" name="modelo"><br>
    Ano: <input type="number" name="ano"><br>
    Disponível: <input type="checkbox" name="disponivel"><br>
    <input type="submit" value="Cadastrar">
</form>
