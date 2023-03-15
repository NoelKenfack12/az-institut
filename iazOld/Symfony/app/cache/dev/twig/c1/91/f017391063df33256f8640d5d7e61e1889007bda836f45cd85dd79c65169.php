<?php

/* UsersUserBundle:Security:accueilsite.html.twig */
class __TwigTemplate_c191f017391063df33256f8640d5d7e61e1889007bda836f45cd85dd79c65169 extends Twig_Template
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
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo " | Inscription | Cameroun | ";
        echo twig_escape_filter($this->env, (isset($context["metier"]) ? $context["metier"] : $this->getContext($context, "metier")), "html", null, true);
        echo "\"/>
";
    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        // line 10
        echo "\t";
        $this->displayParentBlock("title", $context, $blocks);
        echo " | Accueil
";
    }

    // line 13
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 14
        echo "\t";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
\t<style>
\t.card{
\t  background: -webkit-linear-gradient(to left, #16A085, #F4D03F);background: linear-gradient(to left, #00c6d7, #052963);
\t  border: 2px solid #fff;
\t  margin-bottom: 7px;
\t  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
\t  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
\t}
\t.card:hover{
\tbox-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
\t}
\t</style>
";
    }

    // line 28
    public function block_userblog_body($context, array $blocks = array())
    {
        // line 29
        echo "
<div class=\"container\" style=\"margin-top: 7px;\">

<link rel=\"stylesheet\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/test/css/style.css"), "html", null, true);
        echo "\">
\t<style>
\t\t.silder_intro {
\t\t  display: block;
\t\t  position: absolute;
\t\t  right: 0px!important;
\t\t  top: 0px!important;
\t\t  z-index: 9;
\t\t  width: 400px;
\t\t  height: 400px;
\t\t  padding: 25px 15px;
\t\t  overflow: hidden;
\t\t  background: rgba(0, 0, 0, .8);
\t\t  color: #f0f0f0;
\t\t  padding-left: 20px;
\t\t  box-shadow: 0 0 5px 0 #ddd;
\t\t  border-radius: 2px;
\t\t  text-indent: 0;
\t\t  text-decoration: none;
\t\t}
\t\t.silder_intro:hover{
\t\t\tcolor: #fff;
\t\t}
\t\t.img-slide-lg{
\t\t\theight: 400px;
\t\t}
\t</style>
<section class=\"diaporama-accueil\" style=\"\">
\t<div id=\"panel-slide-size\" style=\"padding: 5px; margin: 0px; box-shadow:0px 0px 2px rgba(0,0,0,0.1); background: #fff;\">\t
\t<div>
\t\t<div class=\"slider_box\" style=\"height: 400px;\">
\t\t\t<!-- slide & description -->
\t\t\t<div class=\"silder_con\">

\t\t\t  ";
        // line 66
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_slide"]) ? $context["liste_slide"] : $this->getContext($context, "liste_slide")));
        foreach ($context['_seq'] as $context["_key"] => $context["slide"]) {
            // line 67
            echo "\t\t\t  <div class=\"silder_panel\">
\t\t\t\t<a href=\"#\" class=\"silder_panel_item\">
\t\t\t\t  <img src=\"";
            // line 69
            if (($this->getAttribute((isset($context["slide"]) ? $context["slide"] : $this->getContext($context, "slide")), "src") != null)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["slide"]) ? $context["slide"] : $this->getContext($context, "slide")), "getwebpath")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/1.jpg"), "html", null, true);
            }
            echo "\" class=\"img-slide-lg\"/>
\t\t\t\t</a>
\t\t\t\t<a href=\"";
            // line 71
            if (($this->getAttribute((isset($context["slide"]) ? $context["slide"] : $this->getContext($context, "slide")), "link") != null)) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["slide"]) ? $context["slide"] : $this->getContext($context, "slide")), "link"), "html", null, true);
            } else {
                echo "#!";
            }
            echo "\" class=\"silder_intro\">
\t\t\t\t  <div class=\"silder_intro_content\">
\t\t\t\t\t<h2>";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["slide"]) ? $context["slide"] : $this->getContext($context, "slide")), "titre"), "html", null, true);
            echo "</h2>
\t\t\t\t\t<div>";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["slide"]) ? $context["slide"] : $this->getContext($context, "slide")), "description"), "html", null, true);
            echo "</div>
\t\t\t\t  </div>
\t\t\t\t</a>
\t\t\t  </div>
\t\t\t  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slide'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "
\t\t\t</div>
\t\t\t<!-- contorl nav (created by JS)-->
\t\t\t<div class=\"silder_nav_mask\"></div>
\t\t\t<div class=\"silder_nav\"></div>
\t\t</div>
\t</div>

\t<script src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/test/js/slides.js"), "html", null, true);
        echo "\"></script>
\t</div>

<!--Adding demo page css file -->
<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("hometemplate/css/demo-page-styles.css"), "html", null, true);
        echo "\">
<!--Adding plugin css file -->
<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("hometemplate/css/breaking-news-ticker.css"), "html", null, true);
        echo "\">

\t<!-- DEMO1 HTML STARTS HERE *-->
\t<!-- *********************** -->
\t<div class=\"breaking-news-ticker\" id=\"newsTicker1\">
\t\t<div class=\"bn-label\"><span class=\"fa fa-bullhorn\"></span> Flash</div>
\t\t<div class=\"bn-news\">
\t\t\t<ul>
\t\t\t\t";
        // line 101
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_actualite"]) ? $context["liste_actualite"] : $this->getContext($context, "liste_actualite")));
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
            // line 102
            echo "\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_detail_actualite", array("id" => $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
            echo ". ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "nom"), "html", null, true);
            echo "</a></li>
\t\t\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
        echo "\t\t\t</ul>
\t\t</div>
\t\t<div class=\"bn-controls\">
\t\t\t<button><span class=\"bn-arrow bn-prev\"></span></button>
\t\t\t<button><span class=\"bn-action\"></span></button>
\t\t\t<button><span class=\"bn-arrow bn-next\"></span></button>
\t\t</div>
\t</div>
\t<!-- *********************** -->
\t<!-- DEMO1 HTML END HERE *** -->


<script src=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("hometemplate/js/breaking-news-ticker.min.js"), "html", null, true);
        echo "\"></script>

