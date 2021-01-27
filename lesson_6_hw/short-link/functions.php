<?php

function generate_id(string $url)
{
    return substr(md5($url . mt_rand()), 0, 6);
}


function get_id(string $db_file, string $url)
{
    $data = file_get_contents($db_file);

    if (!$data) {
        return false;
    }

    $arr = json_decode($data, JSON_OBJECT_AS_ARRAY);
    foreach ($arr as &$link) {
        if ($link['url'] === $url) {
            $link['date'] = date(DATE_RSS);
            file_put_contents($db_file, json_encode($arr));
            return $link['id'];
        }
    }
    return false;
}


function add_link(string $db_file, string $url, string $id)
{
    $data = file_get_contents($db_file);
    if ($data) {
        $arr = json_decode($data, JSON_OBJECT_AS_ARRAY);
    } else {
        $arr = [];
    }
    $new_link = [
        'url' => $url,
        'id' => $id,
        'date' => date(DATE_RSS)
    ];

    array_push($arr, $new_link);
    file_put_contents($db_file, json_encode($arr));
    return true;
}


function check_for_match(string $db_file, string $id)
{
    $data = file_get_contents($db_file);
    if (!$data) {
        return false;
    }
    $arr = json_decode($data, JSON_OBJECT_AS_ARRAY);
    foreach ($arr as $link) {
        if ($link['id'] === $id) {
            return true;
        }
    }
}
