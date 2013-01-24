<?php

namespace CarnetVoyage\MapBundle\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelException;
use \PropelPDO;
use CarnetVoyage\MapBundle\Model\Destination;
use CarnetVoyage\MapBundle\Model\DestinationQuery;
use CarnetVoyage\MapBundle\Model\Visitable;
use CarnetVoyage\MapBundle\Model\VisitableQuery;
use CarnetVoyage\MapBundle\Model\Visite;
use CarnetVoyage\MapBundle\Model\VisitePeer;
use CarnetVoyage\MapBundle\Model\VisiteQuery;

/**
 * Base class that represents a row from the 'Visite' table.
 *
 *
 *
 * @package    propel.generator.src.CarnetVoyage.MapBundle.Model.om
 */
abstract class BaseVisite extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CarnetVoyage\\MapBundle\\Model\\VisitePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        VisitePeer
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
     * The value for the destination_id field.
     * @var        int
     */
    protected $destination_id;

    /**
     * The value for the visitable_id field.
     * @var        int
     */
    protected $visitable_id;

    /**
     * The value for the commentaire field.
     * @var        string
     */
    protected $commentaire;

    /**
     * @var        Destination
     */
    protected $aDestination;

    /**
     * @var        Visitable
     */
    protected $aVisitable;

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
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [destination_id] column value.
     *
     * @return int
     */
    public function getDestinationId()
    {
        return $this->destination_id;
    }

    /**
     * Get the [visitable_id] column value.
     *
     * @return int
     */
    public function getVisitableId()
    {
        return $this->visitable_id;
    }

    /**
     * Get the [commentaire] column value.
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return Visite The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = VisitePeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [destination_id] column.
     *
     * @param int $v new value
     * @return Visite The current object (for fluent API support)
     */
    public function setDestinationId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->destination_id !== $v) {
            $this->destination_id = $v;
            $this->modifiedColumns[] = VisitePeer::DESTINATION_ID;
        }

        if ($this->aDestination !== null && $this->aDestination->getId() !== $v) {
            $this->aDestination = null;
        }


        return $this;
    } // setDestinationId()

    /**
     * Set the value of [visitable_id] column.
     *
     * @param int $v new value
     * @return Visite The current object (for fluent API support)
     */
    public function setVisitableId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->visitable_id !== $v) {
            $this->visitable_id = $v;
            $this->modifiedColumns[] = VisitePeer::VISITABLE_ID;
        }

        if ($this->aVisitable !== null && $this->aVisitable->getId() !== $v) {
            $this->aVisitable = null;
        }


        return $this;
    } // setVisitableId()

    /**
     * Set the value of [commentaire] column.
     *
     * @param string $v new value
     * @return Visite The current object (for fluent API support)
     */
    public function setCommentaire($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->commentaire !== $v) {
            $this->commentaire = $v;
            $this->modifiedColumns[] = VisitePeer::COMMENTAIRE;
        }


        return $this;
    } // setCommentaire()

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
            $this->destination_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->visitable_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->commentaire = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 4; // 4 = VisitePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Visite object", $e);
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

        if ($this->aDestination !== null && $this->destination_id !== $this->aDestination->getId()) {
            $this->aDestination = null;
        }
        if ($this->aVisitable !== null && $this->visitable_id !== $this->aVisitable->getId()) {
            $this->aVisitable = null;
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
            $con = Propel::getConnection(VisitePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = VisitePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aDestination = null;
            $this->aVisitable = null;
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
            $con = Propel::getConnection(VisitePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = VisiteQuery::create()
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
            $con = Propel::getConnection(VisitePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                VisitePeer::addInstanceToPool($this);
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

            if ($this->aDestination !== null) {
                if ($this->aDestination->isModified() || $this->aDestination->isNew()) {
                    $affectedRows += $this->aDestination->save($con);
                }
                $this->setDestination($this->aDestination);
            }

            if ($this->aVisitable !== null) {
                if ($this->aVisitable->isModified() || $this->aVisitable->isNew()) {
                    $affectedRows += $this->aVisitable->save($con);
                }
                $this->setVisitable($this->aVisitable);
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

        $this->modifiedColumns[] = VisitePeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . VisitePeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(VisitePeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(VisitePeer::DESTINATION_ID)) {
            $modifiedColumns[':p' . $index++]  = '`destination_id`';
        }
        if ($this->isColumnModified(VisitePeer::VISITABLE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`visitable_id`';
        }
        if ($this->isColumnModified(VisitePeer::COMMENTAIRE)) {
            $modifiedColumns[':p' . $index++]  = '`commentaire`';
        }

        $sql = sprintf(
            'INSERT INTO `Visite` (%s) VALUES (%s)',
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
                    case '`destination_id`':
                        $stmt->bindValue($identifier, $this->destination_id, PDO::PARAM_INT);
                        break;
                    case '`visitable_id`':
                        $stmt->bindValue($identifier, $this->visitable_id, PDO::PARAM_INT);
                        break;
                    case '`commentaire`':
                        $stmt->bindValue($identifier, $this->commentaire, PDO::PARAM_STR);
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
        $this->setId($pk);

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

            if ($this->aDestination !== null) {
                if (!$this->aDestination->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aDestination->getValidationFailures());
                }
            }

            if ($this->aVisitable !== null) {
                if (!$this->aVisitable->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aVisitable->getValidationFailures());
                }
            }


            if (($retval = VisitePeer::doValidate($this, $columns)) !== true) {
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
        $pos = VisitePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDestinationId();
                break;
            case 2:
                return $this->getVisitableId();
                break;
            case 3:
                return $this->getCommentaire();
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
        if (isset($alreadyDumpedObjects['Visite'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Visite'][$this->getPrimaryKey()] = true;
        $keys = VisitePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getDestinationId(),
            $keys[2] => $this->getVisitableId(),
            $keys[3] => $this->getCommentaire(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aDestination) {
                $result['Destination'] = $this->aDestination->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aVisitable) {
                $result['Visitable'] = $this->aVisitable->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = VisitePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDestinationId($value);
                break;
            case 2:
                $this->setVisitableId($value);
                break;
            case 3:
                $this->setCommentaire($value);
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
        $keys = VisitePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDestinationId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setVisitableId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCommentaire($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(VisitePeer::DATABASE_NAME);

        if ($this->isColumnModified(VisitePeer::ID)) $criteria->add(VisitePeer::ID, $this->id);
        if ($this->isColumnModified(VisitePeer::DESTINATION_ID)) $criteria->add(VisitePeer::DESTINATION_ID, $this->destination_id);
        if ($this->isColumnModified(VisitePeer::VISITABLE_ID)) $criteria->add(VisitePeer::VISITABLE_ID, $this->visitable_id);
        if ($this->isColumnModified(VisitePeer::COMMENTAIRE)) $criteria->add(VisitePeer::COMMENTAIRE, $this->commentaire);

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
        $criteria = new Criteria(VisitePeer::DATABASE_NAME);
        $criteria->add(VisitePeer::ID, $this->id);

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
     * @param object $copyObj An object of Visite (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDestinationId($this->getDestinationId());
        $copyObj->setVisitableId($this->getVisitableId());
        $copyObj->setCommentaire($this->getCommentaire());

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
     * @return Visite Clone of current object.
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
     * @return VisitePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new VisitePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Destination object.
     *
     * @param             Destination $v
     * @return Visite The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDestination(Destination $v = null)
    {
        if ($v === null) {
            $this->setDestinationId(NULL);
        } else {
            $this->setDestinationId($v->getId());
        }

        $this->aDestination = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Destination object, it will not be re-added.
        if ($v !== null) {
            $v->addVisite($this);
        }


        return $this;
    }


    /**
     * Get the associated Destination object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Destination The associated Destination object.
     * @throws PropelException
     */
    public function getDestination(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aDestination === null && ($this->destination_id !== null) && $doQuery) {
            $this->aDestination = DestinationQuery::create()->findPk($this->destination_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDestination->addVisites($this);
             */
        }

        return $this->aDestination;
    }

    /**
     * Declares an association between this object and a Visitable object.
     *
     * @param             Visitable $v
     * @return Visite The current object (for fluent API support)
     * @throws PropelException
     */
    public function setVisitable(Visitable $v = null)
    {
        if ($v === null) {
            $this->setVisitableId(NULL);
        } else {
            $this->setVisitableId($v->getId());
        }

        $this->aVisitable = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Visitable object, it will not be re-added.
        if ($v !== null) {
            $v->addVisite($this);
        }


        return $this;
    }


    /**
     * Get the associated Visitable object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Visitable The associated Visitable object.
     * @throws PropelException
     */
    public function getVisitable(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aVisitable === null && ($this->visitable_id !== null) && $doQuery) {
            $this->aVisitable = VisitableQuery::create()->findPk($this->visitable_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aVisitable->addVisites($this);
             */
        }

        return $this->aVisitable;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->destination_id = null;
        $this->visitable_id = null;
        $this->commentaire = null;
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
            if ($this->aDestination instanceof Persistent) {
              $this->aDestination->clearAllReferences($deep);
            }
            if ($this->aVisitable instanceof Persistent) {
              $this->aVisitable->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aDestination = null;
        $this->aVisitable = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(VisitePeer::DEFAULT_STRING_FORMAT);
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