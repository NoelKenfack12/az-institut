<?php

/* ProduitProduitBundle:Produit:produitformation.html.twig */
class __TwigTemplate_00bd4b67b0b1e75e37fabd8ce4a82144c364739f13115c9b0aa4ebe24f4969ca extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("UsersUserBundle::layouthome.html.twig");

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
        return "UsersUserBundle::layouthome.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_meta($context, array $blocks = array())
    {
        // line 3
        echo "\t";
        $this->displayParentBlock("meta", $context, $blocks);
        echo "
\t<meta name=\"keywords\" content=\"";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo ", Business, Innovation,Administration\"/>
\t<meta name=\"author\" content=\"Noel Kenfack\"/>
\t<meta name=\"description\" content=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "nom"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "description"), "html", null, true);
        echo "\"/>
";
    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        // line 10
        echo "\t";
        $this->displayParentBlock("title", $context, $blocks);
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "nom"), "html", null, true);
        echo "
";
    }

    // line 13
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 14
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
    }

    // line 17
    public function block_userblog_body($context, array $blocks = array())
    {
        // line 18
        echo "
<link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/css/jquery.expandable.css"), "html", null, true);
        echo "\"/>
<script type=\"text/javascript\" src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/js/jquery.expandable.js"), "html", null, true);
        echo "\"></script>


<div style=\"background: #f5f5f5;\">
<div class=\"container\">
<div class=\"row\">
";
        // line 26
        if ($this->env->getExtension('TwigExtensions')->is_mobile()) {
            // line 27
            echo "<div class=\"col-md-12\">
<ol class=\"c-navigation-breadcrumbs__directory\">

<!-- Duplicating the \"Home\" link in both the global navigation and the breadcrumb trail is not recommended. -->
<li class=\"c-navigation-breadcrumbs__item\" property=\"itemListElement\" typeof=\"ListItem\">
  <a class=\"c-navigation-breadcrumbs__link\" href=\"\" property=\"item\" typeof=\"WebPage\">
\t<span class=\"u-visually-hidden\" property=\"name\"><span class=\"fa fa-home\"> </span> Accueil</span>
  </a>
  <meta property=\"position\" content=\"1\">
</li>

<li class=\"c-navigation-breadcrumbs__item\" property=\"itemListElement\" typeof=\"ListItem\">
  <a class=\"c-navigation-breadcrumbs__link\" href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_produit_formation_institut", array("id" => $this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "id"))), "html", null, true);
            echo "\" property=\"item\" typeof=\"WebPage\">
\t<span property=\"name\">";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "nom"), "html", null, true);
            echo "</span>
  </a>
  <meta property=\"position\" content=\"2\">
</li>

<li class=\"c-navigation-breadcrumbs__item\" property=\"itemListElement\" typeof=\"ListItem\">
  <a class=\"c-navigation-breadcrumbs__link\" href=\"#!\" property=\"item\" aria-current=\"location\">
\t<span property=\"name\">À propos des ";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "nom"), "html", null, true);
            echo "</span>
  </a>
  <meta property=\"position\" content=\"3\">
</li>

</ol>
</div>
";
        } else {
            // line 55
            echo "<div class=\"col-md-12\">
<div style=\"padding: 20px 0px;\">
\t<div class=\"btn-group\" style=\"float: right; margin-top: -10px;\">
\t<button class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\"> Appliquer un filtre <span class=\"fa fa-angle-down\"></span></button>
\t<ul class=\"dropdown-menu pull-right\">
\t\t";
            // line 60
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["liste_formation"]) ? $context["liste_formation"] : $this->getContext($context, "liste_formation")));
            foreach ($context['_seq'] as $context["_key"] => $context["formation"]) {
                // line 61
                echo "\t\t\t<li><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_produit_formation_institut", array("id" => $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "nom"), "html", null, true);
                echo "</a></li>
\t\t\t<li class=\"divider\"></li>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['formation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "\t</ul>
\t</div>

\t<ul class=\"breadcrumbs\">
\t  <li><a href=\"#\"><span class=\"fa fa-home\"></span> Accueil</a></li>
\t  <li><a href=\"";
            // line 69
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_produit_formation_institut", array("id" => $this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "nom"), "html", null, true);
            echo "</a></li>
\t  <li>À propos des ";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "nom"), "html", null, true);
            echo "</li>
\t</ul>
</div>
</div>
";
        }
        // line 75
        echo "
</div>
</div>
</div>


<div style=\"background: #f0f0f2; padding-top: 20px;\">
<div class=\"container\">
<div class=\"row\">
\t";
        // line 84
        $this->env->loadTemplate("ProduitServiceBundle:Apropos:menuleft.html.twig")->display($context);
        // line 85
        echo "\t<div class=\"col-md-9\">
