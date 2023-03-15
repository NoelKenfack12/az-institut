<?php

/* ProduitServiceBundle:Service:detailarticlesupport.html.twig */
class __TwigTemplate_467802d78dfa177f9ba6ff04aba312fbb725424446c1892b611ac3e3260f0114 extends Twig_Template
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
        if (((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")) != null)) {
            // line 3
            echo "\t";
            if (($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "typearticle") == "galeriephoto")) {
                // line 4
                echo "\t\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t<div class=\"col-md-4\" style=\"padding: 0px;\">

\t\t\t<div class=\"card\" style=\"background: #fff; border-radius: 5px; padding: 7px; margin-bottom: 7px; display: block;\">
\t\t\t\t<div class=\"card-body\">
\t\t\t\t  <h4 class=\"card-title\">Evènements</h4>
\t\t\t\t  <h6 class=\"card-subtitle mb-2\">Emilia-Romagna Region, Italy</h6>
\t\t\t\t  <p class=\"card-text\">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
\t\t\t\t</div>
\t\t\t\t<div class=\"list-group\">
\t\t\t\t  <a href=\"#\" class=\"list-group-item \" style=\"border: none;\">
\t\t\t\t\tSan Petronio Basilica
\t\t\t\t  </a>
\t\t\t\t  <a href=\"#\" class=\"list-group-item \" style=\"border: none;\">University of Bologna</a>
\t\t\t\t  <a href=\"#\" class=\"list-group-item \" style=\"border: none;\">Fountain of Neptune</a>
\t\t\t\t  <a href=\"#\" class=\"list-group-item \" style=\"border: none;\">Fountain of Neptune</a>
\t\t\t\t</div>       
\t\t\t</div>
\t\t\t<div class=\"card\" style=\"background: #fff; border-radius: 5px; padding: 7px; margin-bottom: 7px; display: block;\">
\t\t\t\t<div class=\"card-body\">
\t\t\t\t  <h4 class=\"card-title\">Actualité</h4>
\t\t\t\t  <h6 class=\"card-subtitle mb-2\">Emilia-Romagna Region, Italy</h6>
\t\t\t\t  <p class=\"card-text\">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
\t\t\t\t</div>
\t\t\t\t<div class=\"list-group list-group-flush\">
\t\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">
\t\t\t\t\tSan Petronio Basilica
\t\t\t\t  </a>
\t\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">University of Bologna</a>
\t\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">Fountain of Neptune</a>
\t\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">Fountain of Neptune</a>
\t\t\t\t</div>       
\t\t\t</div>

\t\t</div>
\t\t<div class=\"col-md-8\" style=\"background: #fff;padding: 0px;\">
\t\t  <div style=\"height: 100%;\">
\t\t\t<div class=\"silly_scrollbar\" style=\"padding: 15px;\">
\t\t\t\t<div>
\t\t\t\t\t<div style=\"padding: 5px 0px;\">
\t\t\t\t\t<h2 style=\"font-size: 25px; margin: 0px;\">";
                // line 45
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "nom"), "html", null, true);
                echo "</h2>
\t\t\t\t\t<div>";
                // line 46
                echo $this->env->getExtension('TwigExtensions')->rewriteLink($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "description"));
                echo "</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<script src=\"";
                // line 49
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/galerie/js/lc_lightbox.lite.js"), "html", null, true);
                echo "\" type=\"text/javascript\"></script>
\t\t\t\t\t<link rel=\"stylesheet\" href=\"";
                // line 50
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/galerie/css/lc_lightbox.css"), "html", null, true);
                echo "\" />

\t\t\t\t\t<!-- SKINS -->
\t\t\t\t\t<link rel=\"stylesheet\" href=\"";
                // line 53
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/galerie/skins/minimal.css"), "html", null, true);
                echo "\" />

\t\t\t\t\t<!-- ASSETS -->
\t\t\t\t\t<script src=\"";
                // line 56
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/galerie/lib/AlloyFinger/alloy_finger.min.js"), "html", null, true);
                echo "\" type=\"text/javascript\"></script>
