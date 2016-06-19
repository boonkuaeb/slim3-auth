<?php

namespace Slim3Auth\Controllers\Auth;


use Respect\Validation\Validator as v;
use Slim3Auth\Controllers\Controller;

class PasswordController extends Controller
{
    public function getChangePassword($request, $response)
    {
        return $this->view->render($response, "auth/password/change.twig");

    }

    public function postChangePassword($request, $response)
    {
        $validation = $this->validator->validate($request, [
            'password_old' => v::noWhitespace()->notEmpty()->matchesPassword($this->auth->user()->password),
            'password' => v::noWhitespace()->notEmpty()
        ]);

        if ($validation->failed()) {
            $this->flash->addMessage('error', 'Could not change password with those details.');

            return $this->view->render($response, "auth/password/change.twig");
        }

        sd('change');
    }
}
