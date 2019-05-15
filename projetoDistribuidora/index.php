<?php
include "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Teste CRUD</title>
    </head>


    <body>

        <header>

            <div class="container">
                <h1 class="muted">Cadastro Empresa</h1>
                <form method="post" action="">
                    <label> Nome Fantasia </label><br />
                    <input type="text" value="<?php echo $result->nome; ?>" placeholder="Nome:"/><br/>
                    <label> CNPJ </label><br/>
                    <input type="text" value="<?php echo $result->cnpj; ?>" placeholder="Cnpj:"/><br/>
                    <label> Telefone </label><br />
                    <input type="text" value="<?php echo $result->fone; ?>" placeholder="Fone:"/><br/>
                    <label> Email </label><br />
                    <input type="text" value="<?php echo $result->email; ?>" placeholder="Email:"/><br/>
                    <br />
                    <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados"/>
                </form>
            </div>

            <?php
                    # CREATE
                    if(isset($_POST['enviar'])){
                        $nome  = $_POST['nome'];
                        $cnpj = $_POST['cnpj'];
                        $fone = $_POST['fone'];
                        $email = $_POST['email'];

                        $sql  = 'INSERT INTO cliente (nome, cnpj, fone, email) ';
                        $sql .= 'VALUES (:nome, :cnpj, :fone, :email)';

            ?>

        </header>

    </body>
          
</html>