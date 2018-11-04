<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20181104150518 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('INSERT INTO action_items (descr) 
            VALUES 
                ("A photograph representing the Automotive category"),
                ("A photograph representing the Baby Products category"),
                ("A photograph representing the Beauty category"),
                ("A photograph representing the Books category"),
                ("A photograph representing the Business, Industry and Science category"),
                ("A photograph representing the CDs and Vinyl category"),
                ("A photograph representing the Clothing category"),
                ("A photograph representing the Computer and Accessories category"),
                ("A photograph representing the DIY and Tools category"),
                ("A photograph representing the DVD and Blu-ray category)"
            )');


    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('ALTER TABLE action_items DROP descr');


    }
}
