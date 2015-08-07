<?php
namespace AppBundle\Datagrid;

use Spyrit\PropelDatagridBundle\Datagrid\PropelDatagrid;

abstract class AdminDatagrid extends PropelDatagrid 
{
    /**
     * return \Symfony\Component\Security\Core\SecurityContext
     */
    public function getSecurityContext()
    {
        return $this->container->get('security.context');
    }
    
    /**
     * return \Symfony\Component\Security\Core\Authentication\Token\Token
     */
    public function getSecurityToken()
    {
        return $this->getSecurityContext()->getToken();
    }
    
    /**
     * @return AppBundle\Propel\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->getSecurityToken()->getUser();
    }
    
    public function getResetActionParameterName()
    {
        return "reinitialiser";
    }
}

