<?php
$loader = new \Phalcon\Loader();
/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->libraryDir,
    )
);

$loader->registerNamespaces(
    [
       'Oorden\Controllers' => $config->application->controllersDir ,
       'Oorden\Models'    => $config->application->modelsDir,
       'Oorden\Libraries'    => $config->application->libraryDir,
       'Phalcon' => $config->application->incubatorDir, 
    ]
);

$loader->register();