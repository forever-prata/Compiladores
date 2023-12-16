<?php
class analisadorDR{
    private $cont = 0;
    public $lexico;

    public function __construct(analisadorLex $lexico){
        $this->lexico = $lexico;
    }

    //<Programa> ::= programa identificador ap <Lista_var> fp achave <Lista_comandos> fchave;
    public function Programa(){
        return $this->term('programa') && $this->term('identificador') && $this->term('ap') && $this->Lista_var() && $this->term('fp') 
        //&& $this->term('achave') && $this->Lista_comandos() && $this->term('fchave')
        ; 
    }

    //<Lista_var> ::= <Var> <Lista_var> | î;
    public function Lista_var(){
        $ant = $this->cont;
        if  ($this->Var() && $this->Lista_var()) 
            return true;
        else{
            $this->cont = $ant;
            return $this->vazio();
        }
    }

    //<Var> ::= <Tipo> identificador;
    public function Var(){
        return $this->Tipo() && $this->term('identificador');
    }

    //<Tipo> ::= int | char | String;
    public function Tipo(){
        $ant = $this->cont;
        if ( $this->term('int') )
            return true;
        else{
            $this->cont = $ant;
            if ($this->term('char'))
                return true;
            else{
                $this->cont = $ant;
                return $this->term('String');
            }
        }

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
        $ant = $this->cont;
        if ( $this->term('caractere') ){
            return true;
        }else{
            $this->cont = $ant;
            if($this->term('string')){
                return true;
            }else{
                $this->cont = $ant;
                if($this->term('numero')){
                    return true;
                }else{
                    $this->cont = $ant;
                    return $this->term('identificador');
                }
            }
        }
    }

    //<Incremento> ::= identificador <Tip_incremento> pv
    public function Incremento(){
        return $this->term('identificador') && $this->Tip_incremento() && $this->term('pv');
    }

    //<Tip_incremento> ::= maismais | menosmenos;
    public function Tip_incremento(){
        $ant = $this->cont;
        if ( $this->term('maismais') ){
            return true;
        }   
        else{
            $this->cont = $ant;
            $this->term('menosmenos');
        }
    }

    //<Operacao> ::= identificador <Operador> <Atributos> pv;
    public function Operacao(){
        return $this->term('identificador') && $this->Operador() && $this->Atributos() && $this->term('pv');
    }

    //<Operador> ::= mais | menos | barra | mult;
    public function Operador(){
        $ant = $this->cont;
        if ( $this->term('mais') ){
            return true;
        }else{
            $this->cont = $ant;
            if($this->term('menos')){
                return true;
            }else{
                $this->cont = $ant;
                if($this->term('barra')){
                    return true;
                }else{
                    $this->cont = $ant;
                    return $this->term('asterisco');
                }
            }
        }
    }

    public function term($tk){
        //print('term ');
        //var_dump($tk == $this->lexico->tokens[$this->cont++]->tok);
        return $tk == $this->lexico->tokens[$this->cont++]->tok;
    }

    public function vazio(){
        return true;
    }

}
?>