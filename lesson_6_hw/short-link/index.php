<?php

require_once 'functions.php';

$server = $_SERVER;
if ($server['REQUEST_METHOD'] === 'POST') {
    $domain = 'https://short.link/';
    $db_file = 'db.json';

    $post = $_POST;
    $url = $post['url'];

    $url = trim($url);
    if (!$url) {
        $message = 'Строка не должна быть пустой!';
    } elseif (($url = filter_var($url, FILTER_VALIDATE_URL)) === false) {
        $message = 'Неверный тип ссылки';
    } elseif (($id = get_id($db_file, $url)) !== false) {
        $short_link = $domain . $id;
    } else {

        do {
            $id = generate_id($url);
        } while (check_for_match($db_file, $id));

        add_link($db_file, $url, $id);
        $short_link = $domain . $id;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Get Short link</title>
</head>

<body>
    <form action="index.php" method="POST">
        <div class="input">
            <input type="url" placeholder="Введите ссылку, которую хотите сократить" name="url">
            <?php if (isset($message)) : ?>
                <p><?php echo $message ?></p>
            <?php endif; ?>
        </div>
        <div class="btn">
            <input type="submit" value="Сократить">
        </div>
    </form>

    <?php if (isset($short_link)) : ?>
        <div class="output">
            <p>Ваша ссылка:</p>
            <p><?php echo $short_link ?></p>
        </div>
    <?php endif; ?>
</body>

</html>