<?php

require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;

// Токен приложения
$key = 'AIzaSyCgdXxYAzkx_mwBM3NbJxRQcFjzRTUnqBc';

// Идентификатор вашей поисковой системы
$cx = '001788732013948528524:c2fmvqi5cps';

// Формируем запрос
$q = http_build_query(array(
    'key' => $key,
    'cx'  => $cx,
    'q'   => 'car 2018' // запрос для поиска
));

// Инициализация клиента
$client = new Client(array(
    'base_uri' => 'https://www.googleapis.com/customsearch/v1',
    'query'    => $q,
    'timeout'  => 3.0,
    'searchType' => 'image',
    'debug'    => false,
    'headers'  => array(
    'Accept' => 'application/json'
    ),
));

// отправка запроса и получение результатов поиска
$response = $client->request('GET');
$results = json_decode($response->getBody()->getContents(), true);

// print_r($results);
var_dump($results).'<p>';
//  print_r($results);

echo $results->url->queries->request->title;

