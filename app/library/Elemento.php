<?php
use \Phalcon\Mvc\User\Component;
class Elemento extends Component
{
    /*Log In / Log Out */
    private $_login = array(
        'sesion'    =>  array(
            'leyenda'       =>'Log In',
            'controlador'   =>'sesion',
            'accion'        =>  'index',
            'icono'         =>  ''
        )
    );
    /*Usuario Logueado: Muestra los datos*/
    private $_usuario   =   array(
        'registrado'       =>  array(
            'leyenda'       =>  'Invitado',
            'controlador'   =>  'index',
            'accion'        =>  'index',
            'urlImagen'     =>  '/ticket/assets/img/ui-sam.jpg'

        )
    );
    /*Menu Principal Izquierdo: Index - Ticket: Todos, Pendientes, Resueltos - Busqueda: Por Tecnico, Por Fechas -
        Configuracion: Usuario, Correo, Otros - Ayuda: Manual, Consejos.   */
    private $_principal = array(
        'index' =>  array(
            'leyenda'   =>  'Inicio',
            'controlador'=> 'index',
            'accion'    =>  'index',
            'icono'     =>  'fa fa-dashboard'
        ),
        'ticket'    =>  array(
            'leyenda'   =>  'Ticket',
            'icono'     =>  'fa fa-desktop',
            'submenu'   =>  array(
                'Todos' =>  array('leyenda'=>'Todos','controlador'=>'ticket','accion'=>'todos'),
                'Pendientes' =>  array('leyenda'=>'Pendientes','controlador'=>'ticket','accion'=>'pendientes'),
                'Resueltos' =>  array('leyenda'=>'Resueltos','controlador'=>'ticket','accion'=>'resueltos')
            )
        ),
        'busqueda'  =>  array(
            'leyenda'  =>  'Búsqueda',
            'icono'     =>  'fa fa-th',
            'submenu'   =>  array(
                'tecnicos'  =>  array('leyenda'=>'Por Técnicos','controlador'=>'buscar','accion'=>'tecnicos'),
                'fechas'  =>  array('leyenda'=>'Por Fechas','controlador'=>'buscar','accion'=>'fechas')
            )
        ),
        'configuracion' =>  array(
            'leyenda'  =>  'Configuración',
            'icono'     =>  'fa fa-cogs',
            'submenu'   =>  array(
                'usuarios'  =>  array('leyenda'=>'Usuario','controlador'=>'configurar','accion'=>'usuario'),
                'correos'  =>  array('leyenda'=>'Correo','controlador'=>'configurar','accion'=>'correo'),
                'otros'  =>  array('leyenda'=>'Otros','controlador'=>'configurar','accion'=>'otros')
            )
        ),
        'ayuda' =>  array(
            'leyenda'  =>  'Ayuda',
            'icono'     =>  'fa fa-book',
            'submenu'   =>  array(
                'manual'  =>  array('leyenda'=>'Manual','controlador'=>'ayuda','accion'=>'manual'),
                'consejos'  =>  array('leyenda'=>'Consejos','controlador'=>'ayuda','accion'=>'consejos'),
            ))

    );
    public function getMenu()
    {
        $index = $this->_principal['index'];
        $controllerName = $this->view->getControllerName();
        $clase = (($index['controlador']==$controllerName)?"active":"");
        echo "<li class='mt'>";
        echo $this->tag->linkTo(array($index['controlador'],"<i class='".$index['icono']."'/></i>".$index['leyenda'], "class"=>$clase));
        echo "</li>";
        unset($this->_principal['index']);
        foreach($this->_principal as $controlador => $contenido)//$controlador: index, ticket, busqueda, configuracion, ayuda - $contenido = array de cada controlador.
        {
            //controlador = index, ticket, busqueda, etc.
           // echo "<h5>".$contenido['leyenda']."</h5>";
            echo    "<li class='sub-menu'>";

            echo $this->tag->linkTo(array("javascript:;","<i class='".$contenido['icono']."'></i><span>".$contenido['leyenda']."</span>"));//Verificar que este activo
            foreach($contenido['submenu'] as $submenu => $item)//contenido[leyenda], contenido[icono], contenido[submenu]
            {
                //Verificando que accion se encuentra activa.
                $actionName = $this->view->getActionName();
                $clase = (($item['accion']==$actionName)?"class=active":"");
                
                echo  "<ul class='sub'>";
                echo  "<li $clase>".$this->tag->linkTo(array($item['controlador']."/".$item['accion'],$item['leyenda']))."</li>";
                echo  "</ul>";
            }

            echo    "</li>";
        }

    }
    public function getSesion()
    {
        if($this->session->get('auth'))
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
    public function getUsuario()
    {
        $auth= $this->session->get('auth');
        if($auth)
        {
            $this->_usuario['registrado'] =  array(
                'leyenda'       =>  $auth['usuario_nombre'],
                'controlador'   =>  'index',
                'accion'        =>  'index',
                'urlImagen'     =>  '/ticket/assets/img/ui-sam.jpg');
        }

        echo "<p class='centered'>";
        echo "<a href='profile.html''>";
        echo $this->tag->image(array('assets/img/ui-sam.jpg', "alt" => "banner de phalcon","class"=>"img-circle", "width"=>"60"));
        echo "</a>";
        echo "</p>";
        echo "<h5 class='centered'>".$this->_usuario['registrado']['leyenda']."</h5>";
    }

}