<?php
$categories = [];
$content = '';
$user_name = 'Сергей';

$link = mysqli_connect("yeticave", "root", "", "yeticave");
mysqli_set_charset($link, "utf8");
if (!$link) {
    echo ("Ошибка подключения: " . mysqli_connect_error());
}
else {
    $sql = 'SELECT * FROM categories';
    $result = mysqli_query($link, $sql);
}

if ($result) {
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
else {
    echo("Ошибка MySQL: " . mysqli_error($link));
}


$sql_2 = "SELECT l.id, l.title, l.price_init, l.image, c.cat_name, l.date_exp
FROM lots as l
JOIN categories as c ON c.id = l.cat_id
WHERE l.date_exp > NOW()
ORDER BY l.pub_date DESC LIMIT 9";
$result2 = mysqli_query($link, $sql_2);
if ($result2) {
    $announcement = mysqli_fetch_all($result2, MYSQLI_ASSOC);
}
else {
    echo("Ошибка MySQL: " . mysqli_error($link));
}

$page_content = include_template('main.php', [
    'categories' => $categories,
    'announcement' => $announcement
]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => 'Главная',
    'user_name' => $user_name,
    'categories' => $categories
]);

function setPrice ($initial_number)
{
    $rounded_number = ceil($initial_number);

    if ($rounded_number >= 1000) {
        $formatted_number = number_format($rounded_number, 0, ',', ' ');
        $final_number = $formatted_number;
    } else {
        $final_number = $rounded_number;
    }

    $final_number_string = (string)($final_number);
    $final_number_string = $final_number_string . " " . "₽";
    echo ($final_number_string);
}

function getTimeExp($dateExp)
{
    $now       = time();
    $dateExpTS = strtotime($dateExp);
    $sec       = $dateExpTS - $now;
    $minTemp   = ceil($sec/60);
    $hours   = floor($minTemp/60);
    $mins    = ceil($minTemp - $hours*60);

    return [$hours, $mins];
}

function printTimeExp($hours, $mins)
{
    if ($hours < 10)
    {
        if ($mins < 10)
            echo ("0".$hours. ":" ."0".$mins);
        else
            echo ("0".$hours. ":" .$mins);
    }
    elseif ($mins < 10)
        echo ($hours. ":" ."0".$mins);
    else
        echo ($hours. ":" .$mins);
}

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();
    return $result;
}

echo ($layout_content);
?>
