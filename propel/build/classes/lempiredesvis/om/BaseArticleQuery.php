<?php


/**
 * Base class that represents a query for the 'article' table.
 *
 * Table des articles
 *
 * @method ArticleQuery orderByIdarticle($order = Criteria::ASC) Order by the idarticle column
 * @method ArticleQuery orderByReferencearticle($order = Criteria::ASC) Order by the referencearticle column
 * @method ArticleQuery orderByLibellearticle($order = Criteria::ASC) Order by the libellearticle column
 * @method ArticleQuery orderByDescriptionarticle($order = Criteria::ASC) Order by the descriptionarticle column
 * @method ArticleQuery orderByPrixht($order = Criteria::ASC) Order by the prixht column
 * @method ArticleQuery orderByQqtestock($order = Criteria::ASC) Order by the qqtestock column
 * @method ArticleQuery orderByDateajout($order = Criteria::ASC) Order by the dateajout column
 * @method ArticleQuery orderByIdtaux($order = Criteria::ASC) Order by the idtaux column
 *
 * @method ArticleQuery groupByIdarticle() Group by the idarticle column
 * @method ArticleQuery groupByReferencearticle() Group by the referencearticle column
 * @method ArticleQuery groupByLibellearticle() Group by the libellearticle column
 * @method ArticleQuery groupByDescriptionarticle() Group by the descriptionarticle column
 * @method ArticleQuery groupByPrixht() Group by the prixht column
 * @method ArticleQuery groupByQqtestock() Group by the qqtestock column
 * @method ArticleQuery groupByDateajout() Group by the dateajout column
 * @method ArticleQuery groupByIdtaux() Group by the idtaux column
 *
 * @method ArticleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ArticleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ArticleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ArticleQuery leftJoinTauxtva($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tauxtva relation
 * @method ArticleQuery rightJoinTauxtva($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tauxtva relation
 * @method ArticleQuery innerJoinTauxtva($relationAlias = null) Adds a INNER JOIN clause to the query using the Tauxtva relation
 *
 * @method ArticleQuery leftJoinAvis($relationAlias = null) Adds a LEFT JOIN clause to the query using the Avis relation
 * @method ArticleQuery rightJoinAvis($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Avis relation
 * @method ArticleQuery innerJoinAvis($relationAlias = null) Adds a INNER JOIN clause to the query using the Avis relation
 *
 * @method ArticleQuery leftJoinApplicationpromotion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Applicationpromotion relation
 * @method ArticleQuery rightJoinApplicationpromotion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Applicationpromotion relation
 * @method ArticleQuery innerJoinApplicationpromotion($relationAlias = null) Adds a INNER JOIN clause to the query using the Applicationpromotion relation
 *
 * @method ArticleQuery leftJoinCatalogue($relationAlias = null) Adds a LEFT JOIN clause to the query using the Catalogue relation
 * @method ArticleQuery rightJoinCatalogue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Catalogue relation
 * @method ArticleQuery innerJoinCatalogue($relationAlias = null) Adds a INNER JOIN clause to the query using the Catalogue relation
 *
 * @method ArticleQuery leftJoinPanier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Panier relation
 * @method ArticleQuery rightJoinPanier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Panier relation
 * @method ArticleQuery innerJoinPanier($relationAlias = null) Adds a INNER JOIN clause to the query using the Panier relation
 *
 * @method Article findOne(PropelPDO $con = null) Return the first Article matching the query
 * @method Article findOneOrCreate(PropelPDO $con = null) Return the first Article matching the query, or a new Article object populated from the query conditions when no match is found
 *
 * @method Article findOneByReferencearticle(string $referencearticle) Return the first Article filtered by the referencearticle column
 * @method Article findOneByLibellearticle(string $libellearticle) Return the first Article filtered by the libellearticle column
 * @method Article findOneByDescriptionarticle(string $descriptionarticle) Return the first Article filtered by the descriptionarticle column
 * @method Article findOneByPrixht(double $prixht) Return the first Article filtered by the prixht column
 * @method Article findOneByQqtestock(int $qqtestock) Return the first Article filtered by the qqtestock column
 * @method Article findOneByDateajout(string $dateajout) Return the first Article filtered by the dateajout column
 * @method Article findOneByIdtaux(double $idtaux) Return the first Article filtered by the idtaux column
 *
 * @method array findByIdarticle(int $idarticle) Return Article objects filtered by the idarticle column
 * @method array findByReferencearticle(string $referencearticle) Return Article objects filtered by the referencearticle column
 * @method array findByLibellearticle(string $libellearticle) Return Article objects filtered by the libellearticle column
 * @method array findByDescriptionarticle(string $descriptionarticle) Return Article objects filtered by the descriptionarticle column
 * @method array findByPrixht(double $prixht) Return Article objects filtered by the prixht column
 * @method array findByQqtestock(int $qqtestock) Return Article objects filtered by the qqtestock column
 * @method array findByDateajout(string $dateajout) Return Article objects filtered by the dateajout column
 * @method array findByIdtaux(double $idtaux) Return Article objects filtered by the idtaux column
 *
 * @package    propel.generator.lempiredesvis.om
 */
