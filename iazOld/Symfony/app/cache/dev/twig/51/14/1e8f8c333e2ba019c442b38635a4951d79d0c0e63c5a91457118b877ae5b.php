<?php

/* GeneralTemplateBundle:Menu:menubare.html.twig */
class __TwigTemplate_51141e8f8c333e2ba019c442b38635a4951d79d0c0e63c5a91457118b877ae5b extends Twig_Template
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
        echo "<style>
.mynav {
  background: #fff;
  box-shadow: 0 3px 10px -2px rgba(0, 0, 0, 0.1);
  border: 1px solid rgba(0, 0, 0, 0.1);
}

.mynav ul {
  list-style: none;
  position: relative;
  float: right;
  margin-right: 0px;
  display: inline-table;
  z-index: 10000;
}

.mynav ul li {
  float: left;
  transition: all .2s ease-in-out;
}

.mynav ul li:hover {
  background: rgba(0, 0, 0, 0.15);
}

.mynav ul li:hover > ul {
  display: block;
}

.mynav ul li {
  float: left;
  transition: all .2s ease-in-out;
}

.mynav ul li a {
  display: block;
  padding: 30px 20px;
  color: #222;
  font-size: .9em;
  letter-spacing: 1px;
  text-decoration: none;
  text-transform: uppercase;
}

.mynav ul ul {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 10000;
}

.mynav ul ul li {
  float: none;
  position: relative;
}

.mynav ul ul li a {
  padding: 15px 30px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.mynav ul ul ul {
  position: absolute;
  left: 100%;
  top: 0;
}

.my-fixed-nav{
\tposition: fixed; top: 0px; width: 100%; z-index: 1000;
}

.dropdown-item{
\twhite-space: normal;
}




.timeline{
  margin-left:0px;
  overflow:visible;
}


.entry{
  margin-left:20px;
  position:relative;
   padding-left: 30px;
  border: 2px solid black;
  border-radius: 5px;
  width:100%;
  height:100px;
  overflow:visible;
}

.core{
  width:inherit;
  height:inherit;
  color: #333;
}

.entry:after{
  content:'';
  position:absolute;
  display:block;
  width:36px;
  height:5px;
  background:black;
  top:53%;
  left:-7%;
}

.entry:before{
  content:\"\";
  position:absolute;
  width:3px;height:110%;
  display:block;
  border-radius:0px;
  border:2px solid skyblue;
  background: skyblue;
  left:-9%;
}

.core:before{
  content:'';
  display:block;
  position:absolute;
  width:7px;height:7px;
  border:3px solid black;
  background: black;
  top:52%;
  left:-10%;
}


</style>

";
        // line 141
        if (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "home")) {
            // line 142
            echo "<section style=\"background: #fff;\">
<div class=\"container\">
<a href=\"";
            // line 144
            echo $this->env->getExtension('routing')->getPath("users_user_acces_plateforme");
            echo "\" style=\"float: left; margin-top: 15px;\">
\t<img src=\"";
            // line 145
            if ((((isset($context["paramlogosm"]) ? $context["paramlogosm"] : $this->getContext($context, "paramlogosm")) != null) && ($this->getAttribute((isset($context["paramlogosm"]) ? $context["paramlogosm"] : $this->getContext($context, "paramlogosm")), "src") != null))) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["paramlogosm"]) ? $context["paramlogosm"] : $this->getContext($context, "paramlogosm")), "getwebpath")), "html", null, true);
            } else {
                echo "https://s3.amazonaws.com/libapps/accounts/1226/images/logo_sm.png";
            }
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
            echo "\" class=\"scsl-logo\" style=\"height: 60px; margin-bottom: 5px;\"/>
</a>
<div class=\"mynav\" role='navigation'>
  <ul>
\t<li><a href=\"#!\">Contact Us</a>
\t  <ul>
\t\t<li><a href=\"https://api.whatsapp.com/send?phone=";
            // line 151
            echo twig_escape_filter($this->env, (isset($context["telwath"]) ? $context["telwath"] : $this->getContext($context, "telwath")), "html", null, true);
            echo "\" target=\"_blank\"><span class=\"fa fa-whatsapp\"></span>W/App: ";
            echo twig_escape_filter($this->env, (isset($context["telwath"]) ? $context["telwath"] : $this->getContext($context, "telwath")), "html", null, true);
            echo "</a></li>
\t\t<li><a href=\"tel:";
            // line 152
            echo twig_escape_filter($this->env, (isset($context["telephone"]) ? $context["telephone"] : $this->getContext($context, "telephone")), "html", null, true);
            echo "\"><span class=\"fa fa-phone\"></span> MTN: ";
            echo twig_escape_filter($this->env, (isset($context["telephone"]) ? $context["telephone"] : $this->getContext($context, "telephone")), "html", null, true);
            echo "</a></li>
