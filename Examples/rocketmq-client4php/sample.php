<?php
    function consume($msg) {
        echo $msg->getTopic();
        echo $msg->getMsgId();
        echo $msg->getBodyLen();
    }

    $phpConsumer = new PhpPushConsumer();
    $consumerGroupName = "CG_QuickStart";
    $topic = "T_QuickStart";
    $tags = "*";
    $phpConsumer->setConsumerGroup($consumerGroupName);
    $phpConsumer->subscribe($topic, $tags, "consume");
    $phpConsumer->start();
    sleep(2147483647);
?>