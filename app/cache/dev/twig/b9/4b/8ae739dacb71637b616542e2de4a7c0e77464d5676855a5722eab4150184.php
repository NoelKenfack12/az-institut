<?php

/* ProduitServiceBundle:Apropos:aproposdenous.html.twig */
class __TwigTemplate_b94b8ae739dacb71637b616542e2de4a7c0e77464d5676855a5722eab4150184 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("UsersUserBundle::layoutuser.html.twig");

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
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
        echo ", Business, Innovation,Boutique,e-commerce,bon plan, bonnes affaires,petites annonces, immobilier, location, vente, annonces immobilière, appartements, duplex, villas, studios, terrains, chambres,conseils immobilier, immo, actualité immobilière, vente terrain, bon terrain, terrain pour maison, terrain bien placé.\"/>
<meta name=\"author\" content=\"Noel Kenfack\"/>
<meta name=\"description\" content=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo " | Toutes les informations à propos de l'entreprise ";
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo " - petites annonces immobilières au Cameroun, \"/>
";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        // line 9
        $this->displayParentBlock("title", $context, $blocks);
        echo " | ";
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo " | Toutes les informations à propos de l'entreprise ";
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo " - Annonces au Cameroun, Immobilier.
";
    }

    // line 11
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 12
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
<link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/css/sl-slide.css"), "html", null, true);
        echo "\">
";
    }

    // line 15
    public function block_userblog_body($context, array $blocks = array())
    {
        // line 16
        echo "<hr style=\"margin-top: 45px; margin-bottom: 0px;\"/>
<div  style=\"background: rgba(83, 101, 240, 1); height: 10px;\">
</div>
<div style=\"background: #BDC3C7;\">
\t<div class=\"container\" style=\"color: #fff;\">
\tAccueil <span class=\"mdi-av-play-arrow\" style=\"font-size: 10px;\"></span> À propos de ";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo "
\t</div>\t
</div>\t
<hr style=\"margin-bottom: 0px;\"/>
<h1 style=\"background: #ECF0F1; display: block; text-align: left; padding: 15px; margin-top: 0px;\">
<div class=\"animecourant-panel\">
</div>
</h1>

<div class=\"container\">
\t
\t<div class=\"row mt centered\">
\t\t<div id=\"monaccordeon\" class=\"panel-group col-lg-4\" style=\"padding: 0px 7px;\">
\t\t<div class=\"toutleblock\">
\t\t";
        // line 35
        $this->env->loadTemplate("UsersUserBundle:User:lienutile.html.twig")->display($context);
        // line 36
        echo "\t\t<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12 stop-courant-panel\">
\t\t\t\t
\t\t</div>
\t\t</div>
\t\t</div>
\t\t
\t\t<div class=\"col-lg-8\" style=\"padding: 0px 7px;\">
\t\t
\t\t<div class=\"panel panel-widget\" style=\"padding: 7px;\">
\t\t\t
\t\t\t<!--Slider-->
\t\t\t<section id=\"slide-show\">
\t\t\t<div id=\"slider\" class=\"sl-slider-wrapper\" style=\"height: 300px;\">
\t\t\t\t<!--Slider Items-->    
\t\t\t\t<div class=\"sl-slider\">
\t\t\t\t\t";
        // line 51
        $context["compt"] = 1;
        // line 52
        echo "\t\t\t\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_diapo"]) ? $context["liste_diapo"] : $this->getContext($context, "liste_diapo")));
        foreach ($context['_seq'] as $context["_key"] => $context["diapo"]) {
            // line 53
            echo "\t\t\t\t\t\t";
            if (($this->getAttribute((isset($context["diapo"]) ? $context["diapo"] : $this->getContext($context, "diapo")), "imginfoentreprise") != null)) {
                // line 54
                echo "\t\t\t\t\t\t<!--Slider Item1-->
\t\t\t\t\t\t<div class=\"sl-slide item";
                // line 55
                echo twig_escape_filter($this->env, (isset($context["compt"]) ? $context["compt"] : $this->getContext($context, "compt")), "html", null, true);
                echo "\" ";
                if (((isset($context["compt"]) ? $context["compt"] : $this->getContext($context, "compt")) == 1)) {
                    echo "data-orientation=\"horizontal\" data-slice1-rotation=\"-25\" data-slice2-rotation=\"-25\" data-slice1-scale=\"2\" data-slice2-scale=\"2\"";
                } else {
                    echo "data-orientation=\"vertical\" data-orientation=\"vertical\" data-slice1-rotation=\"10\" data-slice2-rotation=\"-15\" data-slice1-scale=\"1.5\" data-slice2-scale=\"1.5\"";
                }
                echo " >
\t\t\t\t\t\t\t<div class=\"sl-slide-inner\" style=\"border: 1px solid #ddd; width: 100%; height: 300px;\"> 
\t\t\t\t\t\t\t\t<div class=\"container\" style=\"width: 100%; height: 300px; padding: 0px;\">
\t\t\t\t\t\t\t\t\t<img class=\"pull-right\" src=\"";
                // line 58
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["diapo"]) ? $context["diapo"] : $this->getContext($context, "diapo")), "imginfoentreprise"), "getwebpath")), "html", null, true);
                echo "\" alt=\"\" style=\"width: 100%; height: 300px;\"/>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<h2 style=\"color: #fff; top: -150px; position: absolute; z-index: 1;margin: 5px;\">";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diapo"]) ? $context["diapo"] : $this->getContext($context, "diapo")), "titre"), "html", null, true);
                echo "</h2>
