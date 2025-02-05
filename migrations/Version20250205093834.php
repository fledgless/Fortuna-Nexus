<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250205093834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, path_id INT NOT NULL, type_id INT NOT NULL, release_version_id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, rarity VARCHAR(255) NOT NULL, icon_filename VARCHAR(255) DEFAULT NULL, splash_filename VARCHAR(255) DEFAULT NULL, miniature_filename VARCHAR(255) DEFAULT NULL, released TINYINT(1) NOT NULL, announced TINYINT(1) NOT NULL, release_dare DATE DEFAULT NULL, INDEX IDX_937AB034D96C566B (path_id), INDEX IDX_937AB034C54C8C93 (type_id), INDEX IDX_937AB034265B2DBF (release_version_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_eidolon (id INT AUTO_INCREMENT NOT NULL, character_kit_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, number INT NOT NULL, description LONGTEXT DEFAULT NULL, pull_worth VARCHAR(255) DEFAULT NULL, recommendation LONGTEXT DEFAULT NULL, filename VARCHAR(255) DEFAULT NULL, INDEX IDX_4E95D3899CCA37C (character_kit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_kit (id INT AUTO_INCREMENT NOT NULL, character_name_id INT NOT NULL, base_hp DOUBLE PRECISION DEFAULT NULL, base_atk DOUBLE PRECISION DEFAULT NULL, base_def DOUBLE PRECISION DEFAULT NULL, base_spd DOUBLE PRECISION DEFAULT NULL, main_trace_one_name VARCHAR(255) DEFAULT NULL, main_trace_one_desc LONGTEXT DEFAULT NULL, main_trace_one_filename VARCHAR(255) DEFAULT NULL, main_trace_two_name VARCHAR(255) DEFAULT NULL, main_trace_two_desc LONGTEXT DEFAULT NULL, main_trace_two_filename VARCHAR(255) DEFAULT NULL, main_trace_three_name VARCHAR(255) DEFAULT NULL, main_trace_three_desc LONGTEXT DEFAULT NULL, main_trace_three_filename VARCHAR(255) DEFAULT NULL, stat_one_value DOUBLE PRECISION DEFAULT NULL, stat_two_value DOUBLE PRECISION DEFAULT NULL, stat_three_value DOUBLE PRECISION DEFAULT NULL, level_one_trace VARCHAR(255) DEFAULT NULL, ascension_two_trace VARCHAR(255) DEFAULT NULL, ascension_three_trace_one VARCHAR(255) DEFAULT NULL, ascension_three_trace_two VARCHAR(255) DEFAULT NULL, ascension_four_trace VARCHAR(255) DEFAULT NULL, ascension_five_trace_one VARCHAR(255) DEFAULT NULL, ascension_five_trace_two VARCHAR(255) DEFAULT NULL, ascension_six_trace VARCHAR(255) DEFAULT NULL, level_seventy_five_trace VARCHAR(255) DEFAULT NULL, level_eighty_trace VARCHAR(255) DEFAULT NULL, technique_name VARCHAR(255) DEFAULT NULL, technique_desc LONGTEXT DEFAULT NULL, technique_filename VARCHAR(255) DEFAULT NULL, leaked_content TINYINT(1) NOT NULL, beta_version INT DEFAULT NULL, UNIQUE INDEX UNIQ_133E438618B21CEB (character_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_kit_stat (character_kit_id INT NOT NULL, stat_id INT NOT NULL, INDEX IDX_8580B4D399CCA37C (character_kit_id), INDEX IDX_8580B4D39502F0B (stat_id), PRIMARY KEY(character_kit_id, stat_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_media (id INT AUTO_INCREMENT NOT NULL, character_name_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, medium_type VARCHAR(255) NOT NULL, video_link VARCHAR(255) DEFAULT NULL, image_filename VARCHAR(255) DEFAULT NULL, post_link VARCHAR(255) DEFAULT NULL, INDEX IDX_94EF466E18B21CEB (character_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_skill (id INT AUTO_INCREMENT NOT NULL, character_kit_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, tag VARCHAR(255) NOT NULL, energy_gain INT DEFAULT NULL, energy_cost INT DEFAULT NULL, break_main_target INT DEFAULT NULL, break_adjacent_targets INT DEFAULT NULL, enhanced TINYINT(1) NOT NULL, desc_level_one LONGTEXT DEFAULT NULL, desc_level_two LONGTEXT DEFAULT NULL, desc_level_three LONGTEXT DEFAULT NULL, desc_level_four LONGTEXT DEFAULT NULL, desc_level_five LONGTEXT DEFAULT NULL, desc_level_six LONGTEXT DEFAULT NULL, desc_level_seven LONGTEXT DEFAULT NULL, desc_level_eight LONGTEXT DEFAULT NULL, desc_level_nine LONGTEXT DEFAULT NULL, desc_level_ten LONGTEXT DEFAULT NULL, desc_level_eleven LONGTEXT DEFAULT NULL, desc_level_twelve LONGTEXT DEFAULT NULL, filename VARCHAR(255) DEFAULT NULL, INDEX IDX_A0FE031599CCA37C (character_kit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_stories (id INT AUTO_INCREMENT NOT NULL, character_name_id INT NOT NULL, character_details LONGTEXT DEFAULT NULL, character_story_part_one LONGTEXT DEFAULT NULL, character_story_part_two LONGTEXT DEFAULT NULL, character_story_part_three LONGTEXT DEFAULT NULL, character_story_part_four LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_F52E1D6218B21CEB (character_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_voiceline (id INT AUTO_INCREMENT NOT NULL, character_name_id INT NOT NULL, name VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, category VARCHAR(255) DEFAULT NULL, INDEX IDX_DAE759C818B21CEB (character_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE memosprite (id INT AUTO_INCREMENT NOT NULL, memomaster_id INT NOT NULL, name VARCHAR(255) NOT NULL, filename VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_63A88406B84CACC7 (memomaster_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE memosprite_skill (id INT AUTO_INCREMENT NOT NULL, memosprite_id INT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, tag VARCHAR(255) NOT NULL, energy_gain INT DEFAULT NULL, break_main_target INT DEFAULT NULL, break_adjacent_targets INT DEFAULT NULL, level_up TINYINT(1) NOT NULL, desc_unique LONGTEXT DEFAULT NULL, desc_level_one LONGTEXT DEFAULT NULL, desc_level_two LONGTEXT DEFAULT NULL, desc_level_three LONGTEXT DEFAULT NULL, desc_level_four LONGTEXT DEFAULT NULL, desc_level_five LONGTEXT DEFAULT NULL, desc_level_six LONGTEXT DEFAULT NULL, desc_level_seven LONGTEXT DEFAULT NULL, filename VARCHAR(255) DEFAULT NULL, INDEX IDX_8474B937E52ECF74 (memosprite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE path (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, aeon VARCHAR(255) DEFAULT NULL, path_desc LONGTEXT DEFAULT NULL, gameplay_desc LONGTEXT DEFAULT NULL, data_bank_entry LONGTEXT DEFAULT NULL, path_filename VARCHAR(255) DEFAULT NULL, aeon_filename VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, filename VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, elemental_debuff VARCHAR(255) DEFAULT NULL, break_multiplier INT DEFAULT NULL, type_filename VARCHAR(255) DEFAULT NULL, debuff_filename VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, pfp_filename VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE version (id INT AUTO_INCREMENT NOT NULL, patch DOUBLE PRECISION NOT NULL, name VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, filename VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034D96C566B FOREIGN KEY (path_id) REFERENCES path (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034265B2DBF FOREIGN KEY (release_version_id) REFERENCES version (id)');
        $this->addSql('ALTER TABLE character_eidolon ADD CONSTRAINT FK_4E95D3899CCA37C FOREIGN KEY (character_kit_id) REFERENCES character_kit (id)');
        $this->addSql('ALTER TABLE character_kit ADD CONSTRAINT FK_133E438618B21CEB FOREIGN KEY (character_name_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE character_kit_stat ADD CONSTRAINT FK_8580B4D399CCA37C FOREIGN KEY (character_kit_id) REFERENCES character_kit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_kit_stat ADD CONSTRAINT FK_8580B4D39502F0B FOREIGN KEY (stat_id) REFERENCES stat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_media ADD CONSTRAINT FK_94EF466E18B21CEB FOREIGN KEY (character_name_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE character_skill ADD CONSTRAINT FK_A0FE031599CCA37C FOREIGN KEY (character_kit_id) REFERENCES character_kit (id)');
        $this->addSql('ALTER TABLE character_stories ADD CONSTRAINT FK_F52E1D6218B21CEB FOREIGN KEY (character_name_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE character_voiceline ADD CONSTRAINT FK_DAE759C818B21CEB FOREIGN KEY (character_name_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE memosprite ADD CONSTRAINT FK_63A88406B84CACC7 FOREIGN KEY (memomaster_id) REFERENCES character_kit (id)');
        $this->addSql('ALTER TABLE memosprite_skill ADD CONSTRAINT FK_8474B937E52ECF74 FOREIGN KEY (memosprite_id) REFERENCES memosprite (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034D96C566B');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034C54C8C93');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034265B2DBF');
        $this->addSql('ALTER TABLE character_eidolon DROP FOREIGN KEY FK_4E95D3899CCA37C');
        $this->addSql('ALTER TABLE character_kit DROP FOREIGN KEY FK_133E438618B21CEB');
        $this->addSql('ALTER TABLE character_kit_stat DROP FOREIGN KEY FK_8580B4D399CCA37C');
        $this->addSql('ALTER TABLE character_kit_stat DROP FOREIGN KEY FK_8580B4D39502F0B');
        $this->addSql('ALTER TABLE character_media DROP FOREIGN KEY FK_94EF466E18B21CEB');
        $this->addSql('ALTER TABLE character_skill DROP FOREIGN KEY FK_A0FE031599CCA37C');
        $this->addSql('ALTER TABLE character_stories DROP FOREIGN KEY FK_F52E1D6218B21CEB');
        $this->addSql('ALTER TABLE character_voiceline DROP FOREIGN KEY FK_DAE759C818B21CEB');
        $this->addSql('ALTER TABLE memosprite DROP FOREIGN KEY FK_63A88406B84CACC7');
        $this->addSql('ALTER TABLE memosprite_skill DROP FOREIGN KEY FK_8474B937E52ECF74');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE character_eidolon');
        $this->addSql('DROP TABLE character_kit');
        $this->addSql('DROP TABLE character_kit_stat');
        $this->addSql('DROP TABLE character_media');
        $this->addSql('DROP TABLE character_skill');
        $this->addSql('DROP TABLE character_stories');
        $this->addSql('DROP TABLE character_voiceline');
        $this->addSql('DROP TABLE memosprite');
        $this->addSql('DROP TABLE memosprite_skill');
        $this->addSql('DROP TABLE path');
        $this->addSql('DROP TABLE stat');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE version');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
