<?php


/**
 * Base class that represents a query for the 'adresse' table.
 *
 * Table des adresses
 *
 * @method AdresseQuery orderByIdadresse($order = Criteria::ASC) Order by the idadresse column
 * @method AdresseQuery orderByNumerorue($order = Criteria::ASC) Order by the numerorue column
 * @method AdresseQuery orderByRue($order = Criteria::ASC) Order by the rue column
 * @method AdresseQuery orderByEtage($order = Criteria::ASC) Order by the etage column
 * @method AdresseQuery orderByCodepostal($order = Criteria::ASC) Order by the codepostal column
 * @method AdresseQuery orderByVille($order = Criteria::ASC) Order by the ville column
 * @method AdresseQuery orderByTypeadresse($order = Criteria::ASC) Order by the typeAdresse column
 * @method AdresseQuery orderByIdclient($order = Criteria::ASC) Order by the idclient column
 *
 * @method AdresseQuery groupByIdadresse() Group by the idadresse column
 * @method AdresseQuery groupByNumerorue() Group by the numerorue column
 * @method AdresseQuery groupByRue() Group by the rue column
 * @method AdresseQuery groupByEtage() Group by the etage column
 * @method AdresseQuery groupByCodepostal() Group by the codepostal column
 * @method AdresseQuery groupByVille() Group by the ville column
 * @method AdresseQuery groupByTypeadresse() Group by the typeAdresse column
 * @method AdresseQuery groupByIdclient() Group by the idclient column
 *
 * @method AdresseQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AdresseQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AdresseQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AdresseQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method AdresseQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method AdresseQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method Adresse findOne(PropelPDO $con = null) Return the first Adresse matching the query
 * @method Adresse findOneOrCreate(PropelPDO $con = null) Return the first Adresse matching the query, or a new Adresse object populated from the query conditions when no match is found
 *
 * @method Adresse findOneByNumerorue(int $numerorue) Return the first Adresse filtered by the numerorue column
 * @method Adresse findOneByRue(string $rue) Return the first Adresse filtered by the rue column
 * @method Adresse findOneByEtage(int $etage) Return the first Adresse filtered by the etage column
 * @method Adresse findOneByCodepostal(int $codepostal) Return the first Adresse filtered by the codepostal column
 * @method Adresse findOneByVille(string $ville) Return the first Adresse filtered by the ville column
 * @method Adresse findOneByTypeadresse(string $typeAdresse) Return the first Adresse filtered by the typeAdresse column
 * @method Adresse findOneByIdclient(int $idclient) Return the first Adresse filtered by the idclient column
 *
 * @method array findByIdadresse(int $idadresse) Return Adresse objects filtered by the idadresse column
 * @method array findByNumerorue(int $numerorue) Return Adresse objects filtered by the numerorue column
 * @method array findByRue(string $rue) Return Adresse objects filtered by the rue column
 * @method array findByEtage(int $etage) Return Adresse objects filtered by the etage column
 * @method array findByCodepostal(int $codepostal) Return Adresse objects filtered by the codepostal column
 * @method array findByVille(string $ville) Return Adresse objects filtered by the ville column
 * @method array findByTypeadresse(string $typeAdresse) Return Adresse objects filtered by the typeAdresse column
 * @method array findByIdclient(int $idclient) Return Adresse objects filtered by the idclient column
 *
 * @package    propel.generator.lempiredesvis.om
 */
