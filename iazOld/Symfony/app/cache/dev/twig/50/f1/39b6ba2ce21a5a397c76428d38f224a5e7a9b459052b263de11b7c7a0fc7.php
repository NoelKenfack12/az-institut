<?php

/* ProduitServiceBundle:Service:detailactualite.html.twig */
class __TwigTemplate_50f139b6ba2ce21a5a397c76428d38f224a5e7a9b459052b263de11b7c7a0fc7 extends Twig_Template
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
            'srcjavascripttemplate' => array($this, 'block_srcjavascripttemplate'),
            'javascripttemplate' => array($this, 'block_javascripttemplate'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "UsersUserBundle::layouthome.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["hideblock"] = true;
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_meta($context, array $blocks = array())
    {
        // line 5
        echo "\t";
        $this->displayParentBlock("meta", $context, $blocks);
        echo "
\t<meta name=\"keywords\" content=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo ", Business, Innovation,Administration\"/>
\t<meta name=\"author\" content=\"Noel Kenfack\"/>
\t<meta name=\"description\" content=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo " | Inscription | Cameroun | ";
        echo twig_escape_filter($this->env, (isset($context["metier"]) ? $context["metier"] : $this->getContext($context, "metier")), "html", null, true);
        echo "\" />
";
    }

    // line 11
    public function block_title($context, array $blocks = array())
    {
        // line 12
        echo "\t";
        $this->displayParentBlock("title", $context, $blocks);
        echo " | ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "nom"), "html", null, true);
        echo "
";
    }

    // line 15
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 16
        echo "\t";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
\t
\t<script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/js/jquery-tjgallery.min.js"), "html", null, true);
        echo "\"></script>
\t<link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/css/jquery.expandable.css"), "html", null, true);
        echo "\"/>
<script type=\"text/javascript\" src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/js/jquery.expandable.js"), "html", null, true);
        echo "\"></script>
\t<style>
\t.pictures .item{
\t\tposition:relative;
\t\tdisplay:inline-block;
\t\tborder: 1px solid #ddd;
\t}
\t.pictures .item img{
\t\tposition:relative;
\t\tz-index: 11;
\t}
\t.pictures .item .item_description{
\t\tposition:absolute;
\t\tz-index: 10;
\t\tleft: -15px;
\t\ttop: -15px;
\t\tright: -15px;
\t\tbottom: -60px;
\t\t
\t\t-webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);
\t\t-moz-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);
\t\tbox-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);
\t\t
\t\tbackground:#151515;
\t\tpadding: 15px;
\t
\t\tdisplay:none;
\t}
\t.pictures .item .item_description span{
\t\tcolor:#ffffff;
\t\tfont-size: 13px;
\t\tdisplay:block;
\t\tposition:absolute;
\t\tbottom: 15px;
\t\theight: 30px;\t\t\t
\t}
\t.pictures .item:hover{
\t\tz-index: 100;
\t}
\t.pictures .tjGalleryItem .item:hover .item_description{
\t\tdisplay:block;
\t}
\t


\t.demos {
\t  text-align: center;
\t  margin-top: 20px;
\t  width: 490px;
\t  margin: auto;}

\t.demo-image {
\t  cursor: url(\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/plus_cursor.png"), "html", null, true);
        echo "\") 25 25, auto;
\t  display: inline-block;
\t}
\t

.my-div {
\twidth: 100%;
\tmargin-bottom: 10px;
\tpadding: 10px;
\tbackground-color: #fff;
\tborder-radius: 0px;
\tbox-shadow: 0px 0px 4px rgba(63,57,71,.15);
}
.my-div:hover{
\tbox-shadow: 0px 0px 20px rgba(63,57,71,.15);
}
@media (max-width: 700px){
\t.my-div {
\t\twidth: auto;
\t\tmargin: 0 auto;
\t\tborder-radius: 0;
\t\tpadding: 1em;
\t}
}
\t\t

#cover{
  display:flex;
  height: 280px;
  min-height:150px;
  align-items:center;
  background:#fff;
  box-shadow:0 9px 16px -6px #0005;
  position:relative;
  overflow:hidden
}

#cover .cover-image, #cover .cover-text{
  width:50%;
  box-sizing:border-box
}

#cover .cover-image{
  object-fit:cover;
  height:100%;
}

#cover .cover-text{
  text-align:center;
  padding:1em
}
#cover h2{
  font-family: 'Playfair Display', serif;
  font-size:3em;
  font-weight:400;
  line-height:1em
}
#cover h4{
   font-weight:400
}
/* Top heading */

  #cover.top {
    flex-direction:column;
  }
 #cover.top .cover-text, #cover.top .cover-image{
   width:100%
  }
#cover.top .cover-image{
  height:100px;
}
#cover.top h2{
  font-size:2em
}

/* Heading Over */

