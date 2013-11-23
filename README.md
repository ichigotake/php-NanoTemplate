# NAME

NanoTemplate - Nano template engine with PHP5 language

# USAGE

All function in example. This module is verrrry simply!

very simply call

    require 'lib/NanoTemplate.php';

    # render($view_file, $binds, $charset);
    # 
    # The second and the following arguments is optional.
    # Default charset is "UTF-8"
    render('/path/to/view.php', array(
        'greet' => 'hahaha',
        'greet_jp' => 'ごきげんよう',
    ));

or, make instance

    ### index.php
    # param(optional): ($view = 'view/', $charset = 'UTF-8')
    $t = new NanoTemplate('view/');

    # echo template with bind variable
    $t->render('template.php', array(
        'greet'    => 'Hello!!',
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

PHP template engine is already many exists. but almost theres is large or Web Application Framework dependencies.

NanoTemplate don't have expand syntax and assigned vars are not '$this'. also, if you want to assign object vars ;)

NanoeTemplate has only 1 pure PHP file. PHP is template engine it self, because nameing 'Nano'.

# AUTHOR

ichigotake

# LICENSE

[MIT LICENSE](http://opensource.org/licenses/MIT)

