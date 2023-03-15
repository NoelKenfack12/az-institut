<?php

/* GeneralTemplateBundle:Menu:footer.html.twig */
class __TwigTemplate_4f05068cde556f24dcb91ce3a31f870910257e7ba76d874d906f46fb735b7753 extends Twig_Template
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
            echo "\t\t<style>
\t\t.o-footer1 {
\t\t  border-top: 1px solid #f8f9fa;
\t\t  padding-bottom: 62px;
\t\t  padding-top: 62px;
\t\t}
\t\t@media (max-width: 991.98px) {
\t\t  .o-footer1 {
\t\t\tmargin-left: 0;
\t\t\tmargin-right: 0;
\t\t  }
\t\t}
\t\t.o-footer1__title {
\t\t  font-weight: 700;
\t\t  margin-bottom: 20px;
\t\t}
\t\t.o-footer1__boxBrand {
\t\t  margin-bottom: 40px;
\t\t  max-width: 300px;
\t\t}
\t\t@media (min-width: 768px) {
\t\t  .o-footer1__boxBrand {
\t\t\tmargin-bottom: 0;
\t\t\tmax-width: none;
\t\t  }
\t\t}
\t\t.o-footer1__boxBrand img {
\t\t  margin-bottom: 20px;
\t\t}
\t\t.o-footer1__boxBrand p, .o-footer1__boxBrand ul, .o-footer1__boxBrand ol {
\t\t  line-height: 1.3;
\t\t}
\t\t.o-footer1__boxNavigation {
\t\t  margin-bottom: 40px;
\t\t}
\t\t@media (min-width: 768px) {
\t\t  .o-footer1__boxNavigation {
\t\t\tmargin-bottom: 0;
\t\t  }
\t\t}
\t\t.o-footer1__navLink {
\t\t  font-weight: 700;
\t\t  max-width: 300px;
\t\t  padding: 1px 0;
\t\t}
\t\t@media (min-width: 768px) {
\t\t  .o-footer1__navLink {
\t\t\tmax-width: none;
\t\t  }
\t\t}
\t\t.o-footer1__boxAddress {
\t\t  margin-bottom: 40px;
\t\t}
\t\t@media (min-width: 768px) {
\t\t  .o-footer1__boxAddress {
\t\t\tmargin-bottom: 0;
\t\t  }
\t\t}
\t\t.o-footer1__boxAddress p {
\t\t  max-width: 300px;
\t\t}
\t\t@media (min-width: 768px) {
\t\t  .o-footer1__boxAddress p {
\t\t\tmax-width: none;
\t\t  }
\t\t}
\t\t.o-footer1__boxAddress p.lead-big {
\t\t  font-weight: 700;
\t\t  line-height: 1.1;
\t\t  margin-bottom: 5px;
\t\t}
\t\t@media (min-width: 768px) {
\t\t  .o-footer1__boxAddress p.lead-big {
\t\t  }
\t\t}
\t\t@media (min-width: 992px) {
\t\t  .o-footer1__boxAddress p.lead-big {
\t\t\tfont-size: 1.6rem;
\t\t  }
\t\t}
\t\t@media (min-width: 1200px) {
\t\t  .o-footer1__boxAddress p.lead-big {
\t\t  }
\t\t}
\t\t.o-footer1__boxAddress p.lead-small {
\t\t  font-weight: 700;
\t\t  margin-top: 26px;
\t\t}
\t\t.o-footer1__boxInfo p, .o-footer1__boxInfo ul, .o-footer1__boxInfo ol {
\t\t 
\t\t  line-height: 1.4;
\t\t}
\t\t</style>
\t\t
\t\t";
            // line 97
            if (((isset($context["hideblock"]) ? $context["hideblock"] : $this->getContext($context, "hideblock")) == false)) {
                // line 98
                echo "\t\t\t";
                echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("UsersUserBundle:Billet:aviscarousel"));
                echo "
\t\t";
            }
            // line 100
            echo "\t\t
\t\t<section style=\"position: relative; z-index: 10000;\">
\t\t<div class=\"divider reverse\">
\t\t<section class=\"section1 footer\">
\t\t<div class=\"container\">
\t\t  <div class=\"row\">
\t\t\t\t<div class=\"col-md-12 text-center\" style=\"padding-bottom: 20px;\">
\t\t\t\t\t<h2 style=\"color: #fff;\">Message d'accompagnement à l'aide de l'entreprise Az Corporation et la plateforme e-learning</h2>
\t\t\t\t\t<div style=\"color: #fff;\">Prise en charge de tous les formats multimédia.</div>
\t\t\t\t\t<div style=\"padding-top: 15px;\">
\t\t\t\t\t\t<a href=\"\" class=\"btn btn-primary\" style=\"color: #fff;\">Plateforme de e-learning</a> ou <a href=\"\" class=\"btn btn-primary\" style=\"color: #fff;\">Site de l'entreprise</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t  </div>
\t\t</div>
\t\t</section>
\t\t</div>

