<?php

class Sector extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $sector_id;

    /**
     *
     * @var string
     */
    public $sector_nombre;

    /**
     *
     * @var integer
     */
    public $sector_habilitado;

    /**
     *
     * @var string
     */
    public $sector_fechaCreacion;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('sector_id', 'Usuario', 'sector_id', array('alias' => 'Usuario'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'sector';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sector[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sector
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
