<?php

/* UsersUserBundle:Billet:aviscarousel.html.twig */
class __TwigTemplate_97b198426d0ad81ede891db0631fdb273247afa0a9ee600b21aefef7b84ff13a extends Twig_Template
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
a {
\t-webkit-transition: all 150ms ease;
\t-moz-transition: all 150ms ease;
\t-ms-transition: all 150ms ease;
\t-o-transition: all 150ms ease;
\ttransition: all 150ms ease; 
}
a:hover {
\t-ms-filter: \"progid:DXImageTransform.Microsoft.Alpha(Opacity=50)\"; /* IE 8 */
\tfilter: alpha(opacity=50); /* IE7 */
\topacity: 0.6;
\ttext-decoration: none;
}


/* Container */
.container-fluid {
    background: #FFFFFF;
    margin: 40px auto 10px;
    padding: 20px 40px 0;
    max-width: 960px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}


/* Page Header */
.page-header {
    background: #f9f9f9;
    margin: -30px -40px 40px;
    padding: 20px 40px;
    border-top: 4px solid #ccc;
    color: #999;
    text-transform: uppercase;
    }
    .page-header h3 {
        line-height: 0.88rem;
        color: #000;
        }



/* Thumbnail Box */
.caption h4 {
\tfont-size: 1rem;
\tcolor: #444;
}
.caption p {
\tfont-size: 0.75rem;
\tcolor: #999;
}
.btn.btn-mini {
\tfont-size: 0.63rem;
}


/* Carousel Control */
.control-box {
\ttext-align: right;
\twidth: 100%;
}
.carousel-control{
\tbackground: #666;
\tborder: 0px;
\tborder-radius: 0px;
\tdisplay: inline-block;
\tfont-size: 34px;
\tfont-weight: 200;
\tline-height: 18px;
\topacity: 0.5;
\tpadding: 4px 10px 0px;
\tposition: static;
\theight: 30px;
\twidth: 15px;
}

@media (max-width: 479px){
    .caption {
    word-break: break-all;
    }
}


/* Remove before adding to website */
#carousel-testimonial {
  padding: 4px 0;
}
#carousel-testimonial .testimonial {
  height: 100%;
  background-color: #fff;
  padding: 30px;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.15);
  border: 1px solid #ccc;
  border-radius: 4px;
  display: flex !important;
  flex-direction: column;
}

#carousel-testimonial .testimonial:hover {
  background-color: #f7f7f7;
  border: 1px solid green;
}
#carousel-testimonial .testimonial blockquote {
  position: relative;
  margin: 0;
}
#carousel-testimonial .testimonial blockquote .testimonial-image {
  position: absolute;
  top: 6px;
  width: 42px;
  height: 33px;
}
#carousel-testimonial .testimonial blockquote .testimonial-text {
  font-size: 1.2rem;
  font-weight: 300;
  line-height: 1.4;
  margin: 0;
  padding-left: 57px;
  height: 140px;
  overflow: hidden;
}
#carousel-testimonial .testimonial footer {
  display: flex;
  margin-top: 15px;
  align-items: flex-end;
  flex: 1;
}
#carousel-testimonial .testimonial footer .testimonial-author {
  font-size: 18px;
  font-weight: 400;
  color: #009fb4;
  margin-right: auto;
  white-space: nowrap;
}
#carousel-testimonial .testimonial footer .testimonial-author .testimonial-role {
  font-size: 1rem;
  color: #666;
}
#carousel-testimonial .testimonial footer .testimonial-logo {
  display: block;
  max-width: 100%;
}
.carousel-control{
\tbackground: #fff;
\tbox-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  padding: 7px;
  height: 35px;
  width: 35px;
  border-radius: 50%;
  text-decoration: none;
  background-image: none!important;
}
.carousel-control.left{
background-image: none!important;
}
.carousel-control.right{
background-image: none!important;
}
</style>
";
        // line 161
        $this->env->loadTemplate("ProduitServiceBundle:Apropos:commandestep.html.twig")->display($context);
        // line 162
        echo "

