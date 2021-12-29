<?php
    session_start();

    require_once('connect.php');
    
    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    
    if ($password === $password_confirm){
        $patch = 'img/' . time() . $_FILES['avatar']['name'];
        move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $patch);
        header("Location: ../reg.php");
        $password = md5($password);
        $add_user = $connect->prepare("INSERT INTO `registration` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$patch')");
        $add_user->execute();
        $_SESSION['message'] = "Регистрация прошла успешно!";
        header('Location: ../singin.php');
    }  
    else{
        $_SESSION['message'] = 'Пароли не совпадают!';
        header('Location: ../reg.php'); 
    }   