<?php

/* ProduitServiceBundle:Service:livresformartion.html.twig */
class __TwigTemplate_802857a2066731213a49529e14ad349c36de9fb78affd6cb890c1bbfad305dab extends Twig_Template
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
        echo "<main style=\"box-shadow:0px 0px 2px rgba(0,0,0,0.02); background: #fff; margin: 0px; min-width: 100%; min-height: 300px; padding: 7px;\">
<a href=\"#!\" class=\"targetlink\">Trouver une formation</a>
<p>
<div style=\"padding: 0px 15px 0px 15px;\">
\t<span>Trouver la formation adaptée au métier que vous souhaitez exercé:</span></br>
\t<strong>Type formation</strong>
\t<form method=\"post\">
\t\t<div class=\"form-group\">
\t\t\t<select name=\"\" class=\"form-control\">
\t\t\t\t<option value=\"1\">Formations diplomantes</option>
\t\t\t\t<option value=\"2\">Formations continues</option>
\t\t\t</select>
\t\t</div>

\t\t<div class=\"form-group\">
\t\t\t<label for=\"typede_formation\">Métiers</label>
\t\t\t<select name=\"\" class=\"form-control\" id=\"typede_formation\">
\t\t\t\t<option value=\"1\">Formations diplomantes</option>
\t\t\t\t<option value=\"2\">Formations continues</option>
\t\t\t</select>
\t\t</div>
\t\t
\t\t<div class=\"form-group\">
\t\t\t<button class=\"btn btn-primary\">Rechercher <span class=\"fa fa-search\"></span></button>
\t\t</div>
\t</form>
\tPopup Search
</div>
</p>
</main>

";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 2));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 33
            echo "<div class=\"card\" style=\"background: #fff; border-radius: 5px; padding: 7px; margin-top: 7px; margin-bottom: 0px; display: block!important;\">
<div class=\"card-body\" style=\"margin: 0px;\">
  <h4 class=\"card-title\">Intitulé support</h4>
  <h6 class=\"card-subtitle mb-2\">Auteur: ";
            // line 36
            echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
            echo "</h6>
  <p class=\"card-text\">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
  
  <div class=\"text-center\">
\t<img src=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/present.png"), "html", null, true);
            echo "\" alt=\"\" style=\"height: 150px; max-width: 100%;\"/>
  </div>
  <div>Pour achat ou plus d'information cliquez sur le lien ci-dessous.</div>
  <div><a href=\"\" class=\"btn btn-primary\">Continuer sur AZ Market</a></div>
</div>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "ProduitServiceBundle:Service:livresformartion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 40,  61 => 36,  52 => 32,  279 => 98,  272 => 93,  264 => 89,  260 => 88,  255 => 86,  250 => 84,  246 => 83,  242 => 81,  234 => 76,  229 => 75,  212 => 73,  208 => 72,  204 => 71,  200 => 70,  196 => 68,  192 => 66,  189 => 65,  186 => 64,  183 => 63,  180 => 62,  177 => 61,  174 => 60,  171 => 59,  168 => 58,  165 => 57,  162 => 56,  159 => 55,  156 => 54,  153 => 53,  150 => 52,  147 => 51,  144 => 50,  141 => 49,  138 => 48,  135 => 47,  132 => 46,  129 => 45,  126 => 44,  123 => 43,  120 => 42,  117 => 41,  113 => 39,  110 => 38,  108 => 37,  105 => 36,  101 => 34,  97 => 32,  95 => 31,  92 => 30,  88 => 28,  85 => 26,  83 => 25,  80 => 24,  78 => 23,  74 => 21,  67 => 19,  56 => 33,  50 => 10,  36 => 7,  32 => 6,  27 => 3,  22 => 2,  19 => 1,);
    }
}
