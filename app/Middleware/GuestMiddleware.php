<?php
/**
 * Created by PhpStorm.
 * User: boonkuae_boo
 * Date: 6/19/16
 * Time: 17:55
 */

namespace Slim3Auth\Middleware;


class GuestMiddleware  extends Middleware
{
    public function __invoke($request, $response, $next)
    {

        // check if user is sign or not signed in
        if ($this->container->auth->check()) {
            return $response->withRedirect($this->container->router->pathFor('home'));
        }

        $response = $next($request, $response);

        return $response;
    }
}