<script type=\"text/javascript\">
\tjQuery(document).ready(function(\$){

\t\t\$('#newsTicker1').breakingNews();
\t});
</script>
\t\t

</div>
</section>


<style>
.list-group .list-group-item {
  padding-left: 0;
  padding-right: 0;
  border: 1px dashed #e1e3ea;
  border-width: 1px 0;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.list-group .list-group-item:hover {
  padding-left: 10px;
}
.list-group .list-group-item:first-child {
  border-radius: 0;
}
.list-group .list-group-item:last-child {
  border-radius: 0;
}

</style>

<div style=\"background: #f5f5f5;\">
<div class=\"container\">
\t<style>
\t\t.main-offert {
\t\t  width: 100%;
\t\t  height: auto;;
\t\t  padding: 15px 10px;
\t\t  background: #fff;
\t\t  border-radius: 4px;
\t\t  margin-bottom: 7px;
\t\t  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
\t\t  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
\t\t  -webkit-transition: transform 200ms ease-in-out;
\t\t\t-moz-transition: transform 200ms ease-in-out;
\t\t\t-o-transition: transform 200ms ease-in-out;
\t\t\ttransition: 200ms ease-in-out;
\t\t}
\t\t
\t\t.main-offert:hover{
\t\t\tborder-color: transparent;
\t\t\ttransform: translateY(-5px);
\t\t\tbox-shadow: 0 .5rem 1rem rgba(0,0,0,0.15);
\t\t\tcursor: pointer;
\t\t}

\t\t.timeline {
\t\t  padding: 5px 45px;
\t\t}
\t\t.timeline ul {
\t\t  position: relative;
\t\t}
\t\t.timeline ul::before {
\t\t  content: '';
\t\t  position: absolute;
\t\t  top: 0;
\t\t  left: 0;
\t\t  height: 100%;
\t\t}
\t\t.timeline li {
\t\t  position: relative;
\t\t  margin: 60px 35px;
\t\t  width: 100%;
\t\t  list-style: none;
\t\t  line-height: 25px;
\t\t}
\t\t.timeline li > span {
\t\t  content: '';
\t\t  position: absolute;
\t\t  top: 0;
\t\t  left: 0;
\t\t  left: -25px;
\t\t  height: 110%;
\t\t  border: 2px solid #2E4A62;
\t\t  border-radius: none;
\t\t}
\t\t.timeline li > span::before, .timeline li > span::after {
\t\t  content: '';
\t\t  position: absolute;
\t\t  top: 0;
\t\t  left: 0;
\t\t  width: 14px;
\t\t  height: 14px;
\t\t  border: 3px solid #fd784b;
\t\t  border-radius: 50%;
\t\t  left: -7px;
\t\t  background: #4e9bfa;
\t\t}
\t\t.timeline li > span::before {
\t\t  top: -15px;
\t\t}
\t\t.timeline li > span::after {
\t\t  top: 100%;
\t\t}
\t\t.timeline li div:nth-child(2) {
\t\t  font-size: 1.2em;
\t\t}
\t\t.timeline li div:nth-child(3), .timeline li div:nth-child(4) {
\t\t  font-size: 1em;
\t\t  font-style: italic;
\t\t  color: #bfbfbf;
\t\t}
\t\t.timeline li .year span {
\t\t  position: absolute;
\t\t  font-size: 1em;
\t\t  left: -85px;
\t\t  width: 40px;
\t\t  text-align: right;
\t\t}
\t\t.timeline li .year span:first-child {
\t\t  top: -20px;
\t\t}
\t\t.timeline li .year span:last-child {
\t\t  top: 100%;
\t\t}
\t\t
\t\t.az-btn-default {
\t\t\tmin-width: 84px;
\t\t\theight: 34px;
\t\t\tfont-family: OpenSans-Bold;
\t\t\tfont-size: 11px;
\t\t\ttext-align: center;
\t\t\tcolor: #030303;
\t\t\tbackground: linear-gradient(#FFFFFF,#E6E6E6);
\t\t\tborder: 1px solid #CDCDCD;
\t\t\tborder-radius: 3px;
\t\t\tdisplay: inline-block;
\t\t\tpadding: 7px 15px!important;
\t\t}
\t\t.bn-label{
\t\t\tbackground-color: #092759!important;
\t\t}
\t\t.breaking-news-ticker{
\t\t\tborder: solid 1px #092759!important;
\t\t}
\t\t
\t\t.card-with-transparent-card-block{
\t\t\twidth: 100%; background: #fff; min-height: 455px; 
\t\t\tbox-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
\t\t  padding: 7px; border-radius: 4px;
\t\t  transition: all 0.3s cubic-bezier(.25,.8,.25,1); 
\t\t  -webkit-transition: transform 200ms ease-in-out;
\t\t\t-moz-transition: transform 200ms ease-in-out;
\t\t\t-o-transition: transform 200ms ease-in-out;
\t\t\ttransition: 200ms ease-in-out;
\t\t}
\t\t.card-with-transparent-card-block:hover{
\t\t\tborder-color: transparent;
\t\t\ttransform: translateY(-5px);
\t\t\tbox-shadow: 0 .5rem 1rem rgba(0,0,0,0.15);
\t\t\tcursor: pointer;
\t\t}
\t\t.card-application{
\t\t\tpadding: 20px 7px 1px 7px; background: #fff; margin-top: 7px; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
\t\t  padding: 7px; border-radius: 4px;
\t\t  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
\t\t  -webkit-transition: transform 200ms ease-in-out;
\t\t\t-moz-transition: transform 200ms ease-in-out;
\t\t\t-o-transition: transform 200ms ease-in-out;
\t\t\ttransition: 200ms ease-in-out;
\t\t}
\t\t.card-application:hover{
\t\t\tborder-color: transparent;
\t\t\ttransform: translateY(-5px);
\t\t\tbox-shadow: 0 .5rem 1rem rgba(0,0,0,0.15);
\t\t\tcursor: pointer;
\t\t}
\t</style>

";
        // line 302
        $context["formationdiplome"] = null;
        // line 303
        $context["formationcontinue"] = null;
        // line 304
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_formation"]) ? $context["liste_formation"] : $this->getContext($context, "liste_formation")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["categorie"]) {
            // line 305
            echo "\t";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) {
                // line 306
                echo "\t\t";
                $context["formationdiplome"] = (isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie"));
                // line 307
                echo "\t";
            } else {
                // line 308
                echo "\t\t";
                $context["formationcontinue"] = (isset($context["categorie"]) ? $context["categorie"] : $this->getContext($context, "categorie"));
                // line 309
                echo "\t";
            }
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categorie'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 311
        echo "
";
        // line 312
        if (((isset($context["formationdiplome"]) ? $context["formationdiplome"] : $this->getContext($context, "formationdiplome")) != null)) {
            // line 313
            echo "<div class=\"row\">
\t<div class=\"col-md-12\">
\t\t<h2>Formations Diplomantes <a href=\"";
            // line 315
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_produit_formation_institut", array("id" => $this->getAttribute((isset($context["formationdiplome"]) ? $context["formationdiplome"] : $this->getContext($context, "formationdiplome")), "id"))), "html", null, true);
            echo "\" class=\"btn btn-primary\" style=\"float: right; color: #fff;\">Toutes les formations <span class=\"fa fa-long-arrow-right\"></span></a></h2>
\t</div>
\t<div class=\"col-md-8\">
\t\t<div class=\"row\">
\t\t";
            // line 319
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute((isset($context["formationdiplome"]) ? $context["formationdiplome"] : $this->getContext($context, "formationdiplome")), "getScatProduits"), 0, 4));
            foreach ($context['_seq'] as $context["_key"] => $context["diplome"]) {
                // line 320
                echo "\t\t<div class=\"col-md-6\">
\t\t\t<div class=\"main-offert\">
\t\t\t  <h4 style=\"margin: 0px 5px; padding: 0px;\"><a href=\"";
                // line 322
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_liste_produit_souscategorie", array("id" => $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "nom"), "html", null, true);
                echo "</a></h4>
\t\t\t  <section class=\"timeline\">
\t\t\t\t<ul>
\t\t\t\t  ";
                // line 325
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "getProduitScat"), 0, 1));
                foreach ($context['_seq'] as $context["_key"] => $context["prod"]) {
                    // line 326
                    echo "\t\t\t\t  <li>
\t\t\t\t\t<span></span>
\t\t\t\t\t<div style=\"min-height: 50px;\"> ";
                    // line 328
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "nom"), "html", null, true);
                    echo "</div>
