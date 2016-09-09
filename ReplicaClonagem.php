<?php


class ReplicaClonagem {
    
    
    var $Tabela;
    var $Termos;
    var $AddQuery;
    var $Query;
    var $Param;
    
    function __construct($Tabela, $Termos, $AddQuery) {
        $this->Tabela = $Tabela;
        $this->Termos = $Termos;
        $this->AddQuery = $AddQuery;
    }

    
    //Método específico para alterar os termos
    function setTermos($Termos) {
        $this->Termos = $Termos;
    }
    function Ler() {
        $this->Query = "SELECT * FROM {$this->Tabela} WHERE {$this->Termos} {$this->AddQuery}";
        echo "{$this->Query}<hr>";
    }
    
    function debug($param) {
        $this->Param = $param;
        
        echo '<pre>';
        var_dump($this->Param);
        echo '</pre>';
    }
}
