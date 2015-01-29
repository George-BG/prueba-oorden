<?php

// namespace Tasks;

try {

	$di = new Phalcon\DI\FactoryDefault\CLI();

	//Create a console application
	$console = new \Phalcon\CLI\Console();
	$console->setDI($di);

	//
	$console->handle(array('shell_script_name', 'echo'));
/*
	$app = new MonitoringTask();
 
	// Record any php warnings/errors
//	set_error_handler(['Utilities\Debug\PhpError','errorHandler']);

	$app->setAutoload($autoLoad, $appDir);
	$app->setConfig($config);


	$app->setArgs($argv, $argc);

	// Boom, Run
	$app->run();
*/
} catch(Exception $e) {
	echo $e;
	exit(255);
}