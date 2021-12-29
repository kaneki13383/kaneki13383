<?php session_start();

if ($_SESSION['user']){
    header('Location: profile.php');
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="../css/singin.css">
</head>
<body>
        <form action="./functions/singin.php" method="POST">
        <ul>
            <li>
                <label for="">Логин </label>
                <input type="text" name="login">
            </li>
            <li>
                <label for="">Пароль</label>
                <input type="password" name="password">
            </li>
        </ul>        
        <button class="btn btn-white btn-animate">Войти</button>
        <p>У вас нет аккаунта? <a href="./reg.php">Зарегистрируйтесь</a></p> <br>        
        <a class="back" href="../index.html">Вернуться на главную</a>
        <?php 
            if ($_SESSION['message']){
                echo '<p class="asg">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
    <!--Форма авторизации-->
    
</body>
</html>