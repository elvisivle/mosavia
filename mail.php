<?php

if ($_POST['name'] == ""){
    exit();
}

$to  = "mos-avia-cargo@mail.ru" ; 


$subject = "Заявка с MosaviaCargo"; 

$message = ' 
<html> 
    <head> 
        <title>Заявка</title> 
    </head> 
    <body> 
        
        <h2>Привет, Юль</h2>
        <p>Тут, какой-то хрен, отправил тебе заявку с сайта mosaviacargo.ru</p>
        <div>
            <strong>Имя:</strong>
                 <em>'.$_POST['name'].'</em>
        </div>
        <div>
            <strong>Электронная почта:</strong>
                 <em>'.$_POST['email'].'</em>
        </div>
        <div>
            <strong>Город:</strong>
                 <em>'.$_POST['city'].'</em>
        </div>
        <div>
            <strong>Сообщение:</strong>
                 <em>'.$_POST['message'].'</em>
        </div>
        <p>
            <em>С уважением, <br /> твой робот Mosaviacargo</em>
        </p>
    </body> 
</html>'; 

$headers  = "Content-type: text/html; charset=UTF-8 \r\n"; 
$headers .= "From: robot@mosaviacargo.ru\r\n"; 

if (mail($to, $subject, $message, $headers)){
    echo true;
} else {
    echo false;
}
