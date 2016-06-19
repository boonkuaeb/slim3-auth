<?php

namespace Slim3Auth\Controllers\Auth;

use Slim3Auth\Controllers\Controller;

class AuthController extends Controller
{

    public function getSignUp($request, $response)
    {
        return $this->view->render($response, "auth/signup.twig");
    }

    public function postSignUp($request, $response)
    {

    }
}
