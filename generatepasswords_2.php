<?php
$respass='';
if (isset($_POST['done'])) {
   $password = $_POST['sampass'];
   $sol1 = "sj7kasj2";
   $sol2 = "ldkf!ss2";
   $respass = md5(md5($sol1.$password.$sol2));
}
    
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <title>генератор</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="sampass">
        <input type="submit" value="начать" name="done">
    </form>
    <div class="title">MD 5 пароль будет такой</div><div class="otvet"><?=$respass;?></div>
</body>
</html>