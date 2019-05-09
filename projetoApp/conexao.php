<?php

$conn = 'mysql:host=localhost;dbname=appone';

try {
    $banco = new PDO($conn, 'root', '4321');
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExeption $e) {
    if($e->getCode == 1049){
        echo "BANCO DE DADOS INVÁLIDO";
    }else{
        echo $e->getMessege();
    }    
}
