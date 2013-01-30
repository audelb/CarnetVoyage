<?php

namespace CarnetVoyage\MapBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Region' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.src.CarnetVoyage.MapBundle.Model.map
 */
class RegionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.CarnetVoyage.MapBundle.Model.map.RegionTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('Region');
        $this->setPhpName('Region');
        $this->setClassname('CarnetVoyage\\MapBundle\\Model\\Region');
        $this->setPackage('src.CarnetVoyage.MapBundle.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('pays_id', 'PaysId', 'INTEGER', 'Pays', 'id', true, null, null);
        $this->addColumn('valeur', 'Valeur', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Pays', 'CarnetVoyage\\MapBundle\\Model\\Pays', RelationMap::MANY_TO_ONE, array('pays_id' => 'id', ), null, null);
        $this->addRelation('Destination', 'CarnetVoyage\\MapBundle\\Model\\Destination', RelationMap::ONE_TO_MANY, array('id' => 'region_id', ), null, null, 'Destinations');
        $this->addRelation('Visitable', 'CarnetVoyage\\MapBundle\\Model\\Visitable', RelationMap::ONE_TO_MANY, array('id' => 'region_id', ), null, null, 'Visitables');
    } // buildRelations()

} // RegionTableMap
