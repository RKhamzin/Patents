<?php
    require_once ("includes/simplecms-config.php");
    require_once ("includes/connectDB.php");
    require_once ("includes/header.php");
    $hr = "'".$_GET['history']."'";
    $hrr = $_GET['history'];
    $sum = 0;
//    echo "</br>tppat = $tppat</br>";
?>
</br>

<?php

$query = "SELECT patent.id, patent.typep, patent.number, patent.name, payorder.numpayorder, payorder.datepayorder, payorder.amount, payorder.payreference, payorder.yearforce, payorder.idpatent FROM patent, payorder WHERE patent.id = payorder.idpatent AND patent.number = $hr ORDER BY payorder.yearforce ASC";
$statement = $databaseConnection->prepare($query);
$statement->execute();
if ($statement->error)
        {
            die('Database query failed: ' . $statement->error);
        }
        
$statement->bind_result($id, $typep, $number, $name, $numpayorder, $datepayorder, $amount, $payreference, $yearforce, $idpatent);
$numrows = $statement->num_rows;

?>
 <style type="text/css">
   TABLE {
    width: 80%; /* Ширина таблицы */
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
    echo "<h1>История платежей</h1></br>";
    echo '<h2>Патент номер '.$hrr.'</h2></br>';
    echo "<table>";
    echo "<tr>";
    echo "<th>Номер платежного поручения</th>";
    echo "<th>Дата платежного поручения</th>";
    echo "<th>Сумма платежа, руб.</th>";
    echo "<th>Основание платежа</td>";
    echo "<th>Год поддержания патента</th>";
//    echo "<th>Дата регистрации</th>";
//    echo "<th>Дата постановки на бюджетный учет</th>";
//    echo "<th>Дата регистрации в реестре Росимущества</th>";
//    echo "<th>№ госконтракта</th>";
//    echo "<th>Дата госконтракта</th>";
//    echo "<th>Шифр</th>";
//    echo "<th>Исполнитель</th>";
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
    $sum = $sum + $amount;
    echo "<tr>";
    echo "<td align='center'>$numpayorder</td>";
    echo '<td align="center">'.date("d.m.Y", strtotime($datepayorder)).'</td>';
    echo "<td align='center'>$amount</td>";
    echo "<td>$payreference</td>";
    echo "<td align='center'>$yearforce</td>";
//    echo "<td>$registered</td>";
//    echo "<td>$budget</td>";
//    echo "<td>$registry</td>";
//    echo "<td>$number2</td>";
//    echo "<td>$dategk</td>";
//    echo "<td>$cipher</td>";
//    echo "<td>$shortperformer</td>";
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
}
    echo "<tr>";
    echo "<td colspan=2 align='center'>ИТОГО</td>";
    echo "<td align='center'>$sum</td>";
    echo "<td colspan=2></td>";
    echo "</tr>";
    echo "</table>";
    echo "</br>";
    require_once ("includes/footer.php");