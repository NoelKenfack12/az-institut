<?php

/* UsersUserBundle:User:ajouteradmin.html.twig */
class __TwigTemplate_c29fc9d6c93d42c14569ec4743db18f399b0840c08e59d30a28d75a2e828ae54 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("UsersUserBundle::layoutuser.html.twig");

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'title' => array($this, 'block_title'),
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

    // line 3
    public function block_meta($context, array $blocks = array())
    {
        // line 4
        $this->displayParentBlock("meta", $context, $blocks);
        echo "
<meta name=\"keywords\" content=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo ", Inscription, Connexion, Maisons Cameroun, Immobilier, Annonce Cameron, Appartement, Studios à louer, Studio simple, Appartements meublés,terrains, duplex, villas,\"/>
<meta name=\"author\" content=\"Noel Kenfack\"/>
<meta name=\"description\" content=\"Inscription gratuite sur ";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, (isset($context["metier"]) ? $context["metier"] : $this->getContext($context, "metier")), "html", null, true);
        echo " - Annonce Cameroun, Annonce gratuite.\"/>
";
    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        // line 10
        $this->displayParentBlock("title", $context, $blocks);
        echo " | Inscription 
";
    }

    // line 13
    public function block_userblog_body($context, array $blocks = array())
    {
        // line 14
        echo "<hr style=\"margin-top: 45px; margin-bottom: 0px;\"/>
<div  style=\"background: rgba(83, 101, 240, 1); height: 10px;\">
</div>
<div style=\"background: #BDC3C7;\">
\t<div class=\"container\" style=\"color: #fff;\">
\tAccueil <span class=\"mdi-av-play-arrow\" style=\"font-size: 10px;\"></span> E-learning place <span class=\"mdi-av-play-arrow\" style=\"font-size: 10px;\"></span> Noel Kenfack
\t</div>\t
</div>\t
<hr style=\"margin-bottom: 0px;\">
<!-- banner -->
\t<div class=\"banner\">
\t\t<div class=\"container\" style=\"padding-top: 50px; margin-bottom: 10px;\">
\t\t\t<div class=\"banner-left\">
\t\t\t\t<h3>Identifier le super administrateur configurer dans le système et connectez-vous en tantque surper admin!</h3>
\t\t\t\t<p>Rentrez le mot de passe Configuré dans le système.</p>
\t\t\t</div>
\t\t\t<div class=\"banner-right\" style=\"padding-bottom: 200px;\">
\t\t\t\t<h3><span>Devenir Super Administrateur</span></h3>
\t\t\t\t<div class=\"reservation\">
\t\t\t\t<form action=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("users_user_ajout_super_admin");
        echo "\" method=\"post\">
\t\t\t\t\t";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "information"), "method"));
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
            // line 35
            echo "\t\t\t\t\t";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) {
                // line 36
                echo "\t\t\t\t\t<div class=\"alert alert-warning\" style=\"margin-bottom: 3px;\">";
                echo (isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos"));
                echo "</div>
\t\t\t\t\t";
            }
            // line 38
            echo "\t\t\t\t\t";
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
        // line 39
        echo "\t\t\t\t\t<div class=\"keywords\">
\t\t\t\t\t\t<span class=\"glyphicon glyphicon-list-alt\"></span>
\t\t\t\t\t\t<input type=\"text\" placeholder=\"Nom de l'application\" id=\"username\" name=\"_username\" value=\"\" required/>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"keywords\" style=\"margin-top: 25px;\">
\t\t\t\t\t\t<span class=\"glyphicon glyphicon-lock\"></span>
\t\t\t\t\t\t<input type=\"password\" placeholder=\"Password\" id=\"password\" name=\"_password\" required/>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"keywords\">
\t\t\t\t\t\t<input type=\"submit\" value=\"Ajouter le rôle super admin à votre compte\" style=\"margin-top: 15px;\">
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t\t</div>
\t\t\t\t";
        // line 53
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user") == null)) {
            // line 54
            echo "\t\t\t\t<h4 style=\"margin-top: 40px;\">Vous avez déjà un compte ? <a href=\"";
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\"><i class=\"fa fa-sign-in\"></i> Connexion</a></h4>
\t\t\t\t";
        } else {
            // line 56
            echo "\t\t\t\t<h4 style=\"margin-top: 40px;\">Vous ne vous souvenez plus des accès ? <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_user_user_accueil", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id"))), "html", null, true);
            echo "\"><i class=\"fa fa-sign-in\"></i> Retournez vers votre compte</a></h4>
\t\t\t\t";
        }
        // line 58
        echo "\t\t\t</div>
\t\t\t<div class=\"clearfix\"> </div>
\t\t</div>
\t</div>
\t<!-- //banner -->
\t<hr>
";
    }

    // line 66
    public function block_javascripttemplate($context, array $blocks = array())
    {
        // line 67
        echo "\$('.active').removeClass('active');
\$('.compte-user').addClass('active');
";
    }

    public function getTemplateName()
    {
        return "UsersUserBundle:User:ajouteradmin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 67,  168 => 66,  158 => 58,  152 => 56,  146 => 54,  144 => 53,  128 => 39,  114 => 38,  108 => 36,  105 => 35,  88 => 34,  84 => 33,  63 => 14,  60 => 13,  54 => 10,  51 => 9,  43 => 7,  38 => 5,  34 => 4,  31 => 3,);
    }
}