\t\t\t\t\t\t\t<h2 style=\"color: #fff; top: -90px; position: absolute; z-index: 1; font-size: 30px;margin: 5px;\">";
                // line 62
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diapo"]) ? $context["diapo"] : $this->getContext($context, "diapo")), "description"), "html", null, true);
                echo "</h2>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!--/Slider Item1-->
\t\t\t\t\t\t";
                // line 65
                $context["compt"] = ((isset($context["compt"]) ? $context["compt"] : $this->getContext($context, "compt")) + 1);
                // line 66
                echo "\t\t\t\t\t\t";
            }
            // line 67
            echo "\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['diapo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "\t\t\t\t</div>
\t\t\t\t<!--/Slider Items-->

\t\t\t\t<!--Slider Next Prev button-->
\t\t\t\t<nav id=\"nav-arrows\" class=\"nav-arrows\">
\t\t\t\t\t<span class=\"nav-arrow-prev\"><i class=\"icon-angle-left\"></i></span>
\t\t\t\t\t<span class=\"nav-arrow-next\"><i class=\"icon-angle-right\"></i></span> 
\t\t\t\t</nav>
\t\t\t\t<!--/Slider Next Prev button-->

\t\t\t</div>
\t\t\t<!-- /slider-wrapper -->           
\t\t\t</section>
\t\t</div>
\t\t
\t\t<div style=\"text-align:left;\">
\t\t\t<div class=\"skill-wrap clearfix\" style=\"margin: 15px 0px;\">
\t\t\t<ul class=\"list-group\">
\t\t\t";
        // line 86
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["allinfo"]) ? $context["allinfo"] : $this->getContext($context, "allinfo")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["info"]) {
            // line 87
            echo "
\t\t\t";
            // line 88
            if (($this->getAttribute((isset($context["info"]) ? $context["info"] : $this->getContext($context, "info")), "imginfoentreprise") == null)) {
                // line 89
                echo "\t\t\t<a href=\"#!\" class=\"list-group-item\">
\t\t\t<h4 class=\"list-group-item-heading\" style=\"border-bottom: 2px solid #ddd; margin-bottom: 7px;\">";
                // line 90
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["info"]) ? $context["info"] : $this->getContext($context, "info")), "titre"), "html", null, true);
                echo "</h4>
\t\t\t<p class=\"list-group-item-text\" style=\"text-align: justify\">";
                // line 91
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["info"]) ? $context["info"] : $this->getContext($context, "info")), "description"), "html", null, true);
                echo "</p>
\t\t\t</a>
\t\t\t";
            } else {
                // line 94
                echo "\t\t\t<a href=\"#!\" class=\"list-group-item ";
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") % 2 == 1)) {
                    echo "active";
                }
                echo "\">
\t\t\t<h4 class=\"list-group-item-heading\" style=\"border-bottom: 2px solid #ddd; margin-bottom: 7px;\">";
                // line 95
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["info"]) ? $context["info"] : $this->getContext($context, "info")), "titre"), "html", null, true);
                echo "</h4>
\t\t\t<div class=\"col-md-5\">
\t\t\t<img src=\"";
                // line 97
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["info"]) ? $context["info"] : $this->getContext($context, "info")), "imginfoentreprise"), "getwebpath")), "html", null, true);
                echo "\" style=\"width: 100%; height: 200px;\">
\t\t\t</div>
\t\t\t<div class=\"col-md-7\">
\t\t\t<p class=\"list-group-item-text\" style=\"text-align: justify\">";
                // line 100
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["info"]) ? $context["info"] : $this->getContext($context, "info")), "description"), "html", null, true);
                echo "</p>
\t\t\t</div>
\t\t\t<div class=\"clearfix\"> </div>
\t\t\t</a>
\t\t\t";
            }
            // line 105
            echo "
