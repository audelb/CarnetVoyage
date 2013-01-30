<?php

namespace CarnetVoyage\MapBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Visitable' table.
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
class VisitableTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.CarnetVoyage.MapBundle.Model.map.VisitableTableMap';

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
        $this->setName('Visitable');
        $this->setPhpName('Visitable');
        $this->setClassname('CarnetVoyage\\MapBundle\\Model\\Visitable');
        $this->setPackage('src.CarnetVoyage.MapBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('region_id', 'RegionId', 'INTEGER', 'Region', 'id', true, null, null);
        $this->addForeignKey('typevisitable_id', 'TypevisitableId', 'INTEGER', 'TypeVisitable', 'id', true, null, null);
        $this->addColumn('valeur', 'Valeur', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Region', 'CarnetVoyage\\MapBundle\\Model\\Region', RelationMap::MANY_TO_ONE, array('region_id' => 'id', ), null, null);
        $this->addRelation('Typevisitable', 'CarnetVoyage\\MapBundle\\Model\\Typevisitable', RelationMap::MANY_TO_ONE, array('typevisitable_id' => 'id', ), null, null);
        $this->addRelation('Visite', 'CarnetVoyage\\MapBundle\\Model\\Visite', RelationMap::ONE_TO_MANY, array('id' => 'visitable_id', ), null, null, 'Visites');
    } // buildRelations()

} // VisitableTableMap
