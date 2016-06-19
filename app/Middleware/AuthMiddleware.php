<?php
/**
 * Created by PhpStorm.
 * User: boonkuae_boo
 * Date: 6/19/16
 * Time: 13:26
 */

namespace Slim3Auth\Middleware;


class AuthMiddleware extends Middleware
{
    public function __invoke($request, $response, $next)
    {

        // check if user is sign or not signed in
        if(!$this->container->auth->check())
        {
            $this->container->flash->addMessage('error','Please sign in before doing that.');
            return $response->withRedirect($this->container->router->pathFor('auth.signin'));
        }


        $response = $next($request, $response);
        return $response;
    }
}
