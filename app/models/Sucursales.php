<?php

namespace Oorden\Models;

class Sucursales extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $sucursal_id;

    /**
     *
     * @var integer
     */
    public $organizacion_id;

    /**
     *
     * @var string
     */
    public $clave;

    /**
     *
     * @var string
     */
    public $nombre;

    /**
     *
     * @var string
     */
    public $direccion;

    /**
     *
     * @var string
     */
    public $default;

    /**
     *
     * @var string
     */
    public $sucursalescol;

    /**
    * Inicialización del modelo, relaciones, se toman en cuenta namespace.
    * 
   */

    public function initialize()
    {
        $this->belongsTo('organizacion_id', 'Oorden\Models\Organizaciones', 'organizacion_id', ['alias' => 'Organizaciones']);
    }

}

