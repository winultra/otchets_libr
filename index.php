<?php
include_once('local_variables.php');//Подключение локальных глобальных переменных
include_once($DIR.'/core/chekauthuser.php');

$LoginUser = $_COOKIE['login_user'];
$passUser = $_COOKIE['pass_user'];

$arrcatpages = explode('/', $_SERVER['REQUEST_URI']);

$razdel_pages = $arrcatpages[1];

include_once('pages/title_generate.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title><?=$title?></title>
    <link href="/img/favicon.ico" rel="shortcut icon" sizes="16x16" type="image/vnd.microsoft.icon">
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/style.css?v=2" rel="stylesheet">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/core.js"></script>
</head>
<body>
    <!--Прелоудер-->
    <div class="preloader">
        <div class="lds_ripple">
            <div class="lds_pos"></div>
            <div class="lds_pos"></div>
        </div>
    </div>
    <?
    //Временный редирект...
    if($_SERVER['SERVER_NAME'] == '193.238.134.194'){
        ?>
            <div class="critical_error">
                <div class="header_critical_error">Важное сообщение</div>
                <div class="conetnt_critical_error">
                    Наша программа переехала на новый более удобный адрес <span style="color:#dd4111;">http://corp.sovlib.ru</span>,<br>
                    Нажмите на кнопку ниже, чтобы перейти по новому адресу.
                    <br><br>
                    <a class="link_btn" href="http://corp.sovlib.ru">ПЕРЕЙТИ</a>
                </div>
            </div>
        <?
        die;
    }
    if(!isset($LoginUser) && !isset($passUser)){
        include('pages/authuser.php');
        echo"</body></html>";
        die;
    }
    //Подключение модального опроса для всех пользователей
    include_once('pages/modal_message.php');
    ?>
    <!--основная обертка-->
    <div class="main_wrapper">
        <!--Верхнее меню-->
        <? include_once('pages/topbar.php'); ?>
        <? include_once('pages/left_sidbar.php'); ?>
        <!-- Начало PageWrapper -->
        <div class="page_wrapper">
            <!--Бредкамп-->
            <?if($get_page == ''){?><div class="container_fluid"><div class="row"><div class="col_sm_12"><div class="card" style="padding:15px;font-size:25px;text-align:center;">Выберите раздел для работы</div></div></div></div><?}?>
            <?if($get_page == 'work-cod'){
                include_once('pages/breadcump.php');
                echo '<div class="container_fluid">';
                    include_once('pages/cod_otchetnost.php');
                echo'</div>';
            }
            if($get_page == 'key-indicators'){
                include_once('pages/breadcump.php');
                echo '<div class="container_fluid">';
                    include_once('pages/key_indicators.php');
                echo'</div>';
            }
            if($get_page == 'cultural-events'){
                include_once('pages/breadcump.php');
                echo '<div class="container_fluid">';
                    include_once('pages/cultural_events.php');
                echo'</div>';
            }
            ?>
            <span class="version_panel"><span>ver.</span> 0.0.24</span>
        </div>
    </div>
</body>
</html>