<div style=\"background: #f2f2f2; padding: 40px 0px;\">
<div class=\"container\">
<div class=\"row\">
\t<div class=\"col-md-12\">
\t\t<div class=\"carousel slide\" id=\"myCarousel\">
\t\t\t\t<div class=\"carousel-inner\" id=\"carousel-testimonial\">
\t\t\t\t\t<div class=\"item active\">
\t\t\t\t\t\t\t<div class=\"thumbnails\">
\t\t\t\t\t\t\t\t";
        // line 172
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 2));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 173
            echo "\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t<a href=\"#:\" class=\"testimonial\" style=\"display: block!important; text-decoration: none;\">
\t\t\t\t\t\t\t\t\t\t<blockquote>
\t\t\t\t\t\t\t\t\t\t  <img class=\"testimonial-image\" src=\"";
            // line 176
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/1933-nursery-quotation-mark.svg"), "html", null, true);
            echo "\" alt=\"Quotation mark\"/>
\t\t\t\t\t\t\t\t\t\t  <div class=\"testimonial-text\"> This is a short teaser to the content in the video that shows on hover. </div>
\t\t\t\t\t\t\t\t\t\t</blockquote>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<footer>
\t\t\t\t\t\t\t\t\t\t  <div class=\"testimonial-author\">
\t\t\t\t\t\t\t\t\t\t\t<img style=\"height: 50px; border-radius: 50%; margin-right: 7px; float: left;\" src=\"";
            // line 182
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.png"), "html", null, true);
            echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t Jean Robert Kodjo
\t\t\t\t\t\t\t\t\t\t\t<div class=\"testimonial-role\">Etudiant</div>
\t\t\t\t\t\t\t\t\t\t  </div>
\t\t\t\t\t\t\t\t\t\t  
\t\t\t\t\t\t\t\t\t\t  <div class=\"star-ratings-css\" style=\"margin-top: -20px; display: inline-block; width: 100px!important;\">
\t\t\t\t\t\t\t\t\t\t\t  <div class=\"star-ratings-css-top\" style=\"width: ";
            // line 189
            echo twig_escape_filter($this->env, (twig_round((5 / 5), 2, "ceil") * 100), "html", null, true);
            echo "%\"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
\t\t\t\t\t\t\t\t\t\t\t  <div class=\"star-ratings-css-bottom\"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
\t\t\t\t\t\t\t\t\t\t  </div>
\t\t\t\t\t\t\t\t\t\t</footer>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 196
        echo "\t\t\t\t\t\t\t\t<div class=\"clearfix\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t  </div><!-- /Slide1 --> 
\t\t\t\t\t  
\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t<div class=\"thumbnails\">
\t\t\t\t\t\t\t\t";
        // line 202
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 2));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 203
            echo "\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t<a href=\"#:\" class=\"testimonial\" style=\"display: block!important; text-decoration: none;\">
\t\t\t\t\t\t\t\t\t\t<blockquote>
\t\t\t\t\t\t\t\t\t\t  <img class=\"testimonial-image\" src=\"";
            // line 206
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/1933-nursery-quotation-mark.svg"), "html", null, true);
            echo "\" alt=\"Quotation mark\"/>
\t\t\t\t\t\t\t\t\t\t  <div class=\"testimonial-text\"> This is a short teaser to the content in the video that shows on hover. </div>
\t\t\t\t\t\t\t\t\t\t</blockquote>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<footer>
\t\t\t\t\t\t\t\t\t\t  <div class=\"testimonial-author\">
\t\t\t\t\t\t\t\t\t\t\t<img style=\"height: 50px; border-radius: 50%; margin-right: 7px; float: left;\" src=\"";
            // line 212
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.png"), "html", null, true);
            echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t Jean Robert Kodjo
\t\t\t\t\t\t\t\t\t\t\t<div class=\"testimonial-role\">Etudiant</div>
\t\t\t\t\t\t\t\t\t\t  </div>
\t\t\t\t\t\t\t\t\t\t  
\t\t\t\t\t\t\t\t\t\t  <div class=\"star-ratings-css\" style=\"margin-top: -20px; display: inline-block; width: 100px!important;\">
\t\t\t\t\t\t\t\t\t\t\t  <div class=\"star-ratings-css-top\" style=\"width: ";
            // line 219
            echo twig_escape_filter($this->env, (twig_round((5 / 5), 2, "ceil") * 100), "html", null, true);
            echo "%\"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
\t\t\t\t\t\t\t\t\t\t\t  <div class=\"star-ratings-css-bottom\"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
\t\t\t\t\t\t\t\t\t\t  </div>
\t\t\t\t\t\t\t\t\t\t</footer>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 226
        echo "\t\t\t\t\t\t\t\t<div class=\"clearfix\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t</div><!-- /Slide2 --> 