\t\t<div class=\"my-div\">
\t\t<section class=\"testing\" style=\"width: 100%;\">
\t\t   <div class=\"description2 to-expand\">
\t\t\t<h2>À propos des ";
        // line 89
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "nom"), "html", null, true);
        echo " </h2>
\t\t\t<p>
\t\t\t";
        // line 91
        echo $this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "description");
        echo "
\t\t\t</p>
\t\t   </div>
\t\t</section>
\t\t</div>
\t\t
\t\t<div class=\"my-div\">
\t\t<section class=\"testing\" style=\"width: 100%;\">
\t\t<div class=\"description2 to-expand\" style=\"padding-bottom: 50px;\">
\t\t<h2>";
        // line 100
        if (($this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "typeservice") == "diplomante")) {
            echo "Nos formations Diplomantes ";
        } else {
            echo "Nos formations continues";
        }
        echo "</h2>
\t\t
  <div class=\"cards row text-left\">
\t";
        // line 103
        if (($this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "typeservice") == "diplomante")) {
            // line 104
            echo "\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "getScatProduits"));
            foreach ($context['_seq'] as $context["_key"] => $context["diplome"]) {
                // line 105
                echo "\t\t<div class=\"col-md-6\">
\t\t\t<div class=\"main-offert\">
\t\t\t  <h4 style=\"margin: 0px 5px; padding: 0px;\"><a href=\"";
                // line 107
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_liste_produit_souscategorie", array("id" => $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "nom"), "html", null, true);
                echo "</a></h4>
\t\t\t  <section class=\"timeline\">
\t\t\t\t<ul>
\t\t\t\t  ";
                // line 110
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "getProduitScat"), 0, 2));
                foreach ($context['_seq'] as $context["_key"] => $context["prod"]) {
                    // line 111
                    echo "\t\t\t\t  <li>
\t\t\t\t\t<span></span>
\t\t\t\t\t<div style=\"min-height: 50px;\"> ";
                    // line 113
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "nom"), "html", null, true);
                    echo "</div>
\t\t\t\t\t<div class=\"coustom-my-text\">  ";
                    // line 114
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "contenu"), "html", null, true);
                    echo " </div>
\t\t\t\t\t<div> info.course </div>
\t\t\t\t\t<div class=\"year\">
\t\t\t\t\t  <span> Jun </span>
\t\t\t\t\t  <span> Sep </span>
\t\t\t\t\t</div>
\t\t\t\t  </li>
\t\t\t\t  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prod'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 122
                echo "\t\t\t\t  
\t\t\t\t</ul>
\t\t\t\t<div><a href=\"";
                // line 124
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_liste_produit_souscategorie", array("id" => $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "id"))), "html", null, true);
                echo "\">Affichez plus <span class=\"fa fa-angle-right\"></span></a></div>
\t\t\t\t<div class=\"text-center\">
\t\t\t\t<a href=\"#!\" class=\"az-btn-default commande-offer-formation\" value=\"";
                // line 126
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "id"), "html", null, true);
                echo "\" name=\"fd\">
\t\t\t\t\tSouscrire
\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t  </section>
\t\t\t</div>
\t\t</div>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['diplome'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 134
            echo "\t";
        } else {
            // line 135
            echo "\t
\t\t";
            // line 136
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie")), "getScatProduits"));
            foreach ($context['_seq'] as $context["_key"] => $context["diplome"]) {
                // line 137
                echo "\t\t<div class=\"col-md-6\">
\t\t  <div class=\"cards__item\">
\t\t\t<div class=\"actu-card\">
\t\t\t  <div class=\"card__image card__image--fence\" style=\"background: url('";
                // line 140
                if (($this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "src") != null)) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "getwebpath")), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/assistance-bg.jpg"), "html", null, true);
                }
                echo "') no-repeat center; -webkit-background-size: cover;
\t\t\t-moz-background-size: cover;
\t\t\t-o-background-size: cover;
\t\t\tbackground-size: cover;\"></div>
\t\t\t  <div class=\"card__content\" style=\"padding: 0px; min-height: 300px;\">
\t\t\t\t<div class=\"card__title text-left\" style=\"font-size: 20px;\"><a href=\"\"><span class=\"fa fa-hand-o-right\"></span> ";
                // line 145
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "nom"), "html", null, true);
                echo "</a></div>
