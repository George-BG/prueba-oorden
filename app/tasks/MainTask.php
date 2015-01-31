<?php

use Phalcon\Queue\Beanstalk\Extended as BeanstalkExtended;
use Phalcon\Queue\Beanstalk\Job;

class MainTask extends \Phalcon\CLI\Task
{
    /**
    * Funcion default que usa CLI y otra función interna del objeto.
    * 
   */
    public function mainAction() {
         echo "\nThis is the default task and the default action \n";

        $this->test2Action();
    }

    /**
    * Prueba de otra función diferente CLI
    * 
    */

    public function testAction(array $params) {
       echo sprintf('hello %s', $params[0]) . PHP_EOL;
       echo sprintf('best regards, %s', $params[1]) . PHP_EOL;
   }

    /**
    * Otra función diferente dentro del mismo archivo.
    * 
    */

   public function test2Action() {
        echo "\nI will get printed too!\n";
    }

    /**
    * Monitorea los queues, muestra el estatus de las tareas que se encuentran en Beanstalk.
    * 
    */

    public function monitoreaAction() {
        

        echo "\nMonitoreando Queues!\n";
        $beanstalk = new BeanstalkExtended(array(
            'host'   => 'localhost',
            
        ));
        //$aAux = $beanstalk->getTubes();
        //print_r($aAux[1]); die();
        foreach ($beanstalk->getTubes() as $tube) {
            
                try {
                    $stats = $beanstalk->getTubeStats($tube);
                    printf(
                        "%s:\n\tready: %d\n\treserved: %d\n",
                        $tube,
                        $stats['current-jobs-ready'],
                        $stats['current-jobs-reserved']
                    );

                    print_r($stats);
                } catch (\Exception $e) {
            }
            
        }
    }

    /**
    * Ejecuta y define las tareas que se encuentras en Beanstalk
    *
    */

    public function jobAction() {
        echo "\nI will get printed too!\n";
        $beanstalk = new BeanstalkExtended(array(
            'host'   => 'localhost',
        ));

        $beanstalk->addWorker('sendMail', function (Job $job) {
            // Here we should collect the meta information, make the screenshots, convert the video to the FLV etc.
          $videoId = $job->getBody();
            mail('jorge.barbosa@iteraprocess.com', 'Prueba ' . $videoId, 'Mensaje');
            
            print_r($videoId);
            // It's very important to send the right exit code!
            exit(0);
        });

        // Start processing queues
        $beanstalk->doWork();
    }
}