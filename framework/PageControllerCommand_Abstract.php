<?php

namespace Framework;

abstract class PageControllerCommand_Abstract implements Command_Interface {

    protected $model = null;
    protected $view = null;


   //model and view needs modifying to use abstract factory pattern


    //assigns the Model object to the protected attribute $model in the Controller class, which is initialized as null. [2 marks]
     public function setModel(Observable_Model $model) {
        $this->model = $model;
     } 

    //assigns the View object to the protected attribute $view in theController class, which is initialized as null.
     public function  setView(View $view) {
        $this->view = $view;
     }  

    //an abstarct method that performs the page’s business logic.
     abstract public function run(); 


     abstract public function execute(CommandContext $context) : bool;
}