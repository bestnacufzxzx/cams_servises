<?php 

require __DIR__.'/../config/config.php';

$app->group('/courses', function ($app) {

    require 'courses.php';
       
});

$app->group('/teachers', function ($app) {

    require 'teachers.php';
       
});

$app->group('/showimportlecturers', function ($app) {

    require 'showimportlecturers.php';
       
});

$app->group('/showimportstudent', function ($app) {

    require 'showimportstudent.php';
       
});

$app->group('/importcourse', function ($app) {

    require 'importcourse.php';
       
});