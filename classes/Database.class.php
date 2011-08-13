<?php

class Database
{
    public $db;

    public function __construct()
    {
        global $config;
        $this->db = new PDO("mysql:host={$config['servidor']};dbname={$config['banco']}", $config['usuario'], $config['senha']);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function inserir($tabela, $dados)
    {

        foreach ($dados as $coluna => $valor) {				
            $colunas[] = "`$coluna`";
            $valores[] = $valor;
            $holders[] = "?";					
        }

        $colunas = implode(',', $colunas);
        $holders = implode(',', $holders);

        $sql = "INSERT INTO $tabela ($colunas) VALUES ($holders)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($valores);

    }

    public function alterar($tabela, $dados, $id)
    {

    foreach ($dados as $coluna => $valor) {				
        $colunas[] = "`$coluna` = ?";
        $valores[] = $valor;					
    }

    $colunas = implode(',', $colunas);
    $valores[] = $id;

    $sql = "UPDATE $tabela SET $colunas WHERE id = ?";

    $stmt = $this->db->prepare($sql);
    $stmt->execute($valores);

    }

    public function remover( $tabela, $id )
    {

    $sql = "DELETE FROM $tabela WHERE id = $id";

    $query = $this->db->prepare($sql);

    $query->execute();

    }

    public function listar($tabela, $colunas, $onde = null)
    {

        $sql = "SELECT $colunas FROM $tabela ORDER BY id";


        if ($onde != null) {			
            $sql .= " WHERE $onde";			
        }

        $query = $this->db->prepare($sql);

        $query->execute();

        return $query->fetchAll();
    }

}
