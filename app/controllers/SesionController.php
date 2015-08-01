<?php

class SesionController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Login');
        parent::initialize();
    }
    public function indexAction()
    {
        //cargar los js para la vista de esta función
        $this->assets
            ->addJs('assets/js/jquery.backstretch.min.js');
        $this->assets->addInlineJs('$.backstretch("assets/img/login-bg.jpg", {speed: 500});');
    }

    /**
     * Encargado de la validacion de los datos introducidos en el formulario. Ademas
     * de validar los datos con la base de datos.
     */
    public function validarAction()
    {


        if($this->request->isPost())
        {
            try
            {
                //Obtengo los datos ingresado en el form.
                $nombre  = $this->request->getPost('nombre');
                $pass   = $this->request->getPost('password');
                //Busco el usuario en la bd a partir de los datos ingresados.
                $usuario = Usuario::findFirst(array(
                    "(usuario_nick = :usuario_nick:) AND (usuario_pass = :usuario_pass:) AND (usuario_habilitado = 1)",
                    'bind' => array('usuario_nick' => $nombre, 'usuario_pass' => base64_encode($pass))
                ));

                if($usuario!=false)
                {
                    $this->_registrarSesion($usuario);
                    $miSesion = $this->session->get('auth');
                    $this->flash->success('Bienvenido/a '.$miSesion['usuario_nombre'] . " - Rol: ".$miSesion['rol_nombre']);
                    //Redireccionar la ejecución si el usuario es valido
                    return $this->redireccionar('index/index');

                }
                else{
                    $this->flash->error("No se encontro el Usuario, verifique contraseña/nick");

                }
            }
            catch(\Phalcon\Annotations\Exception $ex)
            {
                $this->flash->error($ex->getMessage());
            }

        }
        return $this->redireccionar('sesion/index');

    }
    private function _registrarSesion($usuario)
    {
        $idRol = Usuarioporrol::findFirst(array("usuario_id     =       :usuario:",
                                                'bind'          =>      array('usuario'=>$usuario->usuario_id)));
        $rol = Rol::findFirstByRolId($idRol->rol_id);
        $this->session->set('auth',array('usuario_id'   =>  $usuario->usuario_id,
                                        'usuario_nombre'  =>  $usuario->usuario_nombre,
                                        'usuario_nick'  =>  $usuario->usuario_nick,
                                        'rol_nombre'   =>  $rol->rol_nombre));
    }
    /**
     * Finishes the active session redirecting to the index
     *
     * @return unknown
     */
    public function cerrarAction()
    {
        $this->session->remove('auth');
        $this->flash->success('Goodbye!');
        return $this->dispatcher->forward(array(
            'controller' => 'index',
            'action' => 'index'
        ));
    }
}

