<?php

require __DIR__ . '/../lib/NanoTemplate.php';

$t = new NanoTemplate('view/');

$t->set('greet_jp', 'おはよう');

$t->render('index.php', array(
    'greet' => 'Hello!!',
));
