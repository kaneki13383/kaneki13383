<?
    
    if(!empty($_POST['t11'])){$t11 = (int)$_POST['t11'];}else{$t11 = 0;}
    if(!empty($_POST['t12'])){$t12 = (int)$_POST['t12'];}else{$t12 = 0;}
    if(!empty($_POST['t13'])){$t13 = (int)$_POST['t13'];}else{$t13 = 0;}
    if(!empty($_POST['t14'])){$t14 = (int)$_POST['t14'];}else{$t14 = 0;}
    if(!empty($_POST['t15'])){$t15 = (int)$_POST['t15'];}else{$t15 = 0;}
    if(!empty($_POST['z1'])){$z1 = (int)$_POST['z1'];}else{$z1 = 0;}

    if(!empty($_POST['t21'])){$t21 = (int)$_POST['t21'];}else{$t21 = 0;}
    if(!empty($_POST['t22'])){$t22 = (int)$_POST['t22'];}else{$t22 = 0;}
    if(!empty($_POST['t23'])){$t23 = (int)$_POST['t23'];}else{$t23 = 0;}
    if(!empty($_POST['t24'])){$t24 = (int)$_POST['t24'];}else{$t24 = 0;}
    if(!empty($_POST['t25'])){$t25 = (int)$_POST['t25'];}else{$t25 = 0;}
    if(!empty($_POST['z1'])){$z2 = (int)$_POST['z2'];}else{$z2 = 0;}   

    if(!empty($_POST['s1'])){$s1 = (int)$_POST['s1'];}else{$s1 = 0;}
    if(!empty($_POST['s2'])){$s2 = (int)$_POST['s2'];}else{$s2 = 0;}
    if(!empty($_POST['s3'])){$s3 = (int)$_POST['s3'];}else{$s3 = 0;}
    if(!empty($_POST['s4'])){$s4 = (int)$_POST['s4'];}else{$s4 = 0;}
    if(!empty($_POST['s5'])){$s5 = (int)$_POST['s5'];}else{$s5 = 0;}
    
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Математическое моделирование</title>
</head>
<body>
    <h3>Транспортная задача. Опорное решение. Метод минимального элемента.</h3>
    <form action="/" method="POST">
    <table class="example">
    <tbody>
        <tr>
            <td align="center"></td>
            <td align="center">B1</td>
            <td align="center">B2</td>
            <td align="center">B3</td>
            <td align="center">B4</td>
            <td align="center">B5</td>
            <td align="center">Заводы</td>
        </tr>
        <tr>
            <td align="center">A1</td>
            <td align="center"><input type="text" name="t11" value="520"></td>
            <td align="center"><input type="text" name="t12" value="480"></td>
            <td align="center"><input type="text" name="t13" value="650"></td>
            <td align="center"><input type="text" name="t14" value="500"></td>
            <td align="center"><input type="text" name="t15" value="720"></td>
            <td align="center"><input type="text" name="z1" size="5" value="40"></td>
        </tr>
        <tr>
            <td align="center">A2</td>
            <td align="center"><input type="text" name="t21" value="450"></td>
            <td align="center"><input type="text" name="t22" value="525"></td>
            <td align="center"><input type="text" name="t23" value="630"></td>
            <td align="center"><input type="text" name="t24" value="560"></td>
            <td align="center"><input type="text" name="t25" value="750"></td>
            <td align="center"><input type="text" name="z2" size="5" value="70"></td>
        </tr>
        <tr>
            <td align="center">Склады</td>
            <td align="center"><input type="text" name="s1" size="5" value="20"></td>
            <td align="center"><input type="text" name="s2" size="5" value="30"></td>
            <td align="center"><input type="text" name="s3" size="5" value="15"></td>
            <td align="center"><input type="text" name="s4" size="5" value="27"></td>
            <td align="center"><input type="text" name="s5" size="5" value="28"></td>
            <td align="center"></td>
        </tr>
    </tbody>
</table>
<input class="submit" type="submit" value="Решить задачу">
</form>
<div class="info">   
    <!-- 12312312 -->
<hr>
</div>
    <!--Для предотвращения повторной отправки на кнопку «Обновить» и «Назад».-->
     <script> if (window.history.replaceState) {window.history.replaceState(null, null, window.location.href);}</script>
</body>
</html>

<?
//--------------------------------------------------------------------------

    $arr_z = [
        '16' => $z1,
        '26' => $z2        
    ];

    $arr_s = [
        '31' => $s1,
        '32' => $s2,
        '33' => $s3,
        '34' => $s4,
        '35' => $s5,  
    ];

    $arr_t = [
        '11'  => $t11,
        '12' => $t12,
        '13' => $t13,
        '14' => $t14,
        '15' => $t15,
        '21' => $t21,
        '22' => $t22,
        '23' => $t23,
        '24' => $t24,
        '25' => $t25
    ];    

    $i = 1;
    $itog = 0;
    
    while ($i < 11)
    {
        $min_val = null;
        $min_key = null;
        
        foreach($arr_t as $key_t => $val_t)
        {
            if($val_t < $min_val or $min_val === null)
            {
                $min_val = $val_t;//определяем значение элемента массива с минимальным тарифом
                $min_key = $key_t;//определяем ключ элемента массива с минимальным тарифом
            }
        }

        if(!empty($min_val))
        {
            $num_1 = substr($min_key, 0, 1);//вырезаем 1 символ
            $num_2 = substr($min_key, 1, 1);//вырезаем последний символ
            
            $z = $arr_z[$num_1.'6'];//определяем значение ячейки завода в массиве $arr_z, соответствующую ячейке с минимальным тарифом (см. по горизонтали)
            $s = $arr_s['3'.$num_2]; //определяем значение ячейки склада в массиве $arr_s, соответствующую ячейке с минимальным тарифом (см. по вертикали)      
            
            if(($z<>0)and($s<>0))
            {
                if($z<$s)
                {
                    $arr_z[$num_1.'6'] = 0;
                    $arr_s['3'.$num_2] = $s-$z;
                    $sum = $min_val * $z;
                    echo $min_val." x ".$z." = ".$sum."<br>";
                }
                else
                {
                    $arr_z[$num_1.'6'] = $z-$s;
                    $arr_s['3'.$num_2] = 0;
                    $sum = $min_val * $s;
                    echo $min_val." x ".$s." = ".$sum."<br>";
                }

                $itog = $itog + $sum;                
            }

            unset($arr_t[$min_key]); //удалим элемент массива с ключем - $min_key
        }

        $i++;
    }

    if($itog>0){echo "<b>ИТОГО: ".$itog."</b><br>";}
?>