\t\t<li><a href=\"";
            // line 153
            echo $this->env->getExtension('routing')->getPath("produit_service_contact_us");
            echo "\"><span class=\"fa fa-envelope-open-o\"></span> Envoyer email</a></li>
\t\t<li><a href=\"https://tawk.to/chat/5d5d7d44eb1a6b0be608a773/default\" onclick=\"javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;\"><span class=\"fa fa-comments-o\"></span> Live chat</a></li>
\t  </ul>
\t</li>
\t<li><a href=\"#!\">Applications</a>
\t  <ul>
\t  <li style=\"color: green;\">Autres plateformes AZ Corporation</li>
\t\t";
            // line 160
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["liste_application"]) ? $context["liste_application"] : $this->getContext($context, "liste_application")));
            foreach ($context['_seq'] as $context["_key"] => $context["appli"]) {
                // line 161
                echo "\t\t<li><a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["appli"]) ? $context["appli"] : $this->getContext($context, "appli")), "siteweb"), "html", null, true);
                echo "\" target=\"_blank\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["appli"]) ? $context["appli"] : $this->getContext($context, "appli")), "nom"), "html", null, true);
                echo "</a></li>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['appli'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 163
            echo "\t  </ul>
\t</li>
\t<li><a href=\"#!\">Espace membre</a>
\t  <ul>
\t\t";
            // line 167
            if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user") != null)) {
                // line 168
                echo "\t\t\t<li style=\"white-space: nowrap;\"><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_user_user_accueil", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "name", array(0 => 30), "method"), "html", null, true);
                echo "</a></li>
\t\t\t<li style=\"white-space: nowrap;\"><a href=\"";
                // line 169
                echo $this->env->getExtension('routing')->getPath("users_user_clearpidsessid");
                echo "\">Se déconnecter</a></li>
\t\t";
            } else {
                // line 171
                echo "\t\t\t<li style=\"white-space: nowrap;\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("users_user_connexion_user");
                echo "\">Se connecter</a></li>
\t\t\t<li style=\"white-space: nowrap;\"><a href=\"";
                // line 172
                echo $this->env->getExtension('routing')->getPath("users_user_inscription_user");
                echo "\">Créer un compte</a></li>
\t\t";
            }
            // line 174
            echo "\t  </ul>
\t</li>
  </ul>
</div>
</div>
</section>

<div id=\"navigation\" class=\"yamm\" style=\" background: #092759!important; box-shadow: 0 1px 3px rgba(0,0,0,0.5), 0 1px 2px rgba(0,0,0,0.5);transition: all 0.3s cubic-bezier(.25,.8,.25,1); \">
    <div class=\"navbar navbar-default\">
        <div class=\"container\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle collapsed btn-primary\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a href=\"";
            // line 191
            echo $this->env->getExtension('routing')->getPath("users_user_acces_plateforme");
            echo "\" class=\"navbar-brand\">
                    <img src=\"";
            // line 192
            if ((((isset($context["paramlogosm"]) ? $context["paramlogosm"] : $this->getContext($context, "paramlogosm")) != null) && ($this->getAttribute((isset($context["paramlogosm"]) ? $context["paramlogosm"] : $this->getContext($context, "paramlogosm")), "src") != null))) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["paramlogosm"]) ? $context["paramlogosm"] : $this->getContext($context, "paramlogosm")), "getwebpath")), "html", null, true);
            } else {
                echo "https://s3.amazonaws.com/libapps/accounts/1226/images/logo_sm.png";
            }
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
            echo "\" />
                </a>
            </div>
            <div class=\"navbar-collapse collapse\" style=\"margin-left: -20px;\">

                
                <ul class=\"nav navbar-nav\">
                    <li class=\"dropdown yamm-fw\">
                        <a href=\"#!\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            L'institut
                            <span class=\"item-caret\"> <span class=\"fa fa-angle-down\"></span> </span>
                        </a>
                        <ul class=\"dropdown-menu\">
                            <li>
                                <div class=\"yamm-content container\">
                                        <div class=\"col-xs-12 col-md-6\">
                                            <h4>À propos de l'institut Az Corporation</h4>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
            // line 210
            if (((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")) != null)) {
                // line 211
                echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"struct-descript\">
\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                // line 212
                if ((($this->getAttribute((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")), "imgservice") != null) && ($this->getAttribute($this->getAttribute((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")), "imgservice"), "src") != null))) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")), "imgservice"), "getwebpath")), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.png"), "html", null, true);
                }
                echo "\" alt=\"Discus\" class=\"\" style=\"max-width: 200px; float: left; margin-right: 7px;\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div style=\"font-weight: bold;\">";
                // line 214
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")), "nom"), "html", null, true);
                echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div>";
                // line 215
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")), "description"), "html", null, true);
                echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 216
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => $this->getAttribute((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")), "typearticle"), "idart" => $this->getAttribute((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")), "id"))), "html", null, true);
                echo "\" style=\"color: red; padding: 2px 0px; text-decoration: underline; \">En savoir plus <span class=\"fa fa-angle-right\"></span> </a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 220
                echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"struct-descript\">
