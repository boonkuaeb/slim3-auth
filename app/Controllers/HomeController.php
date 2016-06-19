<?php

namespace Slim3Auth\Controllers;

use Slim\Views\Twig as View;
use Slim3Auth\Models\User;

class HomeController extends Controller
{


    public function index($request, $response)
    {
        $user  = User::find(1);
        var_dump($user->email);

        $user = User::where('email','john.kuae@gmail.com')->first();
        echo "<pre>";
        print_r($user->name);


        User::Create(
            [
                'name' => 'NaN',
                'email'=>'nan@nan.com',
                'password' => 'e121212'
            ]
        );

        die;
        $this->view->render($response,"home.twig");
    }
}
