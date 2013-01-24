<?php

namespace CarnetVoyage\MapBundle\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use CarnetVoyage\MapBundle\Model\Contenu;
use CarnetVoyage\MapBundle\Model\Destination;
use CarnetVoyage\MapBundle\Model\DestinationPeer;
use CarnetVoyage\MapBundle\Model\DestinationQuery;
use CarnetVoyage\MapBundle\Model\Region;
use CarnetVoyage\MapBundle\Model\Visite;
use CarnetVoyage\MapBundle\Model\Voyage;

/**
 * Base class that represents a query for the 'Destination' table.
 *
 *
 *
 * @method DestinationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method DestinationQuery orderByRegionId($order = Criteria::ASC) Order by the region_id column
 * @method DestinationQuery orderByVoyageId($order = Criteria::ASC) Order by the voyage_id column
 * @method DestinationQuery orderByDatedebut($order = Criteria::ASC) Order by the dateDebut column
 * @method DestinationQuery orderByDatefin($order = Criteria::ASC) Order by the dateFin column
 * @method DestinationQuery orderByCommentaire($order = Criteria::ASC) Order by the commentaire column
 *
 * @method DestinationQuery groupById() Group by the id column
 * @method DestinationQuery groupByRegionId() Group by the region_id column
 * @method DestinationQuery groupByVoyageId() Group by the voyage_id column
 * @method DestinationQuery groupByDatedebut() Group by the dateDebut column
 * @method DestinationQuery groupByDatefin() Group by the dateFin column
 * @method DestinationQuery groupByCommentaire() Group by the commentaire column
 *
 * @method DestinationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DestinationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DestinationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DestinationQuery leftJoinVoyage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Voyage relation
 * @method DestinationQuery rightJoinVoyage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Voyage relation
 * @method DestinationQuery innerJoinVoyage($relationAlias = null) Adds a INNER JOIN clause to the query using the Voyage relation
 *
 * @method DestinationQuery leftJoinRegion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Region relation
 * @method DestinationQuery rightJoinRegion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Region relation
 * @method DestinationQuery innerJoinRegion($relationAlias = null) Adds a INNER JOIN clause to the query using the Region relation
 *
 * @method DestinationQuery leftJoinContenu($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contenu relation
 * @method DestinationQuery rightJoinContenu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contenu relation
 * @method DestinationQuery innerJoinContenu($relationAlias = null) Adds a INNER JOIN clause to the query using the Contenu relation
 *
 * @method DestinationQuery leftJoinVisite($relationAlias = null) Adds a LEFT JOIN clause to the query using the Visite relation
 * @method DestinationQuery rightJoinVisite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Visite relation
 * @method DestinationQuery innerJoinVisite($relationAlias = null) Adds a INNER JOIN clause to the query using the Visite relation
 *
 * @method Destination findOne(PropelPDO $con = null) Return the first Destination matching the query
 * @method Destination findOneOrCreate(PropelPDO $con = null) Return the first Destination matching the query, or a new Destination object populated from the query conditions when no match is found
 *
 * @method Destination findOneByRegionId(int $region_id) Return the first Destination filtered by the region_id column
 * @method Destination findOneByVoyageId(int $voyage_id) Return the first Destination filtered by the voyage_id column
 * @method Destination findOneByDatedebut(string $dateDebut) Return the first Destination filtered by the dateDebut column
 * @method Destination findOneByDatefin(string $dateFin) Return the first Destination filtered by the dateFin column
 * @method Destination findOneByCommentaire(string $commentaire) Return the first Destination filtered by the commentaire column
 *
 * @method array findById(int $id) Return Destination objects filtered by the id column
 * @method array findByRegionId(int $region_id) Return Destination objects filtered by the region_id column
 * @method array findByVoyageId(int $voyage_id) Return Destination objects filtered by the voyage_id column
 * @method array findByDatedebut(string $dateDebut) Return Destination objects filtered by the dateDebut column
 * @method array findByDatefin(string $dateFin) Return Destination objects filtered by the dateFin column
 * @method array findByCommentaire(string $commentaire) Return Destination objects filtered by the commentaire column
 *
 * @package    propel.generator.src.CarnetVoyage.MapBundle.Model.om
 */
