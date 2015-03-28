<?php


/**
 * Base class that represents a query for the 'commande' table.
 *
 * Table de commandes
 *
 * @method CommandeQuery orderByIdcommande($order = Criteria::ASC) Order by the idcommande column
 * @method CommandeQuery orderByEtatcommande($order = Criteria::ASC) Order by the etatcommande column
 * @method CommandeQuery orderByIdclient($order = Criteria::ASC) Order by the idclient column
 *
 * @method CommandeQuery groupByIdcommande() Group by the idcommande column
 * @method CommandeQuery groupByEtatcommande() Group by the etatcommande column
 * @method CommandeQuery groupByIdclient() Group by the idclient column
 *
 * @method CommandeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CommandeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CommandeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CommandeQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method CommandeQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method CommandeQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method CommandeQuery leftJoinPanier($relationAlias = null) Adds a LEFT JOIN clause to the query using the Panier relation
 * @method CommandeQuery rightJoinPanier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Panier relation
 * @method CommandeQuery innerJoinPanier($relationAlias = null) Adds a INNER JOIN clause to the query using the Panier relation
 *
 * @method Commande findOne(PropelPDO $con = null) Return the first Commande matching the query
 * @method Commande findOneOrCreate(PropelPDO $con = null) Return the first Commande matching the query, or a new Commande object populated from the query conditions when no match is found
 *
 * @method Commande findOneByEtatcommande(string $etatcommande) Return the first Commande filtered by the etatcommande column
 * @method Commande findOneByIdclient(int $idclient) Return the first Commande filtered by the idclient column
 *
 * @method array findByIdcommande(int $idcommande) Return Commande objects filtered by the idcommande column
 * @method array findByEtatcommande(string $etatcommande) Return Commande objects filtered by the etatcommande column
 * @method array findByIdclient(int $idclient) Return Commande objects filtered by the idclient column
 *
 * @package    propel.generator.lempiredesvis.om
 */
abstract class BaseCommandeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCommandeQuery object.
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
            $modelName = 'Commande';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CommandeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CommandeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CommandeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CommandeQuery) {
            return $criteria;
        }
        $query = new CommandeQuery(null, null, $modelAlias);

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
     * @return   Commande|Commande[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CommandePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CommandePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Commande A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdcommande($key, $con = null)
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
     * @return                 Commande A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT idcommande, etatcommande, idclient FROM commande WHERE idcommande = :p0';
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
            $obj = new Commande();
            $obj->hydrate($row);
            CommandePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Commande|Commande[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Commande[]|mixed the list of results, formatted by the current formatter
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
     * @return CommandeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CommandePeer::IDCOMMANDE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CommandeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CommandePeer::IDCOMMANDE, $keys, Criteria::IN);
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
     * @param     mixed $idcommande The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CommandeQuery The current query, for fluid interface
     */
    public function filterByIdcommande($idcommande = null, $comparison = null)
    {
        if (is_array($idcommande)) {
            $useMinMax = false;
            if (isset($idcommande['min'])) {
                $this->addUsingAlias(CommandePeer::IDCOMMANDE, $idcommande['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcommande['max'])) {
                $this->addUsingAlias(CommandePeer::IDCOMMANDE, $idcommande['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommandePeer::IDCOMMANDE, $idcommande, $comparison);
    }

    /**
     * Filter the query on the etatcommande column
     *
     * Example usage:
     * <code>
     * $query->filterByEtatcommande('fooValue');   // WHERE etatcommande = 'fooValue'
     * $query->filterByEtatcommande('%fooValue%'); // WHERE etatcommande LIKE '%fooValue%'
     * </code>
     *
     * @param     string $etatcommande The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CommandeQuery The current query, for fluid interface
     */
    public function filterByEtatcommande($etatcommande = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($etatcommande)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $etatcommande)) {
                $etatcommande = str_replace('*', '%', $etatcommande);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CommandePeer::ETATCOMMANDE, $etatcommande, $comparison);
    }

    /**
     * Filter the query on the idclient column
     *
     * Example usage:
     * <code>
     * $query->filterByIdclient(1234); // WHERE idclient = 1234
     * $query->filterByIdclient(array(12, 34)); // WHERE idclient IN (12, 34)
     * $query->filterByIdclient(array('min' => 12)); // WHERE idclient >= 12
     * $query->filterByIdclient(array('max' => 12)); // WHERE idclient <= 12
     * </code>
     *
     * @see       filterByClient()
     *
     * @param     mixed $idclient The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CommandeQuery The current query, for fluid interface
     */
    public function filterByIdclient($idclient = null, $comparison = null)
    {
        if (is_array($idclient)) {
            $useMinMax = false;
            if (isset($idclient['min'])) {
                $this->addUsingAlias(CommandePeer::IDCLIENT, $idclient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclient['max'])) {
                $this->addUsingAlias(CommandePeer::IDCLIENT, $idclient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommandePeer::IDCLIENT, $idclient, $comparison);
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CommandeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(CommandePeer::IDCLIENT, $client->getIdclient(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CommandePeer::IDCLIENT, $client->toKeyValue('PrimaryKey', 'Idclient'), $comparison);
        } else {
            throw new PropelException('filterByClient() only accepts arguments of type Client or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Client relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CommandeQuery The current query, for fluid interface
     */
    public function joinClient($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Client');

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
            $this->addJoinObject($join, 'Client');
        }

        return $this;
    }

    /**
     * Use the Client relation Client object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClientQuery A secondary query class using the current class as primary query
     */
    public function useClientQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClient($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Client', 'ClientQuery');
    }

    /**
     * Filter the query by a related Panier object
     *
     * @param   Panier|PropelObjectCollection $panier  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CommandeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPanier($panier, $comparison = null)
    {
        if ($panier instanceof Panier) {
            return $this
                ->addUsingAlias(CommandePeer::IDCOMMANDE, $panier->getIdcommande(), $comparison);
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
     * @return CommandeQuery The current query, for fluid interface
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
     * @param   Commande $commande Object to remove from the list of results
     *
     * @return CommandeQuery The current query, for fluid interface
     */
    public function prune($commande = null)
    {
        if ($commande) {
            $this->addUsingAlias(CommandePeer::IDCOMMANDE, $commande->getIdcommande(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
