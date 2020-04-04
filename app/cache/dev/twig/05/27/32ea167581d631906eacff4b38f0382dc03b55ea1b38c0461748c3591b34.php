<?php

/* UsersUserBundle:User:inscriptionuser.html.twig */
class __TwigTemplate_052732ea167581d631906eacff4b38f0382dc03b55ea1b38c0461748c3591b34 extends Twig_Template
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
        echo ", Inscription, Connexion, Az corporation, E-learning, Az E-learning, Cours diplomant, cours en ligne, cours vidéos\"/>
<meta name=\"author\" content=\"Noel Kenfack\"/>
<meta name=\"description\" content=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, (isset($context["metier"]) ? $context["metier"] : $this->getContext($context, "metier")), "html", null, true);
        echo " - Cours diplômant en ligne.\"/>
";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        // line 9
        $this->displayParentBlock("title", $context, $blocks);
        echo " | Inscription 
";
    }

    // line 12
    public function block_userblog_body($context, array $blocks = array())
    {
        // line 13
        echo "<div id=\"headerwrap\" style=\"background: #428bca; padding-top: 100px;\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row\" style=\"padding: 0px; margin: 0px;\">
\t\t\t\t<div class=\"col-lg-6\">
\t\t\t\t\t<h1 style=\"\">Inscription</h1>
\t\t\t\t\t<form class=\"form-submit-inscription\" action=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("users_user_inscription_user");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
\t\t\t\t\t <div><span style=\"color:red;\">";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "</span>
\t\t\t\t\t <span style=\"color:red;\">";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nom"), 'errors');
        echo "</span>
\t\t\t\t\t </div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nom"), 'widget', array("attr" => array("class" => "form-control", "style" => "width: 100%;")));
        echo "
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t<div><span style=\"color:red;\">";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "ville"), 'errors');
        echo "</span></div>
\t\t\t\t\t<div class=\"keywords\" style=\"margin-top: 15px;\">
\t\t\t\t\t\t";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "ville"), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<fieldset style=\"\">
\t\t\t\t\t<legend style=\"color: #fff;\">Me contacter: </legend>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div><span style=\"color:red;\">";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tel"), 'errors');
        echo "</span></div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tel"), 'widget', array("attr" => array("class" => "form-control", "style" => "width: 100%;")));
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t<div><span style=\"color:red;\">";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "username"), 'errors');
        echo "</span></div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "username"), 'widget', array("attr" => array("class" => "form-control", "style" => "width: 100%;")));
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clearfix\"> </div>
\t\t\t\t\t</div>
\t\t\t\t\t</fieldset>
\t\t\t\t\t<fieldset>
\t\t\t\t\t<legend style=\"color: #fff;\">Date de naissance (Jour/Mois/Année): </legend>
\t\t\t\t\t<div class=\"col-xs-12  espace-bottom espace-top\" style=\"padding-right: 0px; padding-left: 0px;\">
\t\t\t\t\t<div class=\"col-xs-4 col-sm-4 col-md-4 col-lg-4\" style=\"padding: 0px;\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<select name=\"jour\" id=\"jour\" class=\"form-control\" style=\"border-radius: 0px; width: 100%;\">
\t\t\t\t\t\t";
        // line 56
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 57
            echo "\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
            echo "</option>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-4 col-sm-4 col-md-4 col-lg-4\" style=\"padding-right: 0px; padding-left: 0px;\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<select name=\"mois\" id=\"mois\" class=\"form-control\" style=\"border-radius: 0px; width: 100%;\">
\t\t\t\t\t\t<option value=\"01\">Janvier</option>
\t\t\t\t\t\t<option value=\"02\">Février</option>
\t\t\t\t\t\t<option value=\"03\">Mars</option>
\t\t\t\t\t\t<option value=\"04\">Avril</option>
\t\t\t\t\t\t<option value=\"05\">Mai</option>
\t\t\t\t\t\t<option value=\"06\">Juin</option>
\t\t\t\t\t\t<option value=\"07\">Juillet</option>
\t\t\t\t\t\t<option value=\"08\">Août</option>
\t\t\t\t\t\t<option value=\"09\">Septembre</option>
\t\t\t\t\t\t<option value=\"10\">Octobre</option>
\t\t\t\t\t\t<option value=\"11\">Novembre</option>
\t\t\t\t\t\t<option value=\"12\">Décembre</option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-4 col-sm-4 col-md-4 col-lg-4\" style=\"padding: 0px;\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t";
        // line 82
        $context["fin"] = (twig_date_format_filter($this->env, "now", "Y") - 7);
        // line 83
        echo "\t\t\t\t\t\t";
        $context["debut"] = (twig_date_format_filter($this->env, "now", "Y") - 110);
        // line 84
        echo "\t\t\t\t\t\t<select name=\"annee\" id=\"annee\" class=\"form-control\" style=\"border-radius: 0px; width: 100%;\">
