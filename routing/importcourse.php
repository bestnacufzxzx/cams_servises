<?php 
require __DIR__.'/../controllers/ImportcourseController.php';

$app->post('/import', '\ImportcourseController:import');