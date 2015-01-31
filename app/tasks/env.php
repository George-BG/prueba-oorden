#!/usr/bin/env php
<?php
/**
 * Workers that handles queues related to the videos.
 */
use Phalcon\Queue\Beanstalk\Extended as BeanstalkExtended;
use Phalcon\Queue\Beanstalk\Job;

$beanstalk = new BeanstalkExtended(array(
    'host'   => 'localhost',
));

$beanstalk->addWorker('sendMail', function (Job $job) {
    // Here we should collect the meta information, make the screenshots, convert the video to the FLV etc.
    $videoId = $job->getBody();
    print_r($videoId);
    // It's very important to send the right exit code!
    exit(0);
});

// Start processing queues
$beanstalk->doWork();