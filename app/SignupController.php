<?php

namespace Apps\handlers;

use Framework\PageControllerCommand_Abstract;
use Framework\SessionManager;
use Framework\CommandContext;
use Framework\View;

class SignupController extends PageControllerCommand_Abstract {
    public function run() {


        // $sess = new SessionManager();
        // $sess->create();
        $v = new View();
        $v->setTemplate(TPL_DIR . '/signup.tpl.php');
        $v->display();


        // $this->setModel(new IndexModel());
        // $this->setView($v);
        

        // $this->model->attach($this->view);

        // $data = $this->model->getAll();

        // $this->model->updateTheChangedData($data);

        // $this->model->notify();

    }

    public function execute(CommandContext $context) : bool {
        $this->data = $context;
        $this->run();
        return false;
    }
}