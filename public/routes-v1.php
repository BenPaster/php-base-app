<?php
// API Version One
$app->group('/v1', function () use ($app) {
  $app->get('/route', 'Product\v1\Controller\Endpoint:method');
});