\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                // line 221
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.png"), "html", null, true);
                echo "\" alt=\"Discus\" class=\"thumbnail\" style=\"height: 150px; float: left; margin-right: 7px;\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<h4>Bienvenue à l'institut AZ Corp</h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div>Fondé en 2012, Az Corporation ....</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#!\" style=\"color: red; padding: 2px 0px; text-decoration: underline; \">En savoir plus <span class=\"fa fa-angle-right\"></span> </a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 229
            echo "\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t<ul class=\"navgul\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 231
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "evenement"));
            echo "\">Evènements</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 232
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "mediatheque"));
            echo "\">Vidéothèque</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 233
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "galeriephoto"));
            echo "\">Galerie Photo</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 234
            echo $this->env->getExtension('routing')->getPath("produit_service_contact_us");
            echo "\">Nous contacter</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 235
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "actualite"));
            echo "\">Actualité</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 236
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "temoignage"));
            echo "\">Temoignage collaborateurs</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 237
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "avis"));
            echo "\">Avis des étudiant(e)s</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 238
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "planingcours"));
            echo "\">Planing des cours</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t</div>
                                        </div>
                                        <div class=\"col-xs-12 col-md-6\" style=\"background: #fff!important;\">
\t\t\t\t\t\t\t\t\t\t<h4 style=\"color: #333;\">Démarche AZ corporation</h4>
                                            
\t\t\t\t\t\t\t\t\t\t\t
<div class=\"timeline\">
    ";
            // line 247
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["article_demarche"]) ? $context["article_demarche"] : $this->getContext($context, "article_demarche")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                // line 248
                echo "\t<div class=\"entry\">
      <div class=\"core\">
      <h5>Etape ";
                // line 250
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
                echo "</h5>
        <a href=\"";
                // line 251
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "typearticle"), "idart" => $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "id"))), "html", null, true);
                echo "\"  style=\"display: inline-block; \">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "nom"), "html", null, true);
                echo "</a>
      </div>
    </div>
    <br/>
\t";
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
                // line 255
                echo " 
\t<div class=\"entry\">
      <div class=\"core\">
      <h5>Etape 1:</h5>
        <a href=\"#!\" style=\"padding: 2px; line-height: 10px;\">Entretien et orientation </a>
      </div>
    </div>
    <br/>
\t<div class=\"entry\">
      <div class=\"core\">
      <h5>Etape 2:</h5>
        <a href=\"#!\" style=\"padding: 2px; line-height: 10px;\">Inscription à une formation</a>
      </div>
    </div>
    <br/>
\t<div class=\"entry\">
      <div class=\"core\">
      <h5>Etape 3:</h5>
        <a href=\"#!\" style=\"padding: 2px; line-height: 10px;\">Formation</a>
      </div>
    </div>
    <br/>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 277
            echo " 

</div>

\t\t\t\t\t\t\t\t\t\t\t<ul class=\"navgul\">
                                                <li><a href=\"#!\" style=\"color: #333;\">Suivre une formation</a></li>
                                            </ul>
                                        </div>
                                    </div>
                            </li>
                        </ul>
                    </li>
\t\t\t\t\t";
            // line 289
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["liste_formation"]) ? $context["liste_formation"] : $this->getContext($context, "liste_formation")));
            foreach ($context['_seq'] as $context["_key"] => $context["formation"]) {
                // line 290
                echo "                    <li class=\"dropdown yamm-fw\">
                        <a href=\"#!\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            ";
                // line 292
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "nom"), "html", null, true);
                echo "
                            <span class=\"item-caret\"> <span class=\"fa fa-angle-down\"></span> </span>
                        </a>
                        <ul class=\"dropdown-menu\">
                            <li>
                                <div class=\"yamm-content container\">
\t\t\t\t\t\t\t\t\t<div class=\"col-xs-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t<h4>";
                // line 299
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "nom"), "html", null, true);
                echo "</h4>
\t\t\t\t\t\t\t\t\t\t<div class=\"nav-feature\">
\t\t\t\t\t\t\t\t\t\t\t<h5>";
                // line 301
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "description"), "html", null, true);
                echo "</h5>
