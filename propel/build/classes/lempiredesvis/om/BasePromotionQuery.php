<?php


/**
 * Base class that represents a query for the 'promotion' table.
 *
 * Table des promotions
 *
 * @method PromotionQuery orderByIdpromo($order = Criteria::ASC) Order by the idpromo column
 * @method PromotionQuery orderByTitrepromo($order = Criteria::ASC) Order by the titrepromo column
 * @method PromotionQuery orderByDatedebut($order = Criteria::ASC) Order by the datedebut column
 * @method PromotionQuery orderByDatefin($order = Criteria::ASC) Order by the datefin column
 *
 * @method PromotionQuery groupByIdpromo() Group by the idpromo column
 * @method PromotionQuery groupByTitrepromo() Group by the titrepromo column
 * @method PromotionQuery groupByDatedebut() Group by the datedebut column
 * @method PromotionQuery groupByDatefin() Group by the datefin column
 *
 * @method PromotionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PromotionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PromotionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PromotionQuery leftJoinApplicationpromotion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Applicationpromotion relation
 * @method PromotionQuery rightJoinApplicationpromotion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Applicationpromotion relation
 * @method PromotionQuery innerJoinApplicationpromotion($relationAlias = null) Adds a INNER JOIN clause to the query using the Applicationpromotion relation
 *
 * @method Promotion findOne(PropelPDO $con = null) Return the first Promotion matching the query
 * @method Promotion findOneOrCreate(PropelPDO $con = null) Return the first Promotion matching the query, or a new Promotion object populated from the query conditions when no match is found
 *
 * @method Promotion findOneByTitrepromo(string $titrepromo) Return the first Promotion filtered by the titrepromo column
 * @method Promotion findOneByDatedebut(string $datedebut) Return the first Promotion filtered by the datedebut column
 * @method Promotion findOneByDatefin(string $datefin) Return the first Promotion filtered by the datefin column
 *
 * @method array findByIdpromo(int $idpromo) Return Promotion objects filtered by the idpromo column
 * @method array findByTitrepromo(string $titrepromo) Return Promotion objects filtered by the titrepromo column
 * @method array findByDatedebut(string $datedebut) Return Promotion objects filtered by the datedebut column
 * @method array findByDatefin(string $datefin) Return Promotion objects filtered by the datefin column
 *
 * @package    propel.generator.lempiredesvis.om
 */
