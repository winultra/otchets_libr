<?
if($section_page == 'add'){
 //Добавить отчет пользователя
 $arrtitile=[
    'Число посещений библиотек, ед.','число льготных посещений инвалидами','безвозмездной основе','возмездной основе',
    'Всего = графа 9 раздела 4 формы 6-нк','безвозмездной основе','возмездной основе','Всего = графа 16 раздела 4 формы 6-нк',
    'безвозмездной основе','возмездной основе','Всего = графа 12 раздела 4 формы 6-нк','безвозмездной основе','возмездной основе',
    'Численность работников организации в сфере культуры, за исключением вспомогательного персонала, чел (на конец отчетного периода) **',
    'в т.ч. имеющих государственные награды и (или) почетные звания',
    'Количество вакантных должностей работников организации в сфере культуры, за исключением вспомогательного персонала, чел (на конец отчетного периода)'
];
$arrSubtitle=[
    '&nbsp&nbsp&nbsp','В том числе','Из них:','В стационарных условиях, чел.','Удаленных пользователей, ед.','Вне стационара, чел.','Персонал'
];
$arrSumtitleNum=[0,1,2,4,7,10,13];
$arrbody=[
    ['input','text','0','number_visits','inputsvvodcodtable number_visits',''],
    ['input','text','0','number_preferential_visits','inputsvvodcodtable number_preferential_visits',''],
    ['input','text','0','number_preferential_visits_free_charge','inputsvvodcodtable number_preferential_visits_free_charge',''],
    ['input','text','0','number_preferential_visits_reimbursable_basis','inputsvvodcodtable number_preferential_visits_reimbursable_basis',''],
    ['input','text','0','g9_r4_6nk','inputsvvodcodtable g9_r4_6nk',''],
    ['input','text','0','g9_r4_6nk_free_charge','inputsvvodcodtable g9_r4_6nk_free_charge',''],
    ['input','text','0','g9_r4_6nk_reimbursable_basis','inputsvvodcodtable g9_r4_6nk_reimbursable_basis',''],
    ['input','text','0','g16_r4_6nk','inputsvvodcodtable g16_r4_6nk',''],
    ['input','text','0','g16_r4_6nk_free_charge','inputsvvodcodtable g16_r4_6nk_free_charge',''],
    ['input','text','0','g16_r4_6nk_reimbursable_basis','inputsvvodcodtable g16_r4_6nk_reimbursable_basis',''],
    ['input','text','0','g12_r4_6nk','inputsvvodcodtable g12_r4_6nk',''],
    ['input','text','0','g12_r4_6nk_free_charge','inputsvvodcodtable g12_r4_6nk_free_charge',''],
    ['input','text','0','g12_r4_6nk_reimbursable_basis','inputsvvodcodtable g12_r4_6nk_reimbursable_basis',''],
    ['input','text','0','number_employees','inputsvvodcodtable number_employees',''],
    ['input','text','0','having_state_awards','inputsvvodcodtable having_state_awards',''],
    ['input','text','0','number_vacant_positions','inputsvvodcodtable number_vacant_positions',''],
]
?>
<!--<div class="alert_warning_cod" style="max-width:920px;"><div class="wranningIco"></div>Отчет принимается с 1 по 6 число каждого месяца</div>-->
<style>.card_title{border-bottom:2px solid;}th b{color:#000;}.head_title_table{font-size:16px;text-align:left;}.user_table tr{border-bottom-color:#555;}.inputsvvodcodtable{width:70px;}.table thead th{vertical-align:middle !important;}</style>
<div class="row" style="max-width: 950px;">
    <div class="col_sm_12">
        <div class="card">
            <div class="card_body">
                <div class="table_responsive">
                    <table class="table user_table">
                        <?
                        $itos=0;
                        for($i=0; $i < count($arrtitile); $i++){
                            echo'<tr>';
                            if($i == $arrSumtitleNum[$itos]){
                                if($arrSumtitleNum[$itos] == 1 || $arrSumtitleNum[$itos] == 0) $chch=1; else $chch=3;
                                if($arrSumtitleNum[$itos] == 2) $chch=2;
                                echo'<th class="border_top_0 head_title_table"rowspan="'.$chch.'">'.$arrSubtitle[$itos].'</th>';
                                $itos++;
                            }
                            echo'<th class="border_top_0 head_title_table">'.$arrtitile[$i].'</th>';
                            echo'<th class="border_top_0">';
                            if($arrbody[$i][0] == 'input'){
                                $typein=$arrbody[$i][1];
                                $body=$arrbody[$i][2];
                                $namein=$arrbody[$i][3];
                                $classin=$arrbody[$i][4];
                                $dopfunction=$arrbody[$i][5];
                                echo'<input type="'.$typein.'" value="'.$body.'" name="'.$namein.'" class="'.$classin.'" '.$dopfunction.' data-i="'.$i.'">';
                            }
                            echo'</th>';
                            echo'</tr>';
                        }
                        ?>
                    </table>
                    <div style="text-align:right;"><button class="buttonStyle" id="send_otchet_cdo" onclick="send_otche_cultural_events()">Отправить</button></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?
}else if($section_page == 'id'){
    //Подгрузка Просмотр отчета
    $idOtchet = (int)chektextST($_GET['id']);
    if($dostyp_pages == 'access'){
        $queryBD = "SELECT * FROM `cultural_events` WHERE `id_otchets` = '".$idOtchet."'";
    }else{
        $queryBD = "SELECT * FROM `cultural_events` WHERE `id_otchets` = '".$idOtchet."' AND `id_user` = '".$INFOUSER['id']."'";
    }
    $otchetnostQr = querydb($queryBD);
    if($otchetnostQr == NULL){echo'<div class="alert_error_cod"><div class="errorIco"></div>Доступ запрещен или отсутствует запрашиваемая информация!</div>';die;}
    $arrtitile=[
        'Число посещений библиотек, ед.','число льготных посещений инвалидами','безвозмездной основе','возмездной основе',
        'Всего = графа 9 раздела 4 формы 6-нк','безвозмездной основе','возмездной основе','Всего = графа 16 раздела 4 формы 6-нк',
        'безвозмездной основе','возмездной основе','Всего = графа 12 раздела 4 формы 6-нк','безвозмездной основе','возмездной основе',
        'Численность работников организации в сфере культуры, за исключением вспомогательного персонала, чел (на конец отчетного периода) **',
        'в т.ч. имеющих государственные награды и (или) почетные звания',
        'Количество вакантных должностей работников организации в сфере культуры, за исключением вспомогательного персонала, чел (на конец отчетного периода)'
    ];
    $arrSubtitle=[
        '&nbsp&nbsp&nbsp','В том числе','Из них:','В стационарных условиях, чел.','Удаленных пользователей, ед.','Вне стационара, чел.','Персонал'
    ];
    $arrSumtitleNum=[0,1,2,4,7,10,13];
    $arrbody=[
        ['input','text',$otchetnostQr['number_visits'],'number_visits','inputsvvodcodtable number_visits','readonly'],
        ['input','text',$otchetnostQr['number_preferential_visits'],'number_preferential_visits','inputsvvodcodtable number_preferential_visits','readonly'],
        ['input','text',$otchetnostQr['number_preferential_visits_free_charge'],'number_preferential_visits_free_charge','inputsvvodcodtable number_preferential_visits_free_charge','readonly'],
        ['input','text',$otchetnostQr['number_preferential_visits_reimbursable_basis'],'number_preferential_visits_reimbursable_basis','inputsvvodcodtable number_preferential_visits_reimbursable_basis','readonly'],
        ['input','text',$otchetnostQr['g9_r4_6nk'],'g9_r4_6nk','inputsvvodcodtable g9_r4_6nk','readonly'],
        ['input','text',$otchetnostQr['g9_r4_6nk_free_charge'],'g9_r4_6nk_free_charge','inputsvvodcodtable g9_r4_6nk_free_charge','readonly'],
        ['input','text',$otchetnostQr['g9_r4_6nk_reimbursable_basis'],'g9_r4_6nk_reimbursable_basis','inputsvvodcodtable g9_r4_6nk_reimbursable_basis','readonly'],
        ['input','text',$otchetnostQr['g16_r4_6nk'],'g16_r4_6nk','inputsvvodcodtable g16_r4_6nk','readonly'],
        ['input','text',$otchetnostQr['g16_r4_6nk_free_charge'],'g16_r4_6nk_free_charge','inputsvvodcodtable g16_r4_6nk_free_charge','readonly'],
        ['input','text',$otchetnostQr['g16_r4_6nk_reimbursable_basis'],'g16_r4_6nk_reimbursable_basis','inputsvvodcodtable g16_r4_6nk_reimbursable_basis','readonly'],
        ['input','text',$otchetnostQr['g12_r4_6nk'],'g12_r4_6nk','inputsvvodcodtable g12_r4_6nk','readonly'],
        ['input','text',$otchetnostQr['g12_r4_6nk_free_charge'],'g12_r4_6nk_free_charge','inputsvvodcodtable g12_r4_6nk_free_charge','readonly'],
        ['input','text',$otchetnostQr['g12_r4_6nk_reimbursable_basis'],'g12_r4_6nk_reimbursable_basis','inputsvvodcodtable g12_r4_6nk_reimbursable_basis','readonly'],
        ['input','text',$otchetnostQr['number_employees'],'number_employees','inputsvvodcodtable number_employees','readonly'],
        ['input','text',$otchetnostQr['having_state_awards'],'having_state_awards','inputsvvodcodtable having_state_awards','readonly'],
        ['input','text',$otchetnostQr['number_vacant_positions'],'number_vacant_positions','inputsvvodcodtable number_vacant_positions','readonly'],
    ]
    ?>
    <style>.card_title{border-bottom:2px solid;}th b{color:#000;}.head_title_table{font-size:16px;text-align:left;}.user_table tr{border-bottom-color:#555;}.inputsvvodcodtable{width:70px;}.table thead th{vertical-align:middle !important;}</style>
    <div class="row" style="max-width: 950px;">
        <div class="col_sm_12">
            <div class="card">
                <div class="card_body">
                    <div class="table_responsive">
                        <table class="table user_table">
                            <?
                            $itos=0;
                            for($i=0; $i < count($arrtitile); $i++){
                                echo'<tr>';
                                if($i == $arrSumtitleNum[$itos]){
                                    if($arrSumtitleNum[$itos] == 1 || $arrSumtitleNum[$itos] == 0) $chch=1; else $chch=3;
                                    if($arrSumtitleNum[$itos] == 2) $chch=2;
                                    echo'<th class="border_top_0 head_title_table"rowspan="'.$chch.'">'.$arrSubtitle[$itos].'</th>';
                                    $itos++;
                                }
                                echo'<th class="border_top_0 head_title_table">'.$arrtitile[$i].'</th>';
                                echo'<th class="border_top_0">';
                                if($arrbody[$i][0] == 'input'){
                                    $typein=$arrbody[$i][1];
                                    $body=$arrbody[$i][2];
                                    $namein=$arrbody[$i][3];
                                    $classin=$arrbody[$i][4];
                                    $dopfunction=$arrbody[$i][5];
                                    echo'<input type="'.$typein.'" value="'.$body.'" name="'.$namein.'" class="'.$classin.'" '.$dopfunction.' data-i="'.$i.'">';
                                }
                                echo'</th>';
                                echo'</tr>';
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?
}else if($section_page == 'edit-otchet'){
    //редактировать отчет
    $idOtchet = (int)chektextST($_GET['id']);//$dostyp_pages == 'access' INFOUSER
    if($dostyp_pages == 'access'){
        $queryBD = "SELECT * FROM `cultural_events` WHERE `id_otchets` = '".$idOtchet."'";
    }else{
        $queryBD = "SELECT * FROM `cultural_events` WHERE `id_otchets` = '".$idOtchet."' AND `id_user` = '".$INFOUSER['id']."'";
    }
    $otchetnostQr = querydb($queryBD);
    if($otchetnostQr == NULL){echo'<div class="alert_error_cod"><div class="errorIco"></div>Доступ запрещен или отсутствует запрашиваемая информация!</div>';die;}
    $arrtitile=[
        'Число посещений библиотек, ед.','число льготных посещений инвалидами','безвозмездной основе','возмездной основе',
        'Всего = графа 9 раздела 4 формы 6-нк','безвозмездной основе','возмездной основе','Всего = графа 16 раздела 4 формы 6-нк',
        'безвозмездной основе','возмездной основе','Всего = графа 12 раздела 4 формы 6-нк','безвозмездной основе','возмездной основе',
        'Численность работников организации в сфере культуры, за исключением вспомогательного персонала, чел (на конец отчетного периода) **',
        'в т.ч. имеющих государственные награды и (или) почетные звания',
        'Количество вакантных должностей работников организации в сфере культуры, за исключением вспомогательного персонала, чел (на конец отчетного периода)'
    ];
    $arrSubtitle=[
        '&nbsp&nbsp&nbsp','В том числе','Из них:','В стационарных условиях, чел.','Удаленных пользователей, ед.','Вне стационара, чел.','Персонал'
    ];
    $arrSumtitleNum=[0,1,2,4,7,10,13];
    $arrbody=[
        ['input','text',$otchetnostQr['number_visits'],'number_visits','inputsvvodcodtable number_visits',''],
        ['input','text',$otchetnostQr['number_preferential_visits'],'number_preferential_visits','inputsvvodcodtable number_preferential_visits',''],
        ['input','text',$otchetnostQr['number_preferential_visits_free_charge'],'number_preferential_visits_free_charge','inputsvvodcodtable number_preferential_visits_free_charge',''],
        ['input','text',$otchetnostQr['number_preferential_visits_reimbursable_basis'],'number_preferential_visits_reimbursable_basis','inputsvvodcodtable number_preferential_visits_reimbursable_basis',''],
        ['input','text',$otchetnostQr['g9_r4_6nk'],'g9_r4_6nk','inputsvvodcodtable g9_r4_6nk',''],
        ['input','text',$otchetnostQr['g9_r4_6nk_free_charge'],'g9_r4_6nk_free_charge','inputsvvodcodtable g9_r4_6nk_free_charge',''],
        ['input','text',$otchetnostQr['g9_r4_6nk_reimbursable_basis'],'g9_r4_6nk_reimbursable_basis','inputsvvodcodtable g9_r4_6nk_reimbursable_basis',''],
        ['input','text',$otchetnostQr['g16_r4_6nk'],'g16_r4_6nk','inputsvvodcodtable g16_r4_6nk',''],
        ['input','text',$otchetnostQr['g16_r4_6nk_free_charge'],'g16_r4_6nk_free_charge','inputsvvodcodtable g16_r4_6nk_free_charge',''],
        ['input','text',$otchetnostQr['g16_r4_6nk_reimbursable_basis'],'g16_r4_6nk_reimbursable_basis','inputsvvodcodtable g16_r4_6nk_reimbursable_basis',''],
        ['input','text',$otchetnostQr['g12_r4_6nk'],'g12_r4_6nk','inputsvvodcodtable g12_r4_6nk',''],
        ['input','text',$otchetnostQr['g12_r4_6nk_free_charge'],'g12_r4_6nk_free_charge','inputsvvodcodtable g12_r4_6nk_free_charge',''],
        ['input','text',$otchetnostQr['g12_r4_6nk_reimbursable_basis'],'g12_r4_6nk_reimbursable_basis','inputsvvodcodtable g12_r4_6nk_reimbursable_basis',''],
        ['input','text',$otchetnostQr['number_employees'],'number_employees','inputsvvodcodtable number_employees',''],
        ['input','text',$otchetnostQr['having_state_awards'],'having_state_awards','inputsvvodcodtable having_state_awards',''],
        ['input','text',$otchetnostQr['number_vacant_positions'],'number_vacant_positions','inputsvvodcodtable number_vacant_positions',''],
    ]
    ?>
    <style>.card_title{border-bottom:2px solid;}th b{color:#000;}.head_title_table{font-size:16px;text-align:left;}.user_table tr{border-bottom-color:#555;}.inputsvvodcodtable{width:70px;}.table thead th{vertical-align:middle !important;}</style>
    <div class="row" style="max-width: 950px;">
        <div class="col_sm_12">
            <div class="card">
                <div class="card_body">
                    <div class="table_responsive">
                        <table class="table user_table">
                            <?
                            $itos=0;
                            for($i=0; $i < count($arrtitile); $i++){
                                echo'<tr>';
                                if($i == $arrSumtitleNum[$itos]){
                                    if($arrSumtitleNum[$itos] == 1 || $arrSumtitleNum[$itos] == 0) $chch=1; else $chch=3;
                                    if($arrSumtitleNum[$itos] == 2) $chch=2;
                                    echo'<th class="border_top_0 head_title_table"rowspan="'.$chch.'">'.$arrSubtitle[$itos].'</th>';
                                    $itos++;
                                }
                                echo'<th class="border_top_0 head_title_table">'.$arrtitile[$i].'</th>';
                                echo'<th class="border_top_0">';
                                if($arrbody[$i][0] == 'input'){
                                    $typein=$arrbody[$i][1];
                                    $body=$arrbody[$i][2];
                                    $namein=$arrbody[$i][3];
                                    $classin=$arrbody[$i][4];
                                    $dopfunction=$arrbody[$i][5];
                                    echo'<input type="'.$typein.'" value="'.$body.'" name="'.$namein.'" class="'.$classin.'" '.$dopfunction.' data-i="'.$i.'">';
                                }
                                echo'</th>';
                                echo'</tr>';
                            }
                            ?>
                        </table>
                        <div style="text-align:right;"><button class="buttonStyle" id="send_otchet_cdo" onclick="save_otchet_cultural_events()">Отправить</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?
}else if($section_page == 'list-cultural-events' && $dostyp_pages == 'access'){
    //Посмотреть все сданные
    $dateYer = date('Y');
    $date_math = date('m')-1;
    $rs_date = $dateYer.'_'.$date_math;
    $numb = ['1','2','3','4','5','6','7','8','9','10','11','12'];
    $merth = ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Откбярь','Ноябрь','Декабрь'];
    $gods = ['2022','2023','2024','2025','2026','2027','2028'];
    $otchetnostQr = querydb("SELECT id_otchets,id_user,date_otcht FROM `cultural_events` WHERE `date_otcht` = '".$rs_date."'",'noArray');?>
    <div class="row">
        <div class="col_sm_12">
            <div class="card">
                <div class="card_body">
                    <div class="table_responsive">
                        <table class="table user_table">
                            <thead>
                                <tr>
                                    <th class="border_top_0">Библиотека</th>
                                    <th class="border_top_0">
                                        <select name="gods" class="selectstyle yers_data">
                                            <?
                                            for($i=0; $i < count($gods); $i++){
                                                $ss = '';
                                                if($dateYer == $gods[$i]){$ss = 'selected';}
                                                echo'<option value="'.$gods[$i].'" '.$ss.'>'.$gods[$i].'</option>';
                                            }
                                            ?>
                                        </select> | 
                                        <select name="moth" class="selectstyle moth_data">
                                            <?
                                            for($i=0; $i < count($numb); $i++){
                                                $ss = '';
                                                if($date_math == $numb[$i]){$ss = 'selected';}
                                                echo'<option value="'.$numb[$i].'" '.$ss.'>'.$merth[$i].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </th>
                                    <th class="border_top_0">Просмотр</th>
                                    <th class="border_top_0">Редактировать</th>
                                    <th class="border_top_0">Загрузка</th>
                                </tr>
                            </thead>
                            <tbody class="tbody_append">
                                <?while($otchetnostArr = mysqli_fetch_assoc($otchetnostQr)){
                                    $infuserID = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$otchetnostArr['id_user']."'");
                                    echo'<tr>';
                                    echo'<th>'.$infuserID['biblios'].'</th>';
                                    echo'<th>'.$otchetnostArr['date_otcht'].'</th>';
                                    echo'<th><a href="/cultural-events'.$otchetnostArr['id_otchet'].'">Посмотреть</a></th>';
                                    echo'<th><a href="/edit-cultural-events'.$otchetnostArr['id_otchet'].'">Редактировать</a></th>';
                                    echo'<th><a href="#" onclick="download_cultural_events('.$otchetnostArr['id_otchet'].');return false;">Скачать</a></th>';
                                    echo'</tr>';
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?
}else if($section_page == 'generate-all' && $dostyp_pages == 'access'){
    //Генерировать общий отчет
    echo'<div style="text-align:center;"><button class="buttonStyle" id="send_otchet_cdo" onclick="download_result_cultural_events()">Сгенерировать и скачать Excel документ</button></div>';
}else{
//Генератися отчетов пользователя
$userifnar = querydb("SELECT * FROM `administatrors_user` WHERE `login` = '".chektextST($LoginUser)."' AND `hashauth` = '".chektextST($passUser)."'");
$otchetnostQr = querydb("SELECT id_otchets,id_user,date_otcht FROM `cultural_events` WHERE `id_user` = '".$userifnar['id']."' ORDER BY id_otchets DESC",'selectArrayNums');
?>
<div class="alert_warning_cod"><div class="wranningIco"></div>Данные отчет сдавать пока не нужно!</div>
    <div class="row">
    <div class="col_sm_12">
        <div class="card">
            <div class="card_body">
                <div class="table_responsive">
                    <table class="table user_table">
                        <thead>
                            <tr>
                                <th class="border_top_0">Библиотека</th>
                                <th class="border_top_0">ГГГГ | ММ</th>
                                <th class="border_top_0">Просмотр</th>
                                <th class="border_top_0">Редактировать</th>
                                <th class="border_top_0">Загрузка</th>
                            </tr>
                        </thead>
                        <tbody>
<?
$iis=0;
    while($rss = mysqli_fetch_assoc($otchetnostQr)){
        $infuserID = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$rss['id_user']."'");
        echo'<tr>';
        echo'<th>'.$infuserID['biblios'].'</th>';
        echo'<th>'.$rss['date_otcht'].'</th>';
        echo'<th><a href="/cultural-events'.$rss['id_otchets'].'">Посмотреть</a></th>';
        echo'<th><a href="/edit-cultural-events'.$rss['id_otchets'].'">Редактировать</a></th>';
        echo'<th><a href="#" onclick="download_cultural_events('.$rss['id_otchets'].');return false;">Скачать</a></th>';
        echo'</tr>';
        $iis++;
    }
if($iis == 0){echo'<tr><th colspan="5" style="font-size:30px;">Данные отсуствуют</th></tr>';}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?
}
?>