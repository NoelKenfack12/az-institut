<?php

/* GeneralTemplateBundle:Menu:testinscriptionnewsletter.html.twig */
class __TwigTemplate_58d9dbed7c99a4a2cc3ded3fa463ce6adcd70f44bb43675a2345c5c3495fefac extends Twig_Template
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
        echo "<div class=\"modal fade\" id=\"test-newsletter\" style=\"margin-top: 100px;\">
<div class=\"modal-dialog modal-md\">
<div class=\"modal-content\" style=\"border-radius: 0px;\">
<div class=\"modal-header\" style=\"border-bottom: 2px solid #2980b9; background: #eb5425; color: #fff;\">
<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
<h4 class=\"modal-title\"><img src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/logombg.jpg"), "html", null, true);
        echo "\" alt=\"logo\" style=\"width: 60px; height: 50px;\"> ";
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo "</br><span style=\"font-size: 15px;\"> Abonnez-vous pour suivre l'évolution de vos équipes favoris..</span></h4>
</div>
<div class=\"modal-body\">
\t<section class=\"subs\" style=\"padding: 15px 0px;\">
\t\t<form action=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("users_user_create_newsletter_account");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo " style=\"margin-bottom: 0px;\">
\t\t\t<div class=\"col-lg-6 col-md-6 col-sm-12\">
\t\t\t\t<div class=\"form-group1\">
\t\t\t\t\t";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nom"), 'widget', array("attr" => array("class" => "form-control nameuser", "placeholder" => "Entrer votre nom")));
        echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-lg-6 col-md-6 col-sm-12\">
\t\t\t\t<div class=\"form-group1\">
\t\t\t\t\t";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email"), 'widget', array("attr" => array("class" => "form-control useremail", "placeholder" => "Entrer votre adresse e-mail")));
        echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-lg-12 col-md-12 col-sm-12\">
