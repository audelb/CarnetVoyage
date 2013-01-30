<?php

namespace CarnetVoyage\MapBundle\Model;

use CarnetVoyage\MapBundle\Model\om\BaseRegionQuery;


/**
 * Skeleton subclass for performing query and update operations on the 'Region' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.src.CarnetVoyage.MapBundle.Model
 */
class RegionQuery extends BaseRegionQuery
{
	public function getSelectList()
    {
        $liste_pays = PaysQuery::create()
		         ->find();
        $pays_regions = array();
        
        foreach ($liste_pays as $pays){
            $liste_region = $this->create()
			        ->findByPaysId($pays->getId());
            $regions = array();
            foreach ($liste_region as $region){
                $regions[$region->getId()] = $region->getValeur();
            }
            $pays_regions[$pays->getValeur()] = $regions;
        }
        return $pays_regions;
    }
}