\t\t<section style=\"background: #fff;\">
\t\t<footer class=\"container o-footer1\">
\t\t  <div class=\"row\">
\t\t\t<div class=\"col-12 col-md-3 mr-auto o-footer1__boxBrand\">
\t\t\t  ";
            // line 122
            if (((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")) != null)) {
                // line 123
                echo "\t\t\t\t<div>
\t\t\t\t\t<img src=\"";
                // line 124
                if ((($this->getAttribute((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")), "imgservice") != null) && ($this->getAttribute($this->getAttribute((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")), "imgservice"), "src") != null))) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")), "imgservice"), "getwebpath")), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.png"), "html", null, true);
                }
                echo "\" alt=\"Discus\" class=\"\" style=\"width: 100%; height: 120px;\"/>
\t\t\t\t\t<div>
\t\t\t\t\t\t<div style=\"font-weight: bold;\">";
                // line 126
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")), "nom"), "html", null, true);
                echo "</div>
\t\t\t\t\t\t<div style=\"margin-bottom: 15px;\">";
                // line 127
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")), "description"), "html", null, true);
                echo "</div>
\t\t\t\t\t\t<a href=\"";
                // line 128
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => $this->getAttribute((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")), "typearticle"), "idart" => $this->getAttribute((isset($context["apropos"]) ? $context["apropos"] : $this->getContext($context, "apropos")), "id"))), "html", null, true);
                echo "\" class=\"btn btn-primary\">En savoir plus <span class=\"fa fa-angle-right\"></span></a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
            } else {
                // line 132
                echo "\t\t\t\t  <img src=\"https://dummyimage.com/151x43/000/fff\" alt=\"Forkio Logo\" style=\"width: 100%; height: 120px;\"/>
\t\t\t\t  <p>
\t\t\t\t\t<h4>Bienvenue à l'institut AZ Corp</h4>
\t\t\t\t\t<div>Fondé en 2012, Az Corporation ....</div>
\t\t\t\t\t<div style=\"margin-top: 15px;\">
\t\t\t\t\t\t<a href=\"\" class=\"btn btn-primary\">En savoir plus <span class=\"fa fa-angle-right\"></span></a>
\t\t\t\t\t</div>
\t\t\t\t  </p>
\t\t\t\t";
            }
            // line 141
            echo "\t\t\t</div>
\t\t\t<div class=\"col-12 col-md-2 o-footer1__boxNavigation\">
\t\t\t  <h2 class=\"o-footer1__title\" style=\"margin-top: -10px;\">L'institut</h2>
\t\t\t  <ul class=\"nav\">
\t\t\t\t<li class=\"nav-item d-block w-100\">
\t\t\t\t  <a class=\"nav-link o-footer1__navLink\" href=\"";
            // line 146
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "aproposinstitut"));
            echo "\">À propos</a>
\t\t\t\t</li>
\t\t\t\t";
            // line 148
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["liste_formation"]) ? $context["liste_formation"] : $this->getContext($context, "liste_formation")));
            foreach ($context['_seq'] as $context["_key"] => $context["formation"]) {
                // line 149
                echo "\t\t\t\t<li class=\"nav-item d-block w-100\">
\t\t\t\t  <a class=\"nav-link o-footer1__navLink\" href=\"";
                // line 150
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_produit_formation_institut", array("id" => $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "id"))), "html", null, true);
                echo "\" style=\"white-space: nowrap;\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "nom"), "html", null, true);
                echo "</a>
\t\t\t\t</li>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['formation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 153
            echo "\t\t\t\t<li class=\"nav-item d-block w-100\">
\t\t\t\t  <a class=\"nav-link o-footer1__navLink\" href=\"";
            // line 154
            echo $this->env->getExtension('routing')->getPath("produit_service_contact_us");
            echo "\">Contacter</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"nav-item d-block w-100\">
\t\t\t\t  <a class=\"nav-link o-footer1__navLink\" href=\"#!\">Buying Options</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"nav-item d-block w-100\">
\t\t\t\t  <a class=\"nav-link o-footer1__navLink\" href=\"";
            // line 160
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "aide"));
            echo "\">Centre d'aide</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"nav-item d-block w-100\">
\t\t\t\t  <a class=\"nav-link o-footer1__navLink\" href=\"#!\">Buying Options</a>
\t\t\t\t</li>
\t\t\t  </ul>
\t\t\t</div>
\t\t\t<div class=\"col-12 col-md-3 o-footer1__boxAddress\">
\t\t\t  <p class=\"lead-big\">
\t\t\t\tActualité ";
            // line 169
            echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
            echo "
\t\t\t  </p>
\t\t\t  ";
            // line 171
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, (isset($context["liste_actualite"]) ? $context["liste_actualite"] : $this->getContext($context, "liste_actualite")), 0, 4));
            foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                // line 172
                echo "\t\t\t  <address>
\t\t\t\t<p class=\"lead-small\">
\t\t\t\t  <a href=\"";
                // line 174
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_detail_actualite", array("id" => $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "nom"), "html", null, true);
                echo "</a>
\t\t\t\t</p>
\t\t\t\t<p>
\t\t\t\t  ";
                // line 177
                echo twig_escape_filter($this->env, twig_slice($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "description"), 0, 60), "html", null, true);
                echo "..
\t\t\t\t</p>
\t\t\t  </address>
\t\t\t  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 181
            echo "\t\t\t  
\t\t\t  <address>
\t\t\t  <a href=\"";
            // line 183
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "actualite"));
            echo "\">Toute l'actualité <span class=\"fa fa-angle-right\"></span></a>