\t\t\t\t\t<div class=\"coustom-my-text\">  ";
                    // line 329
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
                // line 337
                echo "\t\t\t\t  
\t\t\t\t</ul>
\t\t\t\t<div><a href=\"";
                // line 339
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_liste_produit_souscategorie", array("id" => $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "id"))), "html", null, true);
                echo "\">Affichez plus <span class=\"fa fa-angle-right\"></span></a></div>
\t\t\t\t<div class=\"text-center\">
\t\t\t\t<a href=\"#!\" class=\"az-btn-default commande-offer-formation\" value=\"";
                // line 341
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
            // line 349
            echo "\t\t<div class=\"col-md-12\">
\t\t\t<div style=\"box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1); background: #fff; padding: 7px; min-height: 100px; margin-bottom: 7px;\">
  
\t\t\t\t<img src=\"";
            // line 353
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/present.png"), "html", null, true);
            echo "\" alt=\"\" style=\"float: left; margin-right: 7px; height:80px;\"/>
\t\t\t\t<h2 style=\"margin: 0px;\">À propos des formations diplomantes</h2>
\t\t\t\t<div>Message à propos des formations diplômantes </div>
\t\t\t\t<a href=\"";
            // line 356
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_produit_formation_institut", array("id" => $this->getAttribute((isset($context["formationdiplome"]) ? $context["formationdiplome"] : $this->getContext($context, "formationdiplome")), "id"))), "html", null, true);
            echo "\"><span class=\"badge badge-succes\">Toutes nos formations</span></a>
\t\t\t</div>
\t\t</div>
\t\t</div>
\t</div>
\t<div class=\"col-md-4\">
\t
\t\t<div class=\"card-with-transparent-card-block\">
\t\t\t<div class=\"has-card-hover\">
\t\t\t\t<img class=\"card-img-top img-fluid\" src=\"";
            // line 365
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/present.png"), "html", null, true);
            echo "\" alt=\"Card image cap\" style=\"width: 100%;\">
