<?php

/* UsersUserBundle:Security:accueilsite.html.twig */
class __TwigTemplate_1136462dd1af8ac9aa371db48cc07fdef10b0d4d2a48b7aa28ce0946b857271e extends Twig_Template
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
            'srcjavascripttemplate' => array($this, 'block_srcjavascripttemplate'),
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

    // line 9
    public function block_title($context, array $blocks = array())
    {
        // line 10
        $this->displayParentBlock("title", $context, $blocks);
        echo " | Accueil
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
        echo "<div id=\"headerwrap\" style=\"background: #428bca;\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row\" style=\"padding: 0px; margin: 0px;\">
\t\t\t\t<div class=\"col-lg-6\">
\t\t\t\t\t<h1>Az E-learning<br/>
\t\t\t\t\tConnexion.</h1>
\t\t\t\t\t<form action=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" class=\"form-inline\" method=\"post\">
\t\t\t\t\t  <div class=\"form-group\">
\t\t\t\t\t    <input type=\"email\" placeholder=\"E-mail\" id=\"username\" name=\"_username\" required class=\"form-control\">
\t\t\t\t\t    <input type=\"password\" placeholder=\"Mot de passe\" id=\"password\" name=\"_password\" required class=\"form-control\" style=\"margin-top: 15px; \">
\t\t\t\t\t  </div>
\t\t\t\t\t  <div style=\"margin-top: 15px;\">
\t\t\t\t\t\t<a class=\"news-letter \" href=\"#\" style=\"color: #fff;\">
\t\t\t\t\t\t <label class=\"checkbox1\"><input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" checked /><i> </i>Garder ma session ouverte</label>
\t\t\t\t\t   </a>
\t\t\t\t\t  </div>
\t\t\t\t\t  <div style=\"margin-top: 15px;\">
\t\t\t\t\t  <button type=\"submit\" class=\"btn btn-warning btn-lg\">Connexion </button>
\t\t\t\t\t  </div>
\t\t\t\t\t</form>

\t\t\t\t<div style=\"margin-top: 15px;\"><a href=\"";
        // line 39
        echo $this->env->getExtension('routing')->getPath("users_user_inscription_user");
        echo "\" class=\"btn btn-primary\">Inscription gratuite <span class=\"fa fa-angle-double-right\"></span></a></div>
\t\t\t\t</div><!-- /col-lg-6 -->
\t\t\t\t<div class=\"col-lg-6\">
\t\t\t\t\t<img class=\"img-responsive\" src=\"";
        // line 42
        if (((isset($context["slideaccueil"]) ? $context["slideaccueil"] : $this->getContext($context, "slideaccueil")) != null)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["slideaccueil"]) ? $context["slideaccueil"] : $this->getContext($context, "slideaccueil")), "getwebpath")), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/img/ipad-hand.png"), "html", null, true);
        }
        echo "\" alt=\"\">
\t\t\t\t</div><!-- /col-lg-6 -->
\t\t\t\t
\t\t\t</div><!-- /row -->
\t\t</div><!-- /container -->
\t</div><!-- /headerwrap -->
\t
\t
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
        // line 62
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_formation"]) ? $context["liste_formation"] : $this->getContext($context, "liste_formation")));
        foreach ($context['_seq'] as $context["_key"] => $context["formation"]) {
            // line 63
            echo "<!-- blog card -->
<div class=\"col s12 m12 l4\">
\t<div class=\"blog-card\" >
\t<div class=\"card\">
\t\t<div class=\"card-image waves-effect waves-block waves-light\" style=\"background: #f2f2f2;\">
\t\t\t<a href=\"#!\"><img src=\"";
            // line 68
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
            // line 73
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_assistance_entreprise", array("id" => $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "id"))), "html", null, true);
            echo "\" class=\"btn waves-effect waves-light indigo pull-right\">En savoir plus <span class=\"mdi-av-play-circle-fill\" style=\"margin-top: -7px; font-size: 15px;\"></span></a>
\t\t</div>
\t\t<div class=\"card-content\" style=\"border-top: 1px solid #ddd; padding-top: 0px; padding-bottom: 0px;\">
\t\t\t<h4 class=\"card-title grey-text text-darken-4\" style=\"margin-top: 0px; padding-top: 0px;\">
\t\t\t<a href=\"";
            // line 77
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
            // line 93
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_assistance_entreprise", array("id" => $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "nom"), "html", null, true);
            echo "</a></span>
\t\t\t<p>";
            // line 94
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
        // line 100
        echo "</div>

<div style=\"text-align: center;\">
<a href=\"";
        // line 103
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
        // line 125
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_formateur"]) ? $context["liste_formateur"] : $this->getContext($context, "liste_formateur")));
        foreach ($context['_seq'] as $context["_key"] => $context["formateur"]) {
            // line 126
            echo "\t\t\t<li>
\t\t\t\t<div class=\"item\" style=\"margin-right: 5px; margin-left: 5px;\">
\t\t\t\t\t<div class=\"col-lg-12\">
\t\t\t\t\t\t<img class=\"img-circle img-thumbnail\" src=\"";
            // line 129
            if (($this->getAttribute((isset($context["formateur"]) ? $context["formateur"] : $this->getContext($context, "formateur")), "imgprofil") != null)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["formateur"]) ? $context["formateur"] : $this->getContext($context, "formateur")), "imgprofil"), "getWebpath")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.png"), "html", null, true);
            }
            echo "\" style=\"width: 140px; height: 140px;\"  alt=\"\">