\t\t\t  </address>
\t\t\t</div>
\t\t\t<div class=\"col-12 col-md-4 o-footer1__boxInfo\" style=\"padding: 0px;\">
\t\t\t  <h2 class=\"o-footer1__title\" style=\"margin-top: -5px;\">";
            // line 187
            if (((isset($context["oldparam5"]) ? $context["oldparam5"] : $this->getContext($context, "oldparam5")) != null)) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["oldparam5"]) ? $context["oldparam5"] : $this->getContext($context, "oldparam5")), "valeur"), "html", null, true);
            } else {
                echo "L'institut en vidéos";
            }
            echo "</h2>
\t\t\t  
\t\t\t  <style>
\t\t\t\t.video-container {
\t\t\t\t\tposition: relative;
\t\t\t\t\tpadding-bottom: 56.25%;
\t\t\t\t\tpadding-top: 30px;
\t\t\t\t\theight: 0;
\t\t\t\t\toverflow: hidden;
\t\t\t\t}

\t\t\t\t.video-container iframe,  
\t\t\t\t.video-container object,  
\t\t\t\t.video-container embed {
\t\t\t\t\tposition: absolute;
\t\t\t\t\ttop: 0;
\t\t\t\t\tleft: 0;
\t\t\t\t\twidth: 100%;
\t\t\t\t\theight: 100%;
\t\t\t\t}
\t\t\t  </style>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-12 text-center\" style=\"padding: 0px 15px 15px 15px;\">
\t\t\t\t\t<div class=\"video-wrapper\">
\t\t\t\t\t\t<div class=\"video-container\">
\t\t\t\t\t\t\t<iframe src=\"";
            // line 212
            if (((isset($context["oldparam5"]) ? $context["oldparam5"] : $this->getContext($context, "oldparam5")) != null)) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["oldparam5"]) ? $context["oldparam5"] : $this->getContext($context, "oldparam5")), "link"), "html", null, true);
            } else {
                echo "https://www.youtube.com/embed/aYEbHZAi-KY";
            }
            echo "\"  frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- /video -->
\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t<a href=\"";
            // line 219
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "mediatheque"));
            echo "\">Afficher plus de vidéos <span class=\"fa fa-angle-right\"></span></a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t  </div>
\t\t</footer>
\t\t</section>
\t\t<div class=\"kilimanjaro_area\">
\t\t\t<div class=\" kilimanjaro_bottom_header_one section_padding_50 text-center\">
\t\t\t\t<div class=\"container\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-12 text-left\">
\t\t\t\t\t\t\t<p>Copyright © 2014 - ";
            // line 231
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
            echo " AZ Corporation. All rights reserved
\t\t\t\t\t\t\t\t";
            // line 232
            if ($this->env->getExtension('security')->isGranted("ROLE_GESTION")) {
                // line 233
                echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                echo $this->env->getExtension('routing')->getPath("users_adminuser_accueil_administration");
                echo "\">Administration</a>
\t\t\t\t\t\t\t\t";
            }
            // line 235
            echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<span class=\"pull-right\">
\t\t\t\t\t\t\t\t\t<a href=\"#!\" style=\"color: #fff;\">CGU</a> <span class=\"fa fa-caret-right\"> </span> 
\t\t\t\t\t\t\t\t\t<a href=\"#!\" style=\"color: #fff;\">Confidentialité</a> <span class=\"fa fa-caret-right\"> </span> 
\t\t\t\t\t\t\t\t\t<a href=\"#!\" style=\"color: #fff;\">Presse</a>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t</section>


\t\t<style>
\t\t.push-panel {
\t\t  max-width: 97%;
\t\t  right: 0;
\t\t  overflow: hidden;
\t\t  position: fixed;
\t\t  bottom: -55px;
\t\t  z-index: 10000;
\t\t  -webkit-border-top-left-radius: 5px;
\t\t  -webkit-border-top-right-radius: 5px;
\t\t  -moz-border-radius-topleft: 5px;
\t\t  -moz-border-radius-topright: 5px;
\t\t  border-top-left-radius: 5px;
\t\t  border-top-right-radius: 5px;
\t\t  border-bottom: none;
\t\t  background: #3565ae;
\t\t  border: solid 2px #3565ae;
\t\t  width: 300px !important;
\t\t  right: 20px !important;
\t\t}
\t\t.push-panel .header_push,
\t\t.push-panel .header_push:hover,
\t\t.push-panel .message,
\t\t.push-panel .body {
\t\t  background: #f7f7f7;
\t\t  border: solid 2px #f7f7f7;
\t\t}

\t\t.theme-reminder .header_push,
\t\t.theme-reminder .header_push:hover,
\t\t.theme-reminder .message,
\t\t.theme-reminder .body {
\t\t  background: #3565ae;
\t\t  border: solid 2px #3565ae;
\t\t}

\t\t.theme-notification .header_push,
\t\t.theme-notification .header_push:hover,
\t\t.theme-notification .message,
\t\t.theme-notification .body {
\t\t  background: #3565ae;
\t\t  border: solid 2px #3565ae;
\t\t}

\t\t.push-panel .visibility {
\t\t  float: right;
\t\t  font-size: 24px;
\t\t  margin: 8px 6px 0 0;
\t\t}

