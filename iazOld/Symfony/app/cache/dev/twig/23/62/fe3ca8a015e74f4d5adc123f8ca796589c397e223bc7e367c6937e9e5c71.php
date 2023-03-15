<?php

/* ProduitServiceBundle:Service:aproposdenous.html.twig */
class __TwigTemplate_2362fe3ca8a015e74f4d5adc123f8ca796589c397e223bc7e367c6937e9e5c71 extends Twig_Template
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

    // line 5
    public function block_meta($context, array $blocks = array())
    {
        // line 6
        echo "\t";
        $this->displayParentBlock("meta", $context, $blocks);
        echo "
\t<meta name=\"keywords\" content=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo ", Business, Innovation,Administration\"/>
\t<meta name=\"author\" content=\"Noel Kenfack\"/>
\t<meta name=\"description\" content=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo " | ";
        if (((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")) != null)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "description"), "html", null, true);
        } else {
            if (((isset($context["typearticle"]) ? $context["typearticle"] : $this->getContext($context, "typearticle")) != null)) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["typearticle"]) ? $context["typearticle"] : $this->getContext($context, "typearticle")), "description"), "html", null, true);
            }
        }
        echo "\"/>
";
    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
        // line 13
        echo "\t";
        $this->displayParentBlock("title", $context, $blocks);
        echo " - ";
        if (((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")) != null)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["typearticle"]) ? $context["typearticle"] : $this->getContext($context, "typearticle")), "nom"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "nom"), "html", null, true);
        } else {
            if (((isset($context["typearticle"]) ? $context["typearticle"] : $this->getContext($context, "typearticle")) != null)) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["typearticle"]) ? $context["typearticle"] : $this->getContext($context, "typearticle")), "nom"), "html", null, true);
            } else {
                echo "Informations à propos de l'institut";
            }
        }
    }

    // line 16
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 17
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "

