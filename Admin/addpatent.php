<?php
//require_once ("/includes/simplecms-config.php");
//require_once ("/includes/connectDB.php");
require_once ("header.php");
$pat[] = $_POST['fp'];
print($pat[0]);
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
				</br><h2>Добавить патент</h2></br>
				<form name="fp" action="addpatent.php" method="POST">
				    <table>
				        <tr>
				            <th>Параметр</th><th>Значение</th>
				        </tr>
				        <tr>
				            <td>Тип</td>
				            <td>
				                <select name="tpat">
				                    <option value="tp1">Патент на изобретение</option>
				                    <option value="tp2">Патент на полезную модель</option>
				                    <option value="tp3">Патент на промышленный образец</option>
				                </select>
				            </td>
				        </tr>
				        <tr>
				            <td colspan=2><button type="submit" value="Отправить">Отправить</button></td>
				        </tr>
				    </table>
				</form>

</br>
<?php
require_once ("footer.php");
?>