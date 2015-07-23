<?php
use \Phalcon\Mvc\User\Component;
class Elemento extends Component
{
    /*Log In / Log Out*/
    private $_login = array(
        'sesion'    =>  array(
            'caption'       =>'Log In',
            'controlador'   =>'sesion',
            'accion'        =>  '#',
            'icono'         =>  'fa-sign-in'
        )
    );
    /*Usuario Logueado*/
    private $_usuario = array(
        'index' => array(
            'caption'       =>'Invitado',
            'controlador'   =>'index',
            'accion'        => 'index',
            'icono'         =>  'fa-user'
        )
    );
    /*Menu Principal Izquierdo*/
    private $_principal = array(

    );
}