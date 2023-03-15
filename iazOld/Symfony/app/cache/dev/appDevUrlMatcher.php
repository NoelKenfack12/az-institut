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
        if (0 === strpos($pathinfo, '/info/azcorp') && preg_match('#^/info/azcorp/(?P<position>[^/]++)(?:/(?P<idtype>\\d+)(?:/(?P<idart>\\d+)(?:/(?P<page>\\d+))?)?)?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_apropos_denous')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::aproposdenousAction',  'idtype' => 0,  'idart' => 0,  'page' => 1,));
        }

        // produit_service_assistance_entreprise
        if (0 === strpos($pathinfo, '/assistance/entreprise') && preg_match('#^/assistance/entreprise(?:/(?P<entreprise>\\d+))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_assistance_entreprise')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\MessageController::assistanceentrepriseAction',  'entreprise' => 1,));
        }

        // produit_service_visiter_notre_blog
        if (0 === strpos($pathinfo, '/offres/speciales') && preg_match('#^/offres/speciales(?:/(?P<id>\\d+)(?:/(?P<page>\\d+))?)?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_visiter_notre_blog')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::notreblogAction',  'id' => 0,  'page' => 1,));
        }

        // produit_service_az_evenements
        if (0 === strpos($pathinfo, '/evenements/az') && preg_match('#^/evenements/az(?:/(?P<id>\\d+)(?:/(?P<page>\\d+))?)?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_az_evenements')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::evenementsAction',  'id' => 0,  'page' => 1,));
        }

        // produit_service_yourcv_recrutement
        if (0 === strpos($pathinfo, '/azcorp/careers') && preg_match('#^/azcorp/careers(?:/(?P<stage>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_yourcv_recrutement')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\RecrutementController::votredossierAction',  'stage' => 0,));
        }

        // produit_service_dossier_derecrutement_user
        if ($pathinfo === '/dossier/user/pour/recrutement/lancer') {
            return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\RecrutementController::ajoutdossieruserAction',  '_route' => 'produit_service_dossier_derecrutement_user',);
        }

        // produit_service_key_of_product_authentification
        if ($pathinfo === '/key/of/product/authentification') {
            return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\CurentwebsiteController::curentwebsiteAction',  '_route' => 'produit_service_key_of_product_authentification',);
        }

        if (0 === strpos($pathinfo, '/a')) {
            // produit_service_affiche_contenu_detaille_article_blog
            if (0 === strpos($pathinfo, '/affiche/contenu/detaill/article/blog') && preg_match('#^/affiche/contenu/detaill/article/blog/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_affiche_contenu_detaille_article_blog')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::affichearticleAction',));
            }

            // produit_service_ajouter_commentaire_article_user
            if (0 === strpos($pathinfo, '/ajouter/commentaire/article') && preg_match('#^/ajouter/commentaire/article/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_ajouter_commentaire_article_user')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::ajoutercommentaireAction',));
            }

        }

        // produit_service_supprimer_commentaire_courant_article
        if (0 === strpos($pathinfo, '/supprimer/commentaire/courant/article') && preg_match('#^/supprimer/commentaire/courant/article/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_supprimer_commentaire_courant_article')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::supprimercommentaireAction',));
        }

        // produit_service_detail_article_support
        if (0 === strpos($pathinfo, '/detail/article/support') && preg_match('#^/detail/article/support(?:/(?P<position>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_detail_article_support')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::detailarticlesupportAction',  'position' => 'article',));
        }

        if (0 === strpos($pathinfo, '/telecharge/doc')) {
            // users_adminuser_telecharg_cv_user
            if (0 === strpos($pathinfo, '/telecharge/doc/fichier/prog') && preg_match('#^/telecharge/doc/fichier/prog/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_telecharg_cv_user')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\RecrutementController::telechargercvAction',));
            }

            // users_adminuser_telecharg_lettre_motivation_user
            if (0 === strpos($pathinfo, '/telecharge/doc/image/programme') && preg_match('#^/telecharge/doc/image/programme/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_telecharg_lettre_motivation_user')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\RecrutementController::telechargerlettreAction',));
            }

        }

        // produit_service_detail_actualite
        if (0 === strpos($pathinfo, '/details/actualite') && preg_match('#^/details/actualite/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_service_detail_actualite')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::detailactualiteAction',));
        }

        if (0 === strpos($pathinfo, '/azcorp')) {
            // produit_produit_liste_produit_souscategorie
            if (0 === strpos($pathinfo, '/azcorp/svce') && preg_match('#^/azcorp/svce/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_liste_produit_souscategorie')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::listeproduituserAction',));
            }

            // produit_produit_produit_formation_institut
            if (0 === strpos($pathinfo, '/azcorp/institut') && preg_match('#^/azcorp/institut/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_produit_formation_institut')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::produitformationAction',));
            }

        }

        // produit_produit_detail_produit_market
        if (0 === strpos($pathinfo, '/detail/produit') && preg_match('#^/detail/produit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_detail_produit_market')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::detailproduitAction',));
        }

        // produit_produit_like_courant_product
        if ($pathinfo === '/like/courant/product') {
            return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::likeproductAction',  '_route' => 'produit_produit_like_courant_product',);
        }

        // produit_produit_modal_souscription_service
        if ($pathinfo === '/modal/souscription/service') {
            return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::modalsouscriptionserviceAction',  '_route' => 'produit_produit_modal_souscription_service',);
        }

        if (0 === strpos($pathinfo, '/a')) {
            // produit_produit_ajouter_product_panier
            if ($pathinfo === '/ajouter/product/panier') {
                return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::ajouterpanierAction',  '_route' => 'produit_produit_ajouter_product_panier',);
            }

            // produit_produit_add_panier_produit
            if (0 === strpos($pathinfo, '/add/panier/produit') && preg_match('#^/add/panier/produit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_add_panier_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::addpanierAction',));
            }

        }

        // produit_produit_reglement_commande_du_panier
        if ($pathinfo === '/reglement/commande/dupanier') {
            return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::reglementcommandeAction',  '_route' => 'produit_produit_reglement_commande_du_panier',);
        }

        if (0 === strpos($pathinfo, '/e')) {
            // produit_produit_editer_courant_commande
            if ($pathinfo === '/edit/courant/commande') {
                return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::editcommandeAction',  '_route' => 'produit_produit_editer_courant_commande',);
            }

            // produit_produit_elever_produit_commande
            if (0 === strpos($pathinfo, '/enleve/produit/commande') && preg_match('#^/enleve/produit/commande(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_elever_produit_commande')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::eleveproduitAction',  'id' => 0,));
            }

        }

        // produit_produit_recherche_new_produit
        if ($pathinfo === '/recherche/new/produit') {
            return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::rechercheproduitAction',  '_route' => 'produit_produit_recherche_new_produit',);
        }

        // produit_produit_modifier_lieu_livraison
        if (0 === strpos($pathinfo, '/modifier/lieu/livraison/panier') && preg_match('#^/modifier/lieu/livraison/panier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_modifier_lieu_livraison')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::modifierlieulivraisonAction',));
        }

        // produit_produit_accueil_boutique_produit
        if ($pathinfo === '/catalogue/boutique') {
            return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::accueilboutiqueAction',  '_route' => 'produit_produit_accueil_boutique_produit',);
        }

        // produit_produit_manage_parametres_commande
        if (0 === strpos($pathinfo, '/manage/parametres/commande') && preg_match('#^/manage/parametres/commande/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_manage_parametres_commande')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::parametrescommandeAction',));
        }

        // produit_produit_custom_parameter_prodpan
        if (0 === strpos($pathinfo, '/custom/parameter/prodpan') && preg_match('#^/custom/parameter/prodpan/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_custom_parameter_prodpan')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::parameterprodpanAction',));
        }

        // produit_produit_manage_contacts_panier_user
        if (0 === strpos($pathinfo, '/manage/contacts/panier/user') && preg_match('#^/manage/contacts/panier/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_manage_contacts_panier_user')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::contactspanierAction',));
        }

        // produit_produit_sauvegarde_contacts_panier
        if (0 === strpos($pathinfo, '/sauvegarde/contacts/panier') && preg_match('#^/sauvegarde/contacts/panier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_sauvegarde_contacts_panier')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::savecontactsAction',));
        }

        // produit_produit_payement_commande_user
        if (0 === strpos($pathinfo, '/paiement/step/commande/user') && preg_match('#^/paiement/step/commande/user/(?P<id>\\d+)(?:/(?P<position>[^/]++)(?:/(?P<save>[^/]++))?)?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_payement_commande_user')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::paiementstepAction',  'position' => 'contacts',  'save' => 0,));
        }

        // produit_produit_afh_panier_bill
        if (0 === strpos($pathinfo, '/azcorp/card/bill') && preg_match('#^/azcorp/card/bill/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'produit_produit_afh_panier_bill')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::cardbillAction',));
        }

        // general_template_stop_alert_newsletter
        if ($pathinfo === '/stop/alert/newsletter') {
            return array (  '_controller' => 'General\\TemplateBundle\\Controller\\MenuController::stopAlertNewletterAction',  '_route' => 'general_template_stop_alert_newsletter',);
        }

        // users_user_inscription_user
        if ($pathinfo === '/inscription/user') {
            return array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::inscriptionuserAction',  '_route' => 'users_user_inscription_user',);
        }

        // users_user_user_accueil
        if (0 === strpos($pathinfo, '/accueil/user') && preg_match('#^/accueil/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_user_accueil')), array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::accueiluserAction',));
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

        // users_user_modifier_profil
        if (0 === strpos($pathinfo, '/modifier/profil/user') && preg_match('#^/modifier/profil/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_modifier_profil')), array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::modifierprofilAction',));
        }

        // users_user_detail_panier_user
        if (0 === strpos($pathinfo, '/detail/user/panier') && preg_match('#^/detail/user/panier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_detail_panier_user')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\PanierController::detailpanieruserAction',));
        }

        // users_user_ajout_super_admin
        if ($pathinfo === '/ajouter/supper/admin') {
            return array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::ajouteradminAction',  '_route' => 'users_user_ajout_super_admin',);
        }

        // users_user_presentation_service_even
        if (0 === strpos($pathinfo, '/presentation/service/evenement') && preg_match('#^/presentation/service/evenement(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_presentation_service_even')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::presentationAction',  'id' => 0,));
        }

        // users_user_create_newsletter_account
        if ($pathinfo === '/create/newsletter/account') {
            return array (  '_controller' => 'Users\\UserBundle\\Controller\\NewsletterController::createaccountAction',  '_route' => 'users_user_create_newsletter_account',);
        }

        // users_user_validation_social_login
        if (0 === strpos($pathinfo, '/validation/social/login') && preg_match('#^/validation/social/login(?:/(?P<agent>ordi|phone))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_validation_social_login')), array (  '_controller' => 'Users\\UserBundle\\Controller\\SecurityController::checksocialloginAction',  'agent' => 'ordi',));
        }

        // users_user_clearpidsessid
        if ($pathinfo === '/clear/pidsessid') {
            return array (  '_controller' => 'Users\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'users_user_clearpidsessid',);
        }

        if (0 === strpos($pathinfo, '/user')) {
            // users_user_add_new_reponse_billet_user
            if (0 === strpos($pathinfo, '/user/add/new/reponse/billet') && preg_match('#^/user/add/new/reponse/billet/(?P<id>\\d+)(?:/(?P<position>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_add_new_reponse_billet_user')), array (  '_controller' => 'Users\\UserBundle\\Controller\\BilletController::addnewreponseAction',  'position' => 1,));
            }

            if (0 === strpos($pathinfo, '/user/update')) {
                // users_user_update_billet_principale
                if (0 === strpos($pathinfo, '/user/update/billet/principale') && preg_match('#^/user/update/billet/principale(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_update_billet_principale')), array (  '_controller' => 'Users\\UserBundle\\Controller\\BilletController::updatebilletAction',  'id' => 0,));
                }

                // users_user_update_reponse_billet
                if (0 === strpos($pathinfo, '/user/update/reponse/billet') && preg_match('#^/user/update/reponse/billet(?:/(?P<id>\\d+)(?:/(?P<position>\\d+))?)?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_update_reponse_billet')), array (  '_controller' => 'Users\\UserBundle\\Controller\\BilletController::updatereponseAction',  'id' => 0,  'position' => 1,));
                }

            }

        }

        // users_user_reset_user_password
        if (0 === strpos($pathinfo, '/reset/user/password') && preg_match('#^/reset/user/password/(?P<etape>\\d+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_user_reset_user_password')), array (  '_controller' => 'Users\\UserBundle\\Controller\\SecurityController::resetpasswordAction',));
        }

        if (0 === strpos($pathinfo, '/packagewebsiteadmin')) {
            // users_adminuser_accueil_administration
            if ($pathinfo === '/packagewebsiteadmin/admin/accueil') {
                return array (  '_controller' => 'Users\\AdminuserBundle\\Controller\\AccueilController::accueiladminAction',  '_route' => 'users_adminuser_accueil_administration',);
            }

            // users_adminuser_save_categorie_product
            if ($pathinfo === '/packagewebsiteadmin/enregistrer/nouvelle/categorie') {
                return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::savecategorieAction',  '_route' => 'users_adminuser_save_categorie_product',);
            }

            // users_adminuser_supprimer_categorie_produit
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprimer/categorie/produit') && preg_match('#^/packagewebsiteadmin/supprimer/categorie/produit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_supprimer_categorie_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::supprimercategorieAction',));
            }

            // users_adminuser_ajouter_sous_categorie
            if ($pathinfo === '/packagewebsiteadmin/ajouter/nouvelle/souscategorie') {
                return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::ajoutersouscategorieAction',  '_route' => 'users_adminuser_ajouter_sous_categorie',);
            }

            // users_adminuser_delete_scat_prod
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/delete/scat/prod') && preg_match('#^/packagewebsiteadmin/delete/scat/prod/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_delete_scat_prod')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::supprimersouscategorieAction',));
            }

            // users_adminuser_add_new_caracteristique
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/add/new/caracteristique') && preg_match('#^/packagewebsiteadmin/add/new/caracteristique/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_add_new_caracteristique')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::addnewcaracteristiqueAction',));
            }

            // users_adminuser_supprimer_caracteristique_offre_user
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprimer/caracteristique/offre/user') && preg_match('#^/packagewebsiteadmin/supprimer/caracteristique/offre/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_supprimer_caracteristique_offre_user')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CaracteristiqueController::supprimercaracteristiqueAction',));
            }

            // users_adminuser_update_caracteristique_produit
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/update/caracteristique/produit') && preg_match('#^/packagewebsiteadmin/update/caracteristique/produit(?:/(?P<idproduit>\\d+)(?:/(?P<idoffre>\\d+))?)?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_update_caracteristique_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CaracteristiqueController::updatecaracteristiqueproduitAction',  'idproduit' => 0,  'idoffre' => 0,));
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

            if (0 === strpos($pathinfo, '/packagewebsiteadmin/m')) {
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/modif')) {
                    if (0 === strpos($pathinfo, '/packagewebsiteadmin/modifi')) {
                        // users_adminuser_modification_categorie_produit
                        if (0 === strpos($pathinfo, '/packagewebsiteadmin/modification/categorie/produit') && preg_match('#^/packagewebsiteadmin/modification/categorie/produit(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modification_categorie_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::modificationcategorieAction',  'id' => 0,));
                        }

                        // users_adminuser_modifier_sous_categorie_produit
                        if (0 === strpos($pathinfo, '/packagewebsiteadmin/modifier/sous/categorie/produit') && preg_match('#^/packagewebsiteadmin/modifier/sous/categorie/produit(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modifier_sous_categorie_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CategorieController::altersouscategorieAction',  'id' => 0,));
                        }

                        // users_adminuser_update_courant_produit
                        if (0 === strpos($pathinfo, '/packagewebsiteadmin/modification/produit') && preg_match('#^/packagewebsiteadmin/modification/produit(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_update_courant_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::modifierproduitAction',  'id' => 0,));
                        }

                    }

                    // users_adminuser_modifcation_caracteristique_produit
                    if (0 === strpos($pathinfo, '/packagewebsiteadmin/modifcation/caracteristique/produit') && preg_match('#^/packagewebsiteadmin/modifcation/caracteristique/produit(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modifcation_caracteristique_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CaracteristiqueController::modifiercaracteristiqueAction',  'id' => 0,));
                    }

                }

                // users_adminuser_miseajour_produit
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/miseajour/du/produit') && preg_match('#^/packagewebsiteadmin/miseajour/du/produit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_miseajour_produit')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\ProduitController::miseajourproduitAction',));
                }

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
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/enleve/role/admin/user') && preg_match('#^/packagewebsiteadmin/enleve/role/admin/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_enleve_role_admin')), array (  '_controller' => 'Users\\UserBundle\\Controller\\UserController::eleveroleAction',));
            }

            // users_adminuser_ajouter_nouveau_service
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/ajouter/nouveau/service') && preg_match('#^/packagewebsiteadmin/ajouter/nouveau/service(?:/(?P<add>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_ajouter_nouveau_service')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::nouveauserviceAction',  'add' => 0,));
            }

            // users_adminuser_modifier_un_service
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/modifier/un/nouveau/service') && preg_match('#^/packagewebsiteadmin/modifier/un/nouveau/service(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modifier_un_service')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::modifierserviceAction',  'id' => 0,));
            }

            if (0 === strpos($pathinfo, '/packagewebsiteadmin/add')) {
                // users_adminuser_add_new_ressource_article
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/addnew/ressource/article') && preg_match('#^/packagewebsiteadmin/addnew/ressource/article(?:/(?P<id>\\d+)(?:/(?P<name>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_add_new_ressource_article')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::addnewressourceAction',  'id' => 0,  'name' => 'photo',));
                }

                // users_adminuser_add_type_article
                if ($pathinfo === '/packagewebsiteadmin/add/type/article') {
                    return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::addtypearticleAction',  '_route' => 'users_adminuser_add_type_article',);
                }

            }

            // users_adminuser_delete_type_article
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/delete/type/article') && preg_match('#^/packagewebsiteadmin/delete/type/article/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_delete_type_article')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::supprimertypearticleAction',));
            }

            // users_adminuser_update_type_article
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/update/type/article') && preg_match('#^/packagewebsiteadmin/update/type/article(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_update_type_article')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::updatetypearticleAction',  'id' => 0,));
            }

            // users_adminuser_alter_document_telechargeable
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/alter/document/telechargeable') && preg_match('#^/packagewebsiteadmin/alter/document/telechargeable(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_alter_document_telechargeable')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\RecrutementController::updatedocumentAction',  'id' => 0,));
            }

            // users_adminuser_service_modifier_evenement_service
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/modifier/evenement/service') && preg_match('#^/packagewebsiteadmin/modifier/evenement/service(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_service_modifier_evenement_service')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::modifierevenementAction',  'id' => 0,));
            }

            // users_adminuser_add_un_evenement
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/add/un/evenement/service') && preg_match('#^/packagewebsiteadmin/add/un/evenement/service/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
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

            if (0 === strpos($pathinfo, '/packagewebsiteadmin/liste')) {
                // users_adminuser_liste_article_type
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/liste/article/type') && preg_match('#^/packagewebsiteadmin/liste/article/type(?:/(?P<idtype>\\d+)(?:/(?P<page>\\d+))?)?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_liste_article_type')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ServiceController::articlespartypeAction',  'idtype' => 0,  'page' => 1,));
                }

                // users_adminuser_liste_message_recu
                if ($pathinfo === '/packagewebsiteadmin/liste/des/messages/recu') {
                    return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\MessageController::messagerecuAction',  '_route' => 'users_adminuser_liste_message_recu',);
                }

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

            // users_adminuser_about_us_supprimer
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/supprimer/le/on/enparlent') && preg_match('#^/packagewebsiteadmin/supprimer/le/on/enparlent/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_about_us_supprimer')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\AproposController::deleteaproposAction',));
            }

            // users_adminuser_modif_about_us_message
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/modif/about/us/message') && preg_match('#^/packagewebsiteadmin/modif/about/us/message(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modif_about_us_message')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\AproposController::modifreviewAction',  'id' => 0,));
            }

            // users_adminuser_liste_dossier_recrutement
            if ($pathinfo === '/packagewebsiteadmin/liste/document/telechargeable') {
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

            // users_adminuser_change_image_slide
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/change/image/slide') && preg_match('#^/packagewebsiteadmin/change/image/slide(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_change_image_slide')), array (  '_controller' => 'Users\\UserBundle\\Controller\\ImgslideController::alterslideAction',  'id' => 0,));
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

            // users_adminuser_suppression_mess_email_user
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/suppression/mess/email/user') && preg_match('#^/packagewebsiteadmin/suppression/mess/email/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_suppression_mess_email_user')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\MessemailController::supprimermessemailAction',));
            }

            // users_adminuser_form_pays_continent
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/form/pays/continent') && preg_match('#^/packagewebsiteadmin/form/pays/continent(?:/(?P<page>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_form_pays_continent')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ContinentController::payscontinentAction',  'page' => 1,));
            }

            // users_adminuser_adding_pays_localite_user
            if ($pathinfo === '/packagewebsiteadmin/adding/pays/localite/user') {
                return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\PaysController::ajouterpaysAction',  '_route' => 'users_adminuser_adding_pays_localite_user',);
            }

            // users_adminuser_update_content_continent12
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/user/update/val/continent') && preg_match('#^/packagewebsiteadmin/user/update/val/continent(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_update_content_continent12')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ContinentController::updatecontinentAction',  'id' => 0,));
            }

            // users_adminuser_modif_pays_localisation_user
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/modif/pays/localisation/user') && preg_match('#^/packagewebsiteadmin/modif/pays/localisation/user(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modif_pays_localisation_user')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\PaysController::modificationpaysAction',  'id' => 0,));
            }

            // users_adminuser_localisation_supprimer_continent
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/user/localisation/supprimer/continent') && preg_match('#^/packagewebsiteadmin/user/localisation/supprimer/continent(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_localisation_supprimer_continent')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ContinentController::supprimercontinentAction',  'id' => 0,));
            }

            // users_adminuser_drop_country_user_local
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/drop/country/user/local') && preg_match('#^/packagewebsiteadmin/drop/country/user/local(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_drop_country_user_local')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\PaysController::dropcountryuserAction',  'id' => 0,));
            }

            // users_adminuser_gestion_applications
            if ($pathinfo === '/packagewebsiteadmin/gestion/applications') {
                return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\CategorieappliController::gestionapplicationsAction',  '_route' => 'users_adminuser_gestion_applications',);
            }

            if (0 === strpos($pathinfo, '/packagewebsiteadmin/user')) {
                // users_adminuser_modif_cat_application
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/user/modif/cat/application') && preg_match('#^/packagewebsiteadmin/user/modif/cat/application(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_modif_cat_application')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\CategorieappliController::modifcategorieAction',  'id' => 0,));
                }

                // users_adminuser_categorieappli_supprimer_categorie
                if (0 === strpos($pathinfo, '/packagewebsiteadmin/user/categorieappli/supprimer/categorie') && preg_match('#^/packagewebsiteadmin/user/categorieappli/supprimer/categorie(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_categorieappli_supprimer_categorie')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\CategorieappliController::supprimercategorieAction',  'id' => 0,));
                }

            }

            // users_adminuser_del_application_cat
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/del/application/cat') && preg_match('#^/packagewebsiteadmin/del/application/cat(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_del_application_cat')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ApplicationController::delapplicationuserAction',  'id' => 0,));
            }

            // users_adminuser_change_application_user
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/change/application/user') && preg_match('#^/packagewebsiteadmin/change/application/user(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_change_application_user')), array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ApplicationController::changeapplicationAction',  'id' => 0,));
            }

            // users_adminuser_add_new_application_user
            if ($pathinfo === '/packagewebsiteadmin/add/new/application/user') {
                return array (  '_controller' => 'Produit\\ServiceBundle\\Controller\\ApplicationController::ajouterappliAction',  '_route' => 'users_adminuser_add_new_application_user',);
            }

            // users_adminuser_catalogue_chantier_pro
            if ($pathinfo === '/packagewebsiteadmin/catalogue/chantier/pro') {
                return array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CataloguechantierController::cataloguechantierAction',  '_route' => 'users_adminuser_catalogue_chantier_pro',);
            }

            // users_adminuser_update_catalogue_chantier_invest
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/update/catalogue/chantier/invest') && preg_match('#^/packagewebsiteadmin/update/catalogue/chantier/invest(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_update_catalogue_chantier_invest')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CataloguechantierController::modifcatalogueAction',  'id' => 0,));
            }

            // users_adminuser_cataloguechantier_supprimer_entity
            if (0 === strpos($pathinfo, '/packagewebsiteadmin/cataloguechantier/supprimer/entity') && preg_match('#^/packagewebsiteadmin/cataloguechantier/supprimer/entity(?:/(?P<id>\\d+))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_adminuser_cataloguechantier_supprimer_entity')), array (  '_controller' => 'Produit\\ProduitBundle\\Controller\\CataloguechantierController::supprimercatalogueAction',  'id' => 0,));
            }

            // users_adminuser_parametres_administration
            if ($pathinfo === '/packagewebsiteadmin/parametres/admin') {
                return array (  '_controller' => 'Users\\AdminuserBundle\\Controller\\ParametreadminController::parametresadminAction',  '_route' => 'users_adminuser_parametres_administration',);
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
