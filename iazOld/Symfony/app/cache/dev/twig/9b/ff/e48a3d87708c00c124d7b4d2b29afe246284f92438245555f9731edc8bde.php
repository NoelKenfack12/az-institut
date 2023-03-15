<?php

/* ProduitServiceBundle:Apropos:aide.html.twig */
class __TwigTemplate_9bffe48a3d87708c00c124d7b4d2b29afe246284f92438245555f9731edc8bde extends Twig_Template
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
.topic{
  padding:20px;
  padding-top:0px;
  padding-bottom:0px;
  border-bottom:solid 1px #ebebeb;
  width: 100%;
}
.openpanel{
  cursor:pointer;
  display:block;
  padding:0px;
}
.openpanel:hover{
  opacity:0.7;
}
.expanded{
  background-color:#f5f5f5;
  transition: all .3s ease-in-out;
}
.question{
  padding-top:30px;
  padding-right: 40px;
  padding-bottom:20px;
  font-size: 18px;
  font-weight:500;
  color: #526ee4;
}
.answer{
  font-size:16px;
  line-height:26px;
  display:none;
  margin-bottom:30px;
  text-align:justify;
  padding-left:20px;
  padding-right:20px;
}
.faq-t{
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
  display: inline-block;
  float:right;
  position:relative;
  top:-55px;
  right:10px;
  width: 10px;
  height: 10px;
  background: transparent;
  border-left: 2px solid #ccc;
  border-bottom: 2px solid #ccc;
  transition: all .3s ease-in-out;
}
.faq-o{
  top:-50px;
   -moz-transform: rotate(-224deg);
  -ms-transform: rotate(-224deg);
  -webkit-transform: rotate(-224deg);
  transform: rotate(-224deg);
}
@media only screen and (max-width: 480px){
  .faq-t{display:none;}
  .question{
  padding-right: 0px;
}
  main{
  padding:10px;
}
  .answer{
  margin-bottom:30px;
  padding-left:0px;
  padding-right:0px;
}
}
</style>

<div class=\"col-md-8\">

<main style=\"box-shadow:0px 0px 2px rgba(0,0,0,0.02); background: #fff; margin: 0px; min-width: 100%; min-height: 400px; padding: 7px;\">
";
        // line 81
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["liste_article"]) ? $context["liste_article"] : $this->getContext($context, "liste_article")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 82
            echo "<div class=\"topic\">
\t<div class=\"openpanel\">
\t  <h2 class=\"question\"><img src=\"";
            // line 84
            if (($this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "imgservice") != null)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "imgservice"), "getwebpath")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("templateofferts/images/3132.jpg"), "html", null, true);
            }
            echo "\" alt=\"..\" style=\"width: 30px; height: 30px; border-radius: 15px;\">
\t  ";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "nom"), "html", null, true);
            echo "
\t  </h2>
\t  <span class=\"faq-t\"></span>
\t</div>
\t
\t<div class=\"answer\" style=\"margin-bottom: 20px;\">
\t\t<h5>
\t\t\t";
            // line 92
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["service"]) ? $context["service"] : $this->getContext($context, "service")), "description"), "html", null, true);
            echo "
\t\t</h5>
\t</div>
</div>
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 97
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
        // line 104
        echo "</main>


<span class=\"clearfix\"></span>
";
        // line 108
        if (((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) > 0)) {
            // line 109
            echo "
";
            // line 110
            if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) > 1) && ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) <= (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"))))) {
                // line 111
                $context["pagepre"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 1);
            } else {
                // line 113
                echo "\t";
                $context["pagepre"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
            }
            // line 115
            echo "
";
            // line 116
            if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) < (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))) {
                // line 117
                echo "\t";
                $context["pagesuiv"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 1);
            } else {
                // line 119
                echo "\t";
                $context["pagesuiv"] = 1;
            }
            // line 121
            echo "
";
            // line 122
            if (((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) < 5)) {
                // line 123
                echo "\t";
                $context["debut"] = 1;
                // line 124
                echo "\t";
                $context["fin"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
            } else {
                // line 126
                echo "\t";
                if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) > 2) && ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) < ((isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")) - 2)))) {
                    // line 127
                    echo "\t\t";
                    $context["debut"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 2);
                    // line 128
                    echo "\t\t";
                    if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2) >= (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))) {
                        // line 129
                        echo "\t\t\t";
                        $context["fin"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
                        // line 130
                        echo "\t\t";
                    } else {
                        // line 131
                        echo "\t\t\t";
                        $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2);
                        // line 132
                        echo "\t\t";
                    }
                    // line 133
                    echo "\t";
                } else {
                    // line 134
                    echo "\t\t";
                    if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) <= 2)) {
                        // line 135
                        echo "\t\t\t";
                        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) == 1)) {
                            // line 136
                            echo "\t\t\t\t";
                            $context["debut"] = 1;
                            // line 137
                            echo "\t\t\t\t";
                            $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 3);
                            // line 138
                            echo "\t\t\t";
                        } else {
                            // line 139
                            echo "\t\t\t\t";
                            $context["debut"] = 1;
                            // line 140
                            echo "\t\t\t\t";
                            $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2);
                            // line 141
                            echo "\t\t\t";
                        }
                        // line 142
                        echo "\t\t";
                    } else {
                        // line 143
                        echo "\t\t\t";
                        $context["debut"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 2);
                        // line 144
                        echo "\t\t\t";
                        if ((((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2) >= (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))) {
                            // line 145
                            echo "\t\t\t\t";
                            $context["fin"] = (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage"));
                            // line 146
                            echo "\t\t\t";
                        } else {
                            // line 147
                            echo "\t\t\t\t";
                            $context["fin"] = ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 2);
                            // line 148
                            echo "\t\t\t";
                        }
                        // line 149
                        echo "\t\t";
                    }
                    // line 150
                    echo "\t";
                }
                // line 151
                echo "\t
