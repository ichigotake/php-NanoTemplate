<?php

class NanoTemplate {

    static public $VERSION = '0.06';

    static public $template_dir = 'view';

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
        $template_dir = self::$template_dir;

        //bind variable for template
        foreach (array_merge(self::$assign, $binds) as $key => $value) {
            $$key = htmlspecialchars($value, ENT_QUOTES, self::$charset);
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


