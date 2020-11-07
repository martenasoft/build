<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201106134237 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE config ADD is_default TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE menu ADD config_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A9324DB0683 FOREIGN KEY (config_id) REFERENCES config (id)');
        $this->addSql('CREATE INDEX IDX_7D053A9324DB0683 ON menu (config_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE config DROP is_default');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A9324DB0683');
        $this->addSql('DROP INDEX IDX_7D053A9324DB0683 ON menu');
        $this->addSql('ALTER TABLE menu DROP config_id');
    }
}
