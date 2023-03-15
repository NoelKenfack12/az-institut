<?php

/* UsersUserBundle::layouthome.html.twig */
class __TwigTemplate_5b47c057f37a2ca59489b1e0a7608563f3d06cc9ad1c5740cdfe66b80b6dbd7e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layoutbasehome.html.twig");

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'userblog_body' => array($this, 'block_userblog_body'),
            'srcjavascript' => array($this, 'block_srcjavascript'),
            'srcjavascripttemplate' => array($this, 'block_srcjavascripttemplate'),
            'javascript' => array($this, 'block_javascript'),
            'javascripttemplate' => array($this, 'block_javascripttemplate'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layoutbasehome.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_meta($context, array $blocks = array())
    {
        // line 3
        $this->displayParentBlock("meta", $context, $blocks);
        echo "
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        // line 6
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo "
";
        // line 15
        $this->displayBlock('userblog_body', $context, $blocks);
        // line 18
        echo "
";
    }

    // line 15
    public function block_userblog_body($context, array $blocks = array())
    {
    }

    // line 21
    public function block_srcjavascript($context, array $blocks = array())
    {
        // line 22
        echo "
";
        // line 23
        $this->displayBlock('srcjavascripttemplate', $context, $blocks);
        // line 25
        echo "
";
    }

    // line 23
    public function block_srcjavascripttemplate($context, array $blocks = array())
    {
    }

    // line 28
    public function block_javascript($context, array $blocks = array())
    {
        // line 29
        echo "
";
        // line 30
        $this->displayBlock('javascripttemplate', $context, $blocks);
        // line 32
        echo "
";
    }

    // line 30
    public function block_javascripttemplate($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "UsersUserBundle::layouthome.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 30,  107 => 32,  105 => 30,  102 => 29,  99 => 28,  87 => 23,  84 => 22,  81 => 21,  76 => 15,  71 => 18,  69 => 15,  66 => 14,  63 => 13,  48 => 6,  45 => 5,  39 => 3,  1351 => 1007,  1348 => 1006,  1343 => 1003,  1340 => 1002,  1276 => 941,  1270 => 937,  1261 => 934,  1256 => 932,  1252 => 931,  1244 => 930,  1241 => 929,  1237 => 928,  1211 => 907,  813 => 511,  802 => 502,  789 => 495,  786 => 494,  775 => 489,  771 => 488,  765 => 485,  759 => 482,  755 => 481,  750 => 479,  746 => 478,  743 => 477,  739 => 476,  734 => 474,  722 => 469,  717 => 466,  713 => 465,  699 => 454,  683 => 441,  672 => 432,  670 => 431,  664 => 427,  599 => 365,  587 => 356,  581 => 353,  575 => 349,  561 => 341,  556 => 339,  552 => 337,  538 => 329,  534 => 328,  530 => 326,  526 => 325,  518 => 322,  514 => 320,  510 => 319,  503 => 315,  499 => 313,  497 => 312,  494 => 311,  479 => 309,  476 => 308,  473 => 307,  470 => 306,  467 => 305,  450 => 304,  448 => 303,  446 => 302,  257 => 116,  243 => 104,  222 => 102,  205 => 101,  194 => 93,  189 => 91,  182 => 87,  172 => 79,  161 => 74,  157 => 73,  148 => 71,  139 => 69,  135 => 67,  131 => 66,  94 => 23,  89 => 25,  86 => 28,  67 => 14,  64 => 13,  57 => 10,  54 => 9,  46 => 6,  41 => 4,  36 => 2,  33 => 2,);
    }
}
