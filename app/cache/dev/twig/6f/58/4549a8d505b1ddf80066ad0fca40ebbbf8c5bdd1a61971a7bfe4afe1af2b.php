<?php

/* UsersUserBundle:User:accueiluser.html.twig */
class __TwigTemplate_6f584549a8d505b1ddf80066ad0fca40ebbbf8c5bdd1a61971a7bfe4afe1af2b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("UsersUserBundle::layoutuser.html.twig");

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'title' => array($this, 'block_title'),
            'userblog_body' => array($this, 'block_userblog_body'),
            'javascripttemplate' => array($this, 'block_javascripttemplate'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "UsersUserBundle::layoutuser.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_meta($context, array $blocks = array())
    {
        // line 3
        $this->displayParentBlock("meta", $context, $blocks);
        echo "
<meta name=\"keywords\" content=\"";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo ", Business, Innovation,Administration\"/>
<meta name=\"author\" content=\"Noel Kenfack\"/>
<meta name=\"description\" content=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
        echo " | Inscription | Cameroun | ";
        echo twig_escape_filter($this->env, (isset($context["metier"]) ? $context["metier"] : $this->getContext($context, "metier")), "html", null, true);
        echo "\" />
";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        // line 9
        $this->displayParentBlock("title", $context, $blocks);
        echo " | ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "name", array(0 => 20), "method"), "html", null, true);
        echo "
";
    }

    // line 11
    public function block_userblog_body($context, array $blocks = array())
    {
        // line 12
        echo "<hr style=\"margin-top: 45px; margin-bottom: 0px;\"/>
<div  style=\"background: rgba(83, 101, 240, 1); height: 10px;\">
</div>
<div style=\"background: #BDC3C7;\">
\t<div class=\"container\" style=\"color: #fff;\">
\tAccueil <span class=\"mdi-av-play-arrow\" style=\"font-size: 10px;\"></span> ";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "name", array(0 => 30), "method"), "html", null, true);
        echo "
\t</div>\t
</div>\t
<hr style=\"margin-bottom: 0px;\"/>

\t<div class=\"container\">
\t\t\t";
        // line 23
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "formateur") == true)) {
            // line 24
            echo "\t\t\t\t";
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("UsersUserBundle:User:banniereuser", array("user" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "id"))));
            echo "
\t\t\t";
        }
        // line 26
        echo "\t\t\t<div class=\"row mt centered\">
\t\t\t
\t\t\t";
        // line 28
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "formateur") == true)) {
            // line 29
            echo "\t\t\t<div class=\"col-md-12 photoday-grid\" style=\"padding: 3px 7px; margin-top: -20px;\" id=\"cours-courant-user\">
\t\t\t<div class=\"panel panel-default\" style=\"margin-top: 15px; text-align: justify; padding: 7px; border-radius: 0px;\">
\t\t\t<div style=\"border-bottom: 1px solid #ddd;\" class=\"text-primary\"><strong><span class=\"mdi-communication-textsms\"></span> Tous les cours de ";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "name", array(0 => 30), "method"), "html", null, true);
            echo " <a href=\"#!\" class=\"open-content pull-right\" value=\"down\" name=\"2\"><span class=\"mdi-hardware-keyboard-arrow-down\"></span></a></strong></div>
\t\t\t\t<div class=\"content-panel-2\">
\t\t\t\t\t<div class=\"main-maddile\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t";
            // line 35
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["liste_scat"]) ? $context["liste_scat"] : $this->getContext($context, "liste_scat")));
            foreach ($context['_seq'] as $context["_key"] => $context["scat"]) {
                // line 36
                echo "\t\t\t\t\t\t\t<li><a href=\"#!\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["scat"]) ? $context["scat"] : $this->getContext($context, "scat")), "nom"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["scat"]) ? $context["scat"] : $this->getContext($context, "scat")), "nbprodinval"), "html", null, true);
                echo ")</a></li>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['scat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t</div>

\t\t
\t\t\t";
            // line 45
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["liste_produit"]) ? $context["liste_produit"] : $this->getContext($context, "liste_produit")));
            $context['_iterated'] = false;
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
            foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
                // line 46
                echo "\t\t\t<div class=\"col-md-3 photoday-grid\" style=\"padding: 3px 7px;\">