\t\t\t\t\t<style type=\"text/css\">
\t\t\t\t\t.elem, .elem * {
\t\t\t\t\t\tbox-sizing: border-box;
\t\t\t\t\t\tmargin: 0 !important;\t
\t\t\t\t\t}
\t\t\t\t\t.elem {
\t\t\t\t\t\tdisplay: inline-block;
\t\t\t\t\t\tfont-size: 0;
\t\t\t\t\t\tborder: 20px solid transparent;
\t\t\t\t\t\tborder-bottom: none;
\t\t\t\t\t\tbackground: #fff;
\t\t\t\t\t\tpadding: 10px;
\t\t\t\t\t\theight: auto;
\t\t\t\t\t\tbackground-clip: padding-box;
\t\t\t\t\t\tborder: 1px solid #f4f4f4;
\t\t\t\t\t}
\t\t\t\t\t.elem > span {
\t\t\t\t\t\tdisplay: block;
\t\t\t\t\t\tcursor: pointer;
\t\t\t\t\t\theight: 0;
\t\t\t\t\t\tpadding-bottom:\t70%;
\t\t\t\t\t\tbackground-size: cover;\t
\t\t\t\t\t\tbackground-position: center center;
\t\t\t\t\t}
\t\t\t\t\t</style>

\t\t\t\t\t<!-- LIGHTBOX FADING SHOW/HIDE EFFECT (as explained in documentation) -->
\t\t\t\t\t<style type=\"text/css\">
\t\t\t\t\t.lcl_fade_oc.lcl_pre_show #lcl_overlay,
\t\t\t\t\t.lcl_fade_oc.lcl_pre_show #lcl_window,
\t\t\t\t\t.lcl_fade_oc.lcl_is_closing #lcl_overlay,
\t\t\t\t\t.lcl_fade_oc.lcl_is_closing #lcl_window {
\t\t\t\t\t\topacity: 0 !important;
\t\t\t\t\t}
\t\t\t\t\t.lcl_fade_oc.lcl_is_closing #lcl_overlay {
\t\t\t\t\t\t-webkit-transition-delay: .15s !important; 
\t\t\t\t\t\ttransition-delay: .15s !important;
\t\t\t\t\t}
\t\t\t\t\t
\t\t\t\t\t.header .menu-btn:checked ~ .menu {
\t\t\t\t\t\tmax-height: 500px!important;
\t\t\t\t\t}
\t\t\t\t\t</style>
\t\t\t\t\t<div class=\" row\" id=\"carriere-accueil\">
\t\t\t\t\t\t";
                // line 101
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "getPartiearticles"));
                foreach ($context['_seq'] as $context["_key"] => $context["partie"]) {
                    // line 102
                    echo "\t\t\t\t\t\t<a class=\"elem col-lg-4 col-md-4 col-xs-12 col-sm-6\" href=\"";
                    if (($this->getAttribute((isset($context["partie"]) ? $context["partie"] : $this->getContext($context, "partie")), "imgevenement") != null)) {
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["partie"]) ? $context["partie"] : $this->getContext($context, "partie")), "imgevenement"), "getwebpath")), "html", null, true);
                    } else {
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.jpg"), "html", null, true);
                    }
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["partie"]) ? $context["partie"] : $this->getContext($context, "partie")), "nom"), "html", null, true);
                    echo "\" data-lcl-txt=\"";
                    echo $this->env->getExtension('TwigExtensions')->rewriteLink($this->getAttribute((isset($context["partie"]) ? $context["partie"] : $this->getContext($context, "partie")), "description"));
                    echo "\" data-lcl-author=\"AZ Corporation\" data-lcl-thumb=\"";
                    if (($this->getAttribute($this->getAttribute((isset($context["partie"]) ? $context["partie"] : $this->getContext($context, "partie")), "imgevenement"), "src") != null)) {
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["partie"]) ? $context["partie"] : $this->getContext($context, "partie")), "imgevenement"), "getwebpath")), "html", null, true);
                    } else {
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.jpg"), "html", null, true);
                    }
                    echo "\">