";
            }
            // line 153
            echo "<div>
  <div class=\"pagination\"> 
\t<a href=\"";
            // line 155
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => 1)), "html", null, true);
            echo "\" title=\"Première page\" class=\"page gradient\"><span class=\"fa fa-fast-backward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 156
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["pagepre"]) ? $context["pagepre"] : $this->getContext($context, "pagepre")))), "html", null, true);
            echo "\" title=\"Page précedente\" class=\"page gradient\"><span class=\"fa fa-step-backward\" style=\"font-size: 8px;\"></span></a>
\t";
            // line 157
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range((isset($context["debut"]) ? $context["debut"] : $this->getContext($context, "debut")), (isset($context["fin"]) ? $context["fin"] : $this->getContext($context, "fin"))));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 158
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
            // line 160
            echo "\t<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["pagesuiv"]) ? $context["pagesuiv"] : $this->getContext($context, "pagesuiv")))), "html", null, true);
            echo "\"  title=\"Page suivante\" class=\"page gradient\"><span class=\"fa fa-step-forward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 161
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["nombrepage"]) ? $context["nombrepage"] : $this->getContext($context, "nombrepage")))), "html", null, true);
            echo "\" title=\"Dernière page\" class=\"page gradient\"><span class=\"fa fa-fast-forward\" style=\"font-size: 8px;\"></span></a>
   </div>
<div class=\"clearfix\"></div>
</div>
";
        } else {
            // line 166
            echo "<div>
  <div class=\"pagination\">
\t<a href=\"";
            // line 168
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" title=\"Première page\" class=\"page gradient\"><span class=\"fa fa-fast-backward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 169
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" title=\"Page précedente\" class=\"page gradient\"><span class=\"fa fa-step-backward\" style=\"font-size: 8px;\"></span></a>

\t<a href=\"";
            // line 171
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" class=\"page active\">0</a>

\t<a href=\"";
            // line 173
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\"  title=\"Page suivante\" class=\"page gradient\"><span class=\"fa fa-step-forward\" style=\"font-size: 8px;\"></span></a>
\t<a href=\"";
            // line 174
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("produit_service_apropos_denous", array("position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), "idtype" => (isset($context["idtype"]) ? $context["idtype"] : $this->getContext($context, "idtype")), "page" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))), "html", null, true);
            echo "\" title=\"Dernière page\" class=\"page gradient\"><span class=\"fa fa-fast-forward\" style=\"font-size: 8px;\"></span></a>
   </div>
<div class=\"clearfix\"></div>
</div>
";
        }
        // line 178
        echo "\t
\t\t\t\t
</div>
<script type=\"text/javascript\">
\$('.back_step_one').click(function(){
\t\$('.step_card_two').hide();
\t\$('.step_card_one').show();
\t\$('.step-two-card').removeClass('completed');
});

\$(\".openpanel\").click(function(){
  var container = \$(this).parents(\".topic\");
  var answer = container.find(\".answer\");
  var trigger = container.find(\".faq-t\");
  
  answer.slideToggle(200);
  
  if (trigger.hasClass(\"faq-o\")){
    trigger.removeClass(\"faq-o\");
  } else {
    trigger.addClass(\"faq-o\");
  }
  
  if(container.hasClass(\"expanded\")){
    container.removeClass(\"expanded\");
  }
  else {
    container.addClass(\"expanded\");
  }
});
</script>";
    }

    public function getTemplateName()
    {
        return "ProduitServiceBundle:Apropos:aide.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  350 => 178,  342 => 174,  338 => 173,  333 => 171,  328 => 169,  324 => 168,  320 => 166,  312 => 161,  307 => 160,  290 => 158,  286 => 157,  282 => 156,  278 => 155,  274 => 153,  270 => 151,  267 => 150,  264 => 149,  261 => 148,  258 => 147,  255 => 146,  252 => 145,  249 => 144,  246 => 143,  243 => 142,  240 => 141,  237 => 140,  234 => 139,  231 => 138,  228 => 137,  225 => 136,  222 => 135,  219 => 134,  216 => 133,  213 => 132,  210 => 131,  207 => 130,  204 => 129,  201 => 128,  198 => 127,  195 => 126,  191 => 124,  188 => 123,  186 => 122,  183 => 121,  179 => 119,  175 => 117,  173 => 116,  170 => 115,  166 => 113,  163 => 111,  161 => 110,  158 => 109,  156 => 108,  150 => 104,  138 => 97,  128 => 92,  118 => 85,  110 => 84,  106 => 82,  101 => 81,  19 => 1,);
    }
}