#cover.over:after{
  content:\"\";
  display:block;
  width:100%;
  height:100%;
  background:#0004;
  position:absolute;
  z-index:1;
  top:0;
  left:0;
}
#cover.over .cover-text, #cover.over .cover-image{
  width:100%
}
#cover.over .cover-text{
  color:#fff;
  align-self:flex-end;
  position:relative;
  z-index:2
}
#cover.over .cover-image{
  position:absolute;
  z-index:0
}

@media (max-width:500px){

  #cover:not(.over) {
    flex-direction:column;
    height:fit-content
  } 
  #cover h2{
  font-size:2em
  }
  #cover .cover-text, #cover .cover-image{
   width:100%
  }
}
\t</style>
";
    }

    // line 190
    public function block_userblog_body($context, array $blocks = array())
    {
        // line 191
        echo "<div class=\"breadcrumb-panel\">
<div class=\"container\">
<div class=\"row\">
<div class=\"col-md-12\">
\t<div class=\"animecourant-panel\" style=\"display: block;\">
\t\t\t
\t</div>
</div>
</div>
<div class=\"row\">
";
        // line 201
        if ($this->env->getExtension('TwigExtensions')->is_mobile()) {
            // line 202
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
  <a class=\"c-navigation-breadcrumbs__link\" href=\"#!\" property=\"item\" typeof=\"WebPage\">
\t<span property=\"name\">L'Institut</span>
  </a>
  <meta property=\"position\" content=\"2\">
</li>

<li class=\"c-navigation-breadcrumbs__item\" property=\"itemListElement\" typeof=\"ListItem\">
  <a class=\"c-navigation-breadcrumbs__link\" href=\"#!\" property=\"item\" aria-current=\"location\">
\t<span property=\"name\">Informations à propos de l'institut</span>
  </a>
  <meta property=\"position\" content=\"3\">
</li>

</ol>
</div>
";
        } else {
            // line 229
            echo "<div class=\"col-md-12\">
<div style=\"padding: 20px 0px;\">
\t";
            // line 231
            $this->env->loadTemplate("GeneralTemplateBundle:Menu:contacts.html.twig")->display($context);
            // line 232
            echo "
\t<ul class=\"breadcrumbs\">
\t  <li><a href=\"#\"><span class=\"fa fa-home\"></span> Accueil</a></li>
\t  ";
            // line 235
            if (($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "typearticle") == "evenement")) {
                // line 236
                echo "\t  <li><a href=\"#!\">Evènements</a></li>
\t  ";
            } else {
                // line 238
                echo "\t  <li><a href=\"#!\">Actualité scolaire</a></li>
\t  ";
            }
            // line 240
            echo "\t  <li>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "nom"), "html", null, true);
            echo "</li>
\t</ul>
</div>
</div>
";
        }
        // line 245
        echo "
</div>
</div>
</div>



<div style=\"background: #f4f4f4; padding-bottom: 30px;\">
<div class=\"container\" style=\"overflow: hidden;\">
  <div class=\"row\" style=\"margin-top: 25px;\">
\t
\t<div class=\"col-md-4\">
\t\t<div class=\"toutleblock\">
\t\t<div class=\"card\" style=\"background: #fff; border-radius: 5px; padding: 7px; margin-bottom: 7px;\">
\t\t\t<div class=\"card-body\">
\t\t\t  <h4 class=\"card-title\">Evènements</h4>
\t\t\t  <h6 class=\"card-subtitle mb-2\">Emilia-Romagna Region, Italy</h6>
\t\t\t  <p class=\"card-text\">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
\t\t\t</div>
\t\t\t<div class=\"list-group list-group-flush\">
\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">
\t\t\t\tSan Petronio Basilica
\t\t\t  </a>
\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">University of Bologna</a>
\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">Fountain of Neptune</a>
\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">Fountain of Neptune</a>
\t\t\t</div>       
        </div>
\t\t<div class=\"card\" style=\"background: #fff; border-radius: 5px; padding: 7px; margin-bottom: 7px;\">
\t\t\t<div class=\"card-body\">
\t\t\t  <h4 class=\"card-title\">Actualité</h4>
\t\t\t  <h6 class=\"card-subtitle mb-2\">Emilia-Romagna Region, Italy</h6>
\t\t\t  <p class=\"card-text\">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
\t\t\t</div>
\t\t\t<div class=\"list-group list-group-flush\">
\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">
\t\t\t\tSan Petronio Basilica
\t\t\t  </a>
\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">University of Bologna</a>
\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">Fountain of Neptune</a>
\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">Fountain of Neptune</a>
\t\t\t</div>       
        </div>
