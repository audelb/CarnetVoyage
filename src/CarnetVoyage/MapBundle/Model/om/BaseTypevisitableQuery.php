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
use CarnetVoyage\MapBundle\Model\Typevisitable;
use CarnetVoyage\MapBundle\Model\TypevisitablePeer;
use CarnetVoyage\MapBundle\Model\TypevisitableQuery;
use CarnetVoyage\MapBundle\Model\Visitable;

/**
 * Base class that represents a query for the 'TypeVisitable' table.
 *
 *
 *
 * @method TypevisitableQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TypevisitableQuery orderByValeur($order = Criteria::ASC) Order by the valeur column
 *
 * @method TypevisitableQuery groupById() Group by the id column
 * @method TypevisitableQuery groupByValeur() Group by the valeur column
 *
 * @method TypevisitableQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TypevisitableQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TypevisitableQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TypevisitableQuery leftJoinVisitable($relationAlias = null) Adds a LEFT JOIN clause to the query using the Visitable relation
 * @method TypevisitableQuery rightJoinVisitable($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Visitable relation
 * @method TypevisitableQuery innerJoinVisitable($relationAlias = null) Adds a INNER JOIN clause to the query using the Visitable relation
 *
 * @method Typevisitable findOne(PropelPDO $con = null) Return the first Typevisitable matching the query
 * @method Typevisitable findOneOrCreate(PropelPDO $con = null) Return the first Typevisitable matching the query, or a new Typevisitable object populated from the query conditions when no match is found
 *
 * @method Typevisitable findOneByValeur(string $valeur) Return the first Typevisitable filtered by the valeur column
 *
 * @method array findById(int $id) Return Typevisitable objects filtered by the id column
 * @method array findByValeur(string $valeur) Return Typevisitable objects filtered by the valeur column
 *
 * @package    propel.generator.src.CarnetVoyage.MapBundle.Model.om
 */
abstract class BaseTypevisitableQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTypevisitableQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = 'CarnetVoyage\\MapBundle\\Model\\Typevisitable', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TypevisitableQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TypevisitableQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TypevisitableQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TypevisitableQuery) {
            return $criteria;
        }
        $query = new TypevisitableQuery();
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
     * @return   Typevisitable|Typevisitable[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TypevisitablePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TypevisitablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Typevisitable A model object, or null if the key is not found
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
     * @return                 Typevisitable A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `valeur` FROM `TypeVisitable` WHERE `id` = :p0';
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
            $obj = new Typevisitable();
            $obj->hydrate($row);
            TypevisitablePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Typevisitable|Typevisitable[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Typevisitable[]|mixed the list of results, formatted by the current formatter
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
     * @return TypevisitableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TypevisitablePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TypevisitableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TypevisitablePeer::ID, $keys, Criteria::IN);
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
     * @return TypevisitableQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TypevisitablePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TypevisitablePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TypevisitablePeer::ID, $id, $comparison);
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
     * @return TypevisitableQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TypevisitablePeer::VALEUR, $valeur, $comparison);
    }

    /**
     * Filter the query by a related Visitable object
     *
     * @param   Visitable|PropelObjectCollection $visitable  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TypevisitableQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVisitable($visitable, $comparison = null)
    {
        if ($visitable instanceof Visitable) {
            return $this
                ->addUsingAlias(TypevisitablePeer::ID, $visitable->getTypevisitableId(), $comparison);
        } elseif ($visitable instanceof PropelObjectCollection) {
            return $this
                ->useVisitableQuery()
                ->filterByPrimaryKeys($visitable->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVisitable() only accepts arguments of type Visitable or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Visitable relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TypevisitableQuery The current query, for fluid interface
     */
    public function joinVisitable($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Visitable');

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
            $this->addJoinObject($join, 'Visitable');
        }

        return $this;
    }

    /**
     * Use the Visitable relation Visitable object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CarnetVoyage\MapBundle\Model\VisitableQuery A secondary query class using the current class as primary query
     */
    public function useVisitableQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVisitable($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Visitable', '\CarnetVoyage\MapBundle\Model\VisitableQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Typevisitable $typevisitable Object to remove from the list of results
     *
     * @return TypevisitableQuery The current query, for fluid interface
     */
    public function prune($typevisitable = null)
    {
        if ($typevisitable) {
            $this->addUsingAlias(TypevisitablePeer::ID, $typevisitable->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
