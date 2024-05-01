<?php
$page_titile="";$arrBredcummenu=[];
if($get_page == 'work-cod'){
    $page_titile = "Отчет о работе центра общественного доступа";
    $arrBredcummenu[]=generateBredcummenu(['Добавить отчет'],['/add-work-cod']);
    $arrBredcummenu[]=generateBredcummenu(['Мои отчеты'],['/work-cod']);
    if($dostyp_pages == 'access'){
        //Если есть права администратора
        $arrBredcummenu[]=generateBredcummenu(['Посмотреть все отчеты'],['/list-otchets-work-cod']);
        $arrBredcummenu[]=generateBredcummenu(['Сгенерировать общий отчет'],['generate-all-otchet']);
    }
}
if($get_page == 'key-indicators'){
    $page_titile = "Основные показатели форма №1";
    $arrBredcummenu[]=generateBredcummenu(['Добавить отчет'],['/add-key-indicators']);
    $arrBredcummenu[]=generateBredcummenu(['Мои отчеты'],['/key-indicators']);
    if($dostyp_pages == 'access'){
        //Если есть права администратора
        $arrBredcummenu[]=generateBredcummenu(['Посмотреть все отчеты'],['/list-key-indicators']);
        $arrBredcummenu[]=generateBredcummenu(['Сгенерировать общий отчет'],['generate-all-key-indicators']);
    }
}
if($get_page == 'cultural-events'){
    $page_titile = "Целевой показатель \"Число посещений культурных мероприятий\"";
    $arrBredcummenu[]=generateBredcummenu(['Добавить отчет'],['/add-cultural-events']);
    $arrBredcummenu[]=generateBredcummenu(['Мои отчеты'],['/cultural-events']);
    if($dostyp_pages == 'access'){
        //Если есть права администратора
        $arrBredcummenu[]=generateBredcummenu(['Посмотреть все отчеты'],['/list-cultural-events']);
        $arrBredcummenu[]=generateBredcummenu(['Сгенерировать общий отчет'],['generate-all-cultural-events']);
    }
}
?>
<div class="page_breadcrumb">
    <div class="align_itms row">
        <div class="alig_self">
            <h3 class="page_title"><?=$page_titile?></h3>
        </div>
        <div class="bredacummenu">
        <?
        for($i=0; $i < count($arrBredcummenu); $i++){
            echo '<a href="'.$arrBredcummenu[$i][0][1].'"><div class="itme_bredcaumomenu">'.$arrBredcummenu[$i][0][0].'</div></a>';
        }
        ?>
        </div>
    </div>
</div>