<?php
/**
 * Created by PhpStorm.
 * User: boonkuae_boo
 * Date: 6/19/16
 * Time: 15:23
 */

namespace Slim3Auth\Auth;


use Slim3Auth\Models\User;

class Auth
{
    public function user()
    {
        return User::find($_SESSION['user']);
    }

    public function check()
    {
        return isset($_SESSION['user']);
    }

    public function attempt($email, $password)
    {
        // Grap the user by email
        $user = User::where('email',$email)->first();
        // if !user return false
        if(!$user)
        {
            return false;
        }
        // verify password for that user
        if(password_verify($password, $user->password))
        {
            // set into session
            $_SESSION['user'] = $user->id;
            return true;
        }
        return false;

    }

}