abstract class BaseAdresseQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAdresseQuery object.
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
            $modelName = 'Adresse';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AdresseQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AdresseQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AdresseQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AdresseQuery) {
            return $criteria;
        }
        $query = new AdresseQuery(null, null, $modelAlias);

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
     * @return   Adresse|Adresse[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AdressePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AdressePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Adresse A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdadresse($key, $con = null)
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
     * @return                 Adresse A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT idadresse, numerorue, rue, etage, codepostal, ville, typeAdresse, idclient FROM adresse WHERE idadresse = :p0';
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
            $obj = new Adresse();
            $obj->hydrate($row);
            AdressePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Adresse|Adresse[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Adresse[]|mixed the list of results, formatted by the current formatter
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
     * @return AdresseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AdressePeer::IDADRESSE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AdresseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AdressePeer::IDADRESSE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idadresse column
     *
     * Example usage:
     * <code>
     * $query->filterByIdadresse(1234); // WHERE idadresse = 1234
     * $query->filterByIdadresse(array(12, 34)); // WHERE idadresse IN (12, 34)
     * $query->filterByIdadresse(array('min' => 12)); // WHERE idadresse >= 12
     * $query->filterByIdadresse(array('max' => 12)); // WHERE idadresse <= 12
     * </code>
     *
     * @param     mixed $idadresse The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdresseQuery The current query, for fluid interface
     */
    public function filterByIdadresse($idadresse = null, $comparison = null)
    {
        if (is_array($idadresse)) {
            $useMinMax = false;
            if (isset($idadresse['min'])) {
                $this->addUsingAlias(AdressePeer::IDADRESSE, $idadresse['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idadresse['max'])) {
                $this->addUsingAlias(AdressePeer::IDADRESSE, $idadresse['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdressePeer::IDADRESSE, $idadresse, $comparison);
    }

    /**
     * Filter the query on the numerorue column
     *
     * Example usage:
     * <code>
     * $query->filterByNumerorue(1234); // WHERE numerorue = 1234
     * $query->filterByNumerorue(array(12, 34)); // WHERE numerorue IN (12, 34)
     * $query->filterByNumerorue(array('min' => 12)); // WHERE numerorue >= 12
     * $query->filterByNumerorue(array('max' => 12)); // WHERE numerorue <= 12
     * </code>
     *
     * @param     mixed $numerorue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdresseQuery The current query, for fluid interface
     */
    public function filterByNumerorue($numerorue = null, $comparison = null)
    {
        if (is_array($numerorue)) {
            $useMinMax = false;
            if (isset($numerorue['min'])) {
                $this->addUsingAlias(AdressePeer::NUMERORUE, $numerorue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numerorue['max'])) {
                $this->addUsingAlias(AdressePeer::NUMERORUE, $numerorue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdressePeer::NUMERORUE, $numerorue, $comparison);
    }

    /**
     * Filter the query on the rue column
     *
     * Example usage:
     * <code>
     * $query->filterByRue('fooValue');   // WHERE rue = 'fooValue'
     * $query->filterByRue('%fooValue%'); // WHERE rue LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rue The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdresseQuery The current query, for fluid interface
     */
    public function filterByRue($rue = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rue)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rue)) {
                $rue = str_replace('*', '%', $rue);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AdressePeer::RUE, $rue, $comparison);
    }

    /**
     * Filter the query on the etage column
     *
     * Example usage:
     * <code>
     * $query->filterByEtage(1234); // WHERE etage = 1234
     * $query->filterByEtage(array(12, 34)); // WHERE etage IN (12, 34)
     * $query->filterByEtage(array('min' => 12)); // WHERE etage >= 12
     * $query->filterByEtage(array('max' => 12)); // WHERE etage <= 12
     * </code>
     *
     * @param     mixed $etage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdresseQuery The current query, for fluid interface
     */
    public function filterByEtage($etage = null, $comparison = null)
    {
        if (is_array($etage)) {
            $useMinMax = false;
            if (isset($etage['min'])) {
                $this->addUsingAlias(AdressePeer::ETAGE, $etage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($etage['max'])) {
                $this->addUsingAlias(AdressePeer::ETAGE, $etage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdressePeer::ETAGE, $etage, $comparison);
    }

    /**
     * Filter the query on the codepostal column
     *
     * Example usage:
     * <code>
     * $query->filterByCodepostal(1234); // WHERE codepostal = 1234
     * $query->filterByCodepostal(array(12, 34)); // WHERE codepostal IN (12, 34)
     * $query->filterByCodepostal(array('min' => 12)); // WHERE codepostal >= 12
     * $query->filterByCodepostal(array('max' => 12)); // WHERE codepostal <= 12
     * </code>
     *
     * @param     mixed $codepostal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdresseQuery The current query, for fluid interface
     */
    public function filterByCodepostal($codepostal = null, $comparison = null)
    {
        if (is_array($codepostal)) {
            $useMinMax = false;
            if (isset($codepostal['min'])) {
                $this->addUsingAlias(AdressePeer::CODEPOSTAL, $codepostal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($codepostal['max'])) {
                $this->addUsingAlias(AdressePeer::CODEPOSTAL, $codepostal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdressePeer::CODEPOSTAL, $codepostal, $comparison);
    }

    /**
     * Filter the query on the ville column
     *
     * Example usage:
     * <code>
     * $query->filterByVille('fooValue');   // WHERE ville = 'fooValue'
     * $query->filterByVille('%fooValue%'); // WHERE ville LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ville The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdresseQuery The current query, for fluid interface
     */
    public function filterByVille($ville = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ville)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ville)) {
                $ville = str_replace('*', '%', $ville);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AdressePeer::VILLE, $ville, $comparison);
    }

    /**
     * Filter the query on the typeAdresse column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeadresse('fooValue');   // WHERE typeAdresse = 'fooValue'
     * $query->filterByTypeadresse('%fooValue%'); // WHERE typeAdresse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $typeadresse The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AdresseQuery The current query, for fluid interface
     */
    public function filterByTypeadresse($typeadresse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($typeadresse)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $typeadresse)) {
                $typeadresse = str_replace('*', '%', $typeadresse);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AdressePeer::TYPEADRESSE, $typeadresse, $comparison);
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
     * @return AdresseQuery The current query, for fluid interface
     */
    public function filterByIdclient($idclient = null, $comparison = null)
    {
        if (is_array($idclient)) {
            $useMinMax = false;
            if (isset($idclient['min'])) {
                $this->addUsingAlias(AdressePeer::IDCLIENT, $idclient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idclient['max'])) {
                $this->addUsingAlias(AdressePeer::IDCLIENT, $idclient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AdressePeer::IDCLIENT, $idclient, $comparison);
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AdresseQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(AdressePeer::IDCLIENT, $client->getIdclient(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AdressePeer::IDCLIENT, $client->toKeyValue('PrimaryKey', 'Idclient'), $comparison);
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
     * @return AdresseQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Adresse $adresse Object to remove from the list of results
     *
     * @return AdresseQuery The current query, for fluid interface
     */
    public function prune($adresse = null)
    {
        if ($adresse) {
            $this->addUsingAlias(AdressePeer::IDADRESSE, $adresse->getIdadresse(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
