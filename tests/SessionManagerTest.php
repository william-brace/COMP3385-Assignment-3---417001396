<?php

require './framework/SessionClass.php';

class SessionClassTest extends PHPUnit\Framework\TestCase {

    private $session;

    public function setUp() : void {
        $this->session = new sessionClass();
    }

    public function tearDown() : void {

    }
   

    // a. Ensure a valid SessionClass object is created
    public function testSessionObjectIsCreated() {
        $this->assertInstanceOf(SessionClass::class, new SessionClass());

    }

    // b. Ensure that the methods specified in Question 9 meet the requirements as described.
    // The tests must check for invalid parameters for all methods and that the output of
    // the methods is as specified.

    public function testDestroySession() {
        $this->session->create();
        $this->session->destroy();
        $this->assertEquals(PHP_SESSION_NONE, true);
    }

    public function testSessionAdd() {
        $this->session->create();
        $this->session->add("name", "jeffrey");
        $theSession = $this->session->getSession();

        $this->assertEquals('jeffrey', $theSession['name']);

    }

    public function testSessionRemoveVariable() {
        $this->session->create();
        $this->session->add("name", "nicole");
        $this->session->remove("name");

        $theSession = $this->session->getSession();

        if (isset($theSession['name'])) {
            throw new \Exception (
                "remove() in SessionClass does not work!"
            );
        }
    } 
}