\t\t\t\t<div class=\"form-group2\" style=\"margin-top: 15px;\">
\t\t\t\t\t<button class=\"btn btn-outline btn-lg\" type=\"submit\">S'inscrire</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"clearfix\"></div>
\t\t\t";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
\t\t</form>\t
</section>
</div>
</div>
</div>
</div>
<script type=\"text/javascript\">
var afficher = false;
\$('body.homepage').bind('mouseleave.dragged',function(e) {
    var ev = e || window.event;
    if(ev.relatedTarget){
        if(ev.relatedTarget == \$('html').get(0) && afficher == false){
            \$('#test-newsletter').modal('show');
\t\t\tafficher = true;
\t\t\t\$.post('";
        // line 42
        echo $this->env->getExtension('routing')->getPath("general_template_stop_alert_newsletter");
        echo "', function(data) {
\t\t\tif(data == 1)
\t\t\t{
\t\t\t
\t\t\t}
\t\t\t});
        }
    } else {
    // IE
        if(!ev.toElement && afficher == false){
            \$('#test-newsletter').modal('show');
\t\t\tafficher = true;
\t\t\t\$.post('";
        // line 54
        echo $this->env->getExtension('routing')->getPath("general_template_stop_alert_newsletter");
        echo "', function(data) {
\t\t\tif(data == 1)
\t\t\t{
\t\t\t
\t\t\t}
\t\t\t});
        } else if(ev.toElement.tagName == \"HTML\"){
            alert('Nous n\\'arrivons pas à vous notifiez des informations importantes sur les services qui vous intéressent !!!');
        }
    }
});
</script>
";
    }

    public function getTemplateName()
    {
        return "GeneralTemplateBundle:Menu:testinscriptionnewsletter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 13,  26 => 6,  32 => 4,  24 => 2,  1080 => 340,  1074 => 338,  1068 => 336,  1066 => 335,  1064 => 334,  1060 => 333,  1051 => 332,  1048 => 331,  1036 => 326,  1030 => 324,  1024 => 322,  1022 => 321,  1020 => 320,  1016 => 319,  1010 => 318,  1007 => 317,  995 => 312,  989 => 310,  983 => 308,  981 => 307,  979 => 306,  975 => 305,  971 => 304,  967 => 303,  963 => 302,  957 => 301,  954 => 300,  946 => 296,  942 => 295,  939 => 294,  930 => 287,  928 => 286,  924 => 285,  921 => 284,  916 => 280,  908 => 278,  904 => 277,  902 => 276,  900 => 275,  897 => 274,  891 => 271,  888 => 270,  884 => 267,  881 => 265,  879 => 264,  876 => 263,  869 => 259,  867 => 258,  843 => 257,  840 => 255,  837 => 253,  835 => 252,  833 => 251,  830 => 250,  826 => 247,  824 => 246,  822 => 245,  819 => 244,  815 => 239,  812 => 238,  808 => 235,  806 => 234,  804 => 233,  801 => 232,  797 => 229,  795 => 228,  793 => 227,  791 => 226,  789 => 225,  786 => 224,  782 => 221,  779 => 216,  774 => 212,  754 => 208,  751 => 206,  748 => 205,  745 => 203,  742 => 202,  739 => 200,  737 => 199,  735 => 198,  732 => 197,  728 => 192,  726 => 191,  723 => 190,  719 => 187,  717 => 186,  714 => 185,  704 => 182,  701 => 180,  699 => 179,  696 => 178,  692 => 175,  690 => 174,  687 => 173,  683 => 170,  681 => 169,  678 => 168,  673 => 165,  671 => 164,  668 => 163,  663 => 160,  661 => 159,  658 => 158,  654 => 155,  652 => 154,  649 => 153,  645 => 150,  643 => 149,  640 => 148,  636 => 145,  633 => 144,  629 => 141,  627 => 140,  624 => 139,  620 => 136,  617 => 135,  614 => 133,  609 => 129,  599 => 128,  594 => 127,  592 => 126,  589 => 124,  587 => 123,  584 => 122,  579 => 118,  577 => 116,  576 => 115,  575 => 114,  574 => 113,  570 => 112,  567 => 110,  565 => 109,  562 => 108,  556 => 104,  554 => 103,  550 => 101,  548 => 100,  544 => 99,  539 => 96,  536 => 95,  522 => 92,  519 => 91,  505 => 88,  502 => 87,  474 => 80,  472 => 79,  470 => 78,  463 => 76,  446 => 75,  443 => 74,  437 => 70,  435 => 69,  429 => 66,  427 => 65,  423 => 63,  421 => 62,  412 => 60,  402 => 58,  399 => 56,  397 => 55,  394 => 54,  389 => 51,  383 => 49,  381 => 48,  377 => 47,  373 => 46,  362 => 39,  360 => 38,  357 => 37,  349 => 34,  342 => 30,  339 => 28,  337 => 27,  334 => 26,  330 => 23,  326 => 21,  323 => 19,  321 => 18,  317 => 17,  314 => 16,  298 => 12,  295 => 11,  290 => 7,  287 => 5,  285 => 4,  282 => 3,  278 => 331,  275 => 330,  273 => 317,  270 => 316,  265 => 299,  263 => 294,  260 => 293,  257 => 291,  255 => 284,  252 => 283,  247 => 273,  245 => 270,  235 => 250,  232 => 249,  230 => 244,  227 => 243,  224 => 241,  222 => 238,  219 => 237,  217 => 232,  214 => 231,  212 => 224,  209 => 223,  207 => 216,  204 => 215,  201 => 213,  199 => 212,  196 => 211,  194 => 197,  188 => 194,  183 => 189,  181 => 185,  178 => 184,  176 => 178,  173 => 177,  171 => 173,  169 => 168,  166 => 167,  161 => 162,  159 => 158,  156 => 157,  154 => 153,  151 => 152,  149 => 148,  146 => 147,  144 => 144,  141 => 143,  139 => 139,  136 => 138,  126 => 121,  124 => 108,  121 => 107,  119 => 95,  116 => 94,  111 => 90,  109 => 87,  96 => 54,  91 => 44,  86 => 36,  79 => 26,  74 => 16,  64 => 3,  61 => 2,  118 => 56,  114 => 91,  110 => 54,  106 => 86,  85 => 35,  28 => 3,  177 => 82,  172 => 80,  148 => 58,  143 => 56,  120 => 46,  115 => 44,  104 => 74,  98 => 38,  92 => 36,  90 => 35,  50 => 19,  46 => 17,  42 => 16,  38 => 15,  31 => 11,  19 => 1,  354 => 159,  351 => 158,  346 => 33,  343 => 131,  338 => 40,  335 => 39,  329 => 26,  325 => 25,  318 => 21,  313 => 19,  309 => 18,  303 => 16,  300 => 13,  294 => 11,  288 => 10,  269 => 161,  267 => 158,  264 => 157,  243 => 153,  240 => 263,  223 => 151,  216 => 147,  211 => 145,  206 => 143,  202 => 142,  198 => 141,  193 => 139,  186 => 190,  184 => 131,  180 => 130,  170 => 122,  168 => 121,  131 => 132,  129 => 122,  125 => 48,  95 => 63,  67 => 39,  51 => 18,  49 => 15,  41 => 11,  35 => 10,  25 => 1,  112 => 43,  105 => 70,  102 => 39,  99 => 54,  94 => 45,  89 => 37,  87 => 23,  84 => 33,  81 => 42,  76 => 25,  71 => 15,  69 => 11,  66 => 10,  63 => 27,  57 => 10,  54 => 20,  48 => 6,  39 => 10,  563 => 263,  560 => 262,  555 => 259,  552 => 102,  541 => 97,  527 => 248,  516 => 244,  512 => 243,  508 => 242,  499 => 240,  496 => 239,  485 => 235,  481 => 234,  477 => 82,  468 => 231,  465 => 77,  462 => 229,  445 => 228,  439 => 71,  425 => 64,  419 => 221,  413 => 219,  410 => 59,  393 => 217,  370 => 45,  365 => 41,  350 => 192,  348 => 191,  345 => 190,  328 => 22,  308 => 172,  302 => 169,  268 => 300,  256 => 131,  250 => 274,  242 => 269,  237 => 262,  233 => 125,  208 => 103,  203 => 100,  191 => 196,  185 => 93,  164 => 163,  157 => 73,  145 => 68,  138 => 54,  134 => 133,  107 => 41,  101 => 73,  83 => 24,  75 => 18,  72 => 17,  65 => 28,  62 => 37,  56 => 10,  53 => 9,  45 => 5,  40 => 4,  36 => 2,  33 => 2,);
    }
}
