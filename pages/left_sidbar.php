<?
$workcod='';$kayindicators='';
if($get_page == 'work-cod')$workcod='active';
if($get_page == 'key-indicators')$kayindicators='active';
if($get_page == 'cultural-events')$culturalevents='active';
?>
<aside class="left_sidebar">
            <!--Прокручивающийся сайтбар-->
            <div class="scroll_sidebar">
                <nav class="sidebar_nav">
                    <ul class="sidebarnav">
                        <li class="sidebar_item">
                            <a href="/work-cod" class="sidbar_link waves-effect <?=$workcod?>">
                                <i class="mdi mdi-calendar-blank"></i>
                                <span class="hide_menu">О работе центра общественного доступа</span>
                            </a>
                            <!--<ul class="sidbar_podmenu" style="display:none;">
                                <a href="#" class="link_sidbar_podmenu active"><li class="item_podmenu">1. Инструктаж</li></a>
                            </ul>-->
                        </li>
                    </ul>
                    <ul class="sidebarnav">
                        <li class="sidebar_item">
                            <a href="/key-indicators" class="sidbar_link waves-effect <?=$kayindicators?>">
                                <i class="mdi mdi-book"></i>
                                <span class="hide_menu">Основные показатели форма №1</span>
                            </a>
                            <!--<ul class="sidbar_podmenu" style="display:none;">
                                <a href="#" class="link_sidbar_podmenu active"><li class="item_podmenu">1. Инструктаж</li></a>
                            </ul>-->
                        </li>
                    </ul>
                    <ul class="sidebarnav">
                        <li class="sidebar_item">
                            <a href="/cultural-events" class="sidbar_link waves-effect <?=$culturalevents?>">
                                <i class="mdi mdi-calendar-clock"></i>
                                <span class="hide_menu">Число посещений культурных мероприятий</span>
                            </a>
                            <!--<ul class="sidbar_podmenu" style="display:none;">
                                <a href="#" class="link_sidbar_podmenu active"><li class="item_podmenu">1. Инструктаж</li></a>
                            </ul>-->
                        </li>
                    </ul>
                </nav>
            </div>
            <!--подвал сайтбара-->
            <div class="sidebar_footer">
                <div class="row">
                    <div class="link_wrap">
                        <a onclick="exituser()" class="link"><i class="mdi mdi-power"></i></a>
                    </div>
                </div>
            </div>
        </aside>