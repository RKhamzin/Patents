<?php
    require_once ("includes/simplecms-config.php");
    require_once ("includes/connectDB.php");
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
// $im - идентификатор изображения
// $VALUES - массив со значениями
// $LEGEND - массив с подписями

//function Diagramm($im, $VALUES)
function Diagramm($im, $VALUES)
{
    GLOBAL $COLORS, $SHADOWS;
    $black = ImageColorAllocate($im,0,0,0);
    
    // Получим размеры изображения
    $W = ImageSX($im);
    $H = ImageSY($im);
    
    // Вывод легенды -----------------------------
 /*   
    // Посчитаем количество пунктов, от этого зависит высота легенды
    $legend_count = count($LEGEND);
    
    // Посчитаем максимальную длину пункта, от этого зависит ширина легенды
    $max_length = 0;
    foreach($LEGEND as $v) if($max_length < strlen($v)) $max_length = strlen($v);
    
    // Номер шрифта, которым мы будем выводить легенду
    $FONT = 2;
    $font_w = ImageFontWidth($FONT);
    $font_h = ImageFontHeight($FONT);
    
    // Вывод прямоугольника - границы легенды ----------------------------
    
    $l_width = ($font_w * $max_length) + $font_h + 10 + 5 + 10;
    $l_height = $font_h * $legend_count + 10 + 10;
    
    // Получим координаты верхнего левого угла прямоугольника - границы легенды
    $l_x1 = $W - 10 - $l_width;
 //   $l_y1 = ($H - $l_height)/2;
    $l_y1 = ($H - $l_height) - 10;
    
    // Вывод прямоугольника - границы легенды
    ImageRectangle($im, $l_x1, $l_y1, $l_x1 + $l_width, $l_y1 + $l_height, $black);
    
    // Вывод текста легенды и цветных квадратиков
    $text_x = $l_x1 + 10 + 5 + $font_h;
    $square_x = $l_x1 + 10;
    $y = $l_y1 + 10;
    
    $i = 0;
    foreach($LEGEND as $v)
    {
        $dy = $y + ($i*$font_h);
        ImageString($im, $FONT, $text_x, $dy, $v, $black);
        ImageFilledRectangle($im, $square_x + 1, $dy + 1, $square_x + $font_h - 1, $dy + $font_h - 1, $COLORS[$i]);
        ImageRectangle($im, $square_x + 1, $dy + 1, $square_x + $font_h - 1, $dy + $font_h - 1, $black);
        $i++;
    }
*/    
    // Вывод круговой диаграммы -----------------------------------------------------------------------------
    
    $total = array_sum($VALUES);
    $anglesum = $angle = Array(0);
    $i = 1;
    
    // Расчет углов
    while($i < count($VALUES))
    {
        $part = $VALUES[$i - 1]/$total;
        $angle[$i] = floor($part*360);
        $anglesum[$i] = array_sum($angle);
        $i++;
    }
    $anglesum[] = $anglesum[0];
    
    // Расчет диаметра
 //   $l_x1 = $W - 10 - $l_width;
   // $diametr = $l_x1 - 10 - 10;
    $diametr = $H - 20;   
    
    // Расчет координат центра элипса
//    $circle_x = ($diametr/2) + 10;
    $circle_x = $W/2;
    $circle_y = $H/2;
    
    // Поправка диаметра, усли элипс не помещается по высоте
    if($diametr > ($H*2) - 10 - 10) $diametr = ($H*2) - 20 - 20 - 40;
    
    
    // Вывод тени
    for($j = 20; $j > 0; $j--)
        for($i = 0; $i < count($anglesum) - 1; $i++)
        {
            if($VALUES[$i] <> 0) ImageFilledArc($im, $circle_x, $circle_y + $j, $diametr, $diametr/2, $anglesum[$i], $anglesum[$i + 1], $SHADOWS[$i], IMG_ARC_PIE);
        }
    // Вывод круговой диаграммы
    for($i = 0; $i < count($anglesum) - 1; $i++)
    {
        if($VALUES[$i] <> 0) ImageFilledArc($im, $circle_x, $circle_y, $diametr, $diametr/2, $anglesum[$i], $anglesum[$i + 1], $COLORS[$i], IMG_ARC_PIE);
    }
}    /* Конец функции вывода круговой диаграммы */  

// Функция формирования легенды
function legend($LEGEND, $VALUES)
{
    echo "<table><tr><th></th><th></th><th>Шт.</th><th>%</th></tr>";
    $i = 0;
    foreach($LEGEND as $v)
    {
        echo '<tr><td bgcolor = "'.$COLOR[$i].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.$v.'</td><td>'.$VALUES[$i].'</td><td></td></tr>';
//        $dy = $y + ($i*$font_h);
//        ImageString($im, $FONT, $text_x, $dy, $v, $black);
 //       ImageFilledRectangle($im, $square_x + 1, $dy + 1, $square_x + $font_h - 1, $dy + $font_h - 1, $COLORS[$i]);
//        ImageRectangle($im, $square_x + 1, $dy + 1, $square_x + $font_h - 1, $dy + $font_h - 1, $black);
        $i++;
    }
    echo"</table>";
}

  // Преобразование Windows 1251 -> Unicode 
  function win2uni($s) 
  { 
    $s = convert_cyr_string($s,'w','i'); // преобразование win1251 -> iso8859-5 
    // преобразование iso8859-5 -> unicode: 
    for ($result='', $i=0; $i<strlen($s); $i++) { 
      $charcode = ord($s[$i]); 
      $result .= ($charcode>175)?"&#".(1040+($charcode-176)).";":$s[$i]; 
    } 
    return $result; 
  } 

