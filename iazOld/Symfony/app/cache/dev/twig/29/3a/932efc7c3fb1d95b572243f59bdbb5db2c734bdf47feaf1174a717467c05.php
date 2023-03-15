<?php

/* ProduitServiceBundle:Apropos:evenement.html.twig */
class __TwigTemplate_293a932efc7c3fb1d95b572243f59bdbb5db2c734bdf47feaf1174a717467c05 extends Twig_Template
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
        echo "<style>
\t.card_event {
\t  float: left;
\t  width: 100%!important;
\t}
\t.card_event .menu-content {
\t  margin: 0;
\t  padding: 0;
\t  list-style-type: none;
\t}
\t.card_event .menu-content::before, .card_event .menu-content::after {
\t  content: '';
\t  display: table;
\t}
\t.card_event .menu-content::after {
\t  clear: both;
\t}
\t.card_event .menu-content li {
\t  display: inline-block;
\t}
\t.card_event .menu-content a {
\t  color: #fff;
\t}
\t.card_event .menu-content span {
\t  position: absolute;
\t  left: 50%;
\t  top: 0;
\t  font-size: 10px;
\t  font-weight: 700;
\t  font-family: 'Open Sans';
\t  -webkit-transform: translate(-50%, 0);
\t\t\t  transform: translate(-50%, 0);
\t}
\t.card_event .wrapper {
\t  background-color: #fff;
\t  min-height: 540px;
\t  position: relative;
\t  overflow: hidden;
\t}
\t.card_event .wrapper:hover .data {
\t  -webkit-transform: translateY(0);
\t\t\t  transform: translateY(0);
\t}
\t.card_event .data {
\t  position: absolute;
\t  bottom: 0;
\t  width: 100%;
\t  -webkit-transform: translateY(calc(70px + 1em));
\t\t\t  transform: translateY(calc(70px + 1em));
\t  transition: -webkit-transform 0.3s;
\t  transition: transform 0.3s;
\t  transition: transform 0.3s, -webkit-transform 0.3s;
\t}
\t.card_event .data .content {
\t  padding: 1em;
\t  position: relative;
\t  z-index: 1;
\t}
\t.card_event .author {
\t  font-size: 12px;
\t}
\t.card_event .title {
\t  margin-top: 10px;
\t}
\t.card_event .text {
\t  height: 70px;
\t  margin: 0;
\t}
\t.card_event input[type='checkbox'] {
\t  display: none;
\t}
\t.card_event input[type='checkbox']:checked + .menu-content {
\t  -webkit-transform: translateY(-60px);
\t\t\t  transform: translateY(-60px);
\t}

\t.example-1 .wrapper {
\t  
\t}
\t.example-1 .date {
\t  position: absolute;
\t  top: 0;
\t  left: 0;
\t  background-color: #3565ae;
\t  color: #fff;
\t  padding: 0.8em;
\t  width: 80px;
\t}
\t.example-1 .date span {
\t  display: block;
\t  text-align: center;
\t}
\t.example-1 .date .day {
\t  font-weight: 700;
\t  font-size: 24px;
\t  text-shadow: 2px 3px 2px rgba(0, 0, 0, 0.18);
\t}
\t.example-1 .date .month {
\t  text-transform: uppercase;
\t}
\t.example-1 .date .month,
\t.example-1 .date .year {
\t  font-size: 12px;
\t}
\t.example-1 .content {
\t  background-color: #fff;
\t  box-shadow: 0 5px 30px 10px rgba(0, 0, 0, 0.3);
\t}
\t.example-1 .title a {
\t  color: #38488f;
\t  font-size: 20px;
\t}
\t.example-1 .title a:hover {
\t  text-decoration: underline;
\t}

