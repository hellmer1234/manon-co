<?php


/**
 * Base class that represents a row from the 'article' table.
 *
 * Table des articles
 *
 * @package    propel.generator.lempiredesvis.om
 */
abstract class BaseArticle extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ArticlePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ArticlePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idarticle field.
     * @var        int
     */
    protected $idarticle;

    /**
     * The value for the referencearticle field.
     * @var        string
     */
    protected $referencearticle;

    /**
     * The value for the libellearticle field.
     * @var        string
     */
    protected $libellearticle;

    /**
     * The value for the descriptionarticle field.
     * @var        string
     */
    protected $descriptionarticle;

    /**
     * The value for the prixht field.
     * @var        double
     */
    protected $prixht;

    /**
     * The value for the qqtestock field.
     * @var        int
     */
    protected $qqtestock;

    /**
     * The value for the dateajout field.
     * @var        string
     */
    protected $dateajout;

    /**
     * The value for the idtaux field.
     * @var        double
     */
    protected $idtaux;

    /**
     * @var        Tauxtva
     */
    protected $aTauxtva;

    /**
     * @var        PropelObjectCollection|Avis[] Collection to store aggregation of Avis objects.
     */
    protected $collAviss;
    protected $collAvissPartial;

    /**
     * @var        PropelObjectCollection|Applicationpromotion[] Collection to store aggregation of Applicationpromotion objects.
     */
    protected $collApplicationpromotions;
    protected $collApplicationpromotionsPartial;

    /**
     * @var        PropelObjectCollection|Catalogue[] Collection to store aggregation of Catalogue objects.
     */
    protected $collCatalogues;
    protected $collCataloguesPartial;

    /**
     * @var        PropelObjectCollection|Panier[] Collection to store aggregation of Panier objects.
     */
    protected $collPaniers;
    protected $collPaniersPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $avissScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $applicationpromotionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $cataloguesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $paniersScheduledForDeletion = null;

    /**
     * Get the [idarticle] column value.
     * Article
     * @return int
     */
    public function getIdarticle()
    {

        return $this->idarticle;
    }

    /**
     * Get the [referencearticle] column value.
     * Reference de l'article
     * @return string
     */
    public function getReferencearticle()
    {

        return $this->referencearticle;
    }

    /**
     * Get the [libellearticle] column value.
     * Libelle de l'article
     * @return string
     */
    public function getLibellearticle()
    {

        return $this->libellearticle;
    }

    /**
     * Get the [descriptionarticle] column value.
     * Description article
     * @return string
     */
    public function getDescriptionarticle()
    {

        return $this->descriptionarticle;
    }

    /**
     * Get the [prixht] column value.
     * Prix HT de l'article
     * @return double
     */
    public function getPrixht()
    {

        return $this->prixht;
    }

    /**
     * Get the [qqtestock] column value.
     * Quantite en stock
     * @return int
     */
    public function getQqtestock()
    {

        return $this->qqtestock;
    }

    /**
     * Get the [optionally formatted] temporal [dateajout] column value.
     * Date de creation de l'article
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateajout($format = '%x')
    {
        if ($this->dateajout === null) {
            return null;
        }

        if ($this->dateajout === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->dateajout);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->dateajout, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [idtaux] column value.
     * Taux de TVA de l'article
     * @return double
     */
    public function getIdtaux()
    {

        return $this->idtaux;
    }

    /**
     * Set the value of [idarticle] column.
     * Article
     * @param  int $v new value
     * @return Article The current object (for fluent API support)
     */
    public function setIdarticle($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idarticle !== $v) {
            $this->idarticle = $v;
            $this->modifiedColumns[] = ArticlePeer::IDARTICLE;
        }


        return $this;
    } // setIdarticle()

    /**
     * Set the value of [referencearticle] column.
     * Reference de l'article
     * @param  string $v new value
     * @return Article The current object (for fluent API support)
     */
    public function setReferencearticle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->referencearticle !== $v) {
            $this->referencearticle = $v;
            $this->modifiedColumns[] = ArticlePeer::REFERENCEARTICLE;
        }


        return $this;
    } // setReferencearticle()

    /**
     * Set the value of [libellearticle] column.
     * Libelle de l'article
     * @param  string $v new value
     * @return Article The current object (for fluent API support)
     */
    public function setLibellearticle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->libellearticle !== $v) {
            $this->libellearticle = $v;
            $this->modifiedColumns[] = ArticlePeer::LIBELLEARTICLE;
        }


        return $this;
    } // setLibellearticle()

    /**
     * Set the value of [descriptionarticle] column.
     * Description article
     * @param  string $v new value
     * @return Article The current object (for fluent API support)
     */
    public function setDescriptionarticle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->descriptionarticle !== $v) {
            $this->descriptionarticle = $v;
            $this->modifiedColumns[] = ArticlePeer::DESCRIPTIONARTICLE;
        }


        return $this;
    } // setDescriptionarticle()

    /**
     * Set the value of [prixht] column.
     * Prix HT de l'article
     * @param  double $v new value
     * @return Article The current object (for fluent API support)
     */
    public function setPrixht($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->prixht !== $v) {
            $this->prixht = $v;
            $this->modifiedColumns[] = ArticlePeer::PRIXHT;
        }


        return $this;
    } // setPrixht()

    /**
     * Set the value of [qqtestock] column.
     * Quantite en stock
     * @param  int $v new value
     * @return Article The current object (for fluent API support)
     */
    public function setQqtestock($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->qqtestock !== $v) {
            $this->qqtestock = $v;
            $this->modifiedColumns[] = ArticlePeer::QQTESTOCK;
        }


        return $this;
    } // setQqtestock()

    /**
     * Sets the value of [dateajout] column to a normalized version of the date/time value specified.
     * Date de creation de l'article
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Article The current object (for fluent API support)
     */
    public function setDateajout($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dateajout !== null || $dt !== null) {
            $currentDateAsString = ($this->dateajout !== null && $tmpDt = new DateTime($this->dateajout)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->dateajout = $newDateAsString;
                $this->modifiedColumns[] = ArticlePeer::DATEAJOUT;
            }
        } // if either are not null


        return $this;
    } // setDateajout()

    /**
     * Set the value of [idtaux] column.
     * Taux de TVA de l'article
     * @param  double $v new value
     * @return Article The current object (for fluent API support)
     */
    public function setIdtaux($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->idtaux !== $v) {
            $this->idtaux = $v;
            $this->modifiedColumns[] = ArticlePeer::IDTAUX;
        }

        if ($this->aTauxtva !== null && $this->aTauxtva->getIdtaux() !== $v) {
            $this->aTauxtva = null;
        }


        return $this;
    } // setIdtaux()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->idarticle = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->referencearticle = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->libellearticle = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->descriptionarticle = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->prixht = ($row[$startcol + 4] !== null) ? (double) $row[$startcol + 4] : null;
            $this->qqtestock = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->dateajout = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->idtaux = ($row[$startcol + 7] !== null) ? (double) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 8; // 8 = ArticlePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Article object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aTauxtva !== null && $this->idtaux !== $this->aTauxtva->getIdtaux()) {
            $this->aTauxtva = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ArticlePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ArticlePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aTauxtva = null;
            $this->collAviss = null;

            $this->collApplicationpromotions = null;

            $this->collCatalogues = null;

            $this->collPaniers = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ArticlePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ArticleQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(ArticlePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                ArticlePeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aTauxtva !== null) {
                if ($this->aTauxtva->isModified() || $this->aTauxtva->isNew()) {
                    $affectedRows += $this->aTauxtva->save($con);
                }
                $this->setTauxtva($this->aTauxtva);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->avissScheduledForDeletion !== null) {
                if (!$this->avissScheduledForDeletion->isEmpty()) {
                    AvisQuery::create()
                        ->filterByPrimaryKeys($this->avissScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->avissScheduledForDeletion = null;
                }
            }

            if ($this->collAviss !== null) {
                foreach ($this->collAviss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->applicationpromotionsScheduledForDeletion !== null) {
                if (!$this->applicationpromotionsScheduledForDeletion->isEmpty()) {
                    ApplicationpromotionQuery::create()
                        ->filterByPrimaryKeys($this->applicationpromotionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->applicationpromotionsScheduledForDeletion = null;
                }
            }

            if ($this->collApplicationpromotions !== null) {
                foreach ($this->collApplicationpromotions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->cataloguesScheduledForDeletion !== null) {
                if (!$this->cataloguesScheduledForDeletion->isEmpty()) {
                    CatalogueQuery::create()
                        ->filterByPrimaryKeys($this->cataloguesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->cataloguesScheduledForDeletion = null;
                }
            }

            if ($this->collCatalogues !== null) {
                foreach ($this->collCatalogues as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->paniersScheduledForDeletion !== null) {
                if (!$this->paniersScheduledForDeletion->isEmpty()) {
                    PanierQuery::create()
                        ->filterByPrimaryKeys($this->paniersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->paniersScheduledForDeletion = null;
                }
            }

            if ($this->collPaniers !== null) {
                foreach ($this->collPaniers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = ArticlePeer::IDARTICLE;
        if (null !== $this->idarticle) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ArticlePeer::IDARTICLE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ArticlePeer::IDARTICLE)) {
            $modifiedColumns[':p' . $index++]  = 'idarticle';
        }
        if ($this->isColumnModified(ArticlePeer::REFERENCEARTICLE)) {
            $modifiedColumns[':p' . $index++]  = 'referencearticle';
        }
        if ($this->isColumnModified(ArticlePeer::LIBELLEARTICLE)) {
            $modifiedColumns[':p' . $index++]  = 'libellearticle';
        }
        if ($this->isColumnModified(ArticlePeer::DESCRIPTIONARTICLE)) {
            $modifiedColumns[':p' . $index++]  = 'descriptionarticle';
        }
        if ($this->isColumnModified(ArticlePeer::PRIXHT)) {
            $modifiedColumns[':p' . $index++]  = 'prixht';
        }
        if ($this->isColumnModified(ArticlePeer::QQTESTOCK)) {
            $modifiedColumns[':p' . $index++]  = 'qqtestock';
        }
        if ($this->isColumnModified(ArticlePeer::DATEAJOUT)) {
            $modifiedColumns[':p' . $index++]  = 'dateajout';
        }
        if ($this->isColumnModified(ArticlePeer::IDTAUX)) {
            $modifiedColumns[':p' . $index++]  = 'idtaux';
        }

        $sql = sprintf(
            'INSERT INTO article (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'idarticle':
                        $stmt->bindValue($identifier, $this->idarticle, PDO::PARAM_INT);
                        break;
                    case 'referencearticle':
                        $stmt->bindValue($identifier, $this->referencearticle, PDO::PARAM_STR);
                        break;
                    case 'libellearticle':
                        $stmt->bindValue($identifier, $this->libellearticle, PDO::PARAM_STR);
                        break;
                    case 'descriptionarticle':
                        $stmt->bindValue($identifier, $this->descriptionarticle, PDO::PARAM_STR);
                        break;
                    case 'prixht':
                        $stmt->bindValue($identifier, $this->prixht, PDO::PARAM_STR);
                        break;
                    case 'qqtestock':
                        $stmt->bindValue($identifier, $this->qqtestock, PDO::PARAM_INT);
                        break;
                    case 'dateajout':
                        $stmt->bindValue($identifier, $this->dateajout, PDO::PARAM_STR);
                        break;
                    case 'idtaux':
                        $stmt->bindValue($identifier, $this->idtaux, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setIdarticle($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aTauxtva !== null) {
                if (!$this->aTauxtva->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTauxtva->getValidationFailures());
                }
            }


            if (($retval = ArticlePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAviss !== null) {
                    foreach ($this->collAviss as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collApplicationpromotions !== null) {
                    foreach ($this->collApplicationpromotions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCatalogues !== null) {
                    foreach ($this->collCatalogues as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPaniers !== null) {
                    foreach ($this->collPaniers as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ArticlePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdarticle();
                break;
            case 1:
                return $this->getReferencearticle();
                break;
            case 2:
                return $this->getLibellearticle();
                break;
            case 3:
                return $this->getDescriptionarticle();
                break;
            case 4:
                return $this->getPrixht();
                break;
            case 5:
                return $this->getQqtestock();
                break;
            case 6:
                return $this->getDateajout();
                break;
            case 7:
                return $this->getIdtaux();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Article'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Article'][$this->getPrimaryKey()] = true;
        $keys = ArticlePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdarticle(),
            $keys[1] => $this->getReferencearticle(),
            $keys[2] => $this->getLibellearticle(),
            $keys[3] => $this->getDescriptionarticle(),
            $keys[4] => $this->getPrixht(),
            $keys[5] => $this->getQqtestock(),
            $keys[6] => $this->getDateajout(),
            $keys[7] => $this->getIdtaux(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aTauxtva) {
                $result['Tauxtva'] = $this->aTauxtva->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAviss) {
                $result['Aviss'] = $this->collAviss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collApplicationpromotions) {
                $result['Applicationpromotions'] = $this->collApplicationpromotions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCatalogues) {
                $result['Catalogues'] = $this->collCatalogues->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPaniers) {
                $result['Paniers'] = $this->collPaniers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = ArticlePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdarticle($value);
                break;
            case 1:
                $this->setReferencearticle($value);
                break;
            case 2:
                $this->setLibellearticle($value);
                break;
            case 3:
                $this->setDescriptionarticle($value);
                break;
            case 4:
                $this->setPrixht($value);
                break;
            case 5:
                $this->setQqtestock($value);
                break;
            case 6:
                $this->setDateajout($value);
                break;
            case 7:
                $this->setIdtaux($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = ArticlePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdarticle($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setReferencearticle($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setLibellearticle($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDescriptionarticle($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPrixht($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setQqtestock($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDateajout($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setIdtaux($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ArticlePeer::DATABASE_NAME);

        if ($this->isColumnModified(ArticlePeer::IDARTICLE)) $criteria->add(ArticlePeer::IDARTICLE, $this->idarticle);
        if ($this->isColumnModified(ArticlePeer::REFERENCEARTICLE)) $criteria->add(ArticlePeer::REFERENCEARTICLE, $this->referencearticle);
        if ($this->isColumnModified(ArticlePeer::LIBELLEARTICLE)) $criteria->add(ArticlePeer::LIBELLEARTICLE, $this->libellearticle);
        if ($this->isColumnModified(ArticlePeer::DESCRIPTIONARTICLE)) $criteria->add(ArticlePeer::DESCRIPTIONARTICLE, $this->descriptionarticle);
        if ($this->isColumnModified(ArticlePeer::PRIXHT)) $criteria->add(ArticlePeer::PRIXHT, $this->prixht);
        if ($this->isColumnModified(ArticlePeer::QQTESTOCK)) $criteria->add(ArticlePeer::QQTESTOCK, $this->qqtestock);
        if ($this->isColumnModified(ArticlePeer::DATEAJOUT)) $criteria->add(ArticlePeer::DATEAJOUT, $this->dateajout);
        if ($this->isColumnModified(ArticlePeer::IDTAUX)) $criteria->add(ArticlePeer::IDTAUX, $this->idtaux);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(ArticlePeer::DATABASE_NAME);
        $criteria->add(ArticlePeer::IDARTICLE, $this->idarticle);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdarticle();
    }

    /**
     * Generic method to set the primary key (idarticle column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdarticle($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdarticle();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Article (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setReferencearticle($this->getReferencearticle());
        $copyObj->setLibellearticle($this->getLibellearticle());
        $copyObj->setDescriptionarticle($this->getDescriptionarticle());
        $copyObj->setPrixht($this->getPrixht());
        $copyObj->setQqtestock($this->getQqtestock());
        $copyObj->setDateajout($this->getDateajout());
        $copyObj->setIdtaux($this->getIdtaux());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getAviss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAvis($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getApplicationpromotions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addApplicationpromotion($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCatalogues() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCatalogue($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPaniers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPanier($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdarticle(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Article Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return ArticlePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ArticlePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Tauxtva object.
     *
     * @param                  Tauxtva $v
     * @return Article The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTauxtva(Tauxtva $v = null)
    {
        if ($v === null) {
            $this->setIdtaux(NULL);
        } else {
            $this->setIdtaux($v->getIdtaux());
        }

        $this->aTauxtva = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Tauxtva object, it will not be re-added.
        if ($v !== null) {
            $v->addArticle($this);
        }


        return $this;
    }


    /**
     * Get the associated Tauxtva object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Tauxtva The associated Tauxtva object.
     * @throws PropelException
     */
    public function getTauxtva(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTauxtva === null && ($this->idtaux != 0) && $doQuery) {
            $this->aTauxtva = TauxtvaQuery::create()->findPk($this->idtaux, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTauxtva->addArticles($this);
             */
        }

        return $this->aTauxtva;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Avis' == $relationName) {
            $this->initAviss();
        }
        if ('Applicationpromotion' == $relationName) {
            $this->initApplicationpromotions();
        }
        if ('Catalogue' == $relationName) {
            $this->initCatalogues();
        }
        if ('Panier' == $relationName) {
            $this->initPaniers();
        }
    }

    /**
     * Clears out the collAviss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Article The current object (for fluent API support)
     * @see        addAviss()
     */
    public function clearAviss()
    {
        $this->collAviss = null; // important to set this to null since that means it is uninitialized
        $this->collAvissPartial = null;

        return $this;
    }

    /**
     * reset is the collAviss collection loaded partially
     *
     * @return void
     */
    public function resetPartialAviss($v = true)
    {
        $this->collAvissPartial = $v;
    }

    /**
     * Initializes the collAviss collection.
     *
     * By default this just sets the collAviss collection to an empty array (like clearcollAviss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAviss($overrideExisting = true)
    {
        if (null !== $this->collAviss && !$overrideExisting) {
            return;
        }
        $this->collAviss = new PropelObjectCollection();
        $this->collAviss->setModel('Avis');
    }

    /**
     * Gets an array of Avis objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Article is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Avis[] List of Avis objects
     * @throws PropelException
     */
    public function getAviss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAvissPartial && !$this->isNew();
        if (null === $this->collAviss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAviss) {
                // return empty collection
                $this->initAviss();
            } else {
                $collAviss = AvisQuery::create(null, $criteria)
                    ->filterByArticle($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAvissPartial && count($collAviss)) {
                      $this->initAviss(false);

                      foreach ($collAviss as $obj) {
                        if (false == $this->collAviss->contains($obj)) {
                          $this->collAviss->append($obj);
                        }
                      }

                      $this->collAvissPartial = true;
                    }

                    $collAviss->getInternalIterator()->rewind();

                    return $collAviss;
                }

                if ($partial && $this->collAviss) {
                    foreach ($this->collAviss as $obj) {
                        if ($obj->isNew()) {
                            $collAviss[] = $obj;
                        }
                    }
                }

                $this->collAviss = $collAviss;
                $this->collAvissPartial = false;
            }
        }

        return $this->collAviss;
    }

    /**
     * Sets a collection of Avis objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $aviss A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Article The current object (for fluent API support)
     */
    public function setAviss(PropelCollection $aviss, PropelPDO $con = null)
    {
        $avissToDelete = $this->getAviss(new Criteria(), $con)->diff($aviss);


        $this->avissScheduledForDeletion = $avissToDelete;

        foreach ($avissToDelete as $avisRemoved) {
            $avisRemoved->setArticle(null);
        }

        $this->collAviss = null;
        foreach ($aviss as $avis) {
            $this->addAvis($avis);
        }

        $this->collAviss = $aviss;
        $this->collAvissPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Avis objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Avis objects.
     * @throws PropelException
     */
    public function countAviss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAvissPartial && !$this->isNew();
        if (null === $this->collAviss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAviss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAviss());
            }
            $query = AvisQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByArticle($this)
                ->count($con);
        }

        return count($this->collAviss);
    }

    /**
     * Method called to associate a Avis object to this object
     * through the Avis foreign key attribute.
     *
     * @param    Avis $l Avis
     * @return Article The current object (for fluent API support)
     */
    public function addAvis(Avis $l)
    {
        if ($this->collAviss === null) {
            $this->initAviss();
            $this->collAvissPartial = true;
        }

        if (!in_array($l, $this->collAviss->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAvis($l);

            if ($this->avissScheduledForDeletion and $this->avissScheduledForDeletion->contains($l)) {
                $this->avissScheduledForDeletion->remove($this->avissScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Avis $avis The avis object to add.
     */
    protected function doAddAvis($avis)
    {
        $this->collAviss[]= $avis;
        $avis->setArticle($this);
    }

    /**
     * @param	Avis $avis The avis object to remove.
     * @return Article The current object (for fluent API support)
     */
    public function removeAvis($avis)
    {
        if ($this->getAviss()->contains($avis)) {
            $this->collAviss->remove($this->collAviss->search($avis));
            if (null === $this->avissScheduledForDeletion) {
                $this->avissScheduledForDeletion = clone $this->collAviss;
                $this->avissScheduledForDeletion->clear();
            }
            $this->avissScheduledForDeletion[]= clone $avis;
            $avis->setArticle(null);
        }

        return $this;
    }

    /**
     * Clears out the collApplicationpromotions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Article The current object (for fluent API support)
     * @see        addApplicationpromotions()
     */
    public function clearApplicationpromotions()
    {
        $this->collApplicationpromotions = null; // important to set this to null since that means it is uninitialized
        $this->collApplicationpromotionsPartial = null;

        return $this;
    }

    /**
     * reset is the collApplicationpromotions collection loaded partially
     *
     * @return void
     */
    public function resetPartialApplicationpromotions($v = true)
    {
        $this->collApplicationpromotionsPartial = $v;
    }

    /**
     * Initializes the collApplicationpromotions collection.
     *
     * By default this just sets the collApplicationpromotions collection to an empty array (like clearcollApplicationpromotions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initApplicationpromotions($overrideExisting = true)
    {
        if (null !== $this->collApplicationpromotions && !$overrideExisting) {
            return;
        }
        $this->collApplicationpromotions = new PropelObjectCollection();
        $this->collApplicationpromotions->setModel('Applicationpromotion');
    }

    /**
     * Gets an array of Applicationpromotion objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Article is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Applicationpromotion[] List of Applicationpromotion objects
     * @throws PropelException
     */
    public function getApplicationpromotions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collApplicationpromotionsPartial && !$this->isNew();
        if (null === $this->collApplicationpromotions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collApplicationpromotions) {
                // return empty collection
                $this->initApplicationpromotions();
            } else {
                $collApplicationpromotions = ApplicationpromotionQuery::create(null, $criteria)
                    ->filterByArticle($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collApplicationpromotionsPartial && count($collApplicationpromotions)) {
                      $this->initApplicationpromotions(false);

                      foreach ($collApplicationpromotions as $obj) {
                        if (false == $this->collApplicationpromotions->contains($obj)) {
                          $this->collApplicationpromotions->append($obj);
                        }
                      }

                      $this->collApplicationpromotionsPartial = true;
                    }

                    $collApplicationpromotions->getInternalIterator()->rewind();

                    return $collApplicationpromotions;
                }

                if ($partial && $this->collApplicationpromotions) {
                    foreach ($this->collApplicationpromotions as $obj) {
                        if ($obj->isNew()) {
                            $collApplicationpromotions[] = $obj;
                        }
                    }
                }

                $this->collApplicationpromotions = $collApplicationpromotions;
                $this->collApplicationpromotionsPartial = false;
            }
        }

        return $this->collApplicationpromotions;
    }

    /**
     * Sets a collection of Applicationpromotion objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $applicationpromotions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Article The current object (for fluent API support)
     */
    public function setApplicationpromotions(PropelCollection $applicationpromotions, PropelPDO $con = null)
    {
        $applicationpromotionsToDelete = $this->getApplicationpromotions(new Criteria(), $con)->diff($applicationpromotions);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->applicationpromotionsScheduledForDeletion = clone $applicationpromotionsToDelete;

        foreach ($applicationpromotionsToDelete as $applicationpromotionRemoved) {
            $applicationpromotionRemoved->setArticle(null);
        }

        $this->collApplicationpromotions = null;
        foreach ($applicationpromotions as $applicationpromotion) {
            $this->addApplicationpromotion($applicationpromotion);
        }

        $this->collApplicationpromotions = $applicationpromotions;
        $this->collApplicationpromotionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Applicationpromotion objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Applicationpromotion objects.
     * @throws PropelException
     */
    public function countApplicationpromotions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collApplicationpromotionsPartial && !$this->isNew();
        if (null === $this->collApplicationpromotions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collApplicationpromotions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getApplicationpromotions());
            }
            $query = ApplicationpromotionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByArticle($this)
                ->count($con);
        }

        return count($this->collApplicationpromotions);
    }

    /**
     * Method called to associate a Applicationpromotion object to this object
     * through the Applicationpromotion foreign key attribute.
     *
     * @param    Applicationpromotion $l Applicationpromotion
     * @return Article The current object (for fluent API support)
     */
    public function addApplicationpromotion(Applicationpromotion $l)
    {
        if ($this->collApplicationpromotions === null) {
            $this->initApplicationpromotions();
            $this->collApplicationpromotionsPartial = true;
        }

        if (!in_array($l, $this->collApplicationpromotions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddApplicationpromotion($l);

            if ($this->applicationpromotionsScheduledForDeletion and $this->applicationpromotionsScheduledForDeletion->contains($l)) {
                $this->applicationpromotionsScheduledForDeletion->remove($this->applicationpromotionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Applicationpromotion $applicationpromotion The applicationpromotion object to add.
     */
    protected function doAddApplicationpromotion($applicationpromotion)
    {
        $this->collApplicationpromotions[]= $applicationpromotion;
        $applicationpromotion->setArticle($this);
    }

    /**
     * @param	Applicationpromotion $applicationpromotion The applicationpromotion object to remove.
     * @return Article The current object (for fluent API support)
     */
    public function removeApplicationpromotion($applicationpromotion)
    {
        if ($this->getApplicationpromotions()->contains($applicationpromotion)) {
            $this->collApplicationpromotions->remove($this->collApplicationpromotions->search($applicationpromotion));
            if (null === $this->applicationpromotionsScheduledForDeletion) {
                $this->applicationpromotionsScheduledForDeletion = clone $this->collApplicationpromotions;
                $this->applicationpromotionsScheduledForDeletion->clear();
            }
            $this->applicationpromotionsScheduledForDeletion[]= clone $applicationpromotion;
            $applicationpromotion->setArticle(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Article is new, it will return
     * an empty collection; or if this Article has previously
     * been saved, it will retrieve related Applicationpromotions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Article.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Applicationpromotion[] List of Applicationpromotion objects
     */
    public function getApplicationpromotionsJoinPromotion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ApplicationpromotionQuery::create(null, $criteria);
        $query->joinWith('Promotion', $join_behavior);

        return $this->getApplicationpromotions($query, $con);
    }

    /**
     * Clears out the collCatalogues collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Article The current object (for fluent API support)
     * @see        addCatalogues()
     */
    public function clearCatalogues()
    {
        $this->collCatalogues = null; // important to set this to null since that means it is uninitialized
        $this->collCataloguesPartial = null;

        return $this;
    }

    /**
     * reset is the collCatalogues collection loaded partially
     *
     * @return void
     */
    public function resetPartialCatalogues($v = true)
    {
        $this->collCataloguesPartial = $v;
    }

    /**
     * Initializes the collCatalogues collection.
     *
     * By default this just sets the collCatalogues collection to an empty array (like clearcollCatalogues());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCatalogues($overrideExisting = true)
    {
        if (null !== $this->collCatalogues && !$overrideExisting) {
            return;
        }
        $this->collCatalogues = new PropelObjectCollection();
        $this->collCatalogues->setModel('Catalogue');
    }

    /**
     * Gets an array of Catalogue objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Article is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Catalogue[] List of Catalogue objects
     * @throws PropelException
     */
    public function getCatalogues($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCataloguesPartial && !$this->isNew();
        if (null === $this->collCatalogues || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCatalogues) {
                // return empty collection
                $this->initCatalogues();
            } else {
                $collCatalogues = CatalogueQuery::create(null, $criteria)
                    ->filterByArticle($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCataloguesPartial && count($collCatalogues)) {
                      $this->initCatalogues(false);

                      foreach ($collCatalogues as $obj) {
                        if (false == $this->collCatalogues->contains($obj)) {
                          $this->collCatalogues->append($obj);
                        }
                      }

                      $this->collCataloguesPartial = true;
                    }

                    $collCatalogues->getInternalIterator()->rewind();

                    return $collCatalogues;
                }

                if ($partial && $this->collCatalogues) {
                    foreach ($this->collCatalogues as $obj) {
                        if ($obj->isNew()) {
                            $collCatalogues[] = $obj;
                        }
                    }
                }

                $this->collCatalogues = $collCatalogues;
                $this->collCataloguesPartial = false;
            }
        }

        return $this->collCatalogues;
    }

    /**
     * Sets a collection of Catalogue objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $catalogues A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Article The current object (for fluent API support)
     */
    public function setCatalogues(PropelCollection $catalogues, PropelPDO $con = null)
    {
        $cataloguesToDelete = $this->getCatalogues(new Criteria(), $con)->diff($catalogues);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->cataloguesScheduledForDeletion = clone $cataloguesToDelete;

        foreach ($cataloguesToDelete as $catalogueRemoved) {
            $catalogueRemoved->setArticle(null);
        }

        $this->collCatalogues = null;
        foreach ($catalogues as $catalogue) {
            $this->addCatalogue($catalogue);
        }

        $this->collCatalogues = $catalogues;
        $this->collCataloguesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Catalogue objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Catalogue objects.
     * @throws PropelException
     */
    public function countCatalogues(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCataloguesPartial && !$this->isNew();
        if (null === $this->collCatalogues || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCatalogues) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCatalogues());
            }
            $query = CatalogueQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByArticle($this)
                ->count($con);
        }

        return count($this->collCatalogues);
    }

    /**
     * Method called to associate a Catalogue object to this object
     * through the Catalogue foreign key attribute.
     *
     * @param    Catalogue $l Catalogue
     * @return Article The current object (for fluent API support)
     */
    public function addCatalogue(Catalogue $l)
    {
        if ($this->collCatalogues === null) {
            $this->initCatalogues();
            $this->collCataloguesPartial = true;
        }

        if (!in_array($l, $this->collCatalogues->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCatalogue($l);

            if ($this->cataloguesScheduledForDeletion and $this->cataloguesScheduledForDeletion->contains($l)) {
                $this->cataloguesScheduledForDeletion->remove($this->cataloguesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Catalogue $catalogue The catalogue object to add.
     */
    protected function doAddCatalogue($catalogue)
    {
        $this->collCatalogues[]= $catalogue;
        $catalogue->setArticle($this);
    }

    /**
     * @param	Catalogue $catalogue The catalogue object to remove.
     * @return Article The current object (for fluent API support)
     */
    public function removeCatalogue($catalogue)
    {
        if ($this->getCatalogues()->contains($catalogue)) {
            $this->collCatalogues->remove($this->collCatalogues->search($catalogue));
            if (null === $this->cataloguesScheduledForDeletion) {
                $this->cataloguesScheduledForDeletion = clone $this->collCatalogues;
                $this->cataloguesScheduledForDeletion->clear();
            }
            $this->cataloguesScheduledForDeletion[]= clone $catalogue;
            $catalogue->setArticle(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Article is new, it will return
     * an empty collection; or if this Article has previously
     * been saved, it will retrieve related Catalogues from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Article.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Catalogue[] List of Catalogue objects
     */
    public function getCataloguesJoinCategorie($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CatalogueQuery::create(null, $criteria);
        $query->joinWith('Categorie', $join_behavior);

        return $this->getCatalogues($query, $con);
    }

    /**
     * Clears out the collPaniers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Article The current object (for fluent API support)
     * @see        addPaniers()
     */
    public function clearPaniers()
    {
        $this->collPaniers = null; // important to set this to null since that means it is uninitialized
        $this->collPaniersPartial = null;

        return $this;
    }

    /**
     * reset is the collPaniers collection loaded partially
     *
     * @return void
     */
    public function resetPartialPaniers($v = true)
    {
        $this->collPaniersPartial = $v;
    }

    /**
     * Initializes the collPaniers collection.
     *
     * By default this just sets the collPaniers collection to an empty array (like clearcollPaniers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPaniers($overrideExisting = true)
    {
        if (null !== $this->collPaniers && !$overrideExisting) {
            return;
        }
        $this->collPaniers = new PropelObjectCollection();
        $this->collPaniers->setModel('Panier');
    }

    /**
     * Gets an array of Panier objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Article is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Panier[] List of Panier objects
     * @throws PropelException
     */
    public function getPaniers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPaniersPartial && !$this->isNew();
        if (null === $this->collPaniers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPaniers) {
                // return empty collection
                $this->initPaniers();
            } else {
                $collPaniers = PanierQuery::create(null, $criteria)
                    ->filterByArticle($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPaniersPartial && count($collPaniers)) {
                      $this->initPaniers(false);

                      foreach ($collPaniers as $obj) {
                        if (false == $this->collPaniers->contains($obj)) {
                          $this->collPaniers->append($obj);
                        }
                      }

                      $this->collPaniersPartial = true;
                    }

                    $collPaniers->getInternalIterator()->rewind();

                    return $collPaniers;
                }

                if ($partial && $this->collPaniers) {
                    foreach ($this->collPaniers as $obj) {
                        if ($obj->isNew()) {
                            $collPaniers[] = $obj;
                        }
                    }
                }

                $this->collPaniers = $collPaniers;
                $this->collPaniersPartial = false;
            }
        }

        return $this->collPaniers;
    }

    /**
     * Sets a collection of Panier objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $paniers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Article The current object (for fluent API support)
     */
    public function setPaniers(PropelCollection $paniers, PropelPDO $con = null)
    {
        $paniersToDelete = $this->getPaniers(new Criteria(), $con)->diff($paniers);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->paniersScheduledForDeletion = clone $paniersToDelete;

        foreach ($paniersToDelete as $panierRemoved) {
            $panierRemoved->setArticle(null);
        }

        $this->collPaniers = null;
        foreach ($paniers as $panier) {
            $this->addPanier($panier);
        }

        $this->collPaniers = $paniers;
        $this->collPaniersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Panier objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Panier objects.
     * @throws PropelException
     */
    public function countPaniers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPaniersPartial && !$this->isNew();
        if (null === $this->collPaniers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPaniers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPaniers());
            }
            $query = PanierQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByArticle($this)
                ->count($con);
        }

        return count($this->collPaniers);
    }

    /**
     * Method called to associate a Panier object to this object
     * through the Panier foreign key attribute.
     *
     * @param    Panier $l Panier
     * @return Article The current object (for fluent API support)
     */
    public function addPanier(Panier $l)
    {
        if ($this->collPaniers === null) {
            $this->initPaniers();
            $this->collPaniersPartial = true;
        }

        if (!in_array($l, $this->collPaniers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPanier($l);

            if ($this->paniersScheduledForDeletion and $this->paniersScheduledForDeletion->contains($l)) {
                $this->paniersScheduledForDeletion->remove($this->paniersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Panier $panier The panier object to add.
     */
    protected function doAddPanier($panier)
    {
        $this->collPaniers[]= $panier;
        $panier->setArticle($this);
    }

    /**
     * @param	Panier $panier The panier object to remove.
     * @return Article The current object (for fluent API support)
     */
    public function removePanier($panier)
    {
        if ($this->getPaniers()->contains($panier)) {
            $this->collPaniers->remove($this->collPaniers->search($panier));
            if (null === $this->paniersScheduledForDeletion) {
                $this->paniersScheduledForDeletion = clone $this->collPaniers;
                $this->paniersScheduledForDeletion->clear();
            }
            $this->paniersScheduledForDeletion[]= clone $panier;
            $panier->setArticle(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Article is new, it will return
     * an empty collection; or if this Article has previously
     * been saved, it will retrieve related Paniers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Article.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Panier[] List of Panier objects
     */
    public function getPaniersJoinCommande($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PanierQuery::create(null, $criteria);
        $query->joinWith('Commande', $join_behavior);

        return $this->getPaniers($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idarticle = null;
        $this->referencearticle = null;
        $this->libellearticle = null;
        $this->descriptionarticle = null;
        $this->prixht = null;
        $this->qqtestock = null;
        $this->dateajout = null;
        $this->idtaux = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collAviss) {
                foreach ($this->collAviss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collApplicationpromotions) {
                foreach ($this->collApplicationpromotions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCatalogues) {
                foreach ($this->collCatalogues as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPaniers) {
                foreach ($this->collPaniers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aTauxtva instanceof Persistent) {
              $this->aTauxtva->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAviss instanceof PropelCollection) {
            $this->collAviss->clearIterator();
        }
        $this->collAviss = null;
        if ($this->collApplicationpromotions instanceof PropelCollection) {
            $this->collApplicationpromotions->clearIterator();
        }
        $this->collApplicationpromotions = null;
        if ($this->collCatalogues instanceof PropelCollection) {
            $this->collCatalogues->clearIterator();
        }
        $this->collCatalogues = null;
        if ($this->collPaniers instanceof PropelCollection) {
            $this->collPaniers->clearIterator();
        }
        $this->collPaniers = null;
        $this->aTauxtva = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ArticlePeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
