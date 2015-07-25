<?php

class Usuario extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $usuario_id;

    /**
     *
     * @var string
     */
    public $usuario_nombre;

    /**
     *
     * @var string
     */
    public $usuario_nick;

    /**
     *
     * @var string
     */
    public $usuario_pass;

    /**
     *
     * @var string
     */
    public $usuario_email;

    /**
     *
     * @var string
     */
    public $usuario_fechaCreacion;

    /**
     *
     * @var integer
     */
    public $usuario_habilitado;

    /**
     *
     * @var integer
     */
    public $sector_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('usuario_id', 'Usuarioporrol', 'usuario_id', array('alias' => 'Usuarioporrol'));
        $this->belongsTo('sector_id', 'Sector', 'sector_id', array('alias' => 'Sector'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'usuario';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
