<?php

namespace CarnetVoyage\MapBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Visite' table.
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
class VisiteTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.CarnetVoyage.MapBundle.Model.map.VisiteTableMap';

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
        $this->setName('Visite');
        $this->setPhpName('Visite');
        $this->setClassname('CarnetVoyage\\MapBundle\\Model\\Visite');
        $this->setPackage('src.CarnetVoyage.MapBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('destination_id', 'DestinationId', 'INTEGER', 'Destination', 'id', true, null, null);
        $this->addForeignKey('visitable_id', 'VisitableId', 'INTEGER', 'Visitable', 'id', true, null, null);
        $this->addColumn('commentaire', 'Commentaire', 'CLOB', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Destination', 'CarnetVoyage\\MapBundle\\Model\\Destination', RelationMap::MANY_TO_ONE, array('destination_id' => 'id', ), null, null);
        $this->addRelation('Visitable', 'CarnetVoyage\\MapBundle\\Model\\Visitable', RelationMap::MANY_TO_ONE, array('visitable_id' => 'id', ), null, null);
    } // buildRelations()

} // VisiteTableMap
