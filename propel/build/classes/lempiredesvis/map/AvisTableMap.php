<?php



/**
 * This class defines the structure of the 'avis' table.
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
class AvisTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lempiredesvis.map.AvisTableMap';

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
        $this->setName('avis');
        $this->setPhpName('Avis');
        $this->setClassname('Avis');
        $this->setPackage('lempiredesvis');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idavis', 'Idavis', 'INTEGER', true, null, null);
        $this->addColumn('redacteur', 'Redacteur', 'VARCHAR', true, 55, null);
        $this->addColumn('note', 'Note', 'DOUBLE', true, null, null);
        $this->addColumn('descriptionavis', 'Descriptionavis', 'VARCHAR', false, 2024, null);
        $this->addForeignKey('idarticle', 'Idarticle', 'INTEGER', 'article', 'idarticle', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Article', 'Article', RelationMap::MANY_TO_ONE, array('idarticle' => 'idarticle', ), null, null);
    } // buildRelations()

} // AvisTableMap