abstract class BaseArticleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseArticleQuery object.
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
            $modelName = 'Article';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ArticleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ArticleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ArticleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ArticleQuery) {
            return $criteria;
        }
        $query = new ArticleQuery(null, null, $modelAlias);

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
     * @return   Article|Article[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ArticlePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ArticlePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Article A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdarticle($key, $con = null)
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
     * @return                 Article A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT idarticle, referencearticle, libellearticle, descriptionarticle, prixht, qqtestock, dateajout, idtaux FROM article WHERE idarticle = :p0';
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
            $obj = new Article();
            $obj->hydrate($row);
            ArticlePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Article|Article[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Article[]|mixed the list of results, formatted by the current formatter
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
     * @return ArticleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ArticlePeer::IDARTICLE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ArticleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ArticlePeer::IDARTICLE, $keys, Criteria::IN);
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
     * @param     mixed $idarticle The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArticleQuery The current query, for fluid interface
     */
    public function filterByIdarticle($idarticle = null, $comparison = null)
    {
        if (is_array($idarticle)) {
            $useMinMax = false;
            if (isset($idarticle['min'])) {
                $this->addUsingAlias(ArticlePeer::IDARTICLE, $idarticle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idarticle['max'])) {
                $this->addUsingAlias(ArticlePeer::IDARTICLE, $idarticle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticlePeer::IDARTICLE, $idarticle, $comparison);
    }

    /**
     * Filter the query on the referencearticle column
     *
     * Example usage:
     * <code>
     * $query->filterByReferencearticle('fooValue');   // WHERE referencearticle = 'fooValue'
     * $query->filterByReferencearticle('%fooValue%'); // WHERE referencearticle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $referencearticle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArticleQuery The current query, for fluid interface
     */
    public function filterByReferencearticle($referencearticle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($referencearticle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $referencearticle)) {
                $referencearticle = str_replace('*', '%', $referencearticle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ArticlePeer::REFERENCEARTICLE, $referencearticle, $comparison);
    }

    /**
     * Filter the query on the libellearticle column
     *
     * Example usage:
     * <code>
     * $query->filterByLibellearticle('fooValue');   // WHERE libellearticle = 'fooValue'
     * $query->filterByLibellearticle('%fooValue%'); // WHERE libellearticle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $libellearticle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArticleQuery The current query, for fluid interface
     */
    public function filterByLibellearticle($libellearticle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($libellearticle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $libellearticle)) {
                $libellearticle = str_replace('*', '%', $libellearticle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ArticlePeer::LIBELLEARTICLE, $libellearticle, $comparison);
    }

    /**
     * Filter the query on the descriptionarticle column
     *
     * Example usage:
     * <code>
     * $query->filterByDescriptionarticle('fooValue');   // WHERE descriptionarticle = 'fooValue'
     * $query->filterByDescriptionarticle('%fooValue%'); // WHERE descriptionarticle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descriptionarticle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArticleQuery The current query, for fluid interface
     */
    public function filterByDescriptionarticle($descriptionarticle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descriptionarticle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descriptionarticle)) {
                $descriptionarticle = str_replace('*', '%', $descriptionarticle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ArticlePeer::DESCRIPTIONARTICLE, $descriptionarticle, $comparison);
    }

    /**
     * Filter the query on the prixht column
     *
     * Example usage:
     * <code>
     * $query->filterByPrixht(1234); // WHERE prixht = 1234
     * $query->filterByPrixht(array(12, 34)); // WHERE prixht IN (12, 34)
     * $query->filterByPrixht(array('min' => 12)); // WHERE prixht >= 12
     * $query->filterByPrixht(array('max' => 12)); // WHERE prixht <= 12
     * </code>
     *
     * @param     mixed $prixht The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArticleQuery The current query, for fluid interface
     */
    public function filterByPrixht($prixht = null, $comparison = null)
    {
        if (is_array($prixht)) {
            $useMinMax = false;
            if (isset($prixht['min'])) {
                $this->addUsingAlias(ArticlePeer::PRIXHT, $prixht['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prixht['max'])) {
                $this->addUsingAlias(ArticlePeer::PRIXHT, $prixht['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticlePeer::PRIXHT, $prixht, $comparison);
    }

    /**
     * Filter the query on the qqtestock column
     *
     * Example usage:
     * <code>
     * $query->filterByQqtestock(1234); // WHERE qqtestock = 1234
     * $query->filterByQqtestock(array(12, 34)); // WHERE qqtestock IN (12, 34)
     * $query->filterByQqtestock(array('min' => 12)); // WHERE qqtestock >= 12
     * $query->filterByQqtestock(array('max' => 12)); // WHERE qqtestock <= 12
     * </code>
     *
     * @param     mixed $qqtestock The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArticleQuery The current query, for fluid interface
     */
    public function filterByQqtestock($qqtestock = null, $comparison = null)
    {
        if (is_array($qqtestock)) {
            $useMinMax = false;
            if (isset($qqtestock['min'])) {
                $this->addUsingAlias(ArticlePeer::QQTESTOCK, $qqtestock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qqtestock['max'])) {
                $this->addUsingAlias(ArticlePeer::QQTESTOCK, $qqtestock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticlePeer::QQTESTOCK, $qqtestock, $comparison);
    }

    /**
     * Filter the query on the dateajout column
     *
     * Example usage:
     * <code>
     * $query->filterByDateajout('2011-03-14'); // WHERE dateajout = '2011-03-14'
     * $query->filterByDateajout('now'); // WHERE dateajout = '2011-03-14'
     * $query->filterByDateajout(array('max' => 'yesterday')); // WHERE dateajout < '2011-03-13'
     * </code>
     *
     * @param     mixed $dateajout The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArticleQuery The current query, for fluid interface
     */
    public function filterByDateajout($dateajout = null, $comparison = null)
    {
        if (is_array($dateajout)) {
            $useMinMax = false;
            if (isset($dateajout['min'])) {
                $this->addUsingAlias(ArticlePeer::DATEAJOUT, $dateajout['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateajout['max'])) {
                $this->addUsingAlias(ArticlePeer::DATEAJOUT, $dateajout['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticlePeer::DATEAJOUT, $dateajout, $comparison);
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
     * @see       filterByTauxtva()
     *
     * @param     mixed $idtaux The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ArticleQuery The current query, for fluid interface
     */
    public function filterByIdtaux($idtaux = null, $comparison = null)
    {
        if (is_array($idtaux)) {
            $useMinMax = false;
            if (isset($idtaux['min'])) {
                $this->addUsingAlias(ArticlePeer::IDTAUX, $idtaux['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtaux['max'])) {
                $this->addUsingAlias(ArticlePeer::IDTAUX, $idtaux['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ArticlePeer::IDTAUX, $idtaux, $comparison);
    }

    /**
     * Filter the query by a related Tauxtva object
     *
     * @param   Tauxtva|PropelObjectCollection $tauxtva The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ArticleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTauxtva($tauxtva, $comparison = null)
    {
        if ($tauxtva instanceof Tauxtva) {
            return $this
                ->addUsingAlias(ArticlePeer::IDTAUX, $tauxtva->getIdtaux(), $comparison);
        } elseif ($tauxtva instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ArticlePeer::IDTAUX, $tauxtva->toKeyValue('PrimaryKey', 'Idtaux'), $comparison);
        } else {
            throw new PropelException('filterByTauxtva() only accepts arguments of type Tauxtva or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tauxtva relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ArticleQuery The current query, for fluid interface
     */
    public function joinTauxtva($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tauxtva');

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
            $this->addJoinObject($join, 'Tauxtva');
        }

        return $this;
    }

    /**
     * Use the Tauxtva relation Tauxtva object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TauxtvaQuery A secondary query class using the current class as primary query
     */
    public function useTauxtvaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTauxtva($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tauxtva', 'TauxtvaQuery');
    }

    /**
     * Filter the query by a related Avis object
     *
     * @param   Avis|PropelObjectCollection $avis  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ArticleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAvis($avis, $comparison = null)
    {
        if ($avis instanceof Avis) {
            return $this
                ->addUsingAlias(ArticlePeer::IDARTICLE, $avis->getIdarticle(), $comparison);
        } elseif ($avis instanceof PropelObjectCollection) {
            return $this
                ->useAvisQuery()
                ->filterByPrimaryKeys($avis->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAvis() only accepts arguments of type Avis or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Avis relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ArticleQuery The current query, for fluid interface
     */
    public function joinAvis($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Avis');

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
            $this->addJoinObject($join, 'Avis');
        }

        return $this;
    }

    /**
     * Use the Avis relation Avis object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AvisQuery A secondary query class using the current class as primary query
     */
    public function useAvisQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAvis($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Avis', 'AvisQuery');
    }

    /**
     * Filter the query by a related Applicationpromotion object
     *
     * @param   Applicationpromotion|PropelObjectCollection $applicationpromotion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ArticleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByApplicationpromotion($applicationpromotion, $comparison = null)
    {
        if ($applicationpromotion instanceof Applicationpromotion) {
            return $this
                ->addUsingAlias(ArticlePeer::IDARTICLE, $applicationpromotion->getIdarticle(), $comparison);
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
     * @return ArticleQuery The current query, for fluid interface
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
     * Filter the query by a related Catalogue object
     *
     * @param   Catalogue|PropelObjectCollection $catalogue  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ArticleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCatalogue($catalogue, $comparison = null)
    {
        if ($catalogue instanceof Catalogue) {
            return $this
                ->addUsingAlias(ArticlePeer::IDARTICLE, $catalogue->getIdarticle(), $comparison);
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
     * @return ArticleQuery The current query, for fluid interface
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
     * Filter the query by a related Panier object
     *
     * @param   Panier|PropelObjectCollection $panier  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ArticleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPanier($panier, $comparison = null)
    {
        if ($panier instanceof Panier) {
            return $this
                ->addUsingAlias(ArticlePeer::IDARTICLE, $panier->getIdarticle(), $comparison);
        } elseif ($panier instanceof PropelObjectCollection) {
            return $this
                ->usePanierQuery()
                ->filterByPrimaryKeys($panier->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPanier() only accepts arguments of type Panier or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Panier relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ArticleQuery The current query, for fluid interface
     */
    public function joinPanier($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Panier');

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
            $this->addJoinObject($join, 'Panier');
        }

        return $this;
    }

    /**
     * Use the Panier relation Panier object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PanierQuery A secondary query class using the current class as primary query
     */
    public function usePanierQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPanier($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Panier', 'PanierQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Article $article Object to remove from the list of results
     *
     * @return ArticleQuery The current query, for fluid interface
     */
    public function prune($article = null)
    {
        if ($article) {
            $this->addUsingAlias(ArticlePeer::IDARTICLE, $article->getIdarticle(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