\t\t\t\t<div class=\"card-hover slide-down\">
\t\t\t\t\t<div class=\"card-hover-content\">
\t\t\t\t\t\t<p>This is a short teaser to the content in the video that shows on hover.</p>
\t\t\t\t\t\t<button class=\"btn btn-primary\">I'm a button</button>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"card-block text-xxs-center\" style=\"padding: 7px;\">
\t\t\t\t<h4 class=\"card-title d-inline\" style=\"display: inline!important;\"><em>Formation en ligne</em></h4>
\t\t\t\t
\t\t\t\t<div>Suivez votre formation à distance à travers les vidéos, tutoriels, etc..</div>
\t\t\t\t<p class=\"card-text d-inline\"  style=\"display: inline!important;\"><a href=\"\">www.elearning.az...com</a></p>
\t\t\t</div>
\t\t</div>
\t\t
\t\t<div class=\"card-application\">
\t\t\t <div>Autres plateformes AZ Corporation</div>
\t\t\t <div id=\"accordion\">
\t\t\t\t<div class=\"panel list-group\">
\t\t\t\t  <!-- panel class must be in -->
\t\t\t\t  <a href=\"#web_dev\" data-parent=\"#accordion\" data-toggle=\"collapse\" class=\"list-group-item\">
\t\t\t\t\t<h4>AZ Corp Market</h4>
\t\t\t\t  </a>
\t\t\t\t  <div class=\"collapse in\" id=\"web_dev\" style=\"padding: 2px 10px;\">
\t\t\t\t\t<ul class=\"list-group-item-text\">
\t\t\t\t\t  <li>Vente des équipements informatiques</li>
\t\t\t\t\t  <li>PHP</li>
\t\t\t\t\t  <li>Wordpress</li>
\t\t\t\t\t  <li>MYSQL</li>
\t\t\t\t\t</ul>
\t\t\t\t  </div>

\t\t\t\t  <a href=\"#desktop\" data-parent=\"#accordion\" data-toggle=\"collapse\" class=\"list-group-item\" `>
\t\t\t\t\t<h4>AZ Corp Assurance</h4>
\t\t\t\t  </a>
\t\t\t\t  <div class=\"collapse\" id=\"desktop\" style=\"padding: 2px 10px;\">
\t\t\t\t\t<ul class=\"list-group-item-text\">
\t\t\t\t\t  <li>Vente des équipements informatiques</li>
\t\t\t\t\t  <li>Java</li>
\t\t\t\t\t  <li>Python</li>
\t\t\t\t\t</ul>
\t\t\t\t  </div>


\t\t\t\t  <a href=\"#mobile\" data-parent=\"#accordion\" data-toggle=\"collapse\" class=\"list-group-item\">
\t\t\t\t\t<h4>Entreprises Az Corp</h4>
\t\t\t\t  </a>
\t\t\t\t  <div class=\"collapse\" id=\"mobile\" style=\"padding: 2px 10px;\">
\t\t\t\t\t<ul class=\"list-group-item-text\">
\t\t\t\t\t  <li>Services</li>
\t\t\t\t\t  <li>IOS</li>
\t\t\t\t\t  <li>Windows</li>
\t\t\t\t\t  <li>Linux</li>
\t\t\t\t\t</ul>
\t\t\t\t  </div>
\t\t\t\t</div>
\t\t\t  </div>
\t\t</div>
\t</div>
</div>
";
        }
        // line 427
        echo "
</div>
</div>

";
        // line 431
        if (((isset($context["formationcontinue"]) ? $context["formationcontinue"] : $this->getContext($context, "formationcontinue")) != null)) {
            // line 432
            echo "<div style=\"background: #fff; padding-bottom: 15px;\">
<section class=\"section1\" style=\"box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);\">
\t<div class=\"container\">
\t<div class=\"p-t-1-xxs\" style=\"margin-top: 15px; margin-bottom: 15px;\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12 text-center\">
\t\t\t\t<h2 style=\"margin-top: 0px; color: #fff;\"><strong>Les formations continues de l'institut Az pour permettre de suivre une formation au centre à votre rithme.</strong></h2>
\t\t\t\t<div style=\"padding-top: 15px;\">
\t\t\t\t<a href=\"";
            // line 441
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_produit_formation_institut", array("id" => $this->getAttribute((isset($context["formationcontinue"]) ? $context["formationcontinue"] : $this->getContext($context, "formationcontinue")), "id"))), "html", null, true);
            echo "\" class=\"btn btn-primary\" style=\"color: #fff;\">S'inscrire</a>
\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t</div>
</section>
</div>

<div style=\"background: #fff;\">      
  <div class=\"container\">
\t  <div class=\"row\">
\t  <div class=\"col-md-12\">
\t\t<h2 style=\"margin-top: 0px; color: #333;\"><strong>Nos Formations Continues</strong> <a href=\"";
            // line 454
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_produit_formation_institut", array("id" => $this->getAttribute((isset($context["formationcontinue"]) ? $context["formationcontinue"] : $this->getContext($context, "formationcontinue")), "id"))), "html", null, true);
            echo "\" class=\"btn btn-primary\" style=\"float: right; color: #fff;\">Toutes les formations <span class=\"fa fa-long-arrow-right\"></span></a></h2>
\t  </div>
      </div>
  </div>
</div>


<div style=\"background: #fff; padding-top: 15px;\">
<div class=\"container\">
<div class=\"row\">

";
            // line 465
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute((isset($context["formationcontinue"]) ? $context["formationcontinue"] : $this->getContext($context, "formationcontinue")), "getScatProduits"), 0, 3));
            foreach ($context['_seq'] as $context["_key"] => $context["diplome"]) {
                // line 466
                echo "  <div class=\"col-md-4\">
  <div class=\"cards__item\">
    <div class=\"actu-card\">
      <div class=\"card__image card__image--fence\" style=\"background: url('";
                // line 469
                if (($this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "src") != null)) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "getwebpath")), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/assistance-bg.jpg"), "html", null, true);
                }
                echo "') no-repeat center; -webkit-background-size: cover;
