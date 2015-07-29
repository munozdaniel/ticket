<?php

class HaberesController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    public function uploadAction()
    {
        //comprueba si hay archivos por subir
        if ($this->request->hasFiles() == true)
        {
            // Print the real file names and sizes
            foreach ($this->request->getUploadedFiles() as $file) {

                //Print file details
                echo $file->getName(), " ", $file->getSize(), "\n";

                //guardamos dentro del directorio img
                $file->moveTo('temp/' . $file->getName());
            }
        }
    }
}

