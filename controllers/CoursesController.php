<?php

require __DIR__.'/../models/Courses.php';

class CoursesController
{
    private $container;
    public function __construct ($container) {
      $this->container = $container ['db'];
    }
    public function home($request, $response, $args) {
      // your code here
      // use $this->view to render the HTML
      $course = new Courses($this->container);
      return $response->withJson($course->getAllCourse(), 200);
    }
}