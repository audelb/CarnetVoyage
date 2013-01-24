<?php

namespace CarnetVoyage\MapBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'TypeVisitable' table.
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
class TypevisitableTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.CarnetVoyage.MapBundle.Model.map.TypevisitableTableMap';

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
        $this->setName('TypeVisitable');
        $this->setPhpName('Typevisitable');
        $this->setClassname('CarnetVoyage\\MapBundle\\Model\\Typevisitable');
        $this->setPackage('src.CarnetVoyage.MapBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('valeur', 'Valeur', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Visitable', 'CarnetVoyage\\MapBundle\\Model\\Visitable', RelationMap::ONE_TO_MANY, array('id' => 'typevisitable_id', ), null, null, 'Visitables');
    } // buildRelations()

} // TypevisitableTableMap
