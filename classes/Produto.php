<?php

class Produto {
    private $idproduto;
    private $nome;
    private $fornecedor;
    private $valorCusto;
    private $valorVenda;
    private $imagem;

    function getIdproduto() {
        return $this->idproduto;
    }

    function getNome() {
        return $this->nome;
    }
    function getFornecedor() {
        return $this->fornecedor;
    }

    function getvalorCusto() {
        return $this->valorCusto;
    }

    function getValorVenda() {
        return $this->valorVenda;
    }
    function getEstoqueAtual() {
        return $this->estoqueAtual;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setIdproduto($idproduto) {
        $this->idproduto = $idproduto;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setFornecedor($fornecedor) {
        $this->fornecedor = $fornecedor;
    }
    function setValorCusto($valorCusto) {
        $this->valorCusto = $valorCusto;
    }

    function setValorVenda($valorVenda) {
        $this->valorVenda = $valorVenda;
    }
    function setEstoqueAtual($estoqueAtual) {
        $this->estoqueAtual = $estoqueAtual;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }


}
