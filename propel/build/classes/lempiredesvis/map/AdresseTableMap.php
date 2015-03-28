<?php



/**
 * This class defines the structure of the 'adresse' table.
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
class AdresseTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lempiredesvis.map.AdresseTableMap';

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
        $this->setName('adresse');
        $this->setPhpName('Adresse');
        $this->setClassname('Adresse');
        $this->setPackage('lempiredesvis');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idadresse', 'Idadresse', 'INTEGER', true, null, null);
        $this->addColumn('numerorue', 'Numerorue', 'INTEGER', false, null, null);
        $this->addColumn('rue', 'Rue', 'VARCHAR', true, 255, null);
        $this->addColumn('etage', 'Etage', 'INTEGER', false, null, null);
        $this->addColumn('codepostal', 'Codepostal', 'INTEGER', true, null, null);
        $this->addColumn('ville', 'Ville', 'VARCHAR', true, 55, null);
        $this->addColumn('typeAdresse', 'Typeadresse', 'VARCHAR', true, 24, null);
        $this->addForeignKey('idclient', 'Idclient', 'INTEGER', 'client', 'idclient', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Client', 'Client', RelationMap::MANY_TO_ONE, array('idclient' => 'idclient', ), null, null);
    } // buildRelations()

} // AdresseTableMap
