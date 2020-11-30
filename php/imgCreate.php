<?php

require_once 'DataBase.php';

class imgCreate extends DataBase
{
    private $font =__DIR__.'./font/Roboto-Light.ttf';

    static public function getAllImg(){
        $dir    =  'cache/';
        $files = scandir($dir);
        return $files;
    }

    protected function checkImg($query){
        $filename = $_SERVER['DOCUMENT_ROOT'].'\\cache\\'.$_GET['name']. '_' . $_GET['size'] . '.png';

        if (file_exists($filename)) {
           echo 'Картинка с этими данными уже есть. <br>';
           echo '<img style="border: 1px solid black"src="\\cache\\'.$_GET['name']. '_' . $_GET['size'] . '.png"><br>';
           echo 'Сделать новую картинку <br> <a href="/demo.php">Сделать</a>';

           return true;
        }
        if (empty($_GET['name'])) {
            echo 'Необходимо придумать имя <br> <a href="/demo.php">придумать</a>';
            return true;
        }
        if(empty($query)){
            echo 'Нужен правильный размер <br> <a href="/demo.php">выбрать</a>';
            return true;
        }
        return false;
    }

    public function createImg(){

        $query = $this->query('SELECT * FROM `sizeimg` WHERE `name` = "'.$_GET['size'].'";');

        $query = $query[0];

        if($this->checkImg($query)){
            return false;
        }


        $im = imagecreatetruecolor($query['size_x'], $query['size_y']);

        $bgc = imagecolorallocate($im, 255, 255, 255);
        $color = imagecolorallocate($im, 0, 0, 0 );
        imagefilledrectangle($im, 0, 0, $query['size_x'], $query['size_y'], $bgc);

        $text = 'Имя картинка : ' . $_GET['name'] . '.';
        imagettftext($im, 10, 0, 0, 20, $color, $this->font, $text);

        $text = 'А размер её ' .  $query['size_x'] . ' * ' .  $query['size_y'] . 'px';
        imagettftext($im, 10, 0, 0, 35, $color, $this->font, $text);

        $png = imagecreatefrompng( $_SERVER['DOCUMENT_ROOT'] . '/gallery/medium_8261d907c7a89c2e63352a5e559e0a81.png');

        imagecopy($im, $png,0, 0, 0, 0, 200, 200);

        imagepng($im, $_SERVER['DOCUMENT_ROOT'].'\\cache\\'.$_GET['name']. '_' . $_GET['size'] . '.png');

        imagedestroy($im);

        echo 'Изображение создано. <br><img style="border: 1px solid black"src="\\cache\\'.$_GET['name']. '_' . $_GET['size'] . '.png"><br>';
        echo 'Сделать новую картинку <br> <a href="/demo.php">Сделать</a>';

    }
}