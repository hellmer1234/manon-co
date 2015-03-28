<?php


/**
 * Base class that represents a row from the 'commande' table.
 *
 * Table de commandes
 *
 * @package    propel.generator.lempiredesvis.om
 */
abstract class BaseCommande extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CommandePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        CommandePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idcommande field.
     * @var        int
     */
    protected $idcommande;

    /**
     * The value for the etatcommande field.
     * @var        string
     */
    protected $etatcommande;

    /**
     * The value for the idclient field.
     * @var        int
     */
    protected $idclient;

    /**
     * @var        Client
     */
    protected $aClient;

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
    protected $paniersScheduledForDeletion = null;

    /**
     * Get the [idcommande] column value.
     * Numero de la commande
     * @return int
     */
    public function getIdcommande()
    {

        return $this->idcommande;
    }

    /**
     * Get the [etatcommande] column value.
     * Etat de la commande : En preparation/En cours de livraison/Livree
     * @return string
     */
    public function getEtatcommande()
    {

        return $this->etatcommande;
    }

    /**
     * Get the [idclient] column value.
     * Id du client liÃ© Ã  la commande
     * @return int
     */
    public function getIdclient()
    {

        return $this->idclient;
    }

    /**
     * Set the value of [idcommande] column.
     * Numero de la commande
     * @param  int $v new value
     * @return Commande The current object (for fluent API support)
     */
    public function setIdcommande($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idcommande !== $v) {
            $this->idcommande = $v;
            $this->modifiedColumns[] = CommandePeer::IDCOMMANDE;
        }


        return $this;
    } // setIdcommande()

    /**
     * Set the value of [etatcommande] column.
     * Etat de la commande : En preparation/En cours de livraison/Livree
     * @param  string $v new value
     * @return Commande The current object (for fluent API support)
     */
    public function setEtatcommande($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->etatcommande !== $v) {
            $this->etatcommande = $v;
            $this->modifiedColumns[] = CommandePeer::ETATCOMMANDE;
        }


        return $this;
    } // setEtatcommande()

    /**
     * Set the value of [idclient] column.
     * Id du client liÃ© Ã  la commande
     * @param  int $v new value
     * @return Commande The current object (for fluent API support)
     */
    public function setIdclient($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idclient !== $v) {
            $this->idclient = $v;
            $this->modifiedColumns[] = CommandePeer::IDCLIENT;
        }

        if ($this->aClient !== null && $this->aClient->getIdclient() !== $v) {
            $this->aClient = null;
        }


        return $this;
    } // setIdclient()

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

            $this->idcommande = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->etatcommande = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->idclient = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 3; // 3 = CommandePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Commande object", $e);
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

        if ($this->aClient !== null && $this->idclient !== $this->aClient->getIdclient()) {
            $this->aClient = null;
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
            $con = Propel::getConnection(CommandePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = CommandePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aClient = null;
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
            $con = Propel::getConnection(CommandePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = CommandeQuery::create()
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
            $con = Propel::getConnection(CommandePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                CommandePeer::addInstanceToPool($this);
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

            if ($this->aClient !== null) {
                if ($this->aClient->isModified() || $this->aClient->isNew()) {
                    $affectedRows += $this->aClient->save($con);
                }
                $this->setClient($this->aClient);
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

        $this->modifiedColumns[] = CommandePeer::IDCOMMANDE;
        if (null !== $this->idcommande) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CommandePeer::IDCOMMANDE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CommandePeer::IDCOMMANDE)) {
            $modifiedColumns[':p' . $index++]  = 'idcommande';
        }
        if ($this->isColumnModified(CommandePeer::ETATCOMMANDE)) {
            $modifiedColumns[':p' . $index++]  = 'etatcommande';
        }
        if ($this->isColumnModified(CommandePeer::IDCLIENT)) {
            $modifiedColumns[':p' . $index++]  = 'idclient';
        }

        $sql = sprintf(
            'INSERT INTO commande (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'idcommande':
                        $stmt->bindValue($identifier, $this->idcommande, PDO::PARAM_INT);
                        break;
                    case 'etatcommande':
                        $stmt->bindValue($identifier, $this->etatcommande, PDO::PARAM_STR);
                        break;
                    case 'idclient':
                        $stmt->bindValue($identifier, $this->idclient, PDO::PARAM_INT);
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
        $this->setIdcommande($pk);

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

            if ($this->aClient !== null) {
                if (!$this->aClient->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aClient->getValidationFailures());
                }
            }


            if (($retval = CommandePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = CommandePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdcommande();
                break;
            case 1:
                return $this->getEtatcommande();
                break;
            case 2:
                return $this->getIdclient();
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
        if (isset($alreadyDumpedObjects['Commande'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Commande'][$this->getPrimaryKey()] = true;
        $keys = CommandePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdcommande(),
            $keys[1] => $this->getEtatcommande(),
            $keys[2] => $this->getIdclient(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aClient) {
                $result['Client'] = $this->aClient->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = CommandePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdcommande($value);
                break;
            case 1:
                $this->setEtatcommande($value);
                break;
            case 2:
                $this->setIdclient($value);
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
        $keys = CommandePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdcommande($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setEtatcommande($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdclient($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CommandePeer::DATABASE_NAME);

        if ($this->isColumnModified(CommandePeer::IDCOMMANDE)) $criteria->add(CommandePeer::IDCOMMANDE, $this->idcommande);
        if ($this->isColumnModified(CommandePeer::ETATCOMMANDE)) $criteria->add(CommandePeer::ETATCOMMANDE, $this->etatcommande);
        if ($this->isColumnModified(CommandePeer::IDCLIENT)) $criteria->add(CommandePeer::IDCLIENT, $this->idclient);

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
        $criteria = new Criteria(CommandePeer::DATABASE_NAME);
        $criteria->add(CommandePeer::IDCOMMANDE, $this->idcommande);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdcommande();
    }

    /**
     * Generic method to set the primary key (idcommande column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdcommande($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdcommande();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Commande (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setEtatcommande($this->getEtatcommande());
        $copyObj->setIdclient($this->getIdclient());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

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
            $copyObj->setIdcommande(NULL); // this is a auto-increment column, so set to default value
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
     * @return Commande Clone of current object.
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
     * @return CommandePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new CommandePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Client object.
     *
     * @param                  Client $v
     * @return Commande The current object (for fluent API support)
     * @throws PropelException
     */
    public function setClient(Client $v = null)
    {
        if ($v === null) {
            $this->setIdclient(NULL);
        } else {
            $this->setIdclient($v->getIdclient());
        }

        $this->aClient = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Client object, it will not be re-added.
        if ($v !== null) {
            $v->addCommande($this);
        }


        return $this;
    }


    /**
     * Get the associated Client object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Client The associated Client object.
     * @throws PropelException
     */
    public function getClient(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aClient === null && ($this->idclient !== null) && $doQuery) {
            $this->aClient = ClientQuery::create()->findPk($this->idclient, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aClient->addCommandes($this);
             */
        }

        return $this->aClient;
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
        if ('Panier' == $relationName) {
            $this->initPaniers();
        }
    }

    /**
     * Clears out the collPaniers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Commande The current object (for fluent API support)
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
     * If this Commande is new, it will return
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
                    ->filterByCommande($this)
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
     * @return Commande The current object (for fluent API support)
     */
    public function setPaniers(PropelCollection $paniers, PropelPDO $con = null)
    {
        $paniersToDelete = $this->getPaniers(new Criteria(), $con)->diff($paniers);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->paniersScheduledForDeletion = clone $paniersToDelete;

        foreach ($paniersToDelete as $panierRemoved) {
            $panierRemoved->setCommande(null);
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
                ->filterByCommande($this)
                ->count($con);
        }

        return count($this->collPaniers);
    }

    /**
     * Method called to associate a Panier object to this object
     * through the Panier foreign key attribute.
     *
     * @param    Panier $l Panier
     * @return Commande The current object (for fluent API support)
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
        $panier->setCommande($this);
    }

    /**
     * @param	Panier $panier The panier object to remove.
     * @return Commande The current object (for fluent API support)
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
            $panier->setCommande(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Commande is new, it will return
     * an empty collection; or if this Commande has previously
     * been saved, it will retrieve related Paniers from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Commande.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Panier[] List of Panier objects
     */
    public function getPaniersJoinArticle($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PanierQuery::create(null, $criteria);
        $query->joinWith('Article', $join_behavior);

        return $this->getPaniers($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idcommande = null;
        $this->etatcommande = null;
        $this->idclient = null;
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
            if ($this->collPaniers) {
                foreach ($this->collPaniers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aClient instanceof Persistent) {
              $this->aClient->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPaniers instanceof PropelCollection) {
            $this->collPaniers->clearIterator();
        }
        $this->collPaniers = null;
        $this->aClient = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CommandePeer::DEFAULT_STRING_FORMAT);
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
