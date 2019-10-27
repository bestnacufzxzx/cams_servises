<?php

require __DIR__.'/../models/Showimportstudent.php';

class ShowimportstudentController
{
    private $container;
    public function __construct ($container) {
      $this->container = $container ['db'];
    }
    public function home($request, $response, $args) {
      // your code here
      // use $this->view to render the HTML
      $course = new Showimportstudent($this->container);
      return $response->withJson($course->getAllShowimportstudent(), 200);
    }

    public function search(){
      $search = $this->input->post('search');
      $data['users'] =  $this->users_model->search($search);
      $this->load-view('index');
  }
}