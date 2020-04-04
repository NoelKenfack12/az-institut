<?php

/* ::layoutbase.html.twig */
class __TwigTemplate_0652678d73ea4eb8d1cfc7129f8d8cf9b799a90abad898cb367470049cfa8a53 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'srcjavascript' => array($this, 'block_srcjavascript'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"shortcut icon\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/logo.png"), "html", null, true);
        echo "\">
\t";
        // line 10
        $this->displayBlock('meta', $context, $blocks);
        // line 11
        echo "    <title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    <!-- Bootstrap core CSS -->
    
    ";
        // line 15
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 28
        echo "    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
      <script src=\"https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js\"></script>
\t  
    <![endif]-->
  </head>

  <body>
  ";
        // line 37
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GeneralTemplateBundle:Menu:menubare"));
        echo "
  <div class=\"variation-contenu content-manage-market\" value=\"0\">
  ";
        // line 39
        $this->displayBlock('body', $context, $blocks);
        // line 42
        echo "  </div>
  <div class=\"content-recherche-products-market\" style=\"display: none;\">

  </div>
  
  ";
        // line 47
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GeneralTemplateBundle:Menu:footer"));
        echo "
\t
\t<div class=\"modal fade modal-alter\" id=\"modal-infos-action-connexion\" style=\"margin-top: 100px;\">
\t<div class=\"modal-dialog modal-md\">
\t<div class=\"modal-content\" style=\"border-radius: 0px;\">
\t<div class=\"modal-header\" style=\"position: absolute; z-index: 3; width: 100%; padding: 2px 0px; box-shadow: 0 15px 15px -1px #f2f2f2 inset;background: #fff;\">
\t<div style=\"box-shadow: 0px 6px 6px #CCC; margin: 0px;\">
\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" style=\"padding: 7px;\">&times;</button>
\t<h4 class=\"modal-title text-left\" style=\"padding: 7px;\"><span class=\"fa fa-lock\"></span> Connexion nécessaire</h4>
\t</div>
\t</div>
\t<hr style=\"margin-top: 38px; margin-bottom: 0px;\"/>
\t<div  style=\"background: rgba(83, 101, 240, 1); height: 10px;\">
\t</div>
\t<div style=\"background: #BDC3C7;\">
\t\t<div class=\"text-left\" style=\"color: #fff; padding-left: 15px;\">
\t\t   <span class=\"fa fa-angle-double-right\"></span> Si vous n'avez pas encore un compte, <a href=\"";
        // line 63
        echo $this->env->getExtension('routing')->getPath("users_user_inscription_user");
        echo "\">Inscrivez-vous ici.</a>
\t\t</div>\t
\t</div>\t
\t<hr style=\"margin-bottom: 0px;\"/>

\t<div class=\"modal-body\" style=\"background: #fff; color: #333;\">
\t<div style=\"background: #ECF0F1; padding: 15px;\">
\t<form action=\"";
        // line 70
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\" style=\"margin-top: 15px;\">
\t<div class=\"form-group\">
\t\t<input type=\"email\" placeholder=\"E-mail\" id=\"username\" name=\"_username\" value=\"\" required class=\"form-control\" style=\"width: 100%;\">
\t\t<input type=\"password\" placeholder=\"Mot de passe\" id=\"password\" name=\"_password\" required class=\"form-control\" style=\"margin-top: 15px; width: 100%;\">
\t</div>
\t<div style=\"margin-top: 15px;\">
\t\t<a class=\"news-letter \" href=\"#\" style=\"color: #fff;\">
\t\t <label class=\"checkbox1\"><input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" checked /><i> </i>Garder ma session ouverte</label>
\t    </a>
\t\t<button type=\"submit\" class=\"btn btn-warning btn-lg pull-right\">Connexion </button>
\t</div>
\t</form>
\t</div>
\t</div>

\t<hr style=\"margin-bottom: 15px;\"/>
\t<div class=\"modal-footer\" style=\"text-align: right; padding: 7px; background: #222222; color: #fff;\">
\t<span class=\"pull-left\">&copy; ";
        // line 87
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo "</span>
\t";
        // line 88
        $this->env->loadTemplate("GeneralTemplateBundle:Menu:social.html.twig")->display($context);
        // line 89
        echo "\t</div>

\t</div>
\t</div>
\t</div>

\t<div class=\"modal fade modal-alter\" id=\"infos-action-effectuer\" style=\"margin-top: 100px;\">
\t<div class=\"modal-dialog modal-md\">
\t<div class=\"modal-content\" style=\"border-radius: 0px;\">
\t<div class=\"modal-header\" style=\"position: absolute; z-index: 3; width: 100%; padding: 2px 0px; box-shadow: 0 15px 15px -1px #f2f2f2 inset;background: #fff;\">
\t<div style=\"box-shadow: 0px 6px 6px #CCC; margin: 0px;\">
\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" style=\"padding: 7px;\">&times;</button>
\t<h4 class=\"modal-title text-left\" style=\"padding: 7px;\"><span class=\"fa fa-info-circle\"></span> Traitement de votre action</h4>
\t</div>
\t</div>
\t<hr style=\"margin-top: 38px; margin-bottom: 0px;\"/>
\t<div  style=\"background: rgba(83, 101, 240, 1); height: 10px;\">
\t</div>
\t<div style=\"background: #BDC3C7;\">
\t\t<div class=\"text-left\" style=\"color: #fff; padding-left: 15px; padding-top: 20px;\">
\t\t  
\t\t</div>\t
\t</div>\t
\t<hr style=\"margin-bottom: 0px;\"/>

