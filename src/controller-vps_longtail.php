<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormError;

// blog.php
$blog = $app['controllers_factory'];
$blog->get('/', function () { return 'Blog home page'; });

$app->match('/vps_hosting/articles/cheap-vps.html', function() use ($app) {
    return $app['twig']->render(
        '/../vps_hosting/articles/cheap-vps.html.twig');
})->bind('longtail_cheap_vps_test');

$app->match('/vps_hosting/articles/best-vps.html', function() use ($app) {
    return $app['twig']->render(
        '/../vps_hosting/articles/best-vps.html.twig');
})->bind('longtail_best_vps_test');


