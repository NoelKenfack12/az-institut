<?php

/* ProduitServiceBundle:Apropos:mediatheque.html.twig */
class __TwigTemplate_589f0ad390f23cbd8cc3e4e25bcd60889a4a7b6c1f82f3c7f6c9c79bf17ffa83 extends Twig_Template
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
.cardsvideo {
  display: -webkit-flex;
  display: flex;
  -webkit-justify-content: center;
  justify-content: center;
  -webkit-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  min-height: 400px;
}

.cardvideo {
  position: relative;
  margin-bottom: 20px;
  padding-bottom: 30px;
  background: #fefff9;
  color: #363636;
  text-decoration: none;
  -moz-box-shadow: rgba(0, 0, 0, 0.19) 0 0 8px 0;
  -webkit-box-shadow: rgba(0, 0, 0, 0.19) 0 0 8px 0;
  box-shadow: rgba(0, 0, 0, 0.19) 0 0 8px 0;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}

  .cardvideo {
    width: 100%;
  }

.cardvideo span {
  display: block;
}
.cardvideo .card-summary {
  padding: 5% 5% 3% 5%;
  height: 100px;
}
.cardvideo .card-header {
  position: relative;
  height: 175px;
  overflow: hidden;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  background-color: rgba(255, 255, 255, 0.15);
  background-blend-mode: overlay;
  -moz-border-radius: 4px 4px 0 0;
  -webkit-border-radius: 4px;
  border-radius: 4px 4px 0 0;
}
.cardvideo .card-header:hover, .cardvideo .card-header:focus {
  background-color: rgba(255, 255, 255, 0);
}
.cardvideo .card-title {
  background: rgba(53, 101, 174, 0.85);
  padding: 3.5% 0 2.5% 0;
  color: white;
  font-family: 'Roboto Condensed', sans-serif;
  text-transform: uppercase;
  position: absolute;
  bottom: 0;
  width: 100%;
}
.cardvideo .card-title h3 {
  font-size: 1.2em;
  line-height: 1.2;
  padding: 0 3.5%;
  margin: 0;
}
.cardvideo .card-meta {
  max-height: 0;
  overflow: hidden;
  color: #666;
  font-size: .78em;
  text-transform: uppercase;
  position: absolute;
  bottom: 5%;
  padding: 0 5%;
  -moz-transition-property: max-height;
  -o-transition-property: max-height;
  -webkit-transition-property: max-height;
  transition-property: max-height;
  -moz-transition-duration: 0.4s;
  -o-transition-duration: 0.4s;
  -webkit-transition-duration: 0.4s;
  transition-duration: 0.4s;
  -moz-transition-timing-function: ease-in-out;
  -o-transition-timing-function: ease-in-out;
  -webkit-transition-timing-function: ease-in-out;
  transition-timing-function: ease-in-out;
}
.cardvideo:hover, .cardvideo:focus {
  background: white;
  -moz-box-shadow: rgba(0, 0, 0, 0.45) 0px 0px 20px 0px;
  -webkit-box-shadow: rgba(0, 0, 0, 0.45) 0px 0px 20px 0px;
  box-shadow: rgba(0, 0, 0, 0.45) 0px 0px 20px 0px;
}
.cardvideo:hover .card-title, .cardvideo:focus .card-title {
  background: rgba(157, 187, 63, 0.95);
}
.cardvideo:hover .card-meta, .cardvideo:focus .card-meta {
  max-height: 1em;
}


* {
  -moz-transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, -moz-transform;
  -o-transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, -o-transform;
  -webkit-transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, -webkit-transform;
  transition-property: background-color, border-color, box-shadow, color, opacity, text-shadow, transform;
  -moz-transition-duration: 0.2s;
  -o-transition-duration: 0.2s;
  -webkit-transition-duration: 0.2s;
  transition-duration: 0.2s;
  -moz-transition-timing-function: linear;
  -o-transition-timing-function: linear;
  -webkit-transition-timing-function: linear;
  transition-timing-function: linear;
}

