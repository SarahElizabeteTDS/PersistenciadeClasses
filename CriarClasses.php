<?php

require_once("Conexao.php");

class CriaClasses
{
    private $tbBanco = "Tables_in_Enderecos";
    private $con;

    function __construct()
    {
        $this->con = (new Conexao())->conectar();
    }

    function ClassesModel()
    {
        $sql = "SHOW TABLES";
        $query = $this->con->query($sql);
        $tabelas = $query->fetchAll(PDO::FETCH_OBJ);
        
        foreach($tabelas as $tabela)
        {
            $nomeTabela = ucfirst($tabela->{$this->tbBanco});
            $conteudo = <<<EOT
            class {$nomeTabela}
            {
            }
            EOT;
            print "conteudo:<br><pre>$conteudo</pre><br><br>"; 
        }
    }   
}

(new CriaClasses())->ClassesModel();