\t\t\t\t\t  
\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t<div class=\"thumbnails\">
\t\t\t\t\t\t\t\t";
        // line 232
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 2));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 233
            echo "\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t<a href=\"#:\" class=\"testimonial\" style=\"display: block!important; text-decoration: none;\">
\t\t\t\t\t\t\t\t\t\t<blockquote>
\t\t\t\t\t\t\t\t\t\t  <img class=\"testimonial-image\" src=\"";
            // line 236
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/1933-nursery-quotation-mark.svg"), "html", null, true);
            echo "\" alt=\"Quotation mark\"/>
\t\t\t\t\t\t\t\t\t\t  <div class=\"testimonial-text\"> This is a short teaser to the content in the video that shows on hover. </div>
\t\t\t\t\t\t\t\t\t\t</blockquote>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<footer>
\t\t\t\t\t\t\t\t\t\t  <div class=\"testimonial-author\">
\t\t\t\t\t\t\t\t\t\t\t<img style=\"height: 50px; border-radius: 50%; margin-right: 7px; float: left;\" src=\"";
            // line 242
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("template/images/co.png"), "html", null, true);
            echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t Jean Robert Kodjo
\t\t\t\t\t\t\t\t\t\t\t<div class=\"testimonial-role\">Etudiant</div>
\t\t\t\t\t\t\t\t\t\t  </div>
\t\t\t\t\t\t\t\t\t\t  
\t\t\t\t\t\t\t\t\t\t  <div class=\"star-ratings-css\" style=\"margin-top: -20px; display: inline-block; width: 100px!important;\">
\t\t\t\t\t\t\t\t\t\t\t  <div class=\"star-ratings-css-top\" style=\"width: ";
            // line 249
            echo twig_escape_filter($this->env, (twig_round((5 / 5), 2, "ceil") * 100), "html", null, true);
            echo "%\"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
\t\t\t\t\t\t\t\t\t\t\t  <div class=\"star-ratings-css-bottom\"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
\t\t\t\t\t\t\t\t\t\t  </div>
\t\t\t\t\t\t\t\t\t\t</footer>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 256
        echo "\t\t\t\t\t\t\t\t<div class=\"clearfix\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t  </div><!-- /Slide3 --> 
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"control-box\">                            
\t\t\t\t\t<a data-slide=\"prev\" href=\"#myCarousel\" class=\"carousel-control left\">‹</a>
\t\t\t\t\t<a data-slide=\"next\" href=\"#myCarousel\" class=\"carousel-control right\">›</a>
\t\t\t\t</div><!-- /.control-box -->   \t\t\t\t  
\t\t\t</div>
\t</div>
</div>
</div>
</div>

<script type=\"text/javascript\">
// Carousel Auto-Cycle
  \$(document).ready(function() {
    \$('.carousel').carousel({
      interval: 6000
    })
  });