\t\t\t\t\t\t\t\t\t\t\t<p><a href=\"";
                // line 302
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_produit_formation_institut", array("id" => $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "id"))), "html", null, true);
                echo "\"><img src=\"";
                if (($this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "src") != null)) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "getwebpath")), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.jpg"), "html", null, true);
                }
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "nom"), "html", null, true);
                echo "\"/></a><br /></p>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<div class=\"col-xs-12 col-md-8\" style=\"padding: 0px;\">
\t\t\t\t\t\t\t\t\t\t";
                // line 307
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "getScatProduits"), 0, 4));
                foreach ($context['_seq'] as $context["_key"] => $context["diplome"]) {
                    // line 308
                    echo "\t\t\t\t\t\t\t\t\t\t<div class=\"col-xs-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t<h4 class=\"coustom-my-text\">";
                    // line 309
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "nom"), "html", null, true);
                    echo "</h4>
\t\t\t\t\t\t\t\t\t\t<ul class=\"navgul\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 311
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "getProduitScat"), 0, 2));
                    foreach ($context['_seq'] as $context["_key"] => $context["prod"]) {
                        // line 312
                        echo "\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_detail_produit_market", array("id" => $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "id"))), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "nom"), "html", null, true);
                        echo "</a></li>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prod'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 314
                    echo "\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_liste_produit_souscategorie", array("id" => $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "id"))), "html", null, true);
                    echo "\"><span class=\"fa fa-angle-right\"></span> Liste complète des formations</a></li>
\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['diplome'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 318
                echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
                            </li>
                        </ul>
                    </li>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['formation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 324
            echo "
                    <li class=\"dropdown yamm-fw\">
                        <a href=\"#!\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            Entreprises
                            <span class=\"item-caret\"> <span class=\"fa fa-angle-down\"></span> </span>
                        </a>
                        <ul class=\"dropdown-menu\">
                            <li>
                                <div class=\"yamm-content container\">
\t\t\t\t\t\t\t\t\t<div class=\"col-xs-12 col-md-3\">
\t\t\t\t\t\t\t\t\t\t<h4>Partenariat</h4>
\t\t\t\t\t\t\t\t\t\t<div class=\"nav-search-form\">
\t\t\t\t\t\t\t\t\t\t<p class=\"hidden-xs hidden-sm\"><a href=\"#!\" class=\"coll-link\"><img src=\"";
            // line 336
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/present.png"), "html", null, true);
            echo "\" /></a></p>
\t\t\t\t\t\t\t\t\t\t\t<ul class=\"navgul\">
\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"\">Nos Partenaires</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"\">Demande de partenariat</a></li>
\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-xs-12 col-md-3\">
\t\t\t\t\t\t\t\t\t\t<h4>Etudiants</h4>
\t\t\t\t\t\t\t\t\t\t<div class=\"nav-search-form\">
\t\t\t\t\t\t\t\t\t\t<p class=\"hidden-xs hidden-sm\"><a href=\"#!\" class=\"coll-link\"><img src=\"";
            // line 346
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/present.png"), "html", null, true);
            echo "\" /></a></p>
\t\t\t\t\t\t\t\t\t\t\t<ul class=\"navgul\">
\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"\">Avantages chez AZ</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"\">Réseau des étudiants</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"\">Consulter nos offres</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"\">Nous joindre</a></li>
\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-xs-12 col-md-3\">
\t\t\t\t\t\t\t\t\t\t<h4>Entreprises</h4>
\t\t\t\t\t\t\t\t\t\t<div class=\"nav-search-form\">
\t\t\t\t\t\t\t\t\t\t<p class=\"hidden-xs hidden-sm\"><a href=\"#!\" class=\"coll-link\"><img src=\"";
            // line 358
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/present.png"), "html", null, true);
            echo "\" /></a></p>
\t\t\t\t\t\t\t\t\t\t\t<ul class=\"navgul\">
\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"\">Embaucher un stagiaire</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"\">Embaucher un diplômé</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"\">Demande de partenariat</a></li>
\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"col-xs-12 col-md-3\">
\t\t\t\t\t\t\t\t\t\t<h4>Visites d'entreprise</h4>
\t\t\t\t\t\t\t\t\t\t<div class=\"nav-search-form\">
\t\t\t\t\t\t\t\t\t\t<p class=\"hidden-xs hidden-sm\"><a href=\"#!\" class=\"coll-link\"><img src=\"";
            // line 370
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/present.png"), "html", null, true);
            echo "\" /></a></p>
\t\t\t\t\t\t\t\t\t\t\t<ul class=\"navgul\">
\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"\">Visites 2019</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"\">Visites 2018</a></li>
\t\t\t\t\t\t\t\t\t\t\t\t<li><a href=\"\">Visites 2017</a></li>
\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
                            </li>
                        </ul>
                    </li>
\t\t\t\t\t
                    <li class=\"dropdown yamm-fw\">
                        <a href=\"";
            // line 384
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "aproposinstitut"));
            echo "\">Campus</a>
                    </li>