\t\t\t\t\t\t";
        // line 85
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range((isset($context["fin"]) ? $context["fin"] : $this->getContext($context, "fin")), (isset($context["debut"]) ? $context["debut"] : $this->getContext($context, "debut"))));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 86
            echo "\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
            echo "</option>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        echo "\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t</fieldset>
\t\t\t\t\t<fieldset style=\"padding-bottom: 15px;\">
\t\t\t\t\t<legend style=\"color: #fff;\">Votre sexe: </legend>
\t\t\t\t\t<div class=\"col-xs-6 espace-bottom espace-top\" id=\"pop\" style=\"padding: 0px;\" data-toggle=\"popover\" data-content=\"Quel est votre sexe ?\" title=\"<h4 style='color: red;'>Erreur !!!<h4>\" data-html=\"true\">
\t\t\t\t\t<input type=\"radio\" name=\"genre\" value=\"homme\" id=\"homme\"/>
\t\t\t\t\t<strong class=\"text-danger\"><label for=\"homme\"><span class=\"glyphicon glyphicon-tag\"></span> Homme</label></strong>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-6 espace-bottom espace-top\" style=\"padding: 0px;\">
\t\t\t\t\t<input type=\"radio\" name=\"genre\" value=\"femme\" id=\"femme\" />
\t\t\t\t\t<strong class=\"text-danger\"><label for=\"femme\"><span class=\"glyphicon glyphicon-tag\"></span> Femme</label></strong>

\t\t\t\t\t</div>
\t\t\t\t\t</fieldset>
\t\t\t\t\t<fieldset>
\t\t\t\t\t<legend style=\"color: #fff;\">Sécurisez votre compte: </legend>
\t\t\t\t\t<div>
\t\t\t\t\t<div><span style=\"color:red;\">";
        // line 109
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "password"), 'errors');
        echo "</span></div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t";
        // line 111
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "password"), 'widget', array("attr" => array("class" => "form-control", "style" => "width: 100%;")));
        echo "
\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<input type=\"password\" name=\"KeyWords\" value=\"\" class=\"form-control\" required=\"\" style=\"width: 100%; margin: 15px 0px;\" placeholder=\"Reprendre le mot de passe\">
\t\t\t\t\t</div>
\t\t\t\t\t</fieldset>
\t\t\t\t\t<div>
\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-warning btn-lg\">S'inscrire</button>
\t\t\t\t\t</div>
\t\t\t\t\t";
        // line 122
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
\t\t\t\t</form>

\t\t\t\t</div><!-- /col-lg-6 -->
\t\t\t\t<div class=\"col-lg-6\" style=\"padding-top: 75px;\">
\t\t\t\t\t<div style=\"color: #fff; margin-bottom: 170px;\">Si vous avez déjà un compte <a href=\"";
        // line 127
        echo $this->env->getExtension('routing')->getPath("login");
        echo "\" class=\"btn btn-primary\">Connectez-vous <span class=\"fa fa-angle-double-right\"></span></a></div>
\t\t\t\t\t<img class=\"img-responsive pull-right\" src=\"";
        // line 128
        if (((isset($context["slide"]) ? $context["slide"] : $this->getContext($context, "slide")) != null)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["slide"]) ? $context["slide"] : $this->getContext($context, "slide")), "getwebpath")), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/img/ipad-hand.png"), "html", null, true);
        }
        echo "\" alt=\"\">
\t\t\t\t</div><!-- /col-lg-6 -->
\t\t\t\t
\t\t\t</div><!-- /row -->
\t\t</div><!-- /container -->
\t</div><!-- /headerwrap -->

