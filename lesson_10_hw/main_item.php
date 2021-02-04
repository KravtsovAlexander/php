<?php
// подключить файлы Item и ItemStorage
// создать необходимые объекты, вызвать методы
require_once 'Item.php';
require_once 'ItemStorage.php';

$item1 = new Item('Item1', 1);
$item2 = new Item('Item2', 2);
$storage = new ItemStorage();

$storage->add_item($item1);
$storage->add_item($item2);
$item1->setMaterial('material1');
$item1->setPrice(100);

$item2->setMaterial('material2');
$item2->setPrice(200);

var_dump($storage->get_by_id(2));