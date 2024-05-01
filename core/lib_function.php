<?php
function chektext($val){
    return trim(strip_tags(htmlspecialchars($_POST[$val])));
}
function jsonecho($tttt,$rs='er'){
    if($rs=='sc'){$k = "seccess";}
    else{$k = "error";}
    echo json_encode(array($k => $tttt));
}
function chektextST($val){return trim(strip_tags(htmlspecialchars($val)));}
function generateCode($length=6) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
$code = "";
$clen = strlen($chars) - 1;  
while (strlen($code) < $length){$code .= $chars[mt_rand(0,$clen)];}
return $code;
}
function generateBredcummenu($title, $urls){
    $result=[];
    for($i=0; $i < count($title); $i++){
        $result[]=[$title[$i],$urls[$i]];
    }
    return $result;
}
function arrastr($str,$del1){
    $arres = array();
    $str = explode($del1, $str);
    foreach($str as $key => $value){
        $kps = explode('=',$value);
        $arres[$kps[0]] = $kps[1];
    }
    return $arres;
}
function znakmatemformat($num){
    if($num > 0) return '+'.$num;
    else return $num;
}
function queryaccesspages($pages,$dbdata){
    $exp = explode(';', $dbdata);
    for($i=0; $i < count($exp); $i++){
        $arr = explode(':', $exp[$i]);
        if($arr[0] == $pages){
            if($arr[1] == 1) return "access";
            else return "noaccess";
            break;
        }
    }
    return "noaccess";
}
function prostomat($chisla,$metod='+'){
    $arrch = explode(',', $chisla);
    if(count($arrch) <= 2){
        if($metod == '+') return $arrch[0] + $arrch[1];
        if($metod == '-') return $arrch[0] - $arrch[1];
        else return false;
    }else{
        $result=0;
        for($i=0; $i < count($arrch); $i++){
            if($metod == '+') $result = $result + $arrch[$i];
            //if($metod == '-') $result = $result - $arrch[$i];
        }
        return $result;
    }
}
function russionTranslitMoth($moth,$typdedate='num'){
    if($typdedate == 'num'){
        $moth = $moth-1;
        $arMethRussin = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
        return $arMethRussin[$moth];
    }
}
?>