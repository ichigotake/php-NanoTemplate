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

    static public $VERSION = '0.12';

    static public $template_dir;

    static public $charset = 'UTF-8';
    
    static public $assign = array();

    public function __construct($template_dir = null, $charset = 'UTF-8')
    {
        if (!is_null($template_dir)) {
            self::$template_dir = $template_dir;
        }
        self::$charset = $charset;
    }

    public function set($key, $value)
    {
        self::$assign[$key] = $value;
    }

    public function render($tmpl = null, $binds = array())
    {
        $template_dir = (strpos('/', $tmpl) === 0) ? dirname($tmpl) : self::$template_dir;

        //bind variable for template
        foreach (array_merge(self::$assign, $binds) as $key => $value) {
            if (is_object($value)) {
                $$key = $value;
            } else {
                $$key = htmlspecialchars($value, ENT_QUOTES, self::$charset);
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


