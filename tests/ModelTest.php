<?php

require './framework/Model_Abstract.php';

class ModelTest extends PHPUnit\Framework\TestCase {
    // a. Ensure a valid Model object is created.
    // b. Ensure that the Observer/Observable methods function as required.
    // c. Ensure that the getAll and getRecord methods perform as described in Question
    // 3. The testing must check for invalid parameters for both methods and that the output
    // of the methods is valid.
    // d. Ensure that any methods you add to the concrete Model function as described. This
    // means that the additional methods must be documented to indicate the correct inputs, outputs and functionality.

    private $model;

    public function setUp() : void {
        $this->model = new Model();
    }

    public function tearDown() : void {

    }

    // public function testValidModel() {
    //     $this->assertInstanceOf(Model::class, $model, $message = 'Failed to create model object of type Model!');
    // }

    // public function testObservableAttach() {

    // }

    // public function testObservableDetatch() {

    // }

    // public function testObservableNotify() {

    // }

}

