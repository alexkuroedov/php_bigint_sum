<?php
function dump($val){
    print('<pre>');
    print_r($val);
    die('#!die in file: '.__FILE__.' line: '.__LINE__);
}

class BigSum{

    public function sum($strNum1 = '', $strNum2 = ''){
        $ar1 = str_split($strNum1);
        $ar2 = str_split($strNum2);

        $len1 = count($ar1);
        $len2 = count($ar2);
        
        
        if($len1 < $len2){
            //shift 0  value from start to $len2 (return copy)
            $ar1 = array_pad($ar1 , -$len2 , 0);
            $len1 = $len2;
        }
        if($len1 > $len2){
            $ar2 = array_pad($ar2 , -$len1 , 0);
            $len2 = $len1;
        }
        
        // reverse for sum count
        $ar1 = array_reverse($ar1);
        $ar2 = array_reverse($ar2);
        $resAr = [];
        for($i=0; $i<$len1; $i++){

            //if rank of num has been moved
            $resAr[$i] = isset($resAr[$i])?$resAr[$i]:0;
            $isum = (int)$ar1[$i] + (int)$ar2[$i] + (int)$resAr[$i];
            if($isum < 10){
                $resAr[$i] = $isum;
            }else{
                //int of division
                $int = intval($isum/10);
                //rest of division
                $rest = $isum % 10;
                
                $resAr[$i] = $rest;
                $resAr[$i+1] = $int;
            }
            
        }
        
        //return normal order
        $resAr = array_reverse($resAr);

        return join($resAr);
    }

}
$bs = new BigSum;


$num1 = '';
$num2 = '';
if(isset($argv[1])){
    $num1 = $argv[1];
}
if(isset($argv[2])){
    $num2 = $argv[2];
}

$res = $bs->sum($num1,$num2);


print_r("num 1: ".$num1."\n");
print_r("num 2: ".$num2."\n");
print_r("Sum  : ".$res."\n");

