<?php 

namespace App\Controllers\Post;

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; 

class ImageUpload {

    /*
    *
    * first argument name of uploading file / name from form name
    * second argument folder absolute path 
    * 
    * Return filename with extension
    *
    */

    public static function upload($fileName, $path)
    {
        // Location and conect to file object
        $storage = new \Upload\Storage\FileSystem($_SERVER['DOCUMENT_ROOT'] .'/'.$path);
        $file = new \Upload\File($fileName, $storage);

        // Set unique filename
        $new_filename = uniqid();
        $file->setName($new_filename);


        self::checkMimetypes($file);
        self::checkSize($file);
        

        // Try to upload file
        try {
            // Success!
            $file->upload();
        } catch (\Exception $e) {
            // Fail!
            $errors = $file->getErrors();
        }
        
        return $file->getNameWithExtension();
    }

    private function checkMimetypes($file)
    {
        // Check if image is jpg or png
        $mimeTypes = ['image/jpeg', 'image/png', 'image/gif'];    

        if(! in_array($file->getMimetype(), $mimeTypes)) {
            $_SESSION['error-message'] = "Only jpg/jpeg and png image format alowed";
            header('Location: '.URL.'views/admin/post/create.view.php');
            exit();
        } 
    }    

    private function checkSize($file)
    {
        $maxSize = 2000000;    
        if($file->getSize() > $maxSize) {
            $_SESSION['error-message'] = "Max alowed file size is ".$maxSize;
            header('Location: '.URL.'views/admin/post/create.view.php');
            exit();
        }
    }

}