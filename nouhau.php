<?php
    require_once ("includes/simplecms-config.php");
    require_once ("includes/connectDB.php");
    require_once ("includes/header.php");
    $num = 0;
    $transmit = 0;
    $resrosim = 0;
?>
</br>
<?php
$query = "SELECT nouhau.id, nouhau.nouhau, nouhau.inventory, nouhau.dateinventory, nouhau.registry, nouhau.cost, nouhau.idgk, nouhau.status, gk.number, gk.dategk, gk.cipher FROM nouhau, gk WHERE nouhau.idgk = gk.id";
$statement = $databaseConnection->prepare($query);
$statement->execute();
if ($statement->error)
        {
            die('Database query failed: ' . $statement->error);
        }
        
$statement->bind_result($id, $nouhau, $inventory, $dateinventory, $registry, $cost, $idgk, $status, $number, $dategk, $cipher);

?>
 <style type="text/css">
   TABLE {
    width: 95%; /* Ширина таблицы */
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
    echo "<h1>Ноу-Хау 08 Департамента</h1></br>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Ноу-Хау</th>";
    echo "<th>Инвентарный номер</th>";
    echo "<th>Номер контракта</th>";
    echo "<th>Дата контракта</td>";
    echo "<th>Шифр</th>";
    echo "<th>Дата постановки на бюджетный учет</th>";
    echo "<th>Дата внесения в реестр Росимущества</th>";
    echo "<th>Стоимость, руб.</th>";
    echo "<th>Статус</th>";
    echo "</tr>";
while($statement->fetch())
{
    echo "<tr>";
    echo '<td>'.$nouhau.'</td>';
    echo "<td>$inventory</td>";
    echo '<td><a href = "numkontnouhau.php?numk='.$number.'">'.$number.'</td>';
    echo '<td nowrap>'.date("d.m.Y", strtotime($dategk)).'</td>';
//    echo "<td>$cipher</td>";
    echo '<td align = "center"><a href = "cipkontnouhau.php?cip='.$cipher.'">'.$cipher.'</td>';
    echo '<td>'.date("d.m.Y", strtotime($dateinventory)).'</td>';
    echo '<td align = "center">'.date("d.m.Y", strtotime($registry)).'</td>';
    echo "<td align = 'center'>$cost</td>";
    echo "<td>$status</td>";
    echo "</tr>";
    $num++;
    if ($status == 'Передан исполнителю') $transmit++;
    if ($status == 'Внесен в реестр Росимущества') $resrosim++;
}
    echo "</table>";
    echo "</br>В базе данных $num ноу-хау</br>";
//    echo "</br>Из них передано исполнителю $transmit ноу-хау</br>";
?>
</br>
<table style="width: 400px">
    <tr>
        <th></th><th>Шт.</th>
    <tr>
        <?php $st1 = "Внесен в реестр Росимущества"; 
        echo '<td><a href = "statnh.php?st='.$st1.'">Зарегистрировано в реестре Росимущества</a></td><td align="center">'.$resrosim.'</td>'; ?>
    </tr>
    <tr>
        <?php $st2 = "Передан исполнителю"; 
        echo '<td><a href = "statnh.php?st='.$st2.'">Передано исполнителю</a></td><td align="center">'.$transmit.'</td>'; ?>
    </tr>
</table>
<?php
    echo "</br>";
    require_once ("includes/footer.php");
?>