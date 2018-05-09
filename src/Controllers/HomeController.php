<?php
namespace SimpleMvc\Controllers;

use SimpleMvc\Core\Mvc\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $this->render([
            'path' => 'home/index',
            'model' => ['name' => 'Наме'],
        ]);
    }
}