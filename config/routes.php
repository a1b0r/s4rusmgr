<?php

use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class)->setName('home');
    $app->get('/users/{id}', \App\Action\UserReadAction::class);
    $app->delete('/users/{id}', \App\Action\UserDeleteAction::class);
    $app->post('/users', \App\Action\UserCreateAction::class);
    $app->get('/users', \App\Action\UserListAction::class);
};