<style>
.card {
  display: flex;
  margin-bottom: 30px;
  width: 100%;
  background-color: #fff;
}
.card .card-icon-top {
  font-size: 4.5rem;
  margin-top: 3rem;
}
.card .card-tags {
  color: #097d6c;
  display: inline-block;
  font-weight: 700;
  margin-bottom: 1rem;
}
.card .card-tags:before {
  content: \"\";
  background-color: #097d6c;
  width: 0.75em;
  height: 0.75em;
  border-radius: 100%;
  display: inline-block;
  margin-right: 0.5rem;
}
.card .card-date {
  display: inline-block;
  padding-bottom: 1rem;
}
.card .card-title {
  color: #212529;
  display: block;
  font-weight: 700;
  font-size: 1.5rem;
  line-height: 1.33333;
  margin-bottom: 1rem;
}
.card .card-title:last-child {
  margin-bottom: 0;
}
.card .card-label {
  color: #212529;
  display: block;
  font-size: 1.5rem;
  line-height: 1.33333;
  font-weight: 700;
}
.card .card-body {
  padding: 2rem 2rem 2rem 2rem;
  align-self: center;
  width: 100%;
}
.card .card-body .popover-wrapper.right {
  position: absolute;
  right: 0;
}
.card .card-metadata {
  min-width: 10rem;
}
.card .card-footer {
  border-top: none;
  padding: 0 2rem 2rem 2rem;
  background-color: inherit;
  display: flex;
  align-items: center;
}
.card .card-footer .vfi {
  color: #097d6c;
  font-size: 2.5rem;
  padding-left: 0.5rem;
}
.card .vfi {
  color: #097d6c;
}
.card > a {
  border-bottom: none;
  color: #637381;
  display: flex;
  flex-direction: column;
  height: 100%;
}
.card > a:hover,
.card > a:active {
  color: #fff;
  background: #097d6c;
  text-decoration: none;
}
.card > a:hover .card-title,
.card > a:hover .card-icon-top,
.card > a:hover .card-footer .vfi,
.card > a:hover .card-tags,
.card > a:active .card-title,
.card > a:active .card-icon-top,
.card > a:active .card-footer .vfi,
.card > a:active .card-tags {
  color: #fff;
}
.card > a:hover .text-muted,
.card > a:active .text-muted {
  color: #fff !important;
}
.card > a:hover .card-tags:before,
.card > a:active .card-tags:before {
  background-color: #fff;
}
.card2 {
  -webkit-transition: all 100ms ease-in-out;
  transition: all 100ms ease-in-out;
  border: none;
  -webkit-box-shadow: 0 1px 7px rgba(0, 0, 0, 0.05);
  box-shadow: 0 1px 7px rgba(0, 0, 0, 0.05);
}
.card2:hover {
  transform: scale(1.04);
  border: none;
}
.card2 > a:hover,
.card2 > a:active {
  color: inherit;
  background: #fff;
  text-decoration: none;
}
.card2 > a:hover .card-icon-top,
.card2 > a:hover .card-footer .vfi,
.card2 > a:hover .card-tags,
.card2 > a:active .card-icon-top,
.card2 > a:active .card-footer .vfi,
.card2 > a:active .card-tags {
  color: inherit;
}
.card2 > a:hover .card-title,
.card2 > a:active .card-title {
  color: #097d6c;
}
.card2 > a:hover .text-muted,
.card2 > a:active .text-muted {
  color: #fff !important;
}
.card2 > a:hover .card-tags:before,
.card2 > a:active .card-tags:before {
  background-color: #fff;
}
.card3 {
  -webkit-transition: all 200ms ease-in-out;
  transition: all 200ms ease-in-out;
}
.card3:hover {
  border: 1px solid #0cb097;
}
.card3 > a:hover,
.card3 > a:active {
  color: inherit;
  background: #fff;
  text-decoration: none;
}
.card3 > a:hover .card-icon-top,
.card3 > a:hover .card-footer .vfi,
.card3 > a:hover .card-tags,
.card3 > a:active .card-icon-top,
.card3 > a:active .card-footer .vfi,
.card3 > a:active .card-tags {
  color: inherit;
}
.card3 > a:hover .card-title,
.card3 > a:active .card-title {
  color: #212529;
}
.card3 > a .card-icon-top,
.card3 > a .card-icon-top {
  -webkit-transition: all 200ms ease-in-out;
  transition: all 200ms ease-in-out;
}
.card3 > a:hover .card-icon-top,
.card3 > a:active .card-icon-top {
  transform: scale(1.4);
}
.card3 > a:hover .text-muted,
.card3 > a:active .text-muted {
  color: #fff !important;
}
.card3 > a:hover .card-tags:before,
.card3 > a:active .card-tags:before {
  background-color: #fff;
}
.card4 {
  -webkit-transition: all 200ms ease-in-out;
  transition: all 200ms ease-in-out;
  border: 0;
  -webkit-box-shadow: 0 1px 7px rgba(0, 0, 0, 0.05);
  box-shadow: 0 1px 7px rgba(0, 0, 0, 0.05);
}
.card4 > a:hover,
.card4 > a:active {
  background: #ffffff;
  color: inherit;
  text-decoration: none;
  cursor: url(https://dl.dropbox.com/s/2nmb5ja0g888q8n/arrow.png) 0 0, auto;
}
.card4 > a:hover:before,
.card4 > a:active:before {
  content: \"\";
  display: block;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.3);
  position: absolute;
}
.card4 > a:hover .card-icon-top,
.card4 > a:hover .card-footer .vfi,
.card4 > a:hover .card-tags,
.card4 > a:active .card-icon-top,
.card4 > a:active .card-footer .vfi,
.card4 > a:active .card-tags {
  color: inherit;
}
.card4 > a:hover .card-title,
.card4 > a:active .card-title {
  color: #212529;
}
.card4 > a .card-icon-top,
.card4 > a .card-icon-top {
  -webkit-transition: all 200ms ease-in-out;
  transition: all 200ms ease-in-out;
}
.card4 > a:hover .text-muted,
.card4 > a:active .text-muted {
  color: #fff !important;
}
.card4 > a:hover .card-tags:before,
.card4 > a:active .card-tags:before {
  background-color: #fff;
}
.card.card-row-layout .card-body {
  text-align: left;
}
@media (min-width: 992px) {
  .card.card-row-layout {
    flex-direction: row;
    align-items: center;
  }
  .card.card-row-layout .card-icon-top {
    margin-top: 0;
    margin-left: 2rem;
  }
  .card.card-row-layout .card-icon-top.card-icon-right {
    order: 100;
    margin-right: 2rem;
  }
  .card.card-row-layout .card-body {
    text-align: left;
  }
  .card.card-row-layout .card-footer {
    padding: 2rem;
  }
  .card.card-row-layout .card-footer .vfi {
    font-size: 3.6rem;
  }
  .card.card-row-layout > a {
    flex-direction: row;
    align-items: center;
    width: 100%;
  }
}
.card.card-large .card-title,
.card.card-featured .card-title {
  color: #212529;
  display: block;
  font-weight: 700;
  font-size: 1.5rem;
  line-height: 1.33333;
}
.card.card-large .card-body,
.card.card-featured .card-body {
  text-align: left;
}
@media (min-width: 992px) {
  .card.card-fw .card-img-top {
    margin-left: 1rem;
    max-width: 300px;
    order: 100;
  }
}
.card.card-large.card-row-layout .card-body {
  text-align: center;
}
@media (min-width: 992px) {
  .card.card-large.card-row-layout .card-body {
    text-align: left;
  }
}
@media (min-width: 992px) {
  .card.card-large.card-fw .card-img-top {
    margin-left: 1rem;
    max-width: 400px;
    order: 100;
  }
  .card.card-large.card-fw .vfi {
    color: #fff;
  }
}
@media (min-width: 1200px) {
  .card.card-large.card-fw .card-img-top {
    max-width: 500px;
  }
}
.card.card-featured .card-body .text-muted {
  display: inline-block;
  margin-bottom: 1.5rem;
}
.card.card-featured .card-body .card-footer {
  padding: 0;
}
@media (min-width: 992px) {
  .card.card-featured .card-img-top {
    flex: 0 0 50%;
    max-width: 50%;
    margin: 0;
    align-self: start;
  }
  .card.card-featured .card-body {
    display: flex;
    flex-flow: column nowrap;
    height: 100%;
  }
  .card.card-featured .card-body .card-footer {
    margin-top: auto;
  }
}
.card.card-label-content .card-title {
  font-weight: 700;
}
.card.card-label-content .card-label {
  font-size: 1rem;
}
.card .rounded-circle {
  margin: 2rem auto 1rem auto;
  width: 61.5%;
}
.card[data-toggle=\"modal\"] {
  cursor: pointer;
}
.cards > div,
.cards .card-item {
  display: flex;
}
.cards .card.bg-gray-sky {
  border: none;
}
.cards.bg-gray-sky {
  background-color: transparent;
}
.cards.bg-gray-sky .card {
  background-color: #f4f6f8;
  border: none;
}
.cards.bg-gray-sky .card .vfi {
  color: #097d6c;
}
.cards.bg-gray-sky .card a:hover .vfi {
  color: #fff;
}
.cards.cards-bs-grid {
  display: flex;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
}
.cards.cards-bs-grid .card-item {
  position: relative;
  width: 100%;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
  flex: 0 0 100%;
  max-width: 100%;
}
@media (min-width: 768px) {
  .cards.cards-bs-grid .card-item {
    flex: 0 0 50%;
    max-width: 50%;
  }
}
@media (min-width: 992px) {
  .cards.cards-bs-grid .card-item {
    flex: 0 0 33.33333%;
    max-width: 33.33333%;
  }
}
</style>
";
    }

    // line 411
    public function block_userblog_body($context, array $blocks = array())
    {
        // line 412
        echo "
<link rel=\"stylesheet\" href=\"";
        // line 413
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/css/jquery.expandable.css"), "html", null, true);
        echo "\">
<script type=\"text/javascript\" src=\"";
        // line 414
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/js/jquery.expandable.js"), "html", null, true);
        echo "\"></script>
<style>
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



.welcome_area_thumb .video_btn .video-sonar::before {
    position: absolute;
    width: 90px;
    height: 90px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.7);
    content: '';
    top: -15px;
    left: -15px;
    z-index: -100;
}