\t-moz-background-size: cover;
\t-o-background-size: cover;
 \tbackground-size: cover;\"></div>
      <div class=\"card__content\" style=\"padding: 0px; min-height: 300px;\">
        <div class=\"card__title text-left\" style=\"font-size: 20px;\"><a href=\"\"><span class=\"fa fa-hand-o-right\"></span> ";
                // line 474
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "nom"), "html", null, true);
                echo "</a></div>
        <div class=\"card__text\" >
\t\t  ";
                // line 476
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "getProduitScat"), 0, 3));
                foreach ($context['_seq'] as $context["_key"] => $context["prod"]) {
                    // line 477
                    echo "\t\t  <div class=\"dropdown dropup\" style=\"margin: 1px 0px;\">
\t\t\t\t<button id=\"dropdownMenuC";
                    // line 478
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "id"), "html", null, true);
                    echo "\" class=\"btn btn-default btn-lg coustom-my-text\" style=\"width: 100%; white-space: normal; height: auto; border: none;\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t  <span class=\"fa fa-angle-right\"></span> ";
                    // line 479
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "nom"), "html", null, true);
                    echo "
\t\t\t\t</button>
\t\t\t\t<ul class=\"dropdown-menu my-panel-souscription\" aria-labelledby=\"dropdownMenuC";
                    // line 481
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "id"), "html", null, true);
                    echo "\">
\t\t\t\t  <li class=\"dropdown-header\">";
                    // line 482
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "nom"), "html", null, true);
                    echo "</li>
\t\t\t\t  <li role=\"separator\" class=\"divider\"></li>
\t\t\t\t  <li style=\"padding: 7px 15px;\">
\t\t\t\t\t<div>";
                    // line 485
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "contenu"), "html", null, true);
                    echo "</div>
\t\t\t\t  </li>
\t\t\t\t  <li style=\"padding: 7px 15px;\">
\t\t\t\t\t<div style=\"margin: 7px 0px;\"><a href=\"#!\" class=\"btn btn-default commande-offer-formation\" value=\"";
                    // line 488
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "id"), "html", null, true);
                    echo "\" name=\"fc\">S'incrire à cette formation</a></div>
\t\t\t\t\t<div style=\"margin: 7px 0px;\"><a href=\"";
                    // line 489
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_detail_produit_market", array("id" => $this->getAttribute((isset($context["prod"]) ? $context["prod"] : $this->getContext($context, "prod")), "id"))), "html", null, true);
                    echo "\" class=\"btn btn-default\">Obtenir plus d'informations</a></div>
\t\t\t\t  </li>
\t\t\t\t</ul>
\t\t  </div>
\t\t  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prod'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 494
                echo "\t\t\t\t\t  
\t\t<div style=\"margin: 10px 0px;\"><a href=\"";
                // line 495
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_liste_produit_souscategorie", array("id" => $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "id"))), "html", null, true);
                echo "\">Toutes les offres <span class=\"fa fa-angle-right\"></span></a></div>
      </div>
      </div>
    </div>
  </div>
  </div>
 ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['diplome'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 502
            echo "
</div>

</div>


<div class=\"clearfix\"></div>
</div>
";
        }
        // line 511
        echo "

<style>
.pricing-grid:nth-child(2) {
    margin: 0 1em;
}
/*Pricing table and price blocks*/ 
.price-head h3 {
\tcolor: #404042;
\tfont-size: 3em;
\ttext-decoration: none;
\tfont-weight: 700;
} 
/*----*/  
.agileinfo-price  h2,.agileinfo-price  h3{
\tfont-size: 1.5em;
\tcolor: #fff;
\tfont-weight: 300;
}
.agileinfo-price, .agileinfo-price .two, .agileinfo-price .three {
    background: #c8102e;
    padding: 0.8em 0;
    text-align: center;
}
.agileinfo-price.two{
\tbackground: #862633; 
}
.agileinfo-price.three {
\tbackground: #003a70; 
}
.agileinfo-price  ul,.pricing-grid1 ul,.pricing-grid2 ul,.pricing-grid3 ul{
\tpadding: 0;
}
.agileinfo-price  ul li,.pricing-grid1,.pricing-grid2 ul li,.pricing-grid3 ul li {
\tlist-style: none;
}
.agileinfo-price  ul li{
\tlist-style: none;
}
.agileinfo-price  h5 {
\tpadding: 11px 0;
\tfont-style: italic;
\tfont-size: 13px;
\tcolor: #F0EBEB;
}
ul.count,.pricing-grid1 ul li a,ul.count,.pricing-grid2 ul li a,ul.count,.pricing-grid3 ul li a{
\tfont-size: 15px;
\tdisplay: block;
\ttext-decoration: none;
\tfont-weight: 400;
\tpadding: 10px 20px;
}
.price-bg {
    background: #fff; 
    padding: 1.5em;
}
p.price-label-1 {
\tcolor: #c8102e;
\ttext-align: center;
\tmargin-top:1.5em;
}
p.price-label-2 {
\tcolor: #862633;
\ttext-align: center;
\tmargin-top:1.5em;
}
p.price-label-3 {
\tcolor: #003a70;
\ttext-align: center;
\tmargin-top:1.5em;
}
.price-bg p span {
    font-weight: bold;
    font-size: 2.5em;
    line-height: 0.8em;
    margin-right: 5px;
}
.price-bg p i {
\tvertical-align: super;
}
.price-bg ul {
\tpadding: 0;
\tmargin-top: 1em;
}
.price-bg ul li{
\tlist-style: none;
} 
.buy {
    padding: 1em 0 0;
    text-align: center;
}
.buy a {
    background: #c8102e; 
    font-size: 1em;
    color: #fff; 
    padding: .5em 1.5em;
    display: inline-block;
\t-webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
\t-ms-transition: 0.5s all;
\ttransition: 0.5s all;
}
.buy a:hover {  
    border: 1px solid #c8102e;
    background: none;
    color: #c8102e; 
}
.buy.buy-two a {
    background: #862633;
}
.buy.buy-two a:hover {  
    border: 1px solid #862633;
    background: none;
    color: #862633;
    font-weight: 500;
}
.buy.buy-three a {
    background: #003a70;  
}
.buy.buy-three a:hover {  
    border: 1px solid #003a70;
    background: none;
    color: #003a70;
    font-weight: 500;
} 

