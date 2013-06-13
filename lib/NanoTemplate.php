<?php

class NanoTemplate {

    static public $VERSION = '0.04';

    private $assign = array();

    public function __construct($template_dir = 'view', $charset = 'UTF-8')
    {
        $this->template_dir = $template_dir;
        $this->charset = $charset;
    }

    public function set($key, $value)
    {
        $this->assign[$key] = $value;
    }

    public function render($tmpl = null, $binds = array())
    {
        //bind variable for template
        foreach (array_merge($this->assign, $binds) as $key => $value) {
            $$key = htmlspecialchars($value, ENT_QUOTES, $this->charset);
        }

        ob_start();
        include("$this->template_dir/$tmpl");
        $_content = ob_get_clean();

        if (isset($_layout)) {
            include("$this->template_dir/$_layout");
        } else {
            echo $_content;
        }
    }

}


