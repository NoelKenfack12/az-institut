<?php

/* UsersUserBundle::layoutuser.html.twig */
class __TwigTemplate_710185a02a8c87cf8591b790fbe6d43bb36a80696542634a720ab9baf7306d68 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layoutbase.html.twig");

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
        return "::layoutbase.html.twig";
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
        return "UsersUserBundle::layoutuser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 30,  105 => 30,  102 => 29,  99 => 28,  94 => 23,  89 => 25,  87 => 23,  84 => 22,  81 => 21,  76 => 15,  71 => 18,  69 => 15,  66 => 14,  63 => 13,  57 => 10,  54 => 9,  48 => 6,  39 => 3,  563 => 263,  560 => 262,  555 => 259,  552 => 258,  541 => 249,  527 => 248,  516 => 244,  512 => 243,  508 => 242,  499 => 240,  496 => 239,  485 => 235,  481 => 234,  477 => 233,  468 => 231,  465 => 230,  462 => 229,  445 => 228,  439 => 224,  425 => 223,  419 => 221,  413 => 219,  410 => 218,  393 => 217,  370 => 197,  365 => 194,  350 => 192,  348 => 191,  345 => 190,  328 => 189,  308 => 172,  302 => 169,  268 => 137,  256 => 131,  250 => 130,  242 => 129,  237 => 126,  233 => 125,  208 => 103,  203 => 100,  191 => 94,  185 => 93,  164 => 77,  157 => 73,  145 => 68,  138 => 63,  134 => 62,  107 => 32,  101 => 39,  83 => 24,  75 => 18,  72 => 17,  65 => 14,  62 => 13,  56 => 10,  53 => 9,  45 => 5,  40 => 4,  36 => 2,  33 => 2,);
    }
}
