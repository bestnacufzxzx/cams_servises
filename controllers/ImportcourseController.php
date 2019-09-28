<?php

require __DIR__.'/../models/Importcourse.php';

class ImportcourseController
{
    private $container;
    public function __construct ($container) {
        $this->container = $container ['db'];
    }
    public function import($request, $response, $args) {
        $courses = new Courses($this->container);
        $coursesData = json_decode($request->getBody());
        $result = $courses->import($coursesData);
        return $response->withJson(array("result" => $result), 200);
    }
}