<div style=\"box-shadow: 0 15px 15px -10px rgba(0,0,0,.35) inset;\">
<div class=\"container\">
\t<div class=\"row mt centered\">
\t\t<div class=\"col-lg-8 col-lg-offset-2\">
\t\t\t<h1>Nos formations</h1>
\t\t\t<h3>It is a long established fact that a reader will be distracted by.</h3>
\t\t</div>
\t</div><!-- /row -->

\t\t
\t\t
<div class=\"row\">
";
        // line 147
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_formation"]) ? $context["liste_formation"] : $this->getContext($context, "liste_formation")));
        foreach ($context['_seq'] as $context["_key"] => $context["formation"]) {
            // line 148
            echo "<!-- blog card -->
<div class=\"col s12 m12 l4\">
\t<div class=\"blog-card\" >
\t<div class=\"card\">
\t\t<div class=\"card-image waves-effect waves-block waves-light\" style=\"background: #f2f2f2;\">
\t\t\t<a href=\"#!\"><img src=\"";
            // line 153
            if (($this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "imgservice") != null)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "imgservice"), "getwebpath")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/img/1.jpg"), "html", null, true);
            }
            echo "\" alt=\"blog-img\" class=\"activator\" style=\"height: 250px;\"></a>
\t\t</div>
\t\t<div style=\" margin-top: -5px;\">
\t\t<div style=\"margin: 7px 18px!important; padding-top: 5px;\">
\t\t<a class=\"btn-floating waves-effect waves-light light-blue accent-4\" style=\"background: rgba(83, 101, 240, 1);\"><i class=\"mdi-action-info activator\" style=\"margin-left: 0px; margin-top: -10px;\"></i></a>
\t\t<a href=\"";
            // line 158
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_assistance_entreprise", array("id" => $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "id"))), "html", null, true);
            echo "\" class=\"btn waves-effect waves-light indigo pull-right\">En savoir plus <span class=\"mdi-av-play-circle-fill\" style=\"margin-top: -7px; font-size: 15px;\"></span></a>
\t\t</div>
\t\t<div class=\"card-content\" style=\"border-top: 1px solid #ddd; padding-top: 0px; padding-bottom: 0px;\">
\t\t\t<h4 class=\"card-title grey-text text-darken-4\" style=\"margin-top: 0px; padding-top: 0px;\">
\t\t\t<a href=\"";
            // line 162
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_assistance_entreprise", array("id" => $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "id"))), "html", null, true);
            echo "\" class=\"grey-text text-darken-4\" style=\"font-size: 20px;\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "name", array(0 => 35), "method"), "html", null, true);
            echo "</a>
\t\t\t</h4> 
\t\t\t
\t\t\t<div class=\"row\">
\t\t\t  <div class=\"col s1\">
\t\t\t\t<i class=\"mdi-action-assignment-turned-in\"></i>
\t\t\t  </div>
\t\t\t  <div class=\"col s4\" style=\"margin-top: 7px; padding-left: 10px;\"> <a href=\"#!\" title=\"Formation en ligne\">En ligne</a></div>
\t\t\t  <div class=\"col s1\">
\t\t\t\t<i class=\"mdi-action-assignment-turned-in\"></i>
\t\t\t  </div>
\t\t\t  <div class=\"col s4\" style=\"margin-top: 7px; padding-left: 10px;\"> <a href=\"#!\" title=\"Formation dans notre centre de formation\">Au centre</a></div>
\t\t\t</div>
\t\t</div>
\t\t</div>
\t\t<div class=\"card-reveal\">
\t\t\t<span class=\"card-title grey-text text-darken-4\"><i class=\"mdi-navigation-close right\"></i> <a href=\"";
            // line 178
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_assistance_entreprise", array("id" => $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "nom"), "html", null, true);
            echo "</a></span>
\t\t\t<p>";
            // line 179
            echo $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "pubinline");
            echo "</p>
