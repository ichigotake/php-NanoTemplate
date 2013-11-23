<?php

require __DIR__ . '/../lib/NanoTemplate.php';

$t = new NanoTemplate(__DIR__ . '/view/');

$t->render('index.php', array(
    'greet' => 'Hello!!',
    'greet_jp' => 'おはよう！',
));