.custom-item-list:hover{
\tcursor: pointer;
\ttext-decoration: underline;
}
.custom-item-list:before {
\tcontent: '◊';
}
.custom-item-list-second:hover{
\tcursor: pointer;
\ttext-decoration: underline;
}
.custom-item-list-second:before {
\tcontent: '→';
}

ul.count li {
    border-bottom: 1px dashed #dadada;
    padding: 1em 0;
    text-align: left;
    color: #888;
    font-size: 1em;
    line-height: 1.8em;
    font-weight: 400;
}
a.popup-with-zoom-anim {
  outline: none; 
}
/*-- start-pricing-tabels --*/
/*-- cube shadow --*/ 
.w3ls-main {
    width: 270px; 
    position: relative;
    -webkit-perspective: 1000px;
    -moz-perspective: 1000px;
    -o-perspective: 1000px;
\t-ms-perspective: 1000px;
    perspective: 1000px;
} 
.show-front { 
\tposition: absolute;
\t-webkit-transform-style: preserve-3d;
\t-moz-transform-style: preserve-3d;
\t-o-transform-style: preserve-3d;
\ttransform-style: preserve-3d;
\t-webkit-transition: -webkit-transform 1s;
\t-moz-transition: -moz-transform 1s;
\t-o-transition: -o-transform 1s;
\ttransition: transform 1s;
\tleft:-2px;
}

.show-front figure {
    display: block;
    position: absolute;
    width: 200px;
    height: 62px;
}

