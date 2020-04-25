<?php

require_once("./Config.php");
require_once("src/model/user.php");

class DH_user
{
    public $database_folder;

    //contrsuctor
    function __construct()
    {
        $this->database_folder = Config::$rootDir . "/database/users/";
    }

    //get user function from the file, each user object is stored in individual files
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

    function getFilesList($folder){
        return array_filter(scandir($folder), function($item) {
            return $item[0] !== '.';
        });
    }

    //we can get all users from the folder with this function into an array
    function getAllUsers()
    {
        $users = [];
        $user_files = $this->getFilesList($this->database_folder);
        print_r($user_files);
        foreach ($user_files as $f) {
            $file = fopen($this->database_folder . $f, "r");

            while (($line = fgets($file)) !== false) {
                $users[] = unserialize($line);
            }
            fclose($file);
        }
        return $users;
    }

    //keeps check on the id, its used for generation
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

    //adds user object to file
    function addUser($user){        

        $file = fopen($this->database_folder . "user" . $user->id . ".txt", "w");
        fwrite($file, serialize($user));
        fclose($file);
    }

    function updateUser($user){
        $file = fopen($this->database_folder . "user" . $user->id . ".txt", "w");
        ftruncate($file, 0);
        fwrite($file, serialize($user));
        fclose($file);
    }
}
