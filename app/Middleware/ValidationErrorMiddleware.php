<?php
/**
 * Created by PhpStorm.
 * User: boonkuae_boo
 * Date: 6/19/16
 * Time: 13:06
 */

namespace Slim3Auth\Middleware;


class ValidationErrorMiddleware extends Middleware
{
    public function __invoke($request, $response, $next)
    {

        $this->container->view->getEnvironment()->addGlobal('errors',$_SESSION['errors']);
        unset($_SESSION['errors']);

        $response = $next($request, $response);
        return $response;
    }
}
