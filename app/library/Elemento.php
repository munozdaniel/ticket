<?php
use \Phalcon\Mvc\User\Component;
class Elemento extends Component
{
    /*Log In / Log Out*/
    private $_login = array(
        'sesion'    =>  array(
            'leyenda'       =>'Log In',
            'controlador'   =>'sesion',
            'accion'        =>  'index',
            'icono'         =>  ''
        )
    );
    /*Usuario Logueado: Muestra los datos*/
    private $_usuario = array(
        'usuario' => array(
            'leyenda'       =>'Invitado',
            'controlador'   =>'index',
            'accion'        => 'index',
            'icono'         =>  'fa-user'
        )
    );
    /*Menu Principal Izquierdo: Index - Ticket: Todos, Pendientes, Resueltos - Busqueda: Por Tecnico, Por Fechas -
        Configuracion: Usuario, Correo, Otros - Ayuda: Manual, Consejos.   */
    private $_principal = array(

    );

    public function getSesion()
    {
        $auth = $this->session->get('auth');
        if($auth)
        {
            $this->_login['sesion']= array(
                'leyenda'       =>'Log Out',
                'controlador'   =>'sesion',
                'accion'        =>  'cerrar',
                'icono'         =>  ''
            );
        }
        foreach($this->_login as $login){
            echo "<ul class='nav pull-right top-menu'>";
            echo "<li>";
            echo $this->tag->linkTo(array($login['controlador'] . '/' . $login['accion'], $login['leyenda'], "class"=>"logout"));

            echo "</li>";
            echo "</ul>";
        }

    }
}