\t\t
\t\t<div class=\"card\" style=\"background: #fff; border-radius: 5px; padding: 7px; margin-bottom: 7px;\">
\t\t\t<div class=\"card-body\">
\t\t\t  <h4 class=\"card-title\">Actualité</h4>
\t\t\t  <h6 class=\"card-subtitle mb-2\">Emilia-Romagna Region, Italy</h6>
\t\t\t  <p class=\"card-text\">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
\t\t\t</div>
\t\t\t<div class=\"list-group list-group-flush\">
\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">
\t\t\t\tSan Petronio Basilica
\t\t\t  </a>
\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">University of Bologna</a>
\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">Fountain of Neptune</a>
\t\t\t  <a href=\"#\" class=\"list-group-item list-group-item-action\" style=\"border: none;\">Fountain of Neptune</a>
\t\t\t</div>       
        </div>
\t\t
\t\t<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12 stop-courant-panel\">

\t\t </div>
\t\t</div>
\t</div>
\t
\t<div class=\"col-md-8\">
\t\t
\t\t<main style=\"margin-bottom: 7px; background: #fff; padding: 10px; box-shadow:0px 0px 2px rgba(0,0,0,0.0005); min-width: 100%; border-radius: 5px;\">
\t\t\t<h3 class=\"mb-1\" style=\"border-bottom: 1px solid #ddd; margin-top: 0px;\">";
        // line 314
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "nom"), "html", null, true);
        echo "</h3>
\t\t\t<div>
\t\t\t\t";
        // line 316
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "description"), "html", null, true);
        echo "
\t\t\t</div>
\t\t\t
\t\t\t<div>
\t\t\t\t";
        // line 320
        if (($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "imgservice") != null)) {
            // line 321
            echo "\t\t\t\t<img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "imgservice"), "getwebpath")), "html", null, true);
            echo "\" alt=\"\" style=\"width: 100%; max-height: 350px;\"/>
\t\t\t\t";
        } else {
            // line 323
            echo "\t\t\t\t<img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/slider_one.jpg"), "html", null, true);
            echo "\" alt=\"\" style=\"width: 100%;\"/>
\t\t\t\t";
        }
        // line 325
        echo "\t\t\t</div>
\t\t\t
\t\t\t<div>
\t\t\t
\t\t\t</div>
\t\t</main>
\t\t
\t\t";
        // line 332
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "evenements"));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 333
            echo "\t\t<main style=\"background: #fff; padding: 10px; box-shadow:0px 0px 2px rgba(0,0,0,0.0005); min-width: 100%; min-height: 250px; border-radius: 5px;\">
\t\t\t";
            // line 334
            if (($this->getAttribute((isset($context["event"]) ? $context["event"] : $this->getContext($context, "event")), "imgevenement") != null)) {
                // line 335
                echo "\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<img src=\"";
                // line 337
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["event"]) ? $context["event"] : $this->getContext($context, "event")), "imgevenement"), "getwebpath")), "html", null, true);
                echo "\" alt=\"\" style=\"width: 100%; max-height: 350px;\"/>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t<h3 class=\"mb-1\">";
                // line 340
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : $this->getContext($context, "event")), "nom"), "html", null, true);
                echo "</h3>
\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t";
                // line 342
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : $this->getContext($context, "event")), "description"), "html", null, true);
                echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
            } else {
                // line 347
                echo "\t\t\t<h3 class=\"mb-1\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : $this->getContext($context, "event")), "nom"), "html", null, true);
                echo "</h3>
\t\t\t<div>
\t\t\t\t";
                // line 349
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : $this->getContext($context, "event")), "description"), "html", null, true);
                echo "
\t\t\t</div>
\t\t\t";
            }
            // line 352
            echo "\t\t</main>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 354
        echo "\t\t
\t\t<main style=\"background: #fff; padding: 10px; margin-top: 15px; box-shadow:0px 0px 2px rgba(0,0,0,0.0005); min-width: 100%; border-radius: 5px;\">
\t\t\t<h3  style=\"border-bottom: 1px solid #ddd; margin-top: 0px;\">Quelques Images <span class=\"fa fa-quote-left\"></span> ";
        // line 356
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "nom"), "html", null, true);
        echo "</h3>
