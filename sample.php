<?php

require 'lib/NanoTemplate.php';

$t = new NanoTemplate('sample');

$t->set('greet_jp', 'おはよう');

$t->render('index.php', array(
    'greet' => 'Hello!!',
));
