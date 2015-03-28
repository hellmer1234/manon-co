<?php



/**
 * This class defines the structure of the 'commande' table.
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
class CommandeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lempiredesvis.map.CommandeTableMap';

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
        $this->setName('commande');
        $this->setPhpName('Commande');
        $this->setClassname('Commande');
        $this->setPackage('lempiredesvis');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idcommande', 'Idcommande', 'INTEGER', true, null, null);
        $this->addColumn('etatcommande', 'Etatcommande', 'VARCHAR', true, 24, null);
        $this->addForeignKey('idclient', 'Idclient', 'INTEGER', 'client', 'idclient', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Client', 'Client', RelationMap::MANY_TO_ONE, array('idclient' => 'idclient', ), null, null);
        $this->addRelation('Panier', 'Panier', RelationMap::ONE_TO_MANY, array('idcommande' => 'idcommande', ), null, null, 'Paniers');
    } // buildRelations()

} // CommandeTableMap