.show-front.panels-backface-invisible figure {
\t-webkit-backface-visibility: hidden;
\t-moz-backface-visibility: hidden;
\t-o-backface-visibility: hidden;
\tbackface-visibility: hidden;
} 
.show-front .top    {  
\tbackground: -webkit-linear-gradient(13deg, #c8102e 0%, #c8102e 75%);
\tbackground: -moz-linear-gradient(13deg, #c8102e 0%, #c8102e 75%); 
} 
.show-front .top.top-two { 
\tbackground:-webkit-linear-gradient(33deg, #862633 0%, #862633 75%); 
\tbackground:-moz-linear-gradient(33deg, #862633 0%, #862633 75%); 
}
.show-front .top.top-three { 
\tbackground: -webkit-linear-gradient(54deg, #003a70 0%, #003a70 75%);  
\tbackground: -moz-linear-gradient(54deg, #003a70 0%, #003a70 75%);  
}

.show-front .front  {
\t-webkit-transform: translateZ( 100px );
\t-moz-transform: translateZ( 100px );
\t-o-transform: translateZ( 100px );
\t-ms-transform: translateZ( 100px );
\ttransform: translateZ( 100px );
}  
.show-front .top {
    -webkit-transform: rotateX( 103deg ) translateZ( 24px );
    -moz-transform: rotateX( 103deg ) translateZ( 24px );
    -o-transform: rotateX( 103deg ) translateZ( 24px );
\t-ms-transform: rotateX( 103deg ) translateZ( 24px );
    transform: rotateX( 103deg ) translateZ( 24px );
} 
.show-front.show-front {
\t-webkit-transform: translateZ( -63px );
\t-moz-transform: translateZ( -63px );
\t-o-transform: translateZ( -63px );
\t-ms-transform: translateZ( -63px );
\ttransform: translateZ( -63px );
} 
.show-front.show-top {
\t-webkit-transform: translateZ( -100px ) rotateX(  -90deg );
\t-moz-transform: translateZ( -100px ) rotateX(  -90deg );
\t-o-transform: translateZ( -100px ) rotateX(  -90deg );
\t-ms-transform: translateZ( -100px ) rotateX(  -90deg );
\ttransform: translateZ( -100px ) rotateX(  -90deg );
}

.agileits-shadow {
    vertical-align: middle;
    -webkit-transform: translateZ(0);
\t-moz-transform: translateZ(0); 
\t-o-transform: translateZ(0); 
\t-ms-transform: translateZ(0); 
    transform: translateZ(0); 
    -webkit-backface-visibility: hidden; 
    backface-visibility: hidden;
    -moz-osx-font-smoothing: grayscale;
    position: relative;
    -webkit-transition-duration: 0.3s;
\t-moz-transition-duration: 0.3s; 
    transition-duration: 0.3s;
    -webkit-transition-property: transform;
\t-moz-transition-property: transform; 
    transition-property: transform;
\tborder-right: 1px dashed #dadada;
}
.agileits-shadow:hover, .agileits-shadow:focus, .agileits-shadow:active {
    -webkit-transform: translateY(-5px);
\t-moz-transform: translateY(-5px);
\t-o-transform: translateY(-5px);
\t-ms-transform: translateY(-5px);
    transform: translateY(-5px);
}
.agileits-shadow:before { 
    position: absolute;
    z-index: -1;
    content: '';
    top: 94%;
    left: 5%;
    height: 48px;
    width: 90%;
    opacity: 1;
    background: -webkit-radial-gradient(center, ellipse, #191918 0%, rgba(0, 0, 0, 0) 81%);
    background: radial-gradient(ellipse at center, #191918 0%, rgba(0, 0, 0, 0) 81%);
    -webkit-transition-duration: 0.3s;
\t-moz-transition-duration: 0.3s; 
    transition-duration: 0.3s;
    -webkit-transition-property: transform, opacity;
\t-moz-transition-property: transform, opacity;
\t-o-transition-property: transform, opacity;
    transition-property: transform, opacity;
}
.agileits-shadow:hover:before, .agileits-shadow:focus:before, .agileits-shadow:active:before {
    opacity: 1;
    -webkit-transform: translateY(5px);
\t-moz-transform: translateY(5px);
\t-o-transform: translateY(5px);
\t-ms-transform: translateY(5px);
    transform: translateY(5px);
} 
a.btn:hover{
\ttext-decoration: underline!important;
\tcolor: #fff!important;
}
</style>


<style>
.wrapper {
\twidth:960px;
\tmargin:150px auto;
}
.demof {
border: 1px solid #ccc;
margin: 25px 0;
}
.demof ul {
padding: 0;
list-style: none;
}
.demof li {
padding: 20px;
border-bottom: 1px dashed #ccc;
}
.demof li.odd {
background: #fafafa;
}
.demof li:after {
content: '';
display: block;
clear: both;
}
.demof img {
float: left;
width: 177px;
margin: 5px 15px 0 0;
}
.demof a {
font-family: Arial, sans-serif;
font-size: 20px;
font-weight: bold;
color: #06f;
}
.demof p {
margin: 15px 0 0;
font-size: 14px;
}
.demo3 {
font-family: Arial, sans-serif;
border: 1px solid #C20;
margin: 50px 0;
font-style: italic;
position: relative;
padding: 0 0 0 80px;
box-shadow: 0 2px 5px -3px #000;
border-radius: 3px;
}
.demo3:before {
content: \"Latest News\";
display: inline-block;
font-style: normal;
background: #C20;
padding: 10px;
color: #FFF;
font-weight: bold;
position: absolute;
top: 0;
left: 0;
}
.demo3:after {
content: '';
display: block;
top: 0;
left: 80px;
background: linear-gradient(#FFF, rgba(255, 255, 255, 0));
height: 20px;
}
.demo3 ul li {
list-style: none;
padding: 10px 0;
}
.demo5 {
border: 2px solid #FF3333;
margin-top: 10px;
border-radius: 10px;
width: 500px;
-webkit-box-shadow: inset 0px 0px 10px 1px rgba(0, 0, 0, 0.3);
-moz-box-shadow: inset 0px 0px 10px 1px rgba(0, 0, 0, 0.3);
box-shadow: inset 0px 0px 10px 1px rgba(0, 0, 0, 0.3);
}
.demo5 ul {
padding: 0;
}
.demo5 ul li {
padding: 10px 10px 10px 10px;
border-bottom: 1px solid #FF3333;
border-radius: 10px;
list-type: none;
margin: 0;
}
.et-run {
background-color: #0cf;
color: white;
border: 1px solid black;
}
</style>
<div style=\"background: #f4f4f4; padding-top: 15px;\">      
  <div class=\"container\">
\t  <div class=\"row\">
\t  <div class=\"col-md-12\">
\t\t<h2 style=\"margin-top: 0px; color: #333;\"><strong>En ce moment sur ";
        // line 907
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo " </strong> <a href=\"";
        echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "evenement"));
        echo "\" class=\"btn btn-primary\" style=\"float: right; color: #fff;\">Tous évènements <span class=\"fa fa-long-arrow-right\"></span></a></h2>
\t  </div>
      </div>
  </div>
</div>

<div style=\"background: #f4f4f4; padding-top: 15px;\">
\t<div class=\"container o-links1\">
    <div class=\"row\">
      <div class=\"col-md-8 col-sm-12 col-xs-12\">
\t\t<div class=\"\" style=\"box-shadow: 0 0.15rem 1.75rem 0 rgba(31, 45, 65, 0.15);\">
\t\t\t<h3 class=\"text-left\" style=\"padding: 0px 7px; margin: 0px;\">Evènement <br>Blablablablabla...</h3>
\t\t</div>
\t\t<div class=\"w3ls-main\">
\t\t\t<div id=\"cube3\" class=\"show-front\"> 
\t\t\t\t<figure class=\"top top-three\"> </figure> 
\t\t\t</div>
\t\t</div>
\t\t<div class=\"price-bg\">
\t\t\t<div class=\"demo1 demof\">
\t\t\t\t<ul>
\t\t\t\t";
        // line 928
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_article"]) ? $context["liste_article"] : $this->getContext($context, "liste_article")));
        foreach ($context['_seq'] as $context["_key"] => $context["even"]) {
            // line 929
            echo "\t\t\t\t<li>
\t\t\t\t\t<img src=\"";
            // line 930
            if (($this->getAttribute((isset($context["even"]) ? $context["even"] : $this->getContext($context, "even")), "imgservice") != null)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["even"]) ? $context["even"] : $this->getContext($context, "even")), "imgservice"), "getwebpath")), "html", null, true);
            } else {
                echo "http://www.jqueryscript.net/small/images/Creating-A-Full-Page-Photo-Gallery-with-jQuery-Photor-Plugin.jpg";
            }
            echo "\" alt=\"Expandable Input\" />
\t\t\t\t\t<a href=\"";
            // line 931
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_detail_actualite", array("id" => $this->getAttribute((isset($context["even"]) ? $context["even"] : $this->getContext($context, "even")), "id"))), "html", null, true);
            echo "\">
\t\t\t\t\t";
            // line 932
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["even"]) ? $context["even"] : $this->getContext($context, "even")), "nom"), "html", null, true);
            echo "
