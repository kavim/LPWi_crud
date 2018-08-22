<?php

class ClienteDao extends Db implements InterfaceDao {

    private $table = 'cliente';

    public function insert($cliente) {
        
        $stmt = $this->conexao->prepare("INSERT INTO {$this->table} (nome, telefone, saldo) VALUES (:nome, :telefone, :saldo)");

        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':telefone', $cliente->getTelefone());
        $stmt->bindValue(':saldo', $cliente->getSaldo());

        return $stmt->execute();
    }

    public function update($cliente) {
        $stmt = $this->conexao->prepare("UPDATE {$this->table} "
                . "SET nome=:nome, telefone = :telefone, saldo = :saldo WHERE idcliente = :idcliente;");

        $stmt->bindValue(':idcliente', $cliente->getIdcliente());
        $stmt->bindValue(':nome', $cliente->getNome());
        $stmt->bindValue(':telefone', $cliente->getTelefone());
        $stmt->bindValue(':saldo', $cliente->getSaldo());

        return $stmt->execute();
    }

    public function delete($cliente) {
        $stmt = $this->conexao->prepare("DELETE FROM {$this->table} "
                . " WHERE idcliente = :idcliente");

        $stmt->bindValue(':idcliente', $cliente->getIdcliente());

        return $stmt->execute();
    }

    public function select() {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table");
        $stmt->execute();

        $clientes = array();

        while ($linha = $stmt->fetch()) {

            $cliente = new Cliente($linha['idcliente'],$linha['nome'],$linha['telefone'],$linha['saldo']);
            
            $clientes[] = $cliente;
        }
        return $clientes;
    }


    // ALTERADO PQ ACHEI DESNECESSAURO CRIAR UMA CLASSE 2 VEZES
    public function selectById($id) {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table WHERE idcliente = :idcliente");

        $stmt->bindValue(':idcliente', $id);
        $stmt->execute();

        $linha = $stmt->fetch();

        $cliente = new Cliente($linha['idcliente'],$linha['nome'],$linha['telefone'],$linha['saldo']);


        return $cliente;
    }
}
