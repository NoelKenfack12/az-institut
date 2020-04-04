<?php

/* UsersUserBundle:User:lienutile.html.twig */
class __TwigTemplate_dd1eb515e149b32badfda991442dd90eb6633b55a06c6c111a870d5f22d29d9d extends Twig_Template
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
<div class=\"panel panel-widget text-left\">
\t<div class=\"compose-left\">
\t\t<div class=\"chat-grid widget-shadow\">
\t\t<div class=\"head\" style=\"padding: 7px; background: #ddd; margin: -2px -2px 0px -2px; color: #fff;\">Liens utiles</div>
\t\t\t<ul>
\t\t\t\t<li style=\"border-bottom: 1px solid #ddd; padding: 7px 0px; margin-right: -1px;\">
\t\t\t\t<a class=\"img-slide open-element\" href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("produit_service_visiter_notre_blog");
        echo "\">
\t\t\t\t\t<div class=\"col-xs-3\" style=\"padding: 0px;\">
\t\t\t\t\t<img class=\"img-circle\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/appcode.png"), "html", null, true);
        echo "\" alt=\"\" class=\"pull-left\" style=\"border-radius: 25px; height: 50px; width: 50px;\"/>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-9\">
\t\t\t\t\tNos formations</br>
\t\t\t\t\tDiplômant 
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"clearfix\"> </div>\t
\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t
\t\t\t\t<li style=\"border-bottom: 1px solid #ddd; padding: 7px 0px; margin-right: -1px;\">
\t\t\t\t\t<a class=\"admin-site open-element\" href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("produit_produit_accueil_boutique_produit");
        echo "\">
\t\t\t\t\t\t<div class=\"col-xs-3\" style=\"padding: 0px;\">
\t\t\t\t\t\t\t<img class=\"img-circle\" src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/cours.png"), "html", null, true);
        echo "\" alt=\"\" style=\"border-radius: 25px; height: 50px; width: 50px;\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-xs-9\">
\t\t\t\t\t\t\tNos cours</br>
\t\t\t\t\t\t\tDisponible en ligne
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clearfix\"> </div>\t
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t<li style=\"border-bottom: 1px solid #ddd; padding: 7px 0px; margin-right: -1px;\">
\t\t\t\t\t<a class=\"categorie-produit open-element\" href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("produit_service_forum_site");
        echo "\">
\t\t\t\t\t\t<div class=\"col-xs-3\" style=\"padding: 0px;\">
\t\t\t\t\t\t\t<img class=\"img-circle\" src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/discussion.png"), "html", null, true);
        echo "\" alt=\"\" style=\"border-radius: 10px; height: 50px; width: 50px;\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-xs-9\">
\t\t\t\t\t\t\tForum</br>
\t\t\t\t\t\t\tEntre-aide
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clearfix\"> </div>\t
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t<li style=\"border-bottom: 1px solid #ddd; padding: 7px 0px; margin-right: -1px;\">
\t\t\t\t\t<a class=\"article-service open-element lien-about-us\" href=\"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous");
        echo "\">
\t\t\t\t\t\t<div class=\"col-xs-3\" style=\"padding: 0px;\">
\t\t\t\t\t\t\t<img class=\"img-circle\" src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/about.png"), "html", null, true);
        echo "\" alt=\"\" style=\"border-radius: 25px; height: 50px; width: 50px;\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-xs-9\">
\t\t\t\t\t\t\tÀ propos</br>
\t\t\t\t\t\t\tComment ça marche ?
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clearfix\"> </div>\t
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t";
        // line 56
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user") != null)) {
            // line 57
            echo "\t\t\t\t<li style=\"border-bottom: 1px solid #ddd; padding: 7px 0px; margin-right: -1px;\">
\t\t\t\t\t<a class=\"competition-service open-element\" href=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_user_user_accueil", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id"))), "html", null, true);
            echo "\">
\t\t\t\t\t\t<div class=\"col-xs-3\" style=\"padding: 0px;\">
\t\t\t\t\t\t\t<img class=\"img-circle\" src=\"";
            // line 60
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "imgprofil") != null)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "imgprofil"), "getwebpath")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.png"), "html", null, true);
            }
            echo "\" alt=\"\" style=\"border-radius: 25px; height: 50px; width: 50px;\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-xs-9\">
\t\t\t\t\t\t\tMon compte personnel</br>
\t\t\t\t\t\t\t";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "name", array(0 => 25), "method"), "html", null, true);
            echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clearfix\"> </div>\t
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t";
        } else {
            // line 70
            echo "\t\t\t\t<li style=\"border-bottom: 1px solid #ddd; padding: 7px 0px; margin-right: -1px;\">
\t\t\t\t\t<a class=\"competition-service open-element\" href=\"";
            // line 71
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\">
\t\t\t\t\t\t<div class=\"col-xs-3\" style=\"padding: 0px;\">
\t\t\t\t\t\t\t<img class=\"img-circle\" src=\"";
            // line 73
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.png"), "html", null, true);
            echo "\" alt=\"\" style=\"border-radius: 25px; height: 50px; width: 50px;\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-xs-9\">
\t\t\t\t\t\t\tMon compte personnel</br>
\t\t\t\t\t\t\tConnexion
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clearfix\"> </div>\t
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t";
        }
        // line 83
        echo "\t\t\t\t";
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user") != null)) {
            // line 84
            echo "\t\t\t\t<li style=\"border-bottom: 1px solid #ddd; padding: 7px 0px; margin-right: -1px;\">
