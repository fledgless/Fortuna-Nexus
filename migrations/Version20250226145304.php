<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250226145304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` ADD eng_voice VARCHAR(255) DEFAULT NULL, ADD jp_voice VARCHAR(255) DEFAULT NULL, ADD cn_voice VARCHAR(255) DEFAULT NULL, ADD kr_voice VARCHAR(255) DEFAULT NULL, ADD description LONGTEXT DEFAULT NULL, ADD faction VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE character_kit DROP technique_name, DROP technique_desc, DROP technique_filename');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP eng_voice, DROP jp_voice, DROP cn_voice, DROP kr_voice, DROP description, DROP faction');
        $this->addSql('ALTER TABLE character_kit ADD technique_name VARCHAR(255) DEFAULT NULL, ADD technique_desc LONGTEXT DEFAULT NULL, ADD technique_filename VARCHAR(255) DEFAULT NULL');
    }
}
