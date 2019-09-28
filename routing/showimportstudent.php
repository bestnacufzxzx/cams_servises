<?php 
require __DIR__.'/../controllers/ShowimportstudentController.php';

$app->get('/', '\ShowimportstudentController:home');