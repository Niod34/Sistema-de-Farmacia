<?php

require 'conexao.php';

$sql = $pdo->query('SELECT * FROM medicamentos');

$farmacia = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ler.css">
</head>
<body>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Nome do medicamento</th>
      <th scope="col">Preço unitário</th>
      <th scope="col">Quantidade disponível em estoque</th>
      <th scope="col">Categoria</th>
      <th scope="col">Data de validade.</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($farmacia as $produto) : ?>
    <tr>
      <td><?php echo $produto["nome"]; ?></td>
      <td><?php echo $produto["preço"]; ?></td>
      <td><?php echo $produto["quantidade"]; ?></td>
      <td><?php echo $produto["categoria"]; ?></td>
      <td><?php echo $produto["datavalidade"]; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
