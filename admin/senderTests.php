<?php 
    echo "<pre>";
        print_r($_POST);
    echo "<pre>";
    
    
    if((isset($_POST['message']) && $_POST['email'] != "")){ //Проверка отправилось ли наше поля name и не пустые ли они
        
        $to = $_POST['message']; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = 'Quantest reset'; //Загаловок сообщения
        $message = $_POST['email']; //Текст нащего сообщения можно использовать HTML теги
        
        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: Отправитель <clipclock08@gmail>\r\n"; //Наименование и почта отправителя
        
        mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
}

?>


Here i will make a send result to user and change status of test with pending to Download or Print