<?php


/**
 * Base class that represents a query for the 'avis' table.
 *
 * Avis des internautes sur un produit
 *
 * @method AvisQuery orderByIdavis($order = Criteria::ASC) Order by the idavis column
 * @method AvisQuery orderByRedacteur($order = Criteria::ASC) Order by the redacteur column
 * @method AvisQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method AvisQuery orderByDescriptionavis($order = Criteria::ASC) Order by the descriptionavis column
 * @method AvisQuery orderByIdarticle($order = Criteria::ASC) Order by the idarticle column
 *
 * @method AvisQuery groupByIdavis() Group by the idavis column
 * @method AvisQuery groupByRedacteur() Group by the redacteur column
 * @method AvisQuery groupByNote() Group by the note column
 * @method AvisQuery groupByDescriptionavis() Group by the descriptionavis column
 * @method AvisQuery groupByIdarticle() Group by the idarticle column
 *
 * @method AvisQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AvisQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AvisQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AvisQuery leftJoinArticle($relationAlias = null) Adds a LEFT JOIN clause to the query using the Article relation
 * @method AvisQuery rightJoinArticle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Article relation
 * @method AvisQuery innerJoinArticle($relationAlias = null) Adds a INNER JOIN clause to the query using the Article relation
 *
 * @method Avis findOne(PropelPDO $con = null) Return the first Avis matching the query
 * @method Avis findOneOrCreate(PropelPDO $con = null) Return the first Avis matching the query, or a new Avis object populated from the query conditions when no match is found
 *
 * @method Avis findOneByRedacteur(string $redacteur) Return the first Avis filtered by the redacteur column
 * @method Avis findOneByNote(double $note) Return the first Avis filtered by the note column
 * @method Avis findOneByDescriptionavis(string $descriptionavis) Return the first Avis filtered by the descriptionavis column
 * @method Avis findOneByIdarticle(int $idarticle) Return the first Avis filtered by the idarticle column
 *
 * @method array findByIdavis(int $idavis) Return Avis objects filtered by the idavis column
 * @method array findByRedacteur(string $redacteur) Return Avis objects filtered by the redacteur column
 * @method array findByNote(double $note) Return Avis objects filtered by the note column
 * @method array findByDescriptionavis(string $descriptionavis) Return Avis objects filtered by the descriptionavis column
 * @method array findByIdarticle(int $idarticle) Return Avis objects filtered by the idarticle column
 *
 * @package    propel.generator.lempiredesvis.om
 */
abstract class BaseAvisQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAvisQuery object.
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
            $modelName = 'Avis';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AvisQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AvisQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AvisQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AvisQuery) {
            return $criteria;
        }
        $query = new AvisQuery(null, null, $modelAlias);

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
     * @return   Avis|Avis[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AvisPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AvisPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Avis A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdavis($key, $con = null)
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
     * @return                 Avis A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT idavis, redacteur, note, descriptionavis, idarticle FROM avis WHERE idavis = :p0';
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
            $obj = new Avis();
            $obj->hydrate($row);
            AvisPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Avis|Avis[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Avis[]|mixed the list of results, formatted by the current formatter
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
     * @return AvisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AvisPeer::IDAVIS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AvisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AvisPeer::IDAVIS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idavis column
     *
     * Example usage:
     * <code>
     * $query->filterByIdavis(1234); // WHERE idavis = 1234
     * $query->filterByIdavis(array(12, 34)); // WHERE idavis IN (12, 34)
     * $query->filterByIdavis(array('min' => 12)); // WHERE idavis >= 12
     * $query->filterByIdavis(array('max' => 12)); // WHERE idavis <= 12
     * </code>
     *
     * @param     mixed $idavis The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AvisQuery The current query, for fluid interface
     */
    public function filterByIdavis($idavis = null, $comparison = null)
    {
        if (is_array($idavis)) {
            $useMinMax = false;
            if (isset($idavis['min'])) {
                $this->addUsingAlias(AvisPeer::IDAVIS, $idavis['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idavis['max'])) {
                $this->addUsingAlias(AvisPeer::IDAVIS, $idavis['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AvisPeer::IDAVIS, $idavis, $comparison);
    }

    /**
     * Filter the query on the redacteur column
     *
     * Example usage:
     * <code>
     * $query->filterByRedacteur('fooValue');   // WHERE redacteur = 'fooValue'
     * $query->filterByRedacteur('%fooValue%'); // WHERE redacteur LIKE '%fooValue%'
     * </code>
     *
     * @param     string $redacteur The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AvisQuery The current query, for fluid interface
     */
    public function filterByRedacteur($redacteur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($redacteur)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $redacteur)) {
                $redacteur = str_replace('*', '%', $redacteur);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AvisPeer::REDACTEUR, $redacteur, $comparison);
    }

    /**
     * Filter the query on the note column
     *
     * Example usage:
     * <code>
     * $query->filterByNote(1234); // WHERE note = 1234
     * $query->filterByNote(array(12, 34)); // WHERE note IN (12, 34)
     * $query->filterByNote(array('min' => 12)); // WHERE note >= 12
     * $query->filterByNote(array('max' => 12)); // WHERE note <= 12
     * </code>
     *
     * @param     mixed $note The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AvisQuery The current query, for fluid interface
     */
    public function filterByNote($note = null, $comparison = null)
    {
        if (is_array($note)) {
            $useMinMax = false;
            if (isset($note['min'])) {
                $this->addUsingAlias(AvisPeer::NOTE, $note['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($note['max'])) {
                $this->addUsingAlias(AvisPeer::NOTE, $note['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AvisPeer::NOTE, $note, $comparison);
    }

    /**
     * Filter the query on the descriptionavis column
     *
     * Example usage:
     * <code>
     * $query->filterByDescriptionavis('fooValue');   // WHERE descriptionavis = 'fooValue'
     * $query->filterByDescriptionavis('%fooValue%'); // WHERE descriptionavis LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descriptionavis The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AvisQuery The current query, for fluid interface
     */
    public function filterByDescriptionavis($descriptionavis = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descriptionavis)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descriptionavis)) {
                $descriptionavis = str_replace('*', '%', $descriptionavis);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AvisPeer::DESCRIPTIONAVIS, $descriptionavis, $comparison);
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
     * @return AvisQuery The current query, for fluid interface
     */
    public function filterByIdarticle($idarticle = null, $comparison = null)
    {
        if (is_array($idarticle)) {
            $useMinMax = false;
            if (isset($idarticle['min'])) {
                $this->addUsingAlias(AvisPeer::IDARTICLE, $idarticle['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idarticle['max'])) {
                $this->addUsingAlias(AvisPeer::IDARTICLE, $idarticle['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AvisPeer::IDARTICLE, $idarticle, $comparison);
    }

    /**
     * Filter the query by a related Article object
     *
     * @param   Article|PropelObjectCollection $article The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AvisQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByArticle($article, $comparison = null)
    {
        if ($article instanceof Article) {
            return $this
                ->addUsingAlias(AvisPeer::IDARTICLE, $article->getIdarticle(), $comparison);
        } elseif ($article instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AvisPeer::IDARTICLE, $article->toKeyValue('PrimaryKey', 'Idarticle'), $comparison);
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
     * @return AvisQuery The current query, for fluid interface
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
     * @param   Avis $avis Object to remove from the list of results
     *
     * @return AvisQuery The current query, for fluid interface
     */
    public function prune($avis = null)
    {
        if ($avis) {
            $this->addUsingAlias(AvisPeer::IDAVIS, $avis->getIdavis(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
