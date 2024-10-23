<?php
require 'conexao.php';

$nome = $_POST["nome"];
$preço = $_POST["preço"];
$quantidade = $_POST["quantidade"];
$categoria = $_POST["categoria"];
$data = $_POST["data"];


$sql = "INSERT INTO medicamentos (nome, preço, quantidade, categoria, datavalidade) VALUES ('$nome', '$preço', $quantidade, '$categoria', '$data')";

try {
    // Executar a consulta
    $pdo->exec($sql);
    header('Location: cadastrohtml.php'); // Atualiza a página
    exit;
} catch (PDOException $e) {
    echo "Erro ao cadastrar produto: " . $e->getMessage();
}
?>
