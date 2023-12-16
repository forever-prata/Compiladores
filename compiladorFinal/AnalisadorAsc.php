<?php

define('NAO_TERMINAIS',[0=>'PROGRAMA',
                        1=>'LISTA_VAR',
                        2=>'VAR',
                        3=>'TIPO',
                        4=>'LISTA_COMANDOS',
                        5=>'IF',
                        6=>'ELSE',
                        7=>'SWITCH',
                        8=>'CASOS',
                        9=>'CASO',
                        10=>'COMPARADORES',
                        11=>'COMANDOS',
                        12=>'ATRIBUICAO',
                        13=>'ATRIBUTOS',
                        14=>'INCREMENTO',
                        15=>'TIP_INCREMENTO',
                        16=>'OPERACAO',
                        17=>'OPERADOR']);



require('analisadorSemantico.php');
class SLR{ 
    private $afd;
    public $lexico;
    private $analisadorSemantico;

    public function __construct(){

        $this->afd = array(
            0=>['ACTION'=>['programa'=>'S 2'],
                  'GOTO'=>[0=>['$'=>1]]], 
            1=>['ACTION'=>['$'=>'ACC '],'GOTO'=>[]],
            2=>['ACTION'=>['identificador'=>'S 3'],'GOTO'=>[]], 
            3=>['ACTION'=>['ap'=>'S 4'],'GOTO'=>[]],
            4=>['ACTION'=>['int'=>'S 6','char'=>'S 7','String'=>'S 8','fp'=>'R 0 1'],
                  'GOTO'=>[3=>['identificador'=>9],2=>['int'=>11,'char'=>11,'String'=>11,'fp'=>13],1=>['fp'=>13]]],
            6=>['ACTION'=>['identificador'=>'R 1 3'],'GOTO'=>[]],
            7=>['ACTION'=>['identificador'=>'R 1 3'],'GOTO'=>[]],
            8=>['ACTION'=>['identificador'=>'R 1 3'],'GOTO'=>[]],
            9=>['ACTION'=>['identificador'=>'S 10'],'GOTO'=>[]],
            10=>['ACTION'=>['int'=>'R 2 2','char'=>'R 2 2','String'=>'R 2 2','fp'=>'R 2 2'],'GOTO'=>[]],
            11=>['ACTION'=>['int'=>'S 6','char'=>'S 7','String'=>'S 8','fp'=>'R 0 1'],
                  'GOTO'=>[1=>['fp'=>12]]],
            12=>['ACTION'=>['fp'=>'R 3 1'],'GOTO'=>[]],
            13=>['ACTION'=>['fp'=>'S 14'],'GOTO'=>[]],
            14=>['ACTION'=>['achave'=>'S 15'],'GOTO'=>[]],
            15=>['ACTION'=>['if'=>'S 16','else'=>'S 53','switch'=>'S 58','fchave'=>'R 0 4'],
                  'GOTO'=>[4=>['fchave'=>73,'if'=>70,'else'=>71,'switch'=>72],5=>['fchave'=>73,'if'=>70,'else'=>70,'switch'=>70],6=>['fchave'=>73,'if'=>71,'else'=>71,'switch'=>71],7=>['fchave'=>73,'if'=>72,'else'=>72,'switch'=>72]]],
            16=>['ACTION'=>['ap'=>'S 17'],'GOTO'=>[]],
            17=>['ACTION'=>['identificador'=>'S 18'],'GOTO'=>[]],
            18=>['ACTION'=>['igual'=>'S 19','menor'=>'S 20','maior'=>'S 21','maiorigual'=>'S 22','menorigual'=>'S 23','diff'=>'S 24'],
                  'GOTO'=>[10=>['caracter'=>25,'string'=>25,'numero'=>25,'identificador'=>25]]],
            19=>['ACTION'=>['caracter'=>'R 1 10','string'=>'R 1 10','numero'=>'R 1 10','identificador'=>'R 1 10'],'GOTO'=>[]],    
            20=>['ACTION'=>['caracter'=>'R 1 10','string'=>'R 1 10','numero'=>'R 1 10','identificador'=>'R 1 10'],'GOTO'=>[]],
            21=>['ACTION'=>['caracter'=>'R 1 10','string'=>'R 1 10','numero'=>'R 1 10','identificador'=>'R 1 10'],'GOTO'=>[]],
            22=>['ACTION'=>['caracter'=>'R 1 10','string'=>'R 1 10','numero'=>'R 1 10','identificador'=>'R 1 10'],'GOTO'=>[]],
            23=>['ACTION'=>['caracter'=>'R 1 10','string'=>'R 1 10','numero'=>'R 1 10','identificador'=>'R 1 10'],'GOTO'=>[]],
            24=>['ACTION'=>['caracter'=>'R 1 10','string'=>'R 1 10','numero'=>'R 1 10','identificador'=>'R 1 10'],'GOTO'=>[]],
            25=>['ACTION'=>['caracter'=>'S 26','string'=>'S 27','numero'=>'S 28','identificador'=>'S 29'],
                  'GOTO'=>[13=>['fp'=>74]]],
            26=>['ACTION'=>['fp'=>'R 1 13'],'GOTO'=>[]],
            27=>['ACTION'=>['fp'=>'R 1 13'],'GOTO'=>[]],
            28=>['ACTION'=>['fp'=>'R 1 13'],'GOTO'=>[]],
            29=>['ACTION'=>['fp'=>'R 1 13'],'GOTO'=>[]],
            30=>['ACTION'=>['achave'=>'S 31'],'GOTO'=>[]],
            31=>['ACTION'=>['identificador'=>'S 32'],
                  'GOTO'=>[12=>['fchave'=>43],14=>['fchave'=>43],16=>['fchave'=>43]]],
            32=>['ACTION'=>['maismais'=>'S 46','menosmenos'=>'S 47','mais'=>'S 33','menos'=>'S 34','barra'=>'S 35','mult'=>'S 36','igual'=>'S 50'],
                  'GOTO'=>[15=>['pv'=>48],17=>['caracter'=>37,'string'=>37,'numero'=>37,'identificador'=>37]]],
            33=>['ACTION'=>['caracter'=>'R 1 17','string'=>'R 1 17','numero'=>'R 1 17','identificador'=>'R 1 17'],'GOTO'=>[]],
            34=>['ACTION'=>['caracter'=>'R 1 17','string'=>'R 1 17','numero'=>'R 1 17','identificador'=>'R 1 17'],'GOTO'=>[]],
            35=>['ACTION'=>['caracter'=>'R 1 17','string'=>'R 1 17','numero'=>'R 1 17','identificador'=>'R 1 17'],'GOTO'=>[]],
            36=>['ACTION'=>['caracter'=>'R 1 17','string'=>'R 1 17','numero'=>'R 1 17','identificador'=>'R 1 17'],'GOTO'=>[]],
            37=>['ACTION'=>['caracter'=>'S 38','string'=>'S 39','numero'=>'S 40','identificador'=>'S 41'],
                  'GOTO'=>[13=>['pv'=>42]]],
            38=>['ACTION'=>['pv'=>'R 1 13'],'GOTO'=>[]],
            39=>['ACTION'=>['pv'=>'R 1 13'],'GOTO'=>[]],
            40=>['ACTION'=>['pv'=>'R 1 13'],'GOTO'=>[]],
            41=>['ACTION'=>['pv'=>'R 1 13'],'GOTO'=>[]],
            42=>['ACTION'=>['fchave'=>'R 4 16'],'GOTO'=>[]],      
            43=>['ACTION'=>['fchave'=>'S 44'],'GOTO'=>[]], 
            44=>['ACTION'=>['if'=>'R 9 5','else'=>'R 9 5','switch'=>'R 9 5','fchave'=>'R 9 5'],'GOTO'=>[]],
            45=>['ACTION'=>['$'=>'R 8 0'],'GOTO'=>[]], 
            46=>['ACTION'=>['pv'=>'R 1 15'],'GOTO'=>[]],
            47=>['ACTION'=>['pv'=>'R 1 15'],'GOTO'=>[]],
            48=>['ACTION'=>['pv'=>'S 49'],'GOTO'=>[]],
            49=>['ACTION'=>['fchave'=>'R 3 14'],'GOTO'=>[]],
            50=>['ACTION'=>['caractere'=>'S 38','string'=>'S 39','num'=>'S 40','identificador'=>'S 41'],
                  'GOTO'=>[13=>['pv'=>51]]],
            51=>['ACTION'=>['pv'=>'S 52'],'GOTO'=>[]],
            52=>['ACTION'=>['fchave'=>'R 4 12'],'GOTO'=>[]],
            53=>['ACTION'=>['achave'=>'S 54'],'GOTO'=>[]],
            54=>['ACTION'=>['identificador'=>'S 55'],
                  'GOTO'=>[12=>['fchave'=>56],14=>['fchave'=>56],16=>['fchave'=>56]]],
            55=>['ACTION'=>['maismais'=>'S 46','menosmenos'=>'S 47','mais'=>'S 33','menos'=>'S 34','barra'=>'S 35','mult'=>'S 36','igual'=>'S 50'],
                  'GOTO'=>[15=>['pv'=>48],17=>['caracter'=>37,'string'=>37,'numero'=>37,'identificador'=>37]]],
            56=>['ACTION'=>['fchave'=>'S 57'],'GOTO'=>[]],
            57=>['ACTION'=>['if'=>'R 4 6','else'=>'R 4 6','switch'=>'R 4 6','fchave'=>'R 4 6'],'GOTO'=>[]],
            58=>['ACTION'=>['ap'=>'S 59'],'GOTO'=>[]],
            59=>['ACTION'=>['identificador'=>'S 60'],'GOTO'=>[]],
            60=>['ACTION'=>['fp'=>'S 61'],'GOTO'=>[]],
            61=>['ACTION'=>['achave'=>'S 62'],'GOTO'=>[]],
            62=>['ACTION'=>['case'=>'S 63','fchave'=>'R 0 '],
                  'GOTO'=>[8=>['fchave'=>68],9=>['fchave'=>67,'case'=>67]]],
            63=>['ACTION'=>['caracter'=>'S 38','string'=>'S 39','numero'=>'S 40','identificador'=>'S 41'],
                  'GOTO'=>[13=>['dp'=>64]]],
            64=>['ACTION'=>['dp'=>'S 65'],'GOTO'=>[]],
            65=>['ACTION'=>['identificador'=>'S 32'],
                  'GOTO'=>[15=>['pv'=>66],17=>['caracter'=>66,'string'=>66,'numero'=>66,'identificador'=>66]]],
            66=>['ACTION'=>['case'=>'R 4 9'],'GOTO'=>[]],
            67=>['ACTION'=>['case'=>'S 63','fchave'=>'R 0 8'],
                  'GOTO'=>[8=>['fchave'=>68]]],
            68=>['ACTION'=>['fchave'=>'S 69'],'GOTO'=>[]],
            69=>['ACTION'=>['if'=>'R 7 7','else'=>'R 7 7','switch'=>'R 7 7','fchave'=>'R 7 7'],'GOTO'=>[]],
            70=>['ACTION'=>['if'=>'S 16','else'=>'S 53','switch'=>'S 58','fchave'=>'R 0 4'],
                  'GOTO'=>[4=>['fchave'=>75,'if'=>16,'else'=>53,'switch'=>58],5=>['fchave'=>75,'if'=>70,'else'=>70,'switch'=>70],6=>['fchave'=>75,'if'=>71,'else'=>71,'switch'=>71],7=>['fchave'=>75,'if'=>72,'else'=>72,'switch'=>72]]],
            71=>['ACTION'=>['if'=>'S 16','else'=>'S 53','switch'=>'S 58','fchave'=>'R 0 4'],
                  'GOTO'=>[4=>['fchave'=>75,'if'=>16,'else'=>53,'switch'=>58],5=>['fchave'=>75,'if'=>16,'else'=>53,'switch'=>58],6=>['fchave'=>75,'if'=>16,'else'=>53,'switch'=>58],7=>['fchave'=>75,'if'=>16,'else'=>53,'switch'=>58]]],
            72=>['ACTION'=>['if'=>'S 16','else'=>'S 53','switch'=>'S 58','fchave'=>'R 0 4'],
                  'GOTO'=>[4=>['fchave'=>45,'if'=>16,'else'=>53,'switch'=>58]]],
            73=>['ACTION'=>['fchave'=>'S 45'],'GOTO'=>[]],
            74=>['ACTION'=>['fp'=>'S 30'],'GOTO'=>[]],
            75=>['ACTION'=>['fchave'=>'R 2 4'],'GOTO'=>[]],
      
      );
      $this->analisadorSemantico = new AnalisadorSemantico();
    }

