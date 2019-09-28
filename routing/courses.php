<?php 
require __DIR__.'/../controllers/CoursesController.php';

$app->get('/', '\CoursesController:home');