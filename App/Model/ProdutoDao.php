<?php

namespace App\Model;

use App\Classes\Produto;

use App\Model\Conexao;


class ProdutoDao
{

    public function create(Produto $produto)
    {

        $sql = "INSERT INTO Produtos (nome, descricao, preco, cor)  
        VALUES (:NOME, :DESCRICAO, :PRECO, :COR)";

        $stmt = Conexao::getConn()->prepare($sql);


        $nome = $produto->getNome();
        $descricao = $produto->getDescricao();
        $preco = $produto->getPreco();
        $cor = $produto->getCor();

        $stmt->bindParam(":NOME", $nome);
        $stmt->bindParam(":DESCRICAO", $descricao);
        $stmt->bindParam(":PRECO", $preco);
        $stmt->bindParam(":COR", $cor);


        $stmt->execute();
    }


    public function select()
    {;

        $sql = "SELECT * FROM Produtos";

        $stmt = Conexao::getConn()->prepare($sql);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $resultado;
        }
    }

    public function selectOne(Produto $produto)
    {

        $sql = "SELECT * from Produtos  WHERE id = :ID";

        $stmt = Conexao::getConn()->prepare($sql);

        $id = $produto->getId();
        $stmt->bindParam(":ID", $id);


        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $resultado;
        }
    }

    public function update(Produto $produto)
    {

        $sql = "UPDATE Produtos 
        SET nome = :NOME , descricao = :DESCRICAO, preco = :PRECO, cor = :COR WHERE id = :ID";

        $stmt = Conexao::getConn()->prepare($sql);

        $nome = $produto->getNome();
        $descricao = $produto->getDescricao();
        $preco = $produto->getPreco();
        $cor = $produto->getCor();
        $id = $produto->getId();

        $stmt->bindParam(":NOME", $nome);
        $stmt->bindParam(":DESCRICAO", $descricao);
        $stmt->bindParam(":PRECO", $preco);
        $stmt->bindParam(":COR", $cor);
        $stmt->bindParam(":ID", $id);

        $stmt->execute();
    }


    public function delete(Produto $produto)
    {

        $sql = "DELETE FROM Produtos  WHERE id = :ID";

        $stmt = Conexao::getConn()->prepare($sql);

        $stmt->bindParam(":ID", $produto->getId());

        $stmt->execute();
    }


    public function page($limite, $offset)
    {

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

    public static function beginTransaction()
    {
        Conexao::getConn()->beginTransaction();
    }

    // Método para efetuar o commit de uma transação
    public static function commit()
    {
        Conexao::getConn()->commit();
    }
}
