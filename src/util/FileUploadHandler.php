<?php

class FileUploadHandler{

    public $allowed_extensions = ["jpg", "jpeg", "png"];

    function handleFile($file, $folder){

        $dest = "";

        //Get the extension of the file
        $extension = pathinfo($file["name"], PATHINFO_EXTENSION);

        //Check if the extention is allowed (no ".exe" or other harmfull)
        if (in_array($extension, $this->allowed_extensions)) {

            if ($file["error"] === 0) {
                if ($file["size"] < 100000000) {
                    
                    $hash = hash_init("md5");
                    hash_update($hash, date("Y-m-d H-i-s"));
                    hash_update_file($hash,$file["tmp_name"]);

                    $dest = $folder . hash_final($hash) . $file["name"];

                    move_uploaded_file($file["tmp_name"], $dest);
                    
                    echo "Successful file upload! <br/>";
                } else {
                    echo "The file is too big! <br/>";
                }
            } else {
                echo "Error during upload! <br/>";
            }
        } else {
            echo "Not the one of the possible extensions! <br/>";
        }

        return $dest;
    }

}