<?php
/**
 * Created by PhpStorm.
 * User: boonkuae_boo
 * Date: 6/19/16
 * Time: 13:26
 */

namespace Slim3Auth\Middleware;


class OldInputMiddleware extends Middleware
{
    public function __invoke($request, $response, $next)
    {

        $this->container->view->getEnvironment()->addGlobal('old',$_SESSION['old']);
        $_SESSION['old']= $request->getParams();

        $response = $next($request, $response);
        return $response;
    }
}
