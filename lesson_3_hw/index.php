<?php
$goods = [
    [
        'id' => 1,
        'title' => 'Flute',
        'price' => 20000,
        'img' => 'flute.jpg',
        'description' => [
            'color' => 'white',
            'material' => 'bamboo'
        ]
    ],
    [
        'id' => 2,
        'title' => 'Гитара',
        'price' => 18000,
        'img' => 'guitar.jpg',
        'description' => [
            'color' => 'brown',
            'material' => 'linden'
        ]
    ],
    [
        'id' => 3,
        'title' => 'Барабан',
        'price' => 68000,
        'img' => 'drum.jpg',
        'description' => [
            'color' => 'brown',
            'material' => 'steel'
        ]
    ],
];

$items = [
    [
        'title' => 'Телефон',
        'price' => 100000,
        'count' => 4
    ],
    [
        'title' => 'Часы',
        'price' => 500000,
        'count' => 2
    ],
    [
        'title' => 'Кольцо',
        'price' => 80000,
        'count' => 10
    ],
    [
        'title' => 'Браслет',
        'price' => 120000,
        'count' => 7
    ],
    [
        'title' => 'Галстук',
        'price' => 8000,
        'count' => 50
    ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>php_lesson3_hw</title>
</head>

<body>
    <section>
        <h1><i>1. Вывести в html информацию о товарах из массива $goods. Информацию о характеристиках товара (description) выводить в таблице.</i></h1>
        <?php foreach ($goods as $good) : ?>
            <div class="card">
                <h3><?php echo $good['title'] ?></h3>
                <p>Цена: <?php echo $good['price'] ?></p>
                <img src="img/goods/<?php echo $good['img'] ?>" alt="<?php echo $good['title'] ?>" height=200 width=200>
                <table>
                    <?php foreach ($good['description'] as $key => $value) : ?>
                        <tr>
                            <?php switch ($key):
                                case 'color': ?>
                                    <th>Цвет:</th>
                                    <?php break ?>
                                <?php
                                case 'material': ?>
                                    <th>Материал:</th>
                                    <?php break ?>
                            <?php endswitch; ?>
                            <td><?php echo $value ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <a href="/good.php?id=<?php echo $good['id'] ?>" class="link">Подробнее</a>
            </div>
        <?php endforeach; ?>
    </section>

    <section>
        <h2><i>2. Отсортировать массив по price. Используйте функцию для работы с массивами (вручную сортировать не нужно).</i></h2>

        <?php
        var_dump($items);
        echo '------------------------------------------------------------';
        $priceArr = [];
        foreach ($items as $item) {
            $priceArr[] = $item['price'];
        }
        array_multisort($priceArr, $items);
        var_dump($items);

        // function compare($a, $b) {
        //   return $a['price'] <=> $b['price'];
        // }
        // usort($items, "compare");
        ?>
    </section>

    <section>
        <h2><i>3. Задача про спортсмена.</i></h2>

        <?php
        /*
                Дано:
            $x - количество километров, которое спортсмен пробежал в первый день
            $y - количество километров (не может быть меньше $x)

            В первый день спортсмен пробежал $x километров, а затем он каждый день увеличивал пробег на 10% от предыдущего значения.
            Определить номер дня, на который пробег спортсмена составит не менее $y километров.
            */
        $x = 60;
        $y = 1000;
        $days = 0;
        $distance = 0;

        while ($distance < $y) {
            $distance += $x;
            $days++;
            var_dump("День: $days, пройдено за этот день: $x, пройдено всего: $distance");
            $x *= 1.1;
        }
        var_dump($days);
        ?>
        <?php ?>
    </section>
</body>

</html>