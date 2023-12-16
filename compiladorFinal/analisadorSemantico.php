<?php

class Variavel{
    public $id;
    public $tipo;

    public function __construct($id,$tipo){
        $this->id = $id;
        $this->tipo = $tipo;
    }
}

class analisadorSemantico{

    private $tabelaSimbolos = array();
    private $escopo = array();
    private $aux;

    public function __construct(){
        array_push($this->tabelaSimbolos, $this->escopo);
    }

    public function analiseSemantica($acao, $el){
        //echo "(".$acao." ".$el.")";

        switch($acao){
            case 1:{//teste
                array_pop($this->tabelaSimbolos);
                break;
            }
            case 54:{ // encontrou um ID
                $this->aux = $el;
                //$nv = new Variavel($el,"c");
                //$lastElement = end($this->tabelaSimbolos);
                //array_push($lastElement, $nv);
                break;
            }
            case 39:{
                $nv = new Variavel($this->aux,"string");
                $existingIds = [];
                foreach ($this->tabelaSimbolos as $variaveis) {
                    foreach ($variaveis as $existingVariable) {
                        $existingIds[] = $existingVariable->id;
                    }
                }
            
                if (!in_array($nv->id, $existingIds)) {
                    $this->tabelaSimbolos[key($this->tabelaSimbolos)][] = $nv;
                    //print_r($this->tabelaSimbolos[0]);
                }else{

                }
                break;
            }
            case 40:{
                $nv = new Variavel($this->aux, "num");
            
                $existingIds = [];
                foreach ($this->tabelaSimbolos as $variaveis) {
                    foreach ($variaveis as $existingVariable) {
                        $existingIds[] = $existingVariable->id;
                    }
                }
            
                if (!in_array($nv->id, $existingIds)) {
                    $this->tabelaSimbolos[key($this->tabelaSimbolos)][] = $nv;
                    //print_r($this->tabelaSimbolos[0]);
                }else{
                    if ($existingVariable->tipo !== $nv->tipo) {
                        echo "TIPO DE VARIAVEL ERRADO";
                    }
                }
                break;
            }    
            case 8:{ // abre novo escopo teste
                $novoEscopo = array();
                array_push($this->tabelaSimbolos, $novoEscopo);
                break;
            }
        }
        return $this->tabelaSimbolos;
    }

}
?>