<?php

/* ProduitProduitBundle:Produit:detailproduit.html.twig */
class __TwigTemplate_5447fdfe51323799b9d605386de57fb86b89a1f57434fb63ab1add908842baef extends Twig_Template
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

    // line 3
    public function block_meta($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        $this->displayParentBlock("meta", $context, $blocks);
        echo "
\t<meta name=\"keywords\" content=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo ", Business, Innovation,Administration\"/>
\t<meta name=\"author\" content=\"Noel Kenfack\"/>
\t<meta name=\"description\" content=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["produit"]) ? $context["produit"] : $this->getContext($context, "produit")), "nom"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["produit"]) ? $context["produit"] : $this->getContext($context, "produit")), "contenu"), "html", null, true);
        echo "\"/>
";
    }

    // line 10
    public function block_title($context, array $blocks = array())
    {
        // line 11
        echo "\t";
        $this->displayParentBlock("title", $context, $blocks);
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["produit"]) ? $context["produit"] : $this->getContext($context, "produit")), "nom"), "html", null, true);
        echo "
";
    }

    // line 14
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 15
        echo "\t";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
    }

    // line 18
    public function block_userblog_body($context, array $blocks = array())
    {
        // line 19
        echo "
<link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/css/jquery.expandable.css"), "html", null, true);
        echo "\"/>
<script type=\"text/javascript\" src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/js/jquery.expandable.js"), "html", null, true);
        echo "\"></script>
<style>

.expandable .expand-bar{
\tposition: absolute;
\tz-index: 50!important;
}

\t\t\t\t
cool-link {
  display: inline-block;
  color: #000;
  text-decoration: none;
}

.cool-link::after {
  content: '';
  display: block;
  width: 0;
  height: 2px;
  background: #000;
  transition: width .3s;
}

.cool-link:hover::after {
  width: 100%;
}



.box {
  width: 100%;
  height: 300px;
  border-radius: 5px;
  background: #fbfcee;
  position: relative;
  overflow: hidden;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}

.wave {
  opacity: .4;
  position: absolute;
  top: 3%;
  left: 50%;
  background: #0af;
  width: 500px;
  height: 500px;
  margin-left: -250px;
  margin-top: -250px;
  -webkit-transform-origin: 50% 48%;
          transform-origin: 50% 48%;
  border-radius: 43%;
  -webkit-animation: drift 3000ms infinite linear;
          animation: drift 3000ms infinite linear;
}

.wave.-three {
  -webkit-animation: drift 5000ms infinite linear;
          animation: drift 5000ms infinite linear;
}

.wave.-two {
  -webkit-animation: drift 7000ms infinite linear;
          animation: drift 7000ms infinite linear;
  opacity: .1;
  background: yellow;
}

.box:after {
  content: '';
  display: block;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom, #ee88aa, rgba(221, 238, 255, 0) 80%, rgba(255, 255, 255, 0.5));
  z-index: 11;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}

.title {
  position: absolute;
  left: 0;
  top: 20px;
  width: 100%;
  z-index: 1;
  line-height: 25px;
  text-align: center;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
  color: white;
  text-transform: capitalize;
  font-size: 24px;
  text-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
  text-indent: .3em;
}

@-webkit-keyframes drift {
  from {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }
  from {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}

@keyframes drift {
  from {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }
  from {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}
a:hover{
\ttext-decoration: underline;
}
</style>
<div class=\"breadcrumb-panel\">
<div class=\"container\">
<div class=\"row\">
";
        // line 149
        if ($this->env->getExtension('TwigExtensions')->is_mobile()) {
            // line 150
            echo "<div class=\"col-md-12\">
<ol class=\"c-navigation-breadcrumbs__directory\">

<!-- Duplicating the \"Home\" link in both the global navigation and the breadcrumb trail is not recommended. -->
<li class=\"c-navigation-breadcrumbs__item\" property=\"itemListElement\" typeof=\"ListItem\">
  <a class=\"c-navigation-breadcrumbs__link\" href=\"";
            // line 155
            echo $this->env->getExtension('routing')->getPath("users_user_acces_plateforme");
            echo "\" property=\"item\" typeof=\"WebPage\">
\t<span class=\"u-visually-hidden\" property=\"name\"><span class=\"fa fa-home\"> </span> Accueil</span>
  </a>
  <meta property=\"position\" content=\"1\">
</li>

<li class=\"c-navigation-breadcrumbs__item\" property=\"itemListElement\" typeof=\"ListItem\">
  <a class=\"c-navigation-breadcrumbs__link\" href=\"";
            // line 162
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_produit_formation_institut", array("id" => $this->getAttribute($this->getAttribute((isset($context["souscategorie"]) ? $context["souscategorie"] : $this->getContext($context, "souscategorie")), "categorie"), "id"))), "html", null, true);
            echo "\" property=\"item\" typeof=\"WebPage\">
\t<span property=\"name\">";
            // line 163
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["souscategorie"]) ? $context["souscategorie"] : $this->getContext($context, "souscategorie")), "categorie"), "nom"), "html", null, true);
            echo "</span>
  </a>
  <meta property=\"position\" content=\"2\">