\t\t\t<div class=\"pictures\" style=\"min-height: 200px; padding: 0px;\">
\t\t\t ";
        // line 358
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "ressourcearticles"));
        foreach ($context['_seq'] as $context["_key"] => $context["ressource"]) {
            // line 359
            echo "\t\t\t\t";
            if (($this->getAttribute((isset($context["ressource"]) ? $context["ressource"] : $this->getContext($context, "ressource")), "type") == "photo")) {
                // line 360
                echo "\t\t\t\t\t";
                $context["articleressource"] = $this->getAttribute((isset($context["ressource"]) ? $context["ressource"] : $this->getContext($context, "ressource")), "ressource");
                // line 361
                echo "\t\t\t\t\t<div class=\"item lightBox demo-image \" data-image=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "imgservice"), "getwebpath")), "html", null, true);
                echo "\" data-title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "nom"), "html", null, true);
                echo "\" data-caption=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "description"), "html", null, true);
                echo "\"><div class=\"item_description\"><span> <strong>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "nom"), "html", null, true);
                echo "</strong> <br/> ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "description"), "html", null, true);
                echo "</span></div><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "imgservice"), "getwebpath")), "html", null, true);
                echo "\" alt=\"\" class=\"thumb\"/></div>
\t\t\t\t\t
\t\t\t\t\t";
                // line 363
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "evenements"));
                foreach ($context['_seq'] as $context["_key"] => $context["partieressource"]) {
                    // line 364
                    echo "\t\t\t\t\t<div class=\"item lightBox demo-image \" data-image=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["partieressource"]) ? $context["partieressource"] : $this->getContext($context, "partieressource")), "imgevenement"), "getwebpath")), "html", null, true);
                    echo "\" data-title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["partieressource"]) ? $context["partieressource"] : $this->getContext($context, "partieressource")), "nom"), "html", null, true);
                    echo "\" data-caption=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["partieressource"]) ? $context["partieressource"] : $this->getContext($context, "partieressource")), "description"), "html", null, true);
                    echo "\"><div class=\"item_description\"><span> <strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["partieressource"]) ? $context["partieressource"] : $this->getContext($context, "partieressource")), "nom"), "html", null, true);
                    echo "</strong> <br/> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["partieressource"]) ? $context["partieressource"] : $this->getContext($context, "partieressource")), "description"), "html", null, true);
                    echo "</span></div><img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["partieressource"]) ? $context["partieressource"] : $this->getContext($context, "partieressource")), "imgevenement"), "getwebpath")), "html", null, true);
                    echo "\" alt=\"\" class=\"thumb\"/></div>
\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['partieressource'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 366
                echo "\t\t\t\t";
            }
            // line 367
            echo "\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ressource'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 368
        echo "\t\t\t</div>
\t\t</main>
\t\t
\t\t";
        // line 371
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "ressourcearticles"));
        foreach ($context['_seq'] as $context["_key"] => $context["ressource"]) {
            // line 372
            echo "\t\t\t";
            if (($this->getAttribute((isset($context["ressource"]) ? $context["ressource"] : $this->getContext($context, "ressource")), "type") == "video")) {
                // line 373
                echo "\t\t\t\t";
                $context["articleressource"] = $this->getAttribute((isset($context["ressource"]) ? $context["ressource"] : $this->getContext($context, "ressource")), "ressource");
                // line 374
                echo "\t\t\t\t
\t\t\t\t<div class=\"my-div\" style=\"margin-top: 10px;\">
\t\t\t\t<section class=\"testing\" style=\"width: 100%; \">
\t\t\t\t\t<div class=\"description2 to-expand\">
\t\t\t\t\t\t
\t\t\t\t\t\t<a href=\"#!\" id=\"cover\" style=\"padding-bottom: 15px;\">
\t\t\t\t\t\t  <div class=\"cover-text text-left\">
\t\t\t\t\t\t\t<h3>";
                // line 381
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "nom"), "html", null, true);
                echo "</h3>
\t\t\t\t\t\t\t<div>";
                // line 382
                echo $this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "breve");
                echo "</div>
\t\t\t\t\t\t\t<div class=\"btn-home btn-4 btn-mulberry toggle-overlay-article\" value=\"";
                // line 383
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "id"), "html", null, true);
                echo "\">En savoir plus</div>
\t\t\t\t\t\t  </div>
\t\t\t\t\t\t  
\t\t\t\t\t\t  ";
                // line 386
                if (($this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "link") != null)) {
                    // line 387
                    echo "\t\t\t\t\t\t\t<iframe width=\"560\" height=\"280\" src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "link"), "html", null, true);
                    echo "\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>
\t\t\t\t\t\t  ";
                } else {
                    // line 389
                    echo "\t\t\t\t\t\t\t<img src=\"";
                    if (($this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "imgservice") != null)) {
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "imgservice"), "getwebpath")), "html", null, true);
                    } else {
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/assistance-bg.jpg"), "html", null, true);
                    }
                    echo "\" class=\"cover-image\"  alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "keyword"), "html", null, true);
                    echo "\"/>
\t\t\t\t\t\t  ";
                }
                // line 391
                echo "\t\t\t\t\t\t</a>

\t\t\t\t\t\t<article>
\t\t\t\t\t\t  <div id=\"by\">
\t\t\t\t\t\t\t<img src=\"";
                // line 395
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.png"), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "user"), "name", array(0 => 20), "method"), "html", null, true);
                echo "\"/>
\t\t\t\t\t\t\t<i>By: ";
                // line 396
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "user"), "name", array(0 => 20), "method"), "html", null, true);
                echo "</i>
\t\t\t\t\t\t\t<a href=\"#!\"> Le ";
                // line 397
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "date"), "d"), "html", null, true);
                echo ".";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "date"), "m"), "html", null, true);
                echo ".";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "date"), "Y"), "html", null, true);
                echo "</a>
