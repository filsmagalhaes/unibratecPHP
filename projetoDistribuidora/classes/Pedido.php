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

  

  /**
   * INSERT
   * 
   * @param array $dados
   * @return int
   */
   public function inserir($dados)
   {
     $sql = 'INSERT INTO pedido (id, quantidade, forma_pagamento, idCliente, idProduto) ';
     $sql .= 'VALUES (:id, :quantidade, :forma_pagamento, :idCliente, :idProduto) ';
     $pedido = $this->connection->prepare($sql);
     $pedido->bindValue(':id', $dados['id'], PDO::PARAM_STR);
     $pedido->bindValue(':quantidade', $dados['quantidade'], PDO::PARAM_STR);
     $pedido->bindValue(':forma_pagamento', $dados['forma_pagamento'], PDO::PARAM_STR);
     $pedido->bindValue(':idCliente', $dados['idCliente'], PDO::PARAM_STR);
     $pedido->bindValue(':idProduto', $dados['idProduto'], PDO::PARAM_STR);
         
     $pedido->execute();
     return $this->connection->ultimoIdInserido();
   }

/**
   * Update
   * 
   * @param array $dados
   * @return object
   */
   public function atualizar($dados)
   {
     $sql = 'UPDATE pedido SET id = :id, quantidade = :quantidade, forma_pagamento = :forma_pagamento, idCliente = :idCliente, idProduto = :idProduto WHERE id = :id';
     $pedido = $this->connection->prepare($sql);
     $pedido->bindValue(':id', $dados['id'], PDO::PARAM_STR);
     $pedido->bindValue(':quantidade', $dados['quantidade'], PDO::PARAM_STR);
     $pedido->bindValue(':forma_pagamento', $dados['forma_pagamento'], PDO::PARAM_STR);
     $pedido->bindValue(':idCliente', $dados['idCliente'], PDO::PARAM_STR);
     $pedido->bindValue(':idProduto', $dados['idProduto'], PDO::PARAM_STR);
     
     return $pedido->execute();
   }

   /**
   * DELETE
   * 
   * @param int $id
   * @return object
   */
  public function deletar($id)
  {
    $sql = 'DELETE FROM pedido WHERE id = :id';
    $pedido = $this->connection->prepare($sql);
    $pedido->bindValue(':id', $id, PDO::PARAM_INT);
    return $pedido->execute();
  }


}