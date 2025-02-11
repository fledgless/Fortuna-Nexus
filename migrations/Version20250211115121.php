<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250211115121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ornament_set (id INT AUTO_INCREMENT NOT NULL, set_name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, set_filename VARCHAR(255) DEFAULT NULL, set_bonus LONGTEXT DEFAULT NULL, planar_sphere_name VARCHAR(255) DEFAULT NULL, planar_sphere_filename VARCHAR(255) DEFAULT NULL, planar_sphere_desc LONGTEXT DEFAULT NULL, planar_sphere_lore LONGTEXT DEFAULT NULL, link_rope_name VARCHAR(255) DEFAULT NULL, link_rope_filename VARCHAR(255) DEFAULT NULL, link_rope_desc LONGTEXT DEFAULT NULL, link_rope_lore LONGTEXT DEFAULT NULL, announced TINYINT(1) NOT NULL, released TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE relic_set (id INT AUTO_INCREMENT NOT NULL, set_name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, set_filename VARCHAR(255) DEFAULT NULL, two_piece_desc LONGTEXT DEFAULT NULL, four_piece_desc LONGTEXT DEFAULT NULL, head_name VARCHAR(255) DEFAULT NULL, head_filename VARCHAR(255) DEFAULT NULL, head_desc LONGTEXT DEFAULT NULL, head_lore LONGTEXT DEFAULT NULL, hand_name VARCHAR(255) DEFAULT NULL, hand_filename VARCHAR(255) DEFAULT NULL, hand_desc LONGTEXT DEFAULT NULL, hand_lore LONGTEXT DEFAULT NULL, body_name VARCHAR(255) DEFAULT NULL, body_filename VARCHAR(255) DEFAULT NULL, body_desc LONGTEXT DEFAULT NULL, body_lore LONGTEXT DEFAULT NULL, feet_name VARCHAR(255) DEFAULT NULL, feet_filename VARCHAR(255) DEFAULT NULL, feet_desc LONGTEXT DEFAULT NULL, feet_lore LONGTEXT DEFAULT NULL, announced TINYINT(1) NOT NULL, released TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `character` CHANGE release_dare release_date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE character_skill ADD character_eidolon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE character_skill ADD CONSTRAINT FK_A0FE03159AFA08D9 FOREIGN KEY (character_eidolon_id) REFERENCES character_eidolon (id)');
        $this->addSql('CREATE INDEX IDX_A0FE03159AFA08D9 ON character_skill (character_eidolon_id)');
        $this->addSql('ALTER TABLE memosprite_skill ADD character_eidolon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE memosprite_skill ADD CONSTRAINT FK_8474B9379AFA08D9 FOREIGN KEY (character_eidolon_id) REFERENCES character_eidolon (id)');
        $this->addSql('CREATE INDEX IDX_8474B9379AFA08D9 ON memosprite_skill (character_eidolon_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ornament_set');
        $this->addSql('DROP TABLE relic_set');
        $this->addSql('ALTER TABLE `character` CHANGE release_date release_dare DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE character_skill DROP FOREIGN KEY FK_A0FE03159AFA08D9');
        $this->addSql('DROP INDEX IDX_A0FE03159AFA08D9 ON character_skill');
        $this->addSql('ALTER TABLE character_skill DROP character_eidolon_id');
        $this->addSql('ALTER TABLE memosprite_skill DROP FOREIGN KEY FK_8474B9379AFA08D9');
        $this->addSql('DROP INDEX IDX_8474B9379AFA08D9 ON memosprite_skill');
        $this->addSql('ALTER TABLE memosprite_skill DROP character_eidolon_id');
    }
}
