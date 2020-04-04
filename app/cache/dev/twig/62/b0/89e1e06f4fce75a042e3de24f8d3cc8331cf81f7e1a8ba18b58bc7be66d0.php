<?php

/* GeneralTemplateBundle:Menu:footer.html.twig */
class __TwigTemplate_62b089e1e06f4fce75a042e3de24f8d3cc8331cf81f7e1a8ba18b58bc7be66d0 extends Twig_Template
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
<nav id=\"footer\" style=\"position: absolute; z-index: 5; width: 100%; padding-top: 0px;\">

<section style=\"background: #bdc3c7; margin-bottom: 20px;\">
<div class=\"container\">
<div class=\"row\">
\t<div class=\"col-lg-12\" style=\"padding-top: 15px;\">
\t\tAbonnez-vous à la newletter pour suivre la mise à jour des cours en temps réel. <span class=\"fa fa-angle-double-right\"></span>  <form action=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("users_user_create_newsletter_account");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo " style=\"display: inline;\">";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nom"), 'widget', array("attr" => array("placeholder" => "Rentrez votre nom", "style" => "height: 35px; padding: 7px;")));
        echo " ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email"), 'widget', array("attr" => array("placeholder" => "Rentrez votre e-mail", "style" => "height: 35px; padding: 7px;")));
        echo "  <button class=\"btn btn-primary\" style=\"height: 35px; border-radius: 0px;\">S'inscrire</button> ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "</form>
\t</div>
</div>
</div>
</section>

<div class=\"container\">
<div class=\"row\">
\t
\t<div class=\"col-lg-3\">
\t\t<div><strong><span class=\"mdi-action-description\"></span> Az Corp E-learning</strong></div>\t
\t\t<div><a href=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous");
        echo "\" style=\"color: #fff;\"> À propos</a></div>\t
\t\t<div><a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous");
        echo "\" style=\"color: #fff;\"> Comment ça marche ?</a></div>\t
\t\t<div><a href=\"#!\" style=\"color: #fff;\"> Conditions d'utilisation</a></div>\t
\t</div>
\t<div class=\"col-lg-3\">
\t\t<div><strong><span class=\"mdi-action-open-in-new\"></span> L'entreprise</strong></div>\t
\t\t<div><a href=\"http://e-learning.azcorporation.net\" style=\"color: #fff;\" target=\"_blank\"> e-learning.azcorporation.net</a></div>\t
\t\t<div><a href=\"http://azcorporation.net\" style=\"color: #fff;\" target=\"_blank\"> azcorporation.net</a></div>
\t\t
\t\t<div>";
        // line 28
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            echo "<a href=\"";
            echo $this->env->getExtension('routing')->getPath("users_adminuser_accueil_administration");
            echo "\" style=\"color: #fff;\"> Administration</a> ";
        }
        echo " ";
        if ($this->env->getExtension('security')->isGranted("ROLE_FORMATEUR")) {
            echo "| <a href=\"";
            echo $this->env->getExtension('routing')->getPath("produit_produit_ajouter_nouveau_produit");
            echo "\" style=\"color: #fff;\"> Créez un cours</a>";
        }
        echo "</div>
\t\t
\t</div>
\t<div class=\"col-lg-3\">
\t\t<div><strong><span class=\"mdi-action-perm-phone-msg\"></span> Nous Contactez</strong></div>\t
\t\t<div><a href=\"#!\" style=\"color: #fff;\"> Tel: (+237) 697.27.97.70</a></div>
\t\t<div><a href=\"#!\" style=\"color: #fff;\"> BP: 154 Yaoundé</a></div>
\t\t<div><a href=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("produit_service_contact_us");
        echo "\" style=\"color: #fff;\"> Formulaire de contact</a></div>\t
