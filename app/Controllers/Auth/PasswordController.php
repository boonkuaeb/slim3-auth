<?php

namespace Slim3Auth\Controllers\Auth;



use Respect\Validation\Validator as v;
use Slim3Auth\Controllers\Controller;
use Slim3Auth\Models\User;

class PasswordController extends Controller
{
    public function getChangePassword($request, $response)
    {
        return $this->view->render($response, "auth/password/change.twig");

    }

    public function postChangePassword($request, $response)
    {

    }
}