\t\t\t\t\t\t\t<span style=\"background-image: url(";
                    // line 103
                    if (($this->getAttribute($this->getAttribute((isset($context["partie"]) ? $context["partie"] : $this->getContext($context, "partie")), "imgevenement"), "src") != null)) {
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["partie"]) ? $context["partie"] : $this->getContext($context, "partie")), "imgevenement"), "getwebpath")), "html", null, true);
                    } else {
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.jpg"), "html", null, true);
                    }
                    echo ");\"></span>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['partie'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 106
                echo "\t\t\t\t\t\t
\t\t\t\t\t\t<br/><br/>
\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t\t\t\$(document).ready(function(e) {
\t\t\t\t\t\t\t// live handler
\t\t\t\t\t\t\tlc_lightbox('.elem', {
\t\t\t\t\t\t\t\twrap_class: 'lcl_fade_oc',
\t\t\t\t\t\t\t\tgallery : true,\t
\t\t\t\t\t\t\t\tthumb_attr: 'data-lcl-thumb', 
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\tskin: 'minimal',
\t\t\t\t\t\t\t\tradius: 0,
\t\t\t\t\t\t\t\tpadding\t: 0,
\t\t\t\t\t\t\t\tborder_w: 0,
\t\t\t\t\t\t\t});\t
\t\t\t\t\t\t});
\t\t\t\t\t</script>
\t\t\t\t\t<div style=\"height: 150px;\"></div>
\t\t\t\t\t
\t\t\t\t</div>
\t\t\t</div>
\t\t  </div>
\t\t</div>
\t\t</div>
\t\t</div>
\t";
            } else {
                // line 134
                echo "\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t<div class=\"col-md-4\" style=\"padding: 0px;\">

\t\t\t<div class=\"card\" style=\"background: #fff; border-radius: 5px; padding: 7px; margin-bottom: 7px; display: block;\">
\t\t\t\t<div class=\"card-body\">
\t\t\t\t  <h4 class=\"card-title\">Evènements</h4>
\t\t\t\t  <h6 class=\"card-subtitle mb-2\">Emilia-Romagna Region, Italy</h6>
\t\t\t\t  <p class=\"card-text\">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
\t\t\t\t</div>
\t\t\t\t<div class=\"list-group\">
\t\t\t\t  <a href=\"#\" class=\"list-group-item \" style=\"border: none;\">
\t\t\t\t\tSan Petronio Basilica
\t\t\t\t  </a>
\t\t\t\t  <a href=\"#\" class=\"list-group-item \" style=\"border: none;\">University of Bologna</a>
\t\t\t\t  <a href=\"#\" class=\"list-group-item \" style=\"border: none;\">Fountain of Neptune</a>
\t\t\t\t  <a href=\"#\" class=\"list-group-item \" style=\"border: none;\">Fountain of Neptune</a>
\t\t\t\t</div>       
\t\t\t</div>
\t\t\t<div class=\"card\" style=\"background: #fff; border-radius: 5px; padding: 7px; margin-bottom: 7px; display: block;\">
\t\t\t\t<div class=\"card-body\">
\t\t\t\t  <h4 class=\"card-title\">Actualité</h4>
\t\t\t\t  <h6 class=\"card-subtitle mb-2\">Emilia-Romagna Region, Italy</h6>
\t\t\t\t  <p class=\"card-text\">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
\t\t\t\t</div>
\t\t\t\t<div class=\"list-group list-group-flush\">
\t\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">
\t\t\t\t\tSan Petronio Basilica
\t\t\t\t  </a>
\t\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">University of Bologna</a>
\t\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">Fountain of Neptune</a>
\t\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">Fountain of Neptune</a>
\t\t\t\t</div>       
\t\t\t</div>

\t\t</div>
\t\t<div class=\"col-md-8\" style=\"background: #fff;padding: 0px;\">
\t\t  <div style=\"height: 100%;\">
\t\t\t<div class=\"silly_scrollbar\" style=\"padding: 15px;\">
\t\t\t\t<div>
\t\t\t\t\t<div style=\"padding: 5px 0px;\">
\t\t\t\t\t<h2 style=\"font-size: 25px; margin: 0px;\">";
                // line 175
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "nom"), "html", null, true);
                echo "</h2>
