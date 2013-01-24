<?php

namespace CarnetVoyage\MapBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'Voyage' table.
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
class VoyageTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.CarnetVoyage.MapBundle.Model.map.VoyageTableMap';

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
        $this->setName('Voyage');
        $this->setPhpName('Voyage');
        $this->setClassname('CarnetVoyage\\MapBundle\\Model\\Voyage');
        $this->setPackage('src.CarnetVoyage.MapBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('dateDebut', 'Datedebut', 'DATE', true, null, null);
        $this->addColumn('dateFin', 'Datefin', 'DATE', true, null, null);
        $this->addColumn('nom', 'Nom', 'VARCHAR', true, 255, null);
        $this->addColumn('commentaire', 'Commentaire', 'CLOB', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Destination', 'CarnetVoyage\\MapBundle\\Model\\Destination', RelationMap::ONE_TO_MANY, array('id' => 'voyage_id', ), null, null, 'Destinations');
    } // buildRelations()

} // VoyageTableMap
