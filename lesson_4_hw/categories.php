<?php
ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '256');
ini_set('xdebug.var_display_max_data', '1024');

$categories = [
    [
        'id' => '1',
        'parent_category' => null,
        'title' => 'Смартфоны и гаджеты'
    ],
    [
        'id' => '2',
        'parent_category' => null,
        'title' => 'Компьютеры'
    ],
    [
        'id' => '3',
        'parent_category' => null,
        'title' => 'Бытовая техника'
    ],
    [
        'id' => '4',
        'parent_category' => '1',
        'title' => 'Смартфоны'
    ],
    [
        'id' => '5',
        'parent_category' => '1',
        'title' => 'Смарт-часы и браслеты'
    ],
    [
        'id' => '6',
        'parent_category' => '1',
        'title' => 'Сотовые телефоны'
    ],
    [
        'id' => '7',
        'parent_category' => '4',
        'title' => 'Влагозащищенные'
    ],
    [
        'id' => '8',
        'parent_category' => '4',
        'title' => 'С функцией бесконтактной оплаты'
    ],
    [
        'id' => '9',
        'parent_category' => '5',
        'title' => 'Спортивные'
    ],
    [
        'id' => '10',
        'parent_category' => '5',
        'title' => 'Детские'
    ],
    [
        'id' => '11',
        'parent_category' => '5',
        'title' => 'С сенсорным дисплеем'
    ],
    [
        'id' => '12',
        'parent_category' => '6',
        'title' => 'Раскладушки'
    ],
    [
        'id' => '13',
        'parent_category' => '6',
        'title' => 'Слайдеры'
    ],
    [
        'id' => '14',
        'parent_category' => '6',
        'title' => 'Моноблоки'
    ],
    [
        'id' => '15',
        'parent_category' => '2',
        'title' => 'Ноутбуки'
    ],
    [
        'id' => '16',
        'parent_category' => '2',
        'title' => 'Моноблоки'
    ],
    [
        'id' => '17',
        'parent_category' => '2',
        'title' => 'Системные блоки'
    ],
    [
        'id' => '18',
        'parent_category' => '15',
        'title' => 'Ультрабуки'
    ],
    [
        'id' => '19',
        'parent_category' => '15',
        'title' => 'Нетбуки'
    ],
    [
        'id' => '20',
        'parent_category' => '15',
        'title' => 'Трансформеры'
    ],
    [
        'id' => '21',
        'parent_category' => '17',
        'title' => 'Игровые'
    ],
    [
        'id' => '22',
        'parent_category' => '17',
        'title' => 'Для учебы'
    ],
    [
        'id' => '23',
        'parent_category' => '3',
        'title' => 'Приготовление пищи'
    ],
    [
        'id' => '24',
        'parent_category' => '3',
        'title' => 'Приготовление напитков'
    ],
    [
        'id' => '25',
        'parent_category' => '3',
        'title' => 'Холодильное оборудование'
    ],
    [
        'id' => '26',
        'parent_category' => '3',
        'title' => 'Уборка'
    ],
    [
        'id' => '27',
        'parent_category' => '23',
        'title' => 'Плиты'
    ],
    [
        'id' => '28',
        'parent_category' => '23',
        'title' => 'Пароварки'
    ],
    [
        'id' => '29',
        'parent_category' => '23',
        'title' => 'Мультиварки'
    ],
    [
        'id' => '30',
        'parent_category' => '24',
        'title' => 'Электрочайники'
    ],
    [
        'id' => '31',
        'parent_category' => '24',
        'title' => 'Кофемашины'
    ],
    [
        'id' => '32',
        'parent_category' => '25',
        'title' => 'Холодильники'
    ],
    [
        'id' => '33',
        'parent_category' => '25',
        'title' => 'Морозильные шкафы'
    ],
    [
        'id' => '34',
        'parent_category' => '25',
        'title' => 'Винные шкафы'
    ],
    [
        'id' => '35',
        'parent_category' => '26',
        'title' => 'Пылесосы'
    ],
    [
        'id' => '36',
        'parent_category' => '26',
        'title' => 'Роботы-пылесосы'
    ]

];


// элегантное решение подсмотренное в интернете :) С рекурсией
function getMultiArrRecursive(array $arr, $parentId = null)
{
    $newArr = [];
    foreach ($arr as $elem) {
        if ($elem['parent_category'] === $parentId) {
            $children = getMultiArrRecursive($arr, $elem['id']);
            if ($children) {
                $elem['children'] = $children;
            }
            $newArr[] = $elem;
        }
    }

    return $newArr;
}

// монструозное решение придуманное самостоятельно. Без рекурсии.
function getAssocArr($arr)
{
    $keys = [];
    foreach ($arr as $elem) {
        $keys[] = $elem['id'];
    }
    return array_combine($keys, $arr);
}


function getAllParents(array $arr)
{
    $parents = [];
    foreach ($arr as $elem) {
        if ($elem['parent_category']) {
            $parents[] = $elem['parent_category'];
        }
    }

    $parents = array_unique($parents);
    rsort($parents);
    return $parents;
}


function getElemesWithoutChildren(array $arr, array $parents)
{
    $allIds = [];
    foreach ($arr as $elem) {
        $allIds[] = $elem['id'];
    }
    $children = array_diff($allIds, $parents);
    sort($children);
    return $children;
}


function getMultiArr(array $arr)
{
    $elemsWithChildrenIds = getAllParents($arr);
    $elemsWithoutChildrenIds = getElemesWithoutChildren($arr, $elemsWithChildrenIds);
    $tmpArr = getAssocArr($arr);
    foreach ($elemsWithoutChildrenIds as $id) {
        $parentId = $tmpArr[$id]['parent_category'];
        $tmpArr[$parentId]['children'][] = $tmpArr[$id];
        unset($tmpArr[$id]);
    }
    foreach ($elemsWithChildrenIds as $id) {
        $parentId = $tmpArr[$id]['parent_category'];
        if ($parentId) {
            $tmpArr[$parentId]['children'][] = $tmpArr[$id];
            unset($tmpArr[$id]);
        }
    }
    return array_values($tmpArr);
}


// $multiArr = getMultiArrRecursive($categories);
// $multiArr = getMultiArr($categories);
var_dump($multiArr);
