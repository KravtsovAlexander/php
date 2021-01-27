<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lesson6_hw</title>
</head>
<body>
    <form action="multi_upload_handler.php" method="POST" enctype="multipart/form-data">
        <p>Только текстовые файлы (.txt) размером не более 5 kB</p>
        <div>
            <input accept=".txt" type="file" multiple name="txt_files[]">
        </div>
        <input type="submit" value="Отправить">
    </form>
</body>
</html>