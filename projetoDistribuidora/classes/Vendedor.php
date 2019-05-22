<?php
require('banco/Conexao.php');

class Vendedor {


 /**
   * Connection instance
   * @var Database $connection
   */
   private $connection;
   /**
    * Intialize object with connection
    * 
    * @return void
    */
   public function __construct()
   {
     $this->connection = (new Database())->connect();
   }
   
   
  /**
   * SELECT - tudo
   * 
   * @return array
   */
  public function listarTudo()
  {
    $sql = 'SELECT * FROM vendedor';
    $vendedor = $this->connection->prepare($sql);
    $vendedor->execute();
    return $vendedor->fetchAll(PDO::FETCH_OBJ);
  }
  /**
   * SELECT - vendedor específico
   * 
   * @param int $cpf
   * @return object
   */
  public function listarItem($cpf)
  {
    $sql = 'SELECT * FROM vendedor WHERE cpf = :cpf';
    $vendedor = $this->connection->prepare($sql);
    $vendedor->bindValue(':cpf', $cpf, PDO::PARAM_INT);
    $vendedor->execute();
    return $vendedor->fetch(PDO::FETCH_OBJ);
  }

 /**
   * INSERT
   * 
   * @param array $dados
   * @return int
   */
   public function inserir($dados)
   {
     $sql = 'INSERT INTO vendedor (cpf, matricula, nome, telefone, email) ';
     $sql .= 'VALUES (:cpf, :matricula, :nome, :telefone, :email)';
     $vendedor = $this->connection->prepare($sql);
     $vendedor->bindValue(':cpf', $dados['cpf'], PDO::PARAM_STR);
     $vendedor->bindValue(':matricula', $dados['matricula'], PDO::PARAM_STR);
     $vendedor->bindValue(':nome', $dados['nome'], PDO::PARAM_STR);
     $vendedor->bindValue(':telefone', $dados['telefone'], PDO::PARAM_STR);
     $vendedor->bindValue(':email', $dados['email'], PDO::PARAM_STR);
     
     $vendedor->execute();
     return $this->connection->lastInsertId();
   }

/**
   * Update
   * 
   * @param array $dados
   * @return object
   */
   public function atualizar($dados)
   {
     $sql = 'UPDATE vendedor SET cpf = :cpf, matricula = :matricula, nome = :nome, telefone = :telefone, email = :email WHERE cpf = :cpf';
     $vendedor = $this->connection->prepare($sql);
     $vendedor->bindValue(':cpf', $dados['cpf'], PDO::PARAM_INT);
     $vendedor->bindValue(':matricula', $dados['matricula'], PDO::PARAM_STR);
     $vendedor->bindValue(':nome', $dados['nome'], PDO::PARAM_STR);
     $vendedor->bindValue(':telefone', $dados['telefone'], PDO::PARAM_STR);
     $vendedor->bindValue(':email', $dados['email'], PDO::PARAM_STR);
     
     return $vendedor->execute();
   }

   /**
   * DELETE
   * 
   * @param int $cpf
   * @return object
   */
  public function deletar($cpf)
  {
    $sql = 'DELETE FROM vendedor WHERE cpf = :cpf';
    $vendedor = $this->connection->prepare($sql);
    $vendedor->bindValue(':cpf', $cpf, PDO::PARAM_INT);
    return $vendedor->execute();
  }

}