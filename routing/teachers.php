<?php 
require __DIR__.'/../controllers/TeachersController.php';

$app->post('/import', '\TeachersController:import');