\t\t\t\t\t<li class=\"dropdown yamm-fw\">
                        <a href=\"";
            // line 387
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "aide"));
            echo "\">Aide</a>
                    </li>
                </ul>
                <a href=\"\" style=\"float: right; padding: 15px 7px; display: inline-block; color: #fff; font-weight: bold;\">
\t\t\t\t\t<span class=\"fa fa-th\"></span>
                </a>
            </div>
        </div>
    </div>
</div>


<script type=\"text/javascript\">
\$(function(){
   \$(window).bind('scroll', function(){
\t\tvar largeur = (\$(window).width());
\t\tdimension = 150;
\t\t/*if (largeur < 768)
\t\t{
\t\t\tdimension = 800;
\t\t}*/
\t\t// The value of where the \"scoll\" is.
\t\tif(\$(window).scrollTop() > dimension){
\t\t  \$('.yamm').addClass('my-fixed-nav');
\t\t}else{
\t\t  \$('.yamm').removeClass('my-fixed-nav');
\t\t}
\t});
});
</script>
";
        } else {
            // line 418
            echo "\t";
            if (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "admin")) {
                // line 419
                echo "\t
\t\t\t<header id=\"header\" class=\"page-topbar\">
\t\t\t\t<div style=\"background: #092759!important; height: 65px; position: fixed; z-index: 500; width: 100%; padding: 15px; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
\t\t\t\t\ttransition: all 0.3s cubic-bezier(.25,.8,.25,1);\">
\t\t\t\t\t<a href=\"#!\" id=\"hamburger\" class=\"toggle-dashboard-nav hamburger-icon-container\">
\t\t\t\t\t\t<span class=\"hamburger-icon\"></span>
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</header>

\t\t";
            } else {
                // line 430
                echo "\t\t";
                if (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "dashboard")) {
                    // line 431
                    echo "\t\t\t
\t\t\t
\t\t<!-- Begining Header -->

        <div class=\"app-top-bar top-bar-text-light\" style=\"background: #092759;\">
            <div class=\"container fiori-container\">
                <div class=\"top-bar-left\">
                    <ul class=\"nav\">
                        <li class=\"nav-item\">
                            <a href=\"http://azcorporation.net\" target=\"_blank\" class=\"nav-link\">
                                www.azcorporation.net
                            </a>
                        </li>
                        <li class=\"nav-item ml-1\">
                            <a data-placement=\"top\" rel=\"popover-focus\" data-toggle=\"popover-custom\" class=\"nav-link\" data-original-title=\"\" title=\"\">
                                Plus de produits Az
                                <i class=\"fa fa-angle-down ml-2 opacity-8\"></i>
                            </a>
                            <div class=\"rm-max-width\">
                                <div class=\"d-none popover-custom-content\">
                                    <div class=\"grid-menu grid-menu-2col\">
                                        <div class=\"no-gutters row\" style=\"min-width: 400px;\">

\t\t\t\t\t\t\t\t\t\t\t";
                    // line 454
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, (isset($context["categories_app"]) ? $context["categories_app"] : $this->getContext($context, "categories_app")), 0, 2));
                    foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                        // line 455
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["cat"]) ? $context["cat"] : $this->getContext($context, "cat")), "applications"));
                        foreach ($context['_seq'] as $context["_key"] => $context["prod"]) {
                            // line 456
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-sm-6 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"prod.link\" class=\"btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-dark\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 458
                            if (($this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "src") != null)) {
                                // line 459
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div><img src=\"";
                                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "getwebpath")), "html", null, true);
                                echo "\" alt=\"\" style=\"height: 20px;\"/></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 461
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"lnr-lighter text-dark opacity-7 btn-icon-wrapper mb-2\"> </i>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 463
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "nom"), "html", null, true);
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prod'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 467
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 468
                    echo "                                            
                                        </div>
                                    </div>
                                    <ul class=\"nav flex-column\">
                                        <li class=\"nav-item-divider nav-item\"></li>
                                        <li class=\"nav-item-btn d-block text-center nav-item\">
                                            <button class=\"btn-shadow btn btn-focus btn-sm\">Afficher tout</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class=\"top-bar-right\">
                    <ul class=\"nav\">
                        <li class=\"nav-item mr-1\">
                            <a href=\"";
                    // line 485
                    echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "aide"));
                    echo "\" class=\"nav-link\">
                                Aide
                            </a>
                        </li>
                        <li class=\"nav-item mr-2\">
                            <a href=\"";
                    // line 490
                    echo $this->env->getExtension('routing')->getPath("produit_service_contact_us");
                    echo "\" class=\"nav-link\">
                                Nous contactez
                            </a>
                        </li>
                        <li class=\"nav-item dropdown\">
                            <a aria-haspopup=\"true\" data-toggle=\"dropdown\" aria-expanded=\"false\" class=\"nav-link\">
                                <i class=\"typcn typcn-user mr-1\"></i>
                                Mon Compte
                                <i class=\"fa fa-angle-down ml-2 opacity-8\"></i>
                            </a>
                             <div tabindex=\"-1\" role=\"menu\" aria-hidden=\"true\" class=\"rm-pointers dropdown-menu dropdown-menu-right\" x-placement=\"bottom-end\" style=\"position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(111px, 29px, 0px);\">
                                <div class=\"dropdown-menu-header\">
                                    <div class=\"dropdown-menu-header-inner pt-4 pb-4 bg-focus\">
                                        <div class=\"menu-header-content text-center text-white\">
                                            <h6 class=\"menu-header-subtitle mt-0\">
                                                ";
                    // line 505
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "name", array(0 => 25), "method"), "html", null, true);
                    echo "
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <h6 tabindex=\"-1\" class=\"dropdown-header\">
                                    Opérations
                                </h6>
                                <a href=\"\" type=\"button\" tabindex=\"0\" class=\"dropdown-item\">
                                    <span class=\"mr-3 opacity-8 flag large US\"></span>
                                    Paramètres
                                </a>
                                <a href=\"\" type=\"button\" tabindex=\"0\" class=\"dropdown-item\">
                                    <span class=\"mr-3 opacity-8 flag large CH\"></span>
                                    Mes commandes
                                </a>
                                <a href=\"\" type=\"button\" tabindex=\"0\" class=\"dropdown-item\">
                                    <span class=\"mr-3 opacity-8 flag large FR\"></span>
                                    Mes contacts
                                </a>
                                <div tabindex=\"-1\" class=\"dropdown-divider\"></div>
                                <h6 tabindex=\"-1\" class=\"dropdown-header\">Session</h6>
                                <a href=\"";
                    // line 527
                    echo $this->env->getExtension('routing')->getPath("users_user_clearpidsessid");
                    echo "\" type=\"button\" tabindex=\"0\" class=\"dropdown-item active\">
                                    <span class=\"mr-3 opacity-8 flag large DE\"></span>
                                    Se déconnecter
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
\t\t
\t\t
\t\t
        <div class=\"app-header header-shadow\">
            <div class=\"container fiori-container\">
                <div class=\"app-header__mobile-menu\">
                    <div>
                        <button type=\"button\" class=\"hamburger hamburger--elastic mobile-toggle-nav\">
                            <span class=\"hamburger-box\">
                                <span class=\"hamburger-inner\"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class=\"app-header__logo\" style=\"background: #fff; margin-top: 0px;\">
                    <a href=\"";
                    // line 552
                    echo $this->env->getExtension('routing')->getPath("users_user_acces_plateforme");
                    echo "\">
