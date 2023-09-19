<?php
class analisadorLex
{
    public $tokens;
    public function analisa($entrada) {
        //error_reporting(0);

        $delta = array('q0'=>array('0'=>'q55', '1'=>'q55','2'=>'q55','3'=>'q55','4'=>'q55','5'=>'q55','6'=>'q55','7'=>'q55','8'=>'q55','9'=>'q55','a'=>'q56','b'=>'q56','c'=>'q67','d'=>'q21','e'=>'q3','f'=>'q7','g'=>'q56','h'=>'q56','i'=>'q1','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q23','q'=>'q56','r'=>'q28','s'=>'q10','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q16','x'=>'q56','y'=>'q56','z'=>'q56', '+'=>'q36', '-'=>'q37','/'=>'q39','*'=>'q38','<'=>'q40','>'=>'q41','^'=>'q46','!'=>'q47','('=>'q49',')'=>'q50','{'=>'q51','}'=>'q52','['=>'q53',']'=>'q54',' '=>'q57','='=>'q58',';'=>'q59',':'=>'q60','"'=>'q78'),
                    'q1'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q2','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q71','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q2'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),               
                    'q3'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q4','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q4'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q5','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q5'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q6','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q6'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q7'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q8','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q8'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q9','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q9'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q32','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q10'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q73','u'=>'q56','v'=>'q56','w'=>'q11','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q11'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q12','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q12'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q13','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q13'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q14','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q14'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q15','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q15'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q16'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q17','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q17'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q18','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q18'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q19','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q19'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q20','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q20'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q21'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q22','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q22'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q23'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q24','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q24'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q25','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q61','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q25'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q26','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q26'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q27','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q27'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q28'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q29','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q29'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q30','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q30'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q31','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q31'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q32'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q33','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q33'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q34','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q34'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q35','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q35'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q36'=>array('+'=>'q43'),
                    'q37'=>array('-'=>'q42'),
                    'q39'=>array(),
                    'q40'=>array('='=>'q44'),
                    'q41'=>array('+'=>'q45'),
                    'q42'=>array(),
                    'q43'=>array(),
                    'q44'=>array(),
                    'q45'=>array(),
                    'q46'=>array(),
                    'q47'=>array('='=>'q48'),
                    'q48'=>array(),
                    'q49'=>array(),
                    'q50'=>array(),
                    'q51'=>array(),
                    'q52'=>array(),
                    'q53'=>array(),
                    'q54'=>array(),
                    'q55'=>array('0'=>'q55', '1'=>'q55','2'=>'q55','3'=>'q55','4'=>'q55','5'=>'q55','6'=>'q55','7'=>'q55','8'=>'q55','9'=>'q55'),
                    'q56'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q57'=>array(),
                    'q58'=>array(),
                    'q59'=>array(),
                    'q60'=>array(),
                    'q61'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q62','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q62'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q63','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q63'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q64','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q64'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q65','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q65'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q66','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q66'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q67'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q84','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q68','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q68'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q69','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q69'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q70','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q70'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q71'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q72','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q72'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q73'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q74','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q74'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q75','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q75'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q76','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q76'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q77','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q77'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q78'=>array('0'=>'q79', '1'=>'q79','2'=>'q79','3'=>'q79','4'=>'q79','5'=>'q79','6'=>'q79','7'=>'q79','8'=>'q79','9'=>'q79','a'=>'q79','b'=>'q79','c'=>'q79','d'=>'q79','e'=>'q79','f'=>'q79','g'=>'q79','h'=>'q79','i'=>'q79','j'=>'q79','k'=>'q79','l'=>'q79','m'=>'q79','n'=>'q79','o'=>'q79','p'=>'q79','q'=>'q79','r'=>'q79','s'=>'q79','t'=>'q79','u'=>'q79','v'=>'q79','w'=>'q79','x'=>'q79','y'=>'q79','z'=>'q79'),
                    'q79'=>array('0'=>'q80', '1'=>'q80','2'=>'q80','3'=>'q80','4'=>'q80','5'=>'q80','6'=>'q80','7'=>'q80','8'=>'q80','9'=>'q80','a'=>'q80','b'=>'q80','c'=>'q80','d'=>'q80','e'=>'q80','f'=>'q80','g'=>'q80','h'=>'q80','i'=>'q80','j'=>'q80','k'=>'q80','l'=>'q80','m'=>'q80','n'=>'q80','o'=>'q80','p'=>'q80','q'=>'q80','r'=>'q80','s'=>'q80','t'=>'q80','u'=>'q80','v'=>'q80','w'=>'q80','x'=>'q80','y'=>'q80','z'=>'q80','"'=>'q81'),
                    'q80'=>array('0'=>'q80', '1'=>'q80','2'=>'q80','3'=>'q80','4'=>'q80','5'=>'q80','6'=>'q80','7'=>'q80','8'=>'q80','9'=>'q80','a'=>'q80','b'=>'q80','c'=>'q80','d'=>'q80','e'=>'q80','f'=>'q80','g'=>'q80','h'=>'q80','i'=>'q80','j'=>'q80','k'=>'q80','l'=>'q80','m'=>'q80','n'=>'q80','o'=>'q80','p'=>'q80','q'=>'q80','r'=>'q80','s'=>'q80','t'=>'q80','u'=>'q80','v'=>'q80','w'=>'q80','x'=>'q80','y'=>'q80','z'=>'q80','"'=>'q82'),
                    'q81'=>array(),
                    'q82'=>array(),
                    'q83'=>array(),
                    'q84'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q85','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q85'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q86','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
                    'q86'=>array('0'=>'q56', '1'=>'q56','2'=>'q56','3'=>'q56','4'=>'q56','5'=>'q56','6'=>'q56','7'=>'q56','8'=>'q56','9'=>'q56','a'=>'q56','b'=>'q56','c'=>'q56','d'=>'q56','e'=>'q56','f'=>'q56','g'=>'q56','h'=>'q56','i'=>'q56','j'=>'q56','k'=>'q56','l'=>'q56','m'=>'q56','n'=>'q56','o'=>'q56','p'=>'q56','q'=>'q56','r'=>'q56','s'=>'q56','t'=>'q56','u'=>'q56','v'=>'q56','w'=>'q56','x'=>'q56','y'=>'q56','z'=>'q56'),
        );

        $q0 = 'q0';
        $finais = array('q1','q2','q3','q4','q5','q6','q7','q8','q9','q10','q11','q12','q13','q14','q15','q16','q17','q18','q19','q20','q21','q22','q23','q24','q25','q26','q27','q28','q29','q30','q31','q32','q33','q34','q35','q36','q37','q38','q39','q40','q41','q42','q43','q44','q45','q46','q48','q49','q50','q51','q52','q53','q54','q55','q56','q57','q58','q59','q60','q61','q62','q63','q64','q65','q66','q67','q68','q69','q70','q71','q72','q73','q74','q75','q76','q77','q81','q82','q83','q84','q85','q86');

        $aux = array('q0'=>array('q1' => 'identificador','q2'=>'if','q3' => 'identificador','q4' => 'identificador' , 'q5' => 'identificador' ,'q6'=>'else','q7' => 'identificador','q8' => 'identificador','q9'=>'for','q10' => 'identificador','q11' => 'identificador','q12' => 'identificador','q13' => 'identificador','q14' => 'identificador','q15'=>'switch','q16' => 'identificador','q17' => 'identificador','q18' => 'identificador','q19' => 'identificador','q20'=>'while','q21' => 'identificador','q22'=>'do','q23' => 'identificador','q24' => 'identificador','q25' => 'identificador','q26' => 'identificador','q27'=>'print','q28' => 'identificador','q29' => 'identificador','q30' => 'identificador','q31'=>'read','q32' => 'identificador','q33' => 'identificador','q34' => 'identificador','q35'=>'foreach','q36'=>'mais','q37'=>'menos','q38'=>'asterisco','q39'=>'barra','q40'=>'menor','q41'=>'maior','q42'=>'menosmenos','q43'=>'maismais','q44'=>'menorigual','q45'=>'maiorigual','q46'=>'elevado','q48'=>'diferente','q49'=>'ap','q50'=>'fp','q51'=>'achave','q52'=>'fchave','q53'=>'acol','q54'=>'fcol','q55'=>'num','q56'=>'identificador','q57'=>'espaco','q58'=>'igual','q59'=>'pv','q60'=>'dp','q61' => 'identificador','q62' => 'identificador','q63' => 'identificador','q64' => 'identificador','q65' => 'identificador','q66'=>'programa','q67' => 'identificador','q68' => 'identificador','q69' => 'identificador','q70' => 'char','q71' => 'identificador','q72' => 'int','q73' => 'identificador','q74' => 'identificador','q75' => 'identificador','q76' => 'identificador','q77'=>'String','q81' => 'caractere','q82' => 'string' ,'q84' => 'identificador','q85' => 'identificador','q86' => 'case'));
        $estado = $q0;
        $inicio = 0;
        $fim = 0;

        $listatokens = [];

        $valor = "";

        for ($i=0; $i < strlen($entrada); $i++) { 
            if  (array_key_exists($entrada[$i],$delta[$estado])){
                 $valor .= $entrada[$i];
                 $estado = $delta[$estado][$entrada[$i]];
                 print($estado);
             } else

            
            // if (array_key_exists($entrada[$i],$delta[$estado])){
            //     if($delta[$estado][$entrada[$i+1]] != null){
            //         $temprox = true;
            //     }else{
            //         $temprox = false;
            //     }
            // }
            if(in_array($estado,$finais) ){
                $tok = $aux['q0'][$estado];

                $tempToken = new token();
                $tempToken->tok = $tok;
                $tempToken->valor = $valor;
                $tempToken->inicio = $inicio;
                $tempToken->fim = $fim;

                array_push($listatokens, $tempToken);


                $valor = "";

                $inicio = $fim;

                $estado = $q0;
            }else break;

            $fim++;

        }
        if(in_array($estado,$finais) ){
            $tok = $aux['q0'][$estado];

            $tempToken = new token();
            $tempToken->tok = $tok;
            $tempToken->valor = $valor;
            $tempToken->inicio = $inicio;
            $tempToken->fim = $fim;

            array_push($listatokens, $tempToken);


            $valor = "";

            $inicio = $fim;

            $estado = $q0;
        }

        $this->tokens = $listatokens;
    }


    public function listar(){
        return $this->tokens;
    }
}
?>