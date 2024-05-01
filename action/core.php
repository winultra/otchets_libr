<?php
include_once('../local_variables.php');//Подключение локальных глобальных переменных
include_once($DIR.'/core/linkbd.php');
include_once($DIR.'/core/lib_function.php');
include_once($DIR.'/pages/accesspages.php');
$authmetod = chektext('operation');
$LoginUser = chektextST($_COOKIE['login_user']);
$passUser = chektextST($_COOKIE['pass_user']);
//ini_set('max_execution_time', 240);
if($authmetod == 'authuser'){
/*Авторизация пользователя*/
    $login = chektext('login');
    $pass = chektext('pass');
    if(isset($login) && isset($pass) && !isset($_COOKIE['login_user']) && !isset($_COOKIE['pass_user'])){
        $sol1="her45as";$sol2="fuck!22";
        $respass = md5(md5($sol1.$pass.$sol2));
        $queryInfoUser = querydb("SELECT pass FROM `administatrors_user` WHERE `login` = '".$login."'");
        $passbd = $queryInfoUser['pass'];
        if($passbd == $respass){
            $hashKod = generateCode(10).time();
            $hash = hash('sha256', $hashKod);
            querydb("UPDATE `administatrors_user` SET `hashauth` = '".$hash."' WHERE `login` = '".$login."' AND `pass` = '".$respass."'",'update');
            $date = date("Y-m-d H:i:s");
            querydb("INSERT INTO `logs_auth` (`login`, `date`) VALUES ('".$login."', '".$date."'); ",'insert');
            setcookie("login_user", $login, time() + 60*60*24*365,"/");
            setcookie("pass_user", $hash , time() + 60*60*24*365,"/");
            jsonecho('sc','sc');die;
        }else{jsonecho('nopasslo');die;}
    }else{jsonecho('obradmin');die;}
}
if($authmetod == 'exit'){
/*Деавторизация пользователя*/
    querydb("UPDATE `administatrors_user` SET `hashauth` = ' ' WHERE `login` = '".$LoginUser."' AND `hashauth` = '".$passUser."'",'update');
    unset($_COOKIE['login_user']);unset($_COOKIE['pass_user']);
    setcookie('login_user', null, -1, '/');setcookie('pass_user', null, -1, '/');
    jsonecho('sc','sc');die;
}
if($authmetod == 'cod_work_send'){
/*Отправка в базу отчета по ЦОД*/
    $dostyp_pages = queryaccesspages('work-cod',$INFOUSER['PravaDostups']);
    $data = arrastr($_POST['date'], '&');
    $dateYersNew = date('Y');
    $dateLast = $dateYersNew-1;
    $marth = date('n')-1;
    $old_marth = 'no';
    if(date('d') > 24){ $marth = date('n'); $old_marth='yes';}
    $day = date('d');
    //if($day > 25){$marth = date('m');}
    //if($marth == 0) $marth = 12;
    $dateSBD = $dateLast.'_'.$marth;//Дата прошлогоднего отчета
    $dateSendbd = $dateYersNew.'_'.$marth;//Дата нунешнего отчета
    $queryInfoUser = querydb("SELECT id FROM `administatrors_user` WHERE `login` = '".$LoginUser."' AND `hashauth` = '".$passUser."'");
    $rs = querydb("SELECT * FROM `otchet_cod` WHERE `id_user` = '".$queryInfoUser['id']."' AND `date_otch` = '".$dateSBD."'");
    for($i=0;$i < count($data); $i++){preg_replace('/[^0-9]/', '', $data[$i]);}
    $rssq = querydb("SELECT * FROM `otchet_cod` WHERE `id_user` = '".$queryInfoUser['id']."' AND `date_otch` = '".$dateSendbd."'");
    if(isset($rssq)){jsonecho('est');die;}
    if($dostyp_pages == 'noaccess'){
        if($old_marth == 'no'){
            if($day > 4){jsonecho('noSent');die;}
        }else{
            if($day < 24){jsonecho('noSent');die;}
        }
    }else{
        if($old_marth == 'no'){
            if($day > 15){jsonecho('noSent');die;}
        }else{
            if($day < 24){jsonecho('noSent');die;}
        }
    }
    if(!isset($rs)){
        /*Если нет данных*/
        querydb("INSERT INTO `otchet_cod`(`id_user`, `date_otch`, `number_users`, `number_users_kd`, `number_visits`, `number_visits_kd`, `number_book_publishing`, `number_book_publishing_kd`, `work_komp`, `work_komp_kd`, `garant`, `garant_kd`, `konsultant`, `konsultant_kd`, `ethernet`, `ethernet_kd`, `electronic_catalog`, `electronic_catalog_kd`, `activities_carried`, `activities_carried_kd`, `number_event_visits`, `number_event_visits_kd`, `computer_school`, `computer_school_kd`, `number_students`, `number_students_kd`, `number_classes`, `number_classes_kd`) 
                VALUES 
               ('".$queryInfoUser['id']."','".$dateSBD."','".$data['last_yers_chp']."','".$data['last_yers_chp_dt']."','".$data['last_yers_chpos']."','".$data['last_yers_chpos_dt']."','".$data['last_yers_knigv']."','".$data['last_yers_knigv_dt']."','".$data['last_yers_workkomp']."','".$data['last_yers_workkomp_dt']."','".$data['last_yers_garant']."','".$data['last_yers_garant_dt']."','".$data['last_yers_konsult']."','".$data['last_yers_konsult_dt']."','".$data['last_yers_ethernet']."','".$data['last_yers_ethernet_dt']."','".$data['last_yers_elkat']."','".$data['last_yers_elkat_dt']."','".$data['last_yers_provmer']."','".$data['last_yers_provmer_dt']."','".$data['last_yers_numposmer']."','".$data['last_yers_numposmer_dt']."','".$data['last_yers_sculkg']."','".$data['last_yers_sculkg_dt']."','".$data['last_yers_numobuch']."','".$data['last_yers_numobuch_dt']."','".$data['last_yers_numzanyt']."','".$data['last_yers_numzanyt_dt']."')",'insert');
        querydb("INSERT INTO `otchet_cod`(`id_user`, `date_otch`, `number_users`, `number_users_kd`, `number_visits`, `number_visits_kd`, `number_book_publishing`, `number_book_publishing_kd`, `work_komp`, `work_komp_kd`, `garant`, `garant_kd`, `konsultant`, `konsultant_kd`, `ethernet`, `ethernet_kd`, `electronic_catalog`, `electronic_catalog_kd`, `activities_carried`, `activities_carried_kd`, `number_event_visits`, `number_event_visits_kd`, `computer_school`, `computer_school_kd`, `number_students`, `number_students_kd`, `number_classes`, `number_classes_kd`) 
                 VALUES 
                ('".$queryInfoUser['id']."','".$dateSendbd."','".$data['new_yers_chp']."','".$data['new_yers_chp_dt']."','".$data['new_yers_chpos']."','".$data['new_yers_chpos_dt']."','".$data['new_yers_knigv']."','".$data['new_yers_knigv_dt']."','".$data['new_yers_workkomp']."','".$data['new_yers_workkomp_dt']."','".$data['new_yers_garant']."','".$data['new_yers_garant_dt']."','".$data['new_yers_konsult']."','".$data['new_yers_konsult_dt']."','".$data['new_yers_ethernet']."','".$data['new_yers_ethernet_dt']."','".$data['new_yers_elkat']."','".$data['new_yers_elkat_dt']."','".$data['new_yers_provmer']."','".$data['new_yers_provmer_dt']."','".$data['new_yers_numposmer']."','".$data['new_yers_numposmer_dt']."','".$data['new_yers_sculkg']."','".$data['new_yers_sculkg_dt']."','".$data['new_yers_numobuch']."','".$data['new_yers_numobuch_dt']."','".$data['new_yers_numzanyt']."','".$data['new_yers_numzanyt_dt']."')",'insert');
        jsonecho('sc','sc');die;
    }else{
        /*Если есть данные*/
        querydb("INSERT INTO `otchet_cod`(`id_user`, `date_otch`, `number_users`, `number_users_kd`, `number_visits`, `number_visits_kd`, `number_book_publishing`, `number_book_publishing_kd`, `work_komp`, `work_komp_kd`, `garant`, `garant_kd`, `konsultant`, `konsultant_kd`, `ethernet`, `ethernet_kd`, `electronic_catalog`, `electronic_catalog_kd`, `activities_carried`, `activities_carried_kd`, `number_event_visits`, `number_event_visits_kd`, `computer_school`, `computer_school_kd`, `number_students`, `number_students_kd`, `number_classes`, `number_classes_kd`) 
                 VALUES 
                 ('".$queryInfoUser['id']."','".$dateSendbd."','".$data['new_yers_chp']."','".$data['new_yers_chp_dt']."','".$data['new_yers_chpos']."','".$data['new_yers_chpos_dt']."','".$data['new_yers_knigv']."','".$data['new_yers_knigv_dt']."','".$data['new_yers_workkomp']."','".$data['new_yers_workkomp_dt']."','".$data['new_yers_garant']."','".$data['new_yers_garant_dt']."','".$data['new_yers_konsult']."','".$data['new_yers_konsult_dt']."','".$data['new_yers_ethernet']."','".$data['new_yers_ethernet_dt']."','".$data['new_yers_elkat']."','".$data['new_yers_elkat_dt']."','".$data['new_yers_provmer']."','".$data['new_yers_provmer_dt']."','".$data['new_yers_numposmer']."','".$data['new_yers_numposmer_dt']."','".$data['new_yers_sculkg']."','".$data['new_yers_sculkg_dt']."','".$data['new_yers_numobuch']."','".$data['new_yers_numobuch_dt']."','".$data['new_yers_numzanyt']."','".$data['new_yers_numzanyt_dt']."')",'insert');
        jsonecho('sc','sc');die;
    }
}
if($authmetod == 'download_cod_otchet'){
    $id = chektextST($_POST['date']);
    require_once '../core/PHPExcel/Classes/PHPExcel.php';
    require_once '../core/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php';
    require_once '../core/PHPExcel/Classes/PHPExcel/IOFactory.php';
    $xls = PHPExcel_IOFactory::load('../docs/cod_otchet_default.xls');
    $xls->setActiveSheetIndex(0);
    $sheet = $xls->getActiveSheet();
    $sheet->setTitle('ЛИСТ1');
    $userifnar = querydb("SELECT * FROM `administatrors_user` WHERE `login` = '".chektextST($LoginUser)."' AND `hashauth` = '".chektextST($passUser)."'");
    $otNewY = querydb("SELECT * FROM `otchet_cod` WHERE `id_otchet` = '".$id."' LIMIT 1");
    $selectAuthorOthet = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$otNewY['id_user']."'");
    $dateBD = $otNewY['date_otch'];
    $datebdaar = explode('_', $dateBD);
    $goddtarr = $datebdaar[0]-1;
    $resiltQuerdatedb = $goddtarr.'_'.$datebdaar[1];
    $otLasY = querydb("SELECT * FROM `otchet_cod` WHERE `id_user` = '".$otNewY['id_user']."' AND `date_otch` = '".$resiltQuerdatedb."' LIMIT 1");

    $textDate = "За ".$dateBD;
    $sheet->setCellValue("B9", $selectAuthorOthet['biblios']);
    $sheet->setCellValue("B10", $textDate);
    //Старый год (Заполнение)
    $sheet->setCellValue("D16", $otLasY['number_users']);$sheet->setCellValue("G16", $otLasY['number_users_kd']);
    $sheet->setCellValue("D17", $otLasY['number_visits']);$sheet->setCellValue("G17", $otLasY['number_visits_kd']);
    $sheet->setCellValue("D18", $otLasY['number_book_publishing']);$sheet->setCellValue("G18", $otLasY['number_book_publishing_kd']);
    $sheet->setCellValue("D20", $otLasY['work_komp']);$sheet->setCellValue("G20", $otLasY['work_komp_kd']);
    $sheet->setCellValue("D21", $otLasY['garant']);$sheet->setCellValue("G21", $otLasY['garant_kd']);
    $sheet->setCellValue("D22", $otLasY['konsultant']);$sheet->setCellValue("G22", $otLasY['konsultant_kd']);
    $sheet->setCellValue("D23", $otLasY['ethernet']);$sheet->setCellValue("G23", $otLasY['ethernet_kd']);
    $sheet->setCellValue("D24", $otLasY['electronic_catalog']);$sheet->setCellValue("G24", $otLasY['electronic_catalog_kd']);
    $sheet->setCellValue("D26", $otLasY['activities_carried']);$sheet->setCellValue("G26", $otLasY['activities_carried_kd']);
    $sheet->setCellValue("D27", $otLasY['number_event_visits']);$sheet->setCellValue("G27", $otLasY['number_event_visits_kd']);
    $sheet->setCellValue("D29", $otLasY['computer_school']);$sheet->setCellValue("G29", $otLasY['computer_school_kd']);
    $sheet->setCellValue("D30", $otLasY['number_students']);$sheet->setCellValue("G30", $otLasY['number_students_kd']);
    $sheet->setCellValue("D31", $otLasY['number_classes']);$sheet->setCellValue("G31", $otLasY['number_classes']);
    //новый год (Заполнение)
    $sheet->setCellValue("E16", $otNewY['number_users']);$sheet->setCellValue("H16", $otNewY['number_users_kd']);
    $sheet->setCellValue("E17", $otNewY['number_visits']);$sheet->setCellValue("H17", $otNewY['number_visits_kd']);
    $sheet->setCellValue("E18", $otNewY['number_book_publishing']);$sheet->setCellValue("H18", $otNewY['number_book_publishing_kd']);
    $sheet->setCellValue("E20", $otNewY['work_komp']);$sheet->setCellValue("H20", $otNewY['work_komp_kd']);
    $sheet->setCellValue("E21", $otNewY['garant']);$sheet->setCellValue("H21", $otNewY['garant_kd']);
    $sheet->setCellValue("E22", $otNewY['konsultant']);$sheet->setCellValue("H22", $otNewY['konsultant_kd']);
    $sheet->setCellValue("E23", $otNewY['ethernet']);$sheet->setCellValue("H23", $otNewY['ethernet_kd']);
    $sheet->setCellValue("E24", $otNewY['electronic_catalog']);$sheet->setCellValue("H24", $otNewY['electronic_catalog_kd']);
    $sheet->setCellValue("E26", $otNewY['activities_carried']);$sheet->setCellValue("H26", $otNewY['activities_carried_kd']);
    $sheet->setCellValue("E27", $otNewY['number_event_visits']);$sheet->setCellValue("H27", $otNewY['number_event_visits_kd']);
    $sheet->setCellValue("E29", $otNewY['computer_school']);$sheet->setCellValue("H29", $otNewY['computer_school_kd']);
    $sheet->setCellValue("E30", $otNewY['number_students']);$sheet->setCellValue("H30", $otNewY['number_students_kd']);
    $sheet->setCellValue("E31", $otNewY['number_classes']);$sheet->setCellValue("H31", $otNewY['number_classes']);
	
    $objWriter = new PHPExcel_Writer_Excel5($xls);
    $objWriter->save('../docs/cod_otchet_default.xls');
    die();
}
if($authmetod == 'download_result_otchet'){
    require_once '../core/PHPExcel/Classes/PHPExcel.php';
    require_once '../core/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php';
    require_once '../core/PHPExcel/Classes/PHPExcel/IOFactory.php';
    $xls = PHPExcel_IOFactory::load('../docs/cod_otchet_default.xls');
    $xls->setActiveSheetIndex(0);
    $sheet = $xls->getActiveSheet();
    $sheet->setTitle('ЛИСТ1');
    $userifnar = querydb("SELECT * FROM `administatrors_user` WHERE `login` = '".chektextST($LoginUser)."' AND `hashauth` = '".chektextST($passUser)."'");
    $dateYersNew = date('Y');
    $dateLast = $dateYersNew-1;
    $marth = date('n')-1;
    if(date('n') == 12 && date('d') > 21){ $marth = date('n'); }
    //if($marth == 0) $marth = 12;
    $rsDateBD = $dateYersNew.'_'.$marth;
    
    $textDate = "За ".$dateYersNew.' '.$marth;
    $sheet->setCellValue("B9", 'Межпоселенческая библиотека советского района');
    $sheet->setCellValue("B10", $textDate);

    $otNewY = querydb("SELECT * FROM `otchet_cod` WHERE `date_otch` = '".$rsDateBD."'",'noArray');

    $ny_chp_ld = 0;/*Число пользователей*/$ny_chp_dt_ld = 0;/*Число пользователей(kids)*/
    $ny_chpos_ld = 0;/*Число посещений*/$ny_chpos_dt_ld = 0;/*Число посещений(kids)*/
    $ny_knigv_ld = 0;/*Число книговыдач*/$ny_knigv_dt_ld = 0;/*Число книговыдач(kids)*/
    $ny_workkomp_ld = 0;/*Работа за компьютером*/$ny_workkomp_dt_ld = 0;/*Работа за компьютером(kids)*/
    $ny_garant_ld = 0;/*Гарант*/$ny_garant_dt_ld = 0;/*Гарант(kids)*/
    $ny_konsult_ld = 0;/*Консультант*/$ny_konsult_dt_ld = 0;/*Консультант(kids)*/
    $ny_ethernet_ld = 0;/*Интернет*/$ny_ethernet_dt_ld = 0;/*Интернет(kids)*/
    $ny_elkat_ld = 0;/*Электронный каталог*/$ny_elkat_dt_ld = 0;/*Электронный каталог(kids)*/
    $ny_provmer_ld = 0;/*Проведено мероприятий*/$ny_provmer_dt_ld = 0;/*Проведено мероприятий(kids)*/
    $ny_numposmer_ld = 0;/*Число посещений мероприятий*/$ny_numposmer_dt_ld = 0;/*Число посещений мероприятий(kids)*/
    $ny_sculkg_ld = 0;/*Школа компьютерной грамотности*/$ny_sculkg_dt_ld = 0;/*Школа компьютерной грамотности(kids)*/
    $ny_numobuch_ld = 0;/*Количество обучающихся*/$ny_numobuch_dt_ld = 0;/*Количество обучающихся(kids)*/
    $ny_numzanyt_ld = 0;/*Количество занятий*/$ny_numzanyt_dt_ld = 0;/*Количество занятий(kids)*/
    while($res = mysqli_fetch_array($otNewY)){
        $ny_chp_ld = $ny_chp_ld + $res['number_users'];$ny_chp_dt_ld = $ny_chp_dt_ld + $res['number_users_kd'];
        $ny_chpos_ld = $ny_chpos_ld + $res['number_visits'];$ny_chpos_dt_ld = $ny_chpos_dt_ld + $res['number_visits_kd'];
        $ny_knigv_ld = $ny_knigv_ld + $res['number_book_publishing'];$ny_knigv_dt_ld = $ny_knigv_dt_ld + $res['number_book_publishing_kd'];
        $ny_workkomp_ld = $ny_workkomp_ld + $res['work_komp'];$ny_workkomp_dt_ld = $ny_workkomp_dt_ld + $res['work_komp_kd'];
        $ny_garant_ld = $ny_garant_ld + $res['garant'];$ny_garant_dt_ld = $ny_garant_dt_ld + $res['garant_kd'];
        $ny_konsult_ld = $ny_konsult_ld + $res['konsultant'];$ny_konsult_dt_ld = $ny_konsult_dt_ld + $res['konsultant_kd'];
        $ny_ethernet_ld = $ny_ethernet_ld + $res['ethernet'];$ny_ethernet_dt_ld = $ny_ethernet_dt_ld + $res['ethernet_kd'];
        $ny_elkat_ld = $ny_elkat_ld + $res['electronic_catalog'];$ny_elkat_dt_ld = $ny_elkat_dt_ld + $res['electronic_catalog_kd'];
        $ny_provmer_ld = $ny_provmer_ld + $res['activities_carried'];$ny_provmer_dt_ld = $ny_provmer_dt_ld + $res['activities_carried_kd'];
        $ny_numposmer_ld = $ny_numposmer_ld + $res['number_event_visits'];$ny_numposmer_dt_ld = $ny_numposmer_dt_ld + $res['number_event_visits_kd'];
        $ny_sculkg_ld = $ny_sculkg_ld + $res['computer_school'];$ny_sculkg_dt_ld = $ny_sculkg_dt_ld + $res['computer_school_kd'];
        $ny_numobuch_ld = $ny_numobuch_ld + $res['number_students'];$ny_numobuch_dt_ld = $ny_numobuch_dt_ld + $res['number_students_kd'];
        $ny_numzanyt_ld = $ny_numzanyt_ld + $res['number_classes'];$ny_numzanyt_dt_ld = $ny_numzanyt_dt_ld + $res['number_classes_kd'];
    }
    //новый год (Заполнение)
    $sheet->setCellValue("E16", $ny_chp_ld);$sheet->setCellValue("H16", $ny_chp_dt_ld);
    $sheet->setCellValue("E17", $ny_chpos_ld);$sheet->setCellValue("H17", $ny_chpos_dt_ld);
    $sheet->setCellValue("E18", $ny_knigv_ld);$sheet->setCellValue("H18", $ny_knigv_dt_ld);
    $sheet->setCellValue("E20", $ny_workkomp_ld);$sheet->setCellValue("H20", $ny_workkomp_dt_ld);
    $sheet->setCellValue("E21", $ny_garant_ld);$sheet->setCellValue("H21", $ny_garant_dt_ld);
    $sheet->setCellValue("E22", $ny_konsult_ld);$sheet->setCellValue("H22", $ny_konsult_dt_ld);
    $sheet->setCellValue("E23", $ny_ethernet_ld);$sheet->setCellValue("H23", $ny_ethernet_dt_ld);
    $sheet->setCellValue("E24", $ny_elkat_ld);$sheet->setCellValue("H24", $ny_elkat_dt_ld);
    $sheet->setCellValue("E26", $ny_provmer_ld);$sheet->setCellValue("H26", $ny_provmer_dt_ld);
    $sheet->setCellValue("E27", $ny_numposmer_ld);$sheet->setCellValue("H27", $ny_numposmer_dt_ld);
    $sheet->setCellValue("E29", $ny_sculkg_ld);$sheet->setCellValue("H29", $ny_sculkg_dt_ld);
    $sheet->setCellValue("E30", $ny_numobuch_ld);$sheet->setCellValue("H30", $ny_numobuch_dt_ld);
    $sheet->setCellValue("E31", $ny_numzanyt_ld);$sheet->setCellValue("H31", $ny_numzanyt_dt_ld);

    $rsDateBD2 = $dateLast.'_'.$marth;
    $otLasY = querydb("SELECT * FROM `otchet_cod` WHERE `date_otch` = '".$rsDateBD2."'",'noArray');
    $ly_chp_ld = 0;/*Число пользователей*/$ly_chp_dt_ld = 0;/*Число пользователей(kids)*/
    $ly_chpos_ld = 0;/*Число посещений*/$ly_chpos_dt_ld = 0;/*Число посещений(kids)*/
    $ly_knigv_ld = 0;/*Число книговыдач*/$ly_knigv_dt_ld = 0;/*Число книговыдач(kids)*/
    $ly_workkomp_ld = 0;/*Работа за компьютером*/$ly_workkomp_dt_ld = 0;/*Работа за компьютером(kids)*/
    $ly_garant_ld = 0;/*Гарант*/$ly_garant_dt_ld = 0;/*Гарант(kids)*/
    $ly_konsult_ld = 0;/*Консультант*/$ly_konsult_dt_ld = 0;/*Консультант(kids)*/
    $ly_ethernet_ld = 0;/*Интернет*/$ly_ethernet_dt_ld = 0;/*Интернет(kids)*/
    $ly_elkat_ld = 0;/*Электронный каталог*/$ly_elkat_dt_ld = 0;/*Электронный каталог(kids)*/
    $ly_provmer_ld = 0;/*Проведено мероприятий*/$ly_provmer_dt_ld = 0;/*Проведено мероприятий(kids)*/
    $ly_numposmer_ld = 0;/*Число посещений мероприятий*/$ly_numposmer_dt_ld = 0;/*Число посещений мероприятий(kids)*/
    $ly_sculkg_ld = 0;/*Школа компьютерной грамотности*/$ly_sculkg_dt_ld = 0;/*Школа компьютерной грамотности(kids)*/
    $ly_numobuch_ld = 0;/*Количество обучающихся*/$ly_numobuch_dt_ld = 0;/*Количество обучающихся(kids)*/
    $ly_numzanyt_ld = 0;/*Количество занятий*/$ly_numzanyt_dt_ld = 0;/*Количество занятий(kids)*/
    while($res = mysqli_fetch_array($otLasY)){
        $ly_chp_ld = $ly_chp_ld + $res['number_users'];$ly_chp_dt_ld = $ly_chp_dt_ld + $res['number_users_kd'];
        $ly_chpos_ld = $ly_chpos_ld + $res['number_visits'];$ly_chpos_dt_ld = $ly_chpos_dt_ld + $res['number_visits_kd'];
        $ly_knigv_ld = $ly_knigv_ld + $res['number_book_publishing'];$ly_knigv_dt_ld = $ly_knigv_dt_ld + $res['number_book_publishing_kd'];
        $ly_workkomp_ld = $ly_workkomp_ld + $res['work_komp'];$ly_workkomp_dt_ld = $ly_workkomp_dt_ld + $res['work_komp_kd'];
        $ly_garant_ld = $ly_garant_ld + $res['garant'];$ly_garant_dt_ld = $ly_garant_dt_ld + $res['garant_kd'];
        $ly_konsult_ld = $ly_konsult_ld + $res['konsultant'];$ly_konsult_dt_ld = $ly_konsult_dt_ld + $res['konsultant_kd'];
        $ly_ethernet_ld = $ly_ethernet_ld + $res['ethernet'];$ly_ethernet_dt_ld = $ly_ethernet_dt_ld + $res['ethernet_kd'];
        $ly_elkat_ld = $ly_elkat_ld + $res['electronic_catalog'];$ly_elkat_dt_ld = $ly_elkat_dt_ld + $res['electronic_catalog_kd'];
        $ly_provmer_ld = $ly_provmer_ld + $res['activities_carried'];$ly_provmer_dt_ld = $ly_provmer_dt_ld + $res['activities_carried_kd'];
        $ly_numposmer_ld = $ly_numposmer_ld + $res['number_event_visits'];$ly_numposmer_dt_ld = $ly_numposmer_dt_ld + $res['number_event_visits_kd'];
        $ly_sculkg_ld = $ly_sculkg_ld + $res['computer_school'];$ly_sculkg_dt_ld = $ly_sculkg_dt_ld + $res['computer_school_kd'];
        $ly_numobuch_ld = $ly_numobuch_ld + $res['number_students'];$ly_numobuch_dt_ld = $ly_numobuch_dt_ld + $res['number_students_kd'];
        $ly_numzanyt_ld = $ly_numzanyt_ld + $res['number_classes'];$ly_numzanyt_dt_ld = $ly_numzanyt_dt_ld + $res['number_classes_kd'];
    }
    //Старый год (Заполнение)
    $sheet->setCellValue("D16", $ly_chp_ld);$sheet->setCellValue("G16", $ly_chp_dt_ld);
    $sheet->setCellValue("D17", $ly_chpos_ld);$sheet->setCellValue("G17", $ly_chpos_dt_ld);
    $sheet->setCellValue("D18", $ly_knigv_ld);$sheet->setCellValue("G18", $ly_knigv_dt_ld);
    $sheet->setCellValue("D20", $ly_workkomp_ld);$sheet->setCellValue("G20", $ly_workkomp_dt_ld);
    $sheet->setCellValue("D21", $ly_garant_ld);$sheet->setCellValue("G21", $ly_garant_dt_ld);
    $sheet->setCellValue("D22", $ly_konsult_ld);$sheet->setCellValue("G22", $ly_konsult_dt_ld);
    $sheet->setCellValue("D23", $ly_ethernet_ld);$sheet->setCellValue("G23", $ly_ethernet_dt_ld);
    $sheet->setCellValue("D24", $ly_elkat_ld);$sheet->setCellValue("G24", $ly_elkat_dt_ld);
    $sheet->setCellValue("D26", $ly_provmer_ld);$sheet->setCellValue("G26", $ly_provmer_dt_ld);
    $sheet->setCellValue("D27", $ly_numposmer_ld);$sheet->setCellValue("G27", $ly_numposmer_dt_ld);
    $sheet->setCellValue("D29", $ly_sculkg_ld);$sheet->setCellValue("G29", $ly_sculkg_dt_ld);
    $sheet->setCellValue("D30", $ly_numobuch_ld);$sheet->setCellValue("G30", $ly_numobuch_dt_ld);
    $sheet->setCellValue("D31", $ly_numzanyt_ld);$sheet->setCellValue("G31", $ly_numzanyt_dt_ld);
	
    querydb("DELETE FROM `otchet_cod_all` WHERE `date_otch` = '".$rsDateBD2."' AND `date_otch` = '".$rsDateBD."'","Delete");
    /*Данные предыдущего года*/
    querydb("INSERT INTO `otchet_cod_all`(`id_user`, `date_otch`, `number_users`, `number_users_kd`, `number_visits`, `number_visits_kd`, `number_book_publishing`, `number_book_publishing_kd`, `work_komp`, `work_komp_kd`, `garant`, `garant_kd`, `konsultant`, `konsultant_kd`, `ethernet`, `ethernet_kd`, `electronic_catalog`, `electronic_catalog_kd`, `activities_carried`, `activities_carried_kd`, `number_event_visits`, `number_event_visits_kd`, `computer_school`, `computer_school_kd`, `number_students`, `number_students_kd`, `number_classes`, `number_classes_kd`) 
                VALUES 
               ('".$userifnar['id']."','".$rsDateBD2."','".$ly_chp_ld."','".$ly_chp_dt_ld."','".$ly_chpos_ld."','".$ly_chpos_dt_ld."','".$ly_knigv_ld."','".$ly_knigv_dt_ld."','".$ly_workkomp_ld."','".$ly_workkomp_dt_ld."','".$ly_garant_ld."','".$ly_garant_dt_ld."','".$ly_konsult_ld."','".$ly_konsult_dt_ld."','".$ly_ethernet_ld."','".$ly_ethernet_dt_ld."','".$ly_elkat_ld."','".$ly_elkat_dt_ld."','".$ly_provmer_ld."','".$ly_provmer_dt_ld."','".$ly_numposmer_ld."','".$ly_numposmer_dt_ld."','".$ly_sculkg_ld."','".$ly_sculkg_dt_ld."','".$ly_numobuch_ld."','".$ly_numobuch_dt_ld."','".$ly_numzanyt_ld."','".$ly_numzanyt_dt_ld."')",'insert');
    /*Данные этого года*/
    querydb("INSERT INTO `otchet_cod_all`(`id_user`, `date_otch`, `number_users`, `number_users_kd`, `number_visits`, `number_visits_kd`, `number_book_publishing`, `number_book_publishing_kd`, `work_komp`, `work_komp_kd`, `garant`, `garant_kd`, `konsultant`, `konsultant_kd`, `ethernet`, `ethernet_kd`, `electronic_catalog`, `electronic_catalog_kd`, `activities_carried`, `activities_carried_kd`, `number_event_visits`, `number_event_visits_kd`, `computer_school`, `computer_school_kd`, `number_students`, `number_students_kd`, `number_classes`, `number_classes_kd`) 
                 VALUES 
                ('".$userifnar['id']."','".$rsDateBD."','".$ny_chp_ld."','".$ny_chp_dt_ld."','".$ny_chpos_ld."','".$ny_chpos_dt_ld."','".$ny_knigv_ld."','".$ny_knigv_dt_ld."','".$ny_workkomp_ld."','".$ny_workkomp_dt_ld."','".$ny_garant_ld."','".$ny_garant_dt_ld."','".$ny_konsult_ld."','".$ny_konsult_dt_ld."','".$ny_ethernet_ld."','".$ny_ethernet_dt_ld."','".$ny_elkat_ld."','".$ny_elkat_dt_ld."','".$ny_provmer_ld."','".$ny_provmer_dt_ld."','".$ny_numposmer_ld."','".$ny_numposmer_dt_ld."','".$ny_sculkg_ld."','".$ny_sculkg_dt_ld."','".$ny_numobuch_ld."','".$ny_numobuch_dt_ld."','".$ny_numzanyt_ld."','".$ny_numzanyt_dt_ld."')",'insert');
    $objWriter = new PHPExcel_Writer_Excel5($xls);
    $objWriter->save('../docs/cod_otchet_default.xls');
    die();
}
if($authmetod == 'cod_work_save'){
    $data = arrastr($_POST['date'], '&');
    $idOthchet = (int)$_POST['id'];
    $dateYersNew = date('Y');
    $dateLast = $dateYersNew-1;
    $marth = date('n')-1;
    if(date('d') > 24){ $marth = date('n'); }
    //if($marth == 0) $marth = 12;
    $dateSBD = $dateLast.'_'.$marth;//Дата прошлогоднего отчета
    $dateSendbd = $dateYersNew.'_'.$marth;//Дата нунешнего отчета
    $dostups = queryaccesspages('work-cod',$INFOUSER['PravaDostups']);
    if($dostups == 'access'){
        for($i=0;$i < count($data); $i++){preg_replace('/[^0-9]/', '', $data[$i]);}
        $otchetnostArrNew = querydb("SELECT * FROM `otchet_cod` WHERE `id_otchet` = '".$idOthchet."'");
        $dateBD = $otchetnostArrNew['date_otch'];
        $authorOtchet = $otchetnostArrNew['id_user'];
        $datebdaar = explode('_', $dateBD);
        $goddtarr = $datebdaar[0]-1;
        $resiltQuerdatedb = $goddtarr.'_'.$datebdaar[1];
        /*Обновление информации отчеты цода нынешнего года*/
        querydb("UPDATE `otchet_cod` SET `number_users`='".$data['new_yers_chp']."',`number_users_kd`='".$data['new_yers_chp_dt']."',`number_visits`='".$data['new_yers_chpos']."',
                `number_visits_kd`='".$data['new_yers_chpos_dt']."',`number_book_publishing`='".$data['new_yers_knigv']."',
                `number_book_publishing_kd`='".$data['new_yers_knigv_dt']."',`work_komp`='".$data['new_yers_workkomp']."',`work_komp_kd`='".$data['new_yers_workkomp_dt']."',
                `garant`='".$data['new_yers_garant']."',`garant_kd`='".$data['new_yers_garant_dt']."',`konsultant`='".$data['new_yers_konsult']."',`konsultant_kd`='".$data['new_yers_konsult_dt']."',
                `ethernet`='".$data['new_yers_ethernet']."',`ethernet_kd`='".$data['new_yers_ethernet_dt']."',`electronic_catalog`='".$data['new_yers_elkat']."',`electronic_catalog_kd`='".$data['new_yers_elkat_dt']."',
                `activities_carried`='".$data['new_yers_provmer']."',`activities_carried_kd`='".$data['new_yers_provmer_dt']."',`number_event_visits`='".$data['new_yers_numposmer']."',
                `number_event_visits_kd`='".$data['new_yers_numposmer_dt']."',`computer_school`='".$data['new_yers_sculkg']."',`computer_school_kd`='".$data['new_yers_sculkg_dt']."',
                `number_students`='".$data['new_yers_numobuch']."',`number_students_kd`='".$data['new_yers_numobuch_dt']."',`number_classes`='".$data['new_yers_numzanyt']."',
                `number_classes_kd`='".$data['new_yers_numzanyt_dt']."' WHERE `id_otchet` = '".$idOthchet."'",'upldate');
        /*Обновление информации отчеты цода предыдущего года*/
        querydb("UPDATE `otchet_cod` SET `number_users`='".$data['last_yers_chp']."',`number_users_kd`='".$data['last_yers_chp_dt']."',`number_visits`='".$data['last_yers_chpos']."',
                `number_visits_kd`='".$data['last_yers_chpos_dt']."',`number_book_publishing`='".$data['last_yers_knigv']."',
                `number_book_publishing_kd`='".$data['last_yers_knigv_dt']."',`work_komp`='".$data['last_yers_workkomp']."',`work_komp_kd`='".$data['last_yers_workkomp_dt']."',
                `garant`='".$data['last_yers_garant']."',`garant_kd`='".$data['last_yers_garant_dt']."',`konsultant`='".$data['last_yers_konsult']."',`konsultant_kd`='".$data['last_yers_konsult_dt']."',`ethernet`='".$data['last_yers_ethernet']."',
                `ethernet_kd`='".$data['last_yers_ethernet_dt']."',`electronic_catalog`='".$data['last_yers_elkat']."',`electronic_catalog_kd`='".$data['last_yers_elkat_dt']."',
                `activities_carried`='".$data['last_yers_provmer']."',`activities_carried_kd`='".$data['last_yers_provmer_dt']."',`number_event_visits`='".$data['last_yers_numposmer']."',
                `number_event_visits_kd`='".$data['last_yers_numposmer_dt']."',`computer_school`='".$data['last_yers_sculkg']."',`computer_school_kd`='".$data['last_yers_sculkg_dt']."',
                `number_students`='".$data['last_yers_numobuch']."',`number_students_kd`='".$data['last_yers_numobuch_dt']."',`number_classes`='".$data['last_yers_numzanyt']."',
                `number_classes_kd`='".$data['last_yers_numzanyt_dt']."' WHERE `id_user` = '".$authorOtchet."' AND `date_otch` = '".$resiltQuerdatedb."'",'upldate');
        jsonecho('sc','sc');die;
    }else jsonecho('noaccess');die;
}
if($authmetod == 'load_filter_data'){
    //Подгрузка филтров по годам
    $arrDates = explode('/', $_SERVER['HTTP_REFERER']);
    if($arrDates[3] == 'list-otchets-work-cod'){
        //фильтр цода
        $yer_data=(int)$_POST['year_data'];
        $math_data=(int)$_POST['math_data'];
        $rsqueryDate = $yer_data.'_'.$math_data;
        $result_date = querydb("SELECT * FROM `otchet_cod` WHERE `date_otch` = '".$rsqueryDate."' ",'noArray');
        $iis=0;
        while($r = mysqli_fetch_array($result_date)){
            $infuserID = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$r['id_user']."'");
            echo'<tr>';
            echo'<th>'.$infuserID['biblios'].'</th>';
            echo'<th>'.$r['date_otch'].'</th>';
            echo'<th><a href="/work-cod'.$r['id_otchet'].'">Посмотреть</a></th>';
            echo'<th><a href="/edit-otchet-work-cod'.$r['id_otchet'].'">Редактировать</a></th>';
            echo'<th><a href="#" onclick="downloadCodOtchet('.$r['id_otchet'].');return false;">Скачать</a></th>';
            echo'</tr>';
            $iis++;
        }
        if($iis == 0){echo'<tr><th colspan="5" style="font-size:30px;">Данные отсуствуют</th></tr>';die();}
    }else if($arrDates[3] == 'list-key-indicators'){
        //отчета форма 1
        $yer_data=(int)$_POST['year_data'];
        $math_data=(int)$_POST['math_data'];
        $rsqueryDate = $yer_data.'_'.$math_data;
        $result_date = querydb("SELECT * FROM `key_indicators` WHERE `date` = '".$rsqueryDate."' ",'noArray');
        $iis=0;
        while($r = mysqli_fetch_array($result_date)){
            $infuserID = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$r['id_author']."'");
            echo'<tr>';
            echo'<th>'.$infuserID['biblios'].'</th>';
            echo'<th>'.$r['date'].'</th>';
            echo'<th><a href="/key-indicators'.$r['id_otchet'].'">Посмотреть</a></th>';
            echo'<th><a href="/edit-key-indicators'.$r['id_otchet'].'">Редактировать</a></th>';
            echo'<th><a href="#" onclick="download_key_indicators('.$r['id_otchet'].');return false;">Скачать</a></th>';
            echo'</tr>';
            $iis++;
        }
        if($iis == 0){echo'<tr><th colspan="5" style="font-size:30px;">Данные отсуствуют</th></tr>';die();}
    }else if($arrDates[3] == 'list-cultural-events'){
        //отчета Культура
        $yer_data=(int)$_POST['year_data'];
        $math_data=(int)$_POST['math_data'];
        $rsqueryDate = $yer_data.'_'.$math_data;
        $result_date = querydb("SELECT * FROM `cultural_events` WHERE `date_otcht` = '".$rsqueryDate."' ",'noArray');
        $iis=0;
        while($r = mysqli_fetch_array($result_date)){
            $infuserID = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$r['id_user']."'");
            echo'<tr>';
            echo'<th>'.$infuserID['biblios'].'</th>';
            echo'<th>'.$r['date_otcht'].'</th>';
            echo'<th><a href="/cultural-events'.$r['id_otchets'].'">Посмотреть</a></th>';
            echo'<th><a href="/edit-cultural-events'.$r['id_otchets'].'">Редактировать</a></th>';
            echo'<th><a href="#" onclick="download_cultural_events('.$r['id_otchets'].');return false;">Скачать</a></th>';
            echo'</tr>';
            $iis++;
        }
        if($iis == 0){echo'<tr><th colspan="5" style="font-size:30px;">Данные отсуствуют</th></tr>';die();}
    }else{echo"NULL";die();}
}
if($authmetod == 'send_otche_forms1'){
    $data = arrastr($_POST['date'], '&');
    $dateYersNew = date('Y');
    $dateLast = $dateYersNew-1;
    $marth = date('n')-1;
    $day = date('d');
    if($day > 25){$marth = date('n');}
    if(date('n') == 12 && date('d') > 21){ $marth = date('n'); }
    //if($marth == 0) $marth = 12;
    $dateSBD = $dateLast.'_'.$marth;//Дата прошлогоднего отчета
    $dateSendbd = $dateYersNew.'_'.$marth;//Дата нунешнего отчета
    $queryInfoUser = querydb("SELECT id FROM `administatrors_user` WHERE `login` = '".$LoginUser."' AND `hashauth` = '".$passUser."'");
    for($i=0;$i < count($data); $i++){preg_replace('/[^0-9]/', '', $data[$i]);}
    $rssq = querydb("SELECT * FROM `key_indicators` WHERE `id_author` = '".$queryInfoUser['id']."' AND `date` = '".$dateSendbd."'");
    if(isset($rssq)){jsonecho('est');die;}
    if($day > 10){jsonecho('noSent');die;}
    if(!isset($rssq)){
        //Если отчета нет.
        querydb("INSERT INTO `key_indicators`(`id_author`, `date`, `readers`, `readers_15_30`, `state_service`, `edd`, `litres`, `visits`, `visits_stationary`, `visits_out_station`, `visits_site`, `book_publishing`, `book_publishing_15_30`, `book_publishing_stationary`, `book_publishing_outof_station`, `book_publishing_periodically`, `book_publishing_books`, `book_publishing_av`, `book_publishing_electronic_media`, `book_publishing_vtch_edd`, `book_publishing_litres`, `book_publishing_opl`, `book_publishing_enl`, `book_publishing_tex`, `book_publishing_sx`, `book_publishing_isky`, `book_publishing_xyd`, `book_publishing_det`, `book_publishing_proch`, `events`, `events_stationary`, `events_out_station`, `events_sits`, `visits2`, `visits2_stationary`, `visits2_out_station`, `indiv_info`, `group_info`, `d14_readers`, `d14_vch_15_30`, `d14_state_uslugi`, `d14_edd`, `d14_litres`, `d14_visits`, `d14_visits_stationary`, `d14_visits_out_station`, `d14_visits_sits`, `d14_book_pub`, `d14_book_pub_15_30`, `d14_book_pub_stationary`, `d14_book_pub_out_station`, `d14_book_pub_periodically`, `d14_book_pub_books`, `d14_book_pub_books_av`, `d14_book_pub_electronic_media`, `d14_book_pub_edd`, `d14_book_pub_litres`, `d14_book_pub_opl`, `d14_book_pub_enl`, `d14_book_pub_tex`, `d14_book_pub_sx`, `d14_book_pub_iskys`, `d14_book_pub_hudozh`, `d14_book_pub_det`, `d14_book_pub_proch`, `d14_events`, `d14_events_stationary`, `d14_events_out_station`, `d14_events_sits`, `d14_vesites`, `d14_vesites_stationary`, `d14_vesites_out_station`, `d14_indiv_info`, `d14_group_info`, `s15_readers`, `s15_vch_15_30`, `s15_state_uslugi`, `s15_edd`, `s15_litres`, `s15_visits`, `s15_visits_stationary`, `s15_visits_out_station`, `s15_visits_sits`, `s15_book_pub`, `s15_book_pub_15_30`, `s15_book_pub_stationary`, `s15_book_pub_out_station`, `s15_book_pub_periodically`, `s15_book_pub_books`, `s15_book_pub_books_av`, `s15_book_pub_electronic_media`, `s15_book_pub_edd`, `s15_book_pub_litres`, `s15_book_pub_opl`, `s15_book_pub_enl`, `s15_book_pub_tex`, `s15_book_pub_sx`, `s15_book_pub_iskys`, `s15_book_pub_hudozh`, `s15_book_pub_det`, `s15_book_pub_proch`, `s15_events`, `s15_events_stationary`, `s15_events_out_station`, `s15_events_sits`, `s15_vesites`, `s15_vesites_stationary`, `s15_vesites_out_station`, `s15_indiv_info`, `s15_group_info`) 
                 VALUES 
                                             ('".$queryInfoUser['id']."','".$dateSendbd."','".$data['readers']."','".$data['readers_vtch1530']."','".$data['state_service']."','".$data['edd']."','".$data['litres']."','".$data['visits']."','".$data['visits_stationary']."','".$data['visits_out_station']."','".$data['visits_site']."','".$data['book_publishing']."','".$data['book_publishing_15_30']."','".$data['book_publishing_stationary']."','".$data['book_publishing_outof_station']."','".$data['book_publishing_periodically']."','".$data['book_publishing_books']."','".$data['book_publishing_av']."','".$data['book_publishing_electronic_media']."','".$data['book_publishing_vtch_edd']."','".$data['book_publishing_litres']."','".$data['book_publishing_opl']."','".$data['book_publishing_enl']."','".$data['book_publishing_tex']."','".$data['book_publishing_sx']."','".$data['book_publishing_isky']."','".$data['book_publishing_xyd']."','".$data['book_publishing_det']."','".$data['book_publishing_proch']."','".$data['events']."','".$data['events_stationary']."','".$data['events_out_station']."','".$data['events_sits']."','".$data['visits2']."','".$data['visits2_stationary']."','".$data['visits2_out_station']."','".$data['indiv_info']."','".$data['group_info']."','".$data['d14_readers']."','".$data['d14_vch_15_30']."','".$data['d14_state_uslugi']."','".$data['d14_edd']."','".$data['d14_litres']."','".$data['d14_visits']."','".$data['d14_visits_stationary']."','".$data['d14_visits_out_station']."','".$data['d14_visits_sits']."','".$data['d14_book_pub']."','".$data['d14_book_pub_15_30']."','".$data['d14_book_pub_stationary']."','".$data['d14_book_pub_out_station']."','".$data['d14_book_pub_periodically']."','".$data['d14_book_pub_books']."','".$data['d14_book_pub_books_av']."','".$data['d14_book_pub_electronic_media']."','".$data['d14_book_pub_edd']."','".$data['d14_book_pub_litres']."','".$data['d14_book_pub_opl']."','".$data['d14_book_pub_enl']."','".$data['d14_book_pub_tex']."','".$data['d14_book_pub_sx']."','".$data['d14_book_pub_iskys']."','".$data['d14_book_pub_hudozh']."','".$data['d14_book_pub_det']."','".$data['d14_book_pub_proch']."','".$data['d14_events']."','".$data['d14_events_stationary']."','".$data['d14_events_out_station']."','".$data['d14_events_sits']."','".$data['d14_vesites']."','".$data['d14_vesites_stationary']."','".$data['d14_vesites_out_station']."','".$data['d14_indiv_info']."','".$data['d14_group_info']."','".$data['s15_readers']."','".$data['s15_vch_15_30']."','".$data['s15_state_uslugi']."','".$data['s15_edd']."','".$data['s15_litres']."','".$data['s15_visits']."','".$data['s15_visits_stationary']."','".$data['s15_visits_out_station']."','".$data['s15_visits_sits']."','".$data['s15_book_pub']."','".$data['s15_book_pub_15_30']."','".$data['s15_book_pub_stationary']."','".$data['s15_book_pub_out_station']."','".$data['s15_book_pub_periodically']."','".$data['s15_book_pub_books']."','".$data['s15_book_pub_books_av']."','".$data['s15_book_pub_electronic_media']."','".$data['s15_book_pub_edd']."','".$data['s15_book_pub_litres']."','".$data['s15_book_pub_opl']."','".$data['s15_book_pub_enl']."','".$data['s15_book_pub_tex']."','".$data['s15_book_pub_sx']."','".$data['s15_book_pub_iskys']."','".$data['s15_book_pub_hudozh']."','".$data['s15_book_pub_det']."','".$data['s15_book_pub_proch']."','".$data['s15_events']."','".$data['s15_events_stationary']."','".$data['s15_events_out_station']."','".$data['s15_events_sits']."','".$data['s15_vesites']."','".$data['s15_vesites_stationary']."','".$data['s15_vesites_out_station']."','".$data['s15_indiv_info']."','".$data['s15_group_info']."')",
        'insert');
        $querynewID = querydb("SELECT id_otchet FROM `key_indicators` WHERE `id_author` = '".$queryInfoUser['id']."' AND `date` = '".$dateSendbd."'");
        querydb("INSERT INTO `key_indicators_log_edit`(`id_otchet`, `id_author_edit`, `date_edit`, `method`) 
                      VALUES ('".$querynewID['id_otchet']."','".$queryInfoUser['id']."','".date('d-m-Y G:i')."','Send')",'insert');
        jsonecho('sc','sc');die;
    }
    jsonecho('noSent2');die;
}
if($authmetod == 'send_save_otche_forms1'){
    $explodesHEaders = explode('/', $_SERVER['HTTP_REFERER']);
    $idOthchet = (int)chektextST(preg_replace('/[^0-9]/', '', $explodesHEaders[3]));
    $data = arrastr($_POST['date'], '&');
    $dateYersNew = date('Y');
    $dateLast = $dateYersNew-1;
    $marth = date('n')-1;
    if(date('n') == 12 && date('d') > 21){ $marth = date('n'); }
    $day = date('d');
    //if($day > 25){$marth = date('m');}
    if($marth == 0) $marth = 12;
    $dateSBD = $dateLast.'_'.$marth;//Дата прошлогоднего отчета
    $dateSendbd = $dateYersNew.'_'.$marth;//Дата нунешнего отчета
    $dostups = queryaccesspages('key-indicators',$INFOUSER['PravaDostups']);
    $rssq = querydb("SELECT id_otchet,id_author FROM `key_indicators` WHERE `id_otchet` = '".$idOthchet."'");
    $author_otchets='no';
    if($rssq['id_author'] == $INFOUSER['id']) $author_otchets='yes';
    if($author_otchets == 'yes' || $dostups == 'access'){
        for($i=0;$i < count($data); $i++){preg_replace('/[^0-9]/', '', $data[$i]);}
        querydb("UPDATE `key_indicators` SET `readers`='".$data['readers']."',`readers_15_30`='".$data['readers_vtch1530']."',`state_service`='".$data['state_service']."',`edd`='".$data['edd']."',
        `litres`='".$data['litres']."',`visits`='".$data['visits']."',`visits_stationary`='".$data['visits_stationary']."',`visits_out_station`='".$data['visits_out_station']."',`visits_site`='".$data['visits_site']."',
        `book_publishing`='".$data['book_publishing']."',`book_publishing_15_30`='".$data['book_publishing_15_30']."',`book_publishing_stationary`='".$data['book_publishing_stationary']."',
        `book_publishing_outof_station`='".$data['book_publishing_outof_station']."',`book_publishing_periodically`='".$data['book_publishing_periodically']."',`book_publishing_books`='".$data['book_publishing_books']."',
        `book_publishing_av`='".$data['book_publishing_av']."',`book_publishing_electronic_media`='".$data['book_publishing_electronic_media']."',`book_publishing_vtch_edd`='".$data['book_publishing_vtch_edd']."',
        `book_publishing_litres`='".$data['book_publishing_litres']."',`book_publishing_opl`='".$data['book_publishing_opl']."',`book_publishing_enl`='".$data['book_publishing_enl']."',
        `book_publishing_tex`='".$data['book_publishing_tex']."',`book_publishing_sx`='".$data['book_publishing_sx']."',`book_publishing_isky`='".$data['book_publishing_isky']."',`book_publishing_xyd`='".$data['book_publishing_xyd']."',
        `book_publishing_det`='".$data['book_publishing_det']."',`book_publishing_proch`='".$data['book_publishing_proch']."',`events`='".$data['events']."',`events_stationary`='".$data['events_stationary']."',
        `events_out_station`='".$data['events_out_station']."',`events_sits`='".$data['events_sits']."',`visits2`='".$data['visits2']."',`visits2_stationary`='".$data['visits2_stationary']."',
        `visits2_out_station`='".$data['visits2_out_station']."',`indiv_info`='".$data['indiv_info']."',`group_info`='".$data['group_info']."',`d14_readers`='".$data['d14_readers']."',`d14_vch_15_30`='".$data['d14_vch_15_30']."',`d14_state_uslugi`='".$data['d14_state_uslugi']."',
        `d14_edd`='".$data['d14_edd']."',`d14_litres`='".$data['d14_litres']."',`d14_visits`='".$data['d14_visits']."',`d14_visits_stationary`='".$data['d14_visits_stationary']."',
        `d14_visits_out_station`='".$data['d14_visits_out_station']."',`d14_visits_sits`='".$data['d14_visits_sits']."',`d14_book_pub`='".$data['d14_book_pub']."',`d14_book_pub_15_30`='".$data['d14_book_pub_15_30']."',
        `d14_book_pub_stationary`='".$data['d14_book_pub_stationary']."',`d14_book_pub_out_station`='".$data['d14_book_pub_out_station']."',`d14_book_pub_periodically`='".$data['d14_book_pub_periodically']."',
        `d14_book_pub_books`='".$data['d14_book_pub_books']."',`d14_book_pub_books_av`='".$data['d14_book_pub_books_av']."',`d14_book_pub_electronic_media`='".$data['d14_book_pub_electronic_media']."',
        `d14_book_pub_edd`='".$data['d14_book_pub_edd']."',`d14_book_pub_litres`='".$data['d14_book_pub_litres']."',`d14_book_pub_opl`='".$data['d14_book_pub_opl']."',`d14_book_pub_enl`='".$data['d14_book_pub_enl']."',
        `d14_book_pub_tex`='".$data['d14_book_pub_tex']."',`d14_book_pub_sx`='".$data['d14_book_pub_sx']."',`d14_book_pub_iskys`='".$data['d14_book_pub_iskys']."',`d14_book_pub_hudozh`='".$data['d14_book_pub_hudozh']."',
        `d14_book_pub_det`='".$data['d14_book_pub_det']."',`d14_book_pub_proch`='".$data['d14_book_pub_proch']."',`d14_events`='".$data['d14_events']."',`d14_events_stationary`='".$data['d14_events_stationary']."',
        `d14_events_out_station`='".$data['d14_events_out_station']."',`d14_events_sits`='".$data['d14_events_sits']."',`d14_vesites`='".$data['d14_vesites']."',`d14_vesites_stationary`='".$data['d14_vesites_stationary']."',
        `d14_vesites_out_station`='".$data['d14_vesites_out_station']."',`d14_indiv_info`='".$data['d14_indiv_info']."',`d14_group_info`='".$data['d14_group_info']."',`s15_readers`='".$data['s15_readers']."',`s15_vch_15_30`='".$data['s15_vch_15_30']."',`s15_state_uslugi`='".$data['s15_state_uslugi']."',
        `s15_edd`='".$data['s15_edd']."',`s15_litres`='".$data['s15_litres']."',`s15_visits`='".$data['s15_visits']."',`s15_visits_stationary`='".$data['s15_visits_stationary']."',
        `s15_visits_out_station`='".$data['s15_visits_out_station']."',`s15_visits_sits`='".$data['s15_visits_sits']."',`s15_book_pub`='".$data['s15_book_pub']."',`s15_book_pub_15_30`='".$data['s15_book_pub_15_30']."',
        `s15_book_pub_stationary`='".$data['s15_book_pub_stationary']."',`s15_book_pub_out_station`='".$data['s15_book_pub_out_station']."',`s15_book_pub_periodically`='".$data['s15_book_pub_periodically']."',
        `s15_book_pub_books`='".$data['s15_book_pub_books']."',`s15_book_pub_books_av`='".$data['s15_book_pub_books_av']."',`s15_book_pub_electronic_media`='".$data['s15_book_pub_electronic_media']."',
        `s15_book_pub_edd`='".$data['s15_book_pub_edd']."',`s15_book_pub_litres`='".$data['s15_book_pub_litres']."',`s15_book_pub_opl`='".$data['s15_book_pub_opl']."',`s15_book_pub_enl`='".$data['s15_book_pub_enl']."',
        `s15_book_pub_tex`='".$data['s15_book_pub_tex']."',`s15_book_pub_sx`='".$data['s15_book_pub_sx']."',`s15_book_pub_iskys`='".$data['s15_book_pub_iskys']."',`s15_book_pub_hudozh`='".$data['s15_book_pub_hudozh']."',
        `s15_book_pub_det`='".$data['s15_book_pub_det']."',`s15_book_pub_proch`='".$data['s15_book_pub_proch']."',`s15_events`='".$data['s15_events']."',`s15_events_stationary`='".$data['s15_events_stationary']."',
        `s15_events_out_station`='".$data['s15_events_out_station']."',`s15_events_sits`='".$data['s15_events_sits']."',`s15_vesites`='".$data['s15_vesites']."',`s15_vesites_stationary`='".$data['s15_vesites_stationary']."',
        `s15_vesites_out_station`='".$data['s15_vesites_out_station']."',`s15_indiv_info`='".$data['s15_indiv_info']."',`s15_group_info`='".$data['s15_group_info']."' 
        WHERE `id_otchet` = '".$idOthchet."'",'update');
        querydb("INSERT INTO `key_indicators_log_edit`(`id_otchet`, `id_author_edit`, `date_edit`, `method`) 
                      VALUES ('".$idOthchet."','".$INFOUSER['id']."','".date('d-m-Y G:i')."','update')",'insert');
        jsonecho('sc','sc');die;
    }else jsonecho('noAccess');die;
}
if($authmetod == 'download_key_indicators'){
    $id = (int)chektextST($_POST['date']);
    $dostyp_pages = queryaccesspages('key-indicators',$INFOUSER['PravaDostups']);
    if($dostyp_pages == 'access'){
        $queryBD = "SELECT * FROM `key_indicators` WHERE `id_otchet` = '".$id."' LIMIT 1";
    }else{
        $queryBD = "SELECT * FROM `key_indicators` WHERE `id_otchet` = '".$id."' AND `id_author` = '".$INFOUSER['id']."' LIMIT 1";
    }
    require_once '../core/PHPExcel/Classes/PHPExcel.php';
    require_once '../core/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php';
    require_once '../core/PHPExcel/Classes/PHPExcel/IOFactory.php';
    $xls = PHPExcel_IOFactory::load('../docs/osnovnii_pokazatels_onebibl.xls');
    $xls->setActiveSheetIndex(0);
    $sheet = $xls->getActiveSheet();
    $sheet->setTitle('ЛИСТ1');
    $textDate = "Сформирован: ".date('d.m.Y');
    $rs=mysqli_fetch_array(querydb($queryBD,'noArray'));
    $selectAuthorOthet = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$rs['id_author']."'");
    $sheet->setCellValue("B1", $selectAuthorOthet['biblios']);
    $k=0;$ii=1;$d=3;
    $arStop=[1,11,12,17,22,25,34,35,40,44,47,57,58,63,68,79,84,88,91,101,106,111,114,123,128,132];
    for($i=1;$i < 134; $i++){
        $pos='B'.$ii;
        if($arStop[$k] != $i){$sheet->setCellValue($pos, $rs[$d]); $d++;}
        else{$k++;}
        $ii++;
    }
	$sheet->setCellValue("D2", $textDate);
    $objWriter = new PHPExcel_Writer_Excel5($xls);
    $objWriter->save('../docs/osnovnii_pokazatels_onebibl.xls');
    jsonecho('sc','sc');die();
}
if($authmetod == 'download_result_key_indicators'){
    $dostyp_pages = queryaccesspages('key-indicators',$INFOUSER['PravaDostups']);
    require_once '../core/PHPExcel/Classes/PHPExcel.php';
    require_once '../core/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php';
    require_once '../core/PHPExcel/Classes/PHPExcel/IOFactory.php';
    $xls = PHPExcel_IOFactory::load('../docs/osnovnii_pokazatels.xls');
    $xls->setActiveSheetIndex(0);
    $sheet = $xls->getActiveSheet();
    $sheet->setTitle('ЛИСТ1');
    $dateYersNew = date('Y');
    $marth = date('n')-1;
    if(date('n') == 12 && date('d') > 21){ $marth = date('n'); }
    $day = date('d');
    $dateSendbd = $dateYersNew.'_'.$marth;//Дата нунешнего отчета
    $querydb=querydb("SELECT * FROM `key_indicators` WHERE `date` = '".$dateSendbd."'",'noArray');
    $indacatin=0;
    $arrIndiacation=['B','C','D','E','F','G','H','I','J','K','L','M'];
    while($rs=mysqli_fetch_array($querydb)){
        $posYbuk = $arrIndiacation[$indacatin];
        $selectAuthorOthet = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$rs['id_author']."'");
        $sheet->setCellValue($posYbuk."1", $selectAuthorOthet['biblios']);
        $k=0;$ii=1;$d=3;
        $arStop=[1,11,12,17,22,25,34,35,40,44,47,57,58,63,68,79,84,88,91,101,106,111,114,123,128,132];
        for($i=1;$i < 135; $i++){
            $pos=$posYbuk.$ii;
            if($arStop[$k] != $i){$sheet->setCellValue($pos, $rs[$d]); $d++;}
            else{$k++;}
            $ii++;
        }
        $indacatin++;
        if($indacatin > 11) break;
    }
    $objWriter = new PHPExcel_Writer_Excel5($xls);
    $objWriter->save('../docs/osnovnii_pokazatels.xls');
    $objWriter->save('../docs/osnovnie_pokazateli_arhive/osnovnii_pokazatels_'.$dateSendbd.'.xls');
    $querydbCehtk=querydb("SELECT * FROM `key_indicators_arkhive` WHERE `date_arhive` = '".$dateSendbd."'");
    if($querydbCehtk == NULL){
        querydb("INSERT INTO `key_indicators_arkhive`(`file`, `date_arhive`) 
                      VALUES ('osnovnii_pokazatels_".$dateSendbd.".xls','".date('d-m-Y G:i')."')",'insert');
    }else{
        querydb("UPDATE `key_indicators_arkhive` SET `file`='osnovnii_pokazatels_".$dateSendbd.".xls' WHERE `date_arhive` = '".$dateSendbd."'",'update');
    }
    jsonecho('sc','sc');die();
}
if($authmetod == 'send_otche_cultural_events'){
    $data = arrastr($_POST['date'], '&');
    $dateYersNew = date('Y');
    $marth = date('m')-1;
    if(date('n') == 12 && date('d') > 21){ $marth = date('n'); }
    $day = date('d');
    //if($day > 25){$marth = date('m');}
    //if($marth == 0) $marth = 12;
    $dateSendbd = $dateYersNew.'_'.$marth;//Дата нунешнего отчета
    //$dostups = queryaccesspages('work-cod',$INFOUSER['PravaDostups']);
    for($i=0;$i < count($data); $i++){preg_replace('/[^0-9]/', '', $data[$i]);}
    $rssq = querydb("SELECT * FROM `cultural_events` WHERE `id_user` = '".$INFOUSER['id']."' AND `date_otcht` = '".$dateSendbd."'");
    if(isset($rssq)){jsonecho('est');die;}
    if($day > 6){jsonecho('noSent');die;}
    if(!isset($rssq)){
        //Если отчета нет.
        querydb("INSERT INTO `cultural_events`( `id_user`, `date_otcht`, `number_visits`, `number_preferential_visits`, `number_preferential_visits_free_charge`, `number_preferential_visits_reimbursable_basis`, `g9_r4_6nk`, `g9_r4_6nk_free_charge`, `g9_r4_6nk_reimbursable_basis`, `g16_r4_6nk`, `g16_r4_6nk_free_charge`, `g16_r4_6nk_reimbursable_basis`, `g12_r4_6nk`, `g12_r4_6nk_free_charge`, `g12_r4_6nk_reimbursable_basis`, `number_employees`, `having_state_awards`, `number_vacant_positions`) 
                 VALUES 
                                              ('".$INFOUSER['id']."','".$dateSendbd."','".$data['number_visits']."','".$data['number_preferential_visits']."','".$data['number_preferential_visits_free_charge']."','".$data['number_preferential_visits_reimbursable_basis']."','".$data['g9_r4_6nk']."','".$data['g9_r4_6nk_free_charge']."','".$data['g9_r4_6nk_reimbursable_basis']."','".$data['g16_r4_6nk']."','".$data['g16_r4_6nk_free_charge']."','".$data['g16_r4_6nk_reimbursable_basis']."','".$data['g12_r4_6nk']."','".$data['g12_r4_6nk_free_charge']."','".$data['g12_r4_6nk_reimbursable_basis']."','".$data['number_employees']."','".$data['having_state_awards']."','".$data['number_vacant_positions']."')",'insert');
        $querynewID = querydb("SELECT id_otchets FROM `cultural_events` WHERE `id_user` = '".$INFOUSER['id']."' AND `date_otcht` = '".$dateSendbd."'");
        querydb("INSERT INTO `cultural_events_log_edit`(`id_otchet`, `id_author_edit`, `date_edit`, `method`) 
                      VALUES ('".$querynewID['id_otchets']."','".$INFOUSER['id']."','".date('d-m-Y G:i')."','Send')",'insert');
        jsonecho('sc','sc');die;
    }
    jsonecho('noSent2');die;
}
if($authmetod == 'save_otchet_cultural_events'){
    $explodesHEaders = explode('/', $_SERVER['HTTP_REFERER']);
    $idOthchet = (int)chektextST(preg_replace('/[^0-9]/', '', $explodesHEaders[3]));
    $data = arrastr($_POST['date'], '&');
    $dateYersNew = date('Y');
    $marth = date('n')-1;
    if(date('n') == 12 && date('d') > 21){ $marth = date('n'); }
    $day = date('d');
    //if($day > 25){$marth = date('m');}
    //if($marth == 0) $marth = 12;
    $dateSendbd = $dateYersNew.'_'.$marth;//Дата нунешнего отчета
    $dostups = queryaccesspages('cultural-events',$INFOUSER['PravaDostups']);
    $rssq = querydb("SELECT id_otchets,id_user FROM `cultural_events` WHERE `id_otchets` = '".$idOthchet."'");
    $author_otchets='no';
    if($rssq['id_author'] == $INFOUSER['id']) $author_otchets='yes';
    if($author_otchets == 'yes' || $dostups == 'access'){
        querydb("UPDATE `cultural_events` SET `number_visits`='".$data['number_visits']."',`number_preferential_visits`='".$data['number_preferential_visits']."',
                        `number_preferential_visits_free_charge`='".$data['number_preferential_visits_free_charge']."',`number_preferential_visits_reimbursable_basis`='".$data['number_preferential_visits_reimbursable_basis']."',
                        `g9_r4_6nk`='".$data['g9_r4_6nk']."',`g9_r4_6nk_free_charge`='".$data['g9_r4_6nk_free_charge']."',`g9_r4_6nk_reimbursable_basis`='".$data['g9_r4_6nk_reimbursable_basis']."',
                        `g16_r4_6nk`='".$data['g16_r4_6nk']."',`g16_r4_6nk_free_charge`='".$data['g16_r4_6nk_free_charge']."',`g16_r4_6nk_reimbursable_basis`='".$data['g16_r4_6nk_reimbursable_basis']."',
                        `g12_r4_6nk`='".$data['g12_r4_6nk']."',`g12_r4_6nk_free_charge`='".$data['g12_r4_6nk_free_charge']."',`g12_r4_6nk_reimbursable_basis`='".$data['g12_r4_6nk_reimbursable_basis']."',
                        `number_employees`='".$data['number_employees']."',`having_state_awards`='".$data['having_state_awards']."',`number_vacant_positions`='".$data['number_vacant_positions']."' WHERE `id_otchets` = '".$idOthchet."'",'update');
        querydb("INSERT INTO `cultural_events_log_edit`(`id_otchet`, `id_author_edit`, `date_edit`, `method`) 
                 VALUES ('".$idOthchet."','".$INFOUSER['id']."','".date('d-m-Y G:i')."','update')",'insert');
        jsonecho('sc','sc');die;
    }else jsonecho('noAccess');die;
    jsonecho('noSent2');die;
}
if($authmetod == 'download_cultural_events'){
    $id = (int)chektextST($_POST['date']);
    $dostyp_pages = queryaccesspages('cultural-events',$INFOUSER['PravaDostups']);
    if($dostyp_pages == 'access'){
        $queryBD = "SELECT * FROM `cultural_events` WHERE `id_otchets` = '".$id."' LIMIT 1";
    }else{
        $queryBD = "SELECT * FROM `cultural_events` WHERE `id_otchets` = '".$id."' AND `id_user` = '".$INFOUSER['id']."' LIMIT 1";
    }
    require_once '../core/PHPExcel/Classes/PHPExcel.php';
    require_once '../core/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php';
    require_once '../core/PHPExcel/Classes/PHPExcel/IOFactory.php';
    $xls = PHPExcel_IOFactory::load('../docs/cultural_events_def.xls');
    $xls->setActiveSheetIndex(0);
    $sheet = $xls->getActiveSheet();
    $sheet->setTitle('ЛИСТ1');
    //$textDate = "Сформирован: ".date('d.m.Y');
    $rs=mysqli_fetch_array(querydb($queryBD,'noArray'));
    $selectAuthorOthet = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$rs['id_user']."'");
    $send_moth = russionTranslitMoth(date('m'));
    $sheet->setCellValue("A5", $send_moth);
    $sheet->setCellValue("B6", russionTranslitMoth(date('m')-1));
    $sheet->setCellValue("A9", $selectAuthorOthet['biblios']);
    $aralph = ['B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q'];
    $iqur=3;
    for($i=0;$i < count($aralph); $i++){
        $pos=$aralph[$i].'9';
        $sheet->setCellValue($pos, $rs[$iqur]);
        $iqur++;
    }
    $objWriter = new PHPExcel_Writer_Excel5($xls);
    $objWriter->save('../docs/cultural_events_def.xls');
    jsonecho('sc','sc');die;
}
if($authmetod == 'download_result_cultural_events'){
    $dostyp_pages = queryaccesspages('cultural-events',$INFOUSER['PravaDostups']);
    require_once '../core/PHPExcel/Classes/PHPExcel.php';
    require_once '../core/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php';
    require_once '../core/PHPExcel/Classes/PHPExcel/IOFactory.php';
    $xls = PHPExcel_IOFactory::load('../docs/cultural_events_all_def.xls');
    $xls->setActiveSheetIndex(0);
    $sheet = $xls->getActiveSheet();
    $sheet->setTitle('ЛИСТ1');
    $dateYersNew = date('Y');
    $marth = date('n')-1;
    if(date('n') == 12 && date('d') > 21){ $marth = date('n'); }
    $day = date('d');
    $dateSendbd = $dateYersNew.'_'.$marth;//Дата нунешнего отчета
    $querydb=querydb("SELECT * FROM `cultural_events` WHERE `date_otcht` = '".$dateSendbd."'",'noArray');
    $send_moth = russionTranslitMoth(date('m'));
    $sheet->setCellValue("A5", $send_moth);
    $sheet->setCellValue("B6", russionTranslitMoth(date('m')-1));
    //$sheet->setCellValue("A9", $selectAuthorOthet['biblios']);
    $arraSt=[9,10,11,12,13,14,15,16,17,18,19,20];$indication=0;
    while($rs=mysqli_fetch_array($querydb)){
        $posYbuk = $arraSt[$indication];
        $selectAuthorOthet = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$rs['id_user']."'");
        $sheet->setCellValue('A'.$posYbuk, $selectAuthorOthet['biblios']);
        $aralph = ['B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q'];
        $iqur=3;
        for($i=0;$i < count($aralph); $i++){
            $pos=$aralph[$i].$posYbuk;
            $sheet->setCellValue($pos, $rs[$iqur]);
            $iqur++;
        }
        $indication++;
        if($indacatin > 11) break;
    }
    $objWriter = new PHPExcel_Writer_Excel5($xls);
    $objWriter->save('../docs/cultural_events_all_def.xls');
    $objWriter->save('../docs/cultural_events_arhive/cultural_events_'.$dateSendbd.'.xls');
    $querydbCehtk=querydb("SELECT * FROM `cultural_events_arkhive` WHERE `date_arhive` = '".$dateSendbd."'");
    if($querydbCehtk == NULL){
        querydb("INSERT INTO `cultural_events_arkhive`(`file`, `date_arhive`) 
                      VALUES ('cultural_events_".$dateSendbd.".xls','".date('d-m-Y G:i')."')",'insert');
    }else{
        querydb("UPDATE `cultural_events_arkhive` SET `file`='osnovnii_pokazatels_".$dateSendbd.".xls' WHERE `date_arhive` = '".$dateSendbd."'",'update');
    }
    jsonecho('sc','sc');die();
}
if($authmetod == 'send_answer_alert_message'){
    //Обработка отправленных сообщений в опрсое
    $message = chektextST($_POST['mes']);
    querydb("INSERT INTO `answer_message_alert_users`(`id_users`, `date`, `message`) 
                      VALUES ('".$INFOUSER['id']."','".date('d-m-Y G:i')."','".$message."')",'insert');
    querydb("UPDATE `administatrors_user` SET `message_watch`='yes' WHERE `id` = '".$INFOUSER['id']."'",'update');
    jsonecho('sc','sc');die;
}
?>