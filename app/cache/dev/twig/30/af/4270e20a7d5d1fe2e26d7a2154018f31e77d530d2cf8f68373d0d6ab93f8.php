<?php

/* ProduitProduitBundle:Produit:menucours.html.twig */
class __TwigTemplate_30af4270e20a7d5d1fe2e26d7a2154018f31e77d530d2cf8f68373d0d6ab93f8 extends Twig_Template
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
<div class=\"general_social_icons\">
\t<div class=\"social\" style=\"top:105px;\">
\t\t<ul>
\t\t\t<li class=\"w3_twitter manage-catalogue-cours\" style=\"border-radius: 0px; background: #428bca;\"><a href=\"#\"> <strong class=\"label-catalogue\">Affichez</strong> <i class=\"mdi-hardware-keyboard-arrow-left indication-etat-catalogue\" style=\"margin: 0px;\"> <strong>Catalogue</strong></i></a></li>\t\t\t  
\t\t</ul>
    </div>
</div>

";
        // line 10
        if (((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")) != null)) {
            echo " 
<div class=\"catalogue-cours\" style=\"position: fixed; z-index: 500; width: 250px; left: 0px; top: 167px; display: none;\">

<ul class=\"list-group\" style=\"margin-bottom: 0px;\">
<a href=\"";
            // line 14
            echo $this->env->getExtension('routing')->getPath("produit_produit_accueil_boutique_produit");
            echo "\" class=\"list-group-item active\">
<img src=\"";
            // line 15
            if (($this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "src") != "source")) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "getwebpath")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/user-bg.jpg"), "html", null, true);
            }
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "nom"), "html", null, true);
            echo "\" style=\"width: 20px; height:20px; margin-top: -5px;\"/> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "nom"), "html", null, true);
            echo " <span class=\"badge\">";
            echo twig_escape_filter($this->env, (isset($context["nbproduit"]) ? $context["nbproduit"] : $this->getContext($context, "nbproduit")), "html", null, true);
            echo "</span>
</a>
";
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, (isset($context["liste_scat"]) ? $context["liste_scat"] : $this->getContext($context, "liste_scat")), 0, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["scat"]) {
                // line 18
                echo "<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_liste_produit_souscategorie", array("id" => $this->getAttribute((isset($context["scat"]) ? $context["scat"] : $this->getContext($context, "scat")), "id"))), "html", null, true);
                echo "\" class=\"list-group-item\" style=\"padding-top: 5px 7px; min-height: 60px;\">
<img src=\"";
                // line 19
                if (($this->getAttribute((isset($context["scat"]) ? $context["scat"] : $this->getContext($context, "scat")), "src") != null)) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["scat"]) ? $context["scat"] : $this->getContext($context, "scat")), "getwebpath")), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/user-bg.jpg"), "html", null, true);
                }
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["scat"]) ? $context["scat"] : $this->getContext($context, "scat")), "nom"), "html", null, true);
                echo "\" class=\"pull-left\" style=\"width: 40px; height: 40px; margin-right: 3px;\"/> ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["scat"]) ? $context["scat"] : $this->getContext($context, "scat")), "nom"), "html", null, true);
                echo " <span class=\"badge\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["scat"]) ? $context["scat"] : $this->getContext($context, "scat")), "nbproduit"), "html", null, true);
                echo "</span>
</a>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['scat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "
<a href=\"";
            // line 23
            echo $this->env->getExtension('routing')->getPath("produit_produit_module_deformation");
            echo "\" class=\"list-group-item\">
<span class=\"glyphicon glyphicon-chevron-right pull-right\"></span>
<img src=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/slide.png"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "nom"), "html", null, true);
            echo "\" style=\"width: 20px; height:20px;  margin-top: -5px;\"/> Tous les modules 
</a>
</ul>

</div>

<script type=\"text/javascript\">
var showcatalogue = 2;
\$('.manage-catalogue-cours').click(function(){
if(showcatalogue == 1)
{
showcatalogue = 2;
\$('.indication-etat-catalogue').removeClass('mdi-hardware-keyboard-arrow-right');
\$('.indication-etat-catalogue').addClass('mdi-hardware-keyboard-arrow-left');
\$('.label-catalogue').html('Affichez');
}else{
showcatalogue = 1;
\$('.indication-etat-catalogue').removeClass('mdi-hardware-keyboard-arrow-left');
\$('.indication-etat-catalogue').addClass('mdi-hardware-keyboard-arrow-right');
\$('.label-catalogue').html('Masquez');
}
\$('.catalogue-cours').toggle('slow');
});
</script>

";
        }
    }

    public function getTemplateName()
    {
        return "ProduitProduitBundle:Produit:menucours.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 25,  84 => 22,  65 => 19,  60 => 18,  56 => 17,  41 => 15,  37 => 14,  30 => 10,  96 => 31,  87 => 23,  73 => 27,  71 => 26,  68 => 25,  50 => 24,  39 => 16,  31 => 11,  19 => 1,);
    }
}
