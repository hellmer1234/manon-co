<?php



/**
 * This class defines the structure of the 'panier' table.
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
class PanierTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lempiredesvis.map.PanierTableMap';

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
        $this->setName('panier');
        $this->setPhpName('Panier');
        $this->setClassname('Panier');
        $this->setPackage('lempiredesvis');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('idarticle', 'Idarticle', 'INTEGER' , 'article', 'idarticle', true, null, null);
        $this->addForeignPrimaryKey('idcommande', 'Idcommande', 'INTEGER' , 'commande', 'idcommande', true, null, null);
        $this->addColumn('quantite', 'Quantite', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Article', 'Article', RelationMap::MANY_TO_ONE, array('idarticle' => 'idarticle', ), null, null);
        $this->addRelation('Commande', 'Commande', RelationMap::MANY_TO_ONE, array('idcommande' => 'idcommande', ), null, null);
    } // buildRelations()

} // PanierTableMap
