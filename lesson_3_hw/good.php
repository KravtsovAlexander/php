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

$server = $_SERVER;
if ($server['REQUEST_METHOD'] === 'GET') {
    $get = $_GET;
    $good = $goods[$get['id'] - 1];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/good.css">
    <title><?php echo $good['title'] ?></title>
</head>
<body>
    <div class="good">
        <?php if ($good): ?>
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
            <a href="/index.php">Назад</a>
        </div>
        <?php else: ?>
            <p class="error">Товар не найден</p>
        <?php endif; ?>
</body>
</html>