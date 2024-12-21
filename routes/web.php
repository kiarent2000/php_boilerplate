<?php
use App\Config;
use App\Workers\MainWorker;


$router->get('/dashboard', [MainWorker::class, 'run']);



$router->get('/', function () {
    return 'Welcome to the app   '. Config::get('app_name');
});