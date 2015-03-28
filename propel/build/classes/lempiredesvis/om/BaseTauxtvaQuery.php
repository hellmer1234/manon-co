<?php


/**
 * Base class that represents a query for the 'tauxtva' table.
 *
 * Table des taux de TVA
 *
 * @method TauxtvaQuery orderByIdtaux($order = Criteria::ASC) Order by the idtaux column
 * @method TauxtvaQuery orderByLibelletaux($order = Criteria::ASC) Order by the libelletaux column
 * @method TauxtvaQuery orderByTauxtva($order = Criteria::ASC) Order by the tauxtva column
 *
 * @method TauxtvaQuery groupByIdtaux() Group by the idtaux column
 * @method TauxtvaQuery groupByLibelletaux() Group by the libelletaux column
 * @method TauxtvaQuery groupByTauxtva() Group by the tauxtva column
 *
 * @method TauxtvaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TauxtvaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TauxtvaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TauxtvaQuery leftJoinArticle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Article relation
 * @method TauxtvaQuery rightJoinArticle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Article relation
 * @method TauxtvaQuery innerJoinArticle($relationAlias = null) Adds a INNER JOIN clause to the query using the Article relation
 *
 * @method Tauxtva findOne(PropelPDO $con = null) Return the first Tauxtva matching the query
 * @method Tauxtva findOneOrCreate(PropelPDO $con = null) Return the first Tauxtva matching the query, or a new Tauxtva object populated from the query conditions when no match is found
 *
 * @method Tauxtva findOneByLibelletaux(string $libelletaux) Return the first Tauxtva filtered by the libelletaux column
 * @method Tauxtva findOneByTauxtva(double $tauxtva) Return the first Tauxtva filtered by the tauxtva column
 *
 * @method array findByIdtaux(int $idtaux) Return Tauxtva objects filtered by the idtaux column
 * @method array findByLibelletaux(string $libelletaux) Return Tauxtva objects filtered by the libelletaux column
 * @method array findByTauxtva(double $tauxtva) Return Tauxtva objects filtered by the tauxtva column
 *
 * @package    propel.generator.lempiredesvis.om
 */
abstract class BaseTauxtvaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTauxtvaQuery object.
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
            $modelName = 'Tauxtva';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TauxtvaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TauxtvaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TauxtvaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TauxtvaQuery) {
            return $criteria;
        }
        $query = new TauxtvaQuery(null, null, $modelAlias);

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
     * @return   Tauxtva|Tauxtva[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TauxtvaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TauxtvaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Tauxtva A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdtaux($key, $con = null)
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
     * @return                 Tauxtva A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT idtaux, libelletaux, tauxtva FROM tauxtva WHERE idtaux = :p0';
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
            $obj = new Tauxtva();
            $obj->hydrate($row);
            TauxtvaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Tauxtva|Tauxtva[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Tauxtva[]|mixed the list of results, formatted by the current formatter
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
     * @return TauxtvaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TauxtvaPeer::IDTAUX, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TauxtvaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TauxtvaPeer::IDTAUX, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idtaux column
     *
     * Example usage:
     * <code>
     * $query->filterByIdtaux(1234); // WHERE idtaux = 1234
     * $query->filterByIdtaux(array(12, 34)); // WHERE idtaux IN (12, 34)
     * $query->filterByIdtaux(array('min' => 12)); // WHERE idtaux >= 12
     * $query->filterByIdtaux(array('max' => 12)); // WHERE idtaux <= 12
     * </code>
     *
     * @param     mixed $idtaux The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TauxtvaQuery The current query, for fluid interface
     */
    public function filterByIdtaux($idtaux = null, $comparison = null)
    {
        if (is_array($idtaux)) {
            $useMinMax = false;
            if (isset($idtaux['min'])) {
                $this->addUsingAlias(TauxtvaPeer::IDTAUX, $idtaux['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtaux['max'])) {
                $this->addUsingAlias(TauxtvaPeer::IDTAUX, $idtaux['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TauxtvaPeer::IDTAUX, $idtaux, $comparison);
    }

    /**
     * Filter the query on the libelletaux column
     *
     * Example usage:
     * <code>
     * $query->filterByLibelletaux('fooValue');   // WHERE libelletaux = 'fooValue'
     * $query->filterByLibelletaux('%fooValue%'); // WHERE libelletaux LIKE '%fooValue%'
     * </code>
     *
     * @param     string $libelletaux The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TauxtvaQuery The current query, for fluid interface
     */
    public function filterByLibelletaux($libelletaux = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($libelletaux)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $libelletaux)) {
                $libelletaux = str_replace('*', '%', $libelletaux);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TauxtvaPeer::LIBELLETAUX, $libelletaux, $comparison);
    }

    /**
     * Filter the query on the tauxtva column
     *
     * Example usage:
     * <code>
     * $query->filterByTauxtva(1234); // WHERE tauxtva = 1234
     * $query->filterByTauxtva(array(12, 34)); // WHERE tauxtva IN (12, 34)
     * $query->filterByTauxtva(array('min' => 12)); // WHERE tauxtva >= 12
     * $query->filterByTauxtva(array('max' => 12)); // WHERE tauxtva <= 12
     * </code>
     *
     * @param     mixed $tauxtva The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TauxtvaQuery The current query, for fluid interface
     */
    public function filterByTauxtva($tauxtva = null, $comparison = null)
    {
        if (is_array($tauxtva)) {
            $useMinMax = false;
            if (isset($tauxtva['min'])) {
                $this->addUsingAlias(TauxtvaPeer::TAUXTVA, $tauxtva['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tauxtva['max'])) {
                $this->addUsingAlias(TauxtvaPeer::TAUXTVA, $tauxtva['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TauxtvaPeer::TAUXTVA, $tauxtva, $comparison);
    }

    /**
     * Filter the query by a related Article object
     *
     * @param   Article|PropelObjectCollection $article  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TauxtvaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByArticle($article, $comparison = null)
    {
        if ($article instanceof Article) {
            return $this
                ->addUsingAlias(TauxtvaPeer::IDTAUX, $article->getIdtaux(), $comparison);
        } elseif ($article instanceof PropelObjectCollection) {
            return $this
                ->useArticleQuery()
                ->filterByPrimaryKeys($article->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByArticle() only accepts arguments of type Article or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Article relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TauxtvaQuery The current query, for fluid interface
     */
    public function joinArticle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Article');

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
            $this->addJoinObject($join, 'Article');
        }

        return $this;
    }

    /**
     * Use the Article relation Article object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ArticleQuery A secondary query class using the current class as primary query
     */
    public function useArticleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinArticle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Article', 'ArticleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Tauxtva $tauxtva Object to remove from the list of results
     *
     * @return TauxtvaQuery The current query, for fluid interface
     */
    public function prune($tauxtva = null)
    {
        if ($tauxtva) {
            $this->addUsingAlias(TauxtvaPeer::IDTAUX, $tauxtva->getIdtaux(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