\t\t\t\t\t</a>
\t\t\t\t\t<p>";
            // line 934
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["even"]) ? $context["even"] : $this->getContext($context, "even")), "description"), "html", null, true);
            echo "</p>
\t\t\t\t</li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['even'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 937
        echo "\t\t\t\t</ul>
\t\t\t</div> 
\t\t</div>
\t</div> 
<script src=\"";
        // line 941
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/js/jquery.easy-ticker.min.js"), "html", null, true);
        echo "\"></script> 
<script type=\"text/javascript\">
\$(function(){
\t\$('.demo1').easyTicker({
\t\tdirection: 'up',
\t\teasing: 'swing'
\t});
});
</script>
      <div class=\"col-xs-12 col-md-4\">
        <div class=\"o-links1__header\" style=\"background: #3565ae; height: 80px; padding: 7px;\">
          <h2 style=\"color: #fff;\">Réseaux sociaux</h2>
        </div>
        <div style=\"padding: 0px; margin: 0px; border: 1px solid #3565ae; width: 100%;\">
\t\t\t<div style=\"min-width: 100%;\">
\t\t\t  <div style=\"\">
\t\t\t  <div class=\"fb-page\" 
\t\t\t  data-href=\"https://www.facebook.com/AZcorpAfrica\"
\t\t\t  data-width=\"700\" 
\t\t\t  data-height=\"700\" 
\t\t\t  data-hide-cover=\"false\"
\t\t\t  data-show-facepile=\"true\" 
\t\t\t  data-show-posts=\"false\"></div>
\t\t\t  </div>
\t\t\t</div>
\t\t\t<div id=\"fb-root\"></div>
\t\t\t
\t\t\t<script>
\t\t\t(function(d, s, id) {
\t\t\t  var js, fjs = d.getElementsByTagName(s)[0];
\t\t\t  if (d.getElementById(id)) return;
\t\t\t  js = d.createElement(s); js.id = id;
\t\t\t  js.src = \"//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.9&appId=346098072408344\";
\t\t\t  fjs.parentNode.insertBefore(js, fjs);
\t\t\t  }(document, 'script', 'facebook-jssdk'));

\t\t\t  var largeur = (\$(window).width());
\t\t\t\tif (largeur < 768)
\t\t\t\t{
\t\t\t\t\t\$('.nos-services').css('height','2450px');
\t\t\t\t\t\$('.autres-applications').css('height','1500px');
\t\t\t\t}else{
\t\t\t\t\t\$('.nos-services').css('height','980px');
\t\t\t\t\t\$('.autres-applications').css('height','420px');
\t\t\t\t}

\t\t\t</script>
\t\t\t
\t\t\t<div style=\"height: 400px; overflow: auto;\">
\t\t\t\t<a class=\"twitter-timeline\" href=\"https://twitter.com/gaielbleriot?ref_src=twsrc%5Etfw\">Tweets by afh_host</a> <script async src=\"https://platform.twitter.com/widgets.js\" charset=\"utf-8\"></script>
\t\t\t</div>
        </div>


      </div>
    </div>
  </div>
</div>

";
    }

    // line 1002
    public function block_srcjavascripttemplate($context, array $blocks = array())
    {
        // line 1003
        echo "
";
    }

    // line 1006
    public function block_javascripttemplate($context, array $blocks = array())
    {
        // line 1007
        echo "\t\$('.page-item-8').addClass('current-active');
\t
\t\$('.mydiv').hover(function(){
\t\t\$(this).find('span').show('slow');
\t});
\t\$('.mydiv').bind('mouseleave.dragged',function(){
\t\t\$(this).find('span').hide('slow');
\t});
";
    }

    public function getTemplateName()
    {
        return "UsersUserBundle:Security:accueilsite.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1351 => 1007,  1348 => 1006,  1343 => 1003,  1340 => 1002,  1276 => 941,  1270 => 937,  1261 => 934,  1256 => 932,  1252 => 931,  1244 => 930,  1241 => 929,  1237 => 928,  1211 => 907,  813 => 511,  802 => 502,  789 => 495,  786 => 494,  775 => 489,  771 => 488,  765 => 485,  759 => 482,  755 => 481,  750 => 479,  746 => 478,  743 => 477,  739 => 476,  734 => 474,  722 => 469,  717 => 466,  713 => 465,  699 => 454,  683 => 441,  672 => 432,  670 => 431,  664 => 427,  599 => 365,  587 => 356,  581 => 353,  575 => 349,  561 => 341,  556 => 339,  552 => 337,  538 => 329,  534 => 328,  530 => 326,  526 => 325,  518 => 322,  514 => 320,  510 => 319,  503 => 315,  499 => 313,  497 => 312,  494 => 311,  479 => 309,  476 => 308,  473 => 307,  470 => 306,  467 => 305,  450 => 304,  448 => 303,  446 => 302,  257 => 116,  243 => 104,  222 => 102,  205 => 101,  194 => 93,  189 => 91,  182 => 87,  172 => 79,  161 => 74,  157 => 73,  148 => 71,  139 => 69,  135 => 67,  131 => 66,  94 => 32,  89 => 29,  86 => 28,  67 => 14,  64 => 13,  57 => 10,  54 => 9,  46 => 6,  41 => 4,  36 => 3,  33 => 2,);
    }
}
