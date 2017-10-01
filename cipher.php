<?php
/**
 * Copyright (C) 2016-2017 by Ramil Khamzin <ramil@khamzin.ru>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

    require_once ("includes/simplecms-config.php");
    require_once ("includes/connectDB.php");
    require_once ("includes/header.php");
    $cip = "'".$_GET['cip']."'";
//    $nkk = $_GET['nk'];
//    echo "</br>nk = $nk</br>";
?>
</br>

<?php

$query = "SELECT patent.typep, patent.number, patent.name, patent.status, patent.id1c, patent.registered, patent.budget, patent.registry, gk.number AS number2, gk.dategk, gk.cipher, performer.shortperformer FROM patent, gk, performer WHERE gk.cipher = $cip AND patent.idgk = gk.id AND gk.idperformer = performer.id";
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

    echo "<h1>Патенты 08 Департамента</h1></br>";
    echo "<h2>Патенты с шифром $cip</h2></br>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Тип</th>";
    echo "<th>Номер</th>";
    echo "<th>Наименование</th>";
    echo "<th>Статус</td>";
    echo "<th>Инвентарный номер</th>";
    echo "<th>Дата регистрации</th>";
    echo "<th>Дата постановки на бюджетный учет</th>";
    echo "<th>Дата регистрации в реестре Росимущества</th>";
    echo "<th>№ госконтракта</th>";
    echo "<th>Дата госконтракта</th>";
//    echo "<th>Шифр</th>";
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
    echo "<tr>";
    echo '<td><a href = "typestat.php?tp='.$typep.'">'.$typep.'</a></td>';
    echo '<td><a href = "numpat.php?numpat='.$number.'">'.$number.'</a></td>';
    echo "<td>$name</td>";
    echo "<td>$status</td>";
    echo "<td>$id1c</td>";
    echo '<td>'.date("d.m.Y", strtotime($registered)).'</td>';
    echo '<td>'.date("d.m.Y", strtotime($budget)).'</td>';
    echo '<td>'.date("d.m.Y", strtotime($registry)).'</td>';
    echo '<td><a href = "numkont.php?nk='.$number2.'">'.$number2.'</a></td>';
    echo '<td>'.date("d.m.Y", strtotime($dategk)).'</td>';
//    echo "<td>$cipher</td>";
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
}
    echo "</table>";
    echo "</br>";
    require_once ("includes/footer.php");
    