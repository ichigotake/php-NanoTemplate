<?php

require __DIR__ . '/../lib/NanoTemplate.php';

$t = new NanoTemplate(__DIR__ . '/view/');

$t->set('greet_jp', 'おはよう');

$t->render('index.php', array(
    'greet' => 'Hello!!',
));
