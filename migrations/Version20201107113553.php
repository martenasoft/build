<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201107113553 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE config (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type SMALLINT NOT NULL, url_path_type SMALLINT NOT NULL, is_default TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_D48A2F7C5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, config_id INT DEFAULT NULL, name VARCHAR(65) NOT NULL, lft INT NOT NULL, rgt INT NOT NULL, lvl INT NOT NULL, tree INT NOT NULL, parent_id INT NOT NULL, descriptions LONGTEXT DEFAULT NULL, INDEX IDX_7D053A9324DB0683 (config_id), INDEX id_lft_rgt (id, lft, rgt), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A9324DB0683 FOREIGN KEY (config_id) REFERENCES config (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A9324DB0683');
        $this->addSql('DROP TABLE config');
        $this->addSql('DROP TABLE menu');
    }
}
