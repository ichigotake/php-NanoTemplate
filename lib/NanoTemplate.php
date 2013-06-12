<?php

class NanoTemplate {

    static public $VERSION = '0.01';

    private $assign = array();

    public function __construct($template_dir = 'view')
    {
        $this->template_dir = $template_dir;
    }

    public function set($key, $value)
    {
        $this->assign[$key] = $value;
    }

    public function render($tmpl = null, $binds = array())
    {
        //bind variable for template
        foreach (array_merge($this->assign, $binds) as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include("$this->template_dir/$tmpl");
        $content = ob_get_clean();

        if (isset($layout)) {
            include("$this->template_dir/$layout");
        }
    }

}


