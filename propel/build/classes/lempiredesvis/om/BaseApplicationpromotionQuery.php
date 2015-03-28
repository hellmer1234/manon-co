<?php


/**
 * Base class that represents a query for the 'applicationpromotion' table.
 *
 * Liste des articles par promotion
 *
 * @method ApplicationpromotionQuery orderByIdpromo($order = Criteria::ASC) Order by the idpromo column
 * @method ApplicationpromotionQuery orderByIdarticle($order = Criteria::ASC) Order by the idarticle column
 * @method ApplicationpromotionQuery orderByQqtearticlepromo($order = Criteria::ASC) Order by the qqtearticlepromo column
 * @method ApplicationpromotionQuery orderByPrixpromo($order = Criteria::ASC) Order by the prixpromo column
 *
 * @method ApplicationpromotionQuery groupByIdpromo() Group by the idpromo column
 * @method ApplicationpromotionQuery groupByIdarticle() Group by the idarticle column
 * @method ApplicationpromotionQuery groupByQqtearticlepromo() Group by the qqtearticlepromo column
 * @method ApplicationpromotionQuery groupByPrixpromo() Group by the prixpromo column
 *
 * @method ApplicationpromotionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ApplicationpromotionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ApplicationpromotionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ApplicationpromotionQuery leftJoinPromotion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Promotion relation
 * @method ApplicationpromotionQuery rightJoinPromotion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Promotion relation
 * @method ApplicationpromotionQuery innerJoinPromotion($relationAlias = null) Adds a INNER JOIN clause to the query using the Promotion relation
 *
 * @method ApplicationpromotionQuery leftJoinArticle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Article relation
 * @method ApplicationpromotionQuery rightJoinArticle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Article relation
 * @method ApplicationpromotionQuery innerJoinArticle($relationAlias = null) Adds a INNER JOIN clause to the query using the Article relation
 *
 * @method Applicationpromotion findOne(PropelPDO $con = null) Return the first Applicationpromotion matching the query
 * @method Applicationpromotion findOneOrCreate(PropelPDO $con = null) Return the first Applicationpromotion matching the query, or a new Applicationpromotion object populated from the query conditions when no match is found
 *
 * @method Applicationpromotion findOneByIdpromo(int $idpromo) Return the first Applicationpromotion filtered by the idpromo column
 * @method Applicationpromotion findOneByIdarticle(int $idarticle) Return the first Applicationpromotion filtered by the idarticle column
 * @method Applicationpromotion findOneByQqtearticlepromo(int $qqtearticlepromo) Return the first Applicationpromotion filtered by the qqtearticlepromo column
 * @method Applicationpromotion findOneByPrixpromo(double $prixpromo) Return the first Applicationpromotion filtered by the prixpromo column
 *
 * @method array findByIdpromo(int $idpromo) Return Applicationpromotion objects filtered by the idpromo column
 * @method array findByIdarticle(int $idarticle) Return Applicationpromotion objects filtered by the idarticle column
 * @method array findByQqtearticlepromo(int $qqtearticlepromo) Return Applicationpromotion objects filtered by the qqtearticlepromo column
 * @method array findByPrixpromo(double $prixpromo) Return Applicationpromotion objects filtered by the prixpromo column
 *
 * @package    propel.generator.lempiredesvis.om
 */
