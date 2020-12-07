<?php 

namespace Framework;

class Registry 
{
    private static $instance = null;
    private $session;
    private $validator;

    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getSession(): Session
    {
        if (is_null($this->session)) {
            $this->session = SessionManager::getInstance();
        }
        return $this->session;
    }

    public function getValidator(): Validator
    {
        if (is_null($this->validator)) {
            $this->validator = Validator::getInstance();
        }
        return $this->validator;
    }


    public function getPdo() 
    {
        $dsn = "mysql:host=localhost;dbname=mooc";
        $user = "root";
        $passwd = "root";

        $pdo = new \PDO($dsn, $user, $passwd);

        return $pdo;
    }


}