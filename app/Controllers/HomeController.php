<?php

namespace Slim3Auth\Controllers;


class HomeController extends Controller
{


    public function index($request, $response)
    {
        $this->view->render($response,"home.twig");
    }
}
