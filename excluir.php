<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['nome'])) {
        $nome = $_POST['nome'];

        // Preparar a instrução
        $sql = $pdo->prepare('DELETE FROM medicamentos WHERE nome = :nome');
        $sql->bindParam(':nome', $nome);

        // Executar a instrução
        if ($sql->execute()) {
            // Verifica quantas linhas foram afetadas
            if ($sql->rowCount() > 0) {
                echo "Medicamento excluído com sucesso.";
            } else {
                echo "Medicamento não encontrado.";
            }
        } else {
            echo "Erro ao excluir medicamento.";
        }
    } else {
        echo "Por favor, digite o nome do medicamento.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>