\t\t\t\t\t\t  </div>
\t\t\t\t\t\t  
\t\t\t\t\t\t  <div>
\t\t\t\t\t\t\t ";
                // line 401
                echo $this->getAttribute((isset($context["articleressource"]) ? $context["articleressource"] : $this->getContext($context, "articleressource")), "description");
                echo "
\t\t\t\t\t\t  </div>
\t\t\t\t\t\t</article>

\t\t\t\t\t</div>
\t\t\t\t</section>
\t\t\t\t</div>
\t\t\t\t
\t\t\t";
            }
            // line 410
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ressource'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 411
        echo "\t</div>
  </div>
</div>
</div>

";
    }

    // line 418
    public function block_srcjavascripttemplate($context, array $blocks = array())
    {
        // line 419
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/js/onvisible.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
    }

    // line 422
    public function block_javascripttemplate($context, array $blocks = array())
    {
        // line 423
        echo "
\$(function(){
\t\$('.description2').expandable({
\t\theight: 300,
\t\texpand_responsive : 960,
\t\toffset: 30
\t});
});

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
\t}else{
\tbouge = 0;
\t\$('.toutleblock').css('position','fixed');
\t\$('.toutleblock').css('width',dimension+'px');
\t\$('.toutleblock').css('bottom','7px');
\t\$('.toutleblock').css('margin-bottom','0px');
\t}
}
}

function controlScroll()
{
\tvar largeur = (\$(window).width());
\tdimension = \$('.toutleblock').width();
\tif (largeur >= 768)
\t{
\t\tif(visibleElement('.animecourant-panel') && visibleElement('.stop-courant-panel'))
\t\t{
\t\t\$('.toutleblock').css('position','fixed');
\t\t\$('.toutleblock').css('width',dimension+'px');
\t\t}else{
\t\twindow.setInterval(function() { stopelement(); }, 100);
\t\twindow.setInterval(function() { activateelement(); }, 100);
\t\t}
\t\t
\t}
}
controlScroll();



// waiting for loading page
\$(window).on('load', function(){
\t\$('.pictures').tjGallery({
\t\tselector: '.item',
\t\tmargin: 10
\t});
\t
});


window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          function( callback ){
            window.setTimeout(callback, 1000 / 60);
          };
})();

window.cancelRequestAnimFrame = ( function() {
    return window.cancelAnimationFrame          ||
        window.webkitCancelRequestAnimationFrame    ||
        window.mozCancelRequestAnimationFrame       ||
        window.oCancelRequestAnimationFrame     ||
        window.msCancelRequestAnimationFrame        ||
        clearTimeout
} )();


