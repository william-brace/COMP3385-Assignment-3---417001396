<?php

namespace Framework;

abstract class Model_Abstract{

    protected $cached_json = [];
    //Retrieves all the records from the JSON file and returns them in a multi-dimensional associative array.
    abstract public function findAll() : array ;

    //array.Retrieves a database record using the id stored in the Model data structure.
    //Returns the data in an associative array.
    abstract public function findRecord(string $id) : array ;

    public function loadData(string $fromFile) : array
    {
        $filename = basename($fromFile, '.json');
        if (!isset($this->cached_json[$filename]) || empty($this->cached_json[$filename]))
        {
            $json_file=file_get_contents($fromFile);
            $this->cached_json[$filename] = json_decode($json_file, true);
        }
        return $this->cached_json[$filename];

    }

    public function makeConnection() {
        //make database connection
        $connect = mysqli_connect('localhost', 'root', 'root', 'mooc');

        if (!$connect)
        {
            die('Database connection failed!');
        }

        return $connect;

    }

    use Insert_Trait;

    public function insert(array $values, $connection) {

        //var_dump($values);

        $name = $values['name'];
        $email = $values['email'];
        $password = $values['password'];

        $signupQuery = "INSERT INTO users (`name`, email, `password`) VALUES ('$name', '$email', '$password')"; 

        $result = mysqli_query($connection, $signupQuery);

        if ($result)
        {
            //echo "User Added";
            //$_SESSION['username'] = $username;
            return true;
        }
        else {
            die("User failed to be added! Error!" . mysqli_error($connection));
            
        }

    }

    use Read_Trait;

    public function read(string $key, $connection) {

        //echo $key;

        $query = "SELECT * FROM users where email = '{$key}'"; 

        $select_user_query = mysqli_query($connection, $query);

        
        if (!$select_user_query)
        {
            die("QUERY LOGIN FAILED! " . mysqli_error);
            return false;
        }
        else {
            
            $row = mysqli_fetch_array($select_user_query);

            //var_dump($row);
        
            if (empty($row)) {
                return false;
            }
            else {

                return $row;
            }
        }

                




        

    }

}