.welcome_area_thumb .video_btn .video-sonar::after {
    position: absolute;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background-color: #ffffff;
    content: '';
    top: -10px;
    left: -10px;
    z-index: -50;
}
</style>

<section class=\"breadcrumb-panel\">
\t<div  style=\"display: block; background: #3565ae; box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); min-height: 100px;\">
\t<div class=\"container\">
\t<div class=\"row\">
\t<div class=\"col-md-8\">
\t\t<h2>Une Nouvelle Affaire</h2>\t
\t\t<div>Des idée que personne ne peut renier</div>\t
\t</div>
\t<div class=\"col-md-4\">
\t\t<div class=\"welcome_area_thumb text-right\" style=\"margin-top: 15px;\"><img src=\"";
        // line 471
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/hero-2.png"), "html", null, true);
        echo "\" alt=\"\" style=\"height: 100px;\"/><a class=\"video_btn\" href=\"https://www.youtube.com/watch?v=YLtFGWVWiGo\" style=\"width: 60px; height: 60px;\"><i class=\"lni-play\" style=\"line-height: 60px;\"></i><span class=\"video-sonar\"></span></a></div>
\t</div>
    </div>
    </div>
\t</div>
</section>

<div class=\"breadcrumb-panel\" style=\"margin-top: 10px;\">
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
        // line 490
        if ($this->env->getExtension('TwigExtensions')->is_mobile()) {
            // line 491
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


";
            // line 509
            if (((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")) != null)) {
                // line 510
                echo "<li class=\"c-navigation-breadcrumbs__item\" property=\"itemListElement\" typeof=\"ListItem\">
  <a class=\"c-navigation-breadcrumbs__link\" href=\"#!\" property=\"item\" typeof=\"WebPage\">
\t<span property=\"name\">";
                // line 512
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["typearticle"]) ? $context["typearticle"] : $this->getContext($context, "typearticle")), "nom"), "html", null, true);
                echo "</span>
  </a>
  <meta property=\"position\" content=\"2\">
