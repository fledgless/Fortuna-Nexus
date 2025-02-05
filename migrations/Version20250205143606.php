<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250205143606 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE echo_of_war_drop (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, released TINYINT(1) NOT NULL, announced TINYINT(1) NOT NULL, filename VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enemy_drops (id INT AUTO_INCREMENT NOT NULL, four_star_name VARCHAR(255) NOT NULL, four_star_filename VARCHAR(255) DEFAULT NULL, three_star_name VARCHAR(255) NOT NULL, three_star_filename VARCHAR(255) DEFAULT NULL, two_star_name VARCHAR(255) NOT NULL, two_star_filename VARCHAR(255) DEFAULT NULL, released TINYINT(1) NOT NULL, announced TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE light_cone (id INT AUTO_INCREMENT NOT NULL, path_id INT DEFAULT NULL, release_version_id INT NOT NULL, enemy_drops_id INT DEFAULT NULL, path_materials_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, rarity VARCHAR(255) NOT NULL, base_hp DOUBLE PRECISION DEFAULT NULL, base_atk DOUBLE PRECISION DEFAULT NULL, base_def DOUBLE PRECISION DEFAULT NULL, story LONGTEXT DEFAULT NULL, superimposition_one LONGTEXT DEFAULT NULL, superimposition_two LONGTEXT DEFAULT NULL, superimposition_three LONGTEXT DEFAULT NULL, superimposition_four LONGTEXT DEFAULT NULL, superimposition_five LONGTEXT DEFAULT NULL, skill_name VARCHAR(255) DEFAULT NULL, announced TINYINT(1) NOT NULL, released TINYINT(1) NOT NULL, obtainable JSON DEFAULT NULL, icon_filename VARCHAR(255) DEFAULT NULL, splash_filename VARCHAR(255) DEFAULT NULL, full_art_filename VARCHAR(255) DEFAULT NULL, INDEX IDX_3CA80094D96C566B (path_id), INDEX IDX_3CA80094265B2DBF (release_version_id), INDEX IDX_3CA800946E7A8FEC (enemy_drops_id), INDEX IDX_3CA800946666E063 (path_materials_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE path_materials (id INT AUTO_INCREMENT NOT NULL, path_id INT DEFAULT NULL, four_star_name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, four_star_filename VARCHAR(255) DEFAULT NULL, three_star_name VARCHAR(255) NOT NULL, three_star_filename VARCHAR(255) DEFAULT NULL, two_star_name VARCHAR(255) NOT NULL, two_star_filename VARCHAR(255) DEFAULT NULL, released TINYINT(1) NOT NULL, announced TINYINT(1) NOT NULL, INDEX IDX_10EBDB71D96C566B (path_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stagnant_shadow_drop (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, released TINYINT(1) NOT NULL, announced TINYINT(1) NOT NULL, filename VARCHAR(255) DEFAULT NULL, INDEX IDX_E96503FC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE light_cone ADD CONSTRAINT FK_3CA80094D96C566B FOREIGN KEY (path_id) REFERENCES path (id)');
        $this->addSql('ALTER TABLE light_cone ADD CONSTRAINT FK_3CA80094265B2DBF FOREIGN KEY (release_version_id) REFERENCES version (id)');
        $this->addSql('ALTER TABLE light_cone ADD CONSTRAINT FK_3CA800946E7A8FEC FOREIGN KEY (enemy_drops_id) REFERENCES enemy_drops (id)');
        $this->addSql('ALTER TABLE light_cone ADD CONSTRAINT FK_3CA800946666E063 FOREIGN KEY (path_materials_id) REFERENCES path_materials (id)');
        $this->addSql('ALTER TABLE path_materials ADD CONSTRAINT FK_10EBDB71D96C566B FOREIGN KEY (path_id) REFERENCES path (id)');
        $this->addSql('ALTER TABLE stagnant_shadow_drop ADD CONSTRAINT FK_E96503FC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE `character` ADD enemy_drops_id INT DEFAULT NULL, ADD stagnant_shadow_drop_id INT DEFAULT NULL, ADD path_materials_id INT DEFAULT NULL, ADD echo_of_war_drop_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0346E7A8FEC FOREIGN KEY (enemy_drops_id) REFERENCES enemy_drops (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034EAA10CB6 FOREIGN KEY (stagnant_shadow_drop_id) REFERENCES stagnant_shadow_drop (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0346666E063 FOREIGN KEY (path_materials_id) REFERENCES path_materials (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0342B9D5F61 FOREIGN KEY (echo_of_war_drop_id) REFERENCES echo_of_war_drop (id)');
        $this->addSql('CREATE INDEX IDX_937AB0346E7A8FEC ON `character` (enemy_drops_id)');
        $this->addSql('CREATE INDEX IDX_937AB034EAA10CB6 ON `character` (stagnant_shadow_drop_id)');
        $this->addSql('CREATE INDEX IDX_937AB0346666E063 ON `character` (path_materials_id)');
        $this->addSql('CREATE INDEX IDX_937AB0342B9D5F61 ON `character` (echo_of_war_drop_id)');
        $this->addSql('ALTER TABLE type ADD debuff_effect LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE version ADD start_date DATETIME DEFAULT NULL, ADD end_date DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB0342B9D5F61');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB0346E7A8FEC');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB0346666E063');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034EAA10CB6');
        $this->addSql('ALTER TABLE light_cone DROP FOREIGN KEY FK_3CA80094D96C566B');
        $this->addSql('ALTER TABLE light_cone DROP FOREIGN KEY FK_3CA80094265B2DBF');
        $this->addSql('ALTER TABLE light_cone DROP FOREIGN KEY FK_3CA800946E7A8FEC');
        $this->addSql('ALTER TABLE light_cone DROP FOREIGN KEY FK_3CA800946666E063');
        $this->addSql('ALTER TABLE path_materials DROP FOREIGN KEY FK_10EBDB71D96C566B');
        $this->addSql('ALTER TABLE stagnant_shadow_drop DROP FOREIGN KEY FK_E96503FC54C8C93');
        $this->addSql('DROP TABLE echo_of_war_drop');
        $this->addSql('DROP TABLE enemy_drops');
        $this->addSql('DROP TABLE light_cone');
        $this->addSql('DROP TABLE path_materials');
        $this->addSql('DROP TABLE stagnant_shadow_drop');
        $this->addSql('DROP INDEX IDX_937AB0346E7A8FEC ON `character`');
        $this->addSql('DROP INDEX IDX_937AB034EAA10CB6 ON `character`');
        $this->addSql('DROP INDEX IDX_937AB0346666E063 ON `character`');
        $this->addSql('DROP INDEX IDX_937AB0342B9D5F61 ON `character`');
        $this->addSql('ALTER TABLE `character` DROP enemy_drops_id, DROP stagnant_shadow_drop_id, DROP path_materials_id, DROP echo_of_war_drop_id');
        $this->addSql('ALTER TABLE type DROP debuff_effect');
        $this->addSql('ALTER TABLE version DROP start_date, DROP end_date');
    }
}
