<?php

namespace Framework;

interface RequestHandlerFactory_Interface {
    public static function makeRequestHandler(string $request='Index') : PageControllerCommand_Abstract;
}