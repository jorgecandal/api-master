<?php
require __DIR__ . '/../vendor/autoload.php';

use Silex\Application;
use Bip\Providers\ControllerServiceProvider;
use Bip\Providers\RouterServiceProvider;

$app = new Application();

$app['debug'] = true;

$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new ControllerServiceProvider());
$app->register(new RouterServiceProvider());

$app->run();