var Intense = (function() {

    'use strict';

    var KEYCODE_ESC = 27;

    // Track both the current and destination mouse coordinates
    // Destination coordinates are non-eased actual mouse coordinates
    var mouse = { xCurr:0, yCurr:0, xDest: 0, yDest: 0 };

    var horizontalOrientation = true;

    // Holds the animation frame id.
    var looper;
  
    // Current position of scrolly element
    var lastPosition, currentPosition = 0;
    
    var sourceDimensions, target;
    var targetDimensions = { w: 0, h: 0 };
  
    var container;
    var containerDimensions = { w: 0, h:0 };
    var overflowArea = { x: 0, y: 0 };

    // Overflow variable before screen is locked.
    var overflowValue;

    /* -------------------------
    /*          UTILS
    /* -------------------------*/

    // Soft object augmentation
    function extend( target, source ) {

        for ( var key in source )

            if ( !( key in target ) )

                target[ key ] = source[ key ];

        return target;
    }

    // Applys a dict of css properties to an element
    function applyProperties( target, properties ) {

      for( var key in properties ) {
        target.style[ key ] = properties[ key ];
      }
    }

    // Returns whether target a vertical or horizontal fit in the page.
    // As well as the right fitting width/height of the image.
    function getFit( 

      source ) {

      var heightRatio = window.innerHeight / source.h;

      if( (source.w * heightRatio) > window.innerWidth ) {
        return { w: source.w * heightRatio, h: source.h * heightRatio, fit: true };
      } else {
        var widthRatio = window.innerWidth / source.w;
        return { w: source.w * widthRatio, h: source.h * widthRatio, fit: false };
      }
    }

    /* -------------------------
    /*          APP
    /* -------------------------*/

    function startTracking( passedElements ) {

      var i;

      // If passed an array of elements, assign tracking to all.
      if ( passedElements.length ) {

        // Loop and assign
        for( i = 0; i < passedElements.length; i++ ) {
          track( passedElements[ i ] );
        }

      } else {
          track( passedElements );
      }
    }

    function track( element ) {

      // Element needs a src at minumun.
      if( element.getAttribute( 'data-image') || element.src ) {
        element.addEventListener( 'click', function() {
          init( this );
        }, false );
      }
    }
  
    function start() { 
      loop();
    }
   
    function stop() {
      cancelRequestAnimFrame( looper );
    }

    function loop() {
        looper = requestAnimFrame(loop);
        positionTarget();      
    }

    // Lock scroll on the document body.
    function lockBody() {

      overflowValue = document.body.style.overflow;
      document.body.style.overflow = 'hidden';
    }

    // Unlock scroll on the document body.
    function unlockBody() {
      document.body.style.overflow = overflowValue;
    }

    function createViewer( title, caption ) {

      /*
       *  Container
       */
      var containerProperties = {
        'backgroundColor': 'rgba(0,0,0,0.8)',
        'width': '100%',
        'height': '100%',
        'position': 'fixed',
        'top': '0px',
        'left': '0px',
        'overflow': 'hidden',
        'zIndex': '999999',
        'margin': '0px',
        'webkitTransition': 'opacity 150ms cubic-bezier( 0, 0, .26, 1 )',
        'MozTransition': 'opacity 150ms cubic-bezier( 0, 0, .26, 1 )',
        'transition': 'opacity 150ms cubic-bezier( 0, 0, .26, 1 )',
        'opacity': '0'
      }
      container = document.createElement( 'figure' );
      container.appendChild( target );
      applyProperties( container, containerProperties );

      var imageProperties = {
        'cursor': 'url( \"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo3Q0IyNDI3M0FFMkYxMUUzOEQzQUQ5NTMxMDAwQjJGRCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo3Q0IyNDI3NEFFMkYxMUUzOEQzQUQ5NTMxMDAwQjJGRCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjdDQjI0MjcxQUUyRjExRTM4RDNBRDk1MzEwMDBCMkZEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjdDQjI0MjcyQUUyRjExRTM4RDNBRDk1MzEwMDBCMkZEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+soZ1WgAABp5JREFUeNrcWn9MlVUY/u4dogIapV0gQ0SUO4WAXdT8B5ULc6uFgK3MLFxzFrQFZMtaed0oKTPj1x8EbbZZK5fNCdLWcvxQ+EOHyAQlBgiIVFxAJuUF7YrQ81zOtU+8F+Pe78K1d3s5537f+fE8nPec7z3vOSpJIRkbGwtEEgtdBdVCl0AXQr2hKqgJeg16BdoCrYNWqVSqbif7VQT8YqgB2jTmuDSJNoIcJUJVOVg5EsmH0Oehaj4bGRkZ6uvra2xvb29oamrqbGxs7K2vrx/s7Oy8yffBwcFzdTqdb0REhF9YWFhwSEhIpEajifDw8PAWzY5Cj0GzMUoNUx0R1RQJaJAcgKaw7ujo6O2urq7qysrKioyMjHNDQ0OjU2nP29tbnZ+fv1qv18cFBQWtU6vVs9gN9BvobhDqU5wIKryA5CuoLwj83dzc/NOePXuOlpSUXFNijiUlJS3ct2/fiytWrHgOhGbj0SD0dZD5UREiKOiJJA+axt9Go7F2165deUeOHOmVXCBbt271y8nJyfD3939aPCqCZoCQ2WEiKOQj7HYjzejUqVNFcXFxJdI0SEVFRdKGDRtShbmd5HwEGZM9IupJSHiJBjaazebr2dnZmdNFgsK+2Cf7JgZiEZhsimoSc/oZqh8eHjamp6fvPnTo0O/SDMiOHTsWFRQUHPDy8vLnQEGflZvZpKaFl4WcE7du3epPTU19+/Dhwz3SDMr27dsDioqKcufMmfM45wyIpD3QtPBiC0lgTowcPHgwa6ZJUIiBWIgJP1OB8aVJTQsFnkDSxCUWk60gPj6+VHIjKS8vT8TcSRdLcxhG5g+bpoWH3yF5ube3tw7L33uSGwqW/8/8/Pzoz30PItvuMy080HEZx/CZDQZDgeSmQmzESKwC870jgodcWhPhJx0LDw8vlNxYLl269Cb8Nfp5NP2kuyMiPM8EfvTodkhuLsQoJn4C/VG5ab3CfHd3d41SvpMrhRiBtVrgf01OZBv/nIRID4nIsG6xzBGxs7vK/YSvr2/SVF3xiYL55bVgwYJZp0+f/nOycuvXr38E+xczvOibjvTDLcDg4OBx7GfoD4ZwRPR8gUYbnCUBF3wuHMtPy8rKcmJjY33tleM7lqmpqdnPOo70RazAfNHapFrssaWOjo6Lzg43vj2zPT09febNm7ektLT0C1tk+IzvWIZlWcfR/oC5UWSjSCSUudbW1qvOEqmqqhrcvHnzOzdu3Lhii4ycBMuwLOs42t/ly5etmLUkEsJcbW3tbwq5ETbJ2CLBss70dfbsWSvmpZzsnJTzo6KiEhoaGoaVWlXkwE0mkyXk4+PjE6gUCUpMTMz86urq48gOkIjFWYHfEqf0EkkyJ06cyCMB/iah5OTkTCVIUDQajQf8wl+QNaune/2/c+eOS9olkb+YiYyM9FJ6NGhaHA2OBJV5e6uZI6LVaq2YTSTSz9zatWsfc8X84JzYtGlTJtXeauaorFy5cr7IXieRdubWrFnzpCtIJCYmWpZYKvNKksE/34q5g0RamQsNDV3sKhLy74ySZJYtW2bF3EIidZaFeOnSp5wl0t/fb4aYbJGwRYZlWcfR/mSYL8idRhOcxuTpdBoHBgZuY5Pk0LfrPqdRnE8080Fubm60Aru34QeRoLCMoyQoxCpItFnnCIVBB2kj5GHZj8iw/iDfWJHIaGBgYAyj4u5OghiBdZ00fqby9V0iMK8rSMoYMGZo392JECOwehAztHNipPFjxiGw0UnYuXPnInclQWzEKI0fCH1kL9JoCdAZjcZzAQEB77sjkZ6env3YjK22G6AT8i7DkSzI8KS7kSAmQWJQYL3HabwrjKVK4mQKX9w0g8EQ6i4k9u7dqyUm8TNNYJVsmpbMxL5EkuouxwopKSn+xcXFeeJYoRgkUmVYJyXirgc9ldBnbB302NxYiYJcGc6wgcLCwvysrCztTJgT+xYkzhCTvUPR//9hqBgZkxiZYjao1+vf4vLH4XalKbEP9iVIFIuRME2K9b92MOHCAEOdZS66MJAAAp5iiX0DBI4+ANfUiIhKvMLxOfRVSXaFA2ZQnpmZWefIFY68vLxVMNf4CVc4vuV3wiVXOCZUjkLygXTvpRoTL9Uw9NrS0tJVX1/fc/78+ettbW2WIPXy5cvnRkdHP6rT6QK0Wm0QNkXhGo0mUrjikvTvpZpPQODCFLA4bw6ya06/OnHNqXnGrjnZIyWNXzyjC0GPYIk0fvHM+h+XXzxjnOCcNH7x7KqT/VrSfwQYAOAcX9HTDttYAAAAAElFTkSuQmCC\" ) 25 25, auto'
      }
      applyProperties( target, imageProperties );

      /*
       *  Caption Container
       */
      var captionContainerProperties = {
        'fontFamily': 'Georgia, Times, \"Times New Roman\", serif',
        'position': 'fixed',
        'bottom': '0px',
        'left': '0px',
        'padding': '20px',
        'color': '#fff',
        'wordSpacing': '0.2px',
        'webkitFontSmoothing': 'antialiased',
        'textShadow': '-1px 0px 1px rgba(0,0,0,0.4)'
      }
      var captionContainer = document.createElement( 'figcaption' );
      applyProperties( captionContainer, captionContainerProperties );

      /*
       *  Caption Title
       */
      if ( title ) {
        var captionTitleProperties = {
          'margin': '0px',
          'padding': '0px',
          'fontWeight': 'normal',
          'fontSize': '40px',
          'letterSpacing': '0.5px',
          'lineHeight': '35px',
          'textAlign': 'left'
        }
        var captionTitle = document.createElement( 'h1' );
        applyProperties( captionTitle, captionTitleProperties );
        captionTitle.innerHTML = title;
        captionContainer.appendChild( captionTitle );
      }

      if ( caption ) {
        var captionTextProperties = {
          'margin': '0px',
          'padding': '0px',
          'fontWeight': 'normal',
          'fontSize': '20px',
          'letterSpacing': '0.1px',
          'maxWidth': '500px',
          'textAlign': 'left',
          'background': 'none',
          'marginTop': '5px'
        }
        var captionText = document.createElement( 'h2' );
        applyProperties( captionText, captionTextProperties );
        captionText.innerHTML = caption;
        captionContainer.appendChild( captionText );
      }

      container.appendChild( captionContainer );

      setDimensions();

      mouse.xCurr = mouse.xDest = window.innerWidth / 2;
      mouse.yCurr = mouse.yDest = window.innerHeight / 2;
      
      document.body.appendChild( container );
      setTimeout( function() {
        container.style[ 'opacity' ] = '1';
      }, 10);
    }

    function removeViewer() {

      unlockBody();
      unbindEvents();
      document.body.removeChild( container );
    }

    function setDimensions() {

      // Manually set height to stop bug where 
      var imageDimensions = getFit( sourceDimensions );
      target.width = imageDimensions.w;
      target.height = imageDimensions.h;
      horizontalOrientation = imageDimensions.fit;

      targetDimensions = { w: target.width, h: target.height };
      containerDimensions = { w: window.innerWidth, h: window.innerHeight };
      overflowArea = {x: containerDimensions.w - targetDimensions.w, y: containerDimensions.h - targetDimensions.h};

    }

    function init( element ) {

      var imageSource = element.getAttribute( 'data-image') || element.src;
      var title = element.getAttribute( 'data-title');
      var caption = element.getAttribute( 'data-caption');
      
      var img = new Image();
      img.onload = function() {

        sourceDimensions = { w: img.width, h: img.height }; // Save original dimensions for later.
        target = this;
        createViewer( title, caption );
        lockBody();
        bindEvents();
        loop();
      }

      img.src = imageSource;
    }

    function bindEvents() {

      container.addEventListener( 'mousemove', onMouseMove,   false );
      container.addEventListener( 'touchmove', onTouchMove,   false );
      window.addEventListener(    'resize',    setDimensions, false );
      window.addEventListener(    'keyup',     onKeyUp,       false );
      target.addEventListener(    'click',     removeViewer,  false );
    }

    function unbindEvents() {

      container.removeEventListener( 'mousemove', onMouseMove,   false );
      container.removeEventListener( 'touchmove', onTouchMove,   false);
      window.removeEventListener(    'resize',    setDimensions, false );
      window.removeEventListener(    'keyup',     onKeyUp,       false );
      target.removeEventListener(    'click',     removeViewer,  false )
    }
  
    function onMouseMove( event ) {

      mouse.xDest = event.clientX;
      mouse.yDest = event.clientY;
    }

    function onTouchMove( event ) {

      event.preventDefault(); // Needed to keep this event firing.
      mouse.xDest = event.touches[0].clientX;
      mouse.yDest = event.touches[0].clientY;
    }

    // Exit on excape key pressed;
    function onKeyUp( event ) {

      event.preventDefault();
      if ( event.keyCode === KEYCODE_ESC ) {
        removeViewer();
      } 
    }
  
    function positionTarget() {

      mouse.xCurr += ( mouse.xDest - mouse.xCurr ) * 0.05;
      mouse.yCurr += ( mouse.yDest - mouse.yCurr ) * 0.05;

      if ( horizontalOrientation === true ) {

        // HORIZONTAL SCANNING
        currentPosition += ( mouse.xCurr - currentPosition );
        if( mouse.xCurr !== lastPosition ) {
          var position = parseFloat( currentPosition / containerDimensions.w );
          position = overflowArea.x * position;
          target.style[ 'webkitTransform' ] = 'translate3d(' + position + 'px, 0px, 0px)';
          target.style[ 'MozTransform' ] = 'translate3d(' + position + 'px, 0px, 0px)';
          target.style[ 'msTransform' ] = 'translate3d(' + position + 'px, 0px, 0px)';
          lastPosition = mouse.xCurr;
        }
      } else if ( horizontalOrientation === false ) {

        // VERTICAL SCANNING
        currentPosition += ( mouse.yCurr - currentPosition );
        if( mouse.yCurr !== lastPosition ) {
          var position = parseFloat( currentPosition / containerDimensions.h );
          position = overflowArea.y * position;
          target.style[ 'webkitTransform' ] = 'translate3d( 0px, ' + position + 'px, 0px)';
          target.style[ 'MozTransform' ] = 'translate3d( 0px, ' + position + 'px, 0px)';
          target.style[ 'msTransform' ] = 'translate3d( 0px, ' + position + 'px, 0px)';
          lastPosition = mouse.yCurr;
        }
      }
    }

    function main( element ) {

      // Parse arguments

      if ( !element ) {
        throw 'You need to pass an element!';
      }

      startTracking( element );
    }

    return extend( main, {
        resize: setDimensions,
        start: start,
        stop: stop
    });

})();

