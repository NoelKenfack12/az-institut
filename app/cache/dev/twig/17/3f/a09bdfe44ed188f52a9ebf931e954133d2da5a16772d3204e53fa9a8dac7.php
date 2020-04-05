<?php

/* ::layoutbasehome.html.twig */
class __TwigTemplate_173fa09bdfe44ed188f52a9ebf931e954133d2da5a16772d3204e53fa9a8dac7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta' => array($this, 'block_meta'),
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
\t
\t<title>
\t\t";
        // line 12
        $this->displayBlock('title', $context, $blocks);
        // line 13
        echo "\t</title>
\t
\t";
        // line 15
        $this->displayBlock('meta', $context, $blocks);
        // line 16
        echo "\t
    
    ";
        // line 18
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 36
        echo "\t
\t<script src=\"https://code.jquery.com/jquery-3.2.1.slim.min.js\" integrity=\"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\" integrity=\"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q\" crossorigin=\"anonymous\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js\" integrity=\"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js\"></script>
  </head>

  <body>
  <div class=\"container-scroller\">
\t  ";
        // line 45
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GeneralTemplateBundle:Menu:menubare", array("position" => "home")));
        echo "

\t  <div class=\"container-fluid page-body-wrapper variation-contenu content-manage-market\" value=\"0\">
\t\t  <div class=\"main-panel\" style=\"background: #f7f7f7;\">
\t\t  ";
        // line 49
        $this->displayBlock('body', $context, $blocks);
        // line 52
        echo "
\t\t  
\t\t  <div class=\"content-recherche-products-market\" style=\"display: none;\">

\t\t  </div>
\t\t  
\t\t  ";
        // line 58
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GeneralTemplateBundle:Menu:footer", array("position" => "home")));
        echo "
\t\t  </div>
\t  </div>
  </div>
  
  
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
        // line 78
        echo $this->env->getExtension('routing')->getPath("users_user_inscription_user");
        echo "\">Inscrivez-vous ici.</a>
\t\t</div>\t
\t</div>\t
\t<hr style=\"margin-bottom: 0px;\"/>

\t<div class=\"modal-body\" style=\"background: #fff; color: #333;\">
\t<div style=\"background: #ECF0F1; padding: 15px;\">
\t<form action=\"";
        // line 85
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
        // line 102
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo "</span>
\t";
        // line 103
        $this->env->loadTemplate("GeneralTemplateBundle:Menu:social.html.twig")->display($context);
        // line 104
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
        // line 135
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo "</span>
\t";
        // line 136
        $this->env->loadTemplate("GeneralTemplateBundle:Menu:social.html.twig")->display($context);
        // line 137
        echo "\t</div>

\t</div>
\t</div>
\t</div>

\t<!-- //here ends scrolling icon -->

\t";
        // line 146
        echo "\t";
        $this->displayBlock('srcjavascript', $context, $blocks);
        // line 149
        echo "\t
\t
\t
\t<script type=\"text/javascript\">
\t\t\$('a').tooltip();
\t\t
\t\t";
        // line 155
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
            // line 156
            echo "\t\t\t";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) {
                // line 157
                echo "\t\t\t\t\$('.infos-action-effectuer').html('";
                echo (isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos"));
                echo "');
\t\t\t\t\$('#infos-action-effectuer').modal('show');
\t\t\t";
            }
            // line 160
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
        // line 161
        echo "\t\t
\t\t";
        // line 162
        $this->displayBlock('javascript', $context, $blocks);
        // line 165
        echo "\t\t
\t\t/*\$('.dropdown-toggle').mouseover(function() {
\t\t\$(this).dropdown('toggle');
\t\t});

\t\t\$(function () {
\t\t\$('[data-toggle=tooltip]').tooltip();
\t\t});
\t\t
\t\t\$(\".close\").click(function() {
\t\t\$(\".alert\").hide(\"slow\");
\t\t});*/
\t</script>\t

</body>
</html>";
    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
    }

    // line 15
    public function block_meta($context, array $blocks = array())
    {
        echo " ";
    }

    // line 18
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 19
        echo "\t\t<!-- plugins:css -->
\t\t<link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("templatehome/css/materialdesignicons.min.css"), "html", null, true);
        echo "\"/>
\t\t<link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("templatehome/css/vendor.bundle.base.css"), "html", null, true);
        echo "\"/>
\t\t<link rel=\"stylesheet\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("templatehome/css/vendor.bundle.addons.css"), "html", null, true);
        echo "\"/>
\t\t<!-- endinject -->
\t\t<!-- plugin css for this page -->
\t\t<!-- End plugin css for this page -->
\t\t<!-- inject:css -->
\t\t<link rel=\"stylesheet\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("templatehome/css/style.css"), "html", null, true);
        echo "\"/>
\t\t
\t\t
\t<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.7.1/css/all.css\" integrity=\"sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr\" crossorigin=\"anonymous\">
\t

\t";
    }

    // line 49
    public function block_body($context, array $blocks = array())
    {
        // line 50
        echo "\t\t\t\t
\t\t  ";
    }

    // line 146
    public function block_srcjavascript($context, array $blocks = array())
    {
        // line 147
        echo "
\t";
    }

    // line 162
    public function block_javascript($context, array $blocks = array())
    {
        // line 163
        echo "
\t\t";
    }

    public function getTemplateName()
    {
        return "::layoutbasehome.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  333 => 163,  330 => 162,  325 => 147,  322 => 146,  317 => 50,  314 => 49,  301 => 27,  293 => 22,  289 => 21,  285 => 20,  282 => 19,  279 => 18,  273 => 15,  267 => 12,  248 => 165,  246 => 162,  243 => 161,  229 => 160,  222 => 157,  219 => 156,  202 => 155,  194 => 149,  191 => 146,  181 => 137,  179 => 136,  175 => 135,  142 => 104,  140 => 103,  136 => 102,  116 => 85,  106 => 78,  83 => 58,  75 => 52,  73 => 49,  66 => 45,  55 => 36,  53 => 18,  49 => 16,  47 => 15,  43 => 13,  41 => 12,  35 => 9,  25 => 1,);
    }
}