\t\t\t\t\t\t<img src=\"";
                    // line 553
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/logo.png"), "html", null, true);
                    echo "\" alt=\"\" style=\"width: 60px;\"/>
\t\t\t\t\t</a>
                </div>
\t\t\t\t<ul class=\"horizontal-nav-menu\">
                    <li class=\"dropdown\">
                        <a data-toggle=\"dropdown\" data-offset=\"10\" data-display=\"static\" aria-expanded=\"false\" class=\"active\">
                            <i class=\"nav-icon-big typcn typcn-directions\"></i>
                            <span>L'institut</span>
                            <i class=\"nav-icon-pointer icon ion-ios-arrow-down\"></i>
                        </a>
                        <div tabindex=\"-1\" role=\"menu\" aria-hidden=\"true\" class=\"dropdown-menu dropdown-menu-lg\">
                            <div class=\"dropdown-menu-header\">
                                <div class=\"dropdown-menu-header-inner bg-plum-plate\" style=\"background: #092759!important;\">
                                    <div class=\"menu-header-content text-left\" style=\"background: #092759!important;\">
                                        <h5 class=\"menu-header-title\">";
                    // line 567
                    echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
                    echo "</h5>
                                        <h6 class=\"menu-header-subtitle\">";
                    // line 568
                    echo twig_escape_filter($this->env, (isset($context["slogan"]) ? $context["slogan"] : $this->getContext($context, "slogan")), "html", null, true);
                    echo "</h6>
                                    </div>
                                </div>
                            </div>
                            <div class=\"scroll-area-xs\">
                                <div class=\"scrollbar-container ps\">