</li>

<li class=\"c-navigation-breadcrumbs__item\" property=\"itemListElement\" typeof=\"ListItem\">
  <a class=\"c-navigation-breadcrumbs__link\" href=\"";
            // line 169
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_liste_produit_souscategorie", array("id" => $this->getAttribute((isset($context["souscategorie"]) ? $context["souscategorie"] : $this->getContext($context, "souscategorie")), "id"))), "html", null, true);
            echo "\" property=\"item\" typeof=\"WebPage\">
\t<span property=\"name\">";
            // line 170
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["souscategorie"]) ? $context["souscategorie"] : $this->getContext($context, "souscategorie")), "nom"), "html", null, true);
            echo "</span>
  </a>
  <meta property=\"position\" content=\"3\">
</li>

<li class=\"c-navigation-breadcrumbs__item\" property=\"itemListElement\" typeof=\"ListItem\">
  <a class=\"c-navigation-breadcrumbs__link\" href=\"#!\" property=\"item\" aria-current=\"location\">
\t<span property=\"name\">";
            // line 177
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["produit"]) ? $context["produit"] : $this->getContext($context, "produit")), "nom"), "html", null, true);
            echo "</span>
  </a>
  <meta property=\"position\" content=\"4\">
</li>

</ol>
</div>
";
        } else {
            // line 185
            echo "<div class=\"col-md-12\">
<div style=\"padding: 20px 0px;\">
\t";
            // line 187
            $this->env->loadTemplate("GeneralTemplateBundle:Menu:contacts.html.twig")->display($context);
            // line 188
            echo "
\t<ul class=\"breadcrumbs\">
\t  <li><a href=\"";
            // line 190
            echo $this->env->getExtension('routing')->getPath("users_user_acces_plateforme");
            echo "\"><span class=\"fa fa-home\"></span> Accueil</a></li>
\t  <li><a href=\"";
            // line 191
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_produit_formation_institut", array("id" => $this->getAttribute($this->getAttribute((isset($context["souscategorie"]) ? $context["souscategorie"] : $this->getContext($context, "souscategorie")), "categorie"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["souscategorie"]) ? $context["souscategorie"] : $this->getContext($context, "souscategorie")), "categorie"), "nom"), "html", null, true);
            echo "</a></li>
\t  <li><a href=\"";
            // line 192
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_liste_produit_souscategorie", array("id" => $this->getAttribute((isset($context["souscategorie"]) ? $context["souscategorie"] : $this->getContext($context, "souscategorie")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["souscategorie"]) ? $context["souscategorie"] : $this->getContext($context, "souscategorie")), "nom"), "html", null, true);
            echo "</a></li>
\t  <li> ";
            // line 193
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["produit"]) ? $context["produit"] : $this->getContext($context, "produit")), "nom"), "html", null, true);
            echo "</li>
\t</ul>
</div>
</div>
";
        }
        // line 198
        echo "
</div>
</div>
</div>


<div style=\"background: #f0f0f2; padding-top: 20px;\">
<div class=\"container\">
<div class=\"row\">
\t<div class=\"col-md-3\">
\t
\t";
        // line 209
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_scat"]) ? $context["liste_scat"] : $this->getContext($context, "liste_scat")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["scat"]) {
            // line 210
            echo "\t<div class=\"card\" style=\"background: #fff; border-radius: 5px; padding: 7px; margin-bottom: 7px; display: block!important;\">
