<?php
class analisadorDR{
    private $cont = 0;
    public $lexico;

    public function __construct(analisadorLex $lexico){
        $this->lexico = $lexico;
    }

    //<Programa> ::= programa identificador ap <Lista_var> fp achave <Lista_comandos> fchave;
    public function Programa(){
        $a =  $this->term('programa') && $this->term('identificador') && $this->term('ap') && $this->Lista_var() && $this->term('fp') && $this->term('achave') && $this->Lista_comandos() && $this->term('fchave');
        var_dump($a);
    }

    //<Lista_var> ::= <Var> <Lista_var> | î;
    public function Lista_var(){
        return ($this->Var() && $this->Lista_var()) || $this->vazio();
    }

    //<Var> ::= <Tipo> identificador;
    public function Var(){
        return $this->Tipo() && $this->term('identificador');
    }

    //<Tipo> ::= int | char | String;
    public function Tipo(){
        return $this->term('int') && $this->term('char') && $this->term('String');
    }

    //<Lista_comandos> ::= <If> <Lista_comandos>| <Else> <Lista_comandos>| <Switch> <Lista_comandos>| î;
    public function Lista_comandos(){
        return $this->If() && $this->Lista_comandos() || $this->Else() && $this->Lista_comandos() || $this->Switch() && $this->Lista_comandos() || $this->vazio();
    }

    //<If> ::= if ap identificador <Comparadores> <Atributos> fp achave <Comandos> fchave;
    public function If(){
        return $this->term('if') && $this->term('ap') && $this->term('identificador') && $this->Comparadores() && $this->Atributos() && $this->term('fp') && $this->term('achave') && $this->Comandos() && $this->term('fchave');
    }

    //<Else> ::= else achave <Comandos> fchave;
    public function Else(){
        return $this->term('else') && $this->term('achave') && $this->Comandos() && $this->term('fchave');
    }
    
    //<Switch> ::= switch ap identificador fp achave <Casos> fchave;
    public function Switch(){
        return $this->term('switch') && $this->term('ap') && $this->term('identificador') && $this->term('fp') && $this->term('achave') && $this->Casos() && $this->term('fchave');
    }

    //<Casos> ::= <Caso> <Casos> | î;
    public function Casos(){
        return $this->Caso() && $this->Casos() || $this->vazio();
    }

    //<Caso> ::= case <Atributos> dp <Comandos>;
    public function Caso(){
        return $this->temr('case') && $this->Atributos() && $this->term('dp') && $this->Comandos(); 
    }

    //<Comparadores> ::= igual | menor | maior | maiorigual | menorigual | diferente;
    public function Comparadores(){
        return $this->term('igual') || $this->term('menor') || $this->term('maior') || $this->term('maiorigual') || $this->term('menorigual') || $this->term('diferente');
    }

    //<Comandos> ::= <Atribuicao> | <Incremento> | <Operacao>;
    public function Comandos(){
        return $this->Atribuicao() || $this->Incremento() || $this->Operacao();
    }

    //<Atribuicao> ::= identificador igual <Atributos> pv;
    public function Atribuicao(){
        return $this->term('identificador') && $this->term('igual') && $this->Atributos() && $this->term('pv');
    }

    //<Atributos> ::= caracter | string | numero | identificador;
    public function Atributos(){
        return $this->term('caractere') || $this->term('string') || $this->term('numero') || $this->term('identificador');
    }

    //<Incremento> ::= identificador <Tip_incremento> pv
    public function Incremento(){
        return $this->term('identificador') && $this->Tip_incremento() && $this->term('pv');
    }

    //<Tip_incremento> ::= maismais | menosmenos;
    public function Tip_incremento(){
        return $this->term('maismais') || $this->term('menosmenos');
    }

    //<Operacao> ::= identificador <Operador> <Atributos> pv;
    public function Operacao(){
        return $this->term('identificador') && $this->Operador() && $this->Atributos() && $this->term('pv');
    }

    //<Operador> ::= mais | menos | barra | mult;
    public function Operador(){
        return $this->term('mais') || $this->term('menos') || $this->term('barra') || $this->term('asterisco');
    }

    public function term($tk){
        return $tk == $this->lexico->tokens[$this->cont++]->tok;
    }

    public function vazio(){
        return true;
    }

}
?>