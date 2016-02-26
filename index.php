<?php

use App\Router\Router;

require "application/classe.php";

$router = new Router($_GET['url']);
$router->get("/", function($id){echo "Bienvenue sur la Homepage";});
$router->get("/posts/:id", function($id){echo "Voici l'article $id";});
$router->run();