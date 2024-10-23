<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'])) {
    $nomeMedicamento = $_POST['nome'];

    $sql = $pdo->prepare('DELETE FROM medicamentos WHERE nome = :nome');
    $sql->bindParam(':nome', $nomeMedicamento);

    if ($sql->execute()) {
        // Excluído com sucesso, redireciona para a lista
        header('Location: cadastrohtml.php'); // Atualiza a página
        exit;
    } else {
        echo "Erro ao excluir o medicamento.";
    }
}
?>