\t\t<div class=\"card-body\">
\t\t  <h4 class=\"card-title\">";
            // line 212
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["scat"]) ? $context["scat"] : $this->getContext($context, "scat")), "nom"), "html", null, true);
            echo "</h4>
\t\t</div>
\t\t<div class=\"\"> 
\t\t\t<a href=\"#!\" class=\"open-liste-formation\" style=\"display: block;\" value=\"";
            // line 215
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["scat"]) ? $context["scat"] : $this->getContext($context, "scat")), "id"), "html", null, true);
            echo "\">Liste des formations <span class=\"fa fa-angle-down\"></span> </a> 
\t\t</div>
\t\t<div class=\"list-group list-group-flush item-formation-";
            // line 217
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["scat"]) ? $context["scat"] : $this->getContext($context, "scat")), "id"), "html", null, true);
            echo "\" style=\"";
            if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first"))) {
                echo "display: none;";
            }
            echo "\">
\t\t\t";
            // line 218
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["scat"]) ? $context["scat"] : $this->getContext($context, "scat")), "getProduitScat"));
            foreach ($context['_seq'] as $context["_key"] => $context["prod"]) {
                // line 219
                echo "\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_detail_produit_market", array("id" => $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "id"))), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "nom"), "html", null, true);
                echo "\" class=\"list-group-item list-group-item-action\" style=\"border: none;\"><span class=\"cool-link\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "nom"), "html", null, true);
                echo "</span></a>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prod'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 221
            echo "\t\t</div>
\t</div>
\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['scat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 224
        echo "
\t</div>
\t
\t<div class=\"col-md-9\">
\t\t<div class=\"my-div\">
\t\t<section class=\"testing\" style=\"width: 100%;\">
\t\t   <div class=\"description2 to-expand\">
\t\t\t<h2>Formation: ";
        // line 231
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["produit"]) ? $context["produit"] : $this->getContext($context, "produit")), "nom"), "html", null, true);
        echo " </h2>
\t\t\t<p>
\t\t\t\t";
        // line 233
        echo $this->getAttribute((isset($context["produit"]) ? $context["produit"] : $this->getContext($context, "produit")), "contenu");
        echo "
\t\t\t</p>
\t\t   </div>
\t\t   <div class=\"row\">
\t\t\t   <div class=\"col-md-4\">
\t\t\t\t\t<div class='box'>
\t\t\t\t\t  <div class='wave -one'></div>
\t\t\t\t\t  <div class='wave -two'></div>
\t\t\t\t\t  <div class='wave -three'></div>
\t\t\t\t\t  <div class='title'>Durée de la formation  </br></br> <a href=\"#!\" style=\"font-size: 13px; color: #fff;\">En savoir plus <span class=\"fa fa-angle-right\"></span></a></div>
\t\t\t\t\t</div>
\t\t\t   </div>
\t\t\t   <div class=\"col-md-4\">
\t\t\t\t\t<div class='box'>
\t\t\t\t\t  <div class='wave -one'></div>
\t\t\t\t\t  <div class='wave -two'></div>
\t\t\t\t\t  <div class='wave -three'></div>
\t\t\t\t\t  <div class='title'>Coût de la formation </br></br> <a href=\"#!\" style=\"font-size: 13px; color: #fff;\">En savoir plus <span class=\"fa fa-angle-right\"></span></a></div>
\t\t\t\t\t</div>
\t\t\t   </div>
\t\t\t   <div class=\"col-md-4\">
\t\t\t\t\t<div class='box'>
\t\t\t\t\t  <div class='wave -one'></div>
\t\t\t\t\t  <div class='wave -two'></div>
\t\t\t\t\t  <div class='wave -three'></div>
\t\t\t\t\t  <div class='title'>S'incrire à cette formation </br></br> <a href=\"#!\" class=\"btn btn-primary commande-offer-formation\" value=\"";
        // line 258
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["produit"]) ? $context["produit"] : $this->getContext($context, "produit")), "id"), "html", null, true);
        echo "\" name=\"fc\" style=\"font-size: 13px; color: #fff;\">S'inscrire <span class=\"fa fa-thumbs-o-up\"></span></a></div>
