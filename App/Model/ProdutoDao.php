<?php

namespace App\Model;

use App\Classes\Produto;

use App\Model\Conexao;


class ProdutoDao {

    public function create( Produto $produto) {

        $sql = "INSERT INTO Produtos (nome, descricao, preco, cor)  
        VALUES (:NOME, :DESCRICAO, :PRECO, :COR)";

        $stmt = Conexao::getConn()->prepare($sql);

        $stmt->bindParam(":NOME", $produto->getNome());
        $stmt->bindParam(":DESCRICAO", $produto->getDescricao());
        $stmt->bindParam(":PRECO", $produto->getPreco());
        $stmt->bindParam(":COR", $produto->getCor());

        $stmt->execute();

        
    }

    
    public function select() {
;

        $sql = "SELECT * FROM Produtos";

        $stmt = Conexao::getConn()->prepare($sql);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            
        $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $resultado;
        }

        

    }

    public function selectOne(Produto $produto) {

        $sql = "SELECT * from Produtos  WHERE id = :ID";

        $stmt = Conexao::getConn()->prepare($sql);

        
        $stmt->bindParam(":ID", $produto->getId());


        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            
        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $resultado;
        }

        

    }

    public function update(Produto $produto) {

        $sql = "UPDATE Produtos 
        SET nome = :NOME , descricao = :DESCRICAO, preco = :PRECO, cor = :COR WHERE id = :ID";

        $stmt = Conexao::getConn()->prepare($sql);

        $stmt->bindParam(":NOME", $produto->getNome());
        $stmt->bindParam(":DESCRICAO", $produto->getDescricao());
        $stmt->bindParam(":PRECO", $produto->getPreco());
        $stmt->bindParam(":COR", $produto->getCor());
        $stmt->bindParam(":ID", $produto->getId());

        $stmt->execute();

    }


    public function delete(Produto $produto){

        $sql = "DELETE FROM Produtos  WHERE id = :ID";

        $stmt = Conexao::getConn()->prepare($sql);

        $stmt->bindParam(":ID", $produto->getId());

        $stmt->execute();

    }


    public function page($limite, $offset) {

        $limite = $limite;

        $offset = $offset;

        $sql = "SELECT * FROM Produtos LIMIT $offset, $limite";

        $stmt = Conexao::getConn()->prepare($sql);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            
        $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $resultado;
        }

}


}