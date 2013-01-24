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
use CarnetVoyage\MapBundle\Model\ContenuPeer;
use CarnetVoyage\MapBundle\Model\ContenuQuery;
use CarnetVoyage\MapBundle\Model\Destination;

/**
 * Base class that represents a query for the 'Contenu' table.
 *
 *
 *
 * @method ContenuQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ContenuQuery orderByDestinationId($order = Criteria::ASC) Order by the destination_id column
 * @method ContenuQuery orderByNom($order = Criteria::ASC) Order by the nom column
 * @method ContenuQuery orderByChemin($order = Criteria::ASC) Order by the chemin column
 * @method ContenuQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method ContenuQuery orderByCommentaire($order = Criteria::ASC) Order by the commentaire column
 *
 * @method ContenuQuery groupById() Group by the id column
 * @method ContenuQuery groupByDestinationId() Group by the destination_id column
 * @method ContenuQuery groupByNom() Group by the nom column
 * @method ContenuQuery groupByChemin() Group by the chemin column
 * @method ContenuQuery groupByDate() Group by the date column
 * @method ContenuQuery groupByCommentaire() Group by the commentaire column
 *
 * @method ContenuQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ContenuQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ContenuQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ContenuQuery leftJoinDestination($relationAlias = null) Adds a LEFT JOIN clause to the query using the Destination relation
 * @method ContenuQuery rightJoinDestination($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Destination relation
 * @method ContenuQuery innerJoinDestination($relationAlias = null) Adds a INNER JOIN clause to the query using the Destination relation
 *
 * @method Contenu findOne(PropelPDO $con = null) Return the first Contenu matching the query
 * @method Contenu findOneOrCreate(PropelPDO $con = null) Return the first Contenu matching the query, or a new Contenu object populated from the query conditions when no match is found
 *
 * @method Contenu findOneByDestinationId(int $destination_id) Return the first Contenu filtered by the destination_id column
 * @method Contenu findOneByNom(string $nom) Return the first Contenu filtered by the nom column
 * @method Contenu findOneByChemin(string $chemin) Return the first Contenu filtered by the chemin column
 * @method Contenu findOneByDate(string $date) Return the first Contenu filtered by the date column
 * @method Contenu findOneByCommentaire(string $commentaire) Return the first Contenu filtered by the commentaire column
 *
 * @method array findById(int $id) Return Contenu objects filtered by the id column
 * @method array findByDestinationId(int $destination_id) Return Contenu objects filtered by the destination_id column
 * @method array findByNom(string $nom) Return Contenu objects filtered by the nom column
 * @method array findByChemin(string $chemin) Return Contenu objects filtered by the chemin column
 * @method array findByDate(string $date) Return Contenu objects filtered by the date column
 * @method array findByCommentaire(string $commentaire) Return Contenu objects filtered by the commentaire column
 *
 * @package    propel.generator.src.CarnetVoyage.MapBundle.Model.om
 */
abstract class BaseContenuQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseContenuQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = 'CarnetVoyage\\MapBundle\\Model\\Contenu', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ContenuQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ContenuQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ContenuQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ContenuQuery) {
            return $criteria;
        }
        $query = new ContenuQuery();
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
     * @return   Contenu|Contenu[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ContenuPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ContenuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Contenu A model object, or null if the key is not found
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
     * @return                 Contenu A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `destination_id`, `nom`, `chemin`, `date`, `commentaire` FROM `Contenu` WHERE `id` = :p0';
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
            $obj = new Contenu();
            $obj->hydrate($row);
            ContenuPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Contenu|Contenu[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Contenu[]|mixed the list of results, formatted by the current formatter
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
     * @return ContenuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContenuPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ContenuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContenuPeer::ID, $keys, Criteria::IN);
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
     * @return ContenuQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ContenuPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ContenuPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContenuPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the destination_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDestinationId(1234); // WHERE destination_id = 1234
     * $query->filterByDestinationId(array(12, 34)); // WHERE destination_id IN (12, 34)
     * $query->filterByDestinationId(array('min' => 12)); // WHERE destination_id >= 12
     * $query->filterByDestinationId(array('max' => 12)); // WHERE destination_id <= 12
     * </code>
     *
     * @see       filterByDestination()
     *
     * @param     mixed $destinationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContenuQuery The current query, for fluid interface
     */
    public function filterByDestinationId($destinationId = null, $comparison = null)
    {
        if (is_array($destinationId)) {
            $useMinMax = false;
            if (isset($destinationId['min'])) {
                $this->addUsingAlias(ContenuPeer::DESTINATION_ID, $destinationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($destinationId['max'])) {
                $this->addUsingAlias(ContenuPeer::DESTINATION_ID, $destinationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContenuPeer::DESTINATION_ID, $destinationId, $comparison);
    }

    /**
     * Filter the query on the nom column
     *
     * Example usage:
     * <code>
     * $query->filterByNom('fooValue');   // WHERE nom = 'fooValue'
     * $query->filterByNom('%fooValue%'); // WHERE nom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nom The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContenuQuery The current query, for fluid interface
     */
    public function filterByNom($nom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nom)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nom)) {
                $nom = str_replace('*', '%', $nom);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContenuPeer::NOM, $nom, $comparison);
    }

    /**
     * Filter the query on the chemin column
     *
     * Example usage:
     * <code>
     * $query->filterByChemin('fooValue');   // WHERE chemin = 'fooValue'
     * $query->filterByChemin('%fooValue%'); // WHERE chemin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $chemin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContenuQuery The current query, for fluid interface
     */
    public function filterByChemin($chemin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($chemin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $chemin)) {
                $chemin = str_replace('*', '%', $chemin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContenuPeer::CHEMIN, $chemin, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContenuQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(ContenuPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(ContenuPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContenuPeer::DATE, $date, $comparison);
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
     * @return ContenuQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ContenuPeer::COMMENTAIRE, $commentaire, $comparison);
    }

    /**
     * Filter the query by a related Destination object
     *
     * @param   Destination|PropelObjectCollection $destination The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ContenuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDestination($destination, $comparison = null)
    {
        if ($destination instanceof Destination) {
            return $this
                ->addUsingAlias(ContenuPeer::DESTINATION_ID, $destination->getId(), $comparison);
        } elseif ($destination instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContenuPeer::DESTINATION_ID, $destination->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByDestination() only accepts arguments of type Destination or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Destination relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContenuQuery The current query, for fluid interface
     */
    public function joinDestination($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Destination');

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
            $this->addJoinObject($join, 'Destination');
        }

        return $this;
    }

    /**
     * Use the Destination relation Destination object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CarnetVoyage\MapBundle\Model\DestinationQuery A secondary query class using the current class as primary query
     */
    public function useDestinationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDestination($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Destination', '\CarnetVoyage\MapBundle\Model\DestinationQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Contenu $contenu Object to remove from the list of results
     *
     * @return ContenuQuery The current query, for fluid interface
     */
    public function prune($contenu = null)
    {
        if ($contenu) {
            $this->addUsingAlias(ContenuPeer::ID, $contenu->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
