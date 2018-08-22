<?php

class Venda {
    private $idvenda;
    private $dataVenda;
    private $valorFinal;

    function getIdvenda() {
        return $this->idvenda;
    }

    function getDataVenda() {
        return $this->dataVenda;
    }

    function getValorFinal() {
        return $this->valorFilal;
    }
    function getCliente() {
        return $this->cliente;
    }

    function setIdvenda($idvenda) {
        $this->idvenda = $idvenda;
    }

    function setDataVenda($dataVenda) {
        $this->dataVenda = $dataVenda;
    }

    function setValorFinal($valorFinal) {
        $this->valorFilal = $valorFinal;
    }
    function setCliente($cliente) {
        $this->ccliente = $cliente;
    }


}
