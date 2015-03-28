<?php



/**
 * This class defines the structure of the 'client' table.
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
class ClientTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lempiredesvis.map.ClientTableMap';

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
        $this->setName('client');
        $this->setPhpName('Client');
        $this->setClassname('Client');
        $this->setPackage('lempiredesvis');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idclient', 'Idclient', 'INTEGER', true, null, null);
        $this->addColumn('login', 'Login', 'VARCHAR', true, 55, null);
        $this->addColumn('mdp', 'Mdp', 'VARCHAR', true, 24, null);
        $this->addColumn('nom', 'Nom', 'VARCHAR', true, 24, null);
        $this->addColumn('prenom', 'Prenom', 'VARCHAR', true, 24, null);
        $this->addColumn('numtelephone', 'Numtelephone', 'VARCHAR', false, 10, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Adresse', 'Adresse', RelationMap::ONE_TO_MANY, array('idclient' => 'idclient', ), null, null, 'Adresses');
        $this->addRelation('Commande', 'Commande', RelationMap::ONE_TO_MANY, array('idclient' => 'idclient', ), null, null, 'Commandes');
    } // buildRelations()

} // ClientTableMap
