<?php
require('banco/Conexao.php');

class Cliente {


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
    $sql = 'SELECT * FROM cliente';
    $cliente = $this->connection->prepare($sql);
    $cliente->execute();
    return $cliente->fetchAll(PDO::FETCH_OBJ);
  }
  /**
   * SELECT - cliente específico
   * 
   * @param int $cnpj
   * @return object
   */
  public function listarItem($cnpj)
  {
    $sql = 'SELECT * FROM cliente WHERE cnpj = :cnpj';
    $cliente = $this->connection->prepare($sql);
    $cliente->bindValue(':cnpj', $cnpj, PDO::PARAM_INT);
    $cliente->execute();
    return $cliente->fetch(PDO::FETCH_OBJ);
  }

  /**
   * INSERT
   * 
   * @param array $dados
   * @return int
   */
   public function inserir($dados)
   {
     $sql = 'INSERT INTO cliente (cnpj, nome, telefone, email) ';
     $sql .= 'VALUES (:cnpj, :nome, :telefone, :email)';
     $cliente = $this->connection->prepare($sql);
     $cliente->bindValue(':cnpj', $dados['cnpj'], PDO::PARAM_STR);
     $cliente->bindValue(':nome', $dados['nome'], PDO::PARAM_STR);
     $cliente->bindValue(':telefone', $dados['telefone'], PDO::PARAM_STR);
     $cliente->bindValue(':email', $dados['email'], PDO::PARAM_STR);
     
     $cliente->execute();
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
     $sql = 'UPDATE cliente SET cnpj = :cnpj, nome = :nome, telefone = :telefone, email = :email WHERE cnpj = :cnpj';
     $cliente = $this->connection->prepare($sql);
     $cliente->bindValue(':cnpj', $dados['cnpj'], PDO::PARAM_INT);
     $cliente->bindValue(':nome', $dados['nome'], PDO::PARAM_STR);
     $cliente->bindValue(':telefone', $dados['telefone'], PDO::PARAM_STR);
     $cliente->bindValue(':email', $dados['email'], PDO::PARAM_STR);
     
     return $cliente->execute();
   }

   /**
   * DELETE
   * 
   * @param int $cnpj
   * @return object
   */
  public function deletar($cnpj)
  {
    $sql = 'DELETE FROM cliente WHERE cnpj = :cnpj';
    $cliente = $this->connection->prepare($sql);
    $cliente->bindValue(':cnpj', $cnpj, PDO::PARAM_INT);
    return $cliente->execute();
  }
}