window.onload = function() {
\tvar elements = document.querySelectorAll( '.demo-image' );
\tIntense( elements );
}
";
    }

    public function getTemplateName()
    {
        return "ProduitServiceBundle:Service:detailactualite.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  686 => 423,  683 => 422,  676 => 419,  673 => 418,  664 => 411,  658 => 410,  646 => 401,  635 => 397,  631 => 396,  625 => 395,  619 => 391,  607 => 389,  601 => 387,  599 => 386,  593 => 383,  589 => 382,  585 => 381,  576 => 374,  573 => 373,  570 => 372,  566 => 371,  561 => 368,  555 => 367,  552 => 366,  533 => 364,  529 => 363,  513 => 361,  510 => 360,  507 => 359,  503 => 358,  498 => 356,  494 => 354,  487 => 352,  481 => 349,  475 => 347,  467 => 342,  462 => 340,  456 => 337,  452 => 335,  450 => 334,  447 => 333,  443 => 332,  434 => 325,  428 => 323,  422 => 321,  420 => 320,  413 => 316,  408 => 314,  337 => 245,  328 => 240,  324 => 238,  320 => 236,  318 => 235,  313 => 232,  311 => 231,  307 => 229,  278 => 202,  276 => 201,  264 => 191,  261 => 190,  140 => 72,  85 => 20,  81 => 19,  77 => 18,  71 => 16,  68 => 15,  59 => 12,  56 => 11,  48 => 8,  43 => 6,  38 => 5,  35 => 4,  30 => 1,);
    }
}
