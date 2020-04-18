<?php
$user_name = 'Сергей';

$categories = [
    "Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"
];

$announcement = [
    [
        'title' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' => 10199,
        'pictures_url' => 'img/lot-1.jpg',
        'last_day' => '2020-04-20'
    ],
    [
        'title' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => 159999,
        'pictures_url' => 'img/lot-2.jpg',
        'last_day' => '2020-04-20'
    ],
    [
        'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => 8000,
        'pictures_url' => 'img/lot-3.jpg',
        'last_day' => '2020-04-22'
    ],
    [
        'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => 10999,
        'pictures_url' => 'img/lot-4.jpg',
        'last_day' => '2020-04-30'
    ],
    [
        'title' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => 7500,
        'pictures_url' => 'img/lot-5.jpg',
        'last_day' => '2020-04-30'
    ],
    [
        'title' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => 5400,
        'pictures_url' => 'img/lot-6.jpg',
        'last_day' => '2020-04-30'
    ]
];

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
