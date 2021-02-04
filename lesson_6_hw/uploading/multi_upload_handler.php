<?php

$files = $_FILES;

$txt_files = $files['txt_files'];

$invalid_type = check_type($txt_files);
$invalid_size = check_size($txt_files);

$bad_files = [];
$good_files = [];
foreach ($txt_files['name'] as $key => $file_name) {
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_name = md5($file_name . microtime()) . '.' . $ext;
    $tmp_name = $txt_files['tmp_name'][$key];

    if (move_uploaded_file($tmp_name, "storage/$new_file_name")) {
        array_push($good_files, $file_name);
    } else {
        array_push($bad_files, $file_name);
    }
}

show_message($good_files, $bad_files, $invalid_size, $invalid_type);


function check_type(array &$arr)
{
    $arr_for_invalid = [];
    foreach ($arr['type'] as $key => $file) {
        if ($file !== 'text/plain') {
            array_push($arr_for_invalid, $arr['name'][$key]);
            foreach ($arr as &$file_prop) {
                unset($file_prop[$key]);
            }
        }
    }
    return $arr_for_invalid;
}


function check_size(array &$arr)
{
    $arr_for_invalid = [];
    foreach ($arr['size'] as $key => $file) {
        if ($file > (5 * 1024)) {
            $invalid_file = [
                'name' => $arr['name'][$key],
                'size' => round(($arr['size'][$key] / 1024), 1) . ' kB'
            ];
            array_push($arr_for_invalid, $invalid_file);
            foreach ($arr as &$file_prop) {
                unset($file_prop[$key]);
            }
        }
    }
    return $arr_for_invalid;
}


function show_message($good_files, $bad_files, $invalid_size, $invalid_type)
{
    $count = count($good_files);
    echo "Успешно загружено ($count): ";
    foreach ($good_files as $file) {
        echo "$file, ";
    }

    $count = count($bad_files) + count($invalid_type) + count($invalid_size);
    if ($count) {
        echo '<br>';
        echo "Не удалось загрузить ($count):";
        if ($invalid_type) {
            echo '<br>';
            echo 'Недопустимый тип файла: ';
            foreach ($invalid_type as $file_name) {
                echo "$file_name, ";
            }
        }
        if ($invalid_size) {
            echo '<br>';
            echo 'Недопустимый размер файла: ';
            foreach ($invalid_size as $file) {
                echo "{$file['name']} ({$file['size']}), ";
            }
        }
        if ($bad_files) {
            echo '<br>';
            echo 'Ошибка загрузки: ';
            foreach ($bad_files as $file_name) {
                echo "$file_name, ";
            }
        }
    }
}