</li>

<li class=\"c-navigation-breadcrumbs__item\" property=\"itemListElement\" typeof=\"ListItem\">
  <a class=\"c-navigation-breadcrumbs__link\" href=\"#!\" property=\"item\" aria-current=\"location\">
\t<span property=\"name\">";
                // line 519
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "nom"), "html", null, true);
                echo "</span>
  </a>
  <meta property=\"position\" content=\"3\">
</li>
";
            } else {
                // line 524
                echo "\t";
                if (((isset($context["typearticle"]) ? $context["typearticle"] : $this->getContext($context, "typearticle")) != null)) {
                    // line 525
                    echo "
\t\t<li class=\"c-navigation-breadcrumbs__item\" property=\"itemListElement\" typeof=\"ListItem\">
\t\t  <a class=\"c-navigation-breadcrumbs__link\" href=\"#!\" property=\"item\" aria-current=\"location\">
\t\t\t<span property=\"name\">";
                    // line 528
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["typearticle"]) ? $context["typearticle"] : $this->getContext($context, "typearticle")), "nom"), "html", null, true);
                    echo "</span>
\t\t  </a>
\t\t  <meta property=\"position\" content=\"3\">
\t\t</li>
\t\t
\t";
                } else {
                    // line 534
                    echo "\t
\t\t<li class=\"c-navigation-breadcrumbs__item\" property=\"itemListElement\" typeof=\"ListItem\">
\t\t  <a class=\"c-navigation-breadcrumbs__link\" href=\"#!\" property=\"item\" aria-current=\"location\">
\t\t\t<span property=\"name\">Informations à propos de l'institut</span>
\t\t  </a>
\t\t  <meta property=\"position\" content=\"3\">
\t\t</li>
\t\t
\t";
                }
            }
            // line 544
            echo "</ol>
</div>
";
        } else {
            // line 547
            echo "<div class=\"col-md-12\">
<div style=\"padding: 20px 0px;\">
\t";
            // line 549
            $this->env->loadTemplate("GeneralTemplateBundle:Menu:contacts.html.twig")->display($context);
            // line 550
            echo "\t<ul class=\"breadcrumbs\">
\t  <li><a href=\"#\"><span class=\"fa fa-home\"></span> Accueil</a></li>
\t\t<li><a href=\"#!\">L'Institut</a></li>
\t\t
\t\t";
            // line 554
            if (((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")) != null)) {
                // line 555
                echo "\t\t<li><a href=\"#!\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["typearticle"]) ? $context["typearticle"] : $this->getContext($context, "typearticle")), "nom"), "html", null, true);
                echo "</a></li>
\t\t<li>";
                // line 556
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "nom"), "html", null, true);
                echo "</li>
\t\t
\t\t";
            } else {
                // line 559
                echo "\t\t\t";
                if (((isset($context["typearticle"]) ? $context["typearticle"] : $this->getContext($context, "typearticle")) != null)) {
                    // line 560
                    echo "\t\t\t\t<li>";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["typearticle"]) ? $context["typearticle"] : $this->getContext($context, "typearticle")), "nom"), "html", null, true);
                    echo "</li>
\t\t\t\t
\t\t\t";
                } else {
                    // line 563
                    echo "\t\t\t\t<li>Informations à propos de l'institut</li>
\t\t\t";
                }
                // line 565
                echo "\t\t";
            }
            // line 566
            echo "\t</ul>
</div>

