<?php
    require_once ("includes/simplecms-config.php");
    require_once ("includes/connectDB.php");
    require_once ("includes/header.php");
    $numstr = 0;
    $numvalid = 0;
    $mayterminate = 0;
    $berestored = 0;
    $terminate = 0;
    $transmitted = 0;
    $regrosim=0;
    //$st = array();
//    $numrows = 10;
?>
</br>
<?php
$query = "SELECT patent.typep, patent.number, patent.name, patent.status, patent.id1c, patent.registered, patent.budget, patent.registry, gk.number AS number2, gk.dategk, gk.cipher, performer.shortperformer FROM patent, gk, performer WHERE patent.idgk = gk.id AND gk.idperformer = performer.id";
$statement = $databaseConnection->prepare($query);
$statement->execute();
if ($statement->error)
        {
            die('Database query failed: ' . $statement->error);
        }
        
$statement->bind_result($typep, $number, $name, $status, $id1c, $registered, $budget, $registry, $number2, $dategk, $cipher, $shortperformer);
$numrows = $statement->num_rows;
?>
 <style type="text/css">
   TABLE {
    width: 300px; /* Ширина таблицы */
    border-collapse: collapse; /* Убираем двойные линии между ячейками */
   }
   TD, TH {
    padding: 3px; /* Поля вокруг содержимого таблицы */
    border: 1px solid black; /* Параметры рамки */
   }
   TH {
    background: #b0e0e6; /* Цвет фона */
   }
  </style>
  <?php
    echo "<h1>Патенты 08 Департамента</h1></br>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Тип</th>";
    echo "<th>Номер</th>";
    echo "<th>Наименование</th>";
    echo "<th>Статус</td>";
    echo "<th>Инвентарный номер</th>";
//    echo "<th>Дата регистрации</th>";
//    echo "<th>Дата постановки на бюджетный учет</th>";
//    echo "<th>Дата регистрации в реестре Росимущества</th>";
//    echo "<th>№ госконтракта</th>";
    echo "<th>Дата госконтракта</th>";
    echo "<th>Шифр</th>";
    echo "<th>Исполнитель</th>";
//    echo "<th> </th>";
//    echo "<th> </th>";
//    echo "<th> </th>";
//    echo "<th> </th>";
//    echo "<th> </th>";
//    echo "<th> </th>";
//    echo "<th> </th>";
//    echo "<th> </th>";
//    echo "<th> </th>";
//    echo "<th> </th>";
    echo "</tr>";
while($statement->fetch())
{
    switch ($status) {
        case "Действующий":
            $numvalid = $numvalid + 1;
            echo '<tr bgcolor="#80FF80">';
            break;
        case "Может прекратить действие":
            $mayterminate = $mayterminate + 1;
            echo '<tr bgcolor="#FFA8A8">';
            break;
        case "Прекратил действие, но может быть восстановлен":
            $berestored = $berestored + 1;
            echo '<tr bgcolor="#9599EE">';
            break;
        case "Прекратил действие":
            $terminate = $terminate + 1;
            echo '<tr bgcolor="#C8C8C8">';
            break;
        case "Передан исполнителю":
            $transmitted = $transmitted + 1;
            echo "<tr>";
            break;
        default:
            echo "<tr>";
    }
    
    if($registry <> 0) $regrosim = $regrosim + 1;
//    echo '<td>'.$typep.'</td>';
    echo '<td><a href = "typestat.php?tp='.$typep.'">'.$typep.'</a></td>';
    echo '<td><a href = "numpat.php?numpat='.$number.'">'.$number.'</a></td>';
    echo "<td>$name</td>";
    echo "<td>$status</td>";
    echo "<td>$id1c</td>";
//    echo "<td>$registered</td>";
//    echo "<td>$budget</td>";
//    echo "<td>$registry</td>";
//    echo "<td>$number2</td>";
//    echo '<td><a href = "numkont.php?nk='.$number2.'">'.$number2.'</a></td>';
    echo '<td>'.date("d.m.Y", strtotime($dategk)).'</td>';
    echo '<td><a href = "cipher.php?cip='.$cipher.'">'.$cipher.'</a></td>';
    echo '<td><a href = "performer.php?perf='.$shortperformer.'">'.$shortperformer.'</a></td>';
//    echo "<td> </td>";
//    echo "<td> </td>";
//    echo "<td> </td>";
//    echo "<td> </td>";
//    echo "<td> </td>";
//    echo "<td> </td>";
//    echo "<td> </td>";
//    echo "<td> </td>";
//    echo "<td> </td>";
//    echo "<td> </td>";
    echo "</tr>";
    $numstr = $numstr+1;
//    $field_cnt = $statement->field_count;
//printf("Результат содержит %d полей.\n", $field_cnt);

}
    echo "</table>";
    echo "</br>В базе данных $numstr патентов</br>";
    $rcount = $statement->num_rows;
//    printf("Результат содержит %d полей.\n", $rcount);

//   }
?>
</br>
<table style="width: 400px">
    <tr>
        <th></th><th></th><th>Шт.</th>
    </tr>
    <tr>
        <?php $st1 = "Действующий"; 
        echo '<td bgcolor="#80FF80">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><a href = "statpat.php?st='.$st1.'">Действующий</a></td><td align="center">'.$numvalid.'</td>'; ?>
    </tr>
    <tr>
        <?php $st2 = "Может прекратить действие"; 
        echo '<td bgcolor="#FFA8A8">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><a href = "statpat.php?st='.$st2.'">Может прекратить действие</a></td><td align="center">'.$mayterminate.'</td>'; ?>
    </tr>
    <tr>
        <?php $st3 = "Прекратил действие, но может быть восстановлен"; 
        echo '<td bgcolor="#9599EE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><a href = "statpat.php?st='.$st3.'">Прекратил действие, но может быть восстановлен</a></td><td align="center">'.$berestored.'</td>'; ?>
    </tr>
    <tr>
        <?php $st4 = "Прекратил действие"; 
        echo '<td bgcolor="#C8C8C8">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><a href = "statpat.php?st='.$st4.'">Прекратил действие</a></td><td align="center">'.$terminate.'</td>'; ?>
    </tr>
    <tr>
        <?php $st6 = "Зарегистрировано в реестре Росимущества"; 
        echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><a href = "statpat.php?st='.$st6.'">Зарегистрировано в реестре Росимущества</a></td><td align="center">'.$regrosim.'</td>'; ?>
    </tr>
    <tr>
        <?php $st5 = "Передан исполнителю"; 
        echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><a href = "statpat.php?st='.$st5.'">Передан исполнителю</a></td><td align="center">'.$transmitted.'</td>'; ?>
    </tr>
</table>



<?php
echo "</br>";
    require_once ("includes/footer.php");
?>