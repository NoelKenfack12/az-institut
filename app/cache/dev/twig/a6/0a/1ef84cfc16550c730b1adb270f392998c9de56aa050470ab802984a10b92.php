<?php

/* ProduitServiceBundle:Service:listeformation.html.twig */
class __TwigTemplate_a60a1ef84cfc16550c730b1adb270f392998c9de56aa050470ab802984a10b92 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_formation"]) ? $context["liste_formation"] : $this->getContext($context, "liste_formation")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["formation"]) {
            // line 3
            echo "<div class=\"col-md-12 photoday-grid\" style=\"padding: 3px 7px; margin-bottom: 15px;\">
<div class=\"message-top\" style=\"padding: 0px 7px; background: #428bca; \">
\t<div class=\"message-left\" style=\"display: inline-block; width: 100%;\">
\t<h3><span class=\"mdi-action-wallet-membership\"></span> ";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "nom"), "html", null, true);
            echo "
\t<div class=\"btn-group pull-right\" style=\"margin-bottom: -20px; margin-top: -10px;\">
\t<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" style=\"cursor: pointer; color: #fff;\"><span class=\"fa fa-sort-down\"></span></a>
\t\t<ul class=\"dropdown-menu pull-right\" style=\"margin-top: 0px; border-radius: 0px;\">
\t\t\t<li><a href=\"#!\"><span class=\" fa fa-info-circle\"></span> À propos </a></li>
\t\t\t<li class=\"divider\"></li>
\t\t\t<li><a href=\"#!\"><span class=\" fa fa-check\"></span> Formation en ligne et au centre</a></li>
\t\t</ul>
\t</div>
\t</h3>
\t</div>
\t<div class=\"clearfix\"></div>
</div>
<div class=\"message-bottom\">
<div style=\"border-bottom: 1px solid #ddd; padding-bottom: 5px;\">
<div class=\"col-md-4\">
<div style=\"background: #f2f2f2; border-radius: 0px;\" class=\"img-thumbnail\">
<img src=\"";
            // line 23
            if (($this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "imgservice") != null)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "imgservice"), "getwebpath")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/img/1.jpg"), "html", null, true);
            }
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "keyword"), "html", null, true);
            echo "\"  style=\"height: 200px; width: 100%; border-radius: 0px;\"/>
</div>
</div>
<div class=\"col-md-8\">
\t<div class=\"message1-left\" style=\"display: inline-block!important; width: 100%;\">
\t\t<h4 style=\"border-bottom: 1px solid #eea236; padding-bottom: 5px;\"><img src=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/badgeaz.png"), "html", null, true);
            echo "\" alt=\"Certificat\" class=\"pull-right\" title=\"Formations certifiantes\" style=\"height: 30px; width: 25px; margin-top: -10px;\"/><span class=\"fa fa-chevron-right\" style=\"color: #eea236;\"></span> Formation certifiante au centre et en ligne</h4>
\t\t";
            // line 29
            echo $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "detail");
            echo "
\t\t<a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_assistance_entreprise", array("id" => $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "id"))), "html", null, true);
            echo "\" class=\"btn btn-primary pull-right\">Démarrez avec cette formation <span class=\"fa fa-angle-double-right\"></span></a>
\t</div>
\t<div class=\"clearfix\"></div>
</div>
<div class=\"clearfix\"></div>
</div>
</div>
</div>

";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 40
            echo "<div class=\"alert alert-warning\" style=\"margin-bottom: 50px;\">Aucune formation publiée pour le moment !</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['formation'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "
<div class=\"clearfix\"></div>
";
        // line 44
        $context["p"] = (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page"));
        // line 45
        echo "<div class=\"afficheresultatrechercheannonce\">
";
        // line 46
        if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) != (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"))) && ((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) != 0))) {
            // line 47
            $context["pagesuivante"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 1);
            // line 48
            echo "<div class=\"panel panel-widget annoncaactionpagesuivant\" style=\"width: 100%; padding: 0px;\">
\t<div style=\"background: transparent; padding: 5px;\">
\t</div>
\t<div class=\"chat-grid widget-shadow\" style=\"text-align: center;\">
\t<img src=\"";
            // line 52
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/wait-user-big.gif"), "html", null, true);
            echo "\" alt=\"Attente\"/>
\t</div>
\t<div style=\"background: transparent; border-top: 1px solid #fff; padding: 5px;\">
\t</div>
</div>
";
        }
        // line 58
        echo "</div>

<script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/js/onvisible.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

<script type=\"text/javascript\" class=\"annuler-script-page\">
\$(function(){

";
        // line 65
        if ((((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")) != (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"))) && ((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) != 0))) {
            // line 66
            echo "function plusdevisite()
{
var visibility = visibleElement('.annoncaactionpagesuivant');
if(visibility){
 if(\$('.variation-contenu').attr('value') == 0)
  {
  \$('.variation-contenu').attr('value',1);
  window.clearInterval(refresch);
  \$.ajax({
\t\turl : '";
            // line 75
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_all_formation_struct", array("page" => (isset($context["pagesuivante"]) ? $context["pagesuivante"] : $this->getContext($context, "pagesuivante")))), "html", null, true);
            echo "',
\t\ttype : 'POST',
\t\tdataType : 'html', // On désire recevoir du HTML
\t\tsuccess : function(data, statut){ // code_html contient le HTML renvoyé
\t\t  \$('.annuler-script-page').replaceWith(' ');
\t\t  \$('.afficheresultatrechercheannonce').replaceWith(data);
\t\t  \$('.variation-contenu').attr('value',0);
\t\t}
\t});
  }
}

}
refresch = window.setInterval(function() { plusdevisite(); }, 400);
";
        }
        // line 90
        echo "});
</script>";
    }

    public function getTemplateName()
    {
        return "ProduitServiceBundle:Service:listeformation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 90,  149 => 75,  138 => 66,  136 => 65,  128 => 60,  124 => 58,  115 => 52,  109 => 48,  107 => 47,  102 => 45,  100 => 44,  96 => 42,  89 => 40,  74 => 30,  70 => 29,  66 => 28,  52 => 23,  32 => 6,  27 => 3,  22 => 2,  19 => 1,  108 => 47,  105 => 46,  93 => 36,  67 => 12,  64 => 11,  56 => 9,  53 => 8,  45 => 6,  38 => 4,  34 => 3,  31 => 2,);
    }
}