.chat-hero-play-btn {
    background-image: url(//d1eipm3vz40hy0.cloudfront.net/images/p-chat/2017/icon-play-btn-algae.svg);
    background-repeat: no-repeat;
    background-size: 32px 32px;
    width: 32px;
    height: 32px;
    display: inline-block!important;
    margin-right: 10px;
\tfloat: left;
}
.chat-hero-video-text {
    border-bottom: 2px solid transparent;
\tdisplay: inline-block!important;
\tmargin-top: 6px;
}
</style>

<div class=\"col-md-8\">
<div class=\"row\" style=\"width: 100%!important;\">
";
        // line 143
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_article"]) ? $context["liste_article"] : $this->getContext($context, "liste_article")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 144
            echo "\t<div class=\"col-md-6\">
\t<div class=\"cardsvideo\">
\t<a class=\"cardvideo toggle-overlay-article\" value=\"";
            // line 146
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "id"), "html", null, true);
            echo "\" href=\"#!\">
\t\t<span class=\"card-header\" style=\"background-image: url(";
            // line 147
            if (($this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "imgservice") != null)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "imgservice"), "getwebpath")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/present.png"), "html", null, true);
            }
            echo ");\">
\t\t\t<span class=\"card-title\">
\t\t\t\t<h3>";
            // line 149
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "nom"), "html", null, true);
            echo "</h3>
\t\t\t</span>
\t\t</span>
\t\t<span class=\"card-summary\">
\t\t\t";
            // line 153
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "description"), "html", null, true);
            echo " 
\t\t<span style=\"margin-top: 15px;\">
\t\t<span class=\"chat-hero-play-btn\"></span> <span class=\"chat-hero-video-text\">Lire les vidéos</span>
\t\t</span>
\t\t</span>
\t\t<span class=\"card-meta\">
\t\t\tPublier : ";
            // line 159
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "date"), "M"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "date"), "d"), "html", null, true);
            echo " , ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "date"), "Y"), "html", null, true);
            echo " 
\t\t</span>
\t</a>
\t</div>
\t</div>
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 165
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
        // line 172
        echo "</div>


<span class=\"clearfix\"></span>
";
        // line 176
        if (((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) > 0)) {
            // line 177
            echo "
";
            // line 178
            if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) > 1) && ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) <= (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"))))) {
                // line 179
                $context["pagepre"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 1);
            } else {
                // line 181
                echo "\t";
                $context["pagepre"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
            }
            // line 183
            echo "
";
            // line 184
            if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) < (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))) {
                // line 185
                echo "\t";
                $context["pagesuiv"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 1);
            } else {
                // line 187
                echo "\t";
                $context["pagesuiv"] = 1;
            }
            // line 189
            echo "
";
            // line 190
            if (((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) < 5)) {
                // line 191
                echo "\t";
                $context["debut"] = 1;
                // line 192
                echo "\t";
                $context["fin"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
            } else {
                // line 194
                echo "\t";
                if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) > 2) && ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) < ((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) - 2)))) {
                    // line 195
                    echo "\t\t";
                    $context["debut"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 2);
                    // line 196
                    echo "\t\t";
                    if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2) >= (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))) {
                        // line 197
                        echo "\t\t\t";
                        $context["fin"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
                        // line 198
                        echo "\t\t";
                    } else {
                        // line 199
                        echo "\t\t\t";
                        $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2);
                        // line 200
                        echo "\t\t";
                    }
                    // line 201
                    echo "\t";
                } else {
                    // line 202
                    echo "\t\t";
                    if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) <= 2)) {
                        // line 203
                        echo "\t\t\t";
                        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == 1)) {
                            // line 204
                            echo "\t\t\t\t";
                            $context["debut"] = 1;
                            // line 205
                            echo "\t\t\t\t";
                            $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 3);
                            // line 206
                            echo "\t\t\t";
                        } else {
                            // line 207
                            echo "\t\t\t\t";
                            $context["debut"] = 1;
                            // line 208
                            echo "\t\t\t\t";
                            $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2);
                            // line 209
                            echo "\t\t\t";
                        }
                        // line 210
                        echo "\t\t";
                    } else {
                        // line 211
                        echo "\t\t\t";
                        $context["debut"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 2);
                        // line 212
                        echo "\t\t\t";
                        if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2) >= (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))) {
                            // line 213
                            echo "\t\t\t\t";
                            $context["fin"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
                            // line 214
                            echo "\t\t\t";
                        } else {
                            // line 215
                            echo "\t\t\t\t";
                            $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2);
                            // line 216
                            echo "\t\t\t";
                        }
                        // line 217
                        echo "\t\t";
                    }
                    // line 218
                    echo "\t";
                }
                // line 219
                echo "\t
