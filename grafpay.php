<?php
   // use Functional\Select;
    require_once ("includes/simplecms-config.php");
    require_once ("includes/connectDB.php");
    require_once ("includes/header.php");
    require_once ("Functional/Map.php");
    require_once ("Functional/Select.php");
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
  <h3>Это grapay</h3>

<?php
//use Functional\Select;
//use Functional\Map;
//require_once ("Functional/Select.php");


// BEGIN (write your solution here)

function evenSquareSum($arr)
{
    $newarray = array();
//    print_r($newarray);
    foreach($arr as $element)
    {
        if($element % 2 == 0)
        {
           $newelement = $element * $element;
           echo "newelement = $newelement<br />";
           array_push($newarray,$newelement);
        }
    }
    return array_sum($newarray);
}
// END
$arr = array(1, 2, 3, 8);
//evenSquareSum($arr);
//echo 'result = '.evenSquareSum($arr).'<br />';
print_r(evenSquareSum($arr));
?>



<?php  
echo "</br>";
require_once ("includes/footer.php");
?>