<?php
    require_once ("includes/simplecms-config.php");
    require_once ("includes/connectDB.php");
    require_once ("includes/header.php");
?>
</br>
 <style type="text/css">
   TABLE {
    width: 90%; /* Ширина таблицы */
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

//$query = "SELECT patent.id, patent.typep, patent.number, patent.name, patent.priority + INTERVAL payorder.yearforce YEAR, payorder.idpatent, payorder.typed AS typed1, payorder.yearforce, duty.typed AS taped2, duty.yeard, duty.sumduty FROM patent, payorder, duty WHERE patent.id = payorder.idpatent AND payorder.typed = duty.typed AND payorder.yearforce + 1 = duty.yeard";
$query = "SELECT patent.id, patent.typep, patent.number, patent.name, patent.status, patent.priority + INTERVAL MAX(payorder.yearforce)+1 YEAR, payorder.idpatent, payorder.typed AS typed1, MAX(payorder.yearforce), duty.typed AS taped2, duty.yeard, duty.sumduty FROM patent, payorder, duty WHERE patent.id = payorder.idpatent AND payorder.typed = duty.typed AND payorder.yearforce + 1 = duty.yeard GROUP BY patent.number HAVING MAX(payorder.yearforce)";
$statement = $databaseConnection->prepare($query);
$statement->execute();
if ($statement->error)
        {
            die('Database query failed: ' . $statement->error);
        }
$statement->bind_result($id, $typep, $number, $name, $status, $priority, $idpatent, $typed1, $yearforce, $taped2, $yeard, $sumduty);
$numrows = $statement->num_rows;
    echo "<h1>Патенты 08 Департамента</h1></br>";
    echo "<h2>Пошлины</h2></br>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Тип</th>";
    echo "<th>Номер</th>";
    echo "<th>Наименование</th>";
    echo "<th>Год текущего поддержания патента</td>";
    echo "<th>Оплатить пошлину за следующий год до ...</th>";
    echo "<th>Осталось дней</th>";
    echo "<th>сумма пошлины за следующий год, руб.</th>";
    echo "<th>История</th>";
//    echo "<th>Статус</th>";
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
        case "Прекратил действие":
            break;
        case "Передан исполнителю":
            break;
        default:    
        echo "<tr>";
        echo '<td><a href = "typestat.php?tp='.$typep.'">'.$typep.'</a></td>';
        echo '<td><a href = "numpat.php?numpat='.$number.'">'.$number.'</a></td>';
        echo "<td>$name</td>";
        echo "<td align='center'>$yearforce</td>";
        echo '<td align="center">'.date("d.m.Y", strtotime($priority)).'</td>';
        $today = date("Y-m-d");
        $int = (strtotime($priority) - strtotime($today))/(60*60*24);
        //$interval = date_diff($priority, $today);
       // $int = date('d');
        //$int = $interval->format('%R%a дней');
        echo '<td align="center">'.$int.'</td>';
        echo "<td align='center'>$sumduty</td>";
        echo '<td><a href = "history.php?history='.$number.'">История</a></td>';
//        echo "<td>$status</td>";
//        echo "<td> </td>";
//        echo "<td> </td>";
//        echo "<td> </td>";
//        echo "<td> </td>";
//        echo "<td> </td>";
//        echo "<td> </td>";
//        echo "<td> </td>";
//        echo "<td> </td>";
        echo "</tr>";
    }
}
    echo "</table>";
echo "</br>";
    require_once ("includes/footer.php");
?>