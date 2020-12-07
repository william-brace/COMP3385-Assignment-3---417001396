<?php

require './framework/View.php';

class ViewTest extends PHPUnit\Framework\TestCase {

    private $view;

    public function setUp() : void {
        $this->view = new View();
    }

    public function tearDown() : void {
        
    }


    // a. Ensure a valid View object is created.
    public function testValidView() {

        $this->assertInstanceOf(View::class, new View(), $message = 'Failed to create view object of type view!');
    }

    // b. Ensure that the setTemplate, display and addVar methods perform as
    // described in Question 5. The testing must check for invalid parameters for all methods
    // and that the output of the methods is as specified.

    public function testSetTemplateParametersString() {
        $this->view->setTemplate('123');//switch '123' to 123 (non string) to test
    }

    public function testSetTemplateParameterEmptyString() {
        $this->view->setTemplate('a'); //switch 'a' to '' to test
        //$this->expectException(Exception::class);
    }

    public function testSetTemplate() {
        //testing that $tpl is set from $filename input
        $this->view->setTemplate('index.tpl.php');
        $tpl = $this->view->getTemplate();
        $this->assertEquals($tpl, 'index.tpl.php');
    }

    public function testDisplay() {
        //create variable to hold result of display for testing purposes
        $page = $this->view->display();

        //test if display output is string
        $this->assertIsString($page);
        //test if display output is a non-empty string
        $this->assertNotEmpty($page);

    }

    public function testAddVar() {
        $this->view->addVar('name', 'jonathan');
        $variables = $this->view->getVars();
        $this->assertEquals('jonathan', $variables['name']);
    }
}