\t\t</div>
\t</div>
\t</div>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['formation'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 185
        echo "</div>

<div style=\"text-align: center;\">
<a href=\"";
        // line 188
        echo $this->env->getExtension('routing')->getPath("produit_service_visiter_notre_blog");
        echo "\"class=\"btn btn-warning btn-lg\">Toutes les formations <span class=\"mdi-av-play-circle-fill\" style=\"margin-top: -7px; font-size: 15px;\"></span></a>
</div>
<!-- END MAIN -->

</div><!-- /container -->
</div><!-- /container -->

<hr>
<div style=\"background: #ddd;\">
<div class=\"container\">
\t<div class=\"row mt centered\">
\t\t<div class=\"col-lg-8 col-lg-offset-2\">
\t\t\t<h1>Nos formateurs</h1>
\t\t\t<h3>Cours accéssibles en ligne et forum pour entre-aide</h3>
\t\t</div>
\t</div><!-- /row -->
\t
\t<div class=\"row mt centered\">
\t
\t<div class=\"slider1\" style=\"padding: 0px; margin: 0px;\">
\t<div class=\"arrival-grids\" style=\"padding: 0px; margin: 0px;\">\t\t\t 
\t\t <ul id=\"flexiselDemo1\">
\t\t\t";
        // line 210
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_formateur"]) ? $context["liste_formateur"] : $this->getContext($context, "liste_formateur")));
        foreach ($context['_seq'] as $context["_key"] => $context["formateur"]) {
            // line 211
            echo "\t\t\t<li>
\t\t\t\t<div class=\"item\" style=\"margin-right: 5px; margin-left: 5px;\">
\t\t\t\t\t<div class=\"col-lg-12\">
\t\t\t\t\t\t<img class=\"img-circle img-thumbnail\" src=\"";
            // line 214
            if (($this->getAttribute((isset($context["formateur"]) ? $context["formateur"] : $this->getContext($context, "formateur")), "imgprofil") != null)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["formateur"]) ? $context["formateur"] : $this->getContext($context, "formateur")), "imgprofil"), "getWebpath")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.png"), "html", null, true);
            }
            echo "\" style=\"width: 140px; height: 140px;\"  alt=\"\">
\t\t\t\t\t\t<h4><a href=\"";
            // line 215
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_user_user_accueil", array("id" => $this->getAttribute((isset($context["formateur"]) ? $context["formateur"] : $this->getContext($context, "formateur")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formateur"]) ? $context["formateur"] : $this->getContext($context, "formateur")), "name", array(0 => 30), "method"), "html", null, true);
            echo "</a></h4>
\t\t\t\t\t\t<p>";
            // line 216
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formateur"]) ? $context["formateur"] : $this->getContext($context, "formateur")), "poste"), "html", null, true);
            echo "</p>
\t\t\t\t\t\t<p><i class=\"mdi-av-subtitles\"></i> <i class=\"mdi-notification-phone-forwarded\"></i> <i class=\"mdi-social-public\"></i></p>
\t\t\t\t\t</div><!--/col-lg-4 -->
\t\t\t\t</div>
\t\t\t</li>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['formateur'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 222
        echo "\t\t </ul>
\t </div>
\t </div>

\t</div><!-- /row -->
\t
\t<script type=\"text/javascript\">
\t \$(window).load(function() {\t\t\t
\t  \$(\"#flexiselDemo1\").flexisel({
\t\tvisibleItems: 3,
\t\tanimationSpeed: 1000,
\t\tautoPlay: true,
\t\tautoPlaySpeed: 5000,    \t\t
\t\tpauseOnHover:true,
\t\tenableResponsiveBreakpoints: true,
\t\tresponsiveBreakpoints: { 
\t\t\tportrait: { 
\t\t\t\tchangePoint:480,
\t\t\t\tvisibleItems: 1
\t\t\t}, 
\t\t\tlandscape: { 
\t\t\t\tchangePoint: 640,
\t\t\t\tvisibleItems: 2
\t\t\t},
\t\t\ttablet: { 
\t\t\t\tchangePoint: 900,
\t\t\t\tvisibleItems: 4
\t\t\t}
\t\t}
\t});
\t});
\t</script>
\t<script type=\"text/javascript\" src=\"";
        // line 254
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/js/jquery.flexisel.js"), "html", null, true);
        echo "\"></script>
\t
\t<div style=\"text-align: center;\">
\t<a href=\"";
        // line 257
        echo $this->env->getExtension('routing')->getPath("produit_service_toute_actualite_entreprise");
        echo "\" class=\"btn btn-warning btn-lg\">Tous les formateurs <span class=\"mdi-av-play-circle-fill\" style=\"margin-top: -7px; font-size: 15px;\"></span></a>
