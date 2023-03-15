<?php

/* ProduitServiceBundle:Apropos:galeriephoto.html.twig */
class __TwigTemplate_3b4101498ae5c77ed1a693d78b8344c2da60a3aa4fa9b2bf2f8fd1b39686c174 extends Twig_Template
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
.hover-effect {
    float: left;
    text-align: center;
    height: 250px;
    overflow: hidden;
    position: relative;
    display: inline-block;
    vertical-align: top;
    margin: 7px 0px;
        -moz-transition: 0.3s;
        -o-transition: 0.3s;
        -webkit-transition: 0.3s;
        transition: 0.3s;
}

    .hover-effect img {
        -moz-transition: 0.3s;
        -o-transition: 0.3s;
        -webkit-transition: 0.3s;
        transition: 0.3s;
        background-size: cover;
        height: 100%;
       width: 100%;
    }

    .hover-effect .description {
        position: absolute;
        top: 0;
        background: rgba(0,0,0,0.8);
        width: 100%;
        height: 100%;
        opacity: 0;
        -moz-transition: 0.3s;
        -o-transition: 0.3s;
        -webkit-transition: 0.3s;
        transition: 0.3s;
    }

.hover-effect .description h2,
.hover-effect .description p{
   max-width: 90%;
   display: block;
   margin: 0 auto;
}


        .hover-effect .description h2 {
            font-size: 36px;
            -moz-transform: translateY(-25px);
            -ms-transform: translateY(-25px);
            -o-transform: translateY(-25px);
            -webkit-transform: translateY(-25px);
            transform: translateY(-25px);
            -moz-transition: 0.3s;
            -o-transition: 0.3s;
            -webkit-transition: 0.3s;
            transition: 0.3s;
            padding-top: 55px;
        }

    .hover-effect .description p {
        font-size: 24px;
        -moz-transform: translateY(25px);
        -ms-transform: translateY(25px);
        -o-transform: translateY(25px);
        -webkit-transform: translateY(25px);
        transform: translateY(25px);
        -moz-transition: 0.3s;
        -o-transition: 0.3s;
        -webkit-transition: 0.3s;
        transition: 0.3s;
    }

    .hover-effect:hover img {
        -moz-transform: scale(1.1);
        -ms-transform: scale(1.1);
        -o-transform: scale(1.1);
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

.hover-effect:hover .description{
   opacity: 1;
   cursor: pointer;
}

    .hover-effect:hover .description h2,
    .hover-effect:hover .description p {
        -moz-transform: translateY(0);
        -ms-transform: translateY(0);
        -o-transform: translateY(0);
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }

@media(max-width: 1200px){
   .hover-effect {
    width: calc(50% - 30px);
}
}

@media(max-width: 480px){
   .hover-effect {
    width: calc(100% - 30px);
      float: none;
}
   .hover-effect .description h2{
    font-size: 30px;
}
   .hover-effect .description p{
    font-size: 18px;
}
}
</style>

<div class=\"col-md-8\">

<main style=\"min-width: 100%; min-height: 300px; \">

<div class=\"row\">
";
        // line 122
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_article"]) ? $context["liste_article"] : $this->getContext($context, "liste_article")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 123
            echo "<div class=\"col-md-6\">
<a href=\"#!\" class=\"toggle-overlay-article\" value=\"";
            // line 124
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "id"), "html", null, true);
            echo "\" style=\"margin-bottom: 7px; min-height: 300px; padding: 15px; display: block!important; box-shadow:0px 0px 2px rgba(0,0,0,0.02); background: #fff;\">
<div class=\"hover-effect\">
<img src=\"";
            // line 126
            if (($this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "imgservice") != null)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "imgservice"), "getwebpath")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/present.png"), "html", null, true);
            }
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "nom"), "html", null, true);
            echo "\" />
<div class=\"description\" style=\"color: #fff;\">
\t<h2 style=\"font-size: 20px;\">
\t\t";
            // line 129
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "nom"), "html", null, true);
            echo "
\t</h2>
\t<p style=\"font-size: 13px;\">
\t\t";
            // line 132
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "description"), "html", null, true);
            echo "
\t</p>
\t<button class=\"btn btn-primary\" style=\"margin-top: 15px;\">
\t\tGalerie <span class=\"fa fa-angle-right\"></span>
\t</button>
</div>
</div>
</a>
</div>
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 142
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
        // line 149
        echo "
</div>
</main>


<span class=\"clearfix\"></span>
";
        // line 155
        if (((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) > 0)) {
            // line 156
            echo "
";
            // line 157
            if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) > 1) && ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) <= (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"))))) {
                // line 158
                $context["pagepre"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 1);
            } else {
                // line 160
                echo "\t";
                $context["pagepre"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
            }
            // line 162
            echo "
";
            // line 163
            if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) < (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))) {
                // line 164
                echo "\t";
                $context["pagesuiv"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 1);
            } else {
                // line 166
                echo "\t";
                $context["pagesuiv"] = 1;
            }
            // line 168
            echo "
