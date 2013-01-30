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
use CarnetVoyage\MapBundle\Model\Region;
use CarnetVoyage\MapBundle\Model\Typevisitable;
use CarnetVoyage\MapBundle\Model\Visitable;
use CarnetVoyage\MapBundle\Model\VisitablePeer;
use CarnetVoyage\MapBundle\Model\VisitableQuery;
use CarnetVoyage\MapBundle\Model\Visite;

/**
 * Base class that represents a query for the 'Visitable' table.
 *
 *
 *
 * @method VisitableQuery orderById($order = Criteria::ASC) Order by the id column
 * @method VisitableQuery orderByRegionId($order = Criteria::ASC) Order by the region_id column
 * @method VisitableQuery orderByTypevisitableId($order = Criteria::ASC) Order by the typevisitable_id column
 * @method VisitableQuery orderByValeur($order = Criteria::ASC) Order by the valeur column
 *
 * @method VisitableQuery groupById() Group by the id column
 * @method VisitableQuery groupByRegionId() Group by the region_id column
 * @method VisitableQuery groupByTypevisitableId() Group by the typevisitable_id column
 * @method VisitableQuery groupByValeur() Group by the valeur column
 *
 * @method VisitableQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method VisitableQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method VisitableQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method VisitableQuery leftJoinRegion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Region relation
 * @method VisitableQuery rightJoinRegion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Region relation
 * @method VisitableQuery innerJoinRegion($relationAlias = null) Adds a INNER JOIN clause to the query using the Region relation
 *
 * @method VisitableQuery leftJoinTypevisitable($relationAlias = null) Adds a LEFT JOIN clause to the query using the Typevisitable relation
 * @method VisitableQuery rightJoinTypevisitable($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Typevisitable relation
 * @method VisitableQuery innerJoinTypevisitable($relationAlias = null) Adds a INNER JOIN clause to the query using the Typevisitable relation
 *
 * @method VisitableQuery leftJoinVisite($relationAlias = null) Adds a LEFT JOIN clause to the query using the Visite relation
 * @method VisitableQuery rightJoinVisite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Visite relation
 * @method VisitableQuery innerJoinVisite($relationAlias = null) Adds a INNER JOIN clause to the query using the Visite relation
 *
 * @method Visitable findOne(PropelPDO $con = null) Return the first Visitable matching the query
 * @method Visitable findOneOrCreate(PropelPDO $con = null) Return the first Visitable matching the query, or a new Visitable object populated from the query conditions when no match is found
 *
 * @method Visitable findOneByRegionId(int $region_id) Return the first Visitable filtered by the region_id column
 * @method Visitable findOneByTypevisitableId(int $typevisitable_id) Return the first Visitable filtered by the typevisitable_id column
 * @method Visitable findOneByValeur(string $valeur) Return the first Visitable filtered by the valeur column
 *
 * @method array findById(int $id) Return Visitable objects filtered by the id column
 * @method array findByRegionId(int $region_id) Return Visitable objects filtered by the region_id column
 * @method array findByTypevisitableId(int $typevisitable_id) Return Visitable objects filtered by the typevisitable_id column
 * @method array findByValeur(string $valeur) Return Visitable objects filtered by the valeur column
 *
 * @package    propel.generator.src.CarnetVoyage.MapBundle.Model.om
 */
