<?php

namespace Framework;

//session_start();

class SessionManager {

    private static $instance;

    private function __construct()
    {

    }
    
    public static function getInstance()
    {
        if (empty(self::$instance)) 
        { 
            self::$instance = new SessionManager();
        }
        return self::$instance;
    }

    protected $access = ['profile' => ['batman']];

    //create(): create a new session;
    public function create() {
        if (!isset($_SESSION)) {
            session_start();
        }
        
    }

    //destroy(): destroy an existing session (effectively logging out a user). To use this method,
    // replace the Login link with a Logout link after the user logs in that, when clicked, calls 
    //the LoginController, invokes this method which logs out the user and returns them to the home page. 
    //Ensure that when the user clicks the log out link that all session data and any cookies placed in the 
    //user’s browser is cleared.
    public function destroy() {
        session_destroy();
        //destroy all cookies. for loop to loop through cookies and delete them

    }

    //add($name, $value): add a variable named $name with value $value to a session.
    public function add($name, $value) {

        $_SESSION[$name] = $value;
    }

    public function getSession() {
        return $_SESSION;
    }

    public function see($name) {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
        return null;
    }

    //remove($name): remove a variable named $name from session management.
    public function remove($name) {
        unset($_SESSION[$name]);
    }

    //accessible($user, $page): bool: Ensures that the pages associated with the user 
    //profile and courses can only be accessed by the logged in user.
    public function accessible($user, $page) {
        if (in_array($user, $this->access[$page])) {
            return true;
        }
        return false;
    }


}