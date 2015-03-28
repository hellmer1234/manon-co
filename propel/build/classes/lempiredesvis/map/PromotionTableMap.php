<?php



/**
 * This class defines the structure of the 'promotion' table.
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
class PromotionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lempiredesvis.map.PromotionTableMap';

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
        $this->setName('promotion');
        $this->setPhpName('Promotion');
        $this->setClassname('Promotion');
        $this->setPackage('lempiredesvis');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idpromo', 'Idpromo', 'INTEGER', true, null, null);
        $this->addColumn('titrepromo', 'Titrepromo', 'VARCHAR', true, 255, null);
        $this->addColumn('datedebut', 'Datedebut', 'DATE', true, null, null);
        $this->addColumn('datefin', 'Datefin', 'DATE', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Applicationpromotion', 'Applicationpromotion', RelationMap::ONE_TO_MANY, array('idpromo' => 'idpromo', ), null, null, 'Applicationpromotions');
    } // buildRelations()

} // PromotionTableMap
