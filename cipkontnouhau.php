<?php
    require_once ("includes/simplecms-config.php");
    require_once ("includes/connectDB.php");
    require_once ("includes/header.php");
    $cip = "'".$_GET['cip']."'";
    $cipp = $_GET['cip'];
?>
</br>
<?php
$query = "SELECT nouhau.id, nouhau.nouhau, nouhau.inventory, nouhau.dateinventory, nouhau.registry, nouhau.cost, nouhau.idgk, nouhau.status, gk.number, gk.dategk, gk.cipher FROM nouhau, gk WHERE nouhau.idgk = gk.id AND gk.cipher = $cip";
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
    echo "<h2>Ноу-Хау по контракту с шифром $cip</h2></br>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Ноу-Хау</th>";
    echo "<th>Инвентарный номер</th>";
    echo "<th>Номер контракта</th>";
    echo "<th>Дата контракта</td>";
//    echo "<th>Шифр</th>";
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
    echo "<td nowrap>$dategk</td>";
//    echo "<td>$cipher</td>";
//    echo '<td><a href = "cipkontnouhau.php?numk='.$cipher.'">'.$cipher.'</td>';
    echo "<td>$dateinventory</td>";
    echo "<td>$registry</td>";
    echo "<td align = 'center'>$cost</td>";
    echo "<td>$status</td>";
    echo "</tr>";
    $num++;
    if ($status == 'Передан исполнителю') $transmit++;
}
    echo "</table>";
//    echo "</br>В базе данных $num ноу-хау</br>";
//    echo "</br>Из них передано исполнителю $transmit ноу-хау</br>";
    echo "</br>";
    require_once ("includes/footer.php");
?>