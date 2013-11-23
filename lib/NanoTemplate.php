<?php

// export global function
function render() {
    $tmp = NanoTemplate::$template_dir;
    NanoTemplate::$template_dir = $_SERVER['PWD'];
    call_user_func_array('NanoTemplate::render', func_get_args());
    NanoTemplate::$template_dir = $tmp;
}

if (isset($_SERVER['PWD'])) {
    NanoTemplate::$template_dir = $_SERVER['PWD'];
}

class NanoTemplate {

    static public $VERSION = '0.15';

    static public $template_dir;

    static public $charset = 'UTF-8';
    
    public function __construct($template_dir = null, $charset = 'UTF-8')
    {
        if (!is_null($template_dir)) {
            self::$template_dir = $template_dir;
        }
        self::$charset = $charset;
    }

    public function render($tmpl = null, $binds = array(), $charset = null)
    {
        if (null === $charset) {
            $charset = self::$charset;
        }

        $template_dir = (strpos('/', $tmpl) === 0) ? dirname($tmpl) : self::$template_dir;

        //bind variable for template
        foreach ($binds as $key => $value) {
            if (is_object($value)) {
                $$key = $value;
            } else {
                $$key = htmlspecialchars($value, ENT_QUOTES, $charset);
            }
        }

        ob_start();
        include("$template_dir/$tmpl");
        $_content = ob_get_clean();

        if (isset($_layout)) {
            include("$template_dir/$_layout");
        } else {
            echo $_content;
        }
    }

}


