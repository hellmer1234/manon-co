<?php


/**
 * Base class that represents a query for the 'categorie' table.
 *
 * Liste des categories
 *
 * @method CategorieQuery orderByIdcategorie($order = Criteria::ASC) Order by the idcategorie column
 * @method CategorieQuery orderByLibellecategorie($order = Criteria::ASC) Order by the libellecategorie column
 *
 * @method CategorieQuery groupByIdcategorie() Group by the idcategorie column
 * @method CategorieQuery groupByLibellecategorie() Group by the libellecategorie column
 *
 * @method CategorieQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CategorieQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CategorieQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CategorieQuery leftJoinCatalogue($relationAlias = null) Adds a LEFT JOIN clause to the query using the Catalogue relation
 * @method CategorieQuery rightJoinCatalogue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Catalogue relation
 * @method CategorieQuery innerJoinCatalogue($relationAlias = null) Adds a INNER JOIN clause to the query using the Catalogue relation
 *
 * @method Categorie findOne(PropelPDO $con = null) Return the first Categorie matching the query
 * @method Categorie findOneOrCreate(PropelPDO $con = null) Return the first Categorie matching the query, or a new Categorie object populated from the query conditions when no match is found
 *
 * @method Categorie findOneByLibellecategorie(string $libellecategorie) Return the first Categorie filtered by the libellecategorie column
 *
 * @method array findByIdcategorie(int $idcategorie) Return Categorie objects filtered by the idcategorie column
 * @method array findByLibellecategorie(string $libellecategorie) Return Categorie objects filtered by the libellecategorie column
 *
 * @package    propel.generator.lempiredesvis.om
 */
abstract class BaseCategorieQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCategorieQuery object.
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
            $modelName = 'Categorie';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CategorieQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CategorieQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CategorieQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CategorieQuery) {
            return $criteria;
        }
        $query = new CategorieQuery(null, null, $modelAlias);

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
     * @return   Categorie|Categorie[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CategoriePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CategoriePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Categorie A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdcategorie($key, $con = null)
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
     * @return                 Categorie A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT idcategorie, libellecategorie FROM categorie WHERE idcategorie = :p0';
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
            $obj = new Categorie();
            $obj->hydrate($row);
            CategoriePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Categorie|Categorie[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Categorie[]|mixed the list of results, formatted by the current formatter
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
     * @return CategorieQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CategoriePeer::IDCATEGORIE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CategorieQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CategoriePeer::IDCATEGORIE, $keys, Criteria::IN);
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
     * @param     mixed $idcategorie The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CategorieQuery The current query, for fluid interface
     */
    public function filterByIdcategorie($idcategorie = null, $comparison = null)
    {
        if (is_array($idcategorie)) {
            $useMinMax = false;
            if (isset($idcategorie['min'])) {
                $this->addUsingAlias(CategoriePeer::IDCATEGORIE, $idcategorie['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcategorie['max'])) {
                $this->addUsingAlias(CategoriePeer::IDCATEGORIE, $idcategorie['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoriePeer::IDCATEGORIE, $idcategorie, $comparison);
    }

    /**
     * Filter the query on the libellecategorie column
     *
     * Example usage:
     * <code>
     * $query->filterByLibellecategorie('fooValue');   // WHERE libellecategorie = 'fooValue'
     * $query->filterByLibellecategorie('%fooValue%'); // WHERE libellecategorie LIKE '%fooValue%'
     * </code>
     *
     * @param     string $libellecategorie The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CategorieQuery The current query, for fluid interface
     */
    public function filterByLibellecategorie($libellecategorie = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($libellecategorie)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $libellecategorie)) {
                $libellecategorie = str_replace('*', '%', $libellecategorie);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CategoriePeer::LIBELLECATEGORIE, $libellecategorie, $comparison);
    }

    /**
     * Filter the query by a related Catalogue object
     *
     * @param   Catalogue|PropelObjectCollection $catalogue  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CategorieQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCatalogue($catalogue, $comparison = null)
    {
        if ($catalogue instanceof Catalogue) {
            return $this
                ->addUsingAlias(CategoriePeer::IDCATEGORIE, $catalogue->getIdcategorie(), $comparison);
        } elseif ($catalogue instanceof PropelObjectCollection) {
            return $this
                ->useCatalogueQuery()
                ->filterByPrimaryKeys($catalogue->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCatalogue() only accepts arguments of type Catalogue or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Catalogue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CategorieQuery The current query, for fluid interface
     */
    public function joinCatalogue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Catalogue');

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
            $this->addJoinObject($join, 'Catalogue');
        }

        return $this;
    }

    /**
     * Use the Catalogue relation Catalogue object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CatalogueQuery A secondary query class using the current class as primary query
     */
    public function useCatalogueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCatalogue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Catalogue', 'CatalogueQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Categorie $categorie Object to remove from the list of results
     *
     * @return CategorieQuery The current query, for fluid interface
     */
    public function prune($categorie = null)
    {
        if ($categorie) {
            $this->addUsingAlias(CategoriePeer::IDCATEGORIE, $categorie->getIdcategorie(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
