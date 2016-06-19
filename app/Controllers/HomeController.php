<?php

namespace Slim3Auth\Controllers;

use Slim\Views\Twig as View;

class HomeController extends Controller
{


    public function index($request, $response)
    {
        $this->view->render($response,"home.twig");
    }
}
