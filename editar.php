<?php
require 'conexao.php';

if (!isset($_GET['nome'])) {
    die("Medicamento não especificado.");
}

$nomeMedicamento = $_GET['nome'];

$query = "SELECT * FROM medicamentos WHERE nome = :nome";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':nome', $nomeMedicamento);
$stmt->execute();
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    die("Medicamento não encontrado!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];
    $data = $_POST['data'];

    $updateQuery = "
        UPDATE medicamentos 
        SET preço = :preco, quantidade = :quantidade, categoria = :categoria, datavalidade = :datavalidade 
        WHERE nome = :nome
    ";

    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->bindValue(':preco', $preco);
    $updateStmt->bindValue(':quantidade', $quantidade);
    $updateStmt->bindValue(':categoria', $categoria);
    $updateStmt->bindValue(':datavalidade', $data);
    $updateStmt->bindValue(':nome', $nomeMedicamento);

    if ($updateStmt->execute()) {
        header('Location: cadastrohtml.php'); 
        exit;
    } else {
        echo "Erro ao atualizar o medicamento.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastra.css">
    <title>Editar Medicamento</title>
</head>
<body>
    <main class="container">
        <form action="" method="post" class="form-cadastro">
            <h1>Editar Medicamento</h1><br>

            <label>Nome do Medicamento:</label><br>
            <input type="text" value="<?php echo htmlspecialchars($produto['nome']); ?>" disabled class="form"><br><br>

            <label>Novo Preço:</label><br>
            <input type="number" name="preco" required class="form"><br><br>

            <label>Quantidade Disponível:</label><br>
            <input type="number" name="quantidade" value="<?php echo htmlspecialchars($produto['quantidade']); ?>" required class="form"><br><br>

            <label>Categoria:</label><br> 
            <select name="categoria" required class="form"><br><br>
                <option value="Analgésico" <?php echo ($produto['categoria'] == 'Analgésico') ? 'selected' : ''; ?>>Analgésico</option>
                <option value="Antibiótico" <?php echo ($produto['categoria'] == 'Antibiótico') ? 'selected' : ''; ?>>Antibiótico</option>
                <option value="Anti-inflamatório" <?php echo ($produto['categoria'] == 'Anti-inflamatório') ? 'selected' : ''; ?>>Anti-inflamatório</option>
                <option value="Outros" <?php echo ($produto['categoria'] == 'Outros') ? 'selected' : ''; ?>>Outros</option>
            </select><br><br>

            <label>Data de Validade:</label><br>
            <input type="date" name="data" value="<?php echo htmlspecialchars($produto['datavalidade']); ?>" required class="form"><br><br>

            <button type="submit" class="uiverse">Atualizar </button>
        </form>
    </main>
</body>
</html>
