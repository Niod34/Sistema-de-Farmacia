<?php
require 'conexao.php';

$sql = $pdo->query('SELECT * FROM medicamentos');
$farmacia = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require 'conexao.php';

$sql = $pdo->query('SELECT * FROM medicamentos');
$farmacia = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastra.css">
    <title>Cadastro de Medicamentos</title>
</head>
<body>
    <main class="container">
        <form action="cadastro.php" method="post" class="form-cadastro">
            <h1>Cadastro de Medicamentos</h1><br>
            <label>Nome do medicamento:</label><br>
            <input type="text" name="nome" required class="form"><br><br>
            
            <label>Preço:</label><br>
            <input type="number" name="preço" placeholder="R$ 0,00" required class="form"><br><br>
            
            <label>Quantidade disponível em estoque:</label><br>
            <input type="number" name="quantidade" required class="form"><br><br>
            
            <label>Categoria:</label><br> 
            <select name="categoria" id="categoria">
                <option value="Analgésico">Analgésico</option>
                <option value="Antibiótico">Antibiótico</option>
                <option value="Anti-inflamatório">Anti-inflamatório</option>
                <option value="Outros">Outros</option>
            </select><br><br>
            
            <label>Data de validade:</label><br>
            <input type="date" name="data" required class="form"><br><br>
            
            <button class="uiverse">Cadastrar</button>
        </form>

        <div class="container-table">
            <table class="table">
                <thead class="shadowbx">
                    <tr>
                        <th scope="col">Nome do medicamento</th>
                        <th scope="col">Preço unitário</th>
                        <th scope="col">Quantidade disponível</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Data de validade</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($farmacia as $produto) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($produto["nome"]); ?></td>
                        <td><?php echo htmlspecialchars($produto["preço"]); ?></td>
                        <td><?php echo htmlspecialchars($produto["quantidade"]); ?></td>
                        <td><?php echo htmlspecialchars($produto["categoria"]); ?></td>
                        <td><?php echo htmlspecialchars($produto["datavalidade"]); ?></td>
                        <td>
                            <!-- Botão de Editar -->
                            <form action="editar.php" method="get" style="display:inline;">
                                <input type="hidden" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>">
                                <button type="submit" class="btn-editar">Editar</button>
                            </form>
                            <!-- Botão de Excluir -->
                            <form action="excluir.php" method="post" style="display:inline;">
                                <input type="hidden" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>">
                                <button type="submit" class="btn-excluir">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body> 
</html>