abstract class BasePromotionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePromotionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'lempiredesvis';
        }
        if (null === $modelName) {
            $modelName = 'Promotion';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PromotionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PromotionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PromotionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PromotionQuery) {
            return $criteria;
        }
        $query = new PromotionQuery(null, null, $modelAlias);

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
     * @return   Promotion|Promotion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PromotionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PromotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Promotion A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdpromo($key, $con = null)
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
     * @return                 Promotion A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT idpromo, titrepromo, datedebut, datefin FROM promotion WHERE idpromo = :p0';
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
            $obj = new Promotion();
            $obj->hydrate($row);
            PromotionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Promotion|Promotion[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Promotion[]|mixed the list of results, formatted by the current formatter
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
     * @return PromotionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PromotionPeer::IDPROMO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PromotionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PromotionPeer::IDPROMO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idpromo column
     *
     * Example usage:
     * <code>
     * $query->filterByIdpromo(1234); // WHERE idpromo = 1234
     * $query->filterByIdpromo(array(12, 34)); // WHERE idpromo IN (12, 34)
     * $query->filterByIdpromo(array('min' => 12)); // WHERE idpromo >= 12
     * $query->filterByIdpromo(array('max' => 12)); // WHERE idpromo <= 12
     * </code>
     *
     * @param     mixed $idpromo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PromotionQuery The current query, for fluid interface
     */
    public function filterByIdpromo($idpromo = null, $comparison = null)
    {
        if (is_array($idpromo)) {
            $useMinMax = false;
            if (isset($idpromo['min'])) {
                $this->addUsingAlias(PromotionPeer::IDPROMO, $idpromo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idpromo['max'])) {
                $this->addUsingAlias(PromotionPeer::IDPROMO, $idpromo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PromotionPeer::IDPROMO, $idpromo, $comparison);
    }

    /**
     * Filter the query on the titrepromo column
     *
     * Example usage:
     * <code>
     * $query->filterByTitrepromo('fooValue');   // WHERE titrepromo = 'fooValue'
     * $query->filterByTitrepromo('%fooValue%'); // WHERE titrepromo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $titrepromo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PromotionQuery The current query, for fluid interface
     */
    public function filterByTitrepromo($titrepromo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($titrepromo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $titrepromo)) {
                $titrepromo = str_replace('*', '%', $titrepromo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PromotionPeer::TITREPROMO, $titrepromo, $comparison);
    }

    /**
     * Filter the query on the datedebut column
     *
     * Example usage:
     * <code>
     * $query->filterByDatedebut('2011-03-14'); // WHERE datedebut = '2011-03-14'
     * $query->filterByDatedebut('now'); // WHERE datedebut = '2011-03-14'
     * $query->filterByDatedebut(array('max' => 'yesterday')); // WHERE datedebut < '2011-03-13'
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
     * @return PromotionQuery The current query, for fluid interface
     */
    public function filterByDatedebut($datedebut = null, $comparison = null)
    {
        if (is_array($datedebut)) {
            $useMinMax = false;
            if (isset($datedebut['min'])) {
                $this->addUsingAlias(PromotionPeer::DATEDEBUT, $datedebut['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datedebut['max'])) {
                $this->addUsingAlias(PromotionPeer::DATEDEBUT, $datedebut['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PromotionPeer::DATEDEBUT, $datedebut, $comparison);
    }

    /**
     * Filter the query on the datefin column
     *
     * Example usage:
     * <code>
     * $query->filterByDatefin('2011-03-14'); // WHERE datefin = '2011-03-14'
     * $query->filterByDatefin('now'); // WHERE datefin = '2011-03-14'
     * $query->filterByDatefin(array('max' => 'yesterday')); // WHERE datefin < '2011-03-13'
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
     * @return PromotionQuery The current query, for fluid interface
     */
    public function filterByDatefin($datefin = null, $comparison = null)
    {
        if (is_array($datefin)) {
            $useMinMax = false;
            if (isset($datefin['min'])) {
                $this->addUsingAlias(PromotionPeer::DATEFIN, $datefin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datefin['max'])) {
                $this->addUsingAlias(PromotionPeer::DATEFIN, $datefin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PromotionPeer::DATEFIN, $datefin, $comparison);
    }

    /**
     * Filter the query by a related Applicationpromotion object
     *
     * @param   Applicationpromotion|PropelObjectCollection $applicationpromotion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PromotionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByApplicationpromotion($applicationpromotion, $comparison = null)
    {
        if ($applicationpromotion instanceof Applicationpromotion) {
            return $this
                ->addUsingAlias(PromotionPeer::IDPROMO, $applicationpromotion->getIdpromo(), $comparison);
        } elseif ($applicationpromotion instanceof PropelObjectCollection) {
            return $this
                ->useApplicationpromotionQuery()
                ->filterByPrimaryKeys($applicationpromotion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByApplicationpromotion() only accepts arguments of type Applicationpromotion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Applicationpromotion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PromotionQuery The current query, for fluid interface
     */
    public function joinApplicationpromotion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Applicationpromotion');

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
            $this->addJoinObject($join, 'Applicationpromotion');
        }

        return $this;
    }

    /**
     * Use the Applicationpromotion relation Applicationpromotion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ApplicationpromotionQuery A secondary query class using the current class as primary query
     */
    public function useApplicationpromotionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinApplicationpromotion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Applicationpromotion', 'ApplicationpromotionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Promotion $promotion Object to remove from the list of results
     *
     * @return PromotionQuery The current query, for fluid interface
     */
    public function prune($promotion = null)
    {
        if ($promotion) {
            $this->addUsingAlias(PromotionPeer::IDPROMO, $promotion->getIdpromo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
