<?php

require_once("./Config.php");
require_once("src/model/user.php");

class DH_user
{
    public $database_folder;

    function __construct()
    {
        $this->database_folder = Config::$rootDir . "/database/users/";
    }

    function getUser($id)
    {
        $user = [];

        $file = fopen($this->database_folder . "user" . $id . ".txt", "r");
        while (($line = fgets($file)) !== false) {
            $user = unserialize($line);
        }
        fclose($file);

        return $user;
    }

    function getAllUsers()
    {
        $users = [];
        $user_files = scandir($this->database_folder);

        foreach ($user_files as $f) {
            $file = fopen($this->database_folder . $f, "r");

            while (($line = fgets($file)) !== false) {
                $users[] = unserialize($line);
            }
            fclose($file);
        }
        return $users;
    }

    function getNewId(){

        $lastId = 0;
        try{
            $file = fopen($this->database_folder . "user_index.txt", "w+");
            $lastId = unserialize(fgets($file));
        } catch(Exception $e){
            
        }
        
        $nextId = $lastId + 1;

        fseek($file,0);
        fwrite($file,serialize($nextId));

        fclose($file);

        return $nextId;
    }

    function addUser($user){        

        $file = fopen($this->database_folder . "user" . $user->id . ".txt", "w");
        fwrite($file, serialize($user));
        fclose($file);
    }
}