\t\t\t\t<div class=\"card__text\" >
\t\t\t\t  ";
                // line 147
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "getProduitScat"), 0, 3));
                foreach ($context['_seq'] as $context["_key"] => $context["prod"]) {
                    // line 148
                    echo "\t\t\t\t  <div class=\"dropdown dropup\" style=\"margin: 1px 0px;\">
\t\t\t\t\t\t<button id=\"dropdownMenuC";
                    // line 149
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "id"), "html", null, true);
                    echo "\" class=\"btn btn-default btn-lg coustom-my-text\" style=\"width: 100%; white-space: normal; height: auto; border: none;\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t  <span class=\"fa fa-angle-right\"></span> ";
                    // line 150
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "nom"), "html", null, true);
                    echo "
\t\t\t\t\t\t</button>
\t\t\t\t\t\t<ul class=\"dropdown-menu my-panel-souscription\" aria-labelledby=\"dropdownMenuC";
                    // line 152
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "id"), "html", null, true);
                    echo "\">
\t\t\t\t\t\t  <li class=\"dropdown-header\">";
                    // line 153
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "nom"), "html", null, true);
                    echo "</li>
\t\t\t\t\t\t  <li role=\"separator\" class=\"divider\"></li>
\t\t\t\t\t\t  <li style=\"padding: 7px 15px;\">
\t\t\t\t\t\t\t<div>";
                    // line 156
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "contenu"), "html", null, true);
                    echo "</div>
\t\t\t\t\t\t  </li>
\t\t\t\t\t\t  <li style=\"padding: 7px 15px;\">
\t\t\t\t\t\t\t<div style=\"margin: 7px 0px;\"><a href=\"#!\" class=\"btn btn-default commande-offer-formation\" value=\"";
                    // line 159
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "id"), "html", null, true);
                    echo "\" name=\"fc\">S'incrire à cette formation</a></div>
\t\t\t\t\t\t\t<div style=\"margin: 7px 0px;\"><a href=\"";
                    // line 160
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_detail_produit_market", array("id" => $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "id"))), "html", null, true);
                    echo "\" class=\"btn btn-default\">Obtenir plus d'informations</a></div>
\t\t\t\t\t\t  </li>
\t\t\t\t\t\t</ul>
\t\t\t\t  </div>
\t\t\t\t  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prod'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 165
                echo "\t\t\t\t\t\t\t  
\t\t\t\t<div style=\"margin: 10px 0px;\"><a href=\"";
                // line 166
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_liste_produit_souscategorie", array("id" => $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "id"))), "html", null, true);
                echo "\">Toutes les offres <span class=\"fa fa-angle-right\"></span></a></div>
\t\t\t  </div>
\t\t\t  </div>
\t\t\t</div>
\t\t  </div>
\t\t  </div>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['diplome'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 173
            echo "  
\t";
        }
        // line 175
        echo "
</div>



\t\t  </div>
\t\t</section>
\t\t</div> 
\t</div>
</div>
</div>
</div>

";
    }

    // line 190
    public function block_javascripttemplate($context, array $blocks = array())
    {
        // line 191
        echo "
\$('.description2').expandable({
\theight: 500,
\texpand_responsive : 960,
\toffset: 30
});


\$('.accordion-1 > li:eq(0) a').addClass('active').next().slideDown();
\$('.accordion-2 > li:eq(0) a').addClass('active').next().slideDown();

\$('.accordion a.targetlink').click(function(j) {
\tvar dropDown = \$(this).closest('li').find('p');

\t\$(this).closest('.accordion').find('p').not(dropDown).slideUp();

\tif (\$(this).hasClass('active')) {
\t\t\$(this).removeClass('active');
\t} else {
\t\t\$(this).closest('.accordion').find('a.active').removeClass('active');
\t\t\$(this).addClass('active');
\t}

\tdropDown.stop(false, true).slideToggle();

\tj.preventDefault();
});

";
    }

    public function getTemplateName()
    {
        return "ProduitProduitBundle:Produit:produitformation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  411 => 191,  408 => 190,  391 => 175,  387 => 173,  374 => 166,  371 => 165,  360 => 160,  356 => 159,  350 => 156,  344 => 153,  340 => 152,  335 => 150,  331 => 149,  328 => 148,  324 => 147,  319 => 145,  307 => 140,  302 => 137,  298 => 136,  295 => 135,  292 => 134,  278 => 126,  273 => 124,  269 => 122,  255 => 114,  251 => 113,  247 => 111,  243 => 110,  235 => 107,  231 => 105,  226 => 104,  224 => 103,  214 => 100,  202 => 91,  197 => 89,  191 => 85,  189 => 84,  178 => 75,  170 => 70,  164 => 69,  157 => 64,  145 => 61,  141 => 60,  134 => 55,  123 => 47,  113 => 40,  109 => 39,  95 => 27,  93 => 26,  84 => 20,  80 => 19,  77 => 18,  74 => 17,  68 => 14,  65 => 13,  56 => 10,  53 => 9,  45 => 6,  40 => 4,  35 => 3,  32 => 2,);
    }
}
