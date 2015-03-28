<?php



/**
 * This class defines the structure of the 'applicationpromotion' table.
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
class ApplicationpromotionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lempiredesvis.map.ApplicationpromotionTableMap';

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
        $this->setName('applicationpromotion');
        $this->setPhpName('Applicationpromotion');
        $this->setClassname('Applicationpromotion');
        $this->setPackage('lempiredesvis');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('idpromo', 'Idpromo', 'INTEGER' , 'promotion', 'idpromo', true, null, null);
        $this->addForeignPrimaryKey('idarticle', 'Idarticle', 'INTEGER' , 'article', 'idarticle', true, null, null);
        $this->addColumn('qqtearticlepromo', 'Qqtearticlepromo', 'INTEGER', false, null, null);
        $this->addColumn('prixpromo', 'Prixpromo', 'DOUBLE', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Promotion', 'Promotion', RelationMap::MANY_TO_ONE, array('idpromo' => 'idpromo', ), null, null);
        $this->addRelation('Article', 'Article', RelationMap::MANY_TO_ONE, array('idarticle' => 'idarticle', ), null, null);
    } // buildRelations()

} // ApplicationpromotionTableMap