\t\t\t\t\t<a class=\"fiche-enligne open-element\" href=\"";
            // line 85
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_user_modifier_profil", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id"))), "html", null, true);
            echo "\">
\t\t\t\t\t\t<div class=\"col-xs-3\" style=\"padding: 0px;\">
\t\t\t\t\t\t\t<img class=\"img-circle\" src=\"";
            // line 87
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/key.png"), "html", null, true);
            echo "\" alt=\"\" style=\"border-radius: 25px; height: 60px; width: 60px;\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-xs-9\">
\t\t\t\t\t\t\tModifier mes paramètres</br>
\t\t\t\t\t\t\tInfos personnelles
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clearfix\"> </div>\t
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t";
        } else {
            // line 97
            echo "\t\t\t\t<li style=\"border-bottom: 1px solid #ddd; padding: 7px 0px; margin-right: -1px;\">
\t\t\t\t\t<a class=\"fiche-enligne open-element connexion-necessaire\" href=\"#!\">
\t\t\t\t\t\t<div class=\"col-xs-3\" style=\"padding: 0px;\">
\t\t\t\t\t\t\t<img class=\"img-circle\" src=\"";
            // line 100
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/key.png"), "html", null, true);
            echo "\" alt=\"\" style=\"border-radius: 25px; height: 60px; width: 60px;\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-xs-9\">
\t\t\t\t\t\t\tModifier mes paramètres</br>
\t\t\t\t\t\t\tInfos personnelles
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clearfix\"> </div>\t
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t";
        }
        // line 110
        echo "\t\t\t\t
\t\t\t\t<li style=\"border-bottom: 1px solid #ddd; padding: 7px 0px; margin-right: -1px;\">
\t\t\t\t\t<a class=\"fiche-enligne open-element lien-mon-solde\" href=\"";
        // line 112
        echo $this->env->getExtension('routing')->getPath("produit_service_yourcv_recrutement");
        echo "\">
\t\t\t\t\t\t<div class=\"col-xs-3\" style=\"padding: 0px;\">
\t\t\t\t\t\t\t<img class=\"img-circle\" src=\"";
        // line 114
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/achat.png"), "html", null, true);
        echo "\" alt=\"\" style=\"border-radius: 25px; height: 50px; width: 50px;\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-xs-9\">
\t\t\t\t\t\t\tCréditer mon compte</br>
\t\t\t\t\t\t\tInscription aux formations
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clearfix\"> </div>\t
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t
\t\t\t\t<li style=\"padding: 7px 0px; margin-right: -1px;\">
\t\t\t\t\t<a class=\"fiche-enligne open-element\" href=\"";
        // line 125
        echo $this->env->getExtension('routing')->getPath("produit_service_toute_actualite_entreprise");
        echo "\">
\t\t\t\t\t\t<div class=\"col-xs-3\" style=\"padding: 0px;\">
\t\t\t\t\t\t\t<img class=\"img-circle\" src=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/concours.png"), "html", null, true);
        echo "\" alt=\"\" style=\"border-radius: 25px; height: 50px; width: 50px;\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-xs-9\">
\t\t\t\t\t\t\tNos formateurs</br>
\t\t\t\t\t\t\tExperts
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clearfix\"> </div>\t
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t
\t\t\t</ul>
\t\t\t<div class=\"head\" style=\"padding: 7px; background: #ddd; margin: 0px -1px -1px -1px; color: #fff;\">Liens utiles</div>
\t\t</div>
\t</div>
</div>

<script type=\"text/javascript\">
\$('.connexion-necessaire').click(function(){
\t\$('.infos-action-effectuer').html('<span class=\"fa fa-stop\"></span> Connexion Nécessaire ! <a href=\"";
        // line 145
        echo $this->env->getExtension('routing')->getPath("login");
        echo "\">Connectez-vous ici.</a>');
\t\$('#infos-action-effectuer').modal('show');
});
</script>";
    }

    public function getTemplateName()
    {
        return "UsersUserBundle:User:lienutile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 145,  202 => 114,  197 => 112,  193 => 110,  180 => 100,  175 => 97,  162 => 87,  157 => 85,  154 => 84,  151 => 83,  138 => 73,  133 => 71,  130 => 70,  121 => 64,  110 => 60,  102 => 57,  100 => 56,  83 => 45,  70 => 35,  47 => 21,  33 => 10,  28 => 8,  19 => 1,  361 => 181,  358 => 180,  315 => 139,  311 => 138,  306 => 136,  302 => 135,  272 => 107,  257 => 105,  249 => 100,  243 => 97,  238 => 95,  231 => 94,  225 => 91,  221 => 127,  218 => 89,  216 => 125,  213 => 87,  196 => 86,  176 => 68,  170 => 67,  167 => 66,  165 => 65,  159 => 62,  155 => 61,  149 => 58,  137 => 55,  134 => 54,  131 => 53,  126 => 52,  124 => 51,  107 => 36,  105 => 58,  88 => 47,  81 => 16,  78 => 15,  72 => 13,  68 => 12,  65 => 33,  55 => 9,  52 => 23,  44 => 6,  39 => 4,  35 => 3,  32 => 2,);
    }
}