\t\t.push-panel .header_push {
\t\t  font-weight: bold;
\t\t  color: #fff;
\t\t  border-bottom: none;
\t\t  height: 45px;
\t\t  cursor: pointer;
\t\t}

\t\t.push-panel .header_push span {
\t\t  font-size: 24px;
\t\t  position: relative;
\t\t  top: 6px;
\t\t  left: 6px;
\t\t}

\t\t.push-panel .message {
\t\t  background: #f5f7f8;
\t\t  height: 200px;
\t\t  overflow: auto;
\t\t  border-bottom: none;
\t\t  padding: 10px;
\t\t  -webkit-border-radius: 8px;
\t\t  -moz-border-radius: 8px;
\t\t  border-radius: 8px;
\t\t}

\t\t.push-panel .message p {
\t\t  margin-top: 0;
\t\t}

\t\t.push-panel i.fa.theme-alert:before {
\t\t  content: \"\\f0f3\";
\t\t}

\t\t.push-panel .theme-notification:before {
\t\t  content: \"\\00A0\\00A0\\00A0\\00A0\";
\t\t  background-image: url(\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAA/1BMVEX///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////99vrbPAAAAVHRSTlMAs+tcsVDosmUlpGGVpW+nIDSKJEVOzk9GEKgME/cHx+/858xBePGYz/O+rAXAZJ137GJpenyDhIV1a1NbUcpsKpTF7Qo1Y5PD6ggzkMHEBjBejchsw+KfAAAAuklEQVR4Xs3O1c7CMACG4cJccHd3d3f3X3b/10KAwShptzOy96jb96Qp+HpWs01l5coWWqpjxrDT7pZueVCrg/XTkhyFAml5xIKQFjC+ARd4FggigRf4uCRRFZlIlIFBLJ4gxdQgk809bR4GheL9XJJeGWBQeZxJLDCpgJoWuH/Kb+ZRoNFstTvdXp8VhqPxO4CilAUNCB2AiRaYzuYLBIBartab7Q4CiPYH4Xiib+AM8F1+fv/+eaCTrm1NahYIsJyVAAAAAElFTkSuQmCC\");
\t\t}
\t\t</style>

\t\t<div class=\"push-panel theme-notification\" data-headline=\"Headline\" style=\"bottom: 0px;\">
\t\t<a href=\"#!\" class=\"header_push push-panel-open\" style=\"display: block;\">
\t\t\t<span>
\t\t\t <i class=\"fa fa-download\" style=\"margin: 0 3px;\"></i> Téléchargement
\t\t\t</span>
\t\t\t<i class=\"visibility fa fa-arrow-up\">&nbsp;</i>
\t\t</a>

\t\t<div class=\"body\" style=\"display: none;\">
\t\t<div class=\"message content-message-push\">
\t\t  <div> 
\t\t\t<ul class=\"nav nav-tabs\" style=\"padding: 0px; margin: 0px; border-bottom: none;\">
\t\t\t\t<li class=\"active\"><a href=\"#help-user-push\" data-toggle=\"tab\" style=\"font-size: 12px;\">Dépliants</a></li>
\t\t\t\t<li><a href=\"#interessant-user-push\" data-toggle=\"tab\" style=\"font-size: 12px;\">Programmes</a></li>
\t\t\t</ul>
\t\t  
\t\t  <div class=\"tab-content\" style=\"min-height: 100px; margin-left: 1px;\">
\t\t\t  <div class=\"tab-pane active\" id=\"help-user-push\" style=\"padding-bottom: 70px;\">
\t\t\t\t  <div style=\"background: #fff; padding: 7px;\">
\t\t\t\t\t<strong>Quand votre profil est sélectionné par un annonceur</strong>
\t\t\t\t\t<hr style=\"margin: 1px; border: 1px solid #f7f7f7;\">
\t\t\t\t\t<a href=\"";
            // line 361
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "planingcours"));
            echo "\">Afficher la liste complète</a>
\t\t\t\t  </div>
\t\t\t\t  ";
            // line 363
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["doc_depliant"]) ? $context["doc_depliant"] : $this->getContext($context, "doc_depliant")));
            foreach ($context['_seq'] as $context["_key"] => $context["doc"]) {
                // line 364
                echo "\t\t\t\t  <div style=\"background: #fff; padding: 7px; margin-top: 5px;\">
\t\t\t\t\t\t<div class=\"dropdown\" style=\"float: right;\">
\t\t\t\t\t\t<a href=\"#!\" style=\"display: block; padding: 4px; color: #fff; background: green;\" id=\"dropdownMenu_doc_";
                // line 366
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "id"), "html", null, true);
                echo "\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t  <span class=\"fa fa-arrow-circle-down\"></span>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<ul class=\"dropdown-menu pull-right\" aria-labelledby=\"dropdownMenu_doc_";
                // line 369
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "id"), "html", null, true);
                echo "\">
\t\t\t\t\t\t  <li class=\"dropdown-header\">Télécharger le dépliant</li>
\t\t\t\t\t\t  <li role=\"separator\" class=\"divider\"></li>
\t\t\t\t\t\t  <li><a href=\"";
                // line 372
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_adminuser_telecharg_lettre_motivation_user", array("id" => $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "id"))), "html", null, true);
                echo "\" target=\"_blank\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/file.png"), "html", null, true);
                echo "\" style=\"width: 15px; flaot: left;\" /> Version PDF</a></li>
