<?php 

// require './framework/Controller_Abstract.php';
// require './framework/View.php';

namespace Apps\handlers;

use Framework\PageControllerCommand_Abstract;
use Framework\CommandContext;
use Framework\View;



class IndexController extends PageControllerCommand_Abstract {
    
    private $data = null;
    
    public function run() {

        $v = new View();
        $v->setTemplate(TPL_DIR . '/index.tpl.php');

        $this->setModel(new IndexModel());
        $this->setView($v);
        

        $this->model->attach($this->view);

        $data = $this->model->findAll();

        $v->addVar('courses', $data);

        $v->setTemplate(TPL_DIR . "/index.tpl.php");
        $v->display();  
    } 
    
    public function execute(CommandContext $context) : bool {
        $this->data = $context;
        $this->run();
        return false;
    }
}