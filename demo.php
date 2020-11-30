<?
require_once 'php/imgCreate.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Картинки</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
<form action="/" method="get">
    <input type="text" name="name">
    <select name="size" id="">
        <option value="big">big</option>
        <option value="med">med</option>
        <option value="min">min</option>
        <option value="mic">mic</option>
    </select>
    <input type="submit" value="Создать">
</form>
<br>
<?

$files = imgCreate::getAllImg();

for($i = 2; $i < count($files); $i++) {
    if($i>3){break;}
    if(strripos($files[$i], '_mic')){
        echo '<a href="\cache\\'.$files[$i].'"><img class="d-md-none" style="border: 1px solid black"src="\cache\\'.$files[$i].'"></a>';
    }else{
        echo '<a href="\cache\\'.$files[$i].'"><img class="d-none d-md-block" style="border: 1px solid black"src="\cache\\'.$files[$i].'"></a>';
    }
} ?>
</body>
</html>