abstract class BaseDestinationQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDestinationQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = 'CarnetVoyage\\MapBundle\\Model\\Destination', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DestinationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DestinationQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DestinationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DestinationQuery) {
            return $criteria;
        }
        $query = new DestinationQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Destination|Destination[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DestinationPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DestinationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Destination A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Destination A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `region_id`, `voyage_id`, `dateDebut`, `dateFin`, `commentaire` FROM `Destination` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Destination();
            $obj->hydrate($row);
            DestinationPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Destination|Destination[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Destination[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return DestinationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DestinationPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DestinationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DestinationPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DestinationQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DestinationPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DestinationPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DestinationPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the region_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRegionId(1234); // WHERE region_id = 1234
     * $query->filterByRegionId(array(12, 34)); // WHERE region_id IN (12, 34)
     * $query->filterByRegionId(array('min' => 12)); // WHERE region_id >= 12
     * $query->filterByRegionId(array('max' => 12)); // WHERE region_id <= 12
     * </code>
     *
     * @see       filterByRegion()
     *
     * @param     mixed $regionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DestinationQuery The current query, for fluid interface
     */
    public function filterByRegionId($regionId = null, $comparison = null)
    {
        if (is_array($regionId)) {
            $useMinMax = false;
            if (isset($regionId['min'])) {
                $this->addUsingAlias(DestinationPeer::REGION_ID, $regionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regionId['max'])) {
                $this->addUsingAlias(DestinationPeer::REGION_ID, $regionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DestinationPeer::REGION_ID, $regionId, $comparison);
    }

    /**
     * Filter the query on the voyage_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVoyageId(1234); // WHERE voyage_id = 1234
     * $query->filterByVoyageId(array(12, 34)); // WHERE voyage_id IN (12, 34)
     * $query->filterByVoyageId(array('min' => 12)); // WHERE voyage_id >= 12
     * $query->filterByVoyageId(array('max' => 12)); // WHERE voyage_id <= 12
     * </code>
     *
     * @see       filterByVoyage()
     *
     * @param     mixed $voyageId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DestinationQuery The current query, for fluid interface
     */
    public function filterByVoyageId($voyageId = null, $comparison = null)
    {
        if (is_array($voyageId)) {
            $useMinMax = false;
            if (isset($voyageId['min'])) {
                $this->addUsingAlias(DestinationPeer::VOYAGE_ID, $voyageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($voyageId['max'])) {
                $this->addUsingAlias(DestinationPeer::VOYAGE_ID, $voyageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DestinationPeer::VOYAGE_ID, $voyageId, $comparison);
    }

    /**
     * Filter the query on the dateDebut column
     *
     * Example usage:
     * <code>
     * $query->filterByDatedebut('2011-03-14'); // WHERE dateDebut = '2011-03-14'
     * $query->filterByDatedebut('now'); // WHERE dateDebut = '2011-03-14'
     * $query->filterByDatedebut(array('max' => 'yesterday')); // WHERE dateDebut > '2011-03-13'
     * </code>
     *
     * @param     mixed $datedebut The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DestinationQuery The current query, for fluid interface
     */
    public function filterByDatedebut($datedebut = null, $comparison = null)
    {
        if (is_array($datedebut)) {
            $useMinMax = false;
            if (isset($datedebut['min'])) {
                $this->addUsingAlias(DestinationPeer::DATEDEBUT, $datedebut['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datedebut['max'])) {
                $this->addUsingAlias(DestinationPeer::DATEDEBUT, $datedebut['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DestinationPeer::DATEDEBUT, $datedebut, $comparison);
    }

    /**
     * Filter the query on the dateFin column
     *
     * Example usage:
     * <code>
     * $query->filterByDatefin('2011-03-14'); // WHERE dateFin = '2011-03-14'
     * $query->filterByDatefin('now'); // WHERE dateFin = '2011-03-14'
     * $query->filterByDatefin(array('max' => 'yesterday')); // WHERE dateFin > '2011-03-13'
     * </code>
     *
     * @param     mixed $datefin The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DestinationQuery The current query, for fluid interface
     */
    public function filterByDatefin($datefin = null, $comparison = null)
    {
        if (is_array($datefin)) {
            $useMinMax = false;
            if (isset($datefin['min'])) {
                $this->addUsingAlias(DestinationPeer::DATEFIN, $datefin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datefin['max'])) {
                $this->addUsingAlias(DestinationPeer::DATEFIN, $datefin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DestinationPeer::DATEFIN, $datefin, $comparison);
    }

    /**
     * Filter the query on the commentaire column
     *
     * Example usage:
     * <code>
     * $query->filterByCommentaire('fooValue');   // WHERE commentaire = 'fooValue'
     * $query->filterByCommentaire('%fooValue%'); // WHERE commentaire LIKE '%fooValue%'
     * </code>
     *
     * @param     string $commentaire The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DestinationQuery The current query, for fluid interface
     */
    public function filterByCommentaire($commentaire = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($commentaire)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $commentaire)) {
                $commentaire = str_replace('*', '%', $commentaire);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DestinationPeer::COMMENTAIRE, $commentaire, $comparison);
    }

    /**
     * Filter the query by a related Voyage object
     *
     * @param   Voyage|PropelObjectCollection $voyage The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DestinationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVoyage($voyage, $comparison = null)
    {
        if ($voyage instanceof Voyage) {
            return $this
                ->addUsingAlias(DestinationPeer::VOYAGE_ID, $voyage->getId(), $comparison);
        } elseif ($voyage instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DestinationPeer::VOYAGE_ID, $voyage->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByVoyage() only accepts arguments of type Voyage or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Voyage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DestinationQuery The current query, for fluid interface
     */
    public function joinVoyage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Voyage');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Voyage');
        }

        return $this;
    }

    /**
     * Use the Voyage relation Voyage object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CarnetVoyage\MapBundle\Model\VoyageQuery A secondary query class using the current class as primary query
     */
    public function useVoyageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVoyage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Voyage', '\CarnetVoyage\MapBundle\Model\VoyageQuery');
    }

    /**
     * Filter the query by a related Region object
     *
     * @param   Region|PropelObjectCollection $region The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DestinationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRegion($region, $comparison = null)
    {
        if ($region instanceof Region) {
            return $this
                ->addUsingAlias(DestinationPeer::REGION_ID, $region->getId(), $comparison);
        } elseif ($region instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DestinationPeer::REGION_ID, $region->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRegion() only accepts arguments of type Region or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Region relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DestinationQuery The current query, for fluid interface
     */
    public function joinRegion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Region');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Region');
        }

        return $this;
    }

    /**
     * Use the Region relation Region object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CarnetVoyage\MapBundle\Model\RegionQuery A secondary query class using the current class as primary query
     */
    public function useRegionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRegion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Region', '\CarnetVoyage\MapBundle\Model\RegionQuery');
    }

    /**
     * Filter the query by a related Contenu object
     *
     * @param   Contenu|PropelObjectCollection $contenu  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DestinationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByContenu($contenu, $comparison = null)
    {
        if ($contenu instanceof Contenu) {
            return $this
                ->addUsingAlias(DestinationPeer::ID, $contenu->getDestinationId(), $comparison);
        } elseif ($contenu instanceof PropelObjectCollection) {
            return $this
                ->useContenuQuery()
                ->filterByPrimaryKeys($contenu->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByContenu() only accepts arguments of type Contenu or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Contenu relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DestinationQuery The current query, for fluid interface
     */
    public function joinContenu($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Contenu');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Contenu');
        }

        return $this;
    }

    /**
     * Use the Contenu relation Contenu object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CarnetVoyage\MapBundle\Model\ContenuQuery A secondary query class using the current class as primary query
     */
    public function useContenuQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinContenu($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Contenu', '\CarnetVoyage\MapBundle\Model\ContenuQuery');
    }

    /**
     * Filter the query by a related Visite object
     *
     * @param   Visite|PropelObjectCollection $visite  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DestinationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVisite($visite, $comparison = null)
    {
        if ($visite instanceof Visite) {
            return $this
                ->addUsingAlias(DestinationPeer::ID, $visite->getDestinationId(), $comparison);
        } elseif ($visite instanceof PropelObjectCollection) {
            return $this
                ->useVisiteQuery()
                ->filterByPrimaryKeys($visite->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVisite() only accepts arguments of type Visite or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Visite relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DestinationQuery The current query, for fluid interface
     */
    public function joinVisite($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Visite');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Visite');
        }

        return $this;
    }

    /**
     * Use the Visite relation Visite object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CarnetVoyage\MapBundle\Model\VisiteQuery A secondary query class using the current class as primary query
     */
    public function useVisiteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVisite($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Visite', '\CarnetVoyage\MapBundle\Model\VisiteQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Destination $destination Object to remove from the list of results
     *
     * @return DestinationQuery The current query, for fluid interface
     */
    public function prune($destination = null)
    {
        if ($destination) {
            $this->addUsingAlias(DestinationPeer::ID, $destination->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
