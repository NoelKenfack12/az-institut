<?php

/* ProduitProduitBundle:Produit:recherche.html.twig */
class __TwigTemplate_1fc1278a8ccdf769d95177f272a406246471aee1d4bd53718c140f4d70fef296 extends Twig_Template
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
        echo "<hr style=\"margin-top: 45px; margin-bottom: 0px;\"/>
<div  style=\"background: rgba(83, 101, 240, 1); height: 10px;\">
</div>
<div style=\"background: #BDC3C7;\">
\t<div class=\"container\" style=\"color: #fff;\">
\tAccueil <span class=\"mdi-av-play-arrow\" style=\"font-size: 10px;\"></span> Recherche <span class=\"mdi-av-play-arrow\" style=\"font-size: 10px;\"></span> Cours
\t</div>\t
</div>\t
<hr style=\"margin-bottom: 0px;\"/>

";
        // line 11
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("ProduitProduitBundle:Produit:menucours"));
        echo "

<div class=\"container\">
\t<div class=\"row mt centered\">
\t\t<div class=\"col-lg-12\"  style=\"padding: 3px 7px;\">
\t\t\t<h1 class=\"text-primary text-left\"><span class=\"mdi-action-find-replace\" style=\"font-size: 35px;\"></span> Résultat de la recherche <strong>";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["donnee"]) ? $context["donnee"] : $this->getContext($context, "donnee")), "html", null, true);
        echo "</strong> <a href=\"#!\" class=\"pull-right delete-courant-result\"><span class=\"mdi-content-clear\" style=\"font-size: 35px;\"></span></a></h1>
\t\t</div>
\t\t<div class=\"col-lg-12\" style=\"padding: 3px 7px;\">
\t\t<div class=\"divider\"></div>
\t\t</div>
\t</div><!-- /row -->
\t
\t<div class=\"row mt centered\">
\t\t";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_produit"]) ? $context["liste_produit"] : $this->getContext($context, "liste_produit")));
        $context['_iterated'] = false;
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
            // line 25
            echo "\t\t\t<div class=\"col-md-3 photoday-grid\" style=\"padding: 3px 7px;\">
\t\t\t";
            // line 26
            $this->env->loadTemplate("ProduitProduitBundle:Produit:produitdescript.html.twig")->display($context);
            // line 27
            echo "\t\t\t</div>
\t\t";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 29
            echo "\t\t<div class=\"alert-warning text-left\" style=\"padding: 15px;  margin-bottom: 20px; border: 1px solid transparent; border-radius: 0px; margin-bottom: 100px;\"><span class=\"fa fa-warning\"></span> Aucun cours valide pour la recherche de mot clé <strong>";
            echo twig_escape_filter($this->env, (isset($context["donnee"]) ? $context["donnee"] : $this->getContext($context, "donnee")), "html", null, true);
            echo "</strong></div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['produit'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "\t</div><!-- /row -->
</div><!-- /container -->

<hr>

<script type=\"text/javascript\">
\$('.delete-courant-result').click(function(){
\t\$('.content-recherche-products-market').hide('slow');
\t\$('.content-manage-market').show();
});
</script>";
    }

    public function getTemplateName()
    {
        return "ProduitProduitBundle:Produit:recherche.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 31,  87 => 29,  73 => 27,  71 => 26,  68 => 25,  50 => 24,  39 => 16,  31 => 11,  19 => 1,);
    }
}
