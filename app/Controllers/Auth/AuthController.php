<?php

namespace Slim3Auth\Controllers\Auth;

use Respect\Validation\Validator as v;
use Slim3Auth\Controllers\Controller;
use Slim3Auth\Models\User;

class AuthController extends Controller
{
    public function getSignOut($request, $response)
    {
        $this->auth->logout();
        $this->flash->addMessage('info','You have been sign out!');
        return $response->withRedirect($this->router->pathFor('home'));

    }


    public function getSignIn($request, $response)
    {
        return $this->view->render($response, "auth/signin.twig");
    }

    public function postSignIn($request, $response)
    {
        $validation = $this->validator->validate($request,
            [
                'email' => v::noWhitespace()->notEmpty()->email(),
                'password' => v::noWhitespace()->notEmpty(),
            ]);

        if ($validation->failed()) {
            $this->flash->addMessage('error','Could not sign you in with those details.');
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }

        $auth = $this->auth->attempt(
            $request->getParam('email'),
            $request->getParam('password')
        );

        if (!$auth) {
            $this->flash->addMessage('error','Could not sign you in with those details.');
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }

        $this->flash->addMessage('info','You have been sign in!');
        return $response->withRedirect($this->router->pathFor('home'));

    }


    public function getSignUp($request, $response)
    {
        return $this->view->render($response, "auth/signup.twig");
    }

    public function postSignUp($request, $response)
    {
        $validation = $this->validator->validate($request,
            [
                'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
                'name' => v::notEmpty()->alpha(),
                'password' => v::noWhitespace()->notEmpty(),
            ]);

        if ($validation->failed()) {
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }

        $user = User::create(
            [
                'email' => $request->getParam('email'),
                'name' => $request->getParam('name'),
                'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT)
            ]
        );

        $this->flash->addMessage('success','You have been sign up!');

        $this->auth->attempt($user->email, $request->getParam('password'));

        return $response->withRedirect($this->router->pathFor('home'));

    }
}
