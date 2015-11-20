<?php
    $file = fopen('/var/tmp/test.log', 'a');

    function consume($msg) {
        fwrite($msg->getTopic());
        fwrite($msg->getMsgId());
        fwrite($msg->getBodyLen());
        fwrite("\r\n");
    }

    $phpConsumer = new PhpPushConsumer();
    $consumerGroupName = "CG_PHP";
    $topic = "TopicTest";
    $tags = "*";
    $phpConsumer->setConsumerGroup($consumerGroupName);
    $phpConsumer->subscribe($topic, $tags, "consume");
    $phpConsumer->start();
    sleep(2147483647);
?>