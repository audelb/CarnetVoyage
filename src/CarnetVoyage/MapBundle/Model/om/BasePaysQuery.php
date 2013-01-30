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
use CarnetVoyage\MapBundle\Model\Pays;
use CarnetVoyage\MapBundle\Model\PaysPeer;
use CarnetVoyage\MapBundle\Model\PaysQuery;
use CarnetVoyage\MapBundle\Model\Region;

/**
 * Base class that represents a query for the 'Pays' table.
 *
 *
 *
 * @method PaysQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PaysQuery orderByValeur($order = Criteria::ASC) Order by the valeur column
 * @method PaysQuery orderByNomFichier($order = Criteria::ASC) Order by the nom_fichier column
 * @method PaysQuery orderByValeurFichier($order = Criteria::ASC) Order by the valeur_fichier column
 *
 * @method PaysQuery groupById() Group by the id column
 * @method PaysQuery groupByValeur() Group by the valeur column
 * @method PaysQuery groupByNomFichier() Group by the nom_fichier column
 * @method PaysQuery groupByValeurFichier() Group by the valeur_fichier column
 *
 * @method PaysQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PaysQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PaysQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PaysQuery leftJoinRegion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Region relation
 * @method PaysQuery rightJoinRegion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Region relation
 * @method PaysQuery innerJoinRegion($relationAlias = null) Adds a INNER JOIN clause to the query using the Region relation
 *
 * @method Pays findOne(PropelPDO $con = null) Return the first Pays matching the query
 * @method Pays findOneOrCreate(PropelPDO $con = null) Return the first Pays matching the query, or a new Pays object populated from the query conditions when no match is found
 *
 * @method Pays findOneByValeur(string $valeur) Return the first Pays filtered by the valeur column
 * @method Pays findOneByNomFichier(string $nom_fichier) Return the first Pays filtered by the nom_fichier column
 * @method Pays findOneByValeurFichier(string $valeur_fichier) Return the first Pays filtered by the valeur_fichier column
 *
 * @method array findById(int $id) Return Pays objects filtered by the id column
 * @method array findByValeur(string $valeur) Return Pays objects filtered by the valeur column
 * @method array findByNomFichier(string $nom_fichier) Return Pays objects filtered by the nom_fichier column
 * @method array findByValeurFichier(string $valeur_fichier) Return Pays objects filtered by the valeur_fichier column
 *
 * @package    propel.generator.src.CarnetVoyage.MapBundle.Model.om
 */
abstract class BasePaysQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePaysQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = 'CarnetVoyage\\MapBundle\\Model\\Pays', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PaysQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PaysQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PaysQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PaysQuery) {
            return $criteria;
        }
        $query = new PaysQuery();
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
     * @return   Pays|Pays[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PaysPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PaysPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Pays A model object, or null if the key is not found
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
     * @return                 Pays A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `valeur`, `nom_fichier`, `valeur_fichier` FROM `Pays` WHERE `id` = :p0';
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
            $obj = new Pays();
            $obj->hydrate($row);
            PaysPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Pays|Pays[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Pays[]|mixed the list of results, formatted by the current formatter
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
     * @return PaysQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PaysPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PaysQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PaysPeer::ID, $keys, Criteria::IN);
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
     * @return PaysQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PaysPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PaysPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaysPeer::ID, $id, $comparison);
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
     * @return PaysQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaysPeer::VALEUR, $valeur, $comparison);
    }

    /**
     * Filter the query on the nom_fichier column
     *
     * Example usage:
     * <code>
     * $query->filterByNomFichier('fooValue');   // WHERE nom_fichier = 'fooValue'
     * $query->filterByNomFichier('%fooValue%'); // WHERE nom_fichier LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomFichier The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PaysQuery The current query, for fluid interface
     */
    public function filterByNomFichier($nomFichier = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomFichier)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomFichier)) {
                $nomFichier = str_replace('*', '%', $nomFichier);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaysPeer::NOM_FICHIER, $nomFichier, $comparison);
    }

    /**
     * Filter the query on the valeur_fichier column
     *
     * Example usage:
     * <code>
     * $query->filterByValeurFichier('fooValue');   // WHERE valeur_fichier = 'fooValue'
     * $query->filterByValeurFichier('%fooValue%'); // WHERE valeur_fichier LIKE '%fooValue%'
     * </code>
     *
     * @param     string $valeurFichier The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PaysQuery The current query, for fluid interface
     */
    public function filterByValeurFichier($valeurFichier = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($valeurFichier)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $valeurFichier)) {
                $valeurFichier = str_replace('*', '%', $valeurFichier);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaysPeer::VALEUR_FICHIER, $valeurFichier, $comparison);
    }

    /**
     * Filter the query by a related Region object
     *
     * @param   Region|PropelObjectCollection $region  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PaysQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRegion($region, $comparison = null)
    {
        if ($region instanceof Region) {
            return $this
                ->addUsingAlias(PaysPeer::ID, $region->getPaysId(), $comparison);
        } elseif ($region instanceof PropelObjectCollection) {
            return $this
                ->useRegionQuery()
                ->filterByPrimaryKeys($region->getPrimaryKeys())
                ->endUse();
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
     * @return PaysQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Pays $pays Object to remove from the list of results
     *
     * @return PaysQuery The current query, for fluid interface
     */
    public function prune($pays = null)
    {
        if ($pays) {
            $this->addUsingAlias(PaysPeer::ID, $pays->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
