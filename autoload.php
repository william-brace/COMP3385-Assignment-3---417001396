<?php 
spl_autoload_register(function($class) {
    
    $parts = explode('\\', $class);
    $class = $parts[count($parts)-1];
    
    if (!defined('APP_DIR')) {
        define ("ROOT_DIR", "/Users/williambrace/417001396 - Assignment 3");
        define("APP_DIR", ROOT_DIR . "/app");
        define("FRAMEWORK_DIR", ROOT_DIR . "/framework");
        define("DATA_DIR", ROOT_DIR . "/data");
        define("TPL_DIR", ROOT_DIR . "/tpl");

    }
    if (file_exists(APP_DIR . "/" . $class . ".php")) {
        require APP_DIR . "/" . $class . ".php";
    }
    else if (file_exists(FRAMEWORK_DIR . "/" . $class . ".php")) {
        require FRAMEWORK_DIR . "/" . $class . ".php";
    }
    else if (file_exists(DATA_DIR . "/" . $class . ".php")) {
        require DATA_DIR . "/" . $class . ".php";
    }
    else if (file_exists(TPL_DIR . "/" . $class . ".php")) {
        require TPL_DIR . "/" . $class . ".php";
    }
    // else {
    //     trigger_error("Cannote find class/interface/abstract definition:" . $class, E_USER_ERROR);
    // }
});