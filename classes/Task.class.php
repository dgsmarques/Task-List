<?php
class Task
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function criarTask( $dados )
    {
        $this->db->inserir('tasks', $dados);
    }

    public function alterarTask( $dados, $id )
    {
        $this->db->alterar('tasks', $dados, $id);	
    }

    public function removerTask( $id )
    {
        $this->db->remover('tasks', $id);
    }

    public function listarTask( $colunas )
    {
        $resultados = $this->db->listar('tasks', $colunas);
        return $resultados;
    }

    public function verTask( $colunas, $id )
    {
        $resultados = $this->db->listar('tasks', $colunas, "id = $id");		 
        return $resultados;
    }
}
