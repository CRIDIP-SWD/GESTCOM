<?php

use App\Router\Router;

require "application/classe.php";

$router = new Router($_GET['url']);
$router->get("/", include('view/index.php?id=1'));
$router->get("/posts/:id", function($id){echo "Voici l'article $id";});
$router->run();