\t\t\t\t\t<div class=\"text-center\">
\t\t\t\t\t\t<img src=\"";
                // line 177
                if (($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "imgservice") != null)) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "imgservice"), "getwebpath")), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("templateofferts/images/3132.jpg"), "html", null, true);
                }
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "keyword"), "html", null, true);
                echo "\" style=\"width: 400px; margin: 7px 0px;\">
\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div style=\"padding: 5px;\">";
                // line 181
                echo $this->env->getExtension('TwigExtensions')->rewriteLink($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "description"));
                echo "</div>
\t\t\t\t\t";
                // line 182
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "getPartiearticles"));
                foreach ($context['_seq'] as $context["_key"] => $context["partie"]) {
                    // line 183
                    echo "\t\t\t\t\t<div id=\"pointeur-partie-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["partie"]) ? $context["partie"] : $this->getContext($context, "partie")), "id"), "html", null, true);
                    echo "\" style=\"margin-top: 10px; padding: 5px 0px; border-top: 1px solid #ddd;\">
\t\t\t\t\t<h2 style=\"font-size: 25px; margin: 0px; background: #f4f4f4; \">";
                    // line 184
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["partie"]) ? $context["partie"] : $this->getContext($context, "partie")), "nom"), "html", null, true);
                    echo " </h2>

\t\t\t\t\t";
                    // line 186
                    if (($this->getAttribute((isset($context["partie"]) ? $context["partie"] : $this->getContext($context, "partie")), "imgevenement") != null)) {
                        // line 187
                        echo "\t\t\t\t\t\t<div class=\"text-center\">
\t\t\t\t\t\t<img src=\"";
                        // line 188
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["partie"]) ? $context["partie"] : $this->getContext($context, "partie")), "imgevenement"), "getWebPath")), "html", null, true);
                        echo "\" alt=\"\" style=\"width: 100%; margin: 7px 0px;\">
\t\t\t\t\t\t</div>
\t\t\t\t\t";
                    }
                    // line 191
                    echo "\t\t\t\t\t<div style=\"padding: 5px;\">
\t\t\t\t\t";
                    // line 192
                    echo $this->env->getExtension('TwigExtensions')->rewriteLink($this->getAttribute((isset($context["partie"]) ? $context["partie"] : $this->getContext($context, "partie")), "description"));
                    echo "
\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['partie'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 196
                echo "\t\t\t\t\t<div style=\"height: 150px;\"></div>
\t\t\t\t\t
\t\t\t\t</div>
\t\t\t</div>
\t\t  </div>
\t\t</div>
\t</div>
\t</div>
\t";
            }
        } else {
            // line 206
            echo "<div class=\"col-md-4\">
  <div style=\"height: 1000px; padding-top: 65px; padding-left: 35px;\">
  Vide
  </div>
</div>
<div class=\"col-md-8\" style=\"background: #fff;\">
  <div style=\"height: 100%;\">
\t<div class=\"alert alert-warning\" style=\"border-left: 3px solid green; margin: 15px 0px;\">
\t\t<h2>
\t\t<span class=\"fa fa-warning\"></span> Aucun Article pour cette section
\t\t</h2>
\t</div>
  </div>
</div>
";
        }
        // line 221
        echo "\t
";
    }

    public function getTemplateName()
    {
        return "ProduitServiceBundle:Service:detailarticlesupport.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  342 => 221,  325 => 206,  313 => 196,  303 => 192,  300 => 191,  294 => 188,  291 => 187,  289 => 186,  284 => 184,  279 => 183,  275 => 182,  271 => 181,  258 => 177,  253 => 175,  210 => 134,  180 => 106,  167 => 103,  148 => 102,  144 => 101,  96 => 56,  90 => 53,  84 => 50,  80 => 49,  74 => 46,  70 => 45,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
