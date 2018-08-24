<?php

class Venda {
    private $idvenda;
    private $dataVenda;
    private $valorFinal;
    private $cliente;
    private $quantidade;


    function getIdvenda() {
        return $this->idvenda;
    }

    function getDataVenda() {
        return $this->dataVenda;
    }

    function getValorFinal() {
        return $this->valorFinal;
    }
    function getCliente() {
        return $this->cliente;
    }
    function getQuantidade() {
        return $this->quantidade;
    }

    function setIdvenda($idvenda) {
        $this->idvenda = $idvenda;
    }

    function setDataVenda($dataVenda) {
        $this->dataVenda = $dataVenda;
    }

    function setValorFinal($valorFinal) {
        $this->valorFinal = $valorFinal;
    }
    function setCliente($cliente) {
        $this->cliente = $cliente;
    }
    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }


}