\t</div>
\t<div class=\"col-lg-3\">
\t\t<div><strong><span class=\"mdi-communication-location-on\"></span> Localisation</strong></div>\t
\t\t<div><a href=\"#!\" style=\"color: #fff;\"> Yaoundé, Biyem-assi-Collège Bambis</a></div>
\t\t<div><a href=\"#!\" style=\"color: #fff;\"> Cameroun</a></div>
\t</div>
</div>
\t\t
</div>
<div class=\"container\">
\t<hr>
\t<div class=\"pull-left fnav\">
\t\t<p>© 2017 All rights reserved. Design By <a href=\"http://africexplorer.com/\">Afex</a></p>
\t</div>
\t<div class=\"pull-right fnav\">
\t\t<ul class=\"footer-social\">
\t\t\t<li>Suivez-nous sur : </li>
\t\t\t<li><a href=\"";
        // line 53
        echo twig_escape_filter($this->env, (isset($context["facebook"]) ? $context["facebook"] : $this->getContext($context, "facebook")), "html", null, true);
        echo "\" target=\"_blank\"><i class=\"fa fa-facebook\"></i></a></li>
\t\t\t<li><a href=\"";
        // line 54
        echo twig_escape_filter($this->env, (isset($context["google"]) ? $context["google"] : $this->getContext($context, "google")), "html", null, true);
        echo "\" target=\"_blank\"><i class=\"fa fa-google-plus\"></i></a></li>
\t\t\t<li><a href=\"";
        // line 55
        echo twig_escape_filter($this->env, (isset($context["twitter"]) ? $context["twitter"] : $this->getContext($context, "twitter")), "html", null, true);
        echo "\" target=\"_blank\"><i class=\"fa fa-twitter\"></i></a></li>
\t\t\t<li><a href=\"";
        // line 56
        echo twig_escape_filter($this->env, (isset($context["linkedin"]) ? $context["linkedin"] : $this->getContext($context, "linkedin")), "html", null, true);
        echo "\" target=\"_blank\"><i class=\"fa fa-linkedin\"></i></a></li>
\t\t</ul>
\t</div>
</div>
</nav>";
    }

    public function getTemplateName()
    {
        return "GeneralTemplateBundle:Menu:footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 56,  114 => 55,  110 => 54,  106 => 53,  85 => 35,  28 => 8,  177 => 82,  172 => 80,  148 => 58,  143 => 56,  120 => 46,  115 => 44,  104 => 40,  98 => 38,  92 => 36,  90 => 35,  50 => 19,  46 => 17,  42 => 16,  38 => 15,  31 => 11,  19 => 1,  354 => 159,  351 => 158,  346 => 132,  343 => 131,  338 => 40,  335 => 39,  329 => 26,  325 => 25,  318 => 21,  313 => 19,  309 => 18,  303 => 16,  300 => 15,  294 => 11,  288 => 10,  269 => 161,  267 => 158,  264 => 157,  243 => 153,  240 => 152,  223 => 151,  216 => 147,  211 => 145,  206 => 143,  202 => 142,  198 => 141,  193 => 139,  186 => 134,  184 => 131,  180 => 130,  170 => 122,  168 => 121,  131 => 50,  129 => 88,  125 => 48,  95 => 63,  67 => 39,  51 => 28,  49 => 15,  41 => 11,  35 => 9,  25 => 1,  112 => 43,  105 => 70,  102 => 39,  99 => 28,  94 => 23,  89 => 25,  87 => 23,  84 => 22,  81 => 21,  76 => 47,  71 => 33,  69 => 42,  66 => 14,  63 => 13,  57 => 10,  54 => 20,  48 => 6,  39 => 10,  563 => 263,  560 => 262,  555 => 259,  552 => 258,  541 => 249,  527 => 248,  516 => 244,  512 => 243,  508 => 242,  499 => 240,  496 => 239,  485 => 235,  481 => 234,  477 => 233,  468 => 231,  465 => 230,  462 => 229,  445 => 228,  439 => 224,  425 => 223,  419 => 221,  413 => 219,  410 => 218,  393 => 217,  370 => 197,  365 => 194,  350 => 192,  348 => 191,  345 => 190,  328 => 189,  308 => 172,  302 => 169,  268 => 137,  256 => 131,  250 => 156,  242 => 129,  237 => 126,  233 => 125,  208 => 103,  203 => 100,  191 => 94,  185 => 93,  164 => 120,  157 => 73,  145 => 68,  138 => 54,  134 => 62,  107 => 41,  101 => 39,  83 => 24,  75 => 18,  72 => 17,  65 => 28,  62 => 37,  56 => 10,  53 => 9,  45 => 5,  40 => 4,  36 => 2,  33 => 2,);
    }
}