</script>";
    }

    public function getTemplateName()
    {
        return "UsersUserBundle:Billet:aviscarousel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  311 => 242,  302 => 236,  297 => 233,  293 => 232,  285 => 226,  262 => 212,  244 => 202,  236 => 196,  213 => 182,  195 => 172,  183 => 162,  860 => 655,  857 => 654,  853 => 652,  799 => 600,  791 => 599,  787 => 598,  779 => 592,  776 => 591,  768 => 588,  762 => 586,  745 => 526,  735 => 521,  642 => 435,  632 => 427,  630 => 426,  616 => 414,  606 => 410,  601 => 408,  596 => 406,  569 => 395,  565 => 393,  549 => 385,  539 => 381,  529 => 377,  520 => 373,  508 => 369,  502 => 366,  498 => 364,  489 => 361,  361 => 235,  355 => 233,  353 => 232,  349 => 231,  334 => 256,  320 => 212,  288 => 187,  281 => 183,  277 => 181,  267 => 177,  259 => 174,  255 => 172,  251 => 171,  246 => 169,  234 => 160,  225 => 154,  211 => 150,  204 => 176,  199 => 173,  181 => 161,  174 => 128,  170 => 127,  166 => 126,  154 => 123,  152 => 122,  128 => 100,  122 => 98,  120 => 97,  24 => 3,  22 => 2,  1040 => 654,  1036 => 652,  1009 => 627,  996 => 619,  985 => 615,  976 => 612,  971 => 611,  967 => 610,  962 => 608,  957 => 605,  953 => 604,  941 => 595,  936 => 592,  932 => 591,  922 => 584,  910 => 575,  902 => 574,  893 => 568,  889 => 567,  872 => 553,  868 => 552,  840 => 527,  815 => 505,  797 => 490,  770 => 468,  764 => 467,  753 => 463,  749 => 461,  741 => 525,  737 => 456,  732 => 520,  728 => 454,  703 => 431,  700 => 430,  687 => 419,  684 => 418,  650 => 440,  644 => 384,  627 => 370,  612 => 358,  597 => 346,  584 => 336,  570 => 324,  559 => 318,  548 => 314,  537 => 312,  533 => 311,  528 => 309,  525 => 308,  521 => 307,  505 => 302,  501 => 301,  496 => 299,  486 => 292,  482 => 290,  478 => 289,  464 => 277,  436 => 255,  416 => 251,  412 => 250,  408 => 248,  390 => 247,  378 => 238,  374 => 237,  370 => 236,  366 => 235,  362 => 234,  358 => 233,  354 => 232,  350 => 231,  346 => 229,  335 => 221,  332 => 220,  325 => 216,  321 => 249,  317 => 214,  308 => 212,  305 => 211,  303 => 210,  276 => 192,  272 => 219,  253 => 206,  248 => 203,  238 => 169,  231 => 168,  229 => 167,  223 => 189,  212 => 161,  208 => 149,  198 => 153,  192 => 141,  186 => 151,  171 => 145,  167 => 144,  163 => 142,  19 => 1,  2335 => 1968,  2332 => 1967,  2327 => 1963,  2324 => 1962,  2319 => 1942,  2316 => 1941,  2299 => 28,  2293 => 25,  2289 => 24,  2285 => 23,  2277 => 18,  2272 => 16,  2267 => 15,  2264 => 14,  2258 => 12,  2252 => 11,  2231 => 2184,  2201 => 2157,  2181 => 2140,  2174 => 2136,  2166 => 2131,  2161 => 2129,  2016 => 1987,  1997 => 1970,  1995 => 1967,  1991 => 1965,  1989 => 1962,  1974 => 1952,  1963 => 1944,  1961 => 1941,  1957 => 1940,  1644 => 1630,  1631 => 1620,  50 => 41,  42 => 12,  40 => 11,  34 => 8,  25 => 1,  112 => 30,  107 => 32,  105 => 30,  102 => 29,  99 => 28,  87 => 23,  84 => 22,  81 => 21,  76 => 15,  71 => 18,  69 => 15,  66 => 14,  63 => 13,  48 => 14,  45 => 5,  39 => 3,  1351 => 1007,  1348 => 1006,  1343 => 1003,  1340 => 1002,  1276 => 941,  1270 => 937,  1261 => 934,  1256 => 932,  1252 => 931,  1244 => 930,  1241 => 929,  1237 => 928,  1211 => 907,  813 => 511,  802 => 502,  789 => 485,  786 => 494,  775 => 489,  771 => 488,  765 => 587,  759 => 585,  755 => 481,  750 => 479,  746 => 478,  743 => 459,  739 => 476,  734 => 474,  722 => 469,  717 => 466,  713 => 465,  699 => 454,  683 => 441,  672 => 432,  670 => 431,  664 => 427,  599 => 365,  587 => 402,  581 => 401,  575 => 398,  561 => 392,  556 => 390,  552 => 337,  538 => 329,  534 => 379,  530 => 326,  526 => 325,  518 => 322,  514 => 372,  510 => 319,  503 => 315,  499 => 313,  497 => 312,  494 => 363,  479 => 309,  476 => 308,  473 => 307,  470 => 306,  467 => 305,  450 => 304,  448 => 303,  446 => 302,  257 => 116,  243 => 171,  222 => 153,  205 => 101,  194 => 93,  189 => 91,  182 => 87,  172 => 79,  161 => 141,  157 => 124,  148 => 71,  139 => 69,  135 => 67,  131 => 66,  94 => 23,  89 => 25,  86 => 28,  67 => 14,  64 => 13,  57 => 10,  54 => 9,  46 => 6,  41 => 4,  36 => 2,  33 => 2,);
    }
}