</div>
";
        }
        // line 571
        echo "
</div>
</div>
</div>


<div style=\"background: #f0f0f2; padding-top: 20px;\">
<div class=\"container\">
<div class=\"row\">
\t
\t";
        // line 581
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("ProduitServiceBundle:Service:menuleft"));
        echo "

\t";
        // line 583
        if (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "aproposinstitut")) {
            // line 584
            echo "\t\t";
            $this->env->loadTemplate("ProduitServiceBundle:Apropos:aproposdenous.html.twig")->display($context);
            // line 585
            echo "\t";
        } elseif (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "demarcheaz")) {
            // line 586
            echo "\t\t";
            $this->env->loadTemplate("ProduitServiceBundle:Apropos:aproposdenous.html.twig")->display($context);
            // line 587
            echo "\t";
        } elseif (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "actualite")) {
            // line 588
            echo "\t\t";
            $this->env->loadTemplate("ProduitServiceBundle:Apropos:listeactualite.html.twig")->display($context);
            // line 589
            echo "\t";
        } elseif (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "temoignage")) {
            // line 590
            echo "\t\t";
            $this->env->loadTemplate("ProduitServiceBundle:Apropos:temoignage.html.twig")->display($context);
            // line 591
            echo "\t";
        } elseif (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "avis")) {
            // line 592
            echo "\t\t";
            $this->env->loadTemplate("ProduitServiceBundle:Apropos:avisutilisateur.html.twig")->display($context);
            // line 593
            echo "\t";
        } elseif (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "evenement")) {
            // line 594
            echo "\t\t";
            $this->env->loadTemplate("ProduitServiceBundle:Apropos:evenement.html.twig")->display($context);
            // line 595
            echo "\t";
        } elseif (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "mediatheque")) {
            // line 596
            echo "\t\t";
            $this->env->loadTemplate("ProduitServiceBundle:Apropos:mediatheque.html.twig")->display($context);
            // line 597
            echo "\t";
        } elseif (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "aide")) {
            // line 598
            echo "\t\t";
            $this->env->loadTemplate("ProduitServiceBundle:Apropos:aide.html.twig")->display($context);
            // line 599
            echo "\t";
        } elseif (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "galeriephoto")) {
            // line 600
            echo "\t\t";
            $this->env->loadTemplate("ProduitServiceBundle:Apropos:galeriephoto.html.twig")->display($context);
            // line 601
            echo "\t";
        } elseif (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "planingcours")) {
            // line 602
            echo "\t\t";
            $this->env->loadTemplate("ProduitServiceBundle:Apropos:planingcours.html.twig")->display($context);
            // line 603
            echo "\t";
        }
        // line 604
        echo "</div>
</div>
</div>

";
    }

    // line 610
    public function block_srcjavascripttemplate($context, array $blocks = array())
    {
        // line 611
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/js/onvisible.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
    }

    // line 614
    public function block_javascripttemplate($context, array $blocks = array())
    {
        // line 615
        echo "
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


\$('.description2').expandable({
\theight: 200,
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
        // line 691
        if (((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")) != null)) {
            // line 692
            echo "\topenArticleOverlay(";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "id"), "html", null, true);
            echo ");
";
        }
    }

    public function getTemplateName()
    {
        return "ProduitServiceBundle:Service:aproposdenous.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  883 => 692,  881 => 691,  803 => 615,  800 => 614,  793 => 611,  790 => 610,  782 => 604,  779 => 603,  776 => 602,  773 => 601,  770 => 600,  767 => 599,  764 => 598,  761 => 597,  758 => 596,  755 => 595,  752 => 594,  749 => 593,  746 => 592,  743 => 591,  740 => 590,  737 => 589,  734 => 588,  731 => 587,  728 => 586,  725 => 585,  722 => 584,  720 => 583,  715 => 581,  703 => 571,  696 => 566,  693 => 565,  689 => 563,  682 => 560,  679 => 559,  673 => 556,  668 => 555,  666 => 554,  660 => 550,  658 => 549,  654 => 547,  649 => 544,  637 => 534,  628 => 528,  623 => 525,  620 => 524,  612 => 519,  602 => 512,  598 => 510,  596 => 509,  576 => 491,  574 => 490,  552 => 471,  492 => 414,  488 => 413,  485 => 412,  482 => 411,  85 => 17,  82 => 16,  65 => 13,  62 => 12,  48 => 9,  43 => 7,  38 => 6,  35 => 5,  30 => 1,);
    }
}
