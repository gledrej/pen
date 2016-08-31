<?php
$name = stripslashes(htmlspecialchars($_POST['name']));
$phone = stripslashes(htmlspecialchars($_POST['telephone']));

$blue = stripslashes(htmlspecialchars($_POST['blue']));
$red = stripslashes(htmlspecialchars($_POST['red']));
$vinous = stripslashes(htmlspecialchars($_POST['vinous']));
$orange = stripslashes(htmlspecialchars($_POST['orange']));
$green = stripslashes(htmlspecialchars($_POST['green']));
$yellow = stripslashes(htmlspecialchars($_POST['yellow']));
$fff = stripslashes(htmlspecialchars($_POST['fff']));

if($_GET['product_id']){
    $product_id = $_GET['product_id'];
}else{
    $product_id = $_POST['product_id'];
}
if(empty($name) || empty($phone)){
    echo '<h1 style="color:red;">Пожалуйста заполните все поля</h1>';
    echo '<meta http-equiv="refresh" content="2; url=http://'.$_SERVER['SERVER_NAME'].'">';
}
else{
    $subject = 'Заказ товара - Часы)'; // заголовок письмя
    $addressat = "otdyh.artcreative@gmail.com, art-creative@mail.ua"; // Ваш Электронный адрес
    $success_url = './ok.php?name='.$_POST['name'].'&phone='.$_POST['tel'].'&blue='.$_POST['blue'].'&red='.$_POST['red'].'&vinous='.$_POST['vinous'].'&orange='.$_POST['orange'].'&green='.$_POST['green'].'&yellow='.$_POST['yellow'].'&fff='.$_POST['fff'].'&time='.$_POST['Время_звонка'].'';
    $message = "ФИО: {$name}\nКонтактный телефон: {$phone}\nСиний: {$blue}\nКрасный: {$red}\nБордовый: {$vinous}\nОранжевый: {$orange}\nЗеленый: {$green}\nЖелтый: {$yellow}\nЧерный: {$fff}\nТовар: {$product_id}";
    $verify = mail($addressat,$subject,$message,"Content-type:text/plain;charset=utf-8\r\n");
    if ($verify == 'true'){
        header('Location: '.$success_url);
        echo '<h1 style="color:green;">Поздравляем! Ваш заказ принят!</h1>';
        exit;
    }
    else
    {
        echo '<h1 style="color:red;">Произошла ошибка!</h1>';
    }
}
?>