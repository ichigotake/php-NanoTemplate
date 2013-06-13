# NAME

NanoTemplate - Nano template engine with PHP5 language

# USAGE

All function in example. This module is verrrry simply!

    ### index.php
    # param(optional): ($view = 'view/', $charset = 'UTF-8')
    $t = new NanoTemplate('view/');

    # assign variable
    $t->set('greet', 'Hello!');

    # echo template.
    $t->render('template.php', array(
        'greet_jp' => 'こんにちは！',
    ));

    ### view/template.php
    <?php $_layout = 'layout.php' ?>
    
    <?php echo $greet_jp ?> (Japanese mean "<?php echo $greet ?>")

    ### view/layout.php
    <!doctype html>
    <html>
    <head>
    </head>
    <body>
        <?php echo $_content ?>
    </body>
    </html>

or, you can used by static call!

    # property set
    NanoTemplate::$charset = 'EUC-JP';
    NanoTemplate::$template_view = __DIR__ . '/admin/';

    # render template
    NanoTemplate::render('index.php', array(
        'greet' => 'Goo morning!',
        'greet_jp' => 'おはよーおはよー',
    ));

# AUTHOR

ichigotake

# LICENSE

[MIT LICENSE](http://opensource.org/licenses/MIT)

