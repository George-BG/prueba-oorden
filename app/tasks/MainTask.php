<?php

class MainTask extends \Phalcon\CLI\Task
{
    public function mainAction() {
         echo "\nThis is the default task and the default action \n";

        $this->test2Action();
    }

    public function testAction(array $params) {
       echo sprintf('hello %s', $params[0]) . PHP_EOL;
       echo sprintf('best regards, %s', $params[1]) . PHP_EOL;
   }

   public function test2Action() {
        echo "\nI will get printed too!\n";
    }
}