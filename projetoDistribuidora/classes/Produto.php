<?php
require('banco/Conexao.php');

class Produto {


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
    $sql = 'SELECT * FROM produto';
    $produto = $this->connection->prepare($sql);
    $produto->execute();
    return $produto->fetchAll(PDO::FETCH_OBJ);
  }
  /**
   * SELECT - Produto específico
   * 
   * @param int $id
   * @return object
   */
  public function listarItem($id)
  {
    $sql = 'SELECT * FROM produto WHERE id = :id';
    $produto = $this->connection->prepare($sql);
    $produto->bindValue(':id', $id, PDO::PARAM_INT);
    $produto->execute();
    return $produto->fetch(PDO::FETCH_OBJ);
  }



}