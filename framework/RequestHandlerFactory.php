<?php

namespace Framework;

class RequestHandlerFactory implements RequestHandlerFactory_Interface {
    public static function makeRequestHandler(string $request='Index') : PageControllerCommand_Abstract {
        if (preg_match('/\W/', $request)) {
            throw new \Exception('illegal charcaters in request');
        }
        $class = "Apps\\handlers\\" . UCFirst(strtolower($request)) . 'Controller';
        if (!class_exists($class)) {
            throw new \Exception("No request handler class '$class' located");
        }

        $cmd = new $class(); //the reciever can go here
        return $cmd;
    }
}