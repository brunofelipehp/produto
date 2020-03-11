<?php

namespace App\Classes;

use App\Model\ProdutoDao;

class Produto
{

  private $nome;
  private  $descricao;
  private  $preco;
  private  $cor;
  private $id;


  public function getNome()
  {
    return $this->nome;
  }


  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getDescricao()
  {
    return $this->descricao;
  }

  public function setDescricao($descricao)
  {
    $this->descricao = $descricao;
  }


  public function getPreco()
  {
    return $this->preco;
  }

  public function setPreco($preco)
  {
    $this->preco = $preco;
  }


  public function getCor()
  {
    return $this->cor;
  }


  public function setCor($cor)
  {
    $this->cor = $cor;
  }

  public function getId()
  {
    return $this->id;
  }


  public function setId($id)
  {
    $this->id = $id;
  }


public function produtoSessao()
{ 

  //Iniciando a sessão:
if (session_status() !== PHP_SESSION_ACTIVE) {

  session_cache_expire(1);

  session_start();
}

if (isset($_SESSION['msg'])) {

  echo $_SESSION['msg'];
}

//Apagando todos os dados da sessão:
session_unset();

//Destruindo a sessão:
session_destroy();



}

}