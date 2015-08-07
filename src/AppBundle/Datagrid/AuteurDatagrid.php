<?php

namespace AppBundle\Datagrid;

use AppBundle\Datagrid\AdminDatagrid;
use AppBundle\Propel\AuteurQuery;

class AuteurDatagrid extends AdminDatagrid
{
    public function configureQuery()
    {
        return AuteurQuery::create();
    }

    public function configureFilter()
    {
        return array('id' => array(
                'type' => 'text',
                'options' => array(
                    'label' => "N°",
                    'required' => false,
                ),
            ),);
    }

    /*public function getDefaultFilters()
    {
        return array(
            'statuts'
        );
    }*/

    public function getDefaultSortColumn()
    {
        return 'id';
    }
    
    public function getDefaultSortOrder()
    {
        return 'desc';
    }

    public function getName()
    {
        return 'auteur';
    }

    public function getMaxPerPage()
    {
        return 15;
    }
}
