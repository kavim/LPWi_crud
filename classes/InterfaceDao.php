<?php

interface InterfaceDao {

    public function insert($objeto);

    public function delete($objeto);

    public function update($objeto);

    public function selectById($objeto);

    public function select();
}
