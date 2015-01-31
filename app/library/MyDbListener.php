<?php

namespace Oorden\Libraries;

class MyDbListener 
{

    protected $_profiler;

    protected $_logger;

    /**
    * Constructor del listener, para Profile Queries
    * 
    * @return void
   */

    public function __construct()
    {
        $this->_profiler = new \Phalcon\Db\Profiler();
        $this->_logger = new \Phalcon\Logger\Adapter\File(__DIR__  . "/../cache/db.log");        
    }

    /**
    * antes de ejecutar el query
    * 
    * @param  string $event Evento
    * @param  string $connection Conexion a la BD
    * @return void
   */

    public function beforeQuery($event, $connection)
    {
        $this->_profiler->startProfile($connection->getSQLStatement());
    }

    /**
    * despues de ejecutar el query
    * 
    * @param  string $event Evento
    * @param  string $connection Conexion a la BD
    * @return void
   */    

    public function afterQuery($event, $connection)
    {
        $this->_logger->log($connection->getSQLStatement(), \Phalcon\Logger::INFO);
        $this->_profiler->stopProfile();
    }

    /**
    * obtener el profiler
    * 
   */

    public function getProfiler()
    {
        return $this->_profiler;
    }

}