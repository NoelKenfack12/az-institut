<?php

/* GeneralTemplateBundle:Menu:menubare.html.twig */
class __TwigTemplate_2be85f03b34882d87e9962bde5e80aeb51088f1ca7588811a107a1bedc7bf934 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- Fixed navbar -->
<div class=\"navbar navbar-default navbar-fixed-top\" style=\"box-shadow: 0 15px 15px -1px #f2f2f2 inset; background: #fff;\">
  <div style=\"box-shadow: 0px 6px 6px #CCC;\">
  <div class=\"container\">
\t<div class=\"navbar-header\">
\t  <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
\t\t<span class=\"icon-bar\"></span>
\t\t<span class=\"icon-bar\"></span>
\t\t<span class=\"icon-bar\"></span>
\t  </button>
\t  <a class=\"navbar-brand\" href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("users_user_acces_plateforme");
        echo "\" style=\"color: green;\"><b>Az Corp</b></a>
\t</div>
\t<div class=\"navbar-collapse collapse\">
\t  <ul class=\"nav navbar-nav\">
\t\t<li><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("produit_service_visiter_notre_blog");
        echo "\" style=\"color: green;\">Formations</a></li>
\t\t<li><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("produit_produit_accueil_boutique_produit");
        echo "\" style=\"color: green;\">Cours</a></li>
\t\t<li><a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("produit_service_forum_site");
        echo "\" style=\"color: green;\">Forum</a></li>
\t\t<li><a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous");
        echo "\" style=\"color: green;\">À propos</a></li>
\t\t<li>
\t\t<div class=\"search zone-etab-rechercher\" style=\"display: inline;\" value=\"0\" name=\"\">
\t\t\t<form class=\"form-recherche-product\" action=\"#!\" method=\"post\" style=\"display: inline;\">
\t\t\t\t<input type=\"text\" class=\"search-form form-products-plateforme\" autocomplete= \"off\" placeholder=\"Lancez la recherche\" style=\"color: #333; margin-top: 15px;\"/>
\t\t\t\t<i class=\"glyphicon glyphicon-search recherche-products\" style=\"color: green; z-index: 1000; position: absolute; margin-top: 20px;\"></i>
\t\t\t</form>
\t   </div>
\t\t</li>
\t  </ul>
\t  <ul class=\"nav navbar-nav navbar-right\">
\t\t
\t\t<li><a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("produit_service_toute_actualite_entreprise");
        echo "\" style=\"color: green;\">Formateurs</a></li>
\t\t<li>
\t\t<div class=\"btn-group\" style=\"margin-top: 15px; margin-left: 5px;\">
\t\t<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" style=\"cursor: pointer; color: green;\">";
        // line 33
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            echo "<img src=\"";
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "imgprofil") != null)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "imgprofil"), "getwebpath")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.png"), "html", null, true);
            }
            echo "\" alt=\"\" style=\"width: 20px; height:20px; border-radius: 15px; margin-top: -5px;\"/> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "name", array(0 => 15), "method"), "html", null, true);
            echo " ";
        } else {
            echo "<img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.png"), "html", null, true);
            echo "\" alt=\"\" style=\"width: 20px; height:20px; border-radius: 15px; margin-top: -5px;\"/> Espace membre";
        }
        echo " <span class=\"caret\"></span></a>
\t\t\t<ul class=\"dropdown-menu\" style=\"margin-top: 13px; border-radius: 0px;\">
\t\t\t\t";
        // line 35
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 36
            echo "\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_user_user_accueil", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id"))), "html", null, true);
            echo "\"><span class=\"fa fa-user\"></span> Mon compte utilisateur</a></li>
\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t<li><a href=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_user_modifier_profil", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id"))), "html", null, true);
            echo "\"><span class=\"fa fa-edit\"></span> Modifier mes paramètres</a></li>
\t\t\t\t";
            // line 39
            if ((($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "formateur") == true) && $this->env->getExtension('security')->isGranted("ROLE_FORMATEUR"))) {
                // line 40
                echo "\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t<li><a href=\"";
                // line 41
                echo $this->env->getExtension('routing')->getPath("produit_produit_ajouter_nouveau_produit");
                echo "\"><span class=\"fa fa-plus\"></span> Ajoutez un cours</a></li>
\t\t\t\t";
            }
            // line 43
            echo "\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t<li><a href=\"";
            // line 44
            echo $this->env->getExtension('routing')->getPath("produit_service_yourcv_recrutement");
            echo "\"><span class=\"fa fa-external-link\"></span> Créditez votre compte</a></li>
\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t<li><a href=\"";
            // line 46
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\"><span class=\"fa fa-sign-out\"></span> Déconnexion</a></li>
\t\t\t\t";
        } else {
            // line 48
            echo "\t\t\t\t<li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("users_user_inscription_user");
            echo "\"><span class=\"fa fa-hand-o-right\"></span> Inscription</a></li>
\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t<li><a href=\"";
            // line 50
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\"><span class=\"fa fa-sign-in\"></span> Connexion</a></li>
\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t<li><a href=\"#!\"><span class=\"fa fa-bell-o\"></span> Notifications</a></li>
\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t<li><a href=\"";
            // line 54
            echo $this->env->getExtension('routing')->getPath("produit_service_yourcv_recrutement");
            echo "\"><span class=\"fa fa-external-link\"></span> Créditez votre compte</a></li>
\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t<li><a href=\"";
            // line 56
            echo $this->env->getExtension('routing')->getPath("produit_service_toute_actualite_entreprise");
            echo "\"><span class=\"fa fa-users\"></span> Formateurs</a></li>
\t\t\t\t";
        }
        // line 58
        echo "\t\t\t</ul>
\t\t</div>
\t\t</li>
\t  </ul>
\t</div><!--/.nav-collapse -->
  </div>
  </div>
</div>


<script type=\"text/javascript\">

function rechercheetab()
{
if(\$('.form-products-plateforme').val().length >= 2)// on vérifier si l'utilisateur a entré plus de 5 caractères
{
  var libre = \$('.zone-etab-rechercher').attr('value'); // on initialise la variable libre
  var donnee = \$('.form-products-plateforme').val();  //on récupère la donnée
  if (libre == 0 && donnee != \$('.zone-etab-rechercher').attr('name')){ // on vérifier si la requête précedente est rétournée et que la recherche ne corespnd pas à la dernière effectuée
  \$('.zone-etab-rechercher').attr('value',1); // on bloque d'autres recherches
  \$('.zone-etab-rechercher').attr('name',donnee); // on enregistre la recherche effectuer.
  \$('.recherche-products').removeClass('glyphicon-search');
  \$('.recherche-products').html('<img src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/attente.gif"), "html", null, true);
        echo "\" alt=\"\" style=\"width: 15px; height: 15px; margin-top: -10px;\"/>'); //attente du résultat
  
\t  \$.get('";
        // line 82
        echo $this->env->getExtension('routing')->getPath("produit_produit_recherche_new_produit");
        echo "', { donnee: \$('.form-products-plateforme').val() }, function(data){
\t\t  \$('.recherche-products').html('');
\t\t  \$('.recherche-products').addClass('glyphicon-search');
\t\t  \$('.content-recherche-products-market').html(data);
\t\t  \$('.content-manage-market').hide();
\t\t  \$('.content-recherche-products-market').show();
\t\t  \$('.content-manage-market').css('margin-top','0px');
\t\t  \$('.content-manage-market').css('padding-top','0px');
\t\t  \$('.zone-etab-rechercher').attr('value',0);
\t\t  setTimeout(function() { rechercheetab(); }, 100);  // on relance la fonction après 200 ms.
\t  });
  }else{
\tsetTimeout(function() { rechercheetab(); }, 100);
  }
}else{
\tsetTimeout(function() { rechercheetab(); }, 100);
    }
}


\$(\".form-products-plateforme\").focus(function(){
rechercheetab(); 
});

\$('.form-recherche-product').on('submit', function(){
    if(\$('.form-products-plateforme').val().length < 2)// on vérifier si l'utilisateur a entré plus de 5 caractères
\t{
\t\t\$('.infos-action-effectuer').html('<span class=\"fa fa-warning\"></span> Echec ! Rentrez au moins 2 caractères !');
\t\t\$('#infos-action-effectuer').modal('show');
\t}else{
\t\t\$('.infos-action-effectuer').html('<span class=\"fa fa-warning\"></span> Patientez ! Auto-recherche en cours !');
\t\t\$('#infos-action-effectuer').modal('show');
\t}
\treturn false;
});
</script>";
    }

    public function getTemplateName()
    {
        return "GeneralTemplateBundle:Menu:menubare.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 82,  172 => 80,  148 => 58,  143 => 56,  120 => 46,  115 => 44,  104 => 40,  98 => 38,  92 => 36,  90 => 35,  50 => 18,  46 => 17,  42 => 16,  38 => 15,  31 => 11,  19 => 1,  354 => 159,  351 => 158,  346 => 132,  343 => 131,  338 => 40,  335 => 39,  329 => 26,  325 => 25,  318 => 21,  313 => 19,  309 => 18,  303 => 16,  300 => 15,  294 => 11,  288 => 10,  269 => 161,  267 => 158,  264 => 157,  243 => 153,  240 => 152,  223 => 151,  216 => 147,  211 => 145,  206 => 143,  202 => 142,  198 => 141,  193 => 139,  186 => 134,  184 => 131,  180 => 130,  170 => 122,  168 => 121,  131 => 50,  129 => 88,  125 => 48,  95 => 63,  67 => 39,  51 => 28,  49 => 15,  41 => 11,  35 => 9,  25 => 1,  112 => 43,  105 => 70,  102 => 39,  99 => 28,  94 => 23,  89 => 25,  87 => 23,  84 => 22,  81 => 21,  76 => 47,  71 => 33,  69 => 42,  66 => 14,  63 => 13,  57 => 10,  54 => 9,  48 => 6,  39 => 10,  563 => 263,  560 => 262,  555 => 259,  552 => 258,  541 => 249,  527 => 248,  516 => 244,  512 => 243,  508 => 242,  499 => 240,  496 => 239,  485 => 235,  481 => 234,  477 => 233,  468 => 231,  465 => 230,  462 => 229,  445 => 228,  439 => 224,  425 => 223,  419 => 221,  413 => 219,  410 => 218,  393 => 217,  370 => 197,  365 => 194,  350 => 192,  348 => 191,  345 => 190,  328 => 189,  308 => 172,  302 => 169,  268 => 137,  256 => 131,  250 => 156,  242 => 129,  237 => 126,  233 => 125,  208 => 103,  203 => 100,  191 => 94,  185 => 93,  164 => 120,  157 => 73,  145 => 68,  138 => 54,  134 => 62,  107 => 41,  101 => 39,  83 => 24,  75 => 18,  72 => 17,  65 => 30,  62 => 37,  56 => 10,  53 => 9,  45 => 5,  40 => 4,  36 => 2,  33 => 2,);
    }
}
