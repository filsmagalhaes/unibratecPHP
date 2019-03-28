<?php 

$connection = new PDO('mysql:host=localhost;dbname=contacts', 'root', '');

//statement (instrução para inserção no banco)
$stmt = $connection->prepare('INSERT INTO people (nome, phone, email) VALUES ("Bill Gates", "81-55887456", "billlindo@msn.com")'); 

$stmt->execute();