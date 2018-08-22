<?php

class Cliente {
    private $idcliente;
    private $nome;
    private $telefone;
    private $saldo;


    function __construct($idcliente=NULL,$nome,$telefone,$saldo) {
        $this->idcliente = $idcliente;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->telefone = $telefone;
    }

    function getIdcliente() {
        return $this->idcliente;
    }

    function getNome() {
        return $this->nome;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getSaldo() {
        return $this->saldo;
    }

    function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }


}
