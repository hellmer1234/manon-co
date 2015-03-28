<?php



/**
 * This class defines the structure of the 'article' table.
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
class ArticleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lempiredesvis.map.ArticleTableMap';

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
        $this->setName('article');
        $this->setPhpName('Article');
        $this->setClassname('Article');
        $this->setPackage('lempiredesvis');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idarticle', 'Idarticle', 'INTEGER', true, null, null);
        $this->addColumn('referencearticle', 'Referencearticle', 'VARCHAR', true, 55, null);
        $this->addColumn('libellearticle', 'Libellearticle', 'VARCHAR', true, 255, null);
        $this->addColumn('descriptionarticle', 'Descriptionarticle', 'VARCHAR', false, 2024, null);
        $this->addColumn('prixht', 'Prixht', 'DOUBLE', true, null, null);
        $this->addColumn('qqtestock', 'Qqtestock', 'INTEGER', true, null, null);
        $this->addColumn('dateajout', 'Dateajout', 'DATE', true, null, null);
        $this->addForeignKey('idtaux', 'Idtaux', 'DOUBLE', 'tauxtva', 'idtaux', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Tauxtva', 'Tauxtva', RelationMap::MANY_TO_ONE, array('idtaux' => 'idtaux', ), null, null);
        $this->addRelation('Avis', 'Avis', RelationMap::ONE_TO_MANY, array('idarticle' => 'idarticle', ), null, null, 'Aviss');
        $this->addRelation('Applicationpromotion', 'Applicationpromotion', RelationMap::ONE_TO_MANY, array('idarticle' => 'idarticle', ), null, null, 'Applicationpromotions');
        $this->addRelation('Catalogue', 'Catalogue', RelationMap::ONE_TO_MANY, array('idarticle' => 'idarticle', ), null, null, 'Catalogues');
        $this->addRelation('Panier', 'Panier', RelationMap::ONE_TO_MANY, array('idarticle' => 'idarticle', ), null, null, 'Paniers');
    } // buildRelations()

} // ArticleTableMap
