<?php
require 'conexao.php';

if (isset($_POST['medicamento']) && isset($_POST['quantidade_venda'])) {
    $medicamento = $_POST['medicamento'];
    $quantidade_venda = (int)$_POST['quantidade_venda'];

    // Verificar se o medicamento existe e a quantidade disponível é suficiente
    $sql_verifica = "SELECT quantidade FROM medicamentos WHERE nome = :medicamento";
    $stmt_verifica = $pdo->prepare($sql_verifica);
    $stmt_verifica->bindParam(':medicamento', $medicamento, PDO::PARAM_STR);
    $stmt_verifica->execute();
    $medicamentoData = $stmt_verifica->fetch(PDO::FETCH_ASSOC);

    if ($medicamentoData && $medicamentoData['quantidade'] >= $quantidade_venda) {
        // Atualizar a quantidade do medicamento
        $sql = "UPDATE medicamentos SET quantidade = quantidade - :quantidade_venda WHERE nome = :medicamento";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':quantidade_venda', $quantidade_venda, PDO::PARAM_INT);
        $stmt->bindParam(':medicamento', $medicamento, PDO::PARAM_STR);

        try {
            $stmt->execute();
            header('Location: cadastrohtml.php');
            exit;
        } catch (PDOException $e) {
            echo "Erro ao realizar a venda: " . $e->getMessage();
        }
    } else {
        echo "Medicamento não encontrado ou quantidade insuficiente em estoque.";
    }
} else {
    echo "Por favor, selecione um medicamento e insira a quantidade.";
}
