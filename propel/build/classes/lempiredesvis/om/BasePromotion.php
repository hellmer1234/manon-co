<?php


/**
 * Base class that represents a row from the 'promotion' table.
 *
 * Table des promotions
 *
 * @package    propel.generator.lempiredesvis.om
 */
abstract class BasePromotion extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'PromotionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PromotionPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idpromo field.
     * @var        int
     */
    protected $idpromo;

    /**
     * The value for the titrepromo field.
     * @var        string
     */
    protected $titrepromo;

    /**
     * The value for the datedebut field.
     * @var        string
     */
    protected $datedebut;

    /**
     * The value for the datefin field.
     * @var        string
     */
    protected $datefin;

    /**
     * @var        PropelObjectCollection|Applicationpromotion[] Collection to store aggregation of Applicationpromotion objects.
     */
    protected $collApplicationpromotions;
    protected $collApplicationpromotionsPartial;

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
    protected $applicationpromotionsScheduledForDeletion = null;

    /**
     * Get the [idpromo] column value.
     * Numero de la promotion
     * @return int
     */
    public function getIdpromo()
    {

        return $this->idpromo;
    }

    /**
     * Get the [titrepromo] column value.
     * Titre de la promotion
     * @return string
     */
    public function getTitrepromo()
    {

        return $this->titrepromo;
    }

    /**
     * Get the [optionally formatted] temporal [datedebut] column value.
     * Date de debut de la promotion
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDatedebut($format = '%x')
    {
        if ($this->datedebut === null) {
            return null;
        }

        if ($this->datedebut === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->datedebut);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->datedebut, true), $x);
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
     * Get the [optionally formatted] temporal [datefin] column value.
     * Date de fin de promotion
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDatefin($format = '%x')
    {
        if ($this->datefin === null) {
            return null;
        }

        if ($this->datefin === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->datefin);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->datefin, true), $x);
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
     * Set the value of [idpromo] column.
     * Numero de la promotion
     * @param  int $v new value
     * @return Promotion The current object (for fluent API support)
     */
    public function setIdpromo($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idpromo !== $v) {
            $this->idpromo = $v;
            $this->modifiedColumns[] = PromotionPeer::IDPROMO;
        }


        return $this;
    } // setIdpromo()

    /**
     * Set the value of [titrepromo] column.
     * Titre de la promotion
     * @param  string $v new value
     * @return Promotion The current object (for fluent API support)
     */
    public function setTitrepromo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->titrepromo !== $v) {
            $this->titrepromo = $v;
            $this->modifiedColumns[] = PromotionPeer::TITREPROMO;
        }


        return $this;
    } // setTitrepromo()

    /**
     * Sets the value of [datedebut] column to a normalized version of the date/time value specified.
     * Date de debut de la promotion
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Promotion The current object (for fluent API support)
     */
    public function setDatedebut($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->datedebut !== null || $dt !== null) {
            $currentDateAsString = ($this->datedebut !== null && $tmpDt = new DateTime($this->datedebut)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->datedebut = $newDateAsString;
                $this->modifiedColumns[] = PromotionPeer::DATEDEBUT;
            }
        } // if either are not null


        return $this;
    } // setDatedebut()

    /**
     * Sets the value of [datefin] column to a normalized version of the date/time value specified.
     * Date de fin de promotion
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Promotion The current object (for fluent API support)
     */
    public function setDatefin($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->datefin !== null || $dt !== null) {
            $currentDateAsString = ($this->datefin !== null && $tmpDt = new DateTime($this->datefin)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->datefin = $newDateAsString;
                $this->modifiedColumns[] = PromotionPeer::DATEFIN;
            }
        } // if either are not null


        return $this;
    } // setDatefin()

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

            $this->idpromo = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->titrepromo = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->datedebut = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->datefin = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 4; // 4 = PromotionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Promotion object", $e);
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
            $con = Propel::getConnection(PromotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PromotionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collApplicationpromotions = null;

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
            $con = Propel::getConnection(PromotionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PromotionQuery::create()
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
            $con = Propel::getConnection(PromotionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PromotionPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = PromotionPeer::IDPROMO;
        if (null !== $this->idpromo) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PromotionPeer::IDPROMO . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PromotionPeer::IDPROMO)) {
            $modifiedColumns[':p' . $index++]  = 'idpromo';
        }
        if ($this->isColumnModified(PromotionPeer::TITREPROMO)) {
            $modifiedColumns[':p' . $index++]  = 'titrepromo';
        }
        if ($this->isColumnModified(PromotionPeer::DATEDEBUT)) {
            $modifiedColumns[':p' . $index++]  = 'datedebut';
        }
        if ($this->isColumnModified(PromotionPeer::DATEFIN)) {
            $modifiedColumns[':p' . $index++]  = 'datefin';
        }

        $sql = sprintf(
            'INSERT INTO promotion (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'idpromo':
                        $stmt->bindValue($identifier, $this->idpromo, PDO::PARAM_INT);
                        break;
                    case 'titrepromo':
                        $stmt->bindValue($identifier, $this->titrepromo, PDO::PARAM_STR);
                        break;
                    case 'datedebut':
                        $stmt->bindValue($identifier, $this->datedebut, PDO::PARAM_STR);
                        break;
                    case 'datefin':
                        $stmt->bindValue($identifier, $this->datefin, PDO::PARAM_STR);
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
        $this->setIdpromo($pk);

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


            if (($retval = PromotionPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collApplicationpromotions !== null) {
                    foreach ($this->collApplicationpromotions as $referrerFK) {
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
        $pos = PromotionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdpromo();
                break;
            case 1:
                return $this->getTitrepromo();
                break;
            case 2:
                return $this->getDatedebut();
                break;
            case 3:
                return $this->getDatefin();
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
        if (isset($alreadyDumpedObjects['Promotion'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Promotion'][$this->getPrimaryKey()] = true;
        $keys = PromotionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdpromo(),
            $keys[1] => $this->getTitrepromo(),
            $keys[2] => $this->getDatedebut(),
            $keys[3] => $this->getDatefin(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collApplicationpromotions) {
                $result['Applicationpromotions'] = $this->collApplicationpromotions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PromotionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdpromo($value);
                break;
            case 1:
                $this->setTitrepromo($value);
                break;
            case 2:
                $this->setDatedebut($value);
                break;
            case 3:
                $this->setDatefin($value);
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
        $keys = PromotionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdpromo($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setTitrepromo($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDatedebut($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDatefin($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PromotionPeer::DATABASE_NAME);

        if ($this->isColumnModified(PromotionPeer::IDPROMO)) $criteria->add(PromotionPeer::IDPROMO, $this->idpromo);
        if ($this->isColumnModified(PromotionPeer::TITREPROMO)) $criteria->add(PromotionPeer::TITREPROMO, $this->titrepromo);
        if ($this->isColumnModified(PromotionPeer::DATEDEBUT)) $criteria->add(PromotionPeer::DATEDEBUT, $this->datedebut);
        if ($this->isColumnModified(PromotionPeer::DATEFIN)) $criteria->add(PromotionPeer::DATEFIN, $this->datefin);

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
        $criteria = new Criteria(PromotionPeer::DATABASE_NAME);
        $criteria->add(PromotionPeer::IDPROMO, $this->idpromo);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdpromo();
    }

    /**
     * Generic method to set the primary key (idpromo column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdpromo($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdpromo();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Promotion (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTitrepromo($this->getTitrepromo());
        $copyObj->setDatedebut($this->getDatedebut());
        $copyObj->setDatefin($this->getDatefin());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getApplicationpromotions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addApplicationpromotion($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdpromo(NULL); // this is a auto-increment column, so set to default value
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
     * @return Promotion Clone of current object.
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
     * @return PromotionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PromotionPeer();
        }

        return self::$peer;
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
        if ('Applicationpromotion' == $relationName) {
            $this->initApplicationpromotions();
        }
    }

    /**
     * Clears out the collApplicationpromotions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Promotion The current object (for fluent API support)
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
     * If this Promotion is new, it will return
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
                    ->filterByPromotion($this)
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
     * @return Promotion The current object (for fluent API support)
     */
    public function setApplicationpromotions(PropelCollection $applicationpromotions, PropelPDO $con = null)
    {
        $applicationpromotionsToDelete = $this->getApplicationpromotions(new Criteria(), $con)->diff($applicationpromotions);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->applicationpromotionsScheduledForDeletion = clone $applicationpromotionsToDelete;

        foreach ($applicationpromotionsToDelete as $applicationpromotionRemoved) {
            $applicationpromotionRemoved->setPromotion(null);
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
                ->filterByPromotion($this)
                ->count($con);
        }

        return count($this->collApplicationpromotions);
    }

    /**
     * Method called to associate a Applicationpromotion object to this object
     * through the Applicationpromotion foreign key attribute.
     *
     * @param    Applicationpromotion $l Applicationpromotion
     * @return Promotion The current object (for fluent API support)
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
        $applicationpromotion->setPromotion($this);
    }

    /**
     * @param	Applicationpromotion $applicationpromotion The applicationpromotion object to remove.
     * @return Promotion The current object (for fluent API support)
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
            $applicationpromotion->setPromotion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Promotion is new, it will return
     * an empty collection; or if this Promotion has previously
     * been saved, it will retrieve related Applicationpromotions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Promotion.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Applicationpromotion[] List of Applicationpromotion objects
     */
    public function getApplicationpromotionsJoinArticle($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ApplicationpromotionQuery::create(null, $criteria);
        $query->joinWith('Article', $join_behavior);

        return $this->getApplicationpromotions($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idpromo = null;
        $this->titrepromo = null;
        $this->datedebut = null;
        $this->datefin = null;
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
            if ($this->collApplicationpromotions) {
                foreach ($this->collApplicationpromotions as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collApplicationpromotions instanceof PropelCollection) {
            $this->collApplicationpromotions->clearIterator();
        }
        $this->collApplicationpromotions = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PromotionPeer::DEFAULT_STRING_FORMAT);
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