    public function parser($entrada){
        $pilha = array();
        array_push($pilha,0);
        //echo "\nPilha:".implode(' ',$pilha);
        $i = 0;
        while ($entrada){
            if (array_key_exists( $entrada[$i]->tok, $this->afd[end($pilha)]['ACTION']))
                $move = $this->afd[end($pilha)]['ACTION'][$entrada[$i]->tok];
            else 
                return false;
            $acao = explode(' ',$move);
            //echo " | Ação:".$move;
            switch($acao[0]){
                case 'S': // Shift - Empilha e avança o ponteiro
                    array_push($pilha,$acao[1]);
                    $i++;
                    break;
                case 'R': // Reduce - Desempilha e Desvia (para indicar a redução)  
                    for ($j = 0; $j<$acao[1]; $j++)
                        array_pop($pilha);
                    //echo ' | Reduzio para '.NAO_TERMINAIS[$acao[2]];                    
                    $desvio = $this->afd[end($pilha)]['GOTO'][$acao[2]][$entrada[$i]->tok];
                    array_push($pilha,$desvio);
                    break;
                case 'ACC': // Accept
                    echo ' Sintatico Ok';
                    return true;
                default:
                    echo 'Erro';
                    return false;
            }

            $this->analisadorSemantico->analiseSemantica(end($pilha),$entrada[$i]->valor);

            //echo "\nPilha:".implode(' ',$pilha);
            //echo $entrada[$i]->tok;
        }
    }
}

// Testando
//$slr = new SLR();
//$entrada = array('programa','identificador','ap','fp','achave','fchave','$'); 
//$entrada = array('programa','identificador','ap','int','identificador','fp','achave','fchave','$'); 
//$entrada = array('programa','identificador','ap','fp','achave','if','ap','identificador','igual','numero','fp','achave','identificador','maismais','pv','fchave','fchave','$');
//$entrada = array('programa','identificador','ap','int','identificador','fp','achave','else','achave','identificador','igual','string','pv','fchave','fchave','$'); 
//$entrada = array('programa','identificador','ap','fp','achave','if','ap','identificador','igual','numero','fp','achave','identificador','maismais','pv','fchave','else','achave','identificador','igual','string','pv','fchave','fchave','$');