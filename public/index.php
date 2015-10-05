<?php
require getcwd() . '/../vendor/autoload.php';
$app = new Slim\Slim();
$app->config('debug', true);

$json = new SlimJson\Middleware([
  'json.status' => true,
  'json.override_error' => true,
  'json.override_notfound' => true,
  'json.debug' => $app->config('debug')
]);

$app->add(new besimpler\Slim\AuthMiddleware(
  $app->request()->get('userToken'),
  $app->request()->get('accessToken')
));

$app->add($json);

$app->response->headers->set('Access-Control-Allow-Origin', '*');
$app->response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, OPTIONS');
$app->response->headers->set('Access-Control-Allow-Headers', 'origin, content-type, accept');
$app->response->headers->set('X-Powered-By', 'besimpler');
$app->response->headers->set('X-Recruiting', '[unique *funny* message here] founders@besimpler.com');

require 'routes-v1.php';

$app->run();
