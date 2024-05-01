<?php
if($section_page == 'add'){
    //Добавить отчет пользователя
    ?>
    <div class="alert_warning_cod" style="max-width:712px;"><div class="wranningIco"></div>Отчет принимается с 1 по 3 число каждого месяца</div>
<style>.card_title{border-bottom:5px solid #dd4111;}th b{color:#000;}.head_title_table{font-size:16px;text-align:left;}.user_table tr{border-bottom-color:#555;}.inputsvvodcodtable{width:200px;}.table thead th{vertical-align:middle !important;}</style>
    <div class="row" style="max-width: 742px;">
    <div class="col_sm_12">
        <div class="card">
            <?
            $arrtitile=[
                'Читатели','В т.ч.с 15-30','ГосУслуги','ЭДД','ЛитРес','Посещения','&nbsp&nbspСтационарно','&nbsp&nbspВнестационарно','&nbsp&nbspСайт',
                '<b>Итого</b>','Книговыдача','с 15 до 30 лет','Стационарно','Внестационарно','<b>Итого</b>','Периодич.','Книг','АВ','Электронные носители',
                '<b>Итого</b>','ЭДД','ЛитРес','опл','енл','тех','с\х','искус','худож','дет','проч','<b>Итого</b>','Мероприятий','Стационарно','Внестационарно',
                'Сайт','<b>Итого</b>','Посещения','Стационарно','Внестационарно','<b>Итого</b>','На индив. Инф','На группов инф'
            ];
            $arclassth=[
                ['Посещения','d14_visits'],
                ['<b>Итого</b>','d14_visits_sumsPresum'],
                ['Книговыдача','d14_book_pub'],
                ['<b>Итого</b>','d14_book_publishing_sumsPresum'],
                ['<b>Итого</b>','d14_book_publishing_itogo'],
                ['<b>Итого</b>','d14_book_publishing_proch_itogo'],
                ['Мероприятий','d14_events'],
                ['<b>Итого</b>','d14_events_itogs'],
                ['Посещения','d14_vesites'],
                ['<b>Итого</b>','d14_visits2_itogs']
                //onkeyup="indacationKey(\'d14_vesites,d14_visits2_itogs\')"
                //indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');
                //onkeyup="numresultsKeystationSum(\'d14_vesites_out_station,s15_vesites_out_station\',\'visits2_out_station\');"
            ];
            $arrbody=[
                ['input','text','0','d14_readers','inputsvvodcodtable d14_readers','onkeyup="numresultsKeystationSum(\'d14_readers,s15_readers\',\'readers\');"'],
                ['input','text','0','d14_vch_15_30','inputsvvodcodtable d14_vch_15_30','onkeyup="numresultsKeystationSum(\'d14_vch_15_30,s15_vch_15_30\',\'readers_vtch1530\');"'],
                ['input','text','0','d14_state_uslugi','inputsvvodcodtable d14_state_uslugi','onkeyup="numresultsKeystationSum(\'d14_state_uslugi,s15_state_uslugi\',\'state_service\');"'],
                ['input','text','0','d14_edd','inputsvvodcodtable d14_edd','onkeyup="numresultsKeystationSum(\'d14_edd,s15_edd\',\'edd\');"'],
                ['input','text','0','d14_litres','inputsvvodcodtable d14_litres','onkeyup="numresultsKeystationSum(\'d14_litres,s15_litres\',\'litres\');"'],
                ['input','text','0','d14_visits','inputsvvodcodtable d14_visits','onkeyup="numresultsKeystationSum(\'d14_visits,s15_visits\',\'visits\');indacationKey(\'d14_visits,d14_visits_sumsPresum\');"'],
                ['input','text','0','d14_visits_stationary','inputsvvodcodtable d14_visits_stationary','onkeyup="numresultsKeystationSum(\'d14_visits_stationary,s15_visits_stationary\',\'visits_stationary\');numresultsKeystationSum(\'d14_visits_stationary,d14_visits_out_station,d14_visits_sits\',\'d14_visits_sumsPresum\');indacationKey(\'d14_visits,d14_visits_sumsPresum\');"'],
                ['input','text','0','d14_visits_out_station','inputsvvodcodtable d14_visits_out_station','onkeyup="numresultsKeystationSum(\'d14_visits_out_station,s15_visits_out_station\',\'visits_out_station\');numresultsKeystationSum(\'d14_visits_stationary,d14_visits_out_station,d14_visits_sits\',\'d14_visits_sumsPresum\');indacationKey(\'d14_visits,d14_visits_sumsPresum\');"'],
                ['input','text','0','d14_visits_sits','inputsvvodcodtable d14_visits_sits','onkeyup="numresultsKeystationSum(\'d14_visits_sits,s15_visits_sits\',\'visits_site\');numresultsKeystationSum(\'d14_visits_stationary,d14_visits_out_station,d14_visits_sits\',\'d14_visits_sumsPresum\');indacationKey(\'d14_visits,d14_visits_sumsPresum\');"'],
                ['input','text','0','d14_visits_sumsPresum','inputsvvodcodtable d14_visits_sumsPresum','readonly'],
                ['input','text','0','d14_book_pub','inputsvvodcodtable d14_book_pub','onkeyup="numresultsKeystationSum(\'d14_book_pub,s15_book_pub\',\'book_publishing\');indacationKey(\'d14_book_pub,d14_book_publishing_sumsPresum\');"'],
                ['input','text','0','d14_book_pub_15_30','inputsvvodcodtable d14_book_pub_15_30','onkeyup="numresultsKeystationSum(\'d14_book_pub_15_30,s15_book_pub_15_30\',\'book_publishing_15_30\');"'],
                ['input','text','0','d14_book_pub_stationary','inputsvvodcodtable d14_book_pub_stationary','onkeyup="numresultsKeystationSum(\'d14_book_pub_stationary,s15_book_pub_stationary\',\'book_publishing_stationary\');numresultsKeystationSum(\'d14_book_pub_stationary,d14_book_pub_out_station\',\'d14_book_publishing_sumsPresum\');indacationKey(\'d14_book_pub,d14_book_publishing_sumsPresum\');"'],
                ['input','text','0','d14_book_pub_out_station','inputsvvodcodtable d14_book_pub_out_station','onkeyup="numresultsKeystationSum(\'d14_book_pub_out_station,s15_book_pub_out_station\',\'book_publishing_outof_station\');numresultsKeystationSum(\'d14_book_pub_stationary,d14_book_pub_out_station\',\'d14_book_publishing_sumsPresum\');indacationKey(\'d14_book_pub,d14_book_publishing_sumsPresum\');"'],
                ['input','text','0','d14_book_publishing_sumsPresum','inputsvvodcodtable d14_book_publishing_sumsPresum','readonly'],
                ['input','text','0','d14_book_pub_periodically','inputsvvodcodtable d14_book_pub_periodically','onkeyup="numresultsKeystationSum(\'d14_book_pub_periodically,s15_book_pub_periodically\',\'book_publishing_periodically\');numresultsKeystationSum(\'d14_book_pub_periodically,d14_book_pub_books,d14_book_pub_books_av,d14_book_pub_electronic_media\',\'d14_book_publishing_itogo\');indacationKey(\'d14_book_publishing_sumsPresum,d14_book_publishing_itogo\');"'],
                ['input','text','0','d14_book_pub_books','inputsvvodcodtable d14_book_pub_books','onkeyup="numresultsKeystationSum(\'d14_book_pub_books,s15_book_pub_books\',\'book_publishing_books\');numresultsKeystationSum(\'d14_book_pub_periodically,d14_book_pub_books,d14_book_pub_books_av,d14_book_pub_electronic_media\',\'d14_book_publishing_itogo\');indacationKey(\'d14_book_publishing_sumsPresum,d14_book_publishing_itogo\');"'],
                ['input','text','0','d14_book_pub_books_av','inputsvvodcodtable d14_book_pub_books_av','onkeyup="numresultsKeystationSum(\'d14_book_pub_books_av,s15_book_pub_books_av\',\'book_publishing_av\');numresultsKeystationSum(\'d14_book_pub_periodically,d14_book_pub_books,d14_book_pub_books_av,d14_book_pub_electronic_media\',\'d14_book_publishing_itogo\');indacationKey(\'d14_book_publishing_sumsPresum,d14_book_publishing_itogo\');"'],
                ['input','text','0','d14_book_pub_electronic_media','inputsvvodcodtable d14_book_pub_electronic_media','onkeyup="numresultsKeystationSum(\'d14_book_pub_electronic_media,s15_book_pub_electronic_media\',\'book_publishing_electronic_media\');numresultsKeystationSum(\'d14_book_pub_periodically,d14_book_pub_books,d14_book_pub_books_av,d14_book_pub_electronic_media\',\'d14_book_publishing_itogo\');indacationKey(\'d14_book_publishing_sumsPresum,d14_book_publishing_itogo\');"'],
                ['input','text','0','d14_book_publishing_itogo','inputsvvodcodtable d14_book_publishing_itogo','readonly'],
                ['input','text','0','d14_book_pub_edd','inputsvvodcodtable d14_book_pub_edd','onkeyup="numresultsKeystationSum(\'d14_book_pub_edd,s15_book_pub_edd\',\'book_publishing_vtch_edd\');"'],
                ['input','text','0','d14_book_pub_litres','inputsvvodcodtable d14_book_pub_litres','onkeyup="numresultsKeystationSum(\'d14_book_pub_litres,s15_book_pub_litres\',\'book_publishing_litres\');"'],
                ['input','text','0','d14_book_pub_opl','inputsvvodcodtable d14_book_pub_opl','onkeyup="numresultsKeystationSum(\'d14_book_pub_opl,s15_book_pub_opl\',\'book_publishing_opl\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
                ['input','text','0','d14_book_pub_enl','inputsvvodcodtable d14_book_pub_enl','onkeyup="numresultsKeystationSum(\'d14_book_pub_enl,s15_book_pub_enl\',\'book_publishing_enl\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
                ['input','text','0','d14_book_pub_tex','inputsvvodcodtable d14_book_pub_tex','onkeyup="numresultsKeystationSum(\'d14_book_pub_tex,s15_book_pub_tex\',\'book_publishing_tex\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
                ['input','text','0','d14_book_pub_sx','inputsvvodcodtable d14_book_pub_sx','onkeyup="numresultsKeystationSum(\'d14_book_pub_sx,s15_book_pub_sx\',\'book_publishing_sx\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
                ['input','text','0','d14_book_pub_iskys','inputsvvodcodtable d14_book_pub_iskys','onkeyup="numresultsKeystationSum(\'d14_book_pub_iskys,s15_book_pub_iskys\',\'book_publishing_isky\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
                ['input','text','0','d14_book_pub_hudozh','inputsvvodcodtable d14_book_pub_hudozh','onkeyup="numresultsKeystationSum(\'d14_book_pub_hudozh,s15_book_pub_hudozh\',\'book_publishing_xyd\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
                ['input','text','0','d14_book_pub_det','inputsvvodcodtable d14_book_pub_det','onkeyup="numresultsKeystationSum(\'d14_book_pub_det,s15_book_pub_det\',\'book_publishing_det\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
                ['input','text','0','d14_book_pub_proch','inputsvvodcodtable d14_book_pub_proch','onkeyup="numresultsKeystationSum(\'d14_book_pub_proch,s15_book_pub_proch\',\'book_publishing_proch\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
                ['input','text','0','d14_book_publishing_proch_itogo','inputsvvodcodtable d14_book_publishing_proch_itogo','readonly'],
                ['input','text','0','d14_events','inputsvvodcodtable d14_events','onkeyup="numresultsKeystationSum(\'d14_events,s15_events\',\'events\');indacationKey(\'d14_events,d14_events_itogs\');"'],
                ['input','text','0','d14_events_stationary','inputsvvodcodtable d14_events_stationary','onkeyup="numresultsKeystationSum(\'d14_events_stationary,s15_events_stationary\',\'events_stationary\');numresultsKeystationSum(\'d14_events_stationary,d14_events_out_station,d14_events_sits\',\'d14_events_itogs\');indacationKey(\'d14_events,d14_events_itogs\');"'],
                ['input','text','0','d14_events_out_station','inputsvvodcodtable d14_events_out_station','onkeyup="numresultsKeystationSum(\'d14_events_out_station,s15_events_out_station\',\'events_out_station\');numresultsKeystationSum(\'d14_events_stationary,d14_events_out_station,d14_events_sits\',\'d14_events_itogs\');indacationKey(\'d14_events,d14_events_itogs\');"'],
                ['input','text','0','d14_events_sits','inputsvvodcodtable d14_events_sits','onkeyup="numresultsKeystationSum(\'d14_events_sits,s15_events_sits\',\'events_sits\');numresultsKeystationSum(\'d14_events_stationary,d14_events_out_station,d14_events_sits\',\'d14_events_itogs\');indacationKey(\'d14_events,d14_events_itogs\');"'],
                ['input','text','0','d14_events_itogs','inputsvvodcodtable d14_events_itogs','readonly'],
                ['input','text','0','d14_vesites','inputsvvodcodtable d14_vesites','onkeyup="numresultsKeystationSum(\'d14_vesites,s15_vesites\',\'visits2\');indacationKey(\'d14_vesites,d14_visits2_itogs\');"'],
                ['input','text','0','d14_vesites_stationary','inputsvvodcodtable d14_vesites_stationary','onkeyup="numresultsKeystationSum(\'d14_vesites_stationary,s15_vesites_stationary\',\'visits2_stationary\');numresultsKeystationSum(\'d14_vesites_stationary,d14_vesites_out_station\',\'d14_visits2_itogs\');indacationKey(\'d14_vesites,d14_visits2_itogs\');"'],
                ['input','text','0','d14_vesites_out_station','inputsvvodcodtable d14_vesites_out_station','onkeyup="numresultsKeystationSum(\'d14_vesites_out_station,s15_vesites_out_station\',\'visits2_out_station\');numresultsKeystationSum(\'d14_vesites_stationary,d14_vesites_out_station\',\'d14_visits2_itogs\');indacationKey(\'d14_vesites,d14_visits2_itogs\');"'],
                ['input','text','0','d14_visits2_itogs','inputsvvodcodtable d14_visits2_itogs','readonly'],
                ['input','text','0','d14_indiv_info','inputsvvodcodtable d14_indiv_info','onkeyup="numresultsKeystationSum(\'d14_indiv_info,s15_indiv_info\',\'indiv_info\');"'],
                ['input','text','0','d14_group_info','inputsvvodcodtable d14_group_info','onkeyup="numresultsKeystationSum(\'d14_group_info,s15_group_info\',\'group_info\');"'],
            ]
            ?>
            <div class="card_body">
                <h4 class="card_title">ДО 14 ЛЕТ</h4>
                <div class="table_responsive">
                    <table class="table user_table">
                            <?
                            $itos=0;
                            for($i=0; $i < count($arrtitile); $i++){
                                if($arrtitile[$i] == $arclassth[$itos][0]){
                                    echo'<tr class="tr_'.trim($arclassth[$itos][1]).'">';
                                    $itos++;
                                }else echo'<tr>';
                                echo'<th class="border_top_0 head_title_table">'.$arrtitile[$i].'</th>';
                                //for($iy=0;$iy < count($arrbody[$i]);$iy++)
                                echo'<th class="border_top_0">';
                                if($arrbody[$i][0] == 'input'){
                                    $typein=$arrbody[$i][1];
                                    $body=$arrbody[$i][2];
                                    $namein=$arrbody[$i][3];
                                    $classin=$arrbody[$i][4];
                                    $dopfunction=$arrbody[$i][5];
                                    echo'<input type="'.$typein.'" value="'.$body.'" name="'.$namein.'" class="'.$classin.'" '.$dopfunction.'>';
                                }
                                echo'</th>';
                                echo'</tr>';
                            }
                            ?>
                    </table>
                </div>
            </div>
            <?
            $arrtitile=[
                'Читатели','В т.ч.с 15-30','ГосУслуги','ЭДД','ЛитРес','Посещения','&nbsp&nbspСтационарно','&nbsp&nbspВнестационарно','&nbsp&nbspСайт',
                '<b>Итого</b>','Книговыдача','с 15 до 30 лет','Стационарно','Внестационарно','<b>Итого</b>','Периодич.','Книг','АВ','Электронные носители',
                '<b>Итого</b>','В т.ч. ЭДД','ЛитРес','опл','енл','тех','с\х','искус','худож','дет','проч','<b>Итого</b>','Мероприятий','Стационарно','Внестационарно',
                'Сайт','<b>Итого</b>','Посещения','Стационарно','Внестационарно','<b>Итого</b>','На индив. Инф','На группов инф'
            ];
            $arclassth=[
                ['Посещения','s15_visits'],
                ['<b>Итого</b>','s15_visits_sumsPresum'],
                ['Книговыдача','s15_book_pub'],
                ['<b>Итого</b>','s15_book_publishing_sumsPresum'],
                ['<b>Итого</b>','s15_book_publishing_itogo'],
                ['<b>Итого</b>','s15_book_publishing_proch_itogo'],
                ['Мероприятий','s15_events'],
                ['<b>Итого</b>','s15_events_itogs'],
                ['Посещения','s15_vesites'],
                ['<b>Итого</b>','s15_visits2_itogs']
                //onkeyup="indacationKey(\'s15_vesites,s15_visits2_itogs\')"
                //indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');
            ];
            $arrbody=[
                ['input','text','0','s15_readers','inputsvvodcodtable s15_readers','onkeyup="numresultsKeystationSum(\'d14_readers,s15_readers\',\'readers\');"'],
                ['input','text','0','s15_vch_15_30','inputsvvodcodtable s15_vch_15_30','onkeyup="numresultsKeystationSum(\'d14_vch_15_30,s15_vch_15_30\',\'readers_vtch1530\');"'],
                ['input','text','0','s15_state_uslugi','inputsvvodcodtable s15_state_uslugi','onkeyup="numresultsKeystationSum(\'d14_state_uslugi,s15_state_uslugi\',\'state_service\');"'],
                ['input','text','0','s15_edd','inputsvvodcodtable s15_edd','onkeyup="numresultsKeystationSum(\'d14_edd,s15_edd\',\'edd\');"'],
                ['input','text','0','s15_litres','inputsvvodcodtable s15_litres','onkeyup="numresultsKeystationSum(\'d14_litres,s15_litres\',\'litres\');"'],
                ['input','text','0','s15_visits','inputsvvodcodtable s15_visits','onkeyup="numresultsKeystationSum(\'d14_visits,s15_visits\',\'visits\');indacationKey(\'s15_visits,s15_visits_sumsPresum\');"'],
                ['input','text','0','s15_visits_stationary','inputsvvodcodtable s15_visits_stationary','onkeyup="numresultsKeystationSum(\'d14_visits_stationary,s15_visits_stationary\',\'visits_stationary\');numresultsKeystationSum(\'s15_visits_stationary,s15_visits_out_station,s15_visits_sits\',\'s15_visits_sumsPresum\');indacationKey(\'s15_visits,s15_visits_sumsPresum\');"'],
                ['input','text','0','s15_visits_out_station','inputsvvodcodtable s15_visits_out_station','onkeyup="numresultsKeystationSum(\'d14_visits_out_station,s15_visits_out_station\',\'visits_out_station\');numresultsKeystationSum(\'s15_visits_stationary,s15_visits_out_station,s15_visits_sits\',\'s15_visits_sumsPresum\');indacationKey(\'s15_visits,s15_visits_sumsPresum\');"'],
                ['input','text','0','s15_visits_sits','inputsvvodcodtable s15_visits_sits','onkeyup="numresultsKeystationSum(\'d14_visits_sits,s15_visits_sits\',\'visits_site\');numresultsKeystationSum(\'s15_visits_stationary,s15_visits_out_station,s15_visits_sits\',\'s15_visits_sumsPresum\');indacationKey(\'s15_visits,s15_visits_sumsPresum\');"'],
                ['input','text','0','s15_visits_sumsPresum','inputsvvodcodtable s15_visits_sumsPresum','readonly'],
                ['input','text','0','s15_book_pub','inputsvvodcodtable s15_book_pub','onkeyup="numresultsKeystationSum(\'d14_book_pub,s15_book_pub\',\'book_publishing\');indacationKey(\'s15_book_pub,s15_book_publishing_sumsPresum\');"'],
                ['input','text','0','s15_book_pub_15_30','inputsvvodcodtable s15_book_pub_15_30','onkeyup="numresultsKeystationSum(\'d14_book_pub_15_30,s15_book_pub_15_30\',\'book_publishing_15_30\');"'],
                ['input','text','0','s15_book_pub_stationary','inputsvvodcodtable s15_book_pub_stationary','onkeyup="numresultsKeystationSum(\'d14_book_pub_stationary,s15_book_pub_stationary\',\'book_publishing_stationary\');numresultsKeystationSum(\'s15_book_pub_stationary,s15_book_pub_out_station\',\'s15_book_publishing_sumsPresum\');indacationKey(\'s15_book_pub,s15_book_publishing_sumsPresum\');"'],
                ['input','text','0','s15_book_pub_out_station','inputsvvodcodtable s15_book_pub_out_station','onkeyup="numresultsKeystationSum(\'d14_book_pub_out_station,s15_book_pub_out_station\',\'book_publishing_outof_station\');numresultsKeystationSum(\'s15_book_pub_stationary,s15_book_pub_out_station\',\'s15_book_publishing_sumsPresum\');indacationKey(\'s15_book_pub,s15_book_publishing_sumsPresum\');"'],
                ['input','text','0','s15_book_publishing_sumsPresum','inputsvvodcodtable s15_book_publishing_sumsPresum','readonly'],
                ['input','text','0','s15_book_pub_periodically','inputsvvodcodtable s15_book_pub_periodically','onkeyup="numresultsKeystationSum(\'d14_book_pub_periodically,s15_book_pub_periodically\',\'book_publishing_periodically\');numresultsKeystationSum(\'s15_book_pub_periodically,s15_book_pub_books,s15_book_pub_books_av,s15_book_pub_electronic_media\',\'s15_book_publishing_itogo\');indacationKey(\'s15_book_publishing_sumsPresum,s15_book_publishing_itogo\');"'],
                ['input','text','0','s15_book_pub_books','inputsvvodcodtable s15_book_pub_books','onkeyup="numresultsKeystationSum(\'d14_book_pub_books,s15_book_pub_books\',\'book_publishing_books\');numresultsKeystationSum(\'s15_book_pub_periodically,s15_book_pub_books,s15_book_pub_books_av,s15_book_pub_electronic_media\',\'s15_book_publishing_itogo\');indacationKey(\'s15_book_publishing_sumsPresum,s15_book_publishing_itogo\');"'],
                ['input','text','0','s15_book_pub_books_av','inputsvvodcodtable s15_book_pub_books_av','onkeyup="numresultsKeystationSum(\'d14_book_pub_books_av,s15_book_pub_books_av\',\'book_publishing_av\');numresultsKeystationSum(\'s15_book_pub_periodically,s15_book_pub_books,s15_book_pub_books_av,s15_book_pub_electronic_media\',\'s15_book_publishing_itogo\');indacationKey(\'s15_book_publishing_sumsPresum,s15_book_publishing_itogo\');"'],
                ['input','text','0','s15_book_pub_electronic_media','inputsvvodcodtable s15_book_pub_electronic_media','onkeyup="numresultsKeystationSum(\'d14_book_pub_electronic_media,s15_book_pub_electronic_media\',\'book_publishing_electronic_media\');numresultsKeystationSum(\'s15_book_pub_periodically,s15_book_pub_books,s15_book_pub_books_av,s15_book_pub_electronic_media\',\'s15_book_publishing_itogo\');indacationKey(\'s15_book_publishing_sumsPresum,s15_book_publishing_itogo\');"'],
                ['input','text','0','s15_book_publishing_itogo','inputsvvodcodtable s15_book_publishing_itogo','readonly'],
                ['input','text','0','s15_book_pub_edd','inputsvvodcodtable s15_book_pub_edd','onkeyup="numresultsKeystationSum(\'d14_book_pub_edd,s15_book_pub_edd\',\'book_publishing_vtch_edd\');"'],
                ['input','text','0','s15_book_pub_litres','inputsvvodcodtable s15_book_pub_litres','onkeyup="numresultsKeystationSum(\'d14_book_pub_litres,s15_book_pub_litres\',\'book_publishing_litres\');"'],
                ['input','text','0','s15_book_pub_opl','inputsvvodcodtable s15_book_pub_opl','onkeyup="numresultsKeystationSum(\'d14_book_pub_opl,s15_book_pub_opl\',\'book_publishing_opl\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
                ['input','text','0','s15_book_pub_enl','inputsvvodcodtable s15_book_pub_enl','onkeyup="numresultsKeystationSum(\'d14_book_pub_enl,s15_book_pub_enl\',\'book_publishing_enl\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
                ['input','text','0','s15_book_pub_tex','inputsvvodcodtable s15_book_pub_tex','onkeyup="numresultsKeystationSum(\'d14_book_pub_tex,s15_book_pub_tex\',\'book_publishing_tex\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
                ['input','text','0','s15_book_pub_sx','inputsvvodcodtable s15_book_pub_sx','onkeyup="numresultsKeystationSum(\'d14_book_pub_sx,s15_book_pub_sx\',\'book_publishing_sx\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
                ['input','text','0','s15_book_pub_iskys','inputsvvodcodtable s15_book_pub_iskys','onkeyup="numresultsKeystationSum(\'d14_book_pub_iskys,s15_book_pub_iskys\',\'book_publishing_isky\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
                ['input','text','0','s15_book_pub_hudozh','inputsvvodcodtable s15_book_pub_hudozh','onkeyup="numresultsKeystationSum(\'d14_book_pub_hudozh,s15_book_pub_hudozh\',\'book_publishing_xyd\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
                ['input','text','0','s15_book_pub_det','inputsvvodcodtable s15_book_pub_det','onkeyup="numresultsKeystationSum(\'d14_book_pub_det,s15_book_pub_det\',\'book_publishing_det\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
                ['input','text','0','s15_book_pub_proch','inputsvvodcodtable s15_book_pub_proch','onkeyup="numresultsKeystationSum(\'d14_book_pub_proch,s15_book_pub_proch\',\'book_publishing_proch\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
                ['input','text','0','s15_book_publishing_proch_itogo','inputsvvodcodtable s15_book_publishing_proch_itogo','readonly'],
                ['input','text','0','s15_events','inputsvvodcodtable s15_events','onkeyup="numresultsKeystationSum(\'d14_events,s15_events\',\'events\');indacationKey(\'s15_events,s15_events_itogs\');"'],
                ['input','text','0','s15_events_stationary','inputsvvodcodtable s15_events_stationary','onkeyup="numresultsKeystationSum(\'d14_events_stationary,s15_events_stationary\',\'events_stationary\');numresultsKeystationSum(\'s15_events_stationary,s15_events_out_station,s15_events_sits\',\'s15_events_itogs\');indacationKey(\'s15_events,s15_events_itogs\');"'],
                ['input','text','0','s15_events_out_station','inputsvvodcodtable s15_events_out_station','onkeyup="numresultsKeystationSum(\'d14_events_out_station,s15_events_out_station\',\'events_out_station\');numresultsKeystationSum(\'s15_events_stationary,s15_events_out_station,s15_events_sits\',\'s15_events_itogs\');indacationKey(\'s15_events,s15_events_itogs\');"'],
                ['input','text','0','s15_events_sits','inputsvvodcodtable s15_events_sits','onkeyup="numresultsKeystationSum(\'d14_events_sits,s15_events_sits\',\'events_sits\');numresultsKeystationSum(\'s15_events_stationary,s15_events_out_station,s15_events_sits\',\'s15_events_itogs\');indacationKey(\'s15_events,s15_events_itogs\');"'],
                ['input','text','0','s15_events_itogs','inputsvvodcodtable s15_events_itogs','readonly'],
                ['input','text','0','s15_vesites','inputsvvodcodtable s15_vesites','onkeyup="numresultsKeystationSum(\'d14_vesites,s15_vesites\',\'visits2\');indacationKey(\'s15_vesites,s15_visits2_itogs\');"'],
                ['input','text','0','s15_vesites_stationary','inputsvvodcodtable s15_vesites_stationary','onkeyup="numresultsKeystationSum(\'d14_vesites_stationary,s15_vesites_stationary\',\'visits2_stationary\');numresultsKeystationSum(\'s15_vesites_stationary,s15_vesites_out_station\',\'s15_visits2_itogs\');indacationKey(\'s15_vesites,s15_visits2_itogs\');"'],
                ['input','text','0','s15_vesites_out_station','inputsvvodcodtable s15_vesites_out_station','onkeyup="numresultsKeystationSum(\'d14_vesites_out_station,s15_vesites_out_station\',\'visits2_out_station\');numresultsKeystationSum(\'s15_vesites_stationary,s15_vesites_out_station\',\'s15_visits2_itogs\');indacationKey(\'s15_vesites,s15_visits2_itogs\');"'],
                ['input','text','0','s15_visits2_itogs','inputsvvodcodtable s15_visits2_itogs','readonly'],
                ['input','text','0','s15_indiv_info','inputsvvodcodtable s15_indiv_info','onkeyup="numresultsKeystationSum(\'d14_indiv_info,s15_indiv_info\',\'indiv_info\');"'],
                ['input','text','0','s15_group_info','inputsvvodcodtable s15_group_info','onkeyup="numresultsKeystationSum(\'d14_group_info,s15_group_info\',\'group_info\');"'],
            ]
            ?>
            <div class="card_body">
                <h4 class="card_title">С 15 лет</h4>
                <div class="table_responsive">
                    <table class="table user_table">
                            <?
                            $itos=0;
                            for($i=0; $i < count($arrtitile); $i++){
                                if($arrtitile[$i] == $arclassth[$itos][0]){
                                    echo'<tr class="tr_'.trim($arclassth[$itos][1]).'">';
                                    $itos++;
                                }else echo'<tr>';
                                echo'<th class="border_top_0 head_title_table">'.$arrtitile[$i].'</th>';
                                //for($iy=0;$iy < count($arrbody[$i]);$iy++)
                                echo'<th class="border_top_0">';
                                if($arrbody[$i][0] == 'input'){
                                    $typein=$arrbody[$i][1];
                                    $body=$arrbody[$i][2];
                                    $namein=$arrbody[$i][3];
                                    $classin=$arrbody[$i][4];
                                    $dopfunction=$arrbody[$i][5];
                                    echo'<input type="'.$typein.'" value="'.$body.'" name="'.$namein.'" class="'.$classin.'" '.$dopfunction.'>';
                                }
                                echo'</th>';
                                echo'</tr>';
                            }
                            ?>
                    </table>
                </div>
            </div>
            <?
            $arrtitile=[
                'Читатели','В т.ч.с 15-30','ГосУслуги','ЭДД','ЛитРес','Посещения','&nbsp&nbspСтационарно','&nbsp&nbspВнестационарно','&nbsp&nbspСайт',
                '<b>Итого</b>','Книговыдача','с 15 до 30 лет','Стационарно','Внестационарно','<b>Итого</b>','Периодич.','Книг','АВ','Электронные носители',
                '<b>Итого</b>','В т.ч. ЭДД','ЛитРес','опл','енл','тех','с\х','иску','худ','дет','проч','<b>Итого</b>','Мероприятий','Стационарно','Внестационарно',
                'Сайт','<b>Итого</b>','Посещения','Стационарно','Внестационарно','<b>Итого</b>','На индив. Инф','На группов инф'
            ];
            $arclassth=[
                ['Посещения','visits'],
                ['<b>Итого</b>','visits_sumsPresum'],
                ['Книговыдача','book_publishing'],
                ['<b>Итого</b>','book_publishing_sumsPresum'],
                ['<b>Итого</b>','book_publishing_itogo'],
                ['<b>Итого</b>','book_publishing_proch_itogo'],
                ['Мероприятий','events'],
                ['<b>Итого</b>','events_itogs'],
                ['Посещения','visits2'],
                ['<b>Итого</b>','visits2_itogs']
            ];
            $arrbody=[
                ['input','text','0','readers','inputsvvodcodtable readers','readonly'],
                ['input','text','0','readers_vtch1530','inputsvvodcodtable readers_vtch1530','readonly'],
                ['input','text','0','state_service','inputsvvodcodtable state_service','readonly'],
                ['input','text','0','edd','inputsvvodcodtable edd','readonly'],
                ['input','text','0','litres','inputsvvodcodtable litres','readonly'],
                ['input','text','0','visits','inputsvvodcodtable visits','onkeyup="indacationKey(\'visits,visits_sumsPresum\')"readonly'],
                ['input','text','0','visits_stationary','inputsvvodcodtable visits_stationary','onkeyup="numresultsKeystationSum(\'visits_stationary,visits_out_station,visits_site\',\'visits_sumsPresum\');indacationKey(\'visits,visits_sumsPresum\');"readonly'],
                ['input','text','0','visits_out_station','inputsvvodcodtable visits_out_station','onkeyup="numresultsKeystationSum(\'visits_stationary,visits_out_station,visits_site\',\'visits_sumsPresum\');indacationKey(\'visits,visits_sumsPresum\');"readonly'],
                ['input','text','0','visits_site','inputsvvodcodtable visits_site','onkeyup="numresultsKeystationSum(\'visits_stationary,visits_out_station,visits_site\',\'visits_sumsPresum\');indacationKey(\'visits,visits_sumsPresum\');"readonly'],
                ['input','text','0','visits_sumsPresum','inputsvvodcodtable visits_sumsPresum','readonly'],
                ['input','text','0','book_publishing','inputsvvodcodtable book_publishing','onkeyup="indacationKey(\'book_publishing,book_publishing_sumsPresum\')"readonly'],
                ['input','text','0','book_publishing_15_30','inputsvvodcodtable book_publishing_15_30','readonly'],
                ['input','text','0','book_publishing_stationary','inputsvvodcodtable book_publishing_stationary','onkeyup="numresultsKeystationSum(\'book_publishing_stationary,book_publishing_outof_station\',\'book_publishing_sumsPresum\');indacationKey(\'book_publishing,book_publishing_sumsPresum\');"readonly'],
                ['input','text','0','book_publishing_outof_station','inputsvvodcodtable book_publishing_outof_station','onkeyup="numresultsKeystationSum(\'book_publishing_stationary,book_publishing_outof_station\',\'book_publishing_sumsPresum\');indacationKey(\'book_publishing,book_publishing_sumsPresum\');"readonly'],
                ['input','text','0','book_publishing_sumsPresum','inputsvvodcodtable book_publishing_sumsPresum','readonly'],
                ['input','text','0','book_publishing_periodically','inputsvvodcodtable book_publishing_periodically','onkeyup="numresultsKeystationSum(\'book_publishing_periodically,book_publishing_books,book_publishing_av,book_publishing_electronic_media\',\'book_publishing_itogo\');indacationKey(\'book_publishing_sumsPresum,book_publishing_itogo\');"readonly'],
                ['input','text','0','book_publishing_books','inputsvvodcodtable book_publishing_books','onkeyup="numresultsKeystationSum(\'book_publishing_periodically,book_publishing_books,book_publishing_av,book_publishing_electronic_media\',\'book_publishing_itogo\');indacationKey(\'book_publishing_sumsPresum,book_publishing_itogo\');"readonly'],
                ['input','text','0','book_publishing_av','inputsvvodcodtable book_publishing_av','onkeyup="numresultsKeystationSum(\'book_publishing_periodically,book_publishing_books,book_publishing_av,book_publishing_electronic_media\',\'book_publishing_itogo\');indacationKey(\'book_publishing_sumsPresum,book_publishing_itogo\');"readonly'],
                ['input','text','0','book_publishing_electronic_media','inputsvvodcodtable book_publishing_electronic_media','onkeyup="numresultsKeystationSum(\'book_publishing_periodically,book_publishing_books,book_publishing_av,book_publishing_electronic_media\',\'book_publishing_itogo\');indacationKey(\'book_publishing_sumsPresum,book_publishing_itogo\');"readonly'],
                ['input','text','0','book_publishing_itogo','inputsvvodcodtable book_publishing_itogo','readonly'],
                ['input','text','0','book_publishing_vtch_edd','inputsvvodcodtable book_publishing_vtch_edd','readonly'],
                ['input','text','0','book_publishing_litres','inputsvvodcodtable book_publishing_litres','readonly'],
                ['input','text','0','book_publishing_opl','inputsvvodcodtable book_publishing_opl','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
                ['input','text','0','book_publishing_enl','inputsvvodcodtable book_publishing_enl','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
                ['input','text','0','book_publishing_tex','inputsvvodcodtable book_publishing_tex','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
                ['input','text','0','book_publishing_sx','inputsvvodcodtable book_publishing_sx','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
                ['input','text','0','book_publishing_isky','inputsvvodcodtable book_publishing_isky','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
                ['input','text','0','book_publishing_xyd','inputsvvodcodtable book_publishing_xyd','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
                ['input','text','0','book_publishing_det','inputsvvodcodtable book_publishing_det','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
                ['input','text','0','book_publishing_proch','inputsvvodcodtable book_publishing_proch','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
                ['input','text','0','book_publishing_proch_itogo','inputsvvodcodtable book_publishing_proch_itogo','readonly'],
                ['input','text','0','events','inputsvvodcodtable events','onkeyup="indacationKey(\'events,events_itogs\')"readonly'],
                ['input','text','0','events_stationary','inputsvvodcodtable events_stationary','onkeyup="numresultsKeystationSum(\'events_stationary,events_out_station,events_sits\',\'events_itogs\');indacationKey(\'events,events_itogs\');"readonly'],
                ['input','text','0','events_out_station','inputsvvodcodtable events_out_station','onkeyup="numresultsKeystationSum(\'events_stationary,events_out_station,events_sits\',\'events_itogs\');indacationKey(\'events,events_itogs\');"readonly'],
                ['input','text','0','events_sits','inputsvvodcodtable events_sits','onkeyup="numresultsKeystationSum(\'events_stationary,events_out_station,events_sits\',\'events_itogs\');indacationKey(\'events,events_itogs\');"readonly'],
                ['input','text','0','events_itogs','inputsvvodcodtable events_itogs','readonly'],
                ['input','text','0','visits2','inputsvvodcodtable visits2','onkeyup="indacationKey(\'visits2,visits2_itogs\')"readonly'],
                ['input','text','0','visits2_stationary','inputsvvodcodtable visits2_stationary','onkeyup="numresultsKeystationSum(\'visits2_stationary,visits2_out_station\',\'visits2_itogs\');indacationKey(\'visits2,visits2_itogs\');"readonly'],
                ['input','text','0','visits2_out_station','inputsvvodcodtable visits2_out_station','onkeyup="numresultsKeystationSum(\'visits2_stationary,visits2_out_station\',\'visits2_itogs\');indacationKey(\'visits2,visits2_itogs\');"readonly'],
                ['input','text','0','visits2_itogs','inputsvvodcodtable visits2_itogs','readonly'],
                ['input','text','0','indiv_info','inputsvvodcodtable indiv_info','readonly'],
                ['input','text','0','group_info','inputsvvodcodtable group_info','readonly'],
            ]
            ?>
            <div class="card_body">
                <h4 class="card_title">Всего</h4>
                <div class="table_responsive">
                    <table class="table user_table">
                            <?
                            $itos=0;
                            for($i=0; $i < count($arrtitile); $i++){
                                if($arrtitile[$i] == $arclassth[$itos][0]){
                                    echo'<tr class="tr_'.trim($arclassth[$itos][1]).'">';
                                    $itos++;
                                }else echo'<tr>';
                                echo'<th class="border_top_0 head_title_table">'.$arrtitile[$i].'</th>';
                                //for($iy=0;$iy < count($arrbody[$i]);$iy++)
                                echo'<th class="border_top_0">';
                                if($arrbody[$i][0] == 'input'){
                                    $typein=$arrbody[$i][1];
                                    $body=$arrbody[$i][2];
                                    $namein=$arrbody[$i][3];
                                    $classin=$arrbody[$i][4];
                                    $dopfunction=$arrbody[$i][5];
                                    echo'<input type="'.$typein.'" value="'.$body.'" name="'.$namein.'" class="'.$classin.'" '.$dopfunction.'>';
                                }
                                echo'</th>';
                                echo'</tr>';
                            }
                            ?>
                    </table>
                    <div style="text-align:right;"><button class="buttonStyle" id="send_otchet_cdo" onclick="send_otche_forms1()">Отправить</button></div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?
}else if($section_page == 'id'){
//Просмотр отчета
$idOtchet = (int)chektextST($_GET['id']);//$dostyp_pages == 'access'
if($dostyp_pages == 'access'){
    $queryBD = "SELECT * FROM `key_indicators` WHERE `id_otchet` = '".$idOtchet."'";
}else{
    $queryBD = "SELECT * FROM `key_indicators` WHERE `id_otchet` = '".$idOtchet."' AND `id_author` = '".$INFOUSER['id']."'";
}
$otchetnostQr = querydb($queryBD);
if($otchetnostQr == NULL){echo'<div class="alert_error_cod"><div class="errorIco"></div>Доступ запрещен или отсутствует запрашиваемая информация!</div>';die;}
?>
<style>.card_title{border-bottom:5px solid #dd4111;}th b{color:#000;}.head_title_table{font-size:16px;text-align:left;}.user_table tr{border-bottom-color:#555;}.inputsvvodcodtable{width:200px;}.table thead th{vertical-align:middle !important;}</style>
<div class="row" style="max-width: 742px;">
<div class="col_sm_12">
    <div class="card">
        <?
        $arrtitile=[
            'Читатели','В т.ч.с 15-30','ГосУслуги','ЭДД','ЛитРес','Посещения','&nbsp&nbspСтационарно','&nbsp&nbspВнестационарно','&nbsp&nbspСайт',
            '<b>Итого</b>','Книговыдача','с 15 до 30 лет','Стационарно','Внестационарно','<b>Итого</b>','Периодич.','Книг','АВ','Электронные носители',
            '<b>Итого</b>','ЭДД','ЛитРес','опл','енл','тех','с\х','искус','худож','дет','проч','<b>Итого</b>','Мероприятий','Стационарно','Внестационарно',
            'Сайт','<b>Итого</b>','Посещения','Стационарно','Внестационарно','<b>Итого</b>','На индив. Инф','На группов инф'
        ];
        $arclassth=[
            ['Посещения','d14_visits'],
            ['<b>Итого</b>','d14_visits_sumsPresum'],
            ['Книговыдача','d14_book_pub'],
            ['<b>Итого</b>','d14_book_publishing_sumsPresum'],
            ['<b>Итого</b>','d14_book_publishing_itogo'],
            ['<b>Итого</b>','d14_book_publishing_proch_itogo'],
            ['Мероприятий','d14_events'],
            ['<b>Итого</b>','d14_events_itogs'],
            ['Посещения','d14_vesites'],
            ['<b>Итого</b>','d14_visits2_itogs']
        ];
        $arrbody=[
            ['input','text',$otchetnostQr['d14_readers'],'d14_readers','inputsvvodcodtable d14_readers','readonly'],
            ['input','text',$otchetnostQr['d14_vch_15_30'],'d14_vch_15_30','inputsvvodcodtable d14_vch_15_30','readonly'],
            ['input','text',$otchetnostQr['d14_state_uslugi'],'d14_state_uslugi','inputsvvodcodtable d14_state_uslugi','readonly'],
            ['input','text',$otchetnostQr['d14_edd'],'d14_edd','inputsvvodcodtable d14_edd','readonly'],
            ['input','text',$otchetnostQr['d14_litres'],'d14_litres','inputsvvodcodtable d14_litres','readonly'],
            ['input','text',$otchetnostQr['d14_visits'],'d14_visits','inputsvvodcodtable d14_visits','readonly'],
            ['input','text',$otchetnostQr['d14_visits_stationary'],'d14_visits_stationary','inputsvvodcodtable d14_visits_stationary','readonly'],
            ['input','text',$otchetnostQr['d14_visits_out_station'],'d14_visits_out_station','inputsvvodcodtable d14_visits_out_station','readonly'],
            ['input','text',$otchetnostQr['d14_visits_sits'],'d14_visits_sits','inputsvvodcodtable d14_visits_sits','readonly'],
            ['input','text',prostomat($otchetnostQr['d14_visits_stationary'].','.$otchetnostQr['d14_visits_out_station'].','.$otchetnostQr['d14_visits_sits']),'d14_visits_sumsPresum','inputsvvodcodtable d14_visits_sumsPresum','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub'],'d14_book_pub','inputsvvodcodtable d14_book_pub','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_15_30'],'d14_book_pub_15_30','inputsvvodcodtable d14_book_pub_15_30','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_stationary'],'d14_book_pub_stationary','inputsvvodcodtable d14_book_pub_stationary','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_out_station'],'d14_book_pub_out_station','inputsvvodcodtable d14_book_pub_out_station','readonly'],
            ['input','text',prostomat($otchetnostQr['d14_book_pub_stationary'].','.$otchetnostQr['d14_book_pub_out_station']),'d14_book_publishing_sumsPresum','inputsvvodcodtable d14_book_publishing_sumsPresum','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_periodically'],'d14_book_pub_periodically','inputsvvodcodtable d14_book_pub_periodically','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_books'],'d14_book_pub_books','inputsvvodcodtable d14_book_pub_books','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_books_av'],'d14_book_pub_books_av','inputsvvodcodtable d14_book_pub_books_av','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_electronic_media'],'d14_book_pub_electronic_media','inputsvvodcodtable d14_book_pub_electronic_media','readonly'],
            ['input','text',prostomat($otchetnostQr['d14_book_pub_periodically'].','.$otchetnostQr['d14_book_pub_books'].','.$otchetnostQr['d14_book_pub_books_av'].','.$otchetnostQr['d14_book_pub_electronic_media']),'d14_book_publishing_itogo','inputsvvodcodtable d14_book_publishing_itogo','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_edd'],'d14_book_pub_edd','inputsvvodcodtable d14_book_pub_edd','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_litres'],'d14_book_pub_litres','inputsvvodcodtable d14_book_pub_litres','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_opl'],'d14_book_pub_opl','inputsvvodcodtable d14_book_pub_opl','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_enl'],'d14_book_pub_enl','inputsvvodcodtable d14_book_pub_enl','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_tex'],'d14_book_pub_tex','inputsvvodcodtable d14_book_pub_tex','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_sx'],'d14_book_pub_sx','inputsvvodcodtable d14_book_pub_sx','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_iskys'],'d14_book_pub_iskys','inputsvvodcodtable d14_book_pub_iskys','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_hudozh'],'d14_book_pub_hudozh','inputsvvodcodtable d14_book_pub_hudozh','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_det'],'d14_book_pub_det','inputsvvodcodtable d14_book_pub_det','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_proch'],'d14_book_pub_proch','inputsvvodcodtable d14_book_pub_proch','readonly'],
            ['input','text',prostomat($otchetnostQr['d14_book_pub_opl'].','.$otchetnostQr['d14_book_pub_enl'].','.$otchetnostQr['d14_book_pub_tex'].','.$otchetnostQr['d14_book_pub_sx'].','.$otchetnostQr['d14_book_pub_iskys'].','.$otchetnostQr['d14_book_pub_hudozh'].','.$otchetnostQr['d14_book_pub_det'].','.$otchetnostQr['d14_book_pub_proch']),'d14_book_publishing_proch_itogo','inputsvvodcodtable d14_book_publishing_proch_itogo','readonly'],
            ['input','text',$otchetnostQr['d14_events'],'d14_events','inputsvvodcodtable d14_events','readonly'],
            ['input','text',$otchetnostQr['d14_events_stationary'],'d14_events_stationary','inputsvvodcodtable d14_events_stationary','readonly'],
            ['input','text',$otchetnostQr['d14_events_out_station'],'d14_events_out_station','inputsvvodcodtable d14_events_out_station','readonly'],
            ['input','text',$otchetnostQr['d14_events_sits'],'d14_events_sits','inputsvvodcodtable d14_events_sits','readonly'],
            ['input','text',prostomat($otchetnostQr['d14_events_stationary'].','.$otchetnostQr['d14_events_out_station'].','.$otchetnostQr['d14_events_sits']),'d14_events_itogs','inputsvvodcodtable d14_events_itogs','readonly'],
            ['input','text',$otchetnostQr['d14_vesites'],'d14_vesites','inputsvvodcodtable d14_vesites','readonly'],
            ['input','text',$otchetnostQr['d14_vesites_stationary'],'d14_vesites_stationary','inputsvvodcodtable d14_vesites_stationary','readonly'],
            ['input','text',$otchetnostQr['d14_vesites_out_station'],'d14_vesites_out_station','inputsvvodcodtable d14_vesites_out_station','readonly'],
            ['input','text',prostomat($otchetnostQr['d14_vesites_stationary'].','.$otchetnostQr['d14_vesites_out_station']),'d14_visits2_itogs','inputsvvodcodtable d14_visits2_itogs','readonly'],
            ['input','text',$otchetnostQr['d14_indiv_info'],'d14_indiv_info','inputsvvodcodtable d14_indiv_info','readonly'],
            ['input','text',$otchetnostQr['d14_group_info'],'d14_group_info','inputsvvodcodtable d14_group_info','readonly'],
        ]
        ?>
        <div class="card_body">
            <h4 class="card_title">ДО 14 ЛЕТ</h4>
            <div class="table_responsive">
                <table class="table user_table">
                        <?
                        $itos=0;
                        for($i=0; $i < count($arrtitile); $i++){
                            if($arrtitile[$i] == $arclassth[$itos][0]){
                                echo'<tr class="tr_'.trim($arclassth[$itos][1]).'">';
                                $itos++;
                            }else echo'<tr>';
                            echo'<th class="border_top_0 head_title_table">'.$arrtitile[$i].'</th>';
                            echo'<th class="border_top_0">';
                            if($arrbody[$i][0] == 'input'){
                                $typein=$arrbody[$i][1];
                                $body=$arrbody[$i][2];
                                $namein=$arrbody[$i][3];
                                $classin=$arrbody[$i][4];
                                $dopfunction=$arrbody[$i][5];
                                echo'<input type="'.$typein.'" value="'.$body.'" name="'.$namein.'" class="'.$classin.'" '.$dopfunction.'>';
                            }
                            echo'</th>';
                            echo'</tr>';
                        }
                        ?>
                </table>
            </div>
        </div>
        <?
        $arrtitile=[
            'Читатели','В т.ч.с 15-30','ГосУслуги','ЭДД','ЛитРес','Посещения','&nbsp&nbspСтационарно','&nbsp&nbspВнестационарно','&nbsp&nbspСайт',
            '<b>Итого</b>','Книговыдача','с 15 до 30 лет','Стационарно','Внестационарно','<b>Итого</b>','Периодич.','Книг','АВ','Электронные носители',
            '<b>Итого</b>','В т.ч. ЭДД','ЛитРес','опл','енл','тех','с\х','искус','худож','дет','проч','<b>Итого</b>','Мероприятий','Стационарно','Внестационарно',
            'Сайт','<b>Итого</b>','Посещения','Стационарно','Внестационарно','<b>Итого</b>','На индив. Инф','На группов инф'
        ];
        $arclassth=[
            ['Посещения','s15_visits'],
            ['<b>Итого</b>','s15_visits_sumsPresum'],
            ['Книговыдача','s15_book_pub'],
            ['<b>Итого</b>','s15_book_publishing_sumsPresum'],
            ['<b>Итого</b>','s15_book_publishing_itogo'],
            ['<b>Итого</b>','s15_book_publishing_proch_itogo'],
            ['Мероприятий','s15_events'],
            ['<b>Итого</b>','s15_events_itogs'],
            ['Посещения','s15_vesites'],
            ['<b>Итого</b>','s15_visits2_itogs']
        ];
        $arrbody=[
            ['input','text',$otchetnostQr['s15_readers'],'s15_readers','inputsvvodcodtable s15_readers','readonly'],
            ['input','text',$otchetnostQr['s15_vch_15_30'],'s15_vch_15_30','inputsvvodcodtable s15_vch_15_30','readonly'],
            ['input','text',$otchetnostQr['s15_state_uslugi'],'s15_state_uslugi','inputsvvodcodtable s15_state_uslugi','readonly'],
            ['input','text',$otchetnostQr['s15_edd'],'s15_edd','inputsvvodcodtable s15_edd','readonly'],
            ['input','text',$otchetnostQr['s15_litres'],'s15_litres','inputsvvodcodtable s15_litres','readonly'],
            ['input','text',$otchetnostQr['s15_visits'],'s15_visits','inputsvvodcodtable s15_visits','readonly'],
            ['input','text',$otchetnostQr['s15_visits_stationary'],'s15_visits_stationary','inputsvvodcodtable s15_visits_stationary','readonly'],
            ['input','text',$otchetnostQr['s15_visits_out_station'],'s15_visits_out_station','inputsvvodcodtable s15_visits_out_station','readonly'],
            ['input','text',$otchetnostQr['s15_visits_sits'],'s15_visits_sits','inputsvvodcodtable s15_visits_sits','readonly'],
            ['input','text',prostomat($otchetnostQr['s15_visits_stationary'].','.$otchetnostQr['s15_visits_out_station'].','.$otchetnostQr['s15_visits_sits']),'s15_visits_sumsPresum','inputsvvodcodtable s15_visits_sumsPresum','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub'],'s15_book_pub','inputsvvodcodtable s15_book_pub','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_15_30'],'s15_book_pub_15_30','inputsvvodcodtable s15_book_pub_15_30','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_stationary'],'s15_book_pub_stationary','inputsvvodcodtable s15_book_pub_stationary','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_out_station'],'s15_book_pub_out_station','inputsvvodcodtable s15_book_pub_out_station','readonly'],
            ['input','text',prostomat($otchetnostQr['s15_book_pub_stationary'].','.$otchetnostQr['s15_book_pub_out_station']),'s15_book_publishing_sumsPresum','inputsvvodcodtable s15_book_publishing_sumsPresum','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_periodically'],'s15_book_pub_periodically','inputsvvodcodtable s15_book_pub_periodically','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_books'],'s15_book_pub_books','inputsvvodcodtable s15_book_pub_books','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_books_av'],'s15_book_pub_books_av','inputsvvodcodtable s15_book_pub_books_av','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_electronic_media'],'s15_book_pub_electronic_media','inputsvvodcodtable s15_book_pub_electronic_media','readonly'],
            ['input','text',prostomat($otchetnostQr['s15_book_pub_periodically'].','.$otchetnostQr['s15_book_pub_books'].','.$otchetnostQr['s15_book_pub_books_av'].','.$otchetnostQr['s15_book_pub_electronic_media']),'s15_book_publishing_itogo','inputsvvodcodtable s15_book_publishing_itogo','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_edd'],'s15_book_pub_edd','inputsvvodcodtable s15_book_pub_edd','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_litres'],'s15_book_pub_litres','inputsvvodcodtable s15_book_pub_litres','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_opl'],'s15_book_pub_opl','inputsvvodcodtable s15_book_pub_opl','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_enl'],'s15_book_pub_enl','inputsvvodcodtable s15_book_pub_enl','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_tex'],'s15_book_pub_tex','inputsvvodcodtable s15_book_pub_tex','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_sx'],'s15_book_pub_sx','inputsvvodcodtable s15_book_pub_sx','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_iskys'],'s15_book_pub_iskys','inputsvvodcodtable s15_book_pub_iskys','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_hudozh'],'s15_book_pub_hudozh','inputsvvodcodtable s15_book_pub_hudozh','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_det'],'s15_book_pub_det','inputsvvodcodtable s15_book_pub_det','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_proch'],'s15_book_pub_proch','inputsvvodcodtable s15_book_pub_proch','readonly'],
            ['input','text',prostomat($otchetnostQr['s15_book_pub_opl'].','.$otchetnostQr['s15_book_pub_enl'].','.$otchetnostQr['s15_book_pub_tex'].','.$otchetnostQr['s15_book_pub_sx'].','.$otchetnostQr['s15_book_pub_iskys'].','.$otchetnostQr['s15_book_pub_hudozh'].','.$otchetnostQr['s15_book_pub_det'].','.$otchetnostQr['s15_book_pub_proch']),'s15_book_publishing_proch_itogo','inputsvvodcodtable s15_book_publishing_proch_itogo','readonly'],
            ['input','text',$otchetnostQr['s15_events'],'s15_events','inputsvvodcodtable s15_events','readonly'],
            ['input','text',$otchetnostQr['s15_events_stationary'],'s15_events_stationary','inputsvvodcodtable s15_events_stationary','readonly'],
            ['input','text',$otchetnostQr['s15_events_out_station'],'s15_events_out_station','inputsvvodcodtable s15_events_out_station','readonly'],
            ['input','text',$otchetnostQr['s15_events_sits'],'s15_events_sits','inputsvvodcodtable s15_events_sits','readonly'],
            ['input','text',prostomat($otchetnostQr['s15_events_stationary'].','.$otchetnostQr['s15_events_out_station'].','.$otchetnostQr['s15_events_sits']),'s15_events_itogs','inputsvvodcodtable s15_events_itogs','readonly'],
            ['input','text',$otchetnostQr['s15_vesites'],'s15_vesites','inputsvvodcodtable s15_vesites','readonly'],
            ['input','text',$otchetnostQr['s15_vesites_stationary'],'s15_vesites_stationary','inputsvvodcodtable s15_vesites_stationary','readonly'],
            ['input','text',$otchetnostQr['s15_vesites_out_station'],'s15_vesites_out_station','inputsvvodcodtable s15_vesites_out_station','readonly'],
            ['input','text',prostomat($otchetnostQr['s15_vesites_stationary'].','.$otchetnostQr['s15_vesites_out_station']),'s15_visits2_itogs','inputsvvodcodtable s15_visits2_itogs','readonly'],
            ['input','text',$otchetnostQr['s15_indiv_info'],'s15_indiv_info','inputsvvodcodtable s15_indiv_info','readonly'],
            ['input','text',$otchetnostQr['s15_group_info'],'s15_group_info','inputsvvodcodtable s15_group_info','readonly'],
        ]
        ?>
        <div class="card_body">
            <h4 class="card_title">С 15 лет</h4>
            <div class="table_responsive">
                <table class="table user_table">
                        <?
                        $itos=0;
                        for($i=0; $i < count($arrtitile); $i++){
                            if($arrtitile[$i] == $arclassth[$itos][0]){
                                echo'<tr class="tr_'.trim($arclassth[$itos][1]).'">';
                                $itos++;
                            }else echo'<tr>';
                            echo'<th class="border_top_0 head_title_table">'.$arrtitile[$i].'</th>';
                            echo'<th class="border_top_0">';
                            if($arrbody[$i][0] == 'input'){
                                $typein=$arrbody[$i][1];
                                $body=$arrbody[$i][2];
                                $namein=$arrbody[$i][3];
                                $classin=$arrbody[$i][4];
                                $dopfunction=$arrbody[$i][5];
                                echo'<input type="'.$typein.'" value="'.$body.'" name="'.$namein.'" class="'.$classin.'" '.$dopfunction.'>';
                            }
                            echo'</th>';
                            echo'</tr>';
                        }
                        ?>
                </table>
            </div>
        </div>
        <?
        $arrtitile=[
            'Читатели','В т.ч.с 15-30','ГосУслуги','ЭДД','ЛитРес','Посещения','&nbsp&nbspСтационарно','&nbsp&nbspВнестационарно','&nbsp&nbspСайт',
            '<b>Итого</b>','Книговыдача','с 15 до 30 лет','Стационарно','Внестационарно','<b>Итого</b>','Периодич.','Книг','АВ','Электронные носители',
            '<b>Итого</b>','В т.ч. ЭДД','ЛитРес','опл','енл','тех','с\х','иску','худ','дет','проч','<b>Итого</b>','Мероприятий','Стационарно','Внестационарно',
            'Сайт','<b>Итого</b>','Посещения','Стационарно','Внестационарно','<b>Итого</b>','На индив. Инф','На группов инф'
        ];
        $arclassth=[
            ['Посещения','visits'],
            ['<b>Итого</b>','visits_sumsPresum'],
            ['Книговыдача','book_publishing'],
            ['<b>Итого</b>','book_publishing_sumsPresum'],
            ['<b>Итого</b>','book_publishing_itogo'],
            ['<b>Итого</b>','book_publishing_proch_itogo'],
            ['Мероприятий','events'],
            ['<b>Итого</b>','events_itogs'],
            ['Посещения','visits2'],
            ['<b>Итого</b>','visits2_itogs']
        ];
        $arrbody=[
            ['input','text',$otchetnostQr['readers'],'readers','inputsvvodcodtable readers','readonly'],
            ['input','text',$otchetnostQr['readers_15_30'],'readers_vtch1530','inputsvvodcodtable readers_vtch1530','readonly'],
            ['input','text',$otchetnostQr['state_service'],'state_service','inputsvvodcodtable state_service','readonly'],
            ['input','text',$otchetnostQr['edd'],'edd','inputsvvodcodtable edd','readonly'],
            ['input','text',$otchetnostQr['litres'],'litres','inputsvvodcodtable litres','readonly'],
            ['input','text',$otchetnostQr['visits'],'visits','inputsvvodcodtable visits','readonly'],
            ['input','text',$otchetnostQr['visits_stationary'],'visits_stationary','inputsvvodcodtable visits_stationary','readonly'],
            ['input','text',$otchetnostQr['visits_out_station'],'visits_out_station','inputsvvodcodtable visits_out_station','readonly'],
            ['input','text',$otchetnostQr['visits_site'],'visits_site','inputsvvodcodtable visits_site','readonly'],
            ['input','text',prostomat($otchetnostQr['visits_stationary'].','.$otchetnostQr['visits_out_station'].','.$otchetnostQr['visits_site']),'visits_sumsPresum','inputsvvodcodtable visits_sumsPresum','readonly'],
            ['input','text',$otchetnostQr['book_publishing'],'book_publishing','inputsvvodcodtable book_publishing','readonly'],
            ['input','text',$otchetnostQr['book_publishing_15_30'],'book_publishing_15_30','inputsvvodcodtable book_publishing_15_30','readonly'],
            ['input','text',$otchetnostQr['book_publishing_stationary'],'book_publishing_stationary','inputsvvodcodtable book_publishing_stationary','readonly'],
            ['input','text',$otchetnostQr['book_publishing_outof_station'],'book_publishing_outof_station','inputsvvodcodtable book_publishing_outof_station','readonly'],
            ['input','text',prostomat($otchetnostQr['book_publishing_stationary'].','.$otchetnostQr['book_publishing_outof_station']),'book_publishing_sumsPresum','inputsvvodcodtable book_publishing_sumsPresum','readonly'],
            ['input','text',$otchetnostQr['book_publishing_periodically'],'book_publishing_periodically','inputsvvodcodtable book_publishing_periodically','readonly'],
            ['input','text',$otchetnostQr['book_publishing_books'],'book_publishing_books','inputsvvodcodtable book_publishing_books','readonly'],
            ['input','text',$otchetnostQr['book_publishing_av'],'book_publishing_av','inputsvvodcodtable book_publishing_av','readonly'],
            ['input','text',$otchetnostQr['book_publishing_electronic_media'],'book_publishing_electronic_media','inputsvvodcodtable book_publishing_electronic_media','readonly'],
            ['input','text',prostomat($otchetnostQr['book_publishing_periodically'].','.$otchetnostQr['book_publishing_books'].','.$otchetnostQr['book_publishing_av'].','.$otchetnostQr['book_publishing_electronic_media']),'book_publishing_itogo','inputsvvodcodtable book_publishing_itogo','readonly'],
            ['input','text',$otchetnostQr['book_publishing_vtch_edd'],'book_publishing_vtch_edd','inputsvvodcodtable book_publishing_vtch_edd','readonly'],
            ['input','text',$otchetnostQr['book_publishing_litres'],'book_publishing_litres','inputsvvodcodtable book_publishing_litres','readonly'],
            ['input','text',$otchetnostQr['book_publishing_opl'],'book_publishing_opl','inputsvvodcodtable book_publishing_opl','readonly'],
            ['input','text',$otchetnostQr['book_publishing_enl'],'book_publishing_enl','inputsvvodcodtable book_publishing_enl','readonly'],
            ['input','text',$otchetnostQr['book_publishing_tex'],'book_publishing_tex','inputsvvodcodtable book_publishing_tex','readonly'],
            ['input','text',$otchetnostQr['book_publishing_sx'],'book_publishing_sx','inputsvvodcodtable book_publishing_sx','readonly'],
            ['input','text',$otchetnostQr['book_publishing_isky'],'book_publishing_isky','inputsvvodcodtable book_publishing_isky','readonly'],
            ['input','text',$otchetnostQr['book_publishing_xyd'],'book_publishing_xyd','inputsvvodcodtable book_publishing_xyd','readonly'],
            ['input','text',$otchetnostQr['book_publishing_det'],'book_publishing_det','inputsvvodcodtable book_publishing_det','readonly'],
            ['input','text',$otchetnostQr['book_publishing_proch'],'book_publishing_proch','inputsvvodcodtable book_publishing_proch','readonly'],
            ['input','text',prostomat($otchetnostQr['book_publishing_opl'].','.$otchetnostQr['book_publishing_enl'].','.$otchetnostQr['book_publishing_tex'].','.$otchetnostQr['book_publishing_sx'].','.$otchetnostQr['book_publishing_isky'].','.$otchetnostQr['book_publishing_xyd'].','.$otchetnostQr['book_publishing_det'].','.$otchetnostQr['book_publishing_proch']),'book_publishing_proch_itogo','inputsvvodcodtable book_publishing_proch_itogo','readonly'],
            ['input','text',$otchetnostQr['events'],'events','inputsvvodcodtable events','onkeyup="indacationKey(\'events,events_itogs\')"'],
            ['input','text',$otchetnostQr['events_stationary'],'events_stationary','inputsvvodcodtable events_stationary','readonly'],
            ['input','text',$otchetnostQr['events_out_station'],'events_out_station','inputsvvodcodtable events_out_station','readonly'],
            ['input','text',$otchetnostQr['events_sits'],'events_sits','inputsvvodcodtable events_sits','readonly'],
            ['input','text',prostomat($otchetnostQr['events_stationary'].','.$otchetnostQr['events_out_station'].','.$otchetnostQr['events_sits']),'events_itogs','inputsvvodcodtable events_itogs','readonly'],
            ['input','text',$otchetnostQr['visits2'],'visits2','inputsvvodcodtable visits2','readonly'],
            ['input','text',$otchetnostQr['visits2_stationary'],'visits2_stationary','inputsvvodcodtable visits2_stationary','readonly'],
            ['input','text',$otchetnostQr['visits2_out_station'],'visits2_out_station','inputsvvodcodtable visits2_out_station','readonly'],
            ['input','text',prostomat($otchetnostQr['visits2_stationary'].','.$otchetnostQr['visits2_out_station']),'visits2_itogs','inputsvvodcodtable visits2_itogs','readonly'],
            ['input','text',$otchetnostQr['indiv_info'],'indiv_info','inputsvvodcodtable indiv_info','readonly'],
            ['input','text',$otchetnostQr['group_info'],'group_info','inputsvvodcodtable group_info','readonly'],
        ]
        ?>
        <div class="card_body">
            <h4 class="card_title">Всего</h4>
            <div class="table_responsive">
                <table class="table user_table">
                        <?
                        $itos=0;
                        for($i=0; $i < count($arrtitile); $i++){
                            if($arrtitile[$i] == $arclassth[$itos][0]){
                                echo'<tr class="tr_'.trim($arclassth[$itos][1]).'">';
                                $itos++;
                            }else echo'<tr>';
                            echo'<th class="border_top_0 head_title_table">'.$arrtitile[$i].'</th>';
                            echo'<th class="border_top_0">';
                            if($arrbody[$i][0] == 'input'){
                                $typein=$arrbody[$i][1];
                                $body=$arrbody[$i][2];
                                $namein=$arrbody[$i][3];
                                $classin=$arrbody[$i][4];
                                $dopfunction=$arrbody[$i][5];
                                echo'<input type="'.$typein.'" value="'.$body.'" name="'.$namein.'" class="'.$classin.'" '.$dopfunction.'>';
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
<?}else if($section_page == 'list-key-indicators' && $dostyp_pages == 'access'){
//Посмотреть все сданные отчеты формы 1
$dateYer = date('Y');
$date_math = date('m')-1;
$rs_date = $dateYer.'_'.$date_math;
$numb = ['1','2','3','4','5','6','7','8','9','10','11','12'];
$merth = ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Откбярь','Ноябрь','Декабрь'];
$gods = ['2022','2023','2024','2025','2026','2027','2028'];
$otchetnostQr = querydb("SELECT id_otchet,id_author,date FROM `key_indicators` WHERE `date` = '".$rs_date."'",'noArray');
?>
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
                            <?$im=0;while($otchetnostArr = mysqli_fetch_assoc($otchetnostQr)){
                                /*Проверка на отсутсвие сданных отчетов*/
                                if($otchetnostArr['id_author'] == $push_id[0] || $otchetnostArr['id_author'] == $push_id[12] 
                                    || $otchetnostArr['id_author'] == $push_id[13] || $otchetnostArr['id_author'] == $push_id[14]){
                                        unset($push_id[0]);unset($push_id[12]);unset($push_id[13]);unset($push_id[14]);
                                }else{
                                    foreach($push_id as $key => $item){
                                        if ($item == $otchetnostArr['id_author']){
                                          unset($push_id[$key]);
                                        }
                                    }
                                }
                                $im++;
                                /*Конец проверки на отсутсвие сданных отчетов*/
                                $infuserID = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$otchetnostArr['id_author']."'");
                                echo'<tr>';
                                echo'<th>'.$infuserID['biblios'].'</th>';
                                echo'<th>'.$otchetnostArr['date'].'</th>';
                                echo'<th><a href="/key-indicators'.$otchetnostArr['id_otchet'].'">Посмотреть</a></th>';
                                echo'<th><a href="/edit-key-indicators'.$otchetnostArr['id_otchet'].'">Редактировать</a></th>';
                                echo'<th><a href="#" onclick="download_key_indicators('.$otchetnostArr['id_otchet'].');return false;">Скачать</a></th>';
                                echo'</tr>';
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?if(count($push_id) > 0){?>
        <div class="card">
        <div class="head_title_table_list">Отсутствующие отчеты</div>
            <div class="card_body">
                <div class="table_responsive">
                    <table class="table user_table">
                        <thead>
                            <tr>
                                <th class="border_top_0">Библиотеки</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_noappend">
                            <?foreach($push_id as $key => $item){
                                $infuserIDs = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$item."' LIMIT 1");
                                echo'<tr>';
                                echo'<th>'.$infuserIDs['biblios'].'</th>';
                                echo'</tr>';
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?}?>
    </div>
</div>
<?
}else if($section_page == 'edit-otchet'){
    //Редактирование отчета
    $idOtchet = (int)chektextST($_GET['id']);//$dostyp_pages == 'access' INFOUSER
    if($dostyp_pages == 'access'){
        $queryBD = "SELECT * FROM `key_indicators` WHERE `id_otchet` = '".$idOtchet."'";
    }else{
        $queryBD = "SELECT * FROM `key_indicators` WHERE `id_otchet` = '".$idOtchet."' AND `id_author` = '".$INFOUSER['id']."'";
    }
    $otchetnostQr = querydb($queryBD);
    if($otchetnostQr == NULL){echo'<div class="alert_error_cod"><div class="errorIco"></div>Доступ запрещен или отсутствует запрашиваемая информация!</div>';die;}
?>
<style>.card_title{border-bottom:5px solid #dd4111;}th b{color:#000;}.head_title_table{font-size:16px;text-align:left;}.user_table tr{border-bottom-color:#555;}.inputsvvodcodtable{width:200px;}.table thead th{vertical-align:middle !important;}</style>
<div class="alert_warning_cod" style="max-width:712px;"><div class="wranningIco"></div>Расчет данных находится в тестовом режиме</div>
<div class="row" style="max-width: 742px;">
<div class="col_sm_12">
    <div class="card">
        <?
        $arrtitile=[
            'Читатели','В т.ч.с 15-30','ГосУслуги','ЭДД','ЛитРес','Посещения','&nbsp&nbspСтационарно','&nbsp&nbspВнестационарно','&nbsp&nbspСайт',
            '<b>Итого</b>','Книговыдача','с 15 до 30 лет','Стационарно','Внестационарно','<b>Итого</b>','Периодич.','Книг','АВ','Электронные носители',
            '<b>Итого</b>','ЭДД','ЛитРес','опл','енл','тех','с\х','искус','худож','дет','проч','<b>Итого</b>','Мероприятий','Стационарно','Внестационарно',
            'Сайт','<b>Итого</b>','Посещения','Стационарно','Внестационарно','<b>Итого</b>','На индив. Инф','На группов инф'
        ];
        $arclassth=[
            ['Посещения','d14_visits'],
            ['<b>Итого</b>','d14_visits_sumsPresum'],
            ['Книговыдача','d14_book_pub'],
            ['<b>Итого</b>','d14_book_publishing_sumsPresum'],
            ['<b>Итого</b>','d14_book_publishing_itogo'],
            ['<b>Итого</b>','d14_book_publishing_proch_itogo'],
            ['Мероприятий','d14_events'],
            ['<b>Итого</b>','d14_events_itogs'],
            ['Посещения','d14_vesites'],
            ['<b>Итого</b>','d14_visits2_itogs']
        ];
        $arrbody=[
            ['input','text',$otchetnostQr['d14_readers'],'d14_readers','inputsvvodcodtable d14_readers','onkeyup="numresultsKeystationSum(\'d14_readers,s15_readers\',\'readers\');"'],
            ['input','text',$otchetnostQr['d14_vch_15_30'],'d14_vch_15_30','inputsvvodcodtable d14_vch_15_30','onkeyup="numresultsKeystationSum(\'d14_vch_15_30,s15_vch_15_30\',\'readers_vtch1530\');"'],
            ['input','text',$otchetnostQr['d14_state_uslugi'],'d14_state_uslugi','inputsvvodcodtable d14_state_uslugi','onkeyup="numresultsKeystationSum(\'d14_state_uslugi,s15_state_uslugi\',\'state_service\');"'],
            ['input','text',$otchetnostQr['d14_edd'],'d14_edd','inputsvvodcodtable d14_edd','onkeyup="numresultsKeystationSum(\'d14_edd,s15_edd\',\'edd\');"'],
            ['input','text',$otchetnostQr['d14_litres'],'d14_litres','inputsvvodcodtable d14_litres','onkeyup="numresultsKeystationSum(\'d14_litres,s15_litres\',\'litres\');"'],
            ['input','text',$otchetnostQr['d14_visits'],'d14_visits','inputsvvodcodtable d14_visits','onkeyup="numresultsKeystationSum(\'d14_visits,s15_visits\',\'visits\');indacationKey(\'d14_visits,d14_visits_sumsPresum\');"'],
            ['input','text',$otchetnostQr['d14_visits_stationary'],'d14_visits_stationary','inputsvvodcodtable d14_visits_stationary','onkeyup="numresultsKeystationSum(\'d14_visits_stationary,s15_visits_stationary\',\'visits_stationary\');numresultsKeystationSum(\'d14_visits_stationary,d14_visits_out_station,d14_visits_sits\',\'d14_visits_sumsPresum\');indacationKey(\'d14_visits,d14_visits_sumsPresum\');"'],
            ['input','text',$otchetnostQr['d14_visits_out_station'],'d14_visits_out_station','inputsvvodcodtable d14_visits_out_station','onkeyup="numresultsKeystationSum(\'d14_visits_out_station,s15_visits_out_station\',\'visits_out_station\');numresultsKeystationSum(\'d14_visits_stationary,d14_visits_out_station,d14_visits_sits\',\'d14_visits_sumsPresum\');indacationKey(\'d14_visits,d14_visits_sumsPresum\');"'],
            ['input','text',$otchetnostQr['d14_visits_sits'],'d14_visits_sits','inputsvvodcodtable d14_visits_sits','onkeyup="numresultsKeystationSum(\'d14_visits_sits,s15_visits_sits\',\'visits_site\');numresultsKeystationSum(\'d14_visits_stationary,d14_visits_out_station,d14_visits_sits\',\'d14_visits_sumsPresum\');indacationKey(\'d14_visits,d14_visits_sumsPresum\');"'],
            ['input','text',prostomat($otchetnostQr['d14_visits_stationary'].','.$otchetnostQr['d14_visits_out_station'].','.$otchetnostQr['d14_visits_sits']),'d14_visits_sumsPresum','inputsvvodcodtable d14_visits_sumsPresum','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub'],'d14_book_pub','inputsvvodcodtable d14_book_pub','onkeyup="numresultsKeystationSum(\'d14_book_pub,s15_book_pub\',\'book_publishing\');indacationKey(\'d14_book_pub,d14_book_publishing_sumsPresum\');"'],
            ['input','text',$otchetnostQr['d14_book_pub_15_30'],'d14_book_pub_15_30','inputsvvodcodtable d14_book_pub_15_30','onkeyup="numresultsKeystationSum(\'d14_book_pub_15_30,s15_book_pub_15_30\',\'book_publishing_15_30\');"'],
            ['input','text',$otchetnostQr['d14_book_pub_stationary'],'d14_book_pub_stationary','inputsvvodcodtable d14_book_pub_stationary','onkeyup="numresultsKeystationSum(\'d14_book_pub_stationary,s15_book_pub_stationary\',\'book_publishing_stationary\');numresultsKeystationSum(\'d14_book_pub_stationary,d14_book_pub_out_station\',\'d14_book_publishing_sumsPresum\');indacationKey(\'d14_book_pub,d14_book_publishing_sumsPresum\');"'],
            ['input','text',$otchetnostQr['d14_book_pub_out_station'],'d14_book_pub_out_station','inputsvvodcodtable d14_book_pub_out_station','onkeyup="numresultsKeystationSum(\'d14_book_pub_out_station,s15_book_pub_out_station\',\'book_publishing_outof_station\');numresultsKeystationSum(\'d14_book_pub_stationary,d14_book_pub_out_station\',\'d14_book_publishing_sumsPresum\');indacationKey(\'d14_book_pub,d14_book_publishing_sumsPresum\');"'],
            ['input','text',prostomat($otchetnostQr['d14_book_pub_stationary'].','.$otchetnostQr['d14_book_pub_out_station']),'d14_book_publishing_sumsPresum','inputsvvodcodtable d14_book_publishing_sumsPresum','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_periodically'],'d14_book_pub_periodically','inputsvvodcodtable d14_book_pub_periodically','onkeyup="numresultsKeystationSum(\'d14_book_pub_periodically,s15_book_pub_periodically\',\'book_publishing_periodically\');numresultsKeystationSum(\'d14_book_pub_periodically,d14_book_pub_books,d14_book_pub_books_av,d14_book_pub_electronic_media\',\'d14_book_publishing_itogo\');indacationKey(\'d14_book_publishing_sumsPresum,d14_book_publishing_itogo\');"'],
            ['input','text',$otchetnostQr['d14_book_pub_books'],'d14_book_pub_books','inputsvvodcodtable d14_book_pub_books','onkeyup="numresultsKeystationSum(\'d14_book_pub_books,s15_book_pub_books\',\'book_publishing_books\');numresultsKeystationSum(\'d14_book_pub_periodically,d14_book_pub_books,d14_book_pub_books_av,d14_book_pub_electronic_media\',\'d14_book_publishing_itogo\');indacationKey(\'d14_book_publishing_sumsPresum,d14_book_publishing_itogo\');"'],
            ['input','text',$otchetnostQr['d14_book_pub_books_av'],'d14_book_pub_books_av','inputsvvodcodtable d14_book_pub_books_av','onkeyup="numresultsKeystationSum(\'d14_book_pub_books_av,s15_book_pub_books_av\',\'book_publishing_av\');numresultsKeystationSum(\'d14_book_pub_periodically,d14_book_pub_books,d14_book_pub_books_av,d14_book_pub_electronic_media\',\'d14_book_publishing_itogo\');indacationKey(\'d14_book_publishing_sumsPresum,d14_book_publishing_itogo\');"'],
            ['input','text',$otchetnostQr['d14_book_pub_electronic_media'],'d14_book_pub_electronic_media','inputsvvodcodtable d14_book_pub_electronic_media','onkeyup="numresultsKeystationSum(\'d14_book_pub_electronic_media,s15_book_pub_electronic_media\',\'book_publishing_electronic_media\');numresultsKeystationSum(\'d14_book_pub_periodically,d14_book_pub_books,d14_book_pub_books_av,d14_book_pub_electronic_media\',\'d14_book_publishing_itogo\');indacationKey(\'d14_book_publishing_sumsPresum,d14_book_publishing_itogo\');"'],
            ['input','text',prostomat($otchetnostQr['d14_book_pub_periodically'].','.$otchetnostQr['d14_book_pub_books'].','.$otchetnostQr['d14_book_pub_books_av'].','.$otchetnostQr['d14_book_pub_electronic_media']),'d14_book_publishing_itogo','inputsvvodcodtable d14_book_publishing_itogo','readonly'],
            ['input','text',$otchetnostQr['d14_book_pub_edd'],'d14_book_pub_edd','inputsvvodcodtable d14_book_pub_edd','onkeyup="numresultsKeystationSum(\'d14_book_pub_edd,s15_book_pub_edd\',\'book_publishing_vtch_edd\');"'],
            ['input','text',$otchetnostQr['d14_book_pub_litres'],'d14_book_pub_litres','inputsvvodcodtable d14_book_pub_litres','onkeyup="numresultsKeystationSum(\'d14_book_pub_litres,s15_book_pub_litres\',\'book_publishing_litres\');"'],
            ['input','text',$otchetnostQr['d14_book_pub_opl'],'d14_book_pub_opl','inputsvvodcodtable d14_book_pub_opl','onkeyup="numresultsKeystationSum(\'d14_book_pub_opl,s15_book_pub_opl\',\'book_publishing_opl\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
            ['input','text',$otchetnostQr['d14_book_pub_enl'],'d14_book_pub_enl','inputsvvodcodtable d14_book_pub_enl','onkeyup="numresultsKeystationSum(\'d14_book_pub_enl,s15_book_pub_enl\',\'book_publishing_enl\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
            ['input','text',$otchetnostQr['d14_book_pub_tex'],'d14_book_pub_tex','inputsvvodcodtable d14_book_pub_tex','onkeyup="numresultsKeystationSum(\'d14_book_pub_tex,s15_book_pub_tex\',\'book_publishing_tex\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
            ['input','text',$otchetnostQr['d14_book_pub_sx'],'d14_book_pub_sx','inputsvvodcodtable d14_book_pub_sx','onkeyup="numresultsKeystationSum(\'d14_book_pub_sx,s15_book_pub_sx\',\'book_publishing_sx\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
            ['input','text',$otchetnostQr['d14_book_pub_iskys'],'d14_book_pub_iskys','inputsvvodcodtable d14_book_pub_iskys','onkeyup="numresultsKeystationSum(\'d14_book_pub_iskys,s15_book_pub_iskys\',\'book_publishing_isky\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
            ['input','text',$otchetnostQr['d14_book_pub_hudozh'],'d14_book_pub_hudozh','inputsvvodcodtable d14_book_pub_hudozh','onkeyup="numresultsKeystationSum(\'d14_book_pub_hudozh,s15_book_pub_hudozh\',\'book_publishing_xyd\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
            ['input','text',$otchetnostQr['d14_book_pub_det'],'d14_book_pub_det','inputsvvodcodtable d14_book_pub_det','onkeyup="numresultsKeystationSum(\'d14_book_pub_det,s15_book_pub_det\',\'book_publishing_det\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
            ['input','text',$otchetnostQr['d14_book_pub_proch'],'d14_book_pub_proch','inputsvvodcodtable d14_book_pub_proch','onkeyup="numresultsKeystationSum(\'d14_book_pub_proch,s15_book_pub_proch\',\'book_publishing_proch\');numresultsKeystationSum(\'d14_book_pub_opl,d14_book_pub_enl,d14_book_pub_tex,d14_book_pub_sx,d14_book_pub_iskys,d14_book_pub_hudozh,d14_book_pub_det,d14_book_pub_proch\',\'d14_book_publishing_proch_itogo\');indacationKey(\'d14_book_publishing_itogo,d14_book_publishing_proch_itogo\');"'],
            ['input','text',prostomat($otchetnostQr['d14_book_pub_opl'].','.$otchetnostQr['d14_book_pub_enl'].','.$otchetnostQr['d14_book_pub_tex'].','.$otchetnostQr['d14_book_pub_sx'].','.$otchetnostQr['d14_book_pub_iskys'].','.$otchetnostQr['d14_book_pub_hudozh'].','.$otchetnostQr['d14_book_pub_det'].','.$otchetnostQr['d14_book_pub_proch']),'d14_book_publishing_proch_itogo','inputsvvodcodtable d14_book_publishing_proch_itogo','readonly'],
            ['input','text',$otchetnostQr['d14_events'],'d14_events','inputsvvodcodtable d14_events','onkeyup="numresultsKeystationSum(\'d14_events,s15_events\',\'events\');indacationKey(\'d14_events,d14_events_itogs\');"'],
            ['input','text',$otchetnostQr['d14_events_stationary'],'d14_events_stationary','inputsvvodcodtable d14_events_stationary','onkeyup="numresultsKeystationSum(\'d14_events_stationary,s15_events_stationary\',\'events_stationary\');numresultsKeystationSum(\'d14_events_stationary,d14_events_out_station,d14_events_sits\',\'d14_events_itogs\');indacationKey(\'d14_events,d14_events_itogs\');"'],
            ['input','text',$otchetnostQr['d14_events_out_station'],'d14_events_out_station','inputsvvodcodtable d14_events_out_station','onkeyup="numresultsKeystationSum(\'d14_events_out_station,s15_events_out_station\',\'events_out_station\');numresultsKeystationSum(\'d14_events_stationary,d14_events_out_station,d14_events_sits\',\'d14_events_itogs\');indacationKey(\'d14_events,d14_events_itogs\');"'],
            ['input','text',$otchetnostQr['d14_events_sits'],'d14_events_sits','inputsvvodcodtable d14_events_sits','onkeyup="numresultsKeystationSum(\'d14_events_sits,s15_events_sits\',\'events_sits\');numresultsKeystationSum(\'d14_events_stationary,d14_events_out_station,d14_events_sits\',\'d14_events_itogs\');indacationKey(\'d14_events,d14_events_itogs\');"'],
            ['input','text',prostomat($otchetnostQr['d14_events_stationary'].','.$otchetnostQr['d14_events_out_station'].','.$otchetnostQr['d14_events_sits']),'d14_events_itogs','inputsvvodcodtable d14_events_itogs','readonly'],
            ['input','text',$otchetnostQr['d14_vesites'],'d14_vesites','inputsvvodcodtable d14_vesites','onkeyup="numresultsKeystationSum(\'d14_vesites,s15_vesites\',\'visits2\');indacationKey(\'d14_vesites,d14_visits2_itogs\');"'],
            ['input','text',$otchetnostQr['d14_vesites_stationary'],'d14_vesites_stationary','inputsvvodcodtable d14_vesites_stationary','onkeyup="numresultsKeystationSum(\'d14_vesites_stationary,s15_vesites_stationary\',\'visits2_stationary\');numresultsKeystationSum(\'d14_vesites_stationary,d14_vesites_out_station\',\'d14_visits2_itogs\');indacationKey(\'d14_vesites,d14_visits2_itogs\');"'],
            ['input','text',$otchetnostQr['d14_vesites_out_station'],'d14_vesites_out_station','inputsvvodcodtable d14_vesites_out_station','onkeyup="numresultsKeystationSum(\'d14_vesites_out_station,s15_vesites_out_station\',\'visits2_out_station\');numresultsKeystationSum(\'d14_vesites_stationary,d14_vesites_out_station\',\'d14_visits2_itogs\');indacationKey(\'d14_vesites,d14_visits2_itogs\');"'],
            ['input','text',prostomat($otchetnostQr['d14_vesites_stationary'].','.$otchetnostQr['d14_vesites_out_station']),'d14_visits2_itogs','inputsvvodcodtable d14_visits2_itogs','readonly'],
            ['input','text',$otchetnostQr['d14_indiv_info'],'d14_indiv_info','inputsvvodcodtable d14_indiv_info','onkeyup="numresultsKeystationSum(\'d14_indiv_info,s15_indiv_info\',\'indiv_info\');"'],
            ['input','text',$otchetnostQr['d14_group_info'],'d14_group_info','inputsvvodcodtable d14_group_info','onkeyup="numresultsKeystationSum(\'d14_group_info,s15_group_info\',\'group_info\');"'],
        ]
        ?>
        <div class="card_body">
            <h4 class="card_title">ДО 14 ЛЕТ</h4>
            <div class="table_responsive">
                <table class="table user_table">
                        <?
                        $itos=0;
                        for($i=0; $i < count($arrtitile); $i++){
                            if($arrtitile[$i] == $arclassth[$itos][0]){
                                if($arrtitile[$i] == '<b>Итого</b>') $kk='table_summEy'; else $kk='';
                                echo'<tr class="tr_'.trim($arclassth[$itos][1]).' '.$kk.'">';
                                $itos++;
                            }else echo'<tr>';
                            echo'<th class="border_top_0 head_title_table">'.$arrtitile[$i].'</th>';
                            echo'<th class="border_top_0">';
                            if($arrbody[$i][0] == 'input'){
                                $typein=$arrbody[$i][1];
                                $body=$arrbody[$i][2];
                                $namein=$arrbody[$i][3];
                                $classin=$arrbody[$i][4];
                                $dopfunction=$arrbody[$i][5];
                                echo'<input type="'.$typein.'" value="'.$body.'" name="'.$namein.'" class="'.$classin.'" '.$dopfunction.'>';
                            }
                            echo'</th>';
                            echo'</tr>';
                        }
                        ?>
                </table>
            </div>
        </div>
        <?
        $arrtitile=[
            'Читатели','В т.ч.с 15-30','ГосУслуги','ЭДД','ЛитРес','Посещения','&nbsp&nbspСтационарно','&nbsp&nbspВнестационарно','&nbsp&nbspСайт',
            '<b>Итого</b>','Книговыдача','с 15 до 30 лет','Стационарно','Внестационарно','<b>Итого</b>','Периодич.','Книг','АВ','Электронные носители',
            '<b>Итого</b>','В т.ч. ЭДД','ЛитРес','опл','енл','тех','с\х','искус','худож','дет','проч','<b>Итого</b>','Мероприятий','Стационарно','Внестационарно',
            'Сайт','<b>Итого</b>','Посещения','Стационарно','Внестационарно','<b>Итого</b>','На индив. Инф','На группов инф'
        ];
        $arclassth=[
            ['Посещения','s15_visits'],
            ['<b>Итого</b>','s15_visits_sumsPresum'],
            ['Книговыдача','s15_book_pub'],
            ['<b>Итого</b>','s15_book_publishing_sumsPresum'],
            ['<b>Итого</b>','s15_book_publishing_itogo'],
            ['<b>Итого</b>','s15_book_publishing_proch_itogo'],
            ['Мероприятий','s15_events'],
            ['<b>Итого</b>','s15_events_itogs'],
            ['Посещения','s15_vesites'],
            ['<b>Итого</b>','s15_visits2_itogs']
        ];
        $arrbody=[
            ['input','text',$otchetnostQr['s15_readers'],'s15_readers','inputsvvodcodtable s15_readers','onkeyup="numresultsKeystationSum(\'d14_readers,s15_readers\',\'readers\');"'],
            ['input','text',$otchetnostQr['s15_vch_15_30'],'s15_vch_15_30','inputsvvodcodtable s15_vch_15_30','onkeyup="numresultsKeystationSum(\'d14_vch_15_30,s15_vch_15_30\',\'readers_vtch1530\');"'],
            ['input','text',$otchetnostQr['s15_state_uslugi'],'s15_state_uslugi','inputsvvodcodtable s15_state_uslugi','onkeyup="numresultsKeystationSum(\'d14_state_uslugi,s15_state_uslugi\',\'state_service\');"'],
            ['input','text',$otchetnostQr['s15_edd'],'s15_edd','inputsvvodcodtable s15_edd','onkeyup="numresultsKeystationSum(\'d14_edd,s15_edd\',\'edd\');"'],
            ['input','text',$otchetnostQr['s15_litres'],'s15_litres','inputsvvodcodtable s15_litres','onkeyup="numresultsKeystationSum(\'d14_litres,s15_litres\',\'litres\');"'],
            ['input','text',$otchetnostQr['s15_visits'],'s15_visits','inputsvvodcodtable s15_visits','onkeyup="numresultsKeystationSum(\'d14_visits,s15_visits\',\'visits\');indacationKey(\'s15_visits,s15_visits_sumsPresum\');"'],
            ['input','text',$otchetnostQr['s15_visits_stationary'],'s15_visits_stationary','inputsvvodcodtable s15_visits_stationary','onkeyup="numresultsKeystationSum(\'d14_visits_stationary,s15_visits_stationary\',\'visits_stationary\');numresultsKeystationSum(\'s15_visits_stationary,s15_visits_out_station,s15_visits_sits\',\'s15_visits_sumsPresum\');indacationKey(\'s15_visits,s15_visits_sumsPresum\');"'],
            ['input','text',$otchetnostQr['s15_visits_out_station'],'s15_visits_out_station','inputsvvodcodtable s15_visits_out_station','onkeyup="numresultsKeystationSum(\'d14_visits_out_station,s15_visits_out_station\',\'visits_out_station\');numresultsKeystationSum(\'s15_visits_stationary,s15_visits_out_station,s15_visits_sits\',\'s15_visits_sumsPresum\');indacationKey(\'s15_visits,s15_visits_sumsPresum\');"'],
            ['input','text',$otchetnostQr['s15_visits_sits'],'s15_visits_sits','inputsvvodcodtable s15_visits_sits','onkeyup="numresultsKeystationSum(\'d14_visits_sits,s15_visits_sits\',\'visits_site\');numresultsKeystationSum(\'s15_visits_stationary,s15_visits_out_station,s15_visits_sits\',\'s15_visits_sumsPresum\');indacationKey(\'s15_visits,s15_visits_sumsPresum\');"'],
            ['input','text',prostomat($otchetnostQr['s15_visits_stationary'].','.$otchetnostQr['s15_visits_out_station'].','.$otchetnostQr['s15_visits_sits']),'s15_visits_sumsPresum','inputsvvodcodtable s15_visits_sumsPresum','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub'],'s15_book_pub','inputsvvodcodtable s15_book_pub','onkeyup="numresultsKeystationSum(\'d14_book_pub,s15_book_pub\',\'book_publishing\');indacationKey(\'s15_book_pub,s15_book_publishing_sumsPresum\');"'],
            ['input','text',$otchetnostQr['s15_book_pub_15_30'],'s15_book_pub_15_30','inputsvvodcodtable s15_book_pub_15_30','onkeyup="numresultsKeystationSum(\'d14_book_pub_15_30,s15_book_pub_15_30\',\'book_publishing_15_30\');"'],
            ['input','text',$otchetnostQr['s15_book_pub_stationary'],'s15_book_pub_stationary','inputsvvodcodtable s15_book_pub_stationary','onkeyup="numresultsKeystationSum(\'d14_book_pub_stationary,s15_book_pub_stationary\',\'book_publishing_stationary\');numresultsKeystationSum(\'s15_book_pub_stationary,s15_book_pub_out_station\',\'s15_book_publishing_sumsPresum\');indacationKey(\'s15_book_pub,s15_book_publishing_sumsPresum\');"'],
            ['input','text',$otchetnostQr['s15_book_pub_out_station'],'s15_book_pub_out_station','inputsvvodcodtable s15_book_pub_out_station','onkeyup="numresultsKeystationSum(\'d14_book_pub_out_station,s15_book_pub_out_station\',\'book_publishing_outof_station\');numresultsKeystationSum(\'s15_book_pub_stationary,s15_book_pub_out_station\',\'s15_book_publishing_sumsPresum\');indacationKey(\'s15_book_pub,s15_book_publishing_sumsPresum\');"'],
            ['input','text',prostomat($otchetnostQr['s15_book_pub_stationary'].','.$otchetnostQr['s15_book_pub_out_station']),'s15_book_publishing_sumsPresum','inputsvvodcodtable s15_book_publishing_sumsPresum','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_periodically'],'s15_book_pub_periodically','inputsvvodcodtable s15_book_pub_periodically','onkeyup="numresultsKeystationSum(\'d14_book_pub_periodically,s15_book_pub_periodically\',\'book_publishing_periodically\');numresultsKeystationSum(\'s15_book_pub_periodically,s15_book_pub_books,s15_book_pub_books_av,s15_book_pub_electronic_media\',\'s15_book_publishing_itogo\');indacationKey(\'s15_book_publishing_sumsPresum,s15_book_publishing_itogo\');"'],
            ['input','text',$otchetnostQr['s15_book_pub_books'],'s15_book_pub_books','inputsvvodcodtable s15_book_pub_books','onkeyup="numresultsKeystationSum(\'d14_book_pub_books,s15_book_pub_books\',\'book_publishing_books\');numresultsKeystationSum(\'s15_book_pub_periodically,s15_book_pub_books,s15_book_pub_books_av,s15_book_pub_electronic_media\',\'s15_book_publishing_itogo\');indacationKey(\'s15_book_publishing_sumsPresum,s15_book_publishing_itogo\');"'],
            ['input','text',$otchetnostQr['s15_book_pub_books_av'],'s15_book_pub_books_av','inputsvvodcodtable s15_book_pub_books_av','onkeyup="numresultsKeystationSum(\'d14_book_pub_books_av,s15_book_pub_books_av\',\'book_publishing_av\');numresultsKeystationSum(\'s15_book_pub_periodically,s15_book_pub_books,s15_book_pub_books_av,s15_book_pub_electronic_media\',\'s15_book_publishing_itogo\');indacationKey(\'s15_book_publishing_sumsPresum,s15_book_publishing_itogo\');"'],
            ['input','text',$otchetnostQr['s15_book_pub_electronic_media'],'s15_book_pub_electronic_media','inputsvvodcodtable s15_book_pub_electronic_media','onkeyup="numresultsKeystationSum(\'d14_book_pub_electronic_media,s15_book_pub_electronic_media\',\'book_publishing_electronic_media\');numresultsKeystationSum(\'s15_book_pub_periodically,s15_book_pub_books,s15_book_pub_books_av,s15_book_pub_electronic_media\',\'s15_book_publishing_itogo\');indacationKey(\'s15_book_publishing_sumsPresum,s15_book_publishing_itogo\');"'],
            ['input','text',prostomat($otchetnostQr['s15_book_pub_periodically'].','.$otchetnostQr['s15_book_pub_books'].','.$otchetnostQr['s15_book_pub_books_av'].','.$otchetnostQr['s15_book_pub_electronic_media']),'s15_book_publishing_itogo','inputsvvodcodtable s15_book_publishing_itogo','readonly'],
            ['input','text',$otchetnostQr['s15_book_pub_edd'],'s15_book_pub_edd','inputsvvodcodtable s15_book_pub_edd','onkeyup="numresultsKeystationSum(\'d14_book_pub_edd,s15_book_pub_edd\',\'book_publishing_vtch_edd\');"'],
            ['input','text',$otchetnostQr['s15_book_pub_litres'],'s15_book_pub_litres','inputsvvodcodtable s15_book_pub_litres','onkeyup="numresultsKeystationSum(\'d14_book_pub_litres,s15_book_pub_litres\',\'book_publishing_litres\');"'],
            ['input','text',$otchetnostQr['s15_book_pub_opl'],'s15_book_pub_opl','inputsvvodcodtable s15_book_pub_opl','onkeyup="numresultsKeystationSum(\'d14_book_pub_opl,s15_book_pub_opl\',\'book_publishing_opl\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
            ['input','text',$otchetnostQr['s15_book_pub_enl'],'s15_book_pub_enl','inputsvvodcodtable s15_book_pub_enl','onkeyup="numresultsKeystationSum(\'d14_book_pub_enl,s15_book_pub_enl\',\'book_publishing_enl\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
            ['input','text',$otchetnostQr['s15_book_pub_tex'],'s15_book_pub_tex','inputsvvodcodtable s15_book_pub_tex','onkeyup="numresultsKeystationSum(\'d14_book_pub_tex,s15_book_pub_tex\',\'book_publishing_tex\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
            ['input','text',$otchetnostQr['s15_book_pub_sx'],'s15_book_pub_sx','inputsvvodcodtable s15_book_pub_sx','onkeyup="numresultsKeystationSum(\'d14_book_pub_sx,s15_book_pub_sx\',\'book_publishing_sx\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
            ['input','text',$otchetnostQr['s15_book_pub_iskys'],'s15_book_pub_iskys','inputsvvodcodtable s15_book_pub_iskys','onkeyup="numresultsKeystationSum(\'d14_book_pub_iskys,s15_book_pub_iskys\',\'book_publishing_isky\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
            ['input','text',$otchetnostQr['s15_book_pub_hudozh'],'s15_book_pub_hudozh','inputsvvodcodtable s15_book_pub_hudozh','onkeyup="numresultsKeystationSum(\'d14_book_pub_hudozh,s15_book_pub_hudozh\',\'book_publishing_xyd\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
            ['input','text',$otchetnostQr['s15_book_pub_det'],'s15_book_pub_det','inputsvvodcodtable s15_book_pub_det','onkeyup="numresultsKeystationSum(\'d14_book_pub_det,s15_book_pub_det\',\'book_publishing_det\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
            ['input','text',$otchetnostQr['s15_book_pub_proch'],'s15_book_pub_proch','inputsvvodcodtable s15_book_pub_proch','onkeyup="numresultsKeystationSum(\'d14_book_pub_proch,s15_book_pub_proch\',\'book_publishing_proch\');numresultsKeystationSum(\'s15_book_pub_opl,s15_book_pub_enl,s15_book_pub_tex,s15_book_pub_sx,s15_book_pub_iskys,s15_book_pub_hudozh,s15_book_pub_det,s15_book_pub_proch\',\'s15_book_publishing_proch_itogo\');indacationKey(\'s15_book_publishing_itogo,s15_book_publishing_proch_itogo\');"'],
            ['input','text',prostomat($otchetnostQr['s15_book_pub_opl'].','.$otchetnostQr['s15_book_pub_enl'].','.$otchetnostQr['s15_book_pub_tex'].','.$otchetnostQr['s15_book_pub_sx'].','.$otchetnostQr['s15_book_pub_iskys'].','.$otchetnostQr['s15_book_pub_hudozh'].','.$otchetnostQr['s15_book_pub_det'].','.$otchetnostQr['s15_book_pub_proch']),'s15_book_publishing_proch_itogo','inputsvvodcodtable s15_book_publishing_proch_itogo','readonly'],
            ['input','text',$otchetnostQr['s15_events'],'s15_events','inputsvvodcodtable s15_events','onkeyup="numresultsKeystationSum(\'d14_events,s15_events\',\'events\');indacationKey(\'s15_events,s15_events_itogs\');"'],
            ['input','text',$otchetnostQr['s15_events_stationary'],'s15_events_stationary','inputsvvodcodtable s15_events_stationary','onkeyup="numresultsKeystationSum(\'d14_events_stationary,s15_events_stationary\',\'events_stationary\');numresultsKeystationSum(\'s15_events_stationary,s15_events_out_station,s15_events_sits\',\'s15_events_itogs\');indacationKey(\'s15_events,s15_events_itogs\');"'],
            ['input','text',$otchetnostQr['s15_events_out_station'],'s15_events_out_station','inputsvvodcodtable s15_events_out_station','onkeyup="numresultsKeystationSum(\'d14_events_out_station,s15_events_out_station\',\'events_out_station\');numresultsKeystationSum(\'s15_events_stationary,s15_events_out_station,s15_events_sits\',\'s15_events_itogs\');indacationKey(\'s15_events,s15_events_itogs\');"'],
            ['input','text',$otchetnostQr['s15_events_sits'],'s15_events_sits','inputsvvodcodtable s15_events_sits','onkeyup="numresultsKeystationSum(\'d14_events_sits,s15_events_sits\',\'events_sits\');numresultsKeystationSum(\'s15_events_stationary,s15_events_out_station,s15_events_sits\',\'s15_events_itogs\');indacationKey(\'s15_events,s15_events_itogs\');"'],
            ['input','text',prostomat($otchetnostQr['s15_events_stationary'].','.$otchetnostQr['s15_events_out_station'].','.$otchetnostQr['s15_events_sits']),'s15_events_itogs','inputsvvodcodtable s15_events_itogs','readonly'],
            ['input','text',$otchetnostQr['s15_vesites'],'s15_vesites','inputsvvodcodtable s15_vesites','onkeyup="numresultsKeystationSum(\'d14_vesites,s15_vesites\',\'visits2\');indacationKey(\'s15_vesites,s15_visits2_itogs\');"'],
            ['input','text',$otchetnostQr['s15_vesites_stationary'],'s15_vesites_stationary','inputsvvodcodtable s15_vesites_stationary','onkeyup="numresultsKeystationSum(\'d14_vesites_stationary,s15_vesites_stationary\',\'visits2_stationary\');numresultsKeystationSum(\'s15_vesites_stationary,s15_vesites_out_station\',\'s15_visits2_itogs\');indacationKey(\'s15_vesites,s15_visits2_itogs\');"'],
            ['input','text',$otchetnostQr['s15_vesites_out_station'],'s15_vesites_out_station','inputsvvodcodtable s15_vesites_out_station','onkeyup="numresultsKeystationSum(\'d14_vesites_out_station,s15_vesites_out_station\',\'visits2_out_station\');numresultsKeystationSum(\'s15_vesites_stationary,s15_vesites_out_station\',\'s15_visits2_itogs\');indacationKey(\'s15_vesites,s15_visits2_itogs\');"'],
            ['input','text',prostomat($otchetnostQr['s15_vesites_stationary'].','.$otchetnostQr['s15_vesites_out_station']),'s15_visits2_itogs','inputsvvodcodtable s15_visits2_itogs','readonly'],
            ['input','text',$otchetnostQr['s15_indiv_info'],'s15_indiv_info','inputsvvodcodtable s15_indiv_info','onkeyup="numresultsKeystationSum(\'d14_indiv_info,s15_indiv_info\',\'indiv_info\');"'],
            ['input','text',$otchetnostQr['s15_group_info'],'s15_group_info','inputsvvodcodtable s15_group_info','onkeyup="numresultsKeystationSum(\'d14_group_info,s15_group_info\',\'group_info\');"'],
        ]
        ?>
        <div class="card_body">
            <h4 class="card_title">С 15 лет</h4>
            <div class="table_responsive">
                <table class="table user_table">
                        <?
                        $itos=0;
                        for($i=0; $i < count($arrtitile); $i++){
                            if($arrtitile[$i] == $arclassth[$itos][0]){
                                if($arrtitile[$i] == '<b>Итого</b>') $kk='table_summEy'; else $kk='';
                                echo'<tr class="tr_'.trim($arclassth[$itos][1]).' '.$kk.'">';
                                $itos++;
                            }else echo'<tr>';
                            echo'<th class="border_top_0 head_title_table">'.$arrtitile[$i].'</th>';
                            echo'<th class="border_top_0">';
                            if($arrbody[$i][0] == 'input'){
                                $typein=$arrbody[$i][1];
                                $body=$arrbody[$i][2];
                                $namein=$arrbody[$i][3];
                                $classin=$arrbody[$i][4];
                                $dopfunction=$arrbody[$i][5];
                                echo'<input type="'.$typein.'" value="'.$body.'" name="'.$namein.'" class="'.$classin.'" '.$dopfunction.'>';
                            }
                            echo'</th>';
                            echo'</tr>';
                        }
                        ?>
                </table>
            </div>
        </div>
        <?
        $arrtitile=[
            'Читатели','В т.ч.с 15-30','ГосУслуги','ЭДД','ЛитРес','Посещения','&nbsp&nbspСтационарно','&nbsp&nbspВнестационарно','&nbsp&nbspСайт',
            '<b>Итого</b>','Книговыдача','с 15 до 30 лет','Стационарно','Внестационарно','<b>Итого</b>','Периодич.','Книг','АВ','Электронные носители',
            '<b>Итого</b>','В т.ч. ЭДД','ЛитРес','опл','енл','тех','с\х','иску','худ','дет','проч','<b>Итого</b>','Мероприятий','Стационарно','Внестационарно',
            'Сайт','<b>Итого</b>','Посещения','Стационарно','Внестационарно','<b>Итого</b>','На индив. Инф','На группов инф'
        ];
        $arclassth=[
            ['Посещения','visits'],
            ['<b>Итого</b>','visits_sumsPresum'],
            ['Книговыдача','book_publishing'],
            ['<b>Итого</b>','book_publishing_sumsPresum'],
            ['<b>Итого</b>','book_publishing_itogo'],
            ['<b>Итого</b>','book_publishing_proch_itogo'],
            ['Мероприятий','events'],
            ['<b>Итого</b>','events_itogs'],
            ['Посещения','visits2'],
            ['<b>Итого</b>','visits2_itogs']
        ];
        $arrbody=[
            ['input','text',$otchetnostQr['readers'],'readers','inputsvvodcodtable readers','readonly'],
            ['input','text',$otchetnostQr['readers_15_30'],'readers_vtch1530','inputsvvodcodtable readers_vtch1530','readonly'],
            ['input','text',$otchetnostQr['state_service'],'state_service','inputsvvodcodtable state_service','readonly'],
            ['input','text',$otchetnostQr['edd'],'edd','inputsvvodcodtable edd','readonly'],
            ['input','text',$otchetnostQr['litres'],'litres','inputsvvodcodtable litres','readonly'],
            ['input','text',$otchetnostQr['visits'],'visits','inputsvvodcodtable visits','onkeyup="indacationKey(\'visits,visits_sumsPresum\')"readonly'],
            ['input','text',$otchetnostQr['visits_stationary'],'visits_stationary','inputsvvodcodtable visits_stationary','onkeyup="numresultsKeystationSum(\'visits_stationary,visits_out_station,visits_site\',\'visits_sumsPresum\');indacationKey(\'visits,visits_sumsPresum\');"readonly'],
            ['input','text',$otchetnostQr['visits_out_station'],'visits_out_station','inputsvvodcodtable visits_out_station','onkeyup="numresultsKeystationSum(\'visits_stationary,visits_out_station,visits_site\',\'visits_sumsPresum\');indacationKey(\'visits,visits_sumsPresum\');"readonly'],
            ['input','text',$otchetnostQr['visits_site'],'visits_site','inputsvvodcodtable visits_site','onkeyup="numresultsKeystationSum(\'visits_stationary,visits_out_station,visits_site\',\'visits_sumsPresum\');indacationKey(\'visits,visits_sumsPresum\');"readonly'],
            ['input','text',prostomat($otchetnostQr['visits_stationary'].','.$otchetnostQr['visits_out_station'].','.$otchetnostQr['visits_site']),'visits_sumsPresum','inputsvvodcodtable visits_sumsPresum','readonly'],
            ['input','text',$otchetnostQr['book_publishing'],'book_publishing','inputsvvodcodtable book_publishing','onkeyup="indacationKey(\'book_publishing,book_publishing_sumsPresum\')"readonly'],
            ['input','text',$otchetnostQr['book_publishing_15_30'],'book_publishing_15_30','inputsvvodcodtable book_publishing_15_30','readonly'],
            ['input','text',$otchetnostQr['book_publishing_stationary'],'book_publishing_stationary','inputsvvodcodtable book_publishing_stationary','onkeyup="numresultsKeystationSum(\'book_publishing_stationary,book_publishing_outof_station\',\'book_publishing_sumsPresum\');indacationKey(\'book_publishing,book_publishing_sumsPresum\');"readonly'],
            ['input','text',$otchetnostQr['book_publishing_outof_station'],'book_publishing_outof_station','inputsvvodcodtable book_publishing_outof_station','onkeyup="numresultsKeystationSum(\'book_publishing_stationary,book_publishing_outof_station\',\'book_publishing_sumsPresum\');indacationKey(\'book_publishing,book_publishing_sumsPresum\');"readonly'],
            ['input','text',prostomat($otchetnostQr['book_publishing_stationary'].','.$otchetnostQr['book_publishing_outof_station']),'book_publishing_sumsPresum','inputsvvodcodtable book_publishing_sumsPresum','readonly'],
            ['input','text',$otchetnostQr['book_publishing_periodically'],'book_publishing_periodically','inputsvvodcodtable book_publishing_periodically','onkeyup="numresultsKeystationSum(\'book_publishing_periodically,book_publishing_books,book_publishing_av,book_publishing_electronic_media\',\'book_publishing_itogo\');indacationKey(\'book_publishing_sumsPresum,book_publishing_itogo\');"readonly'],
            ['input','text',$otchetnostQr['book_publishing_books'],'book_publishing_books','inputsvvodcodtable book_publishing_books','onkeyup="numresultsKeystationSum(\'book_publishing_periodically,book_publishing_books,book_publishing_av,book_publishing_electronic_media\',\'book_publishing_itogo\');indacationKey(\'book_publishing_sumsPresum,book_publishing_itogo\');"readonly'],
            ['input','text',$otchetnostQr['book_publishing_av'],'book_publishing_av','inputsvvodcodtable book_publishing_av','onkeyup="numresultsKeystationSum(\'book_publishing_periodically,book_publishing_books,book_publishing_av,book_publishing_electronic_media\',\'book_publishing_itogo\');indacationKey(\'book_publishing_sumsPresum,book_publishing_itogo\');"readonly'],
            ['input','text',$otchetnostQr['book_publishing_electronic_media'],'book_publishing_electronic_media','inputsvvodcodtable book_publishing_electronic_media','onkeyup="numresultsKeystationSum(\'book_publishing_periodically,book_publishing_books,book_publishing_av,book_publishing_electronic_media\',\'book_publishing_itogo\');indacationKey(\'book_publishing_sumsPresum,book_publishing_itogo\');"readonly'],
            ['input','text',prostomat($otchetnostQr['book_publishing_periodically'].','.$otchetnostQr['book_publishing_books'].','.$otchetnostQr['book_publishing_av'].','.$otchetnostQr['book_publishing_electronic_media']),'book_publishing_itogo','inputsvvodcodtable book_publishing_itogo','readonly'],
            ['input','text',$otchetnostQr['book_publishing_vtch_edd'],'book_publishing_vtch_edd','inputsvvodcodtable book_publishing_vtch_edd','readonly'],
            ['input','text',$otchetnostQr['book_publishing_litres'],'book_publishing_litres','inputsvvodcodtable book_publishing_litres','readonly'],
            ['input','text',$otchetnostQr['book_publishing_opl'],'book_publishing_opl','inputsvvodcodtable book_publishing_opl','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
            ['input','text',$otchetnostQr['book_publishing_enl'],'book_publishing_enl','inputsvvodcodtable book_publishing_enl','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
            ['input','text',$otchetnostQr['book_publishing_tex'],'book_publishing_tex','inputsvvodcodtable book_publishing_tex','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
            ['input','text',$otchetnostQr['book_publishing_sx'],'book_publishing_sx','inputsvvodcodtable book_publishing_sx','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
            ['input','text',$otchetnostQr['book_publishing_isky'],'book_publishing_isky','inputsvvodcodtable book_publishing_isky','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
            ['input','text',$otchetnostQr['book_publishing_xyd'],'book_publishing_xyd','inputsvvodcodtable book_publishing_xyd','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
            ['input','text',$otchetnostQr['book_publishing_det'],'book_publishing_det','inputsvvodcodtable book_publishing_det','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
            ['input','text',$otchetnostQr['book_publishing_proch'],'book_publishing_proch','inputsvvodcodtable book_publishing_proch','onkeyup="numresultsKeystationSum(\'book_publishing_opl,book_publishing_enl,book_publishing_tex,book_publishing_sx,book_publishing_isky,book_publishing_xyd,book_publishing_det,book_publishing_proch\',\'book_publishing_proch_itogo\');indacationKey(\'book_publishing_itogo,book_publishing_proch_itogo\');"readonly'],
            ['input','text',prostomat($otchetnostQr['book_publishing_opl'].','.$otchetnostQr['book_publishing_enl'].','.$otchetnostQr['book_publishing_tex'].','.$otchetnostQr['book_publishing_sx'].','.$otchetnostQr['book_publishing_isky'].','.$otchetnostQr['book_publishing_xyd'].','.$otchetnostQr['book_publishing_det'].','.$otchetnostQr['book_publishing_proch']),'book_publishing_proch_itogo','inputsvvodcodtable book_publishing_proch_itogo','readonly'],
            ['input','text',$otchetnostQr['events'],'events','inputsvvodcodtable events','onkeyup="indacationKey(\'events,events_itogs\')"readonly'],
            ['input','text',$otchetnostQr['events_stationary'],'events_stationary','inputsvvodcodtable events_stationary','onkeyup="numresultsKeystationSum(\'events_stationary,events_out_station,events_sits\',\'events_itogs\');indacationKey(\'events,events_itogs\');"readonly'],
            ['input','text',$otchetnostQr['events_out_station'],'events_out_station','inputsvvodcodtable events_out_station','onkeyup="numresultsKeystationSum(\'events_stationary,events_out_station,events_sits\',\'events_itogs\');indacationKey(\'events,events_itogs\');"readonly'],
            ['input','text',$otchetnostQr['events_sits'],'events_sits','inputsvvodcodtable events_sits','onkeyup="numresultsKeystationSum(\'events_stationary,events_out_station,events_sits\',\'events_itogs\');indacationKey(\'events,events_itogs\');"readonly'],
            ['input','text',prostomat($otchetnostQr['events_stationary'].','.$otchetnostQr['events_out_station'].','.$otchetnostQr['events_sits']),'events_itogs','inputsvvodcodtable events_itogs','readonly'],
            ['input','text',$otchetnostQr['visits2'],'visits2','inputsvvodcodtable visits2','onkeyup="indacationKey(\'visits2,visits2_itogs\')"readonly'],
            ['input','text',$otchetnostQr['visits2_stationary'],'visits2_stationary','inputsvvodcodtable visits2_stationary','onkeyup="numresultsKeystationSum(\'visits2_stationary,visits2_out_station\',\'visits2_itogs\');indacationKey(\'visits2,visits2_itogs\');"readonly'],
            ['input','text',$otchetnostQr['visits2_out_station'],'visits2_out_station','inputsvvodcodtable visits2_out_station','onkeyup="numresultsKeystationSum(\'visits2_stationary,visits2_out_station\',\'visits2_itogs\');indacationKey(\'visits2,visits2_itogs\');"readonly'],
            ['input','text',prostomat($otchetnostQr['visits2_stationary'].','.$otchetnostQr['visits2_out_station']),'visits2_itogs','inputsvvodcodtable visits2_itogs','readonly'],
            ['input','text',$otchetnostQr['indiv_info'],'indiv_info','inputsvvodcodtable indiv_info','readonly'],
            ['input','text',$otchetnostQr['group_info'],'group_info','inputsvvodcodtable group_info','readonly'],
        ]
        ?>
        <div class="card_body">
            <h4 class="card_title">Всего</h4>
            <div class="table_responsive">
                <table class="table user_table">
                        <?
                        $itos=0;
                        for($i=0; $i < count($arrtitile); $i++){
                            if($arrtitile[$i] == $arclassth[$itos][0]){
                                if($arrtitile[$i] == '<b>Итого</b>') $kk='table_summEy'; else $kk='';
                                echo'<tr class="tr_'.trim($arclassth[$itos][1]).' '.$kk.'">';
                                $itos++;
                            }else echo'<tr>';
                            echo'<th class="border_top_0 head_title_table">'.$arrtitile[$i].'</th>';
                            echo'<th class="border_top_0">';
                            if($arrbody[$i][0] == 'input'){
                                $typein=$arrbody[$i][1];
                                $body=$arrbody[$i][2];
                                $namein=$arrbody[$i][3];
                                $classin=$arrbody[$i][4];
                                $dopfunction=$arrbody[$i][5];
                                echo'<input type="'.$typein.'" value="'.$body.'" name="'.$namein.'" class="'.$classin.'" '.$dopfunction.'>';
                            }
                            echo'</th>';
                            echo'</tr>';
                        }
                        ?>
                </table>
                <div style="text-align:right;"><button class="buttonStyle" id="send_otchet_cdo" onclick="send_save_otche_forms1()">Сохранить</button></div>
            </div>
        </div>
    </div>
</div>
</div>
<?}else if($section_page == 'generate-all' && $dostyp_pages == 'access'){
echo'<div style="text-align:center;"><button class="buttonStyle" id="send_otchet_cdo" onclick="download_result_key_indicators()">Сгенерировать и скачать Excel документ</button></div>';
}else{
//Генератися отчетов пользователя
    $userifnar = querydb("SELECT * FROM `administatrors_user` WHERE `login` = '".chektextST($LoginUser)."' AND `hashauth` = '".chektextST($passUser)."'");
    $otchetnostQr = querydb("SELECT id_otchet,id_author,date FROM `key_indicators` WHERE `id_author` = '".$userifnar['id']."' ORDER BY id_otchet DESC",'noArray');
    ?>
    <div class="alert_warning_cod"><div class="wranningIco"></div>Данный раздел запущен в Тестовом режиме</div>
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
    while($otchetnostArr = mysqli_fetch_assoc($otchetnostQr)){
    $infuserID = querydb("SELECT * FROM `administatrors_user` WHERE `id` = '".$otchetnostArr['id_author']."'");
    echo'<tr>';
    echo'<th>'.$infuserID['biblios'].'</th>';
    echo'<th>'.$otchetnostArr['date'].'</th>';
    echo'<th><a href="/key-indicators'.$otchetnostArr['id_otchet'].'">Посмотреть</a></th>';
    echo'<th><a href="/edit-key-indicators'.$otchetnostArr['id_otchet'].'">Редактировать</a></th>';
    echo'<th><a href="#" onclick="download_key_indicators('.$otchetnostArr['id_otchet'].');return false;">Скачать</a></th>';
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
<?}?>