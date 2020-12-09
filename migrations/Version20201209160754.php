<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201209160754 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seo ADD name VARCHAR(255) NOT NULL, ADD type SMALLINT NOT NULL, ADD author VARCHAR(255) DEFAULT NULL, ADD h1 VARCHAR(255) DEFAULT NULL, ADD description VARCHAR(255) DEFAULT NULL, ADD keywords VARCHAR(255) DEFAULT NULL, ADD og_title VARCHAR(255) DEFAULT NULL, ADD og_description VARCHAR(255) DEFAULT NULL, ADD og_image VARCHAR(255) DEFAULT NULL, ADD og_url VARCHAR(255) DEFAULT NULL, ADD og_site_name VARCHAR(255) DEFAULT NULL, ADD twitter_image_alt VARCHAR(255) DEFAULT NULL, ADD twitter_card VARCHAR(255) DEFAULT NULL, ADD twitter_site VARCHAR(255) DEFAULT NULL, ADD copyright VARCHAR(255) DEFAULT NULL, ADD document_state VARCHAR(255) DEFAULT NULL, ADD revisit VARCHAR(255) DEFAULT NULL, ADD url VARCHAR(255) DEFAULT NULL, ADD viewport VARCHAR(255) DEFAULT NULL, ADD cache_control VARCHAR(255) DEFAULT NULL, ADD expires VARCHAR(255) DEFAULT NULL, ADD content_language VARCHAR(255) DEFAULT NULL, ADD charset VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seo DROP name, DROP type, DROP author, DROP h1, DROP description, DROP keywords, DROP og_title, DROP og_description, DROP og_image, DROP og_url, DROP og_site_name, DROP twitter_image_alt, DROP twitter_card, DROP twitter_site, DROP copyright, DROP document_state, DROP revisit, DROP url, DROP viewport, DROP cache_control, DROP expires, DROP content_language, DROP charset');
    }
}
