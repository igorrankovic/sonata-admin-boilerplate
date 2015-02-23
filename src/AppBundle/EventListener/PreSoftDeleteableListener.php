<?php

namespace AppBundle\EventListener;

use Doctrine\Common\EventArgs;

class PreSoftDeleteableListener
{
    private $user;
    private $container;

    public function __construct($serviceContainer)
    {
        $this->container = $serviceContainer;
    }

    public function postSoftDelete(EventArgs $args)
    {
        $securityContext = $this->container->get('security.context');
        $user = $securityContext->getToken()->getUser();
        $this->setUser($user);

        $om = $args->getEntityManager();

        //TODO - check if object is "blameable"
        $object = $args->getObject();
        $object->setDeletedBy($user);

        $om->flush($object);
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}