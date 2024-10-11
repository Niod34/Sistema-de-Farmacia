<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Document</title>
</head>
<body>
    <main>
    <form action="cadastro.php" method="post">
    <h1>Cadastro de Medicamentos</h1><br>
    <label>Nome do medicamento.</label><br>
    <input type="text"  name="nome" required><br><br>
    <label>Preço</label><br>
    <input type="number"  name="preço" placeholder="R$ 0,00" required><br><br>
    <label>Quantidade disponível em estoque.</label><br>
    <input type="number" name="quantidade" required><BR><br>
    <label>Categoria</label><br> <select name="categoria" id="categoria">
<option value="Analgésico">Analgésico</option>
<option value="Antibiótico">Antibiótico</option>
<option value="Anti-inflamatório">Anti-inflamatório</option>
</select><br><br>
    <label>Data de validade.</label><br>
    <input type="date"  name="data" required><br><br>

    <button type="submit">Cadastrar</button>
    </form>
</main>
</body> 
</html>