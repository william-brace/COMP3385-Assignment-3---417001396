<?php
class ProfileController extends Controller_Abstract {

    public function run() {

        $sess = new SessionManager();
        $sess->create();
        $sess->remove('user');
        $v = new View();
        $v->setTemplate(TPL_DIR . '/profile.tpl.php');

        $this->setModel(new ProfileModel());
        $this->setView($v);
        
        $this->model->attach($this->view);

        $user = $sess->see('user');

        if ($sess->accessible($user, 'profile')) {
            $data = $this->model->getAll();

            $this->model->updateTheChangedData($data);

            $this->model->notify();
        }
        else {
            $v->setTemplate(TPL_DIR . '/login.tpl.php');
            $v->display();
        }

    }

}