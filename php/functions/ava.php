<?php
    session_start();
    
    require_once('./connect.php');

    $new_avatar = 'img/' . time() . $_FILES['avatar']['name'];

    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], "../" . $new_avatar)){
        $_SESSION['message'] = "Ошибка загрузки аватарки";
        header("Location: ../profile.php");
        exit();
    }
    else{
        if (isset($_SESSION['user']['avatar'])){
            unlink('../'.$_SESSION['user']['avatar']);
        }
        $userID = $_SESSION['user']['id'];
        $change_avatar = $connect->prepare("UPDATE `registration` SET `avatar` = '$new_avatar' WHERE `id` = '$userID'");
        $change_avatar->execute();
        $_SESSION['user']['avatar'] = $new_avatar;
        header("Location: ../profile.php");
    }