\t\t\t\t";
                // line 47
                $this->env->loadTemplate("ProduitProduitBundle:Produit:produitdescript.html.twig")->display($context);
                // line 48
                echo "\t\t\t</div>
\t\t\t";
                $context['_iterated'] = true;
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            if (!$context['_iterated']) {
                // line 50
                echo "\t\t\t<div class=\"col-md-12 text-left\" style=\"padding: 3px 7px;\"><div class=\"alert-warning text-left\" style=\"padding: 15px;  margin-bottom: 20px; border: 1px solid transparent; border-radius: 0px;\"><span class=\"fa fa-warning\"></span> Aucun cours valide pour ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "name", array(0 => 30), "method"), "html", null, true);
                echo " <span class=\"fa fa-check pull-right\"></span> </div></div>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['produit'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            echo "\t\t\t
\t\t\t";
        }
        // line 54
        echo "\t\t\t

\t\t\t";
        // line 56
        if ((($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user") == (isset($context["user"]) ? $context["user"] : $this->getContext($context, "user"))) || $this->env->getExtension('security')->isGranted("ROLE_GESTION"))) {
            // line 57
            echo "\t\t\t<div class=\"col-md-12 text-left\" style=\"padding: 3px 7px;\"><div class=\"alert-info text-left\" style=\"padding: 15px;  margin-bottom: 5px; border: 1px solid transparent; border-radius: 0px;\"><span class=\"fa fa-money\"></span> Votre solde principal est de ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "soldeprincipal"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, (isset($context["devise"]) ? $context["devise"] : $this->getContext($context, "devise")), "html", null, true);
            echo " <span class=\"fa fa-cog pull-right\"></span> </div></div>
\t\t\t
\t\t\t<div class=\"clearfix\"></div>
\t\t\t<div class=\"col-md-12 text-left\" style=\"padding: 3px 7px;\">
\t\t\t<table class=\"table table-bordered table-striped table-condensed\">
\t\t\t<caption>
\t\t\t<h4 style=\"text-align: left; border-bottom: 1px solid #f2dede;\"><span class=\"mdi-communication-textsms\" style=\"font-size: 18px;\"></span> Formations suivis par ";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "name", array(0 => 30), "method"), "html", null, true);
            echo "</h4>
\t\t\t</caption>
\t\t\t<thead>
\t\t\t<tr>
\t\t\t<th>Date d'inscription</th>
\t\t\t<th>Type</th>
\t\t\t<th>Intitutlé</th>
\t\t\t<th>Progression</th>
\t\t\t</tr>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t";
            // line 74
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["panier_payer"]) ? $context["panier_payer"] : $this->getContext($context, "panier_payer")));
            $context['_iterated'] = false;
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
            foreach ($context['_seq'] as $context["_key"] => $context["panier"]) {
                // line 75
                echo "\t\t\t<tr class=\"";
                if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") % 3) == 1)) {
                    echo "success";
                }
                echo " ";
                if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") % 3) == 2)) {
                    echo "danger";
                }
                echo " ";
                if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") % 3) == 0)) {
                    echo "active";
                }
                echo "\">
\t\t\t<td>";
                // line 76
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "date"), "d"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "date"), "m"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "date"), "Y"), "html", null, true);
                echo " <a href=\"#!\" class=\"label label-warning pull-right\" title=\"Durée de formation\" style=\"\">";
                if (($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "service") != null)) {
                    $context["duree"] = ($this->getAttribute($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "service"), "dureeacces") / 30);
                    echo twig_escape_filter($this->env, (isset($context["duree"]) ? $context["duree"] : $this->getContext($context, "duree")), "html", null, true);
                    echo "Mois";
                } else {
                    echo " ";
                    if (($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "chapitrecours") != null)) {
                        echo " ";
                        $context["duree"] = ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "chapitrecours"), "partiecours"), "produit"), "dureeacces") / 30);
                        echo twig_escape_filter($this->env, (isset($context["duree"]) ? $context["duree"] : $this->getContext($context, "duree")), "html", null, true);
                        echo "Mois ";
                    } else {
                        echo " ";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "produitpaniers"));
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
                        foreach ($context['_seq'] as $context["_key"] => $context["prodpan"]) {
                            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) {
                                $context["duree"] = ($this->getAttribute($this->getAttribute((isset($context["prodpan"]) ? $context["prodpan"] : $this->getContext($context, "prodpan")), "produit"), "dureeacces") / 30);
                                echo twig_escape_filter($this->env, (isset($context["duree"]) ? $context["duree"] : $this->getContext($context, "duree")), "html", null, true);
                                echo "Mois";
                            }
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
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prodpan'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                    }
                }
                echo "</a></td>
\t\t\t<td>";
                // line 77
                if (($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "service") != null)) {
                    echo "Parcours";
                } else {
                    if (($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "chapitrecours") != null)) {
                        echo "Chapitre";
                    } else {
                        echo "Cours";
                    }
                }
                echo " </td>
\t\t\t<td>
\t\t\t";
                // line 79
                if (($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "service") != null)) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "service"), "nom"), "html", null, true);
                    echo "
\t\t\t\t<div class=\"btn-group pull-right\" style=\"margin-top: 0px; padding: 0px;\">
\t\t\t\t<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" style=\"cursor: pointer; padding: 0px; margin: 0px;\"><i class=\"mdi-hardware-keyboard-arrow-down\" style=\"padding: 0px; margin: 0px;\"></i></a>
\t\t\t\t\t<ul class=\"dropdown-menu pull-right\" style=\"margin-top: 0px; border-radius: 0px;\">
\t\t\t\t\t\t<li><a href=\"#\"><span class=\"fa fa-info-circle\"></span> Liste de cours à suivre</a></li>
\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t";
                    // line 85
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "service"), "produits"));
                    foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                        // line 86
                        echo "\t\t\t\t\t\t\t<li><a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_user_detail_panier_user", array("panier" => $this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "id"), "produit" => $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id"))), "html", null, true);
                        echo "\" title=\"statistique\"><span class=\"fa fa-angle-double-right\"></span> ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "titre"), "html", null, true);
                        echo "</a></li>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 88
                    echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t";
                } else {
                    // line 91
                    echo "\t\t\t\t";
                    if (($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "chapitrecours") != null)) {
                        // line 92
                        echo "\t\t\t\t\t<a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_user_detail_panier_user", array("panier" => $this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "id"), "produit" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "chapitrecours"), "partiecours"), "produit"), "id"))), "html", null, true);
                        echo "\" title=\"statistique\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "chapitrecours"), "titre"), "html", null, true);
                        echo "</a>
\t\t\t\t";
                    } else {
                        // line 93
                        echo "  
\t\t\t\t\t";
                        // line 94
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "produitpaniers"));
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
                        foreach ($context['_seq'] as $context["_key"] => $context["prodpan"]) {
                            // line 95
                            echo "\t\t\t\t\t\t";
                            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) {
                                echo "<a href=\"";
                                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_user_detail_panier_user", array("panier" => $this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "id"), "produit" => $this->getAttribute($this->getAttribute((isset($context["prodpan"]) ? $context["prodpan"] : $this->getContext($context, "prodpan")), "produit"), "id"))), "html", null, true);
                                echo "\" title=\"statistique\">";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["prodpan"]) ? $context["prodpan"] : $this->getContext($context, "prodpan")), "produit"), "titre"), "html", null, true);
                                echo "</a>";
                            }
                            // line 96
                            echo "\t\t\t\t\t";
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
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prodpan'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        echo "  
\t\t\t\t";
                    }
                    // line 98
                    echo "\t\t\t";
                }
                // line 99
                echo "\t\t\t</td>
\t\t\t<td>
\t\t\t";
                // line 101
                if (($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "chapitrecours") != null)) {
                    // line 102
                    echo "\t\t\t\t";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "produitpaniers"));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["prodpan"]) {
                        // line 103
                        echo "\t\t\t\t\t";
                        if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) {
                            // line 104
                            echo "\t\t\t\t\t\t";
                            $context["notechap"] = $this->getAttribute($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "chapitrecours"), "getNoteQuestionnaire", array(0 => (isset($context["prodpan"]) ? $context["prodpan"] : $this->getContext($context, "prodpan"))), "method");
                            // line 105
                            echo "\t\t\t\t\t\t";
                            if (((isset($context["notemin"]) ? $context["notemin"] : $this->getContext($context, "notemin")) <= (isset($context["notechap"]) ? $context["notechap"] : $this->getContext($context, "notechap")))) {
                                // line 106
                                echo "\t\t\t\t\t\t\t";
                                $context["moy"] = 100;
                                // line 107
                                echo "\t\t\t\t\t\t";
                            } else {
                                // line 108
                                echo "\t\t\t\t\t\t\t";
                                if (((isset($context["bareme"]) ? $context["bareme"] : $this->getContext($context, "bareme")) != 0)) {
                                    echo " ";
                                    $context["moy"] = twig_round((((isset($context["notechap"]) ? $context["notechap"] : $this->getContext($context, "notechap")) / (isset($context["bareme"]) ? $context["bareme"] : $this->getContext($context, "bareme"))) * 100));
                                    echo " ";
                                } else {
                                    echo " ";
                                    $context["moy"] = 0;
                                    echo " ";
                                }
                                // line 109
                                echo "\t\t\t\t\t\t";
                            }
                            // line 110
                            echo "\t\t\t\t\t\t<div class=\"progress progress-striped active\" style=\"margin-bottom: 0px;\">
\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-warning\" style=\"width: ";
                            // line 111
                            echo twig_escape_filter($this->env, (isset($context["moy"]) ? $context["moy"] : $this->getContext($context, "moy")), "html", null, true);
                            echo "%;\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t    ";
                        }
                        // line 114
                        echo "\t\t\t\t";
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prodpan'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    echo " 
\t\t\t";
                } else {
                    // line 116
                    echo "\t\t\t\t";
                    if ((($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "chapitrecours") == null) && ($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "service") == null))) {
                        // line 117
                        echo "\t\t\t\t\t";
                        $context["chapitreval"] = 0;
                        // line 118
                        echo "\t\t\t\t\t";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "produitpaniers"));
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
                        foreach ($context['_seq'] as $context["_key"] => $context["prodpan"]) {
                            // line 119
                            echo "\t\t\t\t\t\t";
                            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) {
                                // line 120
                                echo "\t\t\t\t\t\t\t";
                                $context['_parent'] = (array) $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["prodpan"]) ? $context["prodpan"] : $this->getContext($context, "prodpan")), "produit"), "getChapitreCours"));
                                foreach ($context['_seq'] as $context["_key"] => $context["chapitre"]) {
                                    // line 121
                                    echo "\t\t\t\t\t\t\t\t";
                                    $context["notechap"] = $this->getAttribute((isset($context["chapitre"]) ? $context["chapitre"] : $this->getContext($context, "chapitre")), "getNoteQuestionnaire", array(0 => (isset($context["prodpan"]) ? $context["prodpan"] : $this->getContext($context, "prodpan"))), "method");
                                    // line 122
                                    echo "\t\t\t\t\t\t\t\t";
                                    if (((isset($context["notemin"]) ? $context["notemin"] : $this->getContext($context, "notemin")) <= (isset($context["notechap"]) ? $context["notechap"] : $this->getContext($context, "notechap")))) {
                                        // line 123
                                        echo "\t\t\t\t\t\t\t\t\t";
                                        $context["chapitreval"] = ((isset($context["chapitreval"]) ? $context["chapitreval"] : $this->getContext($context, "chapitreval")) + 1);
                                        // line 124
                                        echo "\t\t\t\t\t\t\t\t";
                                    }
                                    // line 125
                                    echo "\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['chapitre'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 126
                                echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                                // line 127
                                if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["prodpan"]) ? $context["prodpan"] : $this->getContext($context, "prodpan")), "produit"), "getChapitreCours")) != 0)) {
                                    echo " ";
                                    $context["moy"] = twig_round((((isset($context["chapitreval"]) ? $context["chapitreval"] : $this->getContext($context, "chapitreval")) / twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["prodpan"]) ? $context["prodpan"] : $this->getContext($context, "prodpan")), "produit"), "getChapitreCours"))) * 100));
                                    echo " ";
                                } else {
                                    echo " ";
                                    $context["moy"] = 0;
                                    echo " ";
                                }
                                // line 128
                                echo "\t\t\t\t\t\t\t<div class=\"progress progress-striped active\" style=\"margin-bottom: 0px;\">
\t\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-warning\" style=\"width: ";
                                // line 129
                                echo twig_escape_filter($this->env, (isset($context["moy"]) ? $context["moy"] : $this->getContext($context, "moy")), "html", null, true);
                                echo "%;\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                            }
                            // line 132
                            echo "\t\t\t\t\t";
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
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prodpan'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        echo " 
\t\t\t\t";
                    } else {
                        // line 134
                        echo "\t\t\t\t\t";
                        if (($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "service") != null)) {
                            // line 135
                            echo "\t\t\t\t\t\t";
                            $context["chapitreval"] = 0;
                            // line 136
                            echo "\t\t\t\t\t\t";
                            $context["nbchapitre"] = 0;
                            // line 137
                            echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
                            // line 138
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["panier"]) ? $context["panier"] : $this->getContext($context, "panier")), "produitpaniers"));
                            foreach ($context['_seq'] as $context["_key"] => $context["prodpan"]) {
                                // line 139
                                echo "\t\t\t\t\t\t\t";
                                $context['_parent'] = (array) $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["prodpan"]) ? $context["prodpan"] : $this->getContext($context, "prodpan")), "produit"), "getChapitreCours"));
                                foreach ($context['_seq'] as $context["_key"] => $context["chapitre"]) {
                                    // line 140
                                    echo "\t\t\t\t\t\t\t\t";
                                    $context["notechap"] = $this->getAttribute((isset($context["chapitre"]) ? $context["chapitre"] : $this->getContext($context, "chapitre")), "getNoteQuestionnaire", array(0 => (isset($context["prodpan"]) ? $context["prodpan"] : $this->getContext($context, "prodpan"))), "method");
                                    // line 141
                                    echo "\t\t\t\t\t\t\t\t";
                                    if (((isset($context["notemin"]) ? $context["notemin"] : $this->getContext($context, "notemin")) <= (isset($context["notechap"]) ? $context["notechap"] : $this->getContext($context, "notechap")))) {
                                        // line 142
                                        echo "\t\t\t\t\t\t\t\t\t";
                                        $context["chapitreval"] = ((isset($context["chapitreval"]) ? $context["chapitreval"] : $this->getContext($context, "chapitreval")) + 1);
                                        // line 143
                                        echo "\t\t\t\t\t\t\t\t";
                                    }
                                    // line 144
                                    echo "\t\t\t\t\t\t\t\t";
                                    $context["nbchapitre"] = ((isset($context["nbchapitre"]) ? $context["nbchapitre"] : $this->getContext($context, "nbchapitre")) + 1);
                                    // line 145
                                    echo "\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['chapitre'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 146
                                echo "\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prodpan'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 147
                            echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
                            // line 148
                            if (((isset($context["nbchapitre"]) ? $context["nbchapitre"] : $this->getContext($context, "nbchapitre")) != 0)) {
                                echo " ";
                                $context["moy"] = twig_round((((isset($context["chapitreval"]) ? $context["chapitreval"] : $this->getContext($context, "chapitreval")) / (isset($context["nbchapitre"]) ? $context["nbchapitre"] : $this->getContext($context, "nbchapitre"))) * 100));
                                echo " ";
                            } else {
                                echo " ";
                                $context["moy"] = 0;
                                echo " ";
                            }
                            // line 149
                            echo "\t\t\t\t\t\t<div class=\"progress progress-striped active\" style=\"margin-bottom: 0px;\">
\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-warning\" style=\"width: ";
                            // line 150
                            echo twig_escape_filter($this->env, (isset($context["moy"]) ? $context["moy"] : $this->getContext($context, "moy")), "html", null, true);
                            echo "%;\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t";
                        }
                        // line 154
                        echo "\t\t\t\t";
                    }
                    // line 155
                    echo "\t\t\t";
                }
                // line 156
                echo "\t\t\t</td>
\t\t\t</tr>
\t\t\t
\t\t\t";
                $context['_iterated'] = true;
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            if (!$context['_iterated']) {
                // line 160
                echo "\t\t\t\t<tr>
\t\t\t\t\t<td>-</td>
\t\t\t\t\t<td>-</td>
\t\t\t\t\t<td>-</td>
\t\t\t\t\t<td>-</td>
\t\t\t\t</tr>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['panier'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 167
            echo "
\t\t\t</tbody>
\t\t\t</table>
\t\t\t</div>
\t\t\t";
        }
        // line 172
        echo "\t\t\t
\t\t</div>
\t</div><!-- /container -->

\t<hr>
";
    }

    // line 180
    public function block_javascripttemplate($context, array $blocks = array())
    {
        // line 181
        echo "
\$('.open-content').click(function(){
\t\$('.content-panel-'+\$(this).attr('name')).toggle('slow');
\tif(\$(this).attr('value') == 'down')
\t{
\t\t\$(this).attr('value','up');
\t\t\$('.open-content[name='+\$(this).attr('name')+']').html('<span class=\"mdi-hardware-keyboard-arrow-right\"></span>');
\t}else{
\t\t\$(this).attr('value','down');
\t\t\$('.open-content[name='+\$(this).attr('name')+']').html('<span class=\"mdi-hardware-keyboard-arrow-down\"></span>');
\t}
});
";
    }

    public function getTemplateName()
    {
        return "UsersUserBundle:User:accueiluser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  697 => 181,  694 => 180,  685 => 172,  678 => 167,  666 => 160,  650 => 156,  647 => 155,  644 => 154,  637 => 150,  634 => 149,  624 => 148,  621 => 147,  615 => 146,  609 => 145,  606 => 144,  603 => 143,  600 => 142,  597 => 141,  594 => 140,  589 => 139,  585 => 138,  582 => 137,  579 => 136,  576 => 135,  573 => 134,  556 => 132,  550 => 129,  547 => 128,  537 => 127,  534 => 126,  528 => 125,  525 => 124,  522 => 123,  519 => 122,  516 => 121,  511 => 120,  508 => 119,  490 => 118,  487 => 117,  484 => 116,  467 => 114,  461 => 111,  458 => 110,  455 => 109,  444 => 108,  441 => 107,  438 => 106,  435 => 105,  432 => 104,  429 => 103,  411 => 102,  409 => 101,  405 => 99,  402 => 98,  385 => 96,  376 => 95,  359 => 94,  356 => 93,  348 => 92,  345 => 91,  340 => 88,  329 => 86,  325 => 85,  315 => 79,  302 => 77,  245 => 76,  230 => 75,  212 => 74,  198 => 63,  186 => 57,  184 => 56,  180 => 54,  176 => 52,  167 => 50,  153 => 48,  151 => 47,  148 => 46,  130 => 45,  121 => 38,  110 => 36,  106 => 35,  99 => 31,  95 => 29,  93 => 28,  89 => 26,  83 => 24,  81 => 23,  72 => 17,  65 => 12,  62 => 11,  54 => 9,  51 => 8,  43 => 6,  38 => 4,  34 => 3,  31 => 2,);
    }
}