\t\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['info'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 107
        echo "\t\t\t</ul>

\t\t\t</div>
\t\t</div>
\t   <div class=\"clearfix\"> </div>
\t\t
\t\t</div>
\t\t
\t<script type=\"text/javascript\">
\t\$(document).ready(function(){
\t\t\$('.open-content').click(function(){
\t\t\t\$('.content-panel-'+\$(this).attr('name')).toggle('slow');
\t\t\tif(\$(this).attr('value') == 'down')
\t\t\t{
\t\t\t\t\$(this).attr('value','up');
\t\t\t\t\$('.open-content[name='+\$(this).attr('name')+']').html('<span class=\"mdi-hardware-keyboard-arrow-right\"></span>');
\t\t\t}else{
\t\t\t\t\$(this).attr('value','down');
\t\t\t\t\$('.open-content[name='+\$(this).attr('name')+']').html('<span class=\"mdi-hardware-keyboard-arrow-down\"></span>');
\t\t\t}
\t\t});
\t});
\t</script>
\t</div><!-- /row -->
</div><!-- /container -->

<hr>
<!-- /pricing section -->
<script src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/js/onvisible.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/js2/modernizr-2.6.2-respond-1.1.0.min.js"), "html", null, true);
        echo "\"></script>

<script src=\"";
        // line 138
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/js2/jquery.ba-cond.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 139
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/js2/jquery.slitslider.js"), "html", null, true);
        echo "\"></script>

<!-- /Required javascript files for Slider -->

<!-- SL Slider -->
<script type=\"text/javascript\"> 
\$(function() {
    var Page = (function() {

        var \$navArrows = \$( '#nav-arrows' ),
        slitslider = \$( '#slider' ).slitslider( {
            autoplay : true
        } ),

        init = function() {
            initEvents();
        },
        initEvents = function() {
            \$navArrows.children( ':last' ).on( 'click', function() {
                slitslider.next();
                return false;
            });

            \$navArrows.children( ':first' ).on( 'click', function() {
                slitslider.previous();
                return false;
            });
        };

        return { init : init };

    })();

    Page.init();
});
</script>
<!-- /SL Slider -->

";
    }

    // line 180
    public function block_javascripttemplate($context, array $blocks = array())
    {
        // line 181
        echo "
\$('.lien-about-us').addClass('position-user');

var bouge = 1;
var dimension = 200;
function activateelement()
{
var visibility = visibleElement('.animecourant-panel');

if(visibility && bouge == 0){
\tbouge = 1;
\t\$('.toutleblock').css('position','relative');
\t\$('.toutleblock').css('bottom','0px');
\t\$('.toutleblock').css('margin-bottom','0px');
}
}

function stopelement()
{
var visibility = visibleElement('.stop-courant-panel');
if(visibility && bouge == 1){
\tif(visibleElement('.animecourant-panel') && visibleElement('.stop-courant-panel'))
\t{
\t
\t}else{
\tbouge = 0;
\t\$('.toutleblock').css('position','fixed');
\t\$('.toutleblock').css('width',dimension+'px');
\t\$('.toutleblock').css('bottom','7px');
\t\$('.toutleblock').css('margin-bottom','50px');
\t}
}
}

var idStopelement = 0;
var idActivateelement = 0;
function controlScroll()
{
\tvar largeur = (\$(window).width());
\tdimension = \$('.toutleblock').width();
\tif (largeur >= 768)
\t{
\t   /*
\t\tif(visibleElement('.animecourant-panel') && visibleElement('.stop-courant-panel'))
\t\t{
\t\t
\t\t\$('.toutleblock').css('position','fixed');
\t\t\$('.toutleblock').css('width',dimension+'px'); 
\t\t}else{ 
\t\tidStopelement = window.setInterval(function() { stopelement(); }, 100);
\t\tidActivateelement = window.setInterval(function() { activateelement(); }, 100);
\t\t} */
\t\tidStopelement = window.setInterval(function() { stopelement(); }, 100);
\t\tidActivateelement = window.setInterval(function() { activateelement(); }, 100);
\t}
}
controlScroll();
";
    }

    public function getTemplateName()
    {
        return "ProduitServiceBundle:Apropos:aproposdenous.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  361 => 181,  358 => 180,  315 => 139,  311 => 138,  306 => 136,  302 => 135,  272 => 107,  257 => 105,  249 => 100,  243 => 97,  238 => 95,  231 => 94,  225 => 91,  221 => 90,  218 => 89,  216 => 88,  213 => 87,  196 => 86,  176 => 68,  170 => 67,  167 => 66,  165 => 65,  159 => 62,  155 => 61,  149 => 58,  137 => 55,  134 => 54,  131 => 53,  126 => 52,  124 => 51,  107 => 36,  105 => 35,  88 => 21,  81 => 16,  78 => 15,  72 => 13,  68 => 12,  65 => 11,  55 => 9,  52 => 8,  44 => 6,  39 => 4,  35 => 3,  32 => 2,);
    }
}