\t</div>
</div><!-- /container -->
</div><!-- /container -->
<hr>


<div class=\"container\">
<div class=\"row mt centered\">
\t<div class=\"col-lg-8 col-lg-offset-2\">
\t\t<h1>Nos Cours</h1>
\t\t<h3>Cours accéssibles en ligne et forum pour entre-aide</h3>
\t</div>
</div><!-- /row -->

\t<div class=\"row centered\">
\t\t
\t\t";
        // line 274
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_produit"]) ? $context["liste_produit"] : $this->getContext($context, "liste_produit")));
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
            // line 275
            echo "\t\t\t<div class=\"col-md-3 photoday-grid\">
\t\t\t";
            // line 276
            $this->env->loadTemplate("ProduitProduitBundle:Produit:produitdescript.html.twig")->display($context);
            // line 277
            echo "\t\t\t</div>
\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['produit'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 279
        echo "
\t</div><!-- /row -->
\t<div style=\"text-align: center;\">
\t<a href=\"";
        // line 282
        echo $this->env->getExtension('routing')->getPath("produit_produit_accueil_boutique_produit");
        echo "\" class=\"btn btn-warning btn-lg\">Tous les cours <span class=\"mdi-av-play-circle-fill\" style=\"margin-top: -7px; font-size: 15px;\"></span></a>
\t</div>
</div><!-- /container -->
\t
\t<hr>
\t<div style=\"background: #ddd;\">
\t<div class=\"container\">
\t\t<div class=\"row mt centered\">
\t\t\t<div class=\"col-lg-8 col-lg-offset-2\">
\t\t\t\t<h1>Formations ultrats innovant</h1>
\t\t\t\t<h3>Toutes nos formations comprennent </h3>
\t\t\t</div>
\t\t</div><!-- /row -->
\t
\t\t<! -- CAROUSEL -->
\t\t<div class=\"row mt centered\">
\t\t\t<div class=\"col-lg-6 col-lg-offset-3\">
\t\t\t\t<div id=\"carousel-example-generic\" class=\"carousel slide\" data-ride=\"carousel\">
\t\t\t\t  <!-- Indicators -->
\t\t\t\t  <ol class=\"carousel-indicators\">
\t\t\t\t  ";
        // line 302
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_valeur"]) ? $context["liste_valeur"] : $this->getContext($context, "liste_valeur")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["valeur"]) {
            // line 303
            echo "\t\t\t\t\t";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) {
                // line 304
                echo "\t\t\t\t    <li data-target=\"#carousel-example-generic\" data-slide-to=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index0"), "html", null, true);
                echo "\" class=\"active\"></li>
\t\t\t\t\t";
            } else {
                // line 306
                echo "\t\t\t\t\t<li data-target=\"#carousel-example-generic\" data-slide-to=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index0"), "html", null, true);
                echo "\"></li>
\t\t\t\t\t";
            }
            // line 308
            echo "\t\t\t\t  ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['valeur'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 309
        echo "\t\t\t\t  </ol>
\t\t\t\t
\t\t\t\t  <!-- Wrapper for slides -->
\t\t\t\t  <div class=\"carousel-inner text-center\">
\t\t\t\t  ";
        // line 313
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_valeur"]) ? $context["liste_valeur"] : $this->getContext($context, "liste_valeur")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["valeur"]) {
            // line 314
            echo "\t\t\t\t\t";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) {
                // line 315
                echo "\t\t\t\t    <div class=\"item active\" style=\"text-align: center;\">
\t\t\t\t      <img src=\"";
                // line 316
                if (($this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "imginfoentreprise") != null)) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "imginfoentreprise"), "getwebpath")), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/img/p01.png"), "html", null, true);
                }
                echo "\" alt=\"\" style=\"margin-top: 15px; margin-bottom: 15px; height: 300px; width: 100%;\"/>
\t\t\t\t\t  <div class=\"text-left\" style=\"height: 200px;\">
\t\t\t\t\t  <h3>";
                // line 318
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "titre"), "html", null, true);
                echo "</h3>
\t\t\t\t\t  <div style=\"margin-bottom: 15px;\">";
                // line 319
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "description"), "html", null, true);
                echo "</div>