\t\t\t\t\t</div>
\t\t\t   </div>
\t\t   </div>
\t\t</section>
\t\t</div>
\t\t
\t\t
\t\t";
        // line 266
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["produit"]) ? $context["produit"] : $this->getContext($context, "produit")), "souscategorie"), "caracteristiques"));
        foreach ($context['_seq'] as $context["_key"] => $context["caract"]) {
            // line 267
            echo "\t\t
\t\t<div class=\"my-div\">
\t\t\t<section class=\"testing\" style=\"width: 100%;\">
\t\t\t<div class=\"description2 to-expand\">
\t\t\t<h2>";
            // line 271
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["caract"]) ? $context["caract"] : $this->getContext($context, "caract")), "nom"), "html", null, true);
            echo "</h2>
\t\t\t
\t\t\t<div>
\t\t\t\t";
            // line 274
            $context["break"] = false;
            echo "\t\t\t\t\t\t
\t\t\t\t";
            // line 275
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["caract"]) ? $context["caract"] : $this->getContext($context, "caract")), "caracteristiqueproduits"));
            foreach ($context['_seq'] as $context["_key"] => $context["caractp"]) {
                if ((!(isset($context["break"]) ? $context["break"] : $this->getContext($context, "break")))) {
                    // line 276
                    echo "\t\t\t\t\t";
                    if (($this->getAttribute((isset($context["caractp"]) ? $context["caractp"] : $this->getContext($context, "caractp")), "produit") == (isset($context["produit"]) ? $context["produit"] : $this->getContext($context, "produit")))) {
                        // line 277
                        echo "\t\t\t\t\t";
                        $context["break"] = true;
                        // line 278
                        echo "\t\t\t\t\t";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["caractp"]) ? $context["caractp"] : $this->getContext($context, "caractp")), "valeur"), "html", null, true);
                        echo "
\t\t\t\t\t";
                    }
                    // line 280
                    echo "\t\t\t\t";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['caractp'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 281
            echo "\t\t\t\t
\t\t\t\t";
            // line 282
            if (((isset($context["break"]) ? $context["break"] : $this->getContext($context, "break")) == false)) {
                // line 283
                echo "\t\t\t\t\t<span>Aucune valeur spécifée pour cet indicateur.</span>
\t\t\t\t";
            }
            // line 285
            echo "\t\t\t</div>
\t\t\t
\t\t\t</div>
\t\t\t</section>
\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['caract'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 290
        echo "\t
\t</div>
</div>
</div>
</div>



";
    }

    // line 300
    public function block_javascripttemplate($context, array $blocks = array())
    {
        // line 301
        echo "
\$('.description2').expandable({
\theight: 200,
\texpand_responsive : 960,
\toffset: 30
});


\$('.accordion-1 > li:eq(0) a').addClass('active').next().slideDown();
\$('.accordion-2 > li:eq(0) a').addClass('active').next().slideDown();

\$('a').tooltip();
";
    }

    public function getTemplateName()
    {
        return "ProduitProduitBundle:Produit:detailproduit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  525 => 301,  522 => 300,  510 => 290,  499 => 285,  495 => 283,  493 => 282,  490 => 281,  483 => 280,  477 => 278,  474 => 277,  471 => 276,  466 => 275,  462 => 274,  456 => 271,  450 => 267,  446 => 266,  435 => 258,  407 => 233,  402 => 231,  393 => 224,  377 => 221,  364 => 219,  360 => 218,  352 => 217,  347 => 215,  341 => 212,  337 => 210,  320 => 209,  307 => 198,  299 => 193,  293 => 192,  287 => 191,  283 => 190,  279 => 188,  277 => 187,  273 => 185,  262 => 177,  252 => 170,  248 => 169,  239 => 163,  235 => 162,  225 => 155,  218 => 150,  216 => 149,  85 => 21,  81 => 20,  78 => 19,  75 => 18,  68 => 15,  65 => 14,  56 => 11,  53 => 10,  45 => 7,  40 => 5,  35 => 4,  32 => 3,);
    }
}
