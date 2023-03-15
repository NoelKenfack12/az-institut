<?php

/* ProduitServiceBundle:Apropos:aproposdenous.html.twig */
class __TwigTemplate_f036142c33e394c049a46f5bcc644baab915f587611692e4fbebc85c5623baac extends Twig_Template
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
        echo "<div class=\"col-md-8\">
";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_article"]) ? $context["liste_article"] : $this->getContext($context, "liste_article")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 3
            echo "\t<div class=\"my-div\">
\t<section class=\"testing\" style=\"width: 100%;\">
\t   <div class=\"description2 to-expand\">
\t\t<h2>";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "nom"), "html", null, true);
            echo " </h2>
\t\t<div><img src=\"";
            // line 7
            if (($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "imgservice") != null)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "imgservice"), "getwebpath")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/present.png"), "html", null, true);
            }
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "nom"), "html", null, true);
            echo "\" style=\"width: 100%;\"/></div>
\t\t
\t\t<p>
\t\t";
            // line 10
            echo $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "description");
            echo "
\t\t</p>
\t\t<div style=\"margin-bottom: 50px;\">
\t\t\t<a href=\"#!\" class=\"toggle-overlay-article\" value=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "id"), "html", null, true);
            echo "\" style=\"display: inline-block;\"><button class=\"btn-home btn-4 btn-mulberry\">En savoir plus</button></a>
\t\t</div>
\t   </div>
\t</section>
\t</div>
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 19
            echo "\t<div style=\"background: #fff; height: 500px; padding-top: 200px; text-align: center; color: red;\">Aucune donnée disponible pour cette section.</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "
<span class=\"clearfix\"></span>
";
        // line 23
        if (((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) > 0)) {
            // line 24
            echo "
";
            // line 25
            if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) > 1) && ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) <= (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"))))) {
                // line 26
                $context["pagepre"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 1);
            } else {
                // line 28
                echo "\t";
                $context["pagepre"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
            }
            // line 30
            echo "
";
            // line 31
            if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) < (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))) {
                // line 32
                echo "\t";
                $context["pagesuiv"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 1);
            } else {
                // line 34
                echo "\t";
                $context["pagesuiv"] = 1;
            }
            // line 36
            echo "
";
            // line 37
            if (((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) < 5)) {
                // line 38
                echo "\t";
                $context["debut"] = 1;
                // line 39
                echo "\t";
                $context["fin"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
            } else {
                // line 41
                echo "\t";
                if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) > 2) && ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) < ((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) - 2)))) {
                    // line 42
                    echo "\t\t";
                    $context["debut"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 2);
                    // line 43
                    echo "\t\t";
                    if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2) >= (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))) {
                        // line 44
                        echo "\t\t\t";
                        $context["fin"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
                        // line 45
                        echo "\t\t";
                    } else {
                        // line 46
                        echo "\t\t\t";
                        $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2);
                        // line 47
                        echo "\t\t";
                    }
                    // line 48
                    echo "\t";
                } else {
                    // line 49
                    echo "\t\t";
                    if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) <= 2)) {
                        // line 50
                        echo "\t\t\t";
                        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == 1)) {
                            // line 51
                            echo "\t\t\t\t";
                            $context["debut"] = 1;
                            // line 52
                            echo "\t\t\t\t";
                            $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 3);
                            // line 53
                            echo "\t\t\t";
                        } else {
                            // line 54
                            echo "\t\t\t\t";
                            $context["debut"] = 1;
                            // line 55
                            echo "\t\t\t\t";
                            $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2);
                            // line 56
                            echo "\t\t\t";
                        }
                        // line 57
                        echo "\t\t";
                    } else {
                        // line 58
                        echo "\t\t\t";
                        $context["debut"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 2);
                        // line 59
                        echo "\t\t\t";
                        if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2) >= (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))) {
                            // line 60
                            echo "\t\t\t\t";
                            $context["fin"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
                            // line 61
                            echo "\t\t\t";
                        } else {
                            // line 62
                            echo "\t\t\t\t";
                            $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2);
                            // line 63
                            echo "\t\t\t";
                        }
                        // line 64
                        echo "\t\t";
                    }
                    // line 65
                    echo "\t";
                }
                // line 66
                echo "\t
