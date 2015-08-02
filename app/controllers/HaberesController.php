<?php

class HaberesController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Actualizar Haberes');
        parent::initialize();
    }
    public function indexAction()
    {
        $this->assets
            ->addJs('assets/js/jquery.form.js');
        $this->assets->addInlineJs(
            '(function()
            {
                var bar = $(".bar");
                var percent = $(".percent");
                var status = $("#status");

                $("form").ajaxForm({
                    beforeSend: function() {
                    status.empty();
                    var percentVal = "0%";
                    bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + "%";
                    bar.width(percentVal)
                        percent.html(percentVal);
                        //console.log(percentVal, position, total);
                    },
                    success: function() {
                    var percentVal = "100%";
                    bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    complete: function(xhr) {
                    status.html(xhr.responseText);
                    }
                 });
            })();       '
        );
    }
    public function uploadAction()
    {
        //comprobamos que sea una petición ajax
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        { $i = 0;
            if ($this->request->hasFiles() == true)
            {
                foreach ($this->request->getUploadedFiles() as $file) {
                    $file->moveTo('temp/' . $file->getName());
                    $i++;
                }
            }
/*
            //obtenemos el archivo a subir
            $files = $_FILES['archivo']['name'];


            //comprobamos si el archivo ha subido
            foreach($files as $file)
            {
                if (move_uploaded_file($_FILES['archivo']['tmp_name'][$i],"files/".$_FILES['archivo']['name'][$i]))
                {
                    echo "EL archivo " . $_FILES['archivo']['name'][$i] . " ha subido correctamente<br>";

                }
            }*/
        }else{
            $this->flash->error("Error Processing Request");
            $this->redireccionar("haberes/index");
            throw new Exception("Error Processing Request", 1);

        }


        /*
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
        }*/
    }
}

