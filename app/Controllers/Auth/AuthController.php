<?php

namespace Slim3Auth\Controllers\Auth;

use Slim3Auth\Controllers\Controller;
use Slim3Auth\Models\User;

class AuthController extends Controller
{

    public function getSignUp($request, $response)
    {
        return $this->view->render($response, "auth/signup.twig");
    }

    public function postSignUp($request, $response)
    {

        User::create(
            [
                'email' => $request->getParam('email'),
                'name' => $request->getParam('name'),
                'password' => password_hash( $request->getParam('password'),PASSWORD_DEFAULT)
            ]
        );

        return $response->withRedirect($this->router->pathFor('home'));

    }
}
