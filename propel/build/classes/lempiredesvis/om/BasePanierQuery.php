<?php


/**
 * Base class that represents a query for the 'panier' table.
 *
 * Panier d'articles generant une commande
 *
 * @method PanierQuery orderByIdarticle($order = Criteria::ASC) Order by the idarticle column
 * @method PanierQuery orderByIdcommande($order = Criteria::ASC) Order by the idcommande column
 * @method PanierQuery orderByQuantite($order = Criteria::ASC) Order by the quantite column
 *
 * @method PanierQuery groupByIdarticle() Group by the idarticle column
 * @method PanierQuery groupByIdcommande() Group by the idcommande column
 * @method PanierQuery groupByQuantite() Group by the quantite column
 *
 * @method PanierQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PanierQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PanierQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PanierQuery leftJoinArticle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Article relation
 * @method PanierQuery rightJoinArticle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Article relation
 * @method PanierQuery innerJoinArticle($relationAlias = null) Adds a INNER JOIN clause to the query using the Article relation
 *
 * @method PanierQuery leftJoinCommande($relationAlias = null) Adds a LEFT JOIN clause to the query using the Commande relation
 * @method PanierQuery rightJoinCommande($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Commande relation
 * @method PanierQuery innerJoinCommande($relationAlias = null) Adds a INNER JOIN clause to the query using the Commande relation
 *
 * @method Panier findOne(PropelPDO $con = null) Return the first Panier matching the query
 * @method Panier findOneOrCreate(PropelPDO $con = null) Return the first Panier matching the query, or a new Panier object populated from the query conditions when no match is found
 *
 * @method Panier findOneByIdarticle(int $idarticle) Return the first Panier filtered by the idarticle column
 * @method Panier findOneByIdcommande(int $idcommande) Return the first Panier filtered by the idcommande column
 * @method Panier findOneByQuantite(int $quantite) Return the first Panier filtered by the quantite column
 *
 * @method array findByIdarticle(int $idarticle) Return Panier objects filtered by the idarticle column
 * @method array findByIdcommande(int $idcommande) Return Panier objects filtered by the idcommande column
 * @method array findByQuantite(int $quantite) Return Panier objects filtered by the quantite column
 *
 * @package    propel.generator.lempiredesvis.om
 */
abstract class BasePanierQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePanierQuery object.
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
            $modelName = 'Panier';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PanierQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PanierQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PanierQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PanierQuery) {
            return $criteria;
        }
        $query = new PanierQuery(null, null, $modelAlias);

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
                         A Primary key composition: [$idarticle, $idcommande]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Panier|Panier[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PanierPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PanierPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Panier A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT idarticle, idcommande, quantite FROM panier WHERE idarticle = :p0 AND idcommande = :p1';
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
            $obj = new Panier();
            $obj->hydrate($row);
            PanierPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return Panier|Panier[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Panier[]|mixed the list of results, formatted by the current formatter
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
     * @return PanierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PanierPeer::IDARTICLE, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PanierPeer::IDCOMMANDE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PanierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PanierPeer::IDARTICLE, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PanierPeer::IDCOMMANDE, $key[1], Criteria::EQUAL);
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
     * @return PanierQuery The current query, for fluid interface
     */
    public function filterByIdarticle($idarticle = null, $comparison = null)
    {
        if (is_array($idarticle)) {
            $useMinMax = false;
            if (isset($idarticle['min'])) {
                $this->addUsingAlias(PanierPeer::IDARTICLE, $idarticle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idarticle['max'])) {
                $this->addUsingAlias(PanierPeer::IDARTICLE, $idarticle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PanierPeer::IDARTICLE, $idarticle, $comparison);
    }

    /**
     * Filter the query on the idcommande column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcommande(1234); // WHERE idcommande = 1234
     * $query->filterByIdcommande(array(12, 34)); // WHERE idcommande IN (12, 34)
     * $query->filterByIdcommande(array('min' => 12)); // WHERE idcommande >= 12
     * $query->filterByIdcommande(array('max' => 12)); // WHERE idcommande <= 12
     * </code>
     *
     * @see       filterByCommande()
     *
     * @param     mixed $idcommande The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PanierQuery The current query, for fluid interface
     */
    public function filterByIdcommande($idcommande = null, $comparison = null)
    {
        if (is_array($idcommande)) {
            $useMinMax = false;
            if (isset($idcommande['min'])) {
                $this->addUsingAlias(PanierPeer::IDCOMMANDE, $idcommande['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcommande['max'])) {
                $this->addUsingAlias(PanierPeer::IDCOMMANDE, $idcommande['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PanierPeer::IDCOMMANDE, $idcommande, $comparison);
    }

    /**
     * Filter the query on the quantite column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantite(1234); // WHERE quantite = 1234
     * $query->filterByQuantite(array(12, 34)); // WHERE quantite IN (12, 34)
     * $query->filterByQuantite(array('min' => 12)); // WHERE quantite >= 12
     * $query->filterByQuantite(array('max' => 12)); // WHERE quantite <= 12
     * </code>
     *
     * @param     mixed $quantite The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PanierQuery The current query, for fluid interface
     */
    public function filterByQuantite($quantite = null, $comparison = null)
    {
        if (is_array($quantite)) {
            $useMinMax = false;
            if (isset($quantite['min'])) {
                $this->addUsingAlias(PanierPeer::QUANTITE, $quantite['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantite['max'])) {
                $this->addUsingAlias(PanierPeer::QUANTITE, $quantite['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PanierPeer::QUANTITE, $quantite, $comparison);
    }

    /**
     * Filter the query by a related Article object
     *
     * @param   Article|PropelObjectCollection $article The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PanierQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByArticle($article, $comparison = null)
    {
        if ($article instanceof Article) {
            return $this
                ->addUsingAlias(PanierPeer::IDARTICLE, $article->getIdarticle(), $comparison);
        } elseif ($article instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PanierPeer::IDARTICLE, $article->toKeyValue('PrimaryKey', 'Idarticle'), $comparison);
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
     * @return PanierQuery The current query, for fluid interface
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
     * Filter the query by a related Commande object
     *
     * @param   Commande|PropelObjectCollection $commande The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PanierQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCommande($commande, $comparison = null)
    {
        if ($commande instanceof Commande) {
            return $this
                ->addUsingAlias(PanierPeer::IDCOMMANDE, $commande->getIdcommande(), $comparison);
        } elseif ($commande instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PanierPeer::IDCOMMANDE, $commande->toKeyValue('PrimaryKey', 'Idcommande'), $comparison);
        } else {
            throw new PropelException('filterByCommande() only accepts arguments of type Commande or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Commande relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PanierQuery The current query, for fluid interface
     */
    public function joinCommande($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Commande');

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
            $this->addJoinObject($join, 'Commande');
        }

        return $this;
    }

    /**
     * Use the Commande relation Commande object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CommandeQuery A secondary query class using the current class as primary query
     */
    public function useCommandeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCommande($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Commande', 'CommandeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Panier $panier Object to remove from the list of results
     *
     * @return PanierQuery The current query, for fluid interface
     */
    public function prune($panier = null)
    {
        if ($panier) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PanierPeer::IDARTICLE), $panier->getIdarticle(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PanierPeer::IDCOMMANDE), $panier->getIdcommande(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
