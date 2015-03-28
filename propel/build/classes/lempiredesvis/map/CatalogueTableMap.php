<?php



/**
 * This class defines the structure of the 'catalogue' table.
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
class CatalogueTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lempiredesvis.map.CatalogueTableMap';

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
        $this->setName('catalogue');
        $this->setPhpName('Catalogue');
        $this->setClassname('Catalogue');
        $this->setPackage('lempiredesvis');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('idarticle', 'Idarticle', 'INTEGER' , 'article', 'idarticle', true, null, null);
        $this->addForeignPrimaryKey('idcategorie', 'Idcategorie', 'INTEGER' , 'categorie', 'idcategorie', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Categorie', 'Categorie', RelationMap::MANY_TO_ONE, array('idcategorie' => 'idcategorie', ), null, null);
        $this->addRelation('Article', 'Article', RelationMap::MANY_TO_ONE, array('idarticle' => 'idarticle', ), null, null);
    } // buildRelations()

} // CatalogueTableMap
