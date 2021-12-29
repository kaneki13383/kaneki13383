<?php session_start();

if ($_SESSION['user']){
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reg.css">
    <title>Регистрация</title>
</head>
<body>
<form method="POST" action="./functions/singup.php" enctype="multipart/form-data">
    <label for="">ФИО</label>
    <input type="text" name="full_name" placeholder="Введите свое полное имя">
    <label for="">Логин</label>
    <input type="text" name="login" placeholder="Введите логин">
    <label for="">Почта</label>
    <input type="email" name="email" placeholder="Введите свой email" id="">
    <label for="">Прикрепите изображение профиля</label>
    <input type="file" name="avatar" id="">
    <label for="">Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль" id="">
    <label for="">Подтверждение пароля</label>
    <input type="password" name="password_confirm" placeholder="Подтвердите пароль" id="">
    <button class="btn btn-white btn-animate" type="submit">Зарегистрироваться</button>
    <p class="back">
        Уже есть аккаунт? <a href="./singin.php">Войти</a> <br> 
        <a class="back" href="../index.html">Вернуться на главную</a>
    </p>
        <?php 
            if ($_SESSION['message']){
                echo '<p class="back">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
        ?>
</form>
</body>
</html>