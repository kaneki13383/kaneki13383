<?php 
session_start();
if (!$_SESSION['user']){
    header('Location: ./php/profile.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>People & Ground</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <div>
                    <li class="li_first"><a href="#">Главная</a></li>
                    <li><a href="#">Каталог</a></li>
                </div>
            </ul>
        </nav>
        <a href="php/profile.php"><img class="ava1" src="<?= "php/" . $_SESSION['user']['avatar'] ?>" alt=""></a>
    </header>
    <main>

    </main>
    <footer>
        
    </footer>
</body>
</html>