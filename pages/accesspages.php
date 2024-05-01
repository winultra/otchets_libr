<?
$LoginUser = chektextST($_COOKIE['login_user']);
$passUser = chektextST($_COOKIE['pass_user']);
$INFOUSER = querydb("SELECT * FROM `administatrors_user` WHERE `login` = '".$LoginUser."' AND `hashauth` = '".$passUser."'");
$get_page = $_GET['page'];
$section_page = $_GET['section'];
$dostyp_pages = queryaccesspages($get_page,$INFOUSER['PravaDostups']);
?>