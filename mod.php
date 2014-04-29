<?php

class Mod
{
    protected $html;
    
    function __construct($html)
    {
        $this->html = $html;
    }

    function insertBefore($regex, $html)
    {
        $this->html = preg_replace($regex, "$html$0", $this->html);
    }

    function insertAfter($regex, $html)
    {
        $this->html = preg_replace($regex, "$0$html", $this->html);
    }

    function output()
    {
        echo $this->html;
    }
}

class IncludeMod extends Mod
{
    protected $html;

    function __construct($includefile)
    {
        ob_start();
        include ( $includefile );
        $this->html = ob_get_clean();
    }

    function output(){parent::output();}
    function insertBefore($regex, $html){parent::insertBefore($regex, $html);}
    function insertAfter($regex, $html){parent::insertAfter($regex, $html);}
}

?>