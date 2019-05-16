<?php
require('banco/Conexao.php');

class Pedido {


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
    $sql = 'SELECT * FROM pedido';
    $pedido = $this->connection->prepare($sql);
    $pedido->execute();
    return $pedido->fetchAll(PDO::FETCH_OBJ);
  }
  /**
   * SELECT - Pedido específico
   * 
   * @param int $id
   * @return object
   */
  public function listarItem($id)
  {
    $sql = 'SELECT * FROM pedido WHERE id = :id';
    $pedido = $this->connection->prepare($sql);
    $pedido->bindValue(':id', $id, PDO::PARAM_INT);
    $pedido->execute();
    return $pedido->fetch(PDO::FETCH_OBJ);
  }



}