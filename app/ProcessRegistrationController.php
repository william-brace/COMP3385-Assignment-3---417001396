<?php 

namespace Apps\handlers;

use Framework\PageControllerCommand_Abstract;
use Framework\CommandContext;
use Framework\View;
use Framework\SessionManager;
use Framework\Validator;
use Framework\Registry;


class ProcessRegistrationController extends PageControllerCommand_Abstract {
    public function run() {

        
        $sessionManager = SessionManager::getInstance();
        $sessionManager->create();
        $this->setModel(new ProcessRegistrationModel());
        $v = new View();

        
        //Get data from post
        $signup_data = $this->model->findAll();

        $name = $signup_data['name'];
        $email = $signup_data['email'];
        $password1 = $signup_data['password'];
        $password2 = $signup_data['password2'];

        //$validator = Validator::getInstance();

        //$validator = Registry::getValidator();

        $registry = Registry::getInstance();

        $validator = $registry->getValidator();

        $password_errors = $validator->validatePassword($password1, $password2);


        if (!empty($password_errors)) {
           
            //echo "There are password errors";
            $v->addVar('password_errors', $password_errors);
            $v->setTemplate(TPL_DIR . '/signup.tpl.php');
            $v->display(); 
        }
        else {
            //echo "There are no password errors";

            //hash first password
            $signup_data['password'] = password_hash($signup_data['password'], PASSWORD_DEFAULT);

            //remove retyped password from data
            array_pop($signup_data);

            $registerUser = $this->model->registerUser($signup_data);

            //if ($registerUser) {
                $sessionManager->add('email', $email);
                $v->setTemplate(TPL_DIR . '/profile.tpl.php');
                $v->display();
            //}
        }
    }

    public function execute(CommandContext $context) : bool {
        $this->data = $context;
        $this->run();
        return false;
    }
}