";
            // line 169
            if (((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) < 5)) {
                // line 170
                echo "\t";
                $context["debut"] = 1;
                // line 171
                echo "\t";
                $context["fin"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
            } else {
                // line 173
                echo "\t";
                if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) > 2) && ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) < ((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) - 2)))) {
                    // line 174
                    echo "\t\t";
                    $context["debut"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 2);
                    // line 175
                    echo "\t\t";
                    if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2) >= (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))) {
                        // line 176
                        echo "\t\t\t";
                        $context["fin"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
                        // line 177
                        echo "\t\t";
                    } else {
                        // line 178
                        echo "\t\t\t";
                        $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2);
                        // line 179
                        echo "\t\t";
                    }
                    // line 180
                    echo "\t";
                } else {
                    // line 181
                    echo "\t\t";
                    if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) <= 2)) {
                        // line 182
                        echo "\t\t\t";
                        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == 1)) {
                            // line 183
                            echo "\t\t\t\t";
                            $context["debut"] = 1;
                            // line 184
                            echo "\t\t\t\t";
                            $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 3);
                            // line 185
                            echo "\t\t\t";
                        } else {
                            // line 186
                            echo "\t\t\t\t";
                            $context["debut"] = 1;
                            // line 187
                            echo "\t\t\t\t";
                            $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2);
                            // line 188
                            echo "\t\t\t";
                        }
                        // line 189
                        echo "\t\t";
                    } else {
                        // line 190
                        echo "\t\t\t";
                        $context["debut"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 2);
                        // line 191
                        echo "\t\t\t";
                        if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2) >= (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))) {
                            // line 192
                            echo "\t\t\t\t";
                            $context["fin"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
                            // line 193
                            echo "\t\t\t";
                        } else {
                            // line 194
                            echo "\t\t\t\t";
                            $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2);
                            // line 195
                            echo "\t\t\t";
                        }
                        // line 196
                        echo "\t\t";
                    }
                    // line 197
                    echo "\t";
                }
                // line 198
                echo "\t
";
            }
            // line 200
            echo "<div>
  <div class=\"pagination\"> 
\t<a href=\"";
            // line 202
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => 1)), "html", null, true);
            echo "\" title=\"Première page\" class=\"page gradient\"><span class=\"fa fa-fast-backward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 203
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["pagepre"]) ? $context["pagepre"] : $this->getContext($context, "pagepre")))), "html", null, true);
            echo "\" title=\"Page précedente\" class=\"page gradient\"><span class=\"fa fa-step-backward\" style=\"font-size: 8px;\"></span></a>
\t";
            // line 204
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range((isset($context["debut"]) ? $context["debut"] : $this->getContext($context, "debut")), (isset($context["fin"]) ? $context["fin"] : $this->getContext($context, "fin"))));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 205
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
            // line 207
            echo "\t<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["pagesuiv"]) ? $context["pagesuiv"] : $this->getContext($context, "pagesuiv")))), "html", null, true);
            echo "\"  title=\"Page suivante\" class=\"page gradient\"><span class=\"fa fa-step-forward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 208
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))), "html", null, true);
            echo "\" title=\"Dernière page\" class=\"page gradient\"><span class=\"fa fa-fast-forward\" style=\"font-size: 8px;\"></span></a>
   </div>
<div class=\"clearfix\"></div>
</div>
";
        } else {
            // line 213
            echo "<div>
  <div class=\"pagination\">
\t<a href=\"";
            // line 215
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" title=\"Première page\" class=\"page gradient\"><span class=\"fa fa-fast-backward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 216
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" title=\"Page précedente\" class=\"page gradient\"><span class=\"fa fa-step-backward\" style=\"font-size: 8px;\"></span></a>

\t<a href=\"";
            // line 218
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" class=\"page active\">0</a>

\t<a href=\"";
            // line 220
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\"  title=\"Page suivante\" class=\"page gradient\"><span class=\"fa fa-step-forward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 221
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" title=\"Dernière page\" class=\"page gradient\"><span class=\"fa fa-fast-forward\" style=\"font-size: 8px;\"></span></a>
   </div>
<div class=\"clearfix\"></div>
</div>
";
        }
        // line 225
        echo "\t
\t\t\t\t
</div>
<script type=\"text/javascript\">

</script>";
    }

    public function getTemplateName()
    {
        return "ProduitServiceBundle:Apropos:galeriephoto.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  402 => 225,  394 => 221,  390 => 220,  385 => 218,  380 => 216,  376 => 215,  372 => 213,  364 => 208,  359 => 207,  342 => 205,  338 => 204,  334 => 203,  330 => 202,  326 => 200,  322 => 198,  319 => 197,  316 => 196,  313 => 195,  310 => 194,  307 => 193,  304 => 192,  301 => 191,  298 => 190,  295 => 189,  292 => 188,  289 => 187,  286 => 186,  283 => 185,  280 => 184,  277 => 183,  274 => 182,  271 => 181,  268 => 180,  265 => 179,  262 => 178,  259 => 177,  256 => 176,  253 => 175,  250 => 174,  247 => 173,  243 => 171,  240 => 170,  238 => 169,  235 => 168,  231 => 166,  227 => 164,  225 => 163,  222 => 162,  218 => 160,  215 => 158,  213 => 157,  210 => 156,  208 => 155,  200 => 149,  188 => 142,  173 => 132,  167 => 129,  155 => 126,  150 => 124,  147 => 123,  142 => 122,  19 => 1,);
    }
}