\t\t\t\t\t\t  <li><a href=\"";
                // line 373
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_adminuser_telecharg_cv_user", array("id" => $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "id"))), "html", null, true);
                echo "\" target=\"_blank\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/jpg.png"), "html", null, true);
                echo "\" style=\"width: 15px; flaot: left;\" /> Version JPG</a></li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t  
\t\t\t\t\t\t<strong>";
                // line 377
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "message"), "html", null, true);
                echo "</strong>
\t\t\t\t\t\t<hr style=\"margin: 1px; border: 1px solid #f7f7f7;\">
\t\t\t\t\t\t<span class=\"fa fa-clock-o\"></span> ";
                // line 379
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "getDuree"), "html", null, true);
                echo "
\t\t\t\t\t\t<span style=\"float: right;\" title=\"Nombre de téléchargement\">
\t\t\t\t\t\t\t<span class=\"fa fa-line-chart\"></span> ";
                // line 381
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "nbtele") + $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "yourcv"), "nbtele")), "html", null, true);
                echo "
\t\t\t\t\t\t</span>
\t\t\t\t  </div>
\t\t\t\t  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['doc'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 385
            echo "\t\t\t  </div>
\t\t\t  <div class=\"tab-pane\" id=\"interessant-user-push\" style=\"padding-bottom: 70px;\">
\t\t\t\t  <div style=\"background: #fff; padding: 7px;\">
\t\t\t\t\t<strong>Quand l'annonce est susceptible de vous intéresser</strong>
\t\t\t\t\t<hr style=\"margin: 1px; border: 1px solid #f7f7f7;\">
\t\t\t\t\t<a href=\"";
            // line 390
            echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "planingcours"));
            echo "\">Afficher la liste complète</a>
\t\t\t\t\t</div>
\t\t\t\t\t";
            // line 392
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["doc_planing"]) ? $context["doc_planing"] : $this->getContext($context, "doc_planing")));
            foreach ($context['_seq'] as $context["_key"] => $context["doc"]) {
                // line 393
                echo "\t\t\t\t\t\t<div style=\"background: #fff; padding: 7px; margin-top: 5px;\">
\t\t\t\t\t\t\t<div class=\"dropdown\" style=\"float: right;\">
\t\t\t\t\t\t\t<a href=\"#!\" style=\"display: block; padding: 4px; color: #fff; background: green;\" id=\"dropdownMenu_doc_";
                // line 395
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "id"), "html", null, true);
                echo "\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t\t  <span class=\"fa fa-arrow-circle-down\"></span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<ul class=\"dropdown-menu pull-right\" aria-labelledby=\"dropdownMenu_doc_";
                // line 398
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "id"), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t  <li class=\"dropdown-header\">Télécharger le dépliant</li>
\t\t\t\t\t\t\t  <li role=\"separator\" class=\"divider\"></li>
\t\t\t\t\t\t\t  <li><a href=\"";
                // line 401
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_adminuser_telecharg_cv_user", array("id" => $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "id"))), "html", null, true);
                echo "\" target=\"_blank\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/file.png"), "html", null, true);
                echo "\" style=\"width: 15px; flaot: left;\" /> Version PDF</a></li>
\t\t\t\t\t\t\t  <li><a href=\"";
                // line 402
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_adminuser_telecharg_lettre_motivation_user", array("id" => $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "id"))), "html", null, true);
                echo "\" target=\"_blank\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/jpg.png"), "html", null, true);
                echo "\" style=\"width: 15px; flaot: left;\" /> Version JPG</a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t  
\t\t\t\t\t\t\t<strong>";
                // line 406
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "message"), "html", null, true);
                echo "</strong>
\t\t\t\t\t\t\t<hr style=\"margin: 1px; border: 1px solid #f7f7f7;\">
\t\t\t\t\t\t\t<span class=\"fa fa-clock-o\"></span> ";
                // line 408
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "getDuree"), "html", null, true);
                echo "
\t\t\t\t\t\t\t<span style=\"float: right;\" title=\"Nombre de téléchargement\">
\t\t\t\t\t\t\t\t<span class=\"fa fa-line-chart\"></span> ";
                // line 410
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "nbtele") + $this->getAttribute($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "yourcv"), "nbtele")), "html", null, true);
                echo "
