# NAME

NanoTemplate - Nano template engine with PHP5 language

# USAGE

All function in example. This module is verrrry simply!

very simply call

    require 'lib/NanoTemplate.php';

    render('/path/to/view.php', array(
        'greet' => 'hahaha',
        'greet_jp' => 'ごきげんよう',
    ));

or, make instance

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

# Why naming *Nano*?

Why naming 'Nano'?

PHP template engine already exists, 'MicroTemplate', ZendFramework library, Twig, Smarty, and others.

but, almost template engine has expand syntax or used *$this* vars in template.

and theres template engine is large or including Web Application Framework.

NanoTemplate don't have expand syntax and assigned vars are not '$this'. also, if you want to assign object vars ;)

NanoTemplate library have only 1 file.

it's pure PHP! PHP is template engine it self, because nameing 'Nano'.

# AUTHOR

ichigotake

# LICENSE

[MIT LICENSE](http://opensource.org/licenses/MIT)

