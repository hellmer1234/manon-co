<?php


/**
 * Base class that represents a query for the 'catalogue' table.
 *
 * Catalogue des articles par categorie
 *
 * @method CatalogueQuery orderByIdarticle($order = Criteria::ASC) Order by the idarticle column
 * @method CatalogueQuery orderByIdcategorie($order = Criteria::ASC) Order by the idcategorie column
 *
 * @method CatalogueQuery groupByIdarticle() Group by the idarticle column
 * @method CatalogueQuery groupByIdcategorie() Group by the idcategorie column
 *
 * @method CatalogueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CatalogueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CatalogueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CatalogueQuery leftJoinCategorie($relationAlias = null) Adds a LEFT JOIN clause to the query using the Categorie relation
 * @method CatalogueQuery rightJoinCategorie($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Categorie relation
 * @method CatalogueQuery innerJoinCategorie($relationAlias = null) Adds a INNER JOIN clause to the query using the Categorie relation
 *
 * @method CatalogueQuery leftJoinArticle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Article relation
 * @method CatalogueQuery rightJoinArticle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Article relation
 * @method CatalogueQuery innerJoinArticle($relationAlias = null) Adds a INNER JOIN clause to the query using the Article relation
 *
 * @method Catalogue findOne(PropelPDO $con = null) Return the first Catalogue matching the query
 * @method Catalogue findOneOrCreate(PropelPDO $con = null) Return the first Catalogue matching the query, or a new Catalogue object populated from the query conditions when no match is found
 *
 * @method Catalogue findOneByIdarticle(int $idarticle) Return the first Catalogue filtered by the idarticle column
 * @method Catalogue findOneByIdcategorie(int $idcategorie) Return the first Catalogue filtered by the idcategorie column
 *
 * @method array findByIdarticle(int $idarticle) Return Catalogue objects filtered by the idarticle column
 * @method array findByIdcategorie(int $idcategorie) Return Catalogue objects filtered by the idcategorie column
 *
 * @package    propel.generator.lempiredesvis.om
 */
abstract class BaseCatalogueQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCatalogueQuery object.
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
            $modelName = 'Catalogue';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CatalogueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CatalogueQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CatalogueQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CatalogueQuery) {
            return $criteria;
        }
        $query = new CatalogueQuery(null, null, $modelAlias);

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
                         A Primary key composition: [$idarticle, $idcategorie]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Catalogue|Catalogue[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CataloguePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CataloguePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Catalogue A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT idarticle, idcategorie FROM catalogue WHERE idarticle = :p0 AND idcategorie = :p1';
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
            $obj = new Catalogue();
            $obj->hydrate($row);
            CataloguePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return Catalogue|Catalogue[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Catalogue[]|mixed the list of results, formatted by the current formatter
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
     * @return CatalogueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CataloguePeer::IDARTICLE, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CataloguePeer::IDCATEGORIE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CatalogueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CataloguePeer::IDARTICLE, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CataloguePeer::IDCATEGORIE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return CatalogueQuery The current query, for fluid interface
     */
    public function filterByIdarticle($idarticle = null, $comparison = null)
    {
        if (is_array($idarticle)) {
            $useMinMax = false;
            if (isset($idarticle['min'])) {
                $this->addUsingAlias(CataloguePeer::IDARTICLE, $idarticle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idarticle['max'])) {
                $this->addUsingAlias(CataloguePeer::IDARTICLE, $idarticle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CataloguePeer::IDARTICLE, $idarticle, $comparison);
    }

    /**
     * Filter the query on the idcategorie column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcategorie(1234); // WHERE idcategorie = 1234
     * $query->filterByIdcategorie(array(12, 34)); // WHERE idcategorie IN (12, 34)
     * $query->filterByIdcategorie(array('min' => 12)); // WHERE idcategorie >= 12
     * $query->filterByIdcategorie(array('max' => 12)); // WHERE idcategorie <= 12
     * </code>
     *
     * @see       filterByCategorie()
     *
     * @param     mixed $idcategorie The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CatalogueQuery The current query, for fluid interface
     */
    public function filterByIdcategorie($idcategorie = null, $comparison = null)
    {
        if (is_array($idcategorie)) {
            $useMinMax = false;
            if (isset($idcategorie['min'])) {
                $this->addUsingAlias(CataloguePeer::IDCATEGORIE, $idcategorie['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcategorie['max'])) {
                $this->addUsingAlias(CataloguePeer::IDCATEGORIE, $idcategorie['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CataloguePeer::IDCATEGORIE, $idcategorie, $comparison);
    }

    /**
     * Filter the query by a related Categorie object
     *
     * @param   Categorie|PropelObjectCollection $categorie The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CatalogueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCategorie($categorie, $comparison = null)
    {
        if ($categorie instanceof Categorie) {
            return $this
                ->addUsingAlias(CataloguePeer::IDCATEGORIE, $categorie->getIdcategorie(), $comparison);
        } elseif ($categorie instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CataloguePeer::IDCATEGORIE, $categorie->toKeyValue('PrimaryKey', 'Idcategorie'), $comparison);
        } else {
            throw new PropelException('filterByCategorie() only accepts arguments of type Categorie or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Categorie relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CatalogueQuery The current query, for fluid interface
     */
    public function joinCategorie($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Categorie');

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
            $this->addJoinObject($join, 'Categorie');
        }

        return $this;
    }

    /**
     * Use the Categorie relation Categorie object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CategorieQuery A secondary query class using the current class as primary query
     */
    public function useCategorieQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategorie($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Categorie', 'CategorieQuery');
    }

    /**
     * Filter the query by a related Article object
     *
     * @param   Article|PropelObjectCollection $article The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CatalogueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByArticle($article, $comparison = null)
    {
        if ($article instanceof Article) {
            return $this
                ->addUsingAlias(CataloguePeer::IDARTICLE, $article->getIdarticle(), $comparison);
        } elseif ($article instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CataloguePeer::IDARTICLE, $article->toKeyValue('PrimaryKey', 'Idarticle'), $comparison);
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
     * @return CatalogueQuery The current query, for fluid interface
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
     * @param   Catalogue $catalogue Object to remove from the list of results
     *
     * @return CatalogueQuery The current query, for fluid interface
     */
    public function prune($catalogue = null)
    {
        if ($catalogue) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CataloguePeer::IDARTICLE), $catalogue->getIdarticle(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CataloguePeer::IDCATEGORIE), $catalogue->getIdcategorie(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
