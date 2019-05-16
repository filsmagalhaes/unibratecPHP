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



}