";
            }
            // line 221
            echo "<div>
  <div class=\"pagination\"> 
\t<a href=\"";
            // line 223
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => 1)), "html", null, true);
            echo "\" title=\"Première page\" class=\"page gradient\"><span class=\"fa fa-fast-backward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 224
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["pagepre"]) ? $context["pagepre"] : $this->getContext($context, "pagepre")))), "html", null, true);
            echo "\" title=\"Page précedente\" class=\"page gradient\"><span class=\"fa fa-step-backward\" style=\"font-size: 8px;\"></span></a>
\t";
            // line 225
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range((isset($context["debut"]) ? $context["debut"] : $this->getContext($context, "debut")), (isset($context["fin"]) ? $context["fin"] : $this->getContext($context, "fin"))));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 226
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
            // line 228
            echo "\t<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["pagesuiv"]) ? $context["pagesuiv"] : $this->getContext($context, "pagesuiv")))), "html", null, true);
            echo "\"  title=\"Page suivante\" class=\"page gradient\"><span class=\"fa fa-step-forward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 229
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))), "html", null, true);
            echo "\" title=\"Dernière page\" class=\"page gradient\"><span class=\"fa fa-fast-forward\" style=\"font-size: 8px;\"></span></a>
   </div>
<div class=\"clearfix\"></div>
</div>
";
        } else {
            // line 234
            echo "<div>
  <div class=\"pagination\">
\t<a href=\"";
            // line 236
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" title=\"Première page\" class=\"page gradient\"><span class=\"fa fa-fast-backward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 237
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" title=\"Page précedente\" class=\"page gradient\"><span class=\"fa fa-step-backward\" style=\"font-size: 8px;\"></span></a>

\t<a href=\"";
            // line 239
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" class=\"page active\">0</a>

\t<a href=\"";
            // line 241
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\"  title=\"Page suivante\" class=\"page gradient\"><span class=\"fa fa-step-forward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 242
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" title=\"Dernière page\" class=\"page gradient\"><span class=\"fa fa-fast-forward\" style=\"font-size: 8px;\"></span></a>
   </div>
<div class=\"clearfix\"></div>
</div>
";
        }
        // line 246
        echo "\t
\t\t\t\t
</div>";
    }

    public function getTemplateName()
    {
        return "ProduitServiceBundle:Apropos:mediatheque.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  428 => 246,  420 => 242,  416 => 241,  411 => 239,  406 => 237,  402 => 236,  398 => 234,  390 => 229,  385 => 228,  368 => 226,  364 => 225,  360 => 224,  356 => 223,  352 => 221,  348 => 219,  345 => 218,  342 => 217,  339 => 216,  336 => 215,  333 => 214,  330 => 213,  327 => 212,  324 => 211,  321 => 210,  318 => 209,  315 => 208,  312 => 207,  309 => 206,  306 => 205,  303 => 204,  300 => 203,  297 => 202,  294 => 201,  291 => 200,  288 => 199,  285 => 198,  282 => 197,  279 => 196,  276 => 195,  273 => 194,  269 => 192,  266 => 191,  264 => 190,  261 => 189,  257 => 187,  253 => 185,  251 => 184,  248 => 183,  244 => 181,  241 => 179,  239 => 178,  236 => 177,  234 => 176,  228 => 172,  216 => 165,  201 => 159,  192 => 153,  185 => 149,  176 => 147,  172 => 146,  168 => 144,  163 => 143,  19 => 1,);
    }
}