abstract class BaseVisitableQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseVisitableQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = 'CarnetVoyage\\MapBundle\\Model\\Visitable', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new VisitableQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   VisitableQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return VisitableQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof VisitableQuery) {
            return $criteria;
        }
        $query = new VisitableQuery();
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
     * @return   Visitable|Visitable[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = VisitablePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(VisitablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Visitable A model object, or null if the key is not found
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
     * @return                 Visitable A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `region_id`, `typevisitable_id`, `valeur` FROM `Visitable` WHERE `id` = :p0';
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
            $obj = new Visitable();
            $obj->hydrate($row);
            VisitablePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Visitable|Visitable[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Visitable[]|mixed the list of results, formatted by the current formatter
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
     * @return VisitableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VisitablePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return VisitableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VisitablePeer::ID, $keys, Criteria::IN);
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
     * @return VisitableQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(VisitablePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(VisitablePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitablePeer::ID, $id, $comparison);
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
     * @return VisitableQuery The current query, for fluid interface
     */
    public function filterByRegionId($regionId = null, $comparison = null)
    {
        if (is_array($regionId)) {
            $useMinMax = false;
            if (isset($regionId['min'])) {
                $this->addUsingAlias(VisitablePeer::REGION_ID, $regionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regionId['max'])) {
                $this->addUsingAlias(VisitablePeer::REGION_ID, $regionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitablePeer::REGION_ID, $regionId, $comparison);
    }

    /**
     * Filter the query on the typevisitable_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTypevisitableId(1234); // WHERE typevisitable_id = 1234
     * $query->filterByTypevisitableId(array(12, 34)); // WHERE typevisitable_id IN (12, 34)
     * $query->filterByTypevisitableId(array('min' => 12)); // WHERE typevisitable_id >= 12
     * $query->filterByTypevisitableId(array('max' => 12)); // WHERE typevisitable_id <= 12
     * </code>
     *
     * @see       filterByTypevisitable()
     *
     * @param     mixed $typevisitableId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VisitableQuery The current query, for fluid interface
     */
    public function filterByTypevisitableId($typevisitableId = null, $comparison = null)
    {
        if (is_array($typevisitableId)) {
            $useMinMax = false;
            if (isset($typevisitableId['min'])) {
                $this->addUsingAlias(VisitablePeer::TYPEVISITABLE_ID, $typevisitableId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typevisitableId['max'])) {
                $this->addUsingAlias(VisitablePeer::TYPEVISITABLE_ID, $typevisitableId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitablePeer::TYPEVISITABLE_ID, $typevisitableId, $comparison);
    }

    /**
     * Filter the query on the valeur column
     *
     * Example usage:
     * <code>
     * $query->filterByValeur('fooValue');   // WHERE valeur = 'fooValue'
     * $query->filterByValeur('%fooValue%'); // WHERE valeur LIKE '%fooValue%'
     * </code>
     *
     * @param     string $valeur The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VisitableQuery The current query, for fluid interface
     */
    public function filterByValeur($valeur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($valeur)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $valeur)) {
                $valeur = str_replace('*', '%', $valeur);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VisitablePeer::VALEUR, $valeur, $comparison);
    }

    /**
     * Filter the query by a related Region object
     *
     * @param   Region|PropelObjectCollection $region The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 VisitableQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRegion($region, $comparison = null)
    {
        if ($region instanceof Region) {
            return $this
                ->addUsingAlias(VisitablePeer::REGION_ID, $region->getId(), $comparison);
        } elseif ($region instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VisitablePeer::REGION_ID, $region->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return VisitableQuery The current query, for fluid interface
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
     * Filter the query by a related Typevisitable object
     *
     * @param   Typevisitable|PropelObjectCollection $typevisitable The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 VisitableQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTypevisitable($typevisitable, $comparison = null)
    {
        if ($typevisitable instanceof Typevisitable) {
            return $this
                ->addUsingAlias(VisitablePeer::TYPEVISITABLE_ID, $typevisitable->getId(), $comparison);
        } elseif ($typevisitable instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VisitablePeer::TYPEVISITABLE_ID, $typevisitable->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTypevisitable() only accepts arguments of type Typevisitable or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Typevisitable relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return VisitableQuery The current query, for fluid interface
     */
    public function joinTypevisitable($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Typevisitable');

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
            $this->addJoinObject($join, 'Typevisitable');
        }

        return $this;
    }

    /**
     * Use the Typevisitable relation Typevisitable object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CarnetVoyage\MapBundle\Model\TypevisitableQuery A secondary query class using the current class as primary query
     */
    public function useTypevisitableQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTypevisitable($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Typevisitable', '\CarnetVoyage\MapBundle\Model\TypevisitableQuery');
    }

    /**
     * Filter the query by a related Visite object
     *
     * @param   Visite|PropelObjectCollection $visite  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 VisitableQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVisite($visite, $comparison = null)
    {
        if ($visite instanceof Visite) {
            return $this
                ->addUsingAlias(VisitablePeer::ID, $visite->getVisitableId(), $comparison);
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
     * @return VisitableQuery The current query, for fluid interface
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
     * @param   Visitable $visitable Object to remove from the list of results
     *
     * @return VisitableQuery The current query, for fluid interface
     */
    public function prune($visitable = null)
    {
        if ($visitable) {
            $this->addUsingAlias(VisitablePeer::ID, $visitable->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
