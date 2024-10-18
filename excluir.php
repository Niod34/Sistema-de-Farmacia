<?php
require 'conexao.php';

$sql = $pdo->prepare('DELETE FROM medicamentos WHERE nome = :nome');
       
$sql->bindParam(':nome', $_GET ['nome']);

        ($sql->execute());
?>