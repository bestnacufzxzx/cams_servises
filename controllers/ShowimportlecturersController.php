<?php

require __DIR__.'/../models/Showimportlecturers.php';

class ShowimportlecturersController
{
    private $container;
    public function __construct ($container) {
      $this->container = $container ['db'];
    }
    public function home($request, $response, $args) {
      // your code here
      // use $this->view to render the HTML
      $course = new Showimportlecturers($this->container);
      return $response->withJson($course->getAllShowimportlecturers(), 200);
    }
}