<?php

namespace Slim3Auth\Controllers;

use Slim\Views\Twig as View;

class HomeController extends Controller
{


    public function index($request, $response)
    {

        try{
            echo '<pre>';


            $user = $this->db->table('users')->where('id','=',1)->get();
            print_r($user);
            echo '<hr/>';

            $user =  $this->db->table('users')->find(1);
            print_r($user);
            echo '<hr/>';


        }catch(\Exception $e)
        {
            print_r($e->getMessage());
        }



        die;
        $this->view->render($response,"home.twig");
    }
}
