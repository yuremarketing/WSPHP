<?php

class ComportamentoInicial
{
    var $Nome, $Idade, $Profissao, $Salario ;
    var $param;
    
    
    public function __construct($Nome, $Idade, $profissao, $Salario) {
        $this->Nome = (string) $Nome;
        $this->Idade = (int) $Idade;
        $this->Profissao = (string) $profissao;
        $this->Salario = (float) $Salario;
        
    }
    function Ver() {
        echo '<pre>';
        print_r($this);
        echo '</pre>';
    }
    
    function TesteDeTudo($param) {
        
              
        var_dump(dirname(imagecolordeallocate($image, $color)));
    }
    
}