abstract class BaseApplicationpromotionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseApplicationpromotionQuery object.
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
            $modelName = 'Applicationpromotion';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ApplicationpromotionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ApplicationpromotionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ApplicationpromotionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ApplicationpromotionQuery) {
            return $criteria;
        }
        $query = new ApplicationpromotionQuery(null, null, $modelAlias);

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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$idpromo, $idarticle]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Applicationpromotion|Applicationpromotion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ApplicationpromotionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ApplicationpromotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Applicationpromotion A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT idpromo, idarticle, qqtearticlepromo, prixpromo FROM applicationpromotion WHERE idpromo = :p0 AND idarticle = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Applicationpromotion();
            $obj->hydrate($row);
            ApplicationpromotionPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return Applicationpromotion|Applicationpromotion[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Applicationpromotion[]|mixed the list of results, formatted by the current formatter
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
     * @return ApplicationpromotionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ApplicationpromotionPeer::IDPROMO, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ApplicationpromotionPeer::IDARTICLE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ApplicationpromotionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ApplicationpromotionPeer::IDPROMO, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ApplicationpromotionPeer::IDARTICLE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @see       filterByPromotion()
     *
     * @param     mixed $idpromo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ApplicationpromotionQuery The current query, for fluid interface
     */
    public function filterByIdpromo($idpromo = null, $comparison = null)
    {
        if (is_array($idpromo)) {
            $useMinMax = false;
            if (isset($idpromo['min'])) {
                $this->addUsingAlias(ApplicationpromotionPeer::IDPROMO, $idpromo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idpromo['max'])) {
                $this->addUsingAlias(ApplicationpromotionPeer::IDPROMO, $idpromo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplicationpromotionPeer::IDPROMO, $idpromo, $comparison);
    }

    /**
     * Filter the query on the idarticle column
     *
     * Example usage:
     * <code>
     * $query->filterByIdarticle(1234); // WHERE idarticle = 1234
     * $query->filterByIdarticle(array(12, 34)); // WHERE idarticle IN (12, 34)
     * $query->filterByIdarticle(array('min' => 12)); // WHERE idarticle >= 12
     * $query->filterByIdarticle(array('max' => 12)); // WHERE idarticle <= 12
     * </code>
     *
     * @see       filterByArticle()
     *
     * @param     mixed $idarticle The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ApplicationpromotionQuery The current query, for fluid interface
     */
    public function filterByIdarticle($idarticle = null, $comparison = null)
    {
        if (is_array($idarticle)) {
            $useMinMax = false;
            if (isset($idarticle['min'])) {
                $this->addUsingAlias(ApplicationpromotionPeer::IDARTICLE, $idarticle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idarticle['max'])) {
                $this->addUsingAlias(ApplicationpromotionPeer::IDARTICLE, $idarticle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplicationpromotionPeer::IDARTICLE, $idarticle, $comparison);
    }

    /**
     * Filter the query on the qqtearticlepromo column
     *
     * Example usage:
     * <code>
     * $query->filterByQqtearticlepromo(1234); // WHERE qqtearticlepromo = 1234
     * $query->filterByQqtearticlepromo(array(12, 34)); // WHERE qqtearticlepromo IN (12, 34)
     * $query->filterByQqtearticlepromo(array('min' => 12)); // WHERE qqtearticlepromo >= 12
     * $query->filterByQqtearticlepromo(array('max' => 12)); // WHERE qqtearticlepromo <= 12
     * </code>
     *
     * @param     mixed $qqtearticlepromo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ApplicationpromotionQuery The current query, for fluid interface
     */
    public function filterByQqtearticlepromo($qqtearticlepromo = null, $comparison = null)
    {
        if (is_array($qqtearticlepromo)) {
            $useMinMax = false;
            if (isset($qqtearticlepromo['min'])) {
                $this->addUsingAlias(ApplicationpromotionPeer::QQTEARTICLEPROMO, $qqtearticlepromo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qqtearticlepromo['max'])) {
                $this->addUsingAlias(ApplicationpromotionPeer::QQTEARTICLEPROMO, $qqtearticlepromo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplicationpromotionPeer::QQTEARTICLEPROMO, $qqtearticlepromo, $comparison);
    }

    /**
     * Filter the query on the prixpromo column
     *
     * Example usage:
     * <code>
     * $query->filterByPrixpromo(1234); // WHERE prixpromo = 1234
     * $query->filterByPrixpromo(array(12, 34)); // WHERE prixpromo IN (12, 34)
     * $query->filterByPrixpromo(array('min' => 12)); // WHERE prixpromo >= 12
     * $query->filterByPrixpromo(array('max' => 12)); // WHERE prixpromo <= 12
     * </code>
     *
     * @param     mixed $prixpromo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ApplicationpromotionQuery The current query, for fluid interface
     */
    public function filterByPrixpromo($prixpromo = null, $comparison = null)
    {
        if (is_array($prixpromo)) {
            $useMinMax = false;
            if (isset($prixpromo['min'])) {
                $this->addUsingAlias(ApplicationpromotionPeer::PRIXPROMO, $prixpromo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prixpromo['max'])) {
                $this->addUsingAlias(ApplicationpromotionPeer::PRIXPROMO, $prixpromo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplicationpromotionPeer::PRIXPROMO, $prixpromo, $comparison);
    }

    /**
     * Filter the query by a related Promotion object
     *
     * @param   Promotion|PropelObjectCollection $promotion The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ApplicationpromotionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPromotion($promotion, $comparison = null)
    {
        if ($promotion instanceof Promotion) {
            return $this
                ->addUsingAlias(ApplicationpromotionPeer::IDPROMO, $promotion->getIdpromo(), $comparison);
        } elseif ($promotion instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ApplicationpromotionPeer::IDPROMO, $promotion->toKeyValue('PrimaryKey', 'Idpromo'), $comparison);
        } else {
            throw new PropelException('filterByPromotion() only accepts arguments of type Promotion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Promotion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ApplicationpromotionQuery The current query, for fluid interface
     */
    public function joinPromotion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Promotion');

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
            $this->addJoinObject($join, 'Promotion');
        }

        return $this;
    }

    /**
     * Use the Promotion relation Promotion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PromotionQuery A secondary query class using the current class as primary query
     */
    public function usePromotionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPromotion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Promotion', 'PromotionQuery');
    }

    /**
     * Filter the query by a related Article object
     *
     * @param   Article|PropelObjectCollection $article The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ApplicationpromotionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByArticle($article, $comparison = null)
    {
        if ($article instanceof Article) {
            return $this
                ->addUsingAlias(ApplicationpromotionPeer::IDARTICLE, $article->getIdarticle(), $comparison);
        } elseif ($article instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ApplicationpromotionPeer::IDARTICLE, $article->toKeyValue('PrimaryKey', 'Idarticle'), $comparison);
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
     * @return ApplicationpromotionQuery The current query, for fluid interface
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
     * @param   Applicationpromotion $applicationpromotion Object to remove from the list of results
     *
     * @return ApplicationpromotionQuery The current query, for fluid interface
     */
    public function prune($applicationpromotion = null)
    {
        if ($applicationpromotion) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ApplicationpromotionPeer::IDPROMO), $applicationpromotion->getIdpromo(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ApplicationpromotionPeer::IDARTICLE), $applicationpromotion->getIdarticle(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