";
            }
            // line 68
            echo "<div>
  <div class=\"pagination\"> 
\t<a href=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => 1)), "html", null, true);
            echo "\" title=\"Première page\" class=\"page gradient\"><span class=\"fa fa-fast-backward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 71
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["pagepre"]) ? $context["pagepre"] : $this->getContext($context, "pagepre")))), "html", null, true);
            echo "\" title=\"Page précedente\" class=\"page gradient\"><span class=\"fa fa-step-backward\" style=\"font-size: 8px;\"></span></a>
\t";
            // line 72
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range((isset($context["debut"]) ? $context["debut"] : $this->getContext($context, "debut")), (isset($context["fin"]) ? $context["fin"] : $this->getContext($context, "fin"))));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 73
                echo "\t<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")))), "html", null, true);
                echo "\" class=\"page ";
                if (((isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")) == (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))) {
                    echo "active";
                } else {
                    echo "gradient";
                }
                echo "\" class=\"\">";
                echo twig_escape_filter($this->env, (isset($context["p"]) ? $context["p"] : $this->getContext($context, "p")), "html", null, true);
                echo "</a>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 75
            echo "\t<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["pagesuiv"]) ? $context["pagesuiv"] : $this->getContext($context, "pagesuiv")))), "html", null, true);
            echo "\"  title=\"Page suivante\" class=\"page gradient\"><span class=\"fa fa-step-forward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 76
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))), "html", null, true);
            echo "\" title=\"Dernière page\" class=\"page gradient\"><span class=\"fa fa-fast-forward\" style=\"font-size: 8px;\"></span></a>
   </div>
<div class=\"clearfix\"></div>
</div>
";
        } else {
            // line 81
            echo "<div>
  <div class=\"pagination\">
\t<a href=\"";
            // line 83
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" title=\"Première page\" class=\"page gradient\"><span class=\"fa fa-fast-backward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 84
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" title=\"Page précedente\" class=\"page gradient\"><span class=\"fa fa-step-backward\" style=\"font-size: 8px;\"></span></a>

\t<a href=\"";
            // line 86
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" class=\"page active\">0</a>

\t<a href=\"";
            // line 88
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\"  title=\"Page suivante\" class=\"page gradient\"><span class=\"fa fa-step-forward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" title=\"Dernière page\" class=\"page gradient\"><span class=\"fa fa-fast-forward\" style=\"font-size: 8px;\"></span></a>
   </div>
<div class=\"clearfix\"></div>
</div>
";
        }
        // line 93
        echo "\t
\t\t\t\t
</div>

<!-- <div class=\"col-md-3\"> -->
<!-- ";
        // line 98
        echo " -->
<!-- </div> -->";
    }

    public function getTemplateName()
    {
        return "ProduitServiceBundle:Apropos:aproposdenous.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  279 => 98,  272 => 93,  264 => 89,  260 => 88,  255 => 86,  250 => 84,  246 => 83,  242 => 81,  234 => 76,  229 => 75,  212 => 73,  208 => 72,  204 => 71,  200 => 70,  196 => 68,  192 => 66,  189 => 65,  186 => 64,  183 => 63,  180 => 62,  177 => 61,  174 => 60,  171 => 59,  168 => 58,  165 => 57,  162 => 56,  159 => 55,  156 => 54,  153 => 53,  150 => 52,  147 => 51,  144 => 50,  141 => 49,  138 => 48,  135 => 47,  132 => 46,  129 => 45,  126 => 44,  123 => 43,  120 => 42,  117 => 41,  113 => 39,  110 => 38,  108 => 37,  105 => 36,  101 => 34,  97 => 32,  95 => 31,  92 => 30,  88 => 28,  85 => 26,  83 => 25,  80 => 24,  78 => 23,  74 => 21,  67 => 19,  56 => 13,  50 => 10,  36 => 7,  32 => 6,  27 => 3,  22 => 2,  19 => 1,);
    }
}