\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 574
                    if (((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")) != null)) {
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("idart" => $this->getAttribute((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")), "id"), "position" => "aproposinstitut")), "html", null, true);
                    } else {
                        echo "#!";
                    }
                    echo "\" class=\"dropdown-item\"><span class=\"nav__title\">À propos</span></a>
\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 575
                    echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "evenement"));
                    echo "\" class=\"dropdown-item\"><span class=\"nav__title\">Evènement</span></a>
\t\t\t\t\t\t\t\t\t<a href=\"\" class=\"dropdown-item\"><span class=\"nav__title\">Actualité</span></a>
\t\t\t\t\t\t\t\t\t<a href=\"\" class=\"dropdown-item\"><span class=\"nav__title\">vidéos</span></a>

                                <div class=\"ps__rail-x\" style=\"left: 0px; bottom: 0px;\"><div class=\"ps__thumb-x\" tabindex=\"0\" style=\"left: 0px; width: 0px;\"></div></div><div class=\"ps__rail-y\" style=\"top: 0px; right: 0px;\"><div class=\"ps__thumb-y\" tabindex=\"0\" style=\"top: 0px; height: 0px;\"></div></div></div>
                            </div>
                            <ul class=\"nav flex-column\">
                                <li class=\"nav-item-divider nav-item\"></li>
                                <li class=\"nav-item-btn nav-item d-block text-center\">
                                    <a href=\"";
                    // line 584
                    echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "about"));
                    echo "\" class=\"btn-wide btn-shadow btn btn-success btn-sm\" style=\"background: #092759!important;\">À propos</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
\t\t\t\t\t
\t\t\t\t\t";
                    // line 591
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["liste_formation"]) ? $context["liste_formation"] : $this->getContext($context, "liste_formation")));
                    foreach ($context['_seq'] as $context["_key"] => $context["formation"]) {
                        // line 592
                        echo "                    <li class=\"dropdown\">
\t\t\t\t\t\t <a data-toggle=\"dropdown\" data-offset=\"10\" data-display=\"static\" aria-expanded=\"false\">
                            <i class=\"nav-icon-big typcn typcn-tags\"></i>
                            <span>";
                        // line 595
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "nom"), "html", null, true);
                        echo "</span>
                            <i class=\"nav-icon-pointer icon ion-ios-arrow-down\"></i>
                        </a>
