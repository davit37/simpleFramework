<?php

namespace ModernFramework;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;

class App implements HttpKernelInterface
{
    public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true)
    {
        include __DIR__ . '/../config/routes.php';
  
        $context = new RequestContext();
        $context->fromRequest($request);
        
        $matcher = new UrlMatcher($routes, $context);
        
        $controllerResolver =new ControllerResolver();
        $argumentResolver =new ArgumentResolver();

        try {
            $request->attributes->add($matcher->match($request->getPathInfo()));
            $controller = $controllerResolver->getController($request);
            $arguments = $argumentResolver->getArguments($request, $controller);
            return call_user_func_array($controller, $arguments);

        }
        catch (ResourceNotFoundException $e) {
            return new Response('Halaman tidak ditemukan', Response::HTTP_NOT_FOUND);
        }
   
    }
}