<?php

$conn = 'mysql:host=localhost;dbname=distribuidora';

try {
    $banco = new PDO($conn, 'root', '4321');
    $db->setAttribute(PDO::ATTR_ERROMODE, PDO::ERROMODE_EXEPTION);
} catch (PDOExeption $e) {
    if($e->getCode == 1049){
        echo "BANCO DE DADOS INVÁLIDO";
    }else{
        echo $e->getMessege();
}