\t\t\t\t\t\t\t</span>
\t\t\t\t\t  </div>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['doc'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 414
            echo "\t\t\t  </div>
\t\t  </div>
\t\t\t  
\t\t  </div>
\t\t</div>
\t\t<div class=\"footer\" style=\"min-height: 4px; color: #fff; text-align:center; font-size:12px\"></div>
\t\t</div>
\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t
\t\t<script type=\"text/javascript\">
\t\t\$(function(){
\t\t\t";
            // line 426
            if (((isset($context["nbproduit"]) ? $context["nbproduit"] : $this->getContext($context, "nbproduit")) > 0)) {
                // line 427
                echo "\t\t\tvar clignotement = function(){ 
\t\t\t   if (document.getElementById('DivClignotante').style.visibility=='visible'){ 
\t\t\t\t  document.getElementById('DivClignotante').style.visibility='hidden'; 
\t\t\t   } 
\t\t\t   else{ 
\t\t\t   document.getElementById('DivClignotante').style.visibility='visible'; 
\t\t\t   } 
\t\t\t}; 
\t\t\t\$('#DivClignotante').html(";
                // line 435
                echo twig_escape_filter($this->env, (isset($context["nbproduit"]) ? $context["nbproduit"] : $this->getContext($context, "nbproduit")), "html", null, true);
                echo ");
\t\t\t// mise en place de l appel de la fonction toutes les 0.8 secondes 
\t\t\t// Pour arrêter le clignotement : clearInterval(periode); 
\t\t\tperiode = setInterval(clignotement, 500); 
\t\t\t";
            }
            // line 440
            echo "\t\t});

\t\tvar pushPanel = (function () {
\t\t\t\t\t\t\t
\t\tvar \$pushPanelHeader = \$(\".push-panel-header\"),
\t\t   \$pushPanel = \$(\".push-panel\");

\t\tfunction ShowPushPanel(delay) {
\t\t\tvar _delay = 300;
\t\t\tif (delay) {
\t\t\t\t_delay = delay;
\t\t\t}

\t\t\tsetTimeout(function () {
\t\t\t\t\$pushPanel.animate({ bottom: \"0\" }, 800, 'easeOutBounce');
\t\t\t}, 8000);
\t\t}

\t\tfunction TriggerPushPanel(delay) {   
\t\t\t// Wire up click event to the push panel
\t\t\t\$(\".push-panel-open\").on('click', OpenClose);
\t\t\t// get the trigger element
\t\t\tvar trigger = \$('.push-panel-trigger');
\t\t\t// check to see if there is a trigger element and if there is, is it visible
\t\t\t// if there is no trigger element, we'll show the panel
\t\t\tif (trigger.length === 0 || IsShown(trigger)) {
\t\t\t\t// yes?  Show the panel
\t\t\t\tShowPushPanel(delay);
\t\t\t}
\t\t\telse {
\t\t\t\t//  no? keep checking as the user scrolls, then show the panel when it's visible
\t\t\t\t\$(window).scroll(function () {
\t\t\t\t\tif (IsShown(trigger)) {
\t\t\t\t\t\tShowPushPanel(300);
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}
\t\t}


\t\tfunction OpenClose() {
\t\t\tvar body = \$('.push-panel .body'),
\t\t\t\ttoggleState = body.css('display'),
\t\t\t\theadline = \$(\".push-panel\").data(\"headline\");

\t\t\t  body.slideToggle(800, 'easeOutBounce');

\t\t\tif (toggleState == 'none') {
\t\t\t\t\$pushPanelHeader.attr('class', 'push-panel-header push-panel-close');
\t\t\t\t\$(\".visibility\").attr('class', 'visibility fa fa-arrow-down');
\t\t\t}
\t\t\telse {
\t\t\t\t\$pushPanelHeader.attr('class', 'push-panel-header push-panel-open');
\t\t\t\t\$(\".visibility\").attr('class', 'visibility fa fa-arrow-up');
\t\t\t}

\t\t}



\t\t// Public methods
\t\treturn {
\t\t\tTriggerPushPanel: TriggerPushPanel
\t\t};

\t\t})();



\t\t\$(function(){
\t\tpushPanel.TriggerPushPanel(8000);

\t\tvar tail = (\$(window).height()) - 50;
\t\t\$('.content-message-push').css('height',tail+'px');

\t\t});
\t\t</script>

\t\t<!-- /.container -->
";
        } else {
            // line 520
            echo "\t";
            if (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "admin")) {
                // line 521
                echo "\t
\t\t<footer class=\"page-footer\" style=\"background: #151414!important;\">
\t\t\t<div class=\"footer-copyright\">
\t\t\t\t<div class=\"container\" style=\"color: #fff;\">
\t\t\t\t\tCopyright © 2014 - ";
                // line 525
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
                echo " AZ Corporation. All rights reserved
\t\t\t\t\t<span class=\"right\"> <a class=\"grey-text text-lighten-4\" href=\"#!\" title=\"Conditions Générales d'Utilisation\">CGU</a> ";
                // line 526
                if ($this->env->getExtension('security')->isGranted("ROLE_GESTION")) {
                    echo ". <a class=\"grey-text text-lighten-4\" href=\"";
                    echo $this->env->getExtension('routing')->getPath("users_adminuser_accueil_administration");
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Administration"), "html", null, true);
                    echo "</a>";
                }
                echo " .  <a class=\"grey-text text-lighten-4\" href=\"http://afhunt.com/\" target=\"_blank\">Design By <u>AFH<u></a></span>
\t\t\t\t</div>
\t\t\t</div>
\t\t</footer>
\t\t
\t\t";
                // line 585
                echo "\t";
            } else {
                // line 586
                echo "\t\t";
                if (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "login")) {
                    // line 587
                    echo "\t\t\t<div  style=\"background: #fff; padding: 15px 15px; min-height: 40px; position: relative; width: 100%; left: 0px; bottom: -15px; margin-left: -15px; margin-bottom: -15px;\">
\t\t\t\t<div style=\"\"><span style=\"float: left;\">Copyright © 2014 - ";
                    // line 588
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
                    echo " AZ Corporation. All rights reserved</span> <span style=\"float: right;\"><a href=\"";
                    echo $this->env->getExtension('routing')->getPath("users_user_acces_plateforme");
                    echo "\">Accueil</a> | <a href=\"#!\" >Support</a> | <a href=\"#!\">CGU</a> | <a href=\"#!\">Confidentialité</a> </span></div>    
\t\t\t</div>
\t\t";
                } else {
                    // line 591
                    echo "\t\t\t";
                    if (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "dashboard")) {
                        // line 592
                        echo "\t\t\t\t<!-- Début section footer  -->
\t\t\t\t<div class=\"app-wrapper-footer\">
\t\t\t\t<div class=\"app-footer\">
\t\t\t\t<div class=\"container fiori-container\">
\t\t\t\t<div class=\"app-footer__inner\">
\t\t\t\t\t<div>
\t\t\t\t\t\tCopyright © 2014 - ";
                        // line 598
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
                        echo " AZ Corporation. All rights reserved
\t\t\t\t\t\t";
                        // line 599
                        if ($this->env->getExtension('security')->isGranted("ROLE_GESTION")) {
                            echo "<a class=\"grey-text text-lighten-4\" href=\"";
                            echo $this->env->getExtension('routing')->getPath("users_adminuser_accueil_administration");
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Administration"), "html", null, true);
                            echo "</a>";
                        }
                        // line 600
                        echo "\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"app-footer-right\">
\t\t\t\t\t<ul class=\"header-megamenu nav\">
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t<a data-placement=\"top\" rel=\"popover-focus\" data-offset=\"300\" data-toggle=\"popover-custom\" class=\"nav-link\" data-original-title=\"\" title=\"\">
\t\t\t\t\tFooter Menu
\t\t\t\t\t<div class=\"badge badge-success ml-0 ml-1\">
\t\t\t\t\t<small>Old</small>
\t\t\t\t\t</div>
\t\t\t\t\t<i class=\"fa fa-angle-up ml-2 opacity-8\"></i>
\t\t\t\t\t</a>
\t\t\t\t\t<div class=\"rm-max-width rm-pointers\">
\t\t\t\t\t<div class=\"d-none popover-custom-content\">
\t\t\t\t\t<div class=\"dropdown-mega-menu dropdown-mega-menu-sm\">
\t\t\t\t\t\t<div class=\"grid-menu grid-menu-2col\">
\t\t\t\t\t\t\t<div class=\"no-gutters row\">
\t\t\t\t\t\t\t\t<div class=\"col-sm-6 col-xl-6\">
\t\t\t\t\t\t\t\t\t<ul class=\"nav flex-column\">
\t\t\t\t\t\t\t\t\t\t<li class=\"nav-item-header nav-item\">Overview</li>
\t\t\t\t\t\t\t\t\t\t<li class=\"nav-item\"><a href=\"javascript:void(0);\" class=\"nav-link\"><i class=\"nav-link-icon lnr-inbox\"> </i><span>Contacts</span></a></li>
\t\t\t\t\t\t\t\t\t\t<li class=\"nav-item\"><a href=\"javascript:void(0);\" class=\"nav-link\"><i class=\"nav-link-icon lnr-book\"> </i><span>Incidents</span>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"ml-auto badge badge-pill badge-danger\">5</div>
\t\t\t\t\t\t\t\t\t\t</a></li>
\t\t\t\t\t\t\t\t\t\t<li class=\"nav-item\"><a href=\"javascript:void(0);\" class=\"nav-link\"><i class=\"nav-link-icon lnr-picture\"> </i><span>Companies</span></a></li>
\t\t\t\t\t\t\t\t\t\t<li class=\"nav-item\"><a disabled=\"\" href=\"javascript:void(0);\" class=\"nav-link disabled\"><i class=\"nav-link-icon lnr-file-empty\"> </i><span>Dashboards</span></a></li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-sm-6 col-xl-6\">
\t\t\t\t\t\t\t\t\t<ul class=\"nav flex-column\">
\t\t\t\t\t\t\t\t\t\t<li class=\"nav-item-header nav-item\">Sales &amp; Marketing</li>
\t\t\t\t\t\t\t\t\t\t<li class=\"nav-item\"><a href=\"javascript:void(0);\" class=\"nav-link\">Queues</a></li>
\t\t\t\t\t\t\t\t\t\t<li class=\"nav-item\"><a href=\"javascript:void(0);\" class=\"nav-link\">Resource Groups</a></li>
\t\t\t\t\t\t\t\t\t\t<li class=\"nav-item\"><a href=\"javascript:void(0);\" class=\"nav-link\">Goal Metrics
\t\t\t\t\t\t\t\t\t\t\t<div class=\"ml-auto badge badge-warning\">3</div>
\t\t\t\t\t\t\t\t\t\t</a></li>
\t\t\t\t\t\t\t\t\t\t<li class=\"nav-item\"><a href=\"javascript:void(0);\" class=\"nav-link\">Campaigns</a></li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t</div>   
\t\t\t\t<!-- Fin section footer -->
\t\t\t";
                    } else {
                        // line 652
                        echo "\t\t\t
\t\t\t";
                    }
                    // line 654
                    echo "\t\t";
                }
                // line 655
                echo "\t";
            }
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
        return array (  860 => 655,  857 => 654,  853 => 652,  799 => 600,  791 => 599,  787 => 598,  779 => 592,  776 => 591,  768 => 588,  762 => 586,  745 => 526,  735 => 521,  642 => 435,  632 => 427,  630 => 426,  616 => 414,  606 => 410,  601 => 408,  596 => 406,  569 => 395,  565 => 393,  549 => 385,  539 => 381,  529 => 377,  520 => 373,  508 => 369,  502 => 366,  498 => 364,  489 => 361,  361 => 235,  355 => 233,  353 => 232,  349 => 231,  334 => 219,  320 => 212,  288 => 187,  281 => 183,  277 => 181,  267 => 177,  259 => 174,  255 => 172,  251 => 171,  246 => 169,  234 => 160,  225 => 154,  211 => 150,  204 => 148,  199 => 146,  181 => 132,  174 => 128,  170 => 127,  166 => 126,  154 => 123,  152 => 122,  128 => 100,  122 => 98,  120 => 97,  24 => 3,  22 => 2,  1040 => 654,  1036 => 652,  1009 => 627,  996 => 619,  985 => 615,  976 => 612,  971 => 611,  967 => 610,  962 => 608,  957 => 605,  953 => 604,  941 => 595,  936 => 592,  932 => 591,  922 => 584,  910 => 575,  902 => 574,  893 => 568,  889 => 567,  872 => 553,  868 => 552,  840 => 527,  815 => 505,  797 => 490,  770 => 468,  764 => 467,  753 => 463,  749 => 461,  741 => 525,  737 => 456,  732 => 520,  728 => 454,  703 => 431,  700 => 430,  687 => 419,  684 => 418,  650 => 440,  644 => 384,  627 => 370,  612 => 358,  597 => 346,  584 => 336,  570 => 324,  559 => 318,  548 => 314,  537 => 312,  533 => 311,  528 => 309,  525 => 308,  521 => 307,  505 => 302,  501 => 301,  496 => 299,  486 => 292,  482 => 290,  478 => 289,  464 => 277,  436 => 255,  416 => 251,  412 => 250,  408 => 248,  390 => 247,  378 => 238,  374 => 237,  370 => 236,  366 => 235,  362 => 234,  358 => 233,  354 => 232,  350 => 231,  346 => 229,  335 => 221,  332 => 220,  325 => 216,  321 => 215,  317 => 214,  308 => 212,  305 => 211,  303 => 210,  276 => 192,  272 => 191,  253 => 174,  248 => 172,  238 => 169,  231 => 168,  229 => 167,  223 => 163,  212 => 161,  208 => 149,  198 => 153,  192 => 141,  186 => 151,  171 => 145,  167 => 144,  163 => 142,  19 => 1,  2335 => 1968,  2332 => 1967,  2327 => 1963,  2324 => 1962,  2319 => 1942,  2316 => 1941,  2299 => 28,  2293 => 25,  2289 => 24,  2285 => 23,  2277 => 18,  2272 => 16,  2267 => 15,  2264 => 14,  2258 => 12,  2252 => 11,  2231 => 2184,  2201 => 2157,  2181 => 2140,  2174 => 2136,  2166 => 2131,  2161 => 2129,  2016 => 1987,  1997 => 1970,  1995 => 1967,  1991 => 1965,  1989 => 1962,  1974 => 1952,  1963 => 1944,  1961 => 1941,  1957 => 1940,  1644 => 1630,  1631 => 1620,  50 => 41,  42 => 12,  40 => 11,  34 => 8,  25 => 1,  112 => 30,  107 => 32,  105 => 30,  102 => 29,  99 => 28,  87 => 23,  84 => 22,  81 => 21,  76 => 15,  71 => 18,  69 => 15,  66 => 14,  63 => 13,  48 => 14,  45 => 5,  39 => 3,  1351 => 1007,  1348 => 1006,  1343 => 1003,  1340 => 1002,  1276 => 941,  1270 => 937,  1261 => 934,  1256 => 932,  1252 => 931,  1244 => 930,  1241 => 929,  1237 => 928,  1211 => 907,  813 => 511,  802 => 502,  789 => 485,  786 => 494,  775 => 489,  771 => 488,  765 => 587,  759 => 585,  755 => 481,  750 => 479,  746 => 478,  743 => 459,  739 => 476,  734 => 474,  722 => 469,  717 => 466,  713 => 465,  699 => 454,  683 => 441,  672 => 432,  670 => 431,  664 => 427,  599 => 365,  587 => 402,  581 => 401,  575 => 398,  561 => 392,  556 => 390,  552 => 337,  538 => 329,  534 => 379,  530 => 326,  526 => 325,  518 => 322,  514 => 372,  510 => 319,  503 => 315,  499 => 313,  497 => 312,  494 => 363,  479 => 309,  476 => 308,  473 => 307,  470 => 306,  467 => 305,  450 => 304,  448 => 303,  446 => 302,  257 => 116,  243 => 171,  222 => 153,  205 => 101,  194 => 93,  189 => 91,  182 => 87,  172 => 79,  161 => 141,  157 => 124,  148 => 71,  139 => 69,  135 => 67,  131 => 66,  94 => 23,  89 => 25,  86 => 28,  67 => 14,  64 => 13,  57 => 10,  54 => 9,  46 => 6,  41 => 4,  36 => 2,  33 => 2,);
    }
}