\t\t\t\t\t\t
\t\t\t\t\t\t<div tabindex=\"-1\" role=\"menu\" aria-hidden=\"true\" class=\"dropdown-menu\">
                            <div class=\"dropdown-mega-menu dropdown-mega-menu-sm p-0\">
                                <div class=\"grid-menu grid-menu-3col\">
                                    <div class=\"nav flex-column\">
                                        <div class=\"row no-gutters\">
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 604
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "getScatProduits"), 0, 4));
                        foreach ($context['_seq'] as $context["_key"] => $context["diplome"]) {
                            // line 605
                            echo "                                            <div class=\"col-sm-4\">
                                                <div class=\"nav flex-column\">
                                                    <div class=\"nav-item-header text-primary nav-item\">
                                                        ";
                            // line 608
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "nom"), "html", null, true);
                            echo "
                                                    </div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 610
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "getProduitScat"), 0, 4));
                            foreach ($context['_seq'] as $context["_key"] => $context["prod"]) {
                                // line 611
                                echo "                                                    <a href=\"";
                                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_detail_produit_market", array("id" => $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "id"))), "html", null, true);
                                echo "\" class=\"dropdown-item\">
                                                        ";
                                // line 612
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "nom"), "html", null, true);
                                echo "
                                                    </a>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prod'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 615
                            echo "                                                    <a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_liste_produit_souscategorie", array("id" => $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "id"))), "html", null, true);
                            echo "\" class=\"dropdown-item\"><span class=\"fa fa-angle-right\"></span> Liste complète des formations</a>
                                                </div>
                                            </div>
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['diplome'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 619
                        echo "                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </li>
\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['formation'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 627
                    echo "\t\t\t\t\t
                </ul> 
\t\t\t\t<div class=\"app-header-right\">
                    <div class=\"search-wrapper\">
                        <i class=\"search-icon-wrapper typcn typcn-zoom-outline\"></i>
                        <input type=\"text\" placeholder=\"Search...\">
                    </div>  
\t\t\t\t</div>
                <div class=\"app-header__menu\">
                <span>
                    <button type=\"button\" class=\"btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav\">
                        <span class=\"btn-icon-wrapper\">
                            <i class=\"fa fa-ellipsis-v fa-w-6\"></i>
                        </span>
                    </button>
                </span>
                </div>
            </div>
        </div>    
\t\t
\t\t<!-- End Hearder -->
\t\t
\t\t
\t\t
\t\t";
                } else {
                    // line 652
                    echo "\t\t\t
\t\t";
                }
                // line 654
                echo "\t";
            }
        }
    }

    public function getTemplateName()
    {
        return "GeneralTemplateBundle:Menu:menubare.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1040 => 654,  1036 => 652,  1009 => 627,  996 => 619,  985 => 615,  976 => 612,  971 => 611,  967 => 610,  962 => 608,  957 => 605,  953 => 604,  941 => 595,  936 => 592,  932 => 591,  922 => 584,  910 => 575,  902 => 574,  893 => 568,  889 => 567,  872 => 553,  868 => 552,  840 => 527,  815 => 505,  797 => 490,  770 => 468,  764 => 467,  753 => 463,  749 => 461,  741 => 458,  737 => 456,  732 => 455,  728 => 454,  703 => 431,  700 => 430,  687 => 419,  684 => 418,  650 => 387,  644 => 384,  627 => 370,  612 => 358,  597 => 346,  584 => 336,  570 => 324,  559 => 318,  548 => 314,  537 => 312,  533 => 311,  528 => 309,  525 => 308,  521 => 307,  505 => 302,  501 => 301,  496 => 299,  486 => 292,  482 => 290,  478 => 289,  464 => 277,  436 => 255,  416 => 251,  412 => 250,  408 => 248,  390 => 247,  378 => 238,  374 => 237,  370 => 236,  366 => 235,  362 => 234,  358 => 233,  354 => 232,  350 => 231,  346 => 229,  335 => 221,  332 => 220,  325 => 216,  321 => 215,  317 => 214,  308 => 212,  305 => 211,  303 => 210,  276 => 192,  272 => 191,  253 => 174,  248 => 172,  238 => 169,  231 => 168,  229 => 167,  223 => 163,  212 => 161,  208 => 160,  198 => 153,  192 => 152,  186 => 151,  171 => 145,  167 => 144,  163 => 142,  19 => 1,  2335 => 1968,  2332 => 1967,  2327 => 1963,  2324 => 1962,  2319 => 1942,  2316 => 1941,  2299 => 28,  2293 => 25,  2289 => 24,  2285 => 23,  2277 => 18,  2272 => 16,  2267 => 15,  2264 => 14,  2258 => 12,  2252 => 11,  2231 => 2184,  2201 => 2157,  2181 => 2140,  2174 => 2136,  2166 => 2131,  2161 => 2129,  2016 => 1987,  1997 => 1970,  1995 => 1967,  1991 => 1965,  1989 => 1962,  1974 => 1952,  1963 => 1944,  1961 => 1941,  1957 => 1940,  1644 => 1630,  1631 => 1620,  50 => 41,  42 => 12,  40 => 11,  34 => 8,  25 => 1,  112 => 30,  107 => 32,  105 => 30,  102 => 29,  99 => 28,  87 => 23,  84 => 22,  81 => 21,  76 => 15,  71 => 18,  69 => 15,  66 => 14,  63 => 13,  48 => 14,  45 => 5,  39 => 3,  1351 => 1007,  1348 => 1006,  1343 => 1003,  1340 => 1002,  1276 => 941,  1270 => 937,  1261 => 934,  1256 => 932,  1252 => 931,  1244 => 930,  1241 => 929,  1237 => 928,  1211 => 907,  813 => 511,  802 => 502,  789 => 485,  786 => 494,  775 => 489,  771 => 488,  765 => 485,  759 => 482,  755 => 481,  750 => 479,  746 => 478,  743 => 459,  739 => 476,  734 => 474,  722 => 469,  717 => 466,  713 => 465,  699 => 454,  683 => 441,  672 => 432,  670 => 431,  664 => 427,  599 => 365,  587 => 356,  581 => 353,  575 => 349,  561 => 341,  556 => 339,  552 => 337,  538 => 329,  534 => 328,  530 => 326,  526 => 325,  518 => 322,  514 => 320,  510 => 319,  503 => 315,  499 => 313,  497 => 312,  494 => 311,  479 => 309,  476 => 308,  473 => 307,  470 => 306,  467 => 305,  450 => 304,  448 => 303,  446 => 302,  257 => 116,  243 => 171,  222 => 102,  205 => 101,  194 => 93,  189 => 91,  182 => 87,  172 => 79,  161 => 141,  157 => 73,  148 => 71,  139 => 69,  135 => 67,  131 => 66,  94 => 23,  89 => 25,  86 => 28,  67 => 14,  64 => 13,  57 => 10,  54 => 9,  46 => 6,  41 => 4,  36 => 2,  33 => 2,);
    }
}
