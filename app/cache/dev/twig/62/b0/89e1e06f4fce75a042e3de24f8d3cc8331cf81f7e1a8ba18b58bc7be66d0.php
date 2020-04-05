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
";
        // line 2
        if (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "home")) {
            // line 3
            echo "
\t <!-- partial:partials/_footer.html -->
        <footer class=\"footer\">
          <div class=\"w-100 clearfix\">
            <span class=\"text-muted d-block text-center text-sm-left d-sm-inline-block\">Copyright © 2018 <a href=\"http://www.urbanui.com/\" target=\"_blank\">Urbanui</a>. All rights reserved.</span>
            <span class=\"float-none float-sm-right d-block mt-1 mt-sm-0 text-center\">Hand-crafted & made with <i class=\"mdi mdi-heart-outline text-danger\"></i></span>
          </div>
        </footer>
        <!-- partial -->
\t\t
";
        } else {
            // line 14
            echo "\t<nav id=\"footer\" style=\"position: absolute; z-index: 5; width: 100%; padding-top: 0px;\">
\t<section style=\"background: #bdc3c7; margin-bottom: 20px;\">
\t<div class=\"container\">
\t<div class=\"row\">
\t\t<div class=\"col-lg-12\" style=\"padding-top: 15px;\">
\t\t\tAbonnez-vous à la newletter pour suivre la mise à jour des cours en temps réel. <span class=\"fa fa-angle-double-right\"></span>  <form action=\"";
            // line 19
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
\t\t</div>
\t</div>
\t</div>
\t</section>

\t<div class=\"container\">
\t<div class=\"row\">
\t\t
\t\t<div class=\"col-lg-3\">
\t\t\t<div><strong><span class=\"mdi-action-description\"></span> Az Corp E-learning</strong></div>\t
\t\t\t<div><a href=\"";
            // line 30
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous");
            echo "\" style=\"color: #fff;\"> À propos</a></div>\t
\t\t\t<div><a href=\"";
            // line 31
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous");
            echo "\" style=\"color: #fff;\"> Comment ça marche ?</a></div>\t
\t\t\t<div><a href=\"#!\" style=\"color: #fff;\"> Conditions d'utilisation</a></div>\t
\t\t</div>
\t\t<div class=\"col-lg-3\">
\t\t\t<div><strong><span class=\"mdi-action-open-in-new\"></span> L'entreprise</strong></div>\t
\t\t\t<div><a href=\"http://e-learning.azcorporation.net\" style=\"color: #fff;\" target=\"_blank\"> e-learning.azcorporation.net</a></div>\t
\t\t\t<div><a href=\"http://azcorporation.net\" style=\"color: #fff;\" target=\"_blank\"> azcorporation.net</a></div>
\t\t\t
\t\t\t<div>";
            // line 39
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
\t\t\t
\t\t</div>
\t\t<div class=\"col-lg-3\">
\t\t\t<div><strong><span class=\"mdi-action-perm-phone-msg\"></span> Nous Contactez</strong></div>\t
\t\t\t<div><a href=\"#!\" style=\"color: #fff;\"> Tel: (+237) 697.27.97.70</a></div>
\t\t\t<div><a href=\"#!\" style=\"color: #fff;\"> BP: 154 Yaoundé</a></div>
\t\t\t<div><a href=\"";
            // line 46
            echo $this->env->getExtension('routing')->getPath("produit_service_contact_us");
            echo "\" style=\"color: #fff;\"> Formulaire de contact</a></div>\t
\t\t</div>
\t\t<div class=\"col-lg-3\">
\t\t\t<div><strong><span class=\"mdi-communication-location-on\"></span> Localisation</strong></div>\t
\t\t\t<div><a href=\"#!\" style=\"color: #fff;\"> Yaoundé, Biyem-assi-Collège Bambis</a></div>
\t\t\t<div><a href=\"#!\" style=\"color: #fff;\"> Cameroun</a></div>
\t\t</div>
\t</div>
\t\t\t
\t</div>
\t<div class=\"container\">
\t\t<hr>
\t\t<div class=\"pull-left fnav\">
\t\t\t<p>© 2017 All rights reserved. Design By <a href=\"http://africexplorer.com/\">Afex</a></p>
\t\t</div>
\t\t<div class=\"pull-right fnav\">
\t\t\t<ul class=\"footer-social\">
\t\t\t\t<li>Suivez-nous sur : </li>
\t\t\t\t<li><a href=\"";
            // line 64
            echo twig_escape_filter($this->env, (isset($context["facebook"]) ? $context["facebook"] : $this->getContext($context, "facebook")), "html", null, true);
            echo "\" target=\"_blank\"><i class=\"fa fa-facebook\"></i></a></li>
\t\t\t\t<li><a href=\"";
            // line 65
            echo twig_escape_filter($this->env, (isset($context["google"]) ? $context["google"] : $this->getContext($context, "google")), "html", null, true);
            echo "\" target=\"_blank\"><i class=\"fa fa-google-plus\"></i></a></li>
\t\t\t\t<li><a href=\"";
            // line 66
            echo twig_escape_filter($this->env, (isset($context["twitter"]) ? $context["twitter"] : $this->getContext($context, "twitter")), "html", null, true);
            echo "\" target=\"_blank\"><i class=\"fa fa-twitter\"></i></a></li>
\t\t\t\t<li><a href=\"";
            // line 67
            echo twig_escape_filter($this->env, (isset($context["linkedin"]) ? $context["linkedin"] : $this->getContext($context, "linkedin")), "html", null, true);
            echo "\" target=\"_blank\"><i class=\"fa fa-linkedin\"></i></a></li>
\t\t\t</ul>
\t\t</div>
\t</div>
\t</nav>
";
        }
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
        return array (  134 => 67,  130 => 66,  126 => 65,  122 => 64,  44 => 19,  37 => 14,  24 => 3,  22 => 2,  562 => 464,  557 => 462,  533 => 440,  528 => 438,  523 => 436,  516 => 432,  510 => 430,  505 => 428,  500 => 426,  497 => 425,  492 => 423,  489 => 422,  487 => 421,  483 => 420,  477 => 418,  475 => 417,  456 => 415,  450 => 412,  435 => 400,  431 => 399,  427 => 398,  423 => 397,  416 => 393,  404 => 383,  21 => 2,  19 => 1,  354 => 163,  351 => 162,  346 => 136,  343 => 135,  338 => 39,  335 => 38,  328 => 27,  320 => 22,  316 => 21,  312 => 20,  309 => 19,  306 => 18,  300 => 15,  294 => 12,  275 => 165,  273 => 162,  270 => 161,  256 => 160,  249 => 157,  246 => 156,  229 => 155,  222 => 151,  217 => 149,  212 => 147,  208 => 146,  204 => 145,  199 => 143,  192 => 138,  190 => 135,  186 => 134,  176 => 126,  174 => 125,  170 => 124,  137 => 93,  135 => 92,  131 => 91,  111 => 74,  101 => 46,  78 => 47,  68 => 38,  61 => 34,  55 => 30,  53 => 18,  49 => 16,  47 => 15,  41 => 12,  35 => 9,  25 => 1,  112 => 30,  107 => 32,  105 => 30,  102 => 29,  99 => 28,  94 => 23,  89 => 25,  87 => 23,  84 => 22,  81 => 39,  76 => 15,  71 => 18,  69 => 15,  66 => 30,  63 => 13,  54 => 9,  45 => 5,  375 => 306,  372 => 305,  367 => 302,  364 => 301,  83 => 22,  80 => 21,  73 => 18,  70 => 31,  67 => 16,  60 => 13,  57 => 10,  48 => 6,  43 => 13,  39 => 3,  36 => 2,  33 => 3,);
    }
}