\t\t\t\t\t  <div>";
                // line 320
                if (($this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "link") != null)) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "link"), "html", null, true);
                    echo "\" class=\"btn btn-warning btn-lg\">En savoir plus <span class=\"mdi-av-play-circle-fill\" style=\"margin-top: -7px; font-size: 15px;\"></span></a>";
                }
                echo "</div>
\t\t\t\t\t  </div>
\t\t\t\t\t</div>
\t\t\t\t\t";
            } else {
                // line 324
                echo "\t\t\t\t\t<div class=\"item text-center\" style=\"text-align: center;\">
\t\t\t\t      <img src=\"";
                // line 325
                if (($this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "imginfoentreprise") != null)) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "imginfoentreprise"), "getwebpath")), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/img/p01.png"), "html", null, true);
                }
                echo "\" alt=\"\" style=\"margin-top: 15px; margin-bottom: 15px; height: 300px; ; width: 100%;\"/>
\t\t\t\t\t  <div class=\"text-left\" style=\"height: 200px;\">
\t\t\t\t\t  <h3>";
                // line 327
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "titre"), "html", null, true);
                echo "</h3>
\t\t\t\t\t  <div style=\"margin-bottom: 15px;\">";
                // line 328
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "description"), "html", null, true);
                echo "</div>
\t\t\t\t\t  <div>";
                // line 329
                if (($this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "link") != null)) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "link"), "html", null, true);
                    echo "\" class=\"btn btn-warning btn-lg\">En savoir plus <span class=\"mdi-av-play-circle-fill\" style=\"margin-top: -7px; font-size: 15px;\"></span></a>";
                }
                echo "</div>
\t\t\t\t\t  </div>
\t\t\t\t    </div>
\t\t\t\t\t";
            }
            // line 333
            echo "\t\t\t\t  ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['valeur'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 334
        echo "\t\t\t\t  </div>
\t\t\t\t</div>\t\t\t
\t\t\t</div><!-- /col-lg-8 -->
\t\t</div><!-- /row -->
\t</div><! --/container -->
\t</div><! --/container -->
\t<hr>
";
    }

    // line 343
    public function block_javascripttemplate($context, array $blocks = array())
    {
        // line 344
        echo "
\$('#users_userbundle_user_ville').prepend('<option value=\"\">Ville de résidence</option>');

\$('.form-submit-inscription').on('submit', function(){
\tif( (\$('input[id=\"homme\"]:checked').val() &&  \$('input[id=\"femme\"]:checked').val()) || (!\$('input[id=\"homme\"]:checked').val() &&  !\$('input[id=\"femme\"]:checked').val()))
\t{
\t\$(\"#pop\").attr('data-content',''+\$('#users_userbundle_user_nom').val()+' est un homme ou une femme ?');
\t\$(\"#pop\").popover({placement:'top'});
\t\$(\"#pop\").popover('show');
\treturn false;
\t}
});
";
    }

    public function getTemplateName()
    {
        return "UsersUserBundle:User:inscriptionuser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  704 => 344,  701 => 343,  690 => 334,  676 => 333,  665 => 329,  661 => 328,  657 => 327,  648 => 325,  645 => 324,  634 => 320,  630 => 319,  626 => 318,  617 => 316,  614 => 315,  611 => 314,  594 => 313,  588 => 309,  574 => 308,  568 => 306,  562 => 304,  559 => 303,  542 => 302,  519 => 282,  514 => 279,  499 => 277,  497 => 276,  494 => 275,  477 => 274,  457 => 257,  451 => 254,  417 => 222,  405 => 216,  399 => 215,  391 => 214,  386 => 211,  382 => 210,  357 => 188,  352 => 185,  340 => 179,  334 => 178,  313 => 162,  306 => 158,  294 => 153,  287 => 148,  283 => 147,  257 => 128,  253 => 127,  245 => 122,  231 => 111,  226 => 109,  203 => 88,  192 => 86,  188 => 85,  185 => 84,  182 => 83,  180 => 82,  155 => 59,  144 => 57,  140 => 56,  125 => 44,  120 => 42,  113 => 38,  108 => 36,  97 => 28,  92 => 26,  86 => 23,  80 => 20,  76 => 19,  70 => 18,  63 => 13,  60 => 12,  54 => 9,  51 => 8,  43 => 6,  38 => 4,  34 => 3,  31 => 2,);
    }
}
