<?php

/* ProduitServiceBundle:Service:nosformations.html.twig */
class __TwigTemplate_82135b980623b48790b40574a14e4946d06eb86589fa2ae4b3184e46d28d7d52 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("UsersUserBundle::layoutuser.html.twig");

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'title' => array($this, 'block_title'),
            'userblog_body' => array($this, 'block_userblog_body'),
            'javascripttemplate' => array($this, 'block_javascripttemplate'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "UsersUserBundle::layoutuser.html.twig";
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
<meta name=\"keywords\" content=\"";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo ", formateurs, enseignants, éducateurs, travaux pratiques, exercices corrigés, formations, Informatique, Développements, Maintenance, Réseaux\"/>
<meta name=\"author\" content=\"Noel Kenfack\"/>
<meta name=\"description\" content=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo " - Liste des formations ";
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo "\"/>
";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        // line 9
        $this->displayParentBlock("title", $context, $blocks);
        echo " Liste des formations ";
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo ".
";
    }

    // line 11
    public function block_userblog_body($context, array $blocks = array())
    {
        // line 12
        echo "
<hr style=\"margin-top: 45px; margin-bottom: 0px;\"/>
<div  style=\"background: rgba(83, 101, 240, 1); height: 10px;\">
</div>
<div style=\"background: #BDC3C7;\">
\t<div class=\"container\" style=\"color: #fff;\">
\tAccueil <span class=\"mdi-av-play-arrow\" style=\"font-size: 10px;\"></span> Formations
\t</div>\t
</div>\t
<hr style=\"margin-bottom: 0px;\"/>

<div class=\"container\">
\t\t<div class=\"row mt centered\">
\t\t\t<div class=\"col-lg-12 text-left\" style=\"padding: 3px 7px;\">
\t\t\t\t<h1><span class=\"mdi-av-hearing\"></span> Nos offres de formations</h1>
\t\t\t\t<div class=\"col-lg-12\" style=\"padding: 0px;\">
\t\t\t\t<div class=\"divider\"></div>
\t\t\t\t</div>
\t\t\t\t<h3>It is a long established fact that a reader will be distracted by.</h3>
\t\t\t</div>
\t\t</div><!-- /row -->
\t\t
\t\t<div class=\"row mt centered\">
\t\t\t<div class=\"content-article variation-contenu\" value=\"0\" id=\"\">
\t\t\t\t";
        // line 36
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("ProduitServiceBundle:Service:listeformation", array("page" => 1)));
        echo "
\t\t\t</div>
\t\t</div>
</div>

<hr/>

";
    }

    // line 46
    public function block_javascripttemplate($context, array $blocks = array())
    {
        // line 47
        echo "
";
    }

    public function getTemplateName()
    {
        return "ProduitServiceBundle:Service:nosformations.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 47,  105 => 46,  93 => 36,  67 => 12,  64 => 11,  56 => 9,  53 => 8,  45 => 6,  38 => 4,  34 => 3,  31 => 2,);
    }
}
