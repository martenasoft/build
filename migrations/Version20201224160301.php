<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201224160301 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, media_config VARCHAR(255) DEFAULT NULL, files VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_config (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, sdn_url VARCHAR(255) DEFAULT NULL, sdn_url_for_dev VARCHAR(255) DEFAULT NULL, root_dir VARCHAR(255) DEFAULT NULL, site_dir VARCHAR(255) DEFAULT NULL, real_size_dir_name VARCHAR(255) DEFAULT NULL, big_size_dir_name VARCHAR(255) DEFAULT NULL, middle_size_dir_name VARCHAR(255) DEFAULT NULL, small_size_dir_name VARCHAR(255) DEFAULT NULL, big_size_width INT DEFAULT NULL, big_size_height INT DEFAULT NULL, middle_size_width INT DEFAULT NULL, middle_size_height INT DEFAULT NULL, small_size_width INT DEFAULT NULL, small_size_height INT DEFAULT NULL, real_size_watermark_dir_name VARCHAR(255) DEFAULT NULL, big_size_watermark_dir_name VARCHAR(255) DEFAULT NULL, middle_size_watermark_dir_name VARCHAR(255) DEFAULT NULL, small_size_watermark_dir_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_files (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE media_config');
        $this->addSql('DROP TABLE media_files');
    }
}
