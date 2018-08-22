<?php

class VendaDao extends Db implements InterfaceDao {

    private $table = 'venda';

    public function insert($venda) {
        $stmt = $this->conexao->prepare("INSERT INTO {$this->table} "
        . " (valorFilal, dataVenda, idcliente) "
         . " VALUES (:valorFilal, :dataVenda, :idcliente)");

        $stmt->bindValue(':valorFilal', $venda->getValorFinal());
        $stmt->bindValue(':dataVenda', $venda->getDataVenda());
        $stmt->bindValue(':preco', $venda->getValorFinal());
        $stmt->bindValue(':idcliente', $venda->getcliente());

        return $stmt->execute();
    }

    public function update($venda) {
        $stmt = $this->conexao->prepare("UPDATE {$this->table} "
                . "SET valorFilal=:valorFilal, "
                . "dataVenda = :dataVenda, "
                . "idcliente = :idcliente "
                . "WHERE idvenda = :idvenda;");

        $stmt->bindValue(':idvenda', $venda->getIdvenda());
        $stmt->bindValue(':valorFilal', $venda->getValorFinal());
        $stmt->bindValue(':dataVenda', $venda->getDataVenda());
        $stmt->bindValue(':idcliente', $venda->getCliente());


        return $stmt->execute();
    }

    public function delete($venda) {
        $stmt = $this->conexao->prepare("DELETE FROM {$this->table} "
                . " WHERE idvenda = :idvenda");

        $stmt->bindValue(':idvenda', $venda->getIdvenda());

        return $stmt->execute();
    }

    public function select() {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table");
        $stmt->execute();

        $vendas = array();

        while ($linha = $stmt->fetch()) {
            $venda = new Venda();
            $venda->setValorFinal($linha['valorFinal']);
            $venda->setDataVenda($linha['dataVenda']);
            $venda->setIdvenda($linha['idvenda']);

            $vendas[] = $venda;
        }
        return $vendas;
    }

    public function selectById($venda) {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table WHERE idvenda = :idvenda");

        $stmt->bindValue(':idvenda', $venda->getIdvenda());
        $stmt->execute();

        $linha = $stmt->fetch();

        $venda = new Venda();
        $venda->setValorFinal($linha['valorFilal']);
        $venda->setDataVenda($linha['dataVenda']);
        $venda->setIdvenda($linha['idvenda']);

        return $venda;
    }

    public function selectByCliente($cliente) {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table where idcliente = :idcliente");

        $stmt->bindValue(':idcliente', $cliente);

        $stmt->execute();

        $vendas = array();

        while ($linha = $stmt->fetch()) {
            $venda = new Venda();
            $venda->setValorFinal($linha['valorFilal']);
            $venda->setDataVenda($linha['dataVenda']);
            $venda->setIdvenda($linha['idvenda']);

            $vendas[] = $venda;
        }
        return $vendas;
    }
}
