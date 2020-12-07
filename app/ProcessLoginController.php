<?php 

namespace Apps\handlers;

use Framework\PageControllerCommand_Abstract;
use Framework\CommandContext;
use Framework\View;
use Framework\SessionManager;
use Framework\Validator;

use Framework\Registry;

class ProcessLoginController extends PageControllerCommand_Abstract {
    public function run() {


        
        // $sess = new SessionManager();
        // $sess->create();

        $sessionManager = SessionManager::getInstance();
        $sessionManager->create();

        $this->setModel(new ProcessLoginModel());
        $v = new View();

        //$this->model->attach($this->view);

        
        //Get data from post
        $login_data = $this->model->findAll();

        //assign data to variables
        $email = $login_data['email'];
        $password = $login_data['password'];

        //echo $email . " " . $password;

        //$checkUser_result = $this->model->checkUser($email, $password);

       // $validator = Validator::getInstance();

       $registry = Registry::getInstance();

       $validator = $registry->getValidator();

       //$validator = Registry::getValidator();

        $connection = $this->model->makeConnection();

        $checkUser_result = $validator->validateUser($email, $password, $connection, $this->model);

        if ($checkUser_result) {
            $sessionManager->add('email', $email);
            $v->setTemplate(TPL_DIR . '/profile.tpl.php');
            $v->display();
        }
        else 
        {
            $login_error = "Invalid Username or Password";

            $v->addVar('login_error', $login_error);
            $v->setTemplate(TPL_DIR . '/login.tpl.php');
            $v->display();
        }

        




        // $query = "SELECT * FROM users where email = '{$email}'"; 

        // $select_user_query = mysqli_query($connect, $query);
        
        // if (!$select_user_query)
        // {
        //     die("QUERY LOGIN FAILED! " . mysqli_error);
        // }
        // else {
            
        //     $row = mysqli_fetch_array($select_user_query);

        //     if (empty($row)) {
        //         $signinUsernameErrors = "Invalid Username";
        //         $signinPasswordErrors = "Invalid Password";
        //         include("../index.html.php");
        //     }
        //     else {
        //         $db_username = $row['username'];
        //         $db_password = $row['password'];

        //         echo "db username is " . $db_username . " and db password is " . $db_password;


        //         if (password_verify($password, $db_password))
        //         {
        //             $_SESSION['username'] = $username;
                    


        //             header("Location: ../profile.html.php");
        //         }
        //         else
        //         {
        //             $signinUsernameErrors = "Invalid Username";
        //             $signinPasswordErrors = "Invalid Password";
        //             include("../index.html.php");
                    
        //         }
        //     }
        // }  
















        // //check if email matches a users email in database
        // if (file_exists(DATA_DIR . "/users.json")) {
        //     //get data from file and store it in users_data
        //     $users_data = file_get_contents(DATA_DIR . "/users.json");

        //     //put new user in users array
        //     $users_data = json_decode($users_data);

        //     $found = 0;

            

        //     foreach($users_data as $users) {
        //         $users = (array)$users;
        
        //         if (array_search($email, $users)) {
        //             $found = 1;

        //             //compare password to password in file and see if same
        //             echo $users['password'];

        //             if (password_verify($password ,$users['password'])) {
        //                 echo "\n" . "password match!! \n"; 
        //                 $sess->add('user', $email);

        //                 $v->setTemplate(TPL_DIR . '/profile.tpl.php');
        //                 $v->display();
                        

        //             }
        //             else {
        //                 echo "\n" . "invalid sig in \n"; 
        //                 $v->addVar('login_error', "Invalid email/password");
        //                 $v->setTemplate(TPL_DIR . '/login.tpl.php');
        //                 $v->display();  
    
        //             }



                    
        //         }
                
        //     }

        //     if ($found == 0)
        //     {
        //         echo "  Email not found";
        //         $v->addVar('login_error', "Invalid email/password");
        //         $v->setTemplate(TPL_DIR . '/login.tpl.php');
        //         $v->display();
                     
        //     }
           
        // }
        // else {
        //     echo "File could not be found";
        // }

    }

    public function execute(CommandContext $context) : bool {
        $this->data = $context;
        $this->run();
        return false;


    }
}