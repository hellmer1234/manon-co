<?php


/**
 * Base class that represents a row from the 'avis' table.
 *
 * Avis des internautes sur un produit
 *
 * @package    propel.generator.lempiredesvis.om
 */
abstract class BaseAvis extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'AvisPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        AvisPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idavis field.
     * @var        int
     */
    protected $idavis;

    /**
     * The value for the redacteur field.
     * @var        string
     */
    protected $redacteur;

    /**
     * The value for the note field.
     * @var        double
     */
    protected $note;

    /**
     * The value for the descriptionavis field.
     * @var        string
     */
    protected $descriptionavis;

    /**
     * The value for the idarticle field.
     * @var        int
     */
    protected $idarticle;

    /**
     * @var        Article
     */
    protected $aArticle;

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
     * Get the [idavis] column value.
     * Avis
     * @return int
     */
    public function getIdavis()
    {

        return $this->idavis;
    }

    /**
     * Get the [redacteur] column value.
     * Redacteur de l'article
     * @return string
     */
    public function getRedacteur()
    {

        return $this->redacteur;
    }

    /**
     * Get the [note] column value.
     * Note donne a l'article
     * @return double
     */
    public function getNote()
    {

        return $this->note;
    }

    /**
     * Get the [descriptionavis] column value.
     * Description article
     * @return string
     */
    public function getDescriptionavis()
    {

        return $this->descriptionavis;
    }

    /**
     * Get the [idarticle] column value.
     * Article lie a l'avis
     * @return int
     */
    public function getIdarticle()
    {

        return $this->idarticle;
    }

    /**
     * Set the value of [idavis] column.
     * Avis
     * @param  int $v new value
     * @return Avis The current object (for fluent API support)
     */
    public function setIdavis($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idavis !== $v) {
            $this->idavis = $v;
            $this->modifiedColumns[] = AvisPeer::IDAVIS;
        }


        return $this;
    } // setIdavis()

    /**
     * Set the value of [redacteur] column.
     * Redacteur de l'article
     * @param  string $v new value
     * @return Avis The current object (for fluent API support)
     */
    public function setRedacteur($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->redacteur !== $v) {
            $this->redacteur = $v;
            $this->modifiedColumns[] = AvisPeer::REDACTEUR;
        }


        return $this;
    } // setRedacteur()

    /**
     * Set the value of [note] column.
     * Note donne a l'article
     * @param  double $v new value
     * @return Avis The current object (for fluent API support)
     */
    public function setNote($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->note !== $v) {
            $this->note = $v;
            $this->modifiedColumns[] = AvisPeer::NOTE;
        }


        return $this;
    } // setNote()

    /**
     * Set the value of [descriptionavis] column.
     * Description article
     * @param  string $v new value
     * @return Avis The current object (for fluent API support)
     */
    public function setDescriptionavis($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->descriptionavis !== $v) {
            $this->descriptionavis = $v;
            $this->modifiedColumns[] = AvisPeer::DESCRIPTIONAVIS;
        }


        return $this;
    } // setDescriptionavis()

    /**
     * Set the value of [idarticle] column.
     * Article lie a l'avis
     * @param  int $v new value
     * @return Avis The current object (for fluent API support)
     */
    public function setIdarticle($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idarticle !== $v) {
            $this->idarticle = $v;
            $this->modifiedColumns[] = AvisPeer::IDARTICLE;
        }

        if ($this->aArticle !== null && $this->aArticle->getIdarticle() !== $v) {
            $this->aArticle = null;
        }


        return $this;
    } // setIdarticle()

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

            $this->idavis = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->redacteur = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->note = ($row[$startcol + 2] !== null) ? (double) $row[$startcol + 2] : null;
            $this->descriptionavis = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->idarticle = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 5; // 5 = AvisPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Avis object", $e);
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

        if ($this->aArticle !== null && $this->idarticle !== $this->aArticle->getIdarticle()) {
            $this->aArticle = null;
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
            $con = Propel::getConnection(AvisPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = AvisPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aArticle = null;
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
            $con = Propel::getConnection(AvisPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = AvisQuery::create()
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
            $con = Propel::getConnection(AvisPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                AvisPeer::addInstanceToPool($this);
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

            if ($this->aArticle !== null) {
                if ($this->aArticle->isModified() || $this->aArticle->isNew()) {
                    $affectedRows += $this->aArticle->save($con);
                }
                $this->setArticle($this->aArticle);
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

        $this->modifiedColumns[] = AvisPeer::IDAVIS;
        if (null !== $this->idavis) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AvisPeer::IDAVIS . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AvisPeer::IDAVIS)) {
            $modifiedColumns[':p' . $index++]  = 'idavis';
        }
        if ($this->isColumnModified(AvisPeer::REDACTEUR)) {
            $modifiedColumns[':p' . $index++]  = 'redacteur';
        }
        if ($this->isColumnModified(AvisPeer::NOTE)) {
            $modifiedColumns[':p' . $index++]  = 'note';
        }
        if ($this->isColumnModified(AvisPeer::DESCRIPTIONAVIS)) {
            $modifiedColumns[':p' . $index++]  = 'descriptionavis';
        }
        if ($this->isColumnModified(AvisPeer::IDARTICLE)) {
            $modifiedColumns[':p' . $index++]  = 'idarticle';
        }

        $sql = sprintf(
            'INSERT INTO avis (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'idavis':
                        $stmt->bindValue($identifier, $this->idavis, PDO::PARAM_INT);
                        break;
                    case 'redacteur':
                        $stmt->bindValue($identifier, $this->redacteur, PDO::PARAM_STR);
                        break;
                    case 'note':
                        $stmt->bindValue($identifier, $this->note, PDO::PARAM_STR);
                        break;
                    case 'descriptionavis':
                        $stmt->bindValue($identifier, $this->descriptionavis, PDO::PARAM_STR);
                        break;
                    case 'idarticle':
                        $stmt->bindValue($identifier, $this->idarticle, PDO::PARAM_INT);
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
        $this->setIdavis($pk);

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

            if ($this->aArticle !== null) {
                if (!$this->aArticle->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aArticle->getValidationFailures());
                }
            }


            if (($retval = AvisPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = AvisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdavis();
                break;
            case 1:
                return $this->getRedacteur();
                break;
            case 2:
                return $this->getNote();
                break;
            case 3:
                return $this->getDescriptionavis();
                break;
            case 4:
                return $this->getIdarticle();
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
        if (isset($alreadyDumpedObjects['Avis'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Avis'][$this->getPrimaryKey()] = true;
        $keys = AvisPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdavis(),
            $keys[1] => $this->getRedacteur(),
            $keys[2] => $this->getNote(),
            $keys[3] => $this->getDescriptionavis(),
            $keys[4] => $this->getIdarticle(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aArticle) {
                $result['Article'] = $this->aArticle->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = AvisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdavis($value);
                break;
            case 1:
                $this->setRedacteur($value);
                break;
            case 2:
                $this->setNote($value);
                break;
            case 3:
                $this->setDescriptionavis($value);
                break;
            case 4:
                $this->setIdarticle($value);
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
        $keys = AvisPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdavis($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setRedacteur($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setNote($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDescriptionavis($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setIdarticle($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AvisPeer::DATABASE_NAME);

        if ($this->isColumnModified(AvisPeer::IDAVIS)) $criteria->add(AvisPeer::IDAVIS, $this->idavis);
        if ($this->isColumnModified(AvisPeer::REDACTEUR)) $criteria->add(AvisPeer::REDACTEUR, $this->redacteur);
        if ($this->isColumnModified(AvisPeer::NOTE)) $criteria->add(AvisPeer::NOTE, $this->note);
        if ($this->isColumnModified(AvisPeer::DESCRIPTIONAVIS)) $criteria->add(AvisPeer::DESCRIPTIONAVIS, $this->descriptionavis);
        if ($this->isColumnModified(AvisPeer::IDARTICLE)) $criteria->add(AvisPeer::IDARTICLE, $this->idarticle);

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
        $criteria = new Criteria(AvisPeer::DATABASE_NAME);
        $criteria->add(AvisPeer::IDAVIS, $this->idavis);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdavis();
    }

    /**
     * Generic method to set the primary key (idavis column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdavis($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdavis();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Avis (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRedacteur($this->getRedacteur());
        $copyObj->setNote($this->getNote());
        $copyObj->setDescriptionavis($this->getDescriptionavis());
        $copyObj->setIdarticle($this->getIdarticle());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdavis(NULL); // this is a auto-increment column, so set to default value
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
     * @return Avis Clone of current object.
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
     * @return AvisPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new AvisPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Article object.
     *
     * @param                  Article $v
     * @return Avis The current object (for fluent API support)
     * @throws PropelException
     */
    public function setArticle(Article $v = null)
    {
        if ($v === null) {
            $this->setIdarticle(NULL);
        } else {
            $this->setIdarticle($v->getIdarticle());
        }

        $this->aArticle = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Article object, it will not be re-added.
        if ($v !== null) {
            $v->addAvis($this);
        }


        return $this;
    }


    /**
     * Get the associated Article object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Article The associated Article object.
     * @throws PropelException
     */
    public function getArticle(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aArticle === null && ($this->idarticle !== null) && $doQuery) {
            $this->aArticle = ArticleQuery::create()->findPk($this->idarticle, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aArticle->addAviss($this);
             */
        }

        return $this->aArticle;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idavis = null;
        $this->redacteur = null;
        $this->note = null;
        $this->descriptionavis = null;
        $this->idarticle = null;
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
            if ($this->aArticle instanceof Persistent) {
              $this->aArticle->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aArticle = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AvisPeer::DEFAULT_STRING_FORMAT);
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
