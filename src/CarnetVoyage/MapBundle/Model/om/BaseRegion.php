<?php

namespace CarnetVoyage\MapBundle\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use CarnetVoyage\MapBundle\Model\Destination;
use CarnetVoyage\MapBundle\Model\DestinationQuery;
use CarnetVoyage\MapBundle\Model\Pays;
use CarnetVoyage\MapBundle\Model\PaysQuery;
use CarnetVoyage\MapBundle\Model\Region;
use CarnetVoyage\MapBundle\Model\RegionPeer;
use CarnetVoyage\MapBundle\Model\RegionQuery;
use CarnetVoyage\MapBundle\Model\Visitable;
use CarnetVoyage\MapBundle\Model\VisitableQuery;

/**
 * Base class that represents a row from the 'Region' table.
 *
 *
 *
 * @package    propel.generator.src.CarnetVoyage.MapBundle.Model.om
 */
abstract class BaseRegion extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CarnetVoyage\\MapBundle\\Model\\RegionPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RegionPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the pays_id field.
     * @var        int
     */
    protected $pays_id;

    /**
     * The value for the valeur field.
     * @var        string
     */
    protected $valeur;

    /**
     * @var        Pays
     */
    protected $aPays;

    /**
     * @var        PropelObjectCollection|Destination[] Collection to store aggregation of Destination objects.
     */
    protected $collDestinations;
    protected $collDestinationsPartial;

    /**
     * @var        PropelObjectCollection|Visitable[] Collection to store aggregation of Visitable objects.
     */
    protected $collVisitables;
    protected $collVisitablesPartial;

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
    protected $destinationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $visitablesScheduledForDeletion = null;

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [pays_id] column value.
     *
     * @return int
     */
    public function getPaysId()
    {
        return $this->pays_id;
    }

    /**
     * Get the [valeur] column value.
     *
     * @return string
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Region The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = RegionPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [pays_id] column.
     *
     * @param int $v new value
     * @return Region The current object (for fluent API support)
     */
    public function setPaysId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->pays_id !== $v) {
            $this->pays_id = $v;
            $this->modifiedColumns[] = RegionPeer::PAYS_ID;
        }

        if ($this->aPays !== null && $this->aPays->getId() !== $v) {
            $this->aPays = null;
        }


        return $this;
    } // setPaysId()

    /**
     * Set the value of [valeur] column.
     *
     * @param string $v new value
     * @return Region The current object (for fluent API support)
     */
    public function setValeur($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->valeur !== $v) {
            $this->valeur = $v;
            $this->modifiedColumns[] = RegionPeer::VALEUR;
        }


        return $this;
    } // setValeur()

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
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->pays_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->valeur = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 3; // 3 = RegionPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Region object", $e);
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

        if ($this->aPays !== null && $this->pays_id !== $this->aPays->getId()) {
            $this->aPays = null;
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
            $con = Propel::getConnection(RegionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RegionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPays = null;
            $this->collDestinations = null;

            $this->collVisitables = null;

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
            $con = Propel::getConnection(RegionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RegionQuery::create()
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
            $con = Propel::getConnection(RegionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RegionPeer::addInstanceToPool($this);
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
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPays !== null) {
                if ($this->aPays->isModified() || $this->aPays->isNew()) {
                    $affectedRows += $this->aPays->save($con);
                }
                $this->setPays($this->aPays);
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

            if ($this->destinationsScheduledForDeletion !== null) {
                if (!$this->destinationsScheduledForDeletion->isEmpty()) {
                    DestinationQuery::create()
                        ->filterByPrimaryKeys($this->destinationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->destinationsScheduledForDeletion = null;
                }
            }

            if ($this->collDestinations !== null) {
                foreach ($this->collDestinations as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->visitablesScheduledForDeletion !== null) {
                if (!$this->visitablesScheduledForDeletion->isEmpty()) {
                    VisitableQuery::create()
                        ->filterByPrimaryKeys($this->visitablesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->visitablesScheduledForDeletion = null;
                }
            }

            if ($this->collVisitables !== null) {
                foreach ($this->collVisitables as $referrerFK) {
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RegionPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(RegionPeer::PAYS_ID)) {
            $modifiedColumns[':p' . $index++]  = '`pays_id`';
        }
        if ($this->isColumnModified(RegionPeer::VALEUR)) {
            $modifiedColumns[':p' . $index++]  = '`valeur`';
        }

        $sql = sprintf(
            'INSERT INTO `Region` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`pays_id`':
                        $stmt->bindValue($identifier, $this->pays_id, PDO::PARAM_INT);
                        break;
                    case '`valeur`':
                        $stmt->bindValue($identifier, $this->valeur, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

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
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPays !== null) {
                if (!$this->aPays->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPays->getValidationFailures());
                }
            }


            if (($retval = RegionPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collDestinations !== null) {
                    foreach ($this->collDestinations as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVisitables !== null) {
                    foreach ($this->collVisitables as $referrerFK) {
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
        $pos = RegionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getId();
                break;
            case 1:
                return $this->getPaysId();
                break;
            case 2:
                return $this->getValeur();
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
        if (isset($alreadyDumpedObjects['Region'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Region'][$this->getPrimaryKey()] = true;
        $keys = RegionPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getPaysId(),
            $keys[2] => $this->getValeur(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPays) {
                $result['Pays'] = $this->aPays->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collDestinations) {
                $result['Destinations'] = $this->collDestinations->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVisitables) {
                $result['Visitables'] = $this->collVisitables->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RegionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setId($value);
                break;
            case 1:
                $this->setPaysId($value);
                break;
            case 2:
                $this->setValeur($value);
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
        $keys = RegionPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setPaysId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setValeur($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RegionPeer::DATABASE_NAME);

        if ($this->isColumnModified(RegionPeer::ID)) $criteria->add(RegionPeer::ID, $this->id);
        if ($this->isColumnModified(RegionPeer::PAYS_ID)) $criteria->add(RegionPeer::PAYS_ID, $this->pays_id);
        if ($this->isColumnModified(RegionPeer::VALEUR)) $criteria->add(RegionPeer::VALEUR, $this->valeur);

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
        $criteria = new Criteria(RegionPeer::DATABASE_NAME);
        $criteria->add(RegionPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Region (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPaysId($this->getPaysId());
        $copyObj->setValeur($this->getValeur());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getDestinations() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDestination($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVisitables() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVisitable($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Region Clone of current object.
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
     * @return RegionPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RegionPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Pays object.
     *
     * @param             Pays $v
     * @return Region The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPays(Pays $v = null)
    {
        if ($v === null) {
            $this->setPaysId(NULL);
        } else {
            $this->setPaysId($v->getId());
        }

        $this->aPays = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Pays object, it will not be re-added.
        if ($v !== null) {
            $v->addRegion($this);
        }


        return $this;
    }


    /**
     * Get the associated Pays object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pays The associated Pays object.
     * @throws PropelException
     */
    public function getPays(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPays === null && ($this->pays_id !== null) && $doQuery) {
            $this->aPays = PaysQuery::create()->findPk($this->pays_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPays->addRegions($this);
             */
        }

        return $this->aPays;
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
        if ('Destination' == $relationName) {
            $this->initDestinations();
        }
        if ('Visitable' == $relationName) {
            $this->initVisitables();
        }
    }

    /**
     * Clears out the collDestinations collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Region The current object (for fluent API support)
     * @see        addDestinations()
     */
    public function clearDestinations()
    {
        $this->collDestinations = null; // important to set this to null since that means it is uninitialized
        $this->collDestinationsPartial = null;

        return $this;
    }

    /**
     * reset is the collDestinations collection loaded partially
     *
     * @return void
     */
    public function resetPartialDestinations($v = true)
    {
        $this->collDestinationsPartial = $v;
    }

    /**
     * Initializes the collDestinations collection.
     *
     * By default this just sets the collDestinations collection to an empty array (like clearcollDestinations());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDestinations($overrideExisting = true)
    {
        if (null !== $this->collDestinations && !$overrideExisting) {
            return;
        }
        $this->collDestinations = new PropelObjectCollection();
        $this->collDestinations->setModel('Destination');
    }

    /**
     * Gets an array of Destination objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Region is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Destination[] List of Destination objects
     * @throws PropelException
     */
    public function getDestinations($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collDestinationsPartial && !$this->isNew();
        if (null === $this->collDestinations || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDestinations) {
                // return empty collection
                $this->initDestinations();
            } else {
                $collDestinations = DestinationQuery::create(null, $criteria)
                    ->filterByRegion($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collDestinationsPartial && count($collDestinations)) {
                      $this->initDestinations(false);

                      foreach($collDestinations as $obj) {
                        if (false == $this->collDestinations->contains($obj)) {
                          $this->collDestinations->append($obj);
                        }
                      }

                      $this->collDestinationsPartial = true;
                    }

                    $collDestinations->getInternalIterator()->rewind();
                    return $collDestinations;
                }

                if($partial && $this->collDestinations) {
                    foreach($this->collDestinations as $obj) {
                        if($obj->isNew()) {
                            $collDestinations[] = $obj;
                        }
                    }
                }

                $this->collDestinations = $collDestinations;
                $this->collDestinationsPartial = false;
            }
        }

        return $this->collDestinations;
    }

    /**
     * Sets a collection of Destination objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $destinations A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Region The current object (for fluent API support)
     */
    public function setDestinations(PropelCollection $destinations, PropelPDO $con = null)
    {
        $destinationsToDelete = $this->getDestinations(new Criteria(), $con)->diff($destinations);

        $this->destinationsScheduledForDeletion = unserialize(serialize($destinationsToDelete));

        foreach ($destinationsToDelete as $destinationRemoved) {
            $destinationRemoved->setRegion(null);
        }

        $this->collDestinations = null;
        foreach ($destinations as $destination) {
            $this->addDestination($destination);
        }

        $this->collDestinations = $destinations;
        $this->collDestinationsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Destination objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Destination objects.
     * @throws PropelException
     */
    public function countDestinations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collDestinationsPartial && !$this->isNew();
        if (null === $this->collDestinations || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDestinations) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getDestinations());
            }
            $query = DestinationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRegion($this)
                ->count($con);
        }

        return count($this->collDestinations);
    }

    /**
     * Method called to associate a Destination object to this object
     * through the Destination foreign key attribute.
     *
     * @param    Destination $l Destination
     * @return Region The current object (for fluent API support)
     */
    public function addDestination(Destination $l)
    {
        if ($this->collDestinations === null) {
            $this->initDestinations();
            $this->collDestinationsPartial = true;
        }
        if (!in_array($l, $this->collDestinations->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddDestination($l);
        }

        return $this;
    }

    /**
     * @param	Destination $destination The destination object to add.
     */
    protected function doAddDestination($destination)
    {
        $this->collDestinations[]= $destination;
        $destination->setRegion($this);
    }

    /**
     * @param	Destination $destination The destination object to remove.
     * @return Region The current object (for fluent API support)
     */
    public function removeDestination($destination)
    {
        if ($this->getDestinations()->contains($destination)) {
            $this->collDestinations->remove($this->collDestinations->search($destination));
            if (null === $this->destinationsScheduledForDeletion) {
                $this->destinationsScheduledForDeletion = clone $this->collDestinations;
                $this->destinationsScheduledForDeletion->clear();
            }
            $this->destinationsScheduledForDeletion[]= clone $destination;
            $destination->setRegion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Region is new, it will return
     * an empty collection; or if this Region has previously
     * been saved, it will retrieve related Destinations from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Region.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Destination[] List of Destination objects
     */
    public function getDestinationsJoinVoyage($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = DestinationQuery::create(null, $criteria);
        $query->joinWith('Voyage', $join_behavior);

        return $this->getDestinations($query, $con);
    }

    /**
     * Clears out the collVisitables collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Region The current object (for fluent API support)
     * @see        addVisitables()
     */
    public function clearVisitables()
    {
        $this->collVisitables = null; // important to set this to null since that means it is uninitialized
        $this->collVisitablesPartial = null;

        return $this;
    }

    /**
     * reset is the collVisitables collection loaded partially
     *
     * @return void
     */
    public function resetPartialVisitables($v = true)
    {
        $this->collVisitablesPartial = $v;
    }

    /**
     * Initializes the collVisitables collection.
     *
     * By default this just sets the collVisitables collection to an empty array (like clearcollVisitables());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVisitables($overrideExisting = true)
    {
        if (null !== $this->collVisitables && !$overrideExisting) {
            return;
        }
        $this->collVisitables = new PropelObjectCollection();
        $this->collVisitables->setModel('Visitable');
    }

    /**
     * Gets an array of Visitable objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Region is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Visitable[] List of Visitable objects
     * @throws PropelException
     */
    public function getVisitables($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVisitablesPartial && !$this->isNew();
        if (null === $this->collVisitables || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVisitables) {
                // return empty collection
                $this->initVisitables();
            } else {
                $collVisitables = VisitableQuery::create(null, $criteria)
                    ->filterByRegion($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVisitablesPartial && count($collVisitables)) {
                      $this->initVisitables(false);

                      foreach($collVisitables as $obj) {
                        if (false == $this->collVisitables->contains($obj)) {
                          $this->collVisitables->append($obj);
                        }
                      }

                      $this->collVisitablesPartial = true;
                    }

                    $collVisitables->getInternalIterator()->rewind();
                    return $collVisitables;
                }

                if($partial && $this->collVisitables) {
                    foreach($this->collVisitables as $obj) {
                        if($obj->isNew()) {
                            $collVisitables[] = $obj;
                        }
                    }
                }

                $this->collVisitables = $collVisitables;
                $this->collVisitablesPartial = false;
            }
        }

        return $this->collVisitables;
    }

    /**
     * Sets a collection of Visitable objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $visitables A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Region The current object (for fluent API support)
     */
    public function setVisitables(PropelCollection $visitables, PropelPDO $con = null)
    {
        $visitablesToDelete = $this->getVisitables(new Criteria(), $con)->diff($visitables);

        $this->visitablesScheduledForDeletion = unserialize(serialize($visitablesToDelete));

        foreach ($visitablesToDelete as $visitableRemoved) {
            $visitableRemoved->setRegion(null);
        }

        $this->collVisitables = null;
        foreach ($visitables as $visitable) {
            $this->addVisitable($visitable);
        }

        $this->collVisitables = $visitables;
        $this->collVisitablesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Visitable objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Visitable objects.
     * @throws PropelException
     */
    public function countVisitables(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVisitablesPartial && !$this->isNew();
        if (null === $this->collVisitables || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVisitables) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVisitables());
            }
            $query = VisitableQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRegion($this)
                ->count($con);
        }

        return count($this->collVisitables);
    }

    /**
     * Method called to associate a Visitable object to this object
     * through the Visitable foreign key attribute.
     *
     * @param    Visitable $l Visitable
     * @return Region The current object (for fluent API support)
     */
    public function addVisitable(Visitable $l)
    {
        if ($this->collVisitables === null) {
            $this->initVisitables();
            $this->collVisitablesPartial = true;
        }
        if (!in_array($l, $this->collVisitables->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVisitable($l);
        }

        return $this;
    }

    /**
     * @param	Visitable $visitable The visitable object to add.
     */
    protected function doAddVisitable($visitable)
    {
        $this->collVisitables[]= $visitable;
        $visitable->setRegion($this);
    }

    /**
     * @param	Visitable $visitable The visitable object to remove.
     * @return Region The current object (for fluent API support)
     */
    public function removeVisitable($visitable)
    {
        if ($this->getVisitables()->contains($visitable)) {
            $this->collVisitables->remove($this->collVisitables->search($visitable));
            if (null === $this->visitablesScheduledForDeletion) {
                $this->visitablesScheduledForDeletion = clone $this->collVisitables;
                $this->visitablesScheduledForDeletion->clear();
            }
            $this->visitablesScheduledForDeletion[]= clone $visitable;
            $visitable->setRegion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Region is new, it will return
     * an empty collection; or if this Region has previously
     * been saved, it will retrieve related Visitables from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Region.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Visitable[] List of Visitable objects
     */
    public function getVisitablesJoinTypevisitable($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VisitableQuery::create(null, $criteria);
        $query->joinWith('Typevisitable', $join_behavior);

        return $this->getVisitables($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->pays_id = null;
        $this->valeur = null;
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
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collDestinations) {
                foreach ($this->collDestinations as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVisitables) {
                foreach ($this->collVisitables as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPays instanceof Persistent) {
              $this->aPays->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collDestinations instanceof PropelCollection) {
            $this->collDestinations->clearIterator();
        }
        $this->collDestinations = null;
        if ($this->collVisitables instanceof PropelCollection) {
            $this->collVisitables->clearIterator();
        }
        $this->collVisitables = null;
        $this->aPays = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RegionPeer::DEFAULT_STRING_FORMAT);
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
