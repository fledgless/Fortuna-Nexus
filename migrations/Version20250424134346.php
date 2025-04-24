<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250424134346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_build (id INT AUTO_INCREMENT NOT NULL, character_name_id INT NOT NULL, UNIQUE INDEX UNIQ_436315B918B21CEB (character_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recommended_ornament_set (id INT AUTO_INCREMENT NOT NULL, character_name_id INT NOT NULL, ornament_set_id INT NOT NULL, comment LONGTEXT DEFAULT NULL, priority INT NOT NULL, INDEX IDX_98075EAB18B21CEB (character_name_id), INDEX IDX_98075EABE917E04A (ornament_set_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recommended_relic_set (id INT AUTO_INCREMENT NOT NULL, character_name_id INT NOT NULL, comment LONGTEXT DEFAULT NULL, priority INT NOT NULL, INDEX IDX_90F1B41818B21CEB (character_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recommended_relic_set_relic_set (recommended_relic_set_id INT NOT NULL, relic_set_id INT NOT NULL, INDEX IDX_277754FE3E679E5E (recommended_relic_set_id), INDEX IDX_277754FE83FCA2C2 (relic_set_id), PRIMARY KEY(recommended_relic_set_id, relic_set_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teammate (id INT AUTO_INCREMENT NOT NULL, character_name_id INT NOT NULL, teammate_id INT NOT NULL, comment LONGTEXT DEFAULT NULL, priority INT NOT NULL, INDEX IDX_C06EEBAE18B21CEB (character_name_id), INDEX IDX_C06EEBAEA227D3E2 (teammate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE character_build ADD CONSTRAINT FK_436315B918B21CEB FOREIGN KEY (character_name_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE recommended_ornament_set ADD CONSTRAINT FK_98075EAB18B21CEB FOREIGN KEY (character_name_id) REFERENCES character_build (id)');
        $this->addSql('ALTER TABLE recommended_ornament_set ADD CONSTRAINT FK_98075EABE917E04A FOREIGN KEY (ornament_set_id) REFERENCES ornament_set (id)');
        $this->addSql('ALTER TABLE recommended_relic_set ADD CONSTRAINT FK_90F1B41818B21CEB FOREIGN KEY (character_name_id) REFERENCES character_build (id)');
        $this->addSql('ALTER TABLE recommended_relic_set_relic_set ADD CONSTRAINT FK_277754FE3E679E5E FOREIGN KEY (recommended_relic_set_id) REFERENCES recommended_relic_set (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recommended_relic_set_relic_set ADD CONSTRAINT FK_277754FE83FCA2C2 FOREIGN KEY (relic_set_id) REFERENCES relic_set (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE teammate ADD CONSTRAINT FK_C06EEBAE18B21CEB FOREIGN KEY (character_name_id) REFERENCES character_build (id)');
        $this->addSql('ALTER TABLE teammate ADD CONSTRAINT FK_C06EEBAEA227D3E2 FOREIGN KEY (teammate_id) REFERENCES `character` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_build DROP FOREIGN KEY FK_436315B918B21CEB');
        $this->addSql('ALTER TABLE recommended_ornament_set DROP FOREIGN KEY FK_98075EAB18B21CEB');
        $this->addSql('ALTER TABLE recommended_ornament_set DROP FOREIGN KEY FK_98075EABE917E04A');
        $this->addSql('ALTER TABLE recommended_relic_set DROP FOREIGN KEY FK_90F1B41818B21CEB');
        $this->addSql('ALTER TABLE recommended_relic_set_relic_set DROP FOREIGN KEY FK_277754FE3E679E5E');
        $this->addSql('ALTER TABLE recommended_relic_set_relic_set DROP FOREIGN KEY FK_277754FE83FCA2C2');
        $this->addSql('ALTER TABLE teammate DROP FOREIGN KEY FK_C06EEBAE18B21CEB');
        $this->addSql('ALTER TABLE teammate DROP FOREIGN KEY FK_C06EEBAEA227D3E2');
        $this->addSql('DROP TABLE character_build');
        $this->addSql('DROP TABLE recommended_ornament_set');
        $this->addSql('DROP TABLE recommended_relic_set');
        $this->addSql('DROP TABLE recommended_relic_set_relic_set');
        $this->addSql('DROP TABLE teammate');
    }
}
