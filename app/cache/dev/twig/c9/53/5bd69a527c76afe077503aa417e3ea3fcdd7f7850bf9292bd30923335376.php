<?php

/* UsersUserBundle::layouthome.html.twig */
class __TwigTemplate_c9535bd69a527c76afe077503aa417e3ea3fcdd7f7850bf9292bd30923335376 extends Twig_Template
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
        return array (  112 => 30,  107 => 32,  105 => 30,  102 => 29,  99 => 28,  94 => 23,  89 => 25,  87 => 23,  84 => 22,  81 => 21,  76 => 15,  71 => 18,  69 => 15,  66 => 14,  63 => 13,  54 => 9,  45 => 5,  375 => 306,  372 => 305,  367 => 302,  364 => 301,  83 => 22,  80 => 21,  73 => 18,  70 => 17,  67 => 16,  60 => 13,  57 => 10,  48 => 6,  43 => 6,  39 => 3,  36 => 2,  33 => 3,);
    }
}