\t\t\t\t\t\t<h4><a href=\"";
            // line 130
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_user_user_accueil", array("id" => $this->getAttribute((isset($context["formateur"]) ? $context["formateur"] : $this->getContext($context, "formateur")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formateur"]) ? $context["formateur"] : $this->getContext($context, "formateur")), "name", array(0 => 30), "method"), "html", null, true);
            echo "</a></h4>
\t\t\t\t\t\t<p>";
            // line 131
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
        // line 137
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
        // line 169
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/js/jquery.flexisel.js"), "html", null, true);
        echo "\"></script>
\t
\t<div style=\"text-align: center;\">
\t<a href=\"";
        // line 172
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
        // line 189
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
            // line 190
            echo "\t\t\t<div class=\"col-md-3 photoday-grid\">
\t\t\t";
            // line 191
            $this->env->loadTemplate("ProduitProduitBundle:Produit:produitdescript.html.twig")->display($context);
            // line 192
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
        // line 194
        echo "
\t</div><!-- /row -->
\t<div style=\"text-align: center;\">
\t<a href=\"";
        // line 197
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
        // line 217
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
            // line 218
            echo "\t\t\t\t\t";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) {
                // line 219
                echo "\t\t\t\t    <li data-target=\"#carousel-example-generic\" data-slide-to=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index0"), "html", null, true);
                echo "\" class=\"active\"></li>
\t\t\t\t\t";
            } else {
                // line 221
                echo "\t\t\t\t\t<li data-target=\"#carousel-example-generic\" data-slide-to=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index0"), "html", null, true);
                echo "\"></li>
\t\t\t\t\t";
            }
            // line 223
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
        // line 224
        echo "\t\t\t\t  </ol>
\t\t\t\t
\t\t\t\t  <!-- Wrapper for slides -->
\t\t\t\t  <div class=\"carousel-inner text-center\">
\t\t\t\t  ";
        // line 228
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
            // line 229
            echo "\t\t\t\t\t";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) {
                // line 230
                echo "\t\t\t\t    <div class=\"item active\" style=\"text-align: center;\">
\t\t\t\t      <img src=\"";
                // line 231
                if (($this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "imginfoentreprise") != null)) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "imginfoentreprise"), "getwebpath")), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/img/p01.png"), "html", null, true);
                }
                echo "\" alt=\"\" style=\"margin-top: 15px; margin-bottom: 15px; height: 300px; width: 100%;\"/>
\t\t\t\t\t  <div class=\"text-left\" style=\"height: 200px;\">
\t\t\t\t\t  <h3>";
                // line 233
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "titre"), "html", null, true);
                echo "</h3>
\t\t\t\t\t  <div style=\"margin-bottom: 15px;\">";
                // line 234
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "description"), "html", null, true);
                echo "</div>
\t\t\t\t\t  <div>";
                // line 235
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
                // line 239
                echo "\t\t\t\t\t<div class=\"item text-center\" style=\"text-align: center;\">
\t\t\t\t      <img src=\"";
                // line 240
                if (($this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "imginfoentreprise") != null)) {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "imginfoentreprise"), "getwebpath")), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/img/p01.png"), "html", null, true);
                }
                echo "\" alt=\"\" style=\"margin-top: 15px; margin-bottom: 15px; height: 300px; ; width: 100%;\"/>
\t\t\t\t\t  <div class=\"text-left\" style=\"height: 200px;\">
\t\t\t\t\t  <h3>";
                // line 242
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "titre"), "html", null, true);
                echo "</h3>
\t\t\t\t\t  <div style=\"margin-bottom: 15px;\">";
                // line 243
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["valeur"]) ? $context["valeur"] : $this->getContext($context, "valeur")), "description"), "html", null, true);
                echo "</div>
\t\t\t\t\t  <div>";
                // line 244
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
            // line 248
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
        // line 249
        echo "\t\t\t\t  </div>
\t\t\t\t</div>\t\t\t
\t\t\t</div><!-- /col-lg-8 -->
\t\t</div><!-- /row -->
\t</div><! --/container -->
\t</div><! --/container -->
\t<hr>
";
    }

    // line 258
    public function block_srcjavascripttemplate($context, array $blocks = array())
    {
        // line 259
        echo "
";
    }

    // line 262
    public function block_javascripttemplate($context, array $blocks = array())
    {
        // line 263
        echo "
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
        return array (  563 => 263,  560 => 262,  555 => 259,  552 => 258,  541 => 249,  527 => 248,  516 => 244,  512 => 243,  508 => 242,  499 => 240,  496 => 239,  485 => 235,  481 => 234,  477 => 233,  468 => 231,  465 => 230,  462 => 229,  445 => 228,  439 => 224,  425 => 223,  419 => 221,  413 => 219,  410 => 218,  393 => 217,  370 => 197,  365 => 194,  350 => 192,  348 => 191,  345 => 190,  328 => 189,  308 => 172,  302 => 169,  268 => 137,  256 => 131,  250 => 130,  242 => 129,  237 => 126,  233 => 125,  208 => 103,  203 => 100,  191 => 94,  185 => 93,  164 => 77,  157 => 73,  145 => 68,  138 => 63,  134 => 62,  107 => 42,  101 => 39,  83 => 24,  75 => 18,  72 => 17,  65 => 14,  62 => 13,  56 => 10,  53 => 9,  45 => 6,  40 => 4,  36 => 3,  33 => 2,);
    }
}
