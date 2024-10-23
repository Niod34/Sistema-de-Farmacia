<?php
require 'conexao.php';

if (isset($_GET['nome'])) {
    $nome = $_GET['nome'];
    $sql = $pdo->prepare('SELECT * FROM medicamentos WHERE nome = :nome');
    $sql->bindParam(':nome', $nome);
    $sql->execute();
    $medicamento = $sql->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Atualiza os dados do medicamento
    $sql = $pdo->prepare('UPDATE medicamentos SET preço = :preço, quantidade = :quantidade, categoria = :categoria, datavalidade = :data WHERE nome = :nome');
    
    $sql->bindParam(':preço', $_POST['preço']);
    $sql->bindParam(':quantidade', $_POST['quantidade']);
    $sql->bindParam(':categoria', $_POST['categoria']);
    $sql->bindParam(':data', $_POST['data']);
    $sql->bindParam(':nome', $_POST['nome']);

    if ($sql->execute()) {
        header('Location: index.php'); // Redireciona após a edição
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastra.css">
    <title>Editar Medicamento</title>
</head>
<body>
    <main class="container">
        <form action="" method="post">
            <h1>Editar Medicamento</h1> <br>    
            <input type="hidden" name="nome" value="<?php echo htmlspecialchars($medicamento['nome']); ?>">
            <label>Nome do medicamento:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($medicamento['nome']); ?>" readonly><br><br>
            
            <label>Preço</label><br>
            <input type="number" name="preço" value="<?php echo htmlspecialchars($medicamento['preço']); ?>" required><br><br>
            
            <label>Quantidade disponível em estoque:</label>
            <input type="number" name="quantidade" value="<?php echo htmlspecialchars($medicamento['quantidade']); ?>" required><br><br>
            
            <label>Categoria:</label><br>
            <select name="categoria" required>
                <option value="Analgésico" <?php echo $medicamento['categoria'] == 'Analgésico' ? 'selected' : ''; ?>>Analgésico</option>
                <option value="Antibiótico" <?php echo $medicamento['categoria'] == 'Antibiótico' ? 'selected' : ''; ?>>Antibiótico</option>
                <option value="Anti-inflamatório" <?php echo $medicamento['categoria'] == 'Anti-inflamatório' ? 'selected' : ''; ?>>Anti-inflamatório</option>
                <option value="Outros" <?php echo $medicamento['categoria'] == 'Outros' ? 'selected' : ''; ?>>Outros</option>
            </select><br><br>
            
            <label>Data de validade:</label>
            <input type="date" name="data" value="<?php echo htmlspecialchars($medicamento['datavalidade']); ?>" required><br><br>

            <button type="submit" class="btn">Atualizar</button>
        </form>
    </main>
</body>
</html>
