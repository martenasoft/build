<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201208163400 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE crud (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE crud_config (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD seo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6697E3DD86 FOREIGN KEY (seo_id) REFERENCES seo (id)');
        $this->addSql('CREATE INDEX IDX_23A0E6697E3DD86 ON article (seo_id)');
        $this->addSql('ALTER TABLE menu ADD type SMALLINT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE crud');
        $this->addSql('DROP TABLE crud_config');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6697E3DD86');
        $this->addSql('DROP INDEX IDX_23A0E6697E3DD86 ON article');
        $this->addSql('ALTER TABLE article DROP seo_id');
        $this->addSql('ALTER TABLE menu DROP type');
    }
}
