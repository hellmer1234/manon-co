<?php



/**
 * This class defines the structure of the 'tauxtva' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lempiredesvis.map
 */
class TauxtvaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lempiredesvis.map.TauxtvaTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('tauxtva');
        $this->setPhpName('Tauxtva');
        $this->setClassname('Tauxtva');
        $this->setPackage('lempiredesvis');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idtaux', 'Idtaux', 'INTEGER', true, null, null);
        $this->addColumn('libelletaux', 'Libelletaux', 'VARCHAR', false, 255, null);
        $this->addColumn('tauxtva', 'Tauxtva', 'DOUBLE', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Article', 'Article', RelationMap::ONE_TO_MANY, array('idtaux' => 'idtaux', ), null, null, 'Articles');
    } // buildRelations()

} // TauxtvaTableMap
