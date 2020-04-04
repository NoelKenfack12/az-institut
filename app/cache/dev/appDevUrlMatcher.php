<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // produit_service_contact_us
        if ($pathinfo === '/nous/contacter') {
            return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\MessageController::contactusAction',  '_route' => 'produit_service_contact_us',);
        }

        // produit_service_apropos_denous
        if ($pathinfo === '/apropos/denous') {
            return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\AproposController::aproposdenousAction',  '_route' => 'produit_service_apropos_denous',);
        }

        // produit_service_assistance_entreprise
        if (0 === strpos($pathinfo, '/presentation/formation') && preg_match('#^/presentation/formation/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_assistance_entreprise')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::presentationformationAction',));
        }

        // produit_service_yourcv_recrutement
        if ($pathinfo === '/user/crediter/compte') {
            return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\RecrutementController::votredossierAction',  '_route' => 'produit_service_yourcv_recrutement',);
        }

        // produit_service_dossier_derecrutement_user
        if (0 === strpos($pathinfo, '/dossier/user/ouverture/dossier/recherche') && preg_match('#^/dossier/user/ouverture/dossier/recherche/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_dossier_derecrutement_user')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\RecrutementController::affichedossieruserAction',));
        }

        // produit_service_telechargement_fiche_ouverture_dossier
        if (0 === strpos($pathinfo, '/telechargement/fiche/ouverture/dossier') && preg_match('#^/telechargement/fiche/ouverture/dossier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_telechargement_fiche_ouverture_dossier')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\RecrutementController::telechargerlettreAction',));
        }

        // produit_service_key_of_product_authentification
        if ($pathinfo === '/key/of/product/authentification') {
            return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\CurentwebsiteController::curentwebsiteAction',  '_route' => 'produit_service_key_of_product_authentification',);
        }

        // produit_service_affiche_contenu_detaille_article_blog
        if (0 === strpos($pathinfo, '/affiche/contenu/detaill/article/blog') && preg_match('#^/affiche/contenu/detaill/article/blog/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_affiche_contenu_detaille_article_blog')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::affichearticleAction',));
        }

        // produit_service_ajouter_commentaire_article_user
        if (0 === strpos($pathinfo, '/sujets/forum') && preg_match('#^/sujets/forum/(?P<id>\\d+)(?:/(?P<page>\\d+))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_ajouter_commentaire_article_user')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::ajoutersujetforumAction',  'page' => 1,));
        }

        // produit_service_interventions_sujets_courant
        if (0 === strpos($pathinfo, '/interventions/sujets/courant') && preg_match('#^/interventions/sujets/courant/(?P<id>\\d+)(?:/(?P<page>\\d+))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_interventions_sujets_courant')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::interventionsujetAction',  'page' => 1,));
        }

        // produit_service_supprimer_commentaire_courant_article
        if (0 === strpos($pathinfo, '/supprimer/commentaire/courant/article') && preg_match('#^/supprimer/commentaire/courant/article/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_supprimer_commentaire_courant_article')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::supprimercommentaireAction',));
        }

        // produit_service_delete_intervention_sujet
        if (0 === strpos($pathinfo, '/delete/intervention/sujet') && preg_match('#^/delete/intervention/sujet/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_delete_intervention_sujet')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::deleteinterventionAction',));
        }

        // produit_service_toute_actualite_entreprise
        if ($pathinfo === '/formateurs') {
            return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::formateurstructAction',  '_route' => 'produit_service_toute_actualite_entreprise',);
        }

        // produit_service_liste_formateur_struct
        if (0 === strpos($pathinfo, '/liste/formateurs/struct') && preg_match('#^/liste/formateurs/struct(?:/(?P<page>\\d+))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_liste_formateur_struct')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::listeformateurAction',  'page' => 1,));
        }

        // produit_service_download_video_formation
        if (0 === strpos($pathinfo, '/download/video/formation') && preg_match('#^/download/video/formation/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_download_video_formation')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::downloadvideoformationAction',));
        }

        // produit_service_visiter_notre_blog
        if ($pathinfo === '/formations') {
            return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::nosformationsAction',  '_route' => 'produit_service_visiter_notre_blog',);
        }

        // produit_service_all_formation_struct
        if (0 === strpos($pathinfo, '/all/formations/struct') && preg_match('#^/all/formations/struct(?:/(?P<page>\\d+))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_all_formation_struct')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::listeformationAction',  'page' => 1,));
        }

        // produit_service_add_formation_panier
        if (0 === strpos($pathinfo, '/user/add/formation/panier') && preg_match('#^/user/add/formation/panier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_add_formation_panier')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::addformationpanierAction',));
        }

        // produit_service_forum_site
        if ($pathinfo === '/az/forum') {
            return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::accueilforumAction',  '_route' => 'produit_service_forum_site',);
        }

        // produit_service_recherche_forum
        if (0 === strpos($pathinfo, '/service/recherche/forum') && preg_match('#^/service/recherche/forum(?:/(?P<donnee>[^/]+)(?:(?P<page>\\d+))?)?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_recherche_forum')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::rechercheforumAction',  'donnee' => '',  'page' => 1,));
        }

        // produit_produit_liste_produit_souscategorie
        if (0 === strpos($pathinfo, '/liste/cours/module') && preg_match('#^/liste/cours/module(?:/(?P<id>\\d+)(?:/(?P<page>\\d+))?)?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_liste_produit_souscategorie')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::listeproduituserAction',  'id' => 0,  'page' => 1,));
        }

        // produit_produit_module_deformation
        if ($pathinfo === '/module/deformation') {
            return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::moduleformationAction',  '_route' => 'produit_produit_module_deformation',);
        }

        // produit_produit_ajouter_nouveau_produit
        if ($pathinfo === '/user/ajouter/nouveau/cours') {
            return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::ajouterproduitAction',  '_route' => 'produit_produit_ajouter_nouveau_produit',);
        }

        // produit_produit_check_corant_tickect
        if ($pathinfo === '/check/corant/tickect') {
            return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::checkticketAction',  '_route' => 'produit_produit_check_corant_tickect',);
        }

        // produit_produit_modification_produit_controller
        if (0 === strpos($pathinfo, '/user/modification/cours') && preg_match('#^/user/modification/cours/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_modification_produit_controller')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::modifierproduitAction',));
        }

        // produit_produit_detail_produit_market
        if (0 === strpos($pathinfo, '/detail/cours') && preg_match('#^/detail/cours/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_detail_produit_market')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::detailproduitAction',));
        }

        if (0 === strpos($pathinfo, '/user')) {
            // produit_produit_add_new_partie_cours
            if (0 === strpos($pathinfo, '/user/add/new/partie/cours') && preg_match('#^/user/add/new/partie/cours/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_add_new_partie_cours')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PartiecoursController::addpartiecoursAction',));
            }

            // produit_produit_modification_partie_cours
            if (0 === strpos($pathinfo, '/user/modification/partie/cours') && preg_match('#^/user/modification/partie/cours/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_modification_partie_cours')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PartiecoursController::modificationpartiecoursAction',));
            }

            // produit_produit_supprimer_partie_cours
            if (0 === strpos($pathinfo, '/user/supprimer/partie/cours') && preg_match('#^/user/supprimer/partie/cours/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_supprimer_partie_cours')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PartiecoursController::supprimerpartiecoursAction',));
            }

        }

        if (0 === strpos($pathinfo, '/market')) {
            // produit_produit_add_quartier_ville
            if (0 === strpos($pathinfo, '/market/add/quartier/ville') && preg_match('#^/market/add/quartier/ville/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_add_quartier_ville')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::addquartiervilleAction',));
            }

            // produit_produit_inscription_user_produit
            if (0 === strpos($pathinfo, '/market/inscription/user/produit') && preg_match('#^/market/inscription/user/produit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_inscription_user_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::inscriptionuserAction',));
            }

            // produit_produit_connexion_user_produit_indent
            if (0 === strpos($pathinfo, '/market/connexion/user/produit/indent') && preg_match('#^/market/connexion/user/produit/indent/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_connexion_user_produit_indent')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::connexionuserAction',));
            }

        }

        // produit_produit_like_courant_product
        if ($pathinfo === '/like/courant/product') {
            return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::likeproductAction',  '_route' => 'produit_produit_like_courant_product',);
        }

        if (0 === strpos($pathinfo, '/user/a')) {
            // produit_produit_ajouter_product_panier
            if (0 === strpos($pathinfo, '/user/ajouter/product/panier') && preg_match('#^/user/ajouter/product/panier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_ajouter_product_panier')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::ajouterpanierAction',));
            }

            // produit_produit_add_chapitre_panier_user
            if (0 === strpos($pathinfo, '/user/add/chapter/panier') && preg_match('#^/user/add/chapter/panier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_add_chapitre_panier_user')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::ajouterpanierAction',));
            }

        }

        // produit_produit_add_panier_produit
        if (0 === strpos($pathinfo, '/add/panier/produit') && preg_match('#^/add/panier/produit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_add_panier_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::addpanierAction',));
        }

        // produit_produit_reglement_commande_du_panier
        if (0 === strpos($pathinfo, '/reglement/commande/dupanier') && preg_match('#^/reglement/commande/dupanier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_reglement_commande_du_panier')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::reglementcommandeAction',));
        }

        if (0 === strpos($pathinfo, '/e')) {
            // produit_produit_editer_courant_commande
            if ($pathinfo === '/edit/courant/commande') {
                return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::editcommandeAction',  '_route' => 'produit_produit_editer_courant_commande',);
            }

            // produit_produit_elever_produit_commande
            if (0 === strpos($pathinfo, '/enleve/produit/commande') && preg_match('#^/enleve/produit/commande/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_elever_produit_commande')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::eleveproduitAction',));
            }

        }

        // produit_produit_recherche_new_produit
        if ($pathinfo === '/recherche/new/produit') {
            return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::rechercheproduitAction',  '_route' => 'produit_produit_recherche_new_produit',);
        }

        // produit_produit_valider_payement_ticket
        if (0 === strpos($pathinfo, '/valider/payement/ticket/user') && preg_match('#^/valider/payement/ticket/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_valider_payement_ticket')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::validationpayementAction',));
        }

        // produit_produit_modifier_lieu_livraison
        if (0 === strpos($pathinfo, '/modifier/lieu/livraison/panier') && preg_match('#^/modifier/lieu/livraison/panier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_modifier_lieu_livraison')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::modifierlieulivraisonAction',));
        }

        // produit_produit_accueil_boutique_produit
        if (0 === strpos($pathinfo, '/nos/cours') && preg_match('#^/nos/cours(?:/(?P<page>\\d+))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_accueil_boutique_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::accueilboutiqueAction',  'page' => 1,));
        }

        // produit_produit_add_new_chapter
        if (0 === strpos($pathinfo, '/user/add/new/chapter') && preg_match('#^/user/add/new/chapter/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_add_new_chapter')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::addnewchapterAction',));
        }

        // produit_produit_presentation_chapter
        if (0 === strpos($pathinfo, '/presentation/chapter') && preg_match('#^/presentation/chapter/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_presentation_chapter')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::presentationchapterAction',));
        }

        if (0 === strpos($pathinfo, '/user')) {
            // produit_produit_user_modif_chapter
            if (0 === strpos($pathinfo, '/user/modifier/chapter') && preg_match('#^/user/modifier/chapter/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_user_modif_chapter')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::modifierchapterAction',));
            }

            // produit_produit_user_supprimer_chapter
            if (0 === strpos($pathinfo, '/user/supprimer/chapter') && preg_match('#^/user/supprimer/chapter/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_user_supprimer_chapter')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::supprimerchapterAction',));
            }

            // structure_pubquartier_delete_image_produit_en_vente
            if ($pathinfo === '/user/delete/image/produit/en/vente') {
                return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::deleteimageproduitAction',  '_route' => 'structure_pubquartier_delete_image_produit_en_vente',);
            }

        }

        // produit_produit_telecherger_panier
        if (0 === strpos($pathinfo, '/telechergement/facture') && preg_match('#^/telechergement/facture/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_telecherger_panier')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::telechargerpanierAction',));
        }

        if (0 === strpos($pathinfo, '/user')) {
            // produit_produit_download_video_chapter
            if (0 === strpos($pathinfo, '/user/download/video/chapter') && preg_match('#^/user/download/video/chapter/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_download_video_chapter')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::downloadvideochapitreAction',));
            }

            // produit_produit_ajout_nouveau_support_chapter
            if (0 === strpos($pathinfo, '/user/ajout/nouveau/support/chapter') && preg_match('#^/user/ajout/nouveau/support/chapter/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_ajout_nouveau_support_chapter')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::ajoutnouveausupportAction',));
            }

            // produit_produit_modif_support_courant_chapter
            if (0 === strpos($pathinfo, '/user/modif/support/courant/chapter') && preg_match('#^/user/modif/support/courant/chapter/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_modif_support_courant_chapter')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::modifsupportchapterAction',));
            }

            // produit_produit_telecharger_support_chapter
            if (0 === strpos($pathinfo, '/user/telecharger/support/chapter') && preg_match('#^/user/telecharger/support/chapter/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_telecharger_support_chapter')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::telechargersupportAction',));
            }

            // produit_produit_supprimer_support_chapter
            if (0 === strpos($pathinfo, '/user/supprimer/support/chapter') && preg_match('#^/user/supprimer/support/chapter/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_supprimer_support_chapter')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::supprimersupportAction',));
            }

            // produit_produit_ajout_new_travaux_pratique
            if (0 === strpos($pathinfo, '/user/ajout/new/travaux/pratique') && preg_match('#^/user/ajout/new/travaux/pratique/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_ajout_new_travaux_pratique')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::ajoutnewtravauxpratiqueAction',));
            }

            // produit_produit_modif_exercice_chapter_current
            if (0 === strpos($pathinfo, '/user/modif/exercice/chapter/current') && preg_match('#^/user/modif/exercice/chapter/current/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_modif_exercice_chapter_current')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::modifexercicechapterAction',));
            }

            // produit_download_correction_exercice_chapter
            if (0 === strpos($pathinfo, '/user/download/correction/exercice/chapter') && preg_match('#^/user/download/correction/exercice/chapter/(?P<id>\\d+)/(?P<prodpan>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_download_correction_exercice_chapter')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::downloadcorrectionexoAction',));
            }

            // produit_telecharg_correction_tp_chapter
            if (0 === strpos($pathinfo, '/user/elecharg/correction/tp/chapter') && preg_match('#^/user/elecharg/correction/tp/chapter/(?P<id>\\d+)/(?P<prodpan>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_telecharg_correction_tp_chapter')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::telechargcorrectiontpAction',));
            }

            // produit_produit_download_travaux_pratique
            if (0 === strpos($pathinfo, '/user/download/travaux/pratique/chapter') && preg_match('#^/user/download/travaux/pratique/chapter/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_download_travaux_pratique')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::telechargertpAction',));
            }

            // produit_produit_suppression_travaux_pratique
            if (0 === strpos($pathinfo, '/user/suppression/travaux/pratique') && preg_match('#^/user/suppression/travaux/pratique/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_suppression_travaux_pratique')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::suppressiontpAction',));
            }

            // produit_produit_ajout_new_exercice
            if (0 === strpos($pathinfo, '/user/ajouter/exercice') && preg_match('#^/user/ajouter/exercice/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_ajout_new_exercice')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::ajouterexerciceAction',));
            }

            // produit_produit_telecharge_exercice
            if (0 === strpos($pathinfo, '/user/telecharge/exercice/chapter') && preg_match('#^/user/telecharge/exercice/chapter/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_telecharge_exercice')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::downloadexerciceAction',));
            }

            // produit_produit_supprime_exercice
            if (0 === strpos($pathinfo, '/user/supprime/exercice') && preg_match('#^/user/supprime/exercice/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_supprime_exercice')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ChapitrecoursController::supprimeexerciceAction',));
            }

            // produit_produit_user_nouvelle_question_chapter
            if (0 === strpos($pathinfo, '/user/nouvelle/question') && preg_match('#^/user/nouvelle/question/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_user_nouvelle_question_chapter')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\QuestionnaireController::nouvellequestionAction',));
            }

            // produit_produit_user_liste_propos_questionnaire
            if (0 === strpos($pathinfo, '/user/liste/propos/questionnaire') && preg_match('#^/user/liste/propos/questionnaire/(?P<id>\\d+)(?:/(?P<src>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_user_liste_propos_questionnaire')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\QuestionnaireController::questionnairenotionAction',  'src' => 0,));
            }

            // produit_produit_user_ajouter_new_proposition_question
            if (0 === strpos($pathinfo, '/user/ajouter/new/proposition/question') && preg_match('#^/user/ajouter/new/proposition/question/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_user_ajouter_new_proposition_question')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\QuestionnaireController::addnewpropositionAction',));
            }

            // produit_produit_question_update_reponse
            if (0 === strpos($pathinfo, '/user/question/update/reponse') && preg_match('#^/user/question/update/reponse/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_question_update_reponse')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\QuestionnaireController::updatereponseAction',));
            }

        }

        // produit_produit_liste_questionnaire_composition_chapter
        if (0 === strpos($pathinfo, '/liste/questionnaire/composition/chapter') && preg_match('#^/liste/questionnaire/composition/chapter/(?P<id>\\d+)/(?P<idpropan>\\d+)(?:/(?P<src>\\d+))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_liste_questionnaire_composition_chapter')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\QuestionnaireController::composquestionnaireAction',  'src' => 0,));
        }

        if (0 === strpos($pathinfo, '/user')) {
            // produit_produit_valider_questionnaire_courant_chapter
            if (0 === strpos($pathinfo, '/user/valider/questionnaire/courant/chapter') && preg_match('#^/user/valider/questionnaire/courant/chapter/(?P<id>\\d+)/(?P<prodpan>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_valider_questionnaire_courant_chapter')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\QuestionnaireController::validationquestionnaireAction',));
            }

            // produit_produit_composition_update_compos_questionnaire
            if (0 === strpos($pathinfo, '/user/composition/update/compos/questionnaire') && preg_match('#^/user/composition/update/compos/questionnaire/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_composition_update_compos_questionnaire')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\QuestionnaireController::updatecompositionAction',));
            }

            // produit_produit_supprimer_proposition_question
            if (0 === strpos($pathinfo, '/user/supprimer/proposition/question') && preg_match('#^/user/supprimer/proposition/question/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_supprimer_proposition_question')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\QuestionnaireController::supprimerpropositionAction',));
            }

            // produit_produit_validate_courant_question
            if (0 === strpos($pathinfo, '/user/validate/courant/question') && preg_match('#^/user/validate/courant/question/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_validate_courant_question')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\QuestionnaireController::validatequestionAction',));
            }

            // produit_produit_user_delete_questionnaire
            if (0 === strpos($pathinfo, '/user/delete/questionnaire') && preg_match('#^/user/delete/questionnaire/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_user_delete_questionnaire')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\QuestionnaireController::deletequestionnaireAction',));
            }

        }

        // produit_produit_download_video_cours
        if (0 === strpos($pathinfo, '/download/video/cours') && preg_match('#^/download/video/cours/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_download_video_cours')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::downloadvideocoursAction',));
        }

        // produit_produit_guide_formateur
        if (0 === strpos($pathinfo, '/user/guide/formateur') && preg_match('#^/user/guide/formateur/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_guide_formateur')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::guideformateurAction',));
        }

        // general_template_stop_alert_newsletter
        if ($pathinfo === '/stop/alert/newsletter') {
            return array (  '_controller' => 'General\\TemplateBundle\\Controller\\MenuController::stopAlertNewletterAction',  '_route' => 'general_template_stop_alert_newsletter',);
        }

        // users_user_inscription_user
        if ($pathinfo === '/inscription/user') {
            return array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::inscriptionuserAction',  '_route' => 'users_user_inscription_user',);
        }

        if (0 === strpos($pathinfo, '/accueil')) {
            // users_user_user_accueil
            if (0 === strpos($pathinfo, '/accueil/user') && preg_match('#^/accueil/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_user_accueil')), array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::accueiluserAction',));
            }

            // users_user_accueil_commande_user
            if (0 === strpos($pathinfo, '/accueil/commande/user') && preg_match('#^/accueil/commande/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_accueil_commande_user')), array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::accueilcommandeuserAction',));
            }

        }

        // users_user_connexion_user
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'Users\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'users_user_connexion_user',);
        }

        // users_user_acces_plateforme
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'users_user_acces_plateforme');
            }

            return array (  '_controller' => 'Users\\UserBundle\\Controller\\SecurityController::accueilsiteAction',  '_route' => 'users_user_acces_plateforme',);
        }

        // users_user_courant_noel_website_alert
        if ($pathinfo === '/noel/kenfack/courant/website') {
            return array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::alertnoelAction',  '_route' => 'users_user_courant_noel_website_alert',);
        }

        if (0 === strpos($pathinfo, '/user')) {
            // users_user_modifier_profil
            if (0 === strpos($pathinfo, '/user/modifier/profil/user') && preg_match('#^/user/modifier/profil/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_modifier_profil')), array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::modifierprofilAction',));
            }

            // users_user_update_profil_user
            if (0 === strpos($pathinfo, '/user/update/profil/user') && preg_match('#^/user/update/profil/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_update_profil_user')), array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::updateprofilAction',));
            }

            // users_user_detail_panier_user
            if (0 === strpos($pathinfo, '/user/detail/user/commande') && preg_match('#^/user/detail/user/commande/(?P<panier>\\d+)/(?P<produit>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_detail_panier_user')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::detailpanieruserAction',));
            }

            if (0 === strpos($pathinfo, '/user/a')) {
                // users_user_add_new_copie_exercice
                if (0 === strpos($pathinfo, '/user/add/new/copie/exercice') && preg_match('#^/user/add/new/copie/exercice/(?P<exercice>\\d+)/(?P<prodpan>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_add_new_copie_exercice')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::addnewcopieexerciceAction',));
                }

                // users_user_ajout_copie_travaux_pratique
                if (0 === strpos($pathinfo, '/user/ajout/copie/travaux/pratique') && preg_match('#^/user/ajout/copie/travaux/pratique/(?P<pratique>\\d+)/(?P<prodpan>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_ajout_copie_travaux_pratique')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::ajoutcopietpAction',));
                }

                // users_user_alter_copie_exercice_user
                if (0 === strpos($pathinfo, '/user/alter/copie/exercice/user') && preg_match('#^/user/alter/copie/exercice/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_alter_copie_exercice_user')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::altercopieexerciceAction',));
                }

            }

            // users_user_modification_copie_travaux_pratique_user
            if (0 === strpos($pathinfo, '/user/modification/copie/travaux/pratique/user') && preg_match('#^/user/modification/copie/travaux/pratique/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_modification_copie_travaux_pratique_user')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::modificationcopietpAction',));
            }

            // users_user_update_note_exercice_user
            if (0 === strpos($pathinfo, '/user/update/note/exercice/user') && preg_match('#^/user/update/note/exercice/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_update_note_exercice_user')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::updatenoteexerciceAction',));
            }

            // users_user_modif_note_tp_courant_user
            if (0 === strpos($pathinfo, '/user/modif/note/tp/courant/user') && preg_match('#^/user/modif/note/tp/courant/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_modif_note_tp_courant_user')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::updatenotetpAction',));
            }

        }

        // users_user_ajout_super_admin
        if ($pathinfo === '/ajouter/supper/admin') {
            return array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::ajouteradminAction',  '_route' => 'users_user_ajout_super_admin',);
        }

        // users_user_presentation_service_even
        if (0 === strpos($pathinfo, '/presentation/service/evenement') && preg_match('#^/presentation/service/evenement(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_presentation_service_even')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::presentationAction',  'id' => 0,));
        }

        // users_user_liste_forum_epingle
        if (0 === strpos($pathinfo, '/liste/forum/epingle') && preg_match('#^/liste/forum/epingle/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_liste_forum_epingle')), array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::forumepingleAction',));
        }

        // users_user_create_newsletter_account
        if ($pathinfo === '/create/newsletter/account') {
            return array (  '_controller' => 'Users\\UserBundle\\Controller\\NewsletterController::createaccountAction',  '_route' => 'users_user_create_newsletter_account',);
        }

        if (0 === strpos($pathinfo, '/packagewebsiteadmin')) {
            // users_adminuser_accueil_administration
            if ($pathinfo === '/packagewebsiteadmin/admin/accueil') {
                return array (  '_controller' => 'Users\\AdminuserBundle\\Controller\\AccueilController::accueiladminAction',  '_route' => 'users_adminuser_accueil_administration',);
            }

            // users_adminuser_categorisation_produit_plateforme
            if ($pathinfo === '/packagewebsiteadmin/categorisation/produit/plateforme') {
                return array (  '_controller' => 'Users\\AdminuserBundle\\Controller\\AccueilController::categorieproduitAction',  '_route' => 'users_adminuser_categorisation_produit_plateforme',);
            }

            // users_adminuser_save_categorie_product
            if ($pathinfo === '/packagewebsiteadmin/enregistrer/nouvelle/categorie') {
                return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::savecategorieAction',  '_route' => 'users_adminuser_save_categorie_product',);
            }

            // users_adminuser_ajouter_sous_categorie
            if ($pathinfo === '/packagewebsiteadmin/ajouter/nouvelle/souscategorie') {
                return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::ajoutersouscategorieAction',  '_route' => 'users_adminuser_ajouter_sous_categorie',);
            }

            // users_adminuser_liste_scat_categorie
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/liste/scat/categorie') && preg_match('#^/packagewebsiteadmin/liste/scat/categorie/(?P<id>\\d+)(?:/(?P<pagesuivante>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_liste_scat_categorie')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::listecategorieAction',  'pagesuivante' => 1,));
            }

            if (0 === strpos($pathinfo, '/packagewebsiteadmin/modifi')) {
                // users_adminuser_modification_categorie_produit
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/modification/categorie/produit') && preg_match('#^/packagewebsiteadmin/modification/categorie/produit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modification_categorie_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::modificationcategorieAction',));
                }

                // users_adminuser_modifier_sous_categorie_produit
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/modifier/sous/categorie/produit') && preg_match('#^/packagewebsiteadmin/modifier/sous/categorie/produit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modifier_sous_categorie_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::altersouscategorieAction',));
                }

            }

            // users_adminuser_supprimer_cat_prod
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprimer/cat/prod') && preg_match('#^/packagewebsiteadmin/supprimer/cat/prod/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_supprimer_cat_prod')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::SupprimercategorieAction',));
            }

            // users_adminuser_delete_scat_prod
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/delete/scat/prod') && preg_match('#^/packagewebsiteadmin/delete/scat/prod/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_delete_scat_prod')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::SupprimersouscategorieAction',));
            }

            // users_adminuser_add_new_slide
            if ($pathinfo === '/packagewebsiteadmin/add/new/slide') {
                return array (  '_controller' => 'Users\\UserBundle\\Controller\\ImgslideController::addnewslideAction',  '_route' => 'users_adminuser_add_new_slide',);
            }

            // users_adminuser_delete_courant_slide
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/delete/courant/slide') && preg_match('#^/packagewebsiteadmin/delete/courant/slide/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_delete_courant_slide')), array (  '_controller' => 'Users\\UserBundle\\Controller\\ImgslideController::deleteslideAction',));
            }

            // users_adminuser_liste_produit_souscategorie
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/liste/produit/souscategorie') && preg_match('#^/packagewebsiteadmin/liste/produit/souscategorie/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_liste_produit_souscategorie')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::listeproduitadminAction',));
            }

            // users_adminuser_prod_invalide_courant_souscategorie
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/prod/invalide/courant/souscategorie') && preg_match('#^/packagewebsiteadmin/prod/invalide/courant/souscategorie/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_prod_invalide_courant_souscategorie')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::listeproduitinvalideAction',));
            }

            // users_adminuser_allprod_archive_courant_souscategorie
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/allprod/archive/courant/souscategorie') && preg_match('#^/packagewebsiteadmin/allprod/archive/courant/souscategorie/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_allprod_archive_courant_souscategorie')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::listeprodarchiveAction',));
            }

            // users_adminuser_solder_gain_courant_user
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/solder/gain/courant/user') && preg_match('#^/packagewebsiteadmin/solder/gain/courant/user/(?P<id>\\d+)/(?P<user>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_solder_gain_courant_user')), array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::soldergainuserAction',));
            }

            // users_adminuser_demande_gagnant_rencontres_souscategorie
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/demande/gagnant/rencontres/souscategorie') && preg_match('#^/packagewebsiteadmin/demande/gagnant/rencontres/souscategorie/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_demande_gagnant_rencontres_souscategorie')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::demandegagnantAction',));
            }

            if (0 === strpos($pathinfo, '/packagewebsiteadmin/p')) {
                // users_adminuser_publier_produit_courant_souscategorie
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/publier/produit/courant/souscategorie') && preg_match('#^/packagewebsiteadmin/publier/produit/courant/souscategorie/(?P<id>\\d+)(?:/(?P<guide>\\d+))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_publier_produit_courant_souscategorie')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::publierproduitadminAction',  'guide' => 0,));
                }

                // users_adminuser_placer_produit_acceuilcourant_souscategorie
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/placer/produit/acceuilcourant/souscategorie') && preg_match('#^/packagewebsiteadmin/placer/produit/acceuilcourant/souscategorie/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_placer_produit_acceuilcourant_souscategorie')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::addproduitaccueilAction',));
                }

            }

            if (0 === strpos($pathinfo, '/packagewebsiteadmin/modifi')) {
                // users_adminuser_modifier_courant_categorie
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/modification/categorie') && preg_match('#^/packagewebsiteadmin/modification/categorie/(?P<id>\\d+)/(?P<scat>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modifier_courant_categorie')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::modificationcategorieAction',));
                }

                // users_adminuser_alter_courant_souscategorie
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/modifier/courant/souscategorie') && preg_match('#^/packagewebsiteadmin/modifier/courant/souscategorie/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_alter_courant_souscategorie')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::altersouscategorieAction',));
                }

                // users_adminuser_update_courant_produit
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/modification/produit') && preg_match('#^/packagewebsiteadmin/modification/produit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_update_courant_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::modifierproduitAction',));
                }

            }

            // users_adminuser_alter_score_rencontre
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/alter/score/rencontre') && preg_match('#^/packagewebsiteadmin/alter/score/rencontre/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_alter_score_rencontre')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::alterprixproduitAction',));
            }

            // produit_produit_suppression_produit_user_controller
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/suppression/produit/user/controller') && preg_match('#^/packagewebsiteadmin/suppression/produit/user/controller/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_suppression_produit_user_controller')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::supprimerproduitAction',));
            }

            // users_adminuser_miseajour_produit
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/miseajour/du/produit') && preg_match('#^/packagewebsiteadmin/miseajour/du/produit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_miseajour_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::miseajourproduitAction',));
            }

            // users_adminuser_supprimer_image_produit
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprimer/image/produit') && preg_match('#^/packagewebsiteadmin/supprimer/image/produit/(?P<id>[a-zA-Z0-9]*)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_supprimer_image_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::supprimerimageAction',));
            }

            // users_adminuser_validation_dupayement
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/validation/du/payement') && preg_match('#^/packagewebsiteadmin/validation/du/payement/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_validation_dupayement')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::validationpayementAction',));
            }

            // users_adminuser_liste_panier_non_livrer
            if ($pathinfo === '/packagewebsiteadmin/liste/des/paniers/non/livrer') {
                return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::paniernonlivrerAction',  '_route' => 'users_adminuser_liste_panier_non_livrer',);
            }

            // users_adminuser_contenu_panier_user
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/contenu/admin/panier/user') && preg_match('#^/packagewebsiteadmin/contenu/admin/panier/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_contenu_panier_user')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::contenupanierAction',));
            }

            // users_adminuser_livraison_panier_commander
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/livraison/panier/commander') && preg_match('#^/packagewebsiteadmin/livraison/panier/commander/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_livraison_panier_commander')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::livraisonpanierAction',));
            }

            // users_adminuser_tousles_panier_livrer
            if ($pathinfo === '/packagewebsiteadmin/tousles/paniers/livrer') {
                return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::panierlivrerAction',  '_route' => 'users_adminuser_tousles_panier_livrer',);
            }

            // users_adminuser_supprimer_courant_produit
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprimer/produit/admin') && preg_match('#^/packagewebsiteadmin/supprimer/produit/admin/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_supprimer_courant_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::supprimerproduitAction',));
            }

            // users_adminuser_ajout_nouveau_admin
            if ($pathinfo === '/packagewebsiteadmin/ajout/nouveau/admin/plateforme') {
                return array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::nouveauadminAction',  '_route' => 'users_adminuser_ajout_nouveau_admin',);
            }

            // users_adminuser_enleve_role_admin
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/enleve/role/admin/user') && preg_match('#^/packagewebsiteadmin/enleve/role/admin/user/(?P<id>\\d+)(?:/(?P<idrole>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_enleve_role_admin')), array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::eleveroleAction',  'idrole' => 1,));
            }

            // users_adminuser_ajouter_nouveau_service
            if ($pathinfo === '/packagewebsiteadmin/offres/formations') {
                return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::nouveauserviceAction',  '_route' => 'users_adminuser_ajouter_nouveau_service',);
            }

            if (0 === strpos($pathinfo, '/packagewebsiteadmin/a')) {
                // users_adminuser_ajouter_nouvelle_competition_user
                if ($pathinfo === '/packagewebsiteadmin/ajouter/nouvelle/competition/user') {
                    return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::nouvellecompetitionAction',  '_route' => 'users_adminuser_ajouter_nouvelle_competition_user',);
                }

                // users_adminusers_add_new_service
                if ($pathinfo === '/packagewebsiteadmin/add/new/service/struct') {
                    return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::addnewserviceAction',  '_route' => 'users_adminusers_add_new_service',);
                }

            }

            // users_adminuser_modifier_un_service
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/modifier/un/nouveau/service') && preg_match('#^/packagewebsiteadmin/modifier/un/nouveau/service/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modifier_un_service')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::modifierserviceAction',));
            }

            // users_adminuser_remove_cours_formation
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/remove/cours/formation') && preg_match('#^/packagewebsiteadmin/remove/cours/formation/(?P<id>\\d+)/(?P<cours>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_remove_cours_formation')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::removecoursAction',));
            }

            if (0 === strpos($pathinfo, '/packagewebsiteadmin/modifi')) {
                // users_adminuser_modification_nouveau_service_struct
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/modification/courant/service/struct') && preg_match('#^/packagewebsiteadmin/modification/courant/service/struct/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modification_nouveau_service_struct')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::modificationserviceAction',));
                }

                // users_adminuser_service_modifier_evenement_service
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/modifier/evenement/service') && preg_match('#^/packagewebsiteadmin/modifier/evenement/service/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_service_modifier_evenement_service')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::modifierevenementAction',));
                }

            }

            // users_adminuser_competition_modifier_competition_user
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/competition/modifier/theme/forum/user') && preg_match('#^/packagewebsiteadmin/competition/modifier/theme/forum/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_competition_modifier_competition_user')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::modifiercompetitionAction',));
            }

            // users_adminuser_add_un_evenement
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/add/new/evenement/service') && preg_match('#^/packagewebsiteadmin/add/new/evenement/service/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_add_un_evenement')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::addevenementAction',));
            }

            if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprim')) {
                // users_adminuser_supprim_service_evenement
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprim/service/evenement') && preg_match('#^/packagewebsiteadmin/supprim/service/evenement/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_supprim_service_evenement')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::supprimevenementAction',));
                }

                // users_adminuser_supprimer_service_even
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprimer/service/even') && preg_match('#^/packagewebsiteadmin/supprimer/service/even/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_supprimer_service_even')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::supprimerserviceAction',));
                }

            }

            // users_adminuser_delette_valeur_formation
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/delette/valeur/formation') && preg_match('#^/packagewebsiteadmin/delette/valeur/formation/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_delette_valeur_formation')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::supprimervaleurformationAction',));
            }

            // users_adminuser_supprimer_competition_championnat
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprimer/competition/championnat') && preg_match('#^/packagewebsiteadmin/supprimer/competition/championnat/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_supprimer_competition_championnat')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::supprimercompetitionAction',));
            }

            // users_adminuser_liste_message_recu
            if ($pathinfo === '/packagewebsiteadmin/liste/des/messages/recu') {
                return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\MessageController::messagerecuAction',  '_route' => 'users_adminuser_liste_message_recu',);
            }

            // users_adminuser_supprim_message_contact
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprimer/message/contact') && preg_match('#^/packagewebsiteadmin/supprimer/message/contact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_supprim_message_contact')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\MessageController::supprimermessageAction',));
            }

            // produit_service_ajouter_ville
            if ($pathinfo === '/packagewebsiteadmin/ajout/nouvelle/ville') {
                return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\VilleController::ajoutvilleAction',  '_route' => 'produit_service_ajouter_ville',);
            }

            // produit_service_supprimer_ville_courante
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprimer/ville/courante') && preg_match('#^/packagewebsiteadmin/supprimer/ville/courante/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_supprimer_ville_courante')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\VilleController::supprimervilleAction',));
            }

            // users_adminuser_add_cout_livraison
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/add/cout/livraison/produit') && preg_match('#^/packagewebsiteadmin/add/cout/livraison/produit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_add_cout_livraison')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::addcoutlivraisonAction',));
            }

            // users_adminuser_modif_coutlivraison_produit
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/modif/coutlivraison/produit') && preg_match('#^/packagewebsiteadmin/modif/coutlivraison/produit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modif_coutlivraison_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::modifcoutlivraisonAction',));
            }

            // users_adminuser_delete_coutlivraison
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/delete/produit/coutlivraison') && preg_match('#^/packagewebsiteadmin/delete/produit/coutlivraison/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_delete_coutlivraison')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::supprimercoutlivraisonAction',));
            }

            // users_adminuser_apropos_de_nous
            if ($pathinfo === '/packagewebsiteadmin/ils/parlent/denous') {
                return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\AproposController::direaproposAction',  '_route' => 'users_adminuser_apropos_de_nous',);
            }

            // users_adminuser_modification_propos_client
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/modification/propos/client') && preg_match('#^/packagewebsiteadmin/modification/propos/client/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modification_propos_client')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\AproposController::modifieraproposAction',));
            }

            // users_adminuser_about_us_supprimer
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprimer/le/on/enparlent') && preg_match('#^/packagewebsiteadmin/supprimer/le/on/enparlent/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_about_us_supprimer')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\AproposController::deleteaproposAction',));
            }

            // users_adminuser_liste_dossier_recrutement
            if ($pathinfo === '/packagewebsiteadmin/liste/dossier/recrutement/user') {
                return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\RecrutementController::listedossierAction',  '_route' => 'users_adminuser_liste_dossier_recrutement',);
            }

            // users_adminuser_gestion_info_entreprise
            if ($pathinfo === '/packagewebsiteadmin/gestion/information/entreprise') {
                return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\InfoentrepriseController::infoentrepriseAction',  '_route' => 'users_adminuser_gestion_info_entreprise',);
            }

            // users_adminuser_supprission_information_entreprise
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprission/information/entreprise') && preg_match('#^/packagewebsiteadmin/supprission/information/entreprise/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_supprission_information_entreprise')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\InfoentrepriseController::supprimerinfoentrepriseAction',));
            }

            // users_adminuser_modification_information_entreprise_courant
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/modification/information/entreprise/courant') && preg_match('#^/packagewebsiteadmin/modification/information/entreprise/courant/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modification_information_entreprise_courant')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\InfoentrepriseController::modifierinfoentrepriseAction',));
            }

            // users_adminuser_ajouter_detail_info_entreprise
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/ajouter/detail/info/entreprise') && preg_match('#^/packagewebsiteadmin/ajouter/detail/info/entreprise/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_ajouter_detail_info_entreprise')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\InfoentrepriseController::ajouterinfoentrepriseAction',));
            }

            if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprimer/d')) {
                // users_adminuser_supprimer_detail_information_entreprise
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprimer/detail/information/entreprise') && preg_match('#^/packagewebsiteadmin/supprimer/detail/information/entreprise/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_supprimer_detail_information_entreprise')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\InfoentrepriseController::supprimerdetailinfoentrepriseAction',));
                }

                // users_adminuser_delete_dossier_recrut
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprimer/dossier/recrutement') && preg_match('#^/packagewebsiteadmin/supprimer/dossier/recrutement/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_delete_dossier_recrut')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\RecrutementController::supprimerdossierAction',));
                }

            }

            // users_adminuser_valider_demande_defont
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/valider/demande/defont') && preg_match('#^/packagewebsiteadmin/valider/demande/defont/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_valider_demande_defont')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\RecrutementController::validerdossierAction',));
            }

            if (0 === strpos($pathinfo, '/packagewebsiteadmin/telecharge')) {
                // users_adminuser_telecharg_cv_user
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/telecharge/cv/recrutement') && preg_match('#^/packagewebsiteadmin/telecharge/cv/recrutement/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_telecharg_cv_user')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\RecrutementController::telechargercvAction',));
                }

                // users_adminuser_telecharg_lettre_motivation_user
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/telecharge/lettre/motivation/recrutement') && preg_match('#^/packagewebsiteadmin/telecharge/lettre/motivation/recrutement/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_telecharg_lettre_motivation_user')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\RecrutementController::telechargerlettreAction',));
                }

            }

            // users_adminuser_modification_image_slide_accueil
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/modification/image/slide/accueil') && preg_match('#^/packagewebsiteadmin/modification/image/slide/accueil/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modification_image_slide_accueil')), array (  '_controller' => 'Users\\UserBundle\\Controller\\ImgslideController::modifierslideAction',));
            }

            // users_adminuser_ajouter_image_service_courant
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/ajouter/image/service/courant') && preg_match('#^/packagewebsiteadmin/ajouter/image/service/courant/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_ajouter_image_service_courant')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::ajouterimgserviceAction',));
            }

            // users_adminuser_supprimer_img_service_courant
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprimer/img/service/courant') && preg_match('#^/packagewebsiteadmin/supprimer/img/service/courant/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_supprimer_img_service_courant')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::supprimerimgserviceAction',));
            }

            // users_adminuser_message_email_new_letter
            if ($pathinfo === '/packagewebsiteadmin/message/email/news/letter') {
                return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\MessemailController::messageemailAction',  '_route' => 'users_adminuser_message_email_new_letter',);
            }

            if (0 === strpos($pathinfo, '/packagewebsiteadmin/s')) {
                // users_adminuser_send_message_email_identified_user
                if ($pathinfo === '/packagewebsiteadmin/send/message/email/identified/user') {
                    return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\MessemailController::messageidentifieduserAction',  '_route' => 'users_adminuser_send_message_email_identified_user',);
                }

                if (0 === strpos($pathinfo, '/packagewebsiteadmin/supp')) {
                    // users_adminuser_suppression_mess_email_user
                    if (0 === strpos($pathinfo, '/packagewebsiteadmin/suppression/mess/email/user') && preg_match('#^/packagewebsiteadmin/suppression/mess/email/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_suppression_mess_email_user')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\MessemailController::supprimermessemailAction',));
                    }

                    // users_adminuser_supp_panier_produit_user
                    if (0 === strpos($pathinfo, '/packagewebsiteadmin/supp/panier/produit/user') && preg_match('#^/packagewebsiteadmin/supp/panier/produit/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_supp_panier_produit_user')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::supprimerpanierAction',));
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // login
                if (preg_match('#^/login(?:/(?P<special>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'login')), array (  '_controller' => 'Users\\UserBundle\\Controller\\SecurityController::loginAction',  'special' => 0,));
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'login_check');
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

        }

        if (0 === strpos($pathinfo, '/console')) {
            // console
            if (rtrim($pathinfo, '/') === '/console') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_console;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'console');
                }

                return array (  '_controller' => 'CoreSphere\\ConsoleBundle\\Controller\\ConsoleController::consoleAction',  '_route' => 'console',);
            }
            not_console:

            // console_exec
            if (preg_match('#^/console(?:\\.(?P<_format>json))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_console_exec;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'console_exec')), array (  '_controller' => 'CoreSphere\\ConsoleBundle\\Controller\\ConsoleController::execAction',  '_format' => 'json',));
            }
            not_console_exec:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