\t.example-1 .menu-button {
\t  position: absolute;
\t  z-index: 999;
\t  top: 16px;
\t  right: 16px;
\t  width: 25px;
\t  text-align: center;
\t  cursor: pointer;
\t}
\t.example-1 .menu-button span {
\t  width: 5px;
\t  height: 5px;
\t  background-color: gray;
\t  color: gray;
\t  position: relative;
\t  display: inline-block;
\t  border-radius: 50%;
\t}
\t.example-1 .menu-button span::after, .example-1 .menu-button span::before {
\t  content: '';
\t  display: block;
\t  width: 5px;
\t  height: 5px;
\t  background-color: currentColor;
\t  position: absolute;
\t  border-radius: 50%;
\t}
\t.example-1 .menu-button span::before {
\t  left: -10px;
\t}
\t.example-1 .menu-button span::after {
\t  right: -10px;
\t}
\t.example-1 .menu-content {
\t  text-align: center;
\t  position: absolute;
\t  top: 0;
\t  left: 0;
\t  width: 100%;
\t  z-index: -1;
\t  transition: -webkit-transform 0.3s;
\t  transition: transform 0.3s;
\t  transition: transform 0.3s, -webkit-transform 0.3s;
\t  -webkit-transform: translateY(0);
\t\t\t  transform: translateY(0);
\t}
\t.example-1 .menu-content li {
\t  width: 33.333333%;
\t  float: left;
\t  background-color: #3565ae;
\t  height: 60px;
\t  position: relative;
\t}
\t.example-1 .menu-content a {
\t  position: absolute;
\t  top: 50%;
\t  left: 50%;
\t  -webkit-transform: translate(-50%, -50%);
\t\t\t  transform: translate(-50%, -50%);
\t  font-size: 24px;
\t}
\t.example-1 .menu-content span {
\t  top: -10px;
\t}

\t
\t.shadow {
\t  color: white;
\t  text-shadow: 2px 2px 4px #000000;
\t}
</style>

<div class=\"col-md-8\" style=\"padding: 0px;\">

<div class=\"row\">
";
        // line 192
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_article"]) ? $context["liste_article"] : $this->getContext($context, "liste_article")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 193
            echo "
\t<div class=\"col-md-6\">
\t\t<a href=\"";
            // line 195
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_detail_actualite", array("id" => $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "id"))), "html", null, true);
            echo "\" class=\"card h-100\" data-original-title=\"\" title=\"\" style=\"min-height: 500px;\">
\t\t\t<div class=\"card-body p-5\">
\t\t\t\t<div class=\"text-center\">
\t\t\t\t\t<img src=\"";
            // line 198
            if (($this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "imgservice") != null)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "imgservice"), "getwebpath")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/present.png"), "html", null, true);
            }
            echo "\" alt=\"\" style=\"width: 100%;\">
\t\t\t\t</div>
\t\t\t\t<h5>";
            // line 200
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "nom"), "html", null, true);
            echo "</h5>
\t\t\t\t<p class=\"card-text\">";
            // line 201
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "description"), "html", null, true);
            echo "</p>
\t\t\t</div>
\t\t</a>
    </div>
 
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 207
            echo "<div style=\"height: 400px; padding-top: 100px; background: #fff; margin-bottom: 15px;\">
\t<div style=\"text-align: center; display: block; width: 100%!important;\">
\t<span class=\"fa fa-frown-o\"></span> Aucune données disponible pour cette requête.</br>
\t<hr style=\"width: 100px; border-bottom: 1px solid red;\">
\t</div>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 214
        echo "</div>


<span class=\"clearfix\"></span>
";
        // line 218
        if (((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) > 0)) {
            // line 219
            echo "
";
            // line 220
            if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) > 1) && ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) <= (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"))))) {
                // line 221
                $context["pagepre"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 1);
            } else {
                // line 223
                echo "\t";
                $context["pagepre"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
            }
            // line 225
            echo "
";
            // line 226
            if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) < (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))) {
                // line 227
                echo "\t";
                $context["pagesuiv"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 1);
            } else {
                // line 229
                echo "\t";
                $context["pagesuiv"] = 1;
            }
            // line 231
            echo "
";
            // line 232
            if (((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) < 5)) {
                // line 233
                echo "\t";
                $context["debut"] = 1;
                // line 234
                echo "\t";
                $context["fin"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
            } else {
                // line 236
                echo "\t";
                if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) > 2) && ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) < ((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) - 2)))) {
                    // line 237
                    echo "\t\t";
                    $context["debut"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 2);
                    // line 238
                    echo "\t\t";
                    if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2) >= (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))) {
                        // line 239
                        echo "\t\t\t";
                        $context["fin"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
                        // line 240
                        echo "\t\t";
                    } else {
                        // line 241
                        echo "\t\t\t";
                        $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2);
                        // line 242
                        echo "\t\t";
                    }
                    // line 243
                    echo "\t";
                } else {
                    // line 244
                    echo "\t\t";
                    if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) <= 2)) {
                        // line 245
                        echo "\t\t\t";
                        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == 1)) {
                            // line 246
                            echo "\t\t\t\t";
                            $context["debut"] = 1;
                            // line 247
                            echo "\t\t\t\t";
                            $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 3);
                            // line 248
                            echo "\t\t\t";
                        } else {
                            // line 249
                            echo "\t\t\t\t";
                            $context["debut"] = 1;
                            // line 250
                            echo "\t\t\t\t";
                            $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2);
                            // line 251
                            echo "\t\t\t";
                        }
                        // line 252
                        echo "\t\t";
                    } else {
                        // line 253
                        echo "\t\t\t";
                        $context["debut"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 2);
                        // line 254
                        echo "\t\t\t";
                        if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2) >= (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))) {
                            // line 255
                            echo "\t\t\t\t";
                            $context["fin"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
                            // line 256
                            echo "\t\t\t";
                        } else {
                            // line 257
                            echo "\t\t\t\t";
                            $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2);
                            // line 258
                            echo "\t\t\t";
                        }
                        // line 259
                        echo "\t\t";
                    }
                    // line 260
                    echo "\t";
                }
                // line 261
                echo "\t
