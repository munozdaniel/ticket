<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Inicio');
        parent::initialize();
    }
    public function indexAction()
    {
        //cargar los js para la vista de esta función

       $this->assets->addInlineJs('//custom select box
        $(function(){
            $("select.styled").customSelect();
        });');

    }

}

