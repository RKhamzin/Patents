<?php
    require_once ("includes/simplecms-config.php");
    require_once ("includes/connectDB.php");
    require_once ("includes/header.php");

echo '<b>Патент № '.$_GET['numpat'].'</b></br>';
$num = $_GET['numpat'];
$query = "SELECT patent.id, patent.typep, patent.number, patent.name, patent.rightholder, patent.status, patent.datestatus, patent.reestablish, patent.id1c, patent.application, patent.priority, patent.registered, patent.expires, patent.dateofreceipt, patent.budget, patent.registry, patent.endregistry, patent.year, patent.fee, patent.datefee, patent.sum, patent.cost, patent.appendix, patent.petitiondate, patent.petitionumber, patent.numpaymentorder, patent.datepaymentorder, patent.sumpaym, patent.dearlytermination, patent.drehabilitation, patent.dateregister, patent.idgk, gk.id AS id2, gk.typegk, gk.number AS number2, gk.dategk, gk.name AS name2, gk.cipher, gk.cost AS cost2, gk.idperformer, performer.id AS id3, performer.fullperformer, performer.shortperformer FROM patent, gk, performer WHERE patent.idgk = gk.id AND gk.idperformer = performer.id AND patent.number = $num";
$statement = $databaseConnection->prepare($query);
$statement->execute();
if ($statement->error)
        {
            die('Database query failed: ' . $statement->error);
        }
//$statement->bind_result($id, $typep, $number, $name, $rightholder, $status, $datestatus, $reestablish, $id1c, $application, $priority, $registered, $expires, $dateofreceipt, $budget, $registry, $endregistry, $year, $fee, $datefee, $sum, $cost, $appendix, $petitiondate, $petitionumber, $numpaymentorder, $datepaymentorde, $sumpaym, $dearlytermination, $dateregister, $idgk, $id2, $number2, $dategk, $name2, $cipher, $cost2, $idperformer, $id3, $fullperformer, $shortperformer);
$statement->bind_result($id, $typep, $number, $name, $rightholder, $status, $datestatus, $reestablish, $id1c, $application, $priority, $registered, $expires, $dateofreceipt, $budget, $registry, $endregistry, $year, $fee, $datefee, $sum, $cost, $appendix, $petitiondate, $petitionumber, $numpaymentorder, $datepaymentorder, $sumpaym, $dearlytermination, $drehabilitation, $dateregister, $idgk, $id2, $typegk, $number2, $dategk, $name2, $cipher, $cost2, $idperformer, $id3, $fullperformer, $shortperformer);
?>
 <style type="text/css">
   TABLE {
    width: 100%; /* Ширина таблицы */
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

while($statement->fetch())
{  
    echo '<table>';
    echo "<tr>";
    echo '<td width = 50%>Тип</td><td>'.$typep.'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Номер</td><td>'.$number.'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Наименование</td><td>'.$name.'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Правообладатель</td><td>'.$rightholder.'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Статус</td><td>'.$status.'</td>';
    echo "</tr>";
//    echo "<tr>";
//    echo '<td>Дата статуса</td><td>'.$datestatus.'</td>';
//    echo "</tr>";
//    echo "<tr>";
//    echo '<td>Дата восстановления</td><td>'.$reestablish.'</td>';
//    echo "</tr>";
    echo "<tr>";
    echo '<td>Инвентарный номер</td><td>'.$id1c.'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Номер заявки</td><td>'.$application.'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Дата приоритета патента</td><td>'.date("d.m.Y", strtotime($priority)).'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Дата регистрации патента</td><td>'.date("d.m.Y", strtotime($registered)).'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Дата окончания срока действия патента</td><td>'.date("d.m.Y", strtotime($expires)).'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Дата поступления охранного документа в Департамент</td><td>'.date("d.m.Y", strtotime($dateofreceipt)).'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Дата постановки на бюджетный учет</td><td>'.date("d.m.Y", strtotime($budget)).'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Дата регистрации в реестре федерального имущества</td><td>'.date("d.m.Y", strtotime($registry)).'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Дата изъятия из реестра федерального имущества</td><td>'.date("d.m.Y", strtotime($endregistry)).'</td>';
    echo "</tr>";
//    echo "<tr>";
//    echo '<td>Пошлина оплачена за '.$year.' год поддержания патента в силе</td><td>'.$year.'</td>';
//    echo "</tr>";
//    echo "<tr>";
//    echo '<td>Номер платежного поручения оплаты пошлины</td><td>'.$fee.'</td>';
//    echo "</tr>";
//    echo "<tr>";
//    echo '<td>Дата платежного поручения оплаты пошлины</td><td>'.$datefee.'</td>';
//    echo "</tr>";
//    echo "<tr>";
//    echo '<td>Сумма оплаченной пошлины, руб.</td><td>'.$sum.'</td>';
//    echo "</tr>";
    echo "<tr>";
    echo '<td>Стоимость патента, руб.</td><td>'.$cost.'</td>';
    echo "</tr>";
//    echo "<tr>";
//    echo '<td>Дата ходатайства о восстановлении патента</td><td>'.$petitiondate.'</td>';
//    echo "</tr>";
//    echo "<tr>";
//    echo '<td>Номер  ходатайства о восстановлении патента</td><td>'.$petitionumber.'</td>';
//    echo "</tr>";
//    echo "<tr>";
//    echo '<td>Номер платежного поручения о восстановлении патента</td><td>'.$numpaymentorder.'</td>';
//    echo "</tr>";
//    echo "<tr>";
//    echo '<td>Дата платежного поручения о восстановлении патента</td><td>'.$datepaymentorder.'</td>';
//    echo "</tr>";
//    echo "<tr>";
//    echo '<td>Сумма платежа за восстановление патента, руб.</td><td>'.$sumpaym.'</td>';
//    echo "</tr>";
    echo "<tr>";
    echo '<td>Дата досрочного прекращения действия патента</td><td>'.date("d.m.Y", strtotime($dearlytermination)).'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Дата восстановления действия патента</td><td>'.date("d.m.Y", strtotime($drehabilitation)).'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Дата записи в реестре изобретений РФ о восстановлении патента</td><td>'.date("d.m.Y", strtotime($dateregister)).'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Тип государственного контракта</td><td>'.$typegk.'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Номер государственного контракта</td><td>'.$number2.'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Дата государственного контракта</td><td>'.date("d.m.Y", strtotime($dategk)).'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Тема государственного контракта</td><td>'.$name2.'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Шифр</td><td>'.$cipher.'</td>';
    echo "</tr>";
    echo "</tr>";
    echo "<tr>";
    echo '<td>Стоимость государственного контракта, руб.</td><td>'.$cost2.'</td>';
    echo "</tr>";
    echo "</tr>";
    echo "<tr>";
    echo '<td>Полние наименование исполнителя</td><td>'.$fullperformer.'</td>';
    echo "</tr>";
    echo "</tr>";
    echo "<tr>";
    echo '<td>Абривиатура исполнителя контракта</td><td>'.$shortperformer.'</td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td colspan = 2 align="center"><a href = "history.php?history='.$number.'">История платежей по патенту</a></td>';
    echo "</tr>";
    echo "<tr>";
    echo '<td>Примечание</td><td>'.$appendix.'</td>';
    echo "</tr>";
    echo "</table></br>";
}
    echo "</br>";

    require_once ("includes/footer.php");
?>