<?php

/* ProduitServiceBundle:Apropos:menuleft.html.twig */
class __TwigTemplate_f5c3571caf14e70c8ec270574d7a09b9411fd4a2a59ea4e0a24e9b1f260d6206 extends Twig_Template
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
        echo "<div class=\"col-md-4\">

<div class=\"toutleblock\">

<div class=\"card\" style=\"background: #fff; border-radius: 5px; padding: 7px; margin-bottom: 7px; display: block!important;\">
<div class=\"card-body\">
  <h4 class=\"card-title\">L'institut de formation</h4>
  <h6 class=\"card-subtitle mb-2\">";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo "</h6>
  <p class=\"card-text\">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
</div>
<div class=\"list-group list-group-flush\">
\t<a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "aproposinstitut"));
        echo "\" class=\"list-group-item list-group-item-action\" style=\"border: none;\"><span class=\"cool-link\">À Propos De L'institut Az</span></a>
\t<a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "demarcheaz"));
        echo "\" class=\"list-group-item list-group-item-action\" style=\"border: none;\"><span class=\"cool-link\">Démarche de formation</span></a>
\t<a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "actualite"));
        echo "\" class=\"list-group-item list-group-item-action\" style=\"border: none;\"><span class=\"cool-link\">Actualités</span></a>
\t<a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "mediatheque"));
        echo "\" class=\"list-group-item list-group-item-action\" style=\"border: none;\"><span class=\"cool-link\">Vidéothèque</span></a>
\t<a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "galeriephoto"));
        echo "\" class=\"list-group-item list-group-item-action\" style=\"border: none;\"><span class=\"cool-link\">Galerie photos</span></a>
\t<a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "planingcours"));
        echo "\" class=\"list-group-item list-group-item-action\" style=\"border: none;\"><span class=\"cool-link\">Planing des cours</span></a>
\t<a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "temoignage"));
        echo "\" class=\"list-group-item list-group-item-action\" style=\"border: none;\"><span class=\"cool-link\">Temoignage collaborateurs</span></a>
\t<a href=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "avis"));
        echo "\" class=\"list-group-item list-group-item-action\" style=\"border: none;\"><span class=\"cool-link\">Avis des étudiant(e)s</span></a>
\t<a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "evenement"));
        echo "\" class=\"list-group-item list-group-item-action\" style=\"border: none;\"><span class=\"cool-link\">Evènements</span></a>
\t<a href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => "aide"));
        echo "\" class=\"list-group-item list-group-item-action\" style=\"border: none;\"><span class=\"cool-link\">Foire aux questions</span></a>
\t<a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("produit_service_contact_us");
        echo "\" class=\"list-group-item list-group-item-action\" style=\"border: none;\"><span class=\"cool-link\">Nous contacter</span></a>
</div>       
</div>

";
        // line 26
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
        foreach ($context['_seq'] as $context["_key"] => $context["formation"]) {
            // line 27
            echo "<div class=\"card\" style=\"background: #fff; border-radius: 5px; padding: 7px; margin-bottom: 7px; display: block!important;\">
  <h4 class=\"card-title\">";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "nom"), "html", null, true);
            echo "</h4>
  <h6 class=\"card-subtitle mb-2\">";
            // line 29
            echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
            echo "</h6>

<div class=\"\"> 
\t<a href=\"#!\" class=\"open-liste-formation\" style=\"display: block;\" value=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "id"), "html", null, true);
            echo "\">Liste des formations <span class=\"fa fa-angle-down\"></span> </a> 
</div>
<div class=\"list-group list-group-flush item-formation-";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "id"), "html", null, true);
            echo "\" style=\"";
            if ((!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first"))) {
                echo "display: none;";
            }
            echo "\">
\t";
            // line 35
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "getScatProduits"), 0, 4));
            foreach ($context['_seq'] as $context["_key"] => $context["diplome"]) {
                // line 36
                echo "\t<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_liste_produit_souscategorie", array("id" => $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "id"))), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "nom"), "html", null, true);
                echo "\" class=\"list-group-item list-group-item-action\" style=\"border: none;\"><span class=\"cool-link\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diplome"]) ? $context["diplome"] : $this->getContext($context, "diplome")), "nom"), "html", null, true);
                echo "</span></a>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['diplome'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "\t
\t<a href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_produit_produit_formation_institut", array("id" => $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "id"))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["formation"]) ? $context["formation"] : $this->getContext($context, "formation")), "nom"), "html", null, true);
            echo "\" class=\"list-group-item list-group-item-action\" style=\"border: none;\"><span class=\"cool-link\">Liste complète</span></a>
</div>       
</div>
";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['formation'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "\t

<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12 stop-courant-panel\">

 </div>
</div>
\t\t
</div>";
    }

    public function getTemplateName()
    {
        return "ProduitServiceBundle:Apropos:menuleft.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 42,  145 => 39,  142 => 38,  129 => 36,  125 => 35,  117 => 34,  112 => 32,  106 => 29,  102 => 28,  99 => 27,  82 => 26,  75 => 22,  71 => 21,  67 => 20,  63 => 19,  59 => 18,  55 => 17,  51 => 16,  47 => 15,  43 => 14,  39 => 13,  35 => 12,  28 => 8,  19 => 1,);
    }
}
