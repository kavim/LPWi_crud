<?php

class ProdutoDao extends Db implements InterfaceDao {

    private $table = 'produto';

    public function insert($produto) {
        
        $stmt = $this->conexao->prepare("INSERT INTO {$this->table} "
        . " (nome, fornecedor, valorCusto, valorVenda, estoqueAtual, imagem) "
         . " VALUES (:nome, :fornecedor, :valorCusto, :valorVenda, :estoqueAtual, :imagem)");

        

        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':fornecedor', $produto->getFornecedor());
        $stmt->bindValue(':valorCusto', $produto->getValorCusto());
        $stmt->bindValue(':valorVenda', $produto->getValorVenda());
        $stmt->bindValue(':estoqueAtual', $produto->getEstoqueAtual());
        $stmt->bindValue(':imagem', $produto->getImagem());

        return $stmt->execute();
    }

    public function update($produto) {
        $stmt = $this->conexao->prepare("UPDATE {$this->table} "
                . "SET nome=:nome, "
                . "fornecedor = :fornecedor, "
                . "valorCusto = :valorCusto, "
                . "valorVenda = :valorVenda, "
                . "estoqueAtual = :estoqueAtual, "
                . "imagem = :imagem "
                . "WHERE idproduto = :idproduto;");

        $stmt->bindValue(':idproduto', $produto->getIdproduto());
        $stmt->bindValue(':nome', $nome->getProduto());
        $stmt->bindValue(':fornecedor', $produto->getFornecedor());
        $stmt->bindValue(':valorCusto', $produto->getvalorCusto());
        $stmt->bindValue(':valorVenda', $produto->getValorVenda());
        $stmt->bindValue(':estoqueAtual', $produto->getEstoqueAtual());
        $stmt->bindValue(':imagem', $produto->getImagem());


        return $stmt->execute();
    }

    public function delete($produto) {
        $stmt = $this->conexao->prepare("DELETE FROM {$this->table} "
                . " WHERE idproduto = :idproduto");

        $stmt->bindValue(':idproduto', $produto->getIdproduto());

        return $stmt->execute();
    }

    public function select() {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table");
        $stmt->execute();

        $produtos = array();

        while ($linha = $stmt->fetch()) {
            $produto = new Produto();
            $produto->setNome($linha['nome']);
            $produto->setFornecedor($linha['fornecedor']);
            $produto->setValorCusto($linha['valorCusto']);
            $produto->setValorVenda($linha['valorVenda']);
            $produto->setEstoqueAtual($linha['estoqueAtual']);
            $produto->setImagem($linha['imagem']);
            $produto->setIdproduto($linha['idproduto']);

            $produtos[] = $produto;
        }
        return $produtos;
    }

    public function selectById($id) {
        $stmt = $this->conexao->prepare("SELECT * FROM $this->table WHERE idproduto = $id");

        $stmt->execute();

        $linha = $stmt->fetch();

        $produto = new Produto();
        $produto->setNome($linha['nome']);
        $produto->setFornecedor($linha['fornecedor']);
        $produto->setValorCusto($linha['valorCusto']);
        $produto->setValorVenda($linha['valorVenda']);
        $produto->setEstoqueAtual($linha['estoqueAtual']);
        $produto->setImagem($linha['imagem']);
        $produto->setIdproduto($linha['idproduto']);

        return $produto;
    }
}
