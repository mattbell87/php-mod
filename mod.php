<?php
/*

    PHP-Mod

    A simple utility class for manipulating html or include files. 

    This may be useful for projects such as Wordpress child themes or plugins.

*/

class Mod
{
    protected $html;
    
    function __construct($html)
    {
        $this->html = $html;
    }

    function append($html) //Append some html
    {
        $this->html .= $html;
    }

    function prepend($html) //Prepend some html
    {
        $this->html = $html.$this->html;
    }

    function insertBefore($regex, $html) //Insert some html before a regex match
    {
        $this->html = preg_replace($regex, "$html$0", $this->html);
    }

    function insertAfter($regex, $html) //Insert some html after a regex match
    {
        $this->html = preg_replace($regex, "$0$html", $this->html);
    }

    function output() //Output some html
    {
        echo $this->html;
    }
}

class IncludeMod extends Mod
{
    protected $html;

    //Use include file output for html
    function __construct($includefile)
    {
        ob_start();
        include ( $includefile );
        $this->html = ob_get_clean();
    }

    //Use parent class functions
    function output(){parent::output();}
    function insertBefore($regex, $html){parent::insertBefore($regex, $html);}
    function insertAfter($regex, $html){parent::insertAfter($regex, $html);}
    function append($html){parent::append($html);}
    function prepend($html){parent::prepend($html);}

}

?>