// Функция преобразует текст из кодировки iso8859-5 в Unicode-entities.
function toUnicodeEntities($text, $from="w")  
 {   
  $text = convert_cyr_string($text, $from, "i");  
  $uni = "";   
  for ($i=0, $len=strlen($text); $i<$len; $i++)  
   {   
    $char = $text{$i};   
    $code = ord($char);   
    $uni .= ($code>175)? "&#" . (1040+($code-176)) . ";" : $char;   
   }   
  return $uni;   
 }
 

    // Статус патентов
    $numvalid = 0;
    $mayterminate = 0;
    $berestored = 0;
    $terminate = 0;
    
    // Запрос к базе данных для получения патентов с разным статусом
    $query = "SELECT patent.typep, patent.number, patent.name, patent.status, patent.id1c, patent.registered, patent.budget, patent.registry, gk.number AS number2, gk.dategk, gk.cipher, performer.shortperformer FROM patent, gk, performer WHERE patent.idgk = gk.id AND gk.idperformer = performer.id";
$statement = $databaseConnection->prepare($query);
$statement->execute();
if ($statement->error)
        {
            die('Database query failed: ' . $statement->error);
        }
        
$statement->bind_result($typep, $number, $name, $status, $id1c, $registered, $budget, $registry, $number2, $dategk, $cipher, $shortperformer);

// Расчет количества патентов с разными статусами
while($statement->fetch())
{
    switch ($status) {
        case "Действующий":
            $numvalid = $numvalid  + 1;
            //echo '<tr bgcolor="#80FF80">';
            break;
        case "Может прекратить действие":
            $mayterminate = $mayterminate + 1;
           // echo '<tr bgcolor="#FFA8A8">';
            break;
        case "Прекратил действие, но может быть восстановлен":
            $berestored = $berestored + 1;
           // echo '<tr bgcolor="#9599EE">';
            break;
        case "Прекратил действие":
            $terminate = $terminate + 1;
           // echo '<tr bgcolor="#C8C8C8">';
            break;
        default:
    }
}

//    $txt1 = toUnicodeEntities("Дейст"); 
    // Зададим значение и подписи
    $VALUES = Array($numvalid, $mayterminate, $berestored, $terminate);
    $LEGEND = Array("Действующий", "Может прекратить действие", "Прекратил действие, но может быть восстановлен", "Прекратил действие");

    // Удалим изображение, если оно есть
    unlink("graph1.png");
    
    // Создадим изображения
//    header("Content-Type: image/png");
//    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />;
    $im = ImageCreate(300, 250);
    
    // Зададим цвет фона. Немного желтоватый, для того, чтобы было
    // видно границы изображения на белом фоне.
    $bgcolor = ImageColorAllocate($im, 255, 255, 200);
    
    // Задание цвета элементов
    $COLORS[0] = imagecolorallocate($im, 128, 255, 128);
    $COLOR[0] = "#80FF80";
    $COLORS[1] = imagecolorallocate($im, 255, 168, 168);
    $COLOR[1] = "#FFA8A8";
    $COLORS[2] = imagecolorallocate($im, 149, 153, 238);
    $COLOR[2] = "#9599EE";
    $COLORS[3] = imagecolorallocate($im, 200, 200, 200);
    $COLOR[3] = "#C8C8C8";
    $COLORS[4] = imagecolorallocate($im, 98, 1, 96);
    $COLORS[5] = imagecolorallocate($im, 0, 62, 136);
    $COLORS[6] = imagecolorallocate($im, 0, 102, 179);
    $COLORS[7] = imagecolorallocate($im, 0, 145, 195);
    $COLORS[8] = imagecolorallocate($im, 0, 115, 106);
    $COLORS[9] = imagecolorallocate($im, 178, 210, 52);
    $COLORS[10] = imagecolorallocate($im, 137, 91, 74);
    $COLORS[11] = imagecolorallocate($im, 82, 56, 47);
    
    // Зададим цвета теней элементов
//    $SHADOWS[0] = imagecolorallocate($im, 205, 153, 0);
    $SHADOWS[0] = imagecolorallocate($im, 21, 182, 13);
    $SHADOWS[1] = imagecolorallocate($im, 170, 51, 0);
    $SHADOWS[2] = imagecolorallocate($im, 139, 0, 1);    
    $SHADOWS[3] = imagecolorallocate($im, 164, 0, 77);
    $SHADOWS[4] = imagecolorallocate($im, 48, 0, 46);
    $SHADOWS[5] = imagecolorallocate($im, 0, 12, 86);
    $SHADOWS[6] = imagecolorallocate($im, 0, 52, 129);
    $SHADOWS[7] = imagecolorallocate($im, 0, 95, 145);
    $SHADOWS[8] = imagecolorallocate($im, 0, 65, 56);
    $SHADOWS[9] = imagecolorallocate($im, 128, 160, 2);
    $SHADOWS[10] = imagecolorallocate($im, 87, 41, 24);
    $SHADOWS[11] = imagecolorallocate($im, 32, 6, 0);

// Вызов функции рисования диаграммы
Diagramm($im, $VALUES);

// Генерация изображения
ImagePNG($im, 'graph1.png');
imagedestroy($im);

?>