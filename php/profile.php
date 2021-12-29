<?php 
session_start();
if (!$_SESSION['user']){
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <title>Профиль</title>
</head>
<header>
        <a href="../../index.php"><h1 class="logo1">BOOKS</h1></a>
        <form class="form_search" action="search.php" method="post">
            <input class="search" type="search" name="search" id="" >
            <button class="butn_search" name="search_btn" type="submit">Поиск</button>
        </form>
        <a class="login1" href="./profile.php"><?= $_SESSION['user']['full_name']?></a>
        <img class="ava1" src="<?= $_SESSION['user']['avatar'] ?>" alt="">
    </header>
<body>  
        <img class="ava" src="<?= $_SESSION['user']['avatar'] ?>" alt="">
    <section class="section1">
        <div class="info">            
            <p class="log">Логин: <?= $_SESSION['user']['login']?>
    
            <p class="name">Имя: <?= $_SESSION['user']['full_name']?></p>
       
            <p class="mail">Mail: <?= $_SESSION['user']['email']?></p>
         </div>
    </section>
    <form action="./functions/ava.php" method="POST" enctype="multipart/form-data">
        <input class="inp_style" type="file" name="avatar" id="av">
        <label class="avatar_style" for="av"> <span class="ava_span_style">Выберите аватар</span></label> <br>
        <button class="button_ava" for="avatar" type="submit">Сменить аватар</button> <br>
    <a href="functions/logout.php" class="logout">Выход</a> 
    </form>
        <?php 
            if ($_SESSION['message']){
                echo '<p class="asg">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
        ?>
    <script>
    let inputs = document.querySelectorAll('.inp_style');
    Array.prototype.forEach.call(inputs, function (input) {
      let label = input.nextElementSibling,
        labelVal = label.querySelector('.ava_span_style').innerText;
  
      input.addEventListener('change', function (e) {
        let countFiles = '';
        if (this.files && this.files.length >= 1)
          countFiles = this.files.length;
  
        if (countFiles)
          label.querySelector('.ava_span_style').innerText = 'Выбрано файлов: ' + countFiles;
        else
          label.querySelector('.ava_span_style').innerText = labelVal;
      });
    });
</script>
</body>
<footer>               
        <h2 class="logo1">BOOKS</h2>
        <p class="corp">Гавкошмыг corporation</p>
        <a class="sing_in" href="./singin.php">Вы уже вошли в аккаунт</a>
    </footer>
</html>