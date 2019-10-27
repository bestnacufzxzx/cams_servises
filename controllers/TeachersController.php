<?php

require __DIR__.'/../models/Teachers.php';

class TeachersController
{
    private $container;
    public function __construct ($container) {
        $this->container = $container ['db'];
    }
    public function import($request, $response, $args) {
        $teacher = new Teachers($this->container);
        $teacherData = json_decode($request->getBody());
        $result = $teacher->import($teacherData);
        return $response->withJson(array("result" => $result), 200);
    }

    public function search(){
        $search = $this->input->post('search');
        $data['users'] =  $this->users_model->search($search);
        $this->load-view('index');
    }
}