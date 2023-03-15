<?php

namespace Proxies\__CG__\Produit\ProduitBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Categorie extends \Produit\ProduitBundle\Entity\Categorie implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'id', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'nom', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'typeservice', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'description', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'date', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'rang', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'user', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'souscategories', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'src', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'alt', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'file', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'tempFilename', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'servicetext', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'em');
        }

        return array('__isInitialized__', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'id', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'nom', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'typeservice', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'description', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'date', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'rang', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'user', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'souscategories', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'src', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'alt', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'file', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'tempFilename', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'servicetext', '' . "\0" . 'Produit\\ProduitBundle\\Entity\\Categorie' . "\0" . 'em');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Categorie $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getServicetext()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getServicetext', array());

        return parent::getServicetext();
    }

    /**
     * {@inheritDoc}
     */
    public function setServicetext(\General\ServiceBundle\Servicetext\GeneralServicetext $service)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setServicetext', array($service));

        return parent::setServicetext($service);
    }

    /**
     * {@inheritDoc}
     */
    public function getEm()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEm', array());

        return parent::getEm();
    }

    /**
     * {@inheritDoc}
     */
    public function setEm($em)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEm', array($em));

        return parent::setEm($em);
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setNom($nom)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNom', array($nom));

        return parent::setNom($nom);
    }

    /**
     * {@inheritDoc}
     */
    public function getNom()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNom', array());

        return parent::getNom();
    }

    /**
     * {@inheritDoc}
     */
    public function setDate($date)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDate', array($date));

        return parent::setDate($date);
    }

    /**
     * {@inheritDoc}
     */
    public function getDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDate', array());

        return parent::getDate();
    }

    /**
     * {@inheritDoc}
     */
    public function addSouscategory(\Produit\ProduitBundle\Entity\Souscategorie $souscategories)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addSouscategory', array($souscategories));

        return parent::addSouscategory($souscategories);
    }

    /**
     * {@inheritDoc}
     */
    public function removeSouscategory(\Produit\ProduitBundle\Entity\Souscategorie $souscategories)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeSouscategory', array($souscategories));

        return parent::removeSouscategory($souscategories);
    }

    /**
     * {@inheritDoc}
     */
    public function getSouscategories()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSouscategories', array());

        return parent::getSouscategories();
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(\Users\UserBundle\Entity\User $user)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', array($user));

        return parent::setUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getUser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', array());

        return parent::getUser();
    }

    /**
     * {@inheritDoc}
     */
    public function getTempFilename()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTempFilename', array());

        return parent::getTempFilename();
    }

    /**
     * {@inheritDoc}
     */
    public function setTempFilename($temp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTempFilename', array($temp));

        return parent::setTempFilename($temp);
    }

    /**
     * {@inheritDoc}
     */
    public function getFile()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFile', array());

        return parent::getFile();
    }

    /**
     * {@inheritDoc}
     */
    public function getUploadDir()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUploadDir', array());

        return parent::getUploadDir();
    }

    /**
     * {@inheritDoc}
     */
    public function setFile(\Symfony\Component\HttpFoundation\File\UploadedFile $file)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFile', array($file));

        return parent::setFile($file);
    }

    /**
     * {@inheritDoc}
     */
    public function preUpload()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'preUpload', array());

        return parent::preUpload();
    }

    /**
     * {@inheritDoc}
     */
    public function upload()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'upload', array());

        return parent::upload();
    }

    /**
     * {@inheritDoc}
     */
    public function preRemoveUpload()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'preRemoveUpload', array());

        return parent::preRemoveUpload();
    }

    /**
     * {@inheritDoc}
     */
    public function postRemoveUpload()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'postRemoveUpload', array());

        return parent::postRemoveUpload();
    }

    /**
     * {@inheritDoc}
     */
    public function getWebPath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWebPath', array());

        return parent::getWebPath();
    }

    /**
     * {@inheritDoc}
     */
    public function setSrc($src)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSrc', array($src));

        return parent::setSrc($src);
    }

    /**
     * {@inheritDoc}
     */
    public function getSrc()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSrc', array());

        return parent::getSrc();
    }

    /**
     * {@inheritDoc}
     */
    public function setAlt($alt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAlt', array($alt));

        return parent::setAlt($alt);
    }

    /**
     * {@inheritDoc}
     */
    public function getAlt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAlt', array());

        return parent::getAlt();
    }

    /**
     * {@inheritDoc}
     */
    public function setRang($rang)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRang', array($rang));

        return parent::setRang($rang);
    }

    /**
     * {@inheritDoc}
     */
    public function getRang()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRang', array());

        return parent::getRang();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', array($description));

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', array());

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setTypeservice($typeservice)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTypeservice', array($typeservice));

        return parent::setTypeservice($typeservice);
    }

    /**
     * {@inheritDoc}
     */
    public function getTypeservice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTypeservice', array());

        return parent::getTypeservice();
    }

    /**
     * {@inheritDoc}
     */
    public function getScatProduits()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getScatProduits', array());

        return parent::getScatProduits();
    }

}