";
            }
            // line 263
            echo "<div>
  <div class=\"pagination\"> 
\t<a href=\"";
            // line 265
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => 1)), "html", null, true);
            echo "\" title=\"Première page\" class=\"page gradient\"><span class=\"fa fa-fast-backward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 266
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["pagepre"]) ? $context["pagepre"] : $this->getContext($context, "pagepre")))), "html", null, true);
            echo "\" title=\"Page précedente\" class=\"page gradient\"><span class=\"fa fa-step-backward\" style=\"font-size: 8px;\"></span></a>
\t";
            // line 267
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range((isset($context["debut"]) ? $context["debut"] : $this->getContext($context, "debut")), (isset($context["fin"]) ? $context["fin"] : $this->getContext($context, "fin"))));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 268
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
            // line 270
            echo "\t<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["pagesuiv"]) ? $context["pagesuiv"] : $this->getContext($context, "pagesuiv")))), "html", null, true);
            echo "\"  title=\"Page suivante\" class=\"page gradient\"><span class=\"fa fa-step-forward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 271
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))), "html", null, true);
            echo "\" title=\"Dernière page\" class=\"page gradient\"><span class=\"fa fa-fast-forward\" style=\"font-size: 8px;\"></span></a>
   </div>
<div class=\"clearfix\"></div>
</div>
";
        } else {
            // line 276
            echo "<div>
  <div class=\"pagination\">
\t<a href=\"";
            // line 278
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" title=\"Première page\" class=\"page gradient\"><span class=\"fa fa-fast-backward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 279
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" title=\"Page précedente\" class=\"page gradient\"><span class=\"fa fa-step-backward\" style=\"font-size: 8px;\"></span></a>

\t<a href=\"";
            // line 281
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" class=\"page active\">0</a>

\t<a href=\"";
            // line 283
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\"  title=\"Page suivante\" class=\"page gradient\"><span class=\"fa fa-step-forward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 284
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" title=\"Dernière page\" class=\"page gradient\"><span class=\"fa fa-fast-forward\" style=\"font-size: 8px;\"></span></a>
   </div>
<div class=\"clearfix\"></div>
</div>
";
        }
        // line 288
        echo "\t
\t\t\t\t
</div>";
    }

    public function getTemplateName()
    {
        return "ProduitServiceBundle:Apropos:evenement.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  463 => 288,  455 => 284,  451 => 283,  446 => 281,  441 => 279,  437 => 278,  433 => 276,  425 => 271,  420 => 270,  403 => 268,  399 => 267,  395 => 266,  391 => 265,  387 => 263,  383 => 261,  380 => 260,  377 => 259,  374 => 258,  371 => 257,  368 => 256,  365 => 255,  362 => 254,  359 => 253,  356 => 252,  353 => 251,  350 => 250,  347 => 249,  344 => 248,  341 => 247,  338 => 246,  335 => 245,  332 => 244,  329 => 243,  326 => 242,  323 => 241,  320 => 240,  317 => 239,  314 => 238,  311 => 237,  308 => 236,  304 => 234,  301 => 233,  299 => 232,  296 => 231,  292 => 229,  288 => 227,  286 => 226,  283 => 225,  279 => 223,  276 => 221,  274 => 220,  271 => 219,  269 => 218,  263 => 214,  251 => 207,  240 => 201,  236 => 200,  227 => 198,  221 => 195,  217 => 193,  212 => 192,  19 => 1,);
    }
}
