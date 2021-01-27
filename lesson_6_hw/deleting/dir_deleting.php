<?php

$dir_name = 'dir_for_deleting';
if (!file_exists($dir_name)) {
    mkdir($dir_name);
    mkdir("$dir_name/inner_dir");
    for ($i = 0; $i < 3; $i++) {
        file_put_contents("$dir_name/file$i.txt", 'data');
    }
    for ($i = 0; $i < 2; $i++) {
        file_put_contents("$dir_name/inner_dir/inner_file$i.txt", 'data');
    }
    echo "Директория с файлами для удаления создана";
} else {
    echo "Директория с именем: $dir_name уже существует";
}

// delete_dir($dir_name);


function delete_dir(string $dir_name) {
    if (is_dir($dir_name)) {
        if ($dh = opendir($dir_name)) {
            while (($file = readdir($dh)) !== false) {
                if ($file !== '.' && $file !== '..') {
                    if (is_dir("$dir_name/$file")) {
                        delete_dir("$dir_name/$file");
                    } else {
                        unlink("$dir_name/$file");
                        var_dump("$file удален");
                    }
                }
            }
            closedir($dh);
            rmdir($dir_name);
            var_dump("Директория $dir_name удалена");
            return true;
        }
    } else {
        var_dump("Не удалось");
        return false;
    }
}