\t<div class=\"modal-body\" style=\"background: #fff; color: #333;\">
\t\t<div class=\"alert-warning infos-action-effectuer\" style=\"margin-top: 15px; padding: 15px;  margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px;\"></div>
\t</div>

\t<hr style=\"margin-bottom: 15px; margin-top: 0px;\"/>
\t<div class=\"modal-footer\" style=\"text-align: right; padding: 7px; background: #222222; color: #fff;\">
\t<span class=\"pull-left\">&copy; ";
        // line 120
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo "</span>
\t";
        // line 121
        $this->env->loadTemplate("GeneralTemplateBundle:Menu:social.html.twig")->display($context);
        // line 122
        echo "\t</div>

\t</div>
\t</div>
\t</div>

\t<!-- //here ends scrolling icon -->

\t";
        // line 130
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GeneralTemplateBundle:Menu:testinscriptionnewsletter"));
        echo "
\t";
        // line 131
        $this->displayBlock('srcjavascript', $context, $blocks);
        // line 134
        echo "\t
\t<!-- Bootstrap core JavaScript
\t================================================== -->
\t<!-- Placed at the end of the document so the pages load faster -->

\t<script src=\"";
        // line 139
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>

\t<script src=\"";
        // line 141
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/js/jquery.nicescroll.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 142
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/js/scripts.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 143
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/js/materialize.min.js"), "html", null, true);
        echo "\"></script>

\t<script src=\"";
        // line 145
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/js/flat-ui.min.js"), "html", null, true);
        echo "\"></script>

\t<script src=\"";
        // line 147
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/js/application.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\">
\t\t\$('a').tooltip();
\t\t
\t\t";
        // line 151
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "alertnewsletter"), "method"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["infos"]) {
            // line 152
            echo "\t\t\t";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) {
                // line 153
                echo "\t\t\t\t\$('.infos-action-effectuer').html('";
                echo (isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos"));
                echo "');
\t\t\t\t\$('#infos-action-effectuer').modal('show');
\t\t\t";
            }
            // line 156
            echo "\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['infos'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 157
        echo "\t\t
\t\t";
        // line 158
        $this->displayBlock('javascript', $context, $blocks);
        // line 161
        echo "\t\t
\t\t\$('.dropdown-toggle').mouseover(function() {
\t\t\$(this).dropdown('toggle');
\t\t});

\t\t\$(function () {
\t\t\$('[data-toggle=tooltip]').tooltip();
\t\t});
\t\t
\t\t\$(\".close\").click(function() {
\t\t\$(\".alert\").hide(\"slow\");
\t\t});
\t</script>\t

</body>
</html>";
    }

    // line 10
    public function block_meta($context, array $blocks = array())
    {
        echo " ";
    }

    // line 11
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
    }

    // line 15
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 16
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/css/materializetest.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
\t
\t<link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
\t<link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/css/font-awesome.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <!-- Custom styles for this template -->
    <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/css/main16.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!-- Fonts from Google Fonts -->
\t<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
    <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/assets/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
\t<link href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("autocomplete/css/jquery.auto-complete.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"all\">
\t";
    }

    // line 39
    public function block_body($context, array $blocks = array())
    {
        // line 40
        echo "        
  ";
    }

    // line 131
    public function block_srcjavascript($context, array $blocks = array())
    {
        // line 132
        echo "
\t";
    }

    // line 158
    public function block_javascript($context, array $blocks = array())
    {
        // line 159
        echo "
\t\t";
    }

    public function getTemplateName()
    {
        return "::layoutbase.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  354 => 159,  351 => 158,  346 => 132,  343 => 131,  338 => 40,  335 => 39,  329 => 26,  325 => 25,  318 => 21,  313 => 19,  309 => 18,  303 => 16,  300 => 15,  294 => 11,  288 => 10,  269 => 161,  267 => 158,  264 => 157,  243 => 153,  240 => 152,  223 => 151,  216 => 147,  211 => 145,  206 => 143,  202 => 142,  198 => 141,  193 => 139,  186 => 134,  184 => 131,  180 => 130,  170 => 122,  168 => 121,  131 => 89,  129 => 88,  125 => 87,  95 => 63,  67 => 39,  51 => 28,  49 => 15,  41 => 11,  35 => 9,  25 => 1,  112 => 30,  105 => 70,  102 => 29,  99 => 28,  94 => 23,  89 => 25,  87 => 23,  84 => 22,  81 => 21,  76 => 47,  71 => 18,  69 => 42,  66 => 14,  63 => 13,  57 => 10,  54 => 9,  48 => 6,  39 => 10,  563 => 263,  560 => 262,  555 => 259,  552 => 258,  541 => 249,  527 => 248,  516 => 244,  512 => 243,  508 => 242,  499 => 240,  496 => 239,  485 => 235,  481 => 234,  477 => 233,  468 => 231,  465 => 230,  462 => 229,  445 => 228,  439 => 224,  425 => 223,  419 => 221,  413 => 219,  410 => 218,  393 => 217,  370 => 197,  365 => 194,  350 => 192,  348 => 191,  345 => 190,  328 => 189,  308 => 172,  302 => 169,  268 => 137,  256 => 131,  250 => 156,  242 => 129,  237 => 126,  233 => 125,  208 => 103,  203 => 100,  191 => 94,  185 => 93,  164 => 120,  157 => 73,  145 => 68,  138 => 63,  134 => 62,  107 => 32,  101 => 39,  83 => 24,  75 => 18,  72 => 17,  65 => 14,  62 => 37,  56 => 10,  53 => 9,  45 => 5,  40 => 4,  36 => 2,  33 => 2,);
    }
}
