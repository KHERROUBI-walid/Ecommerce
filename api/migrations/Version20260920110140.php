<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260920110140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prix_supplement NUMERIC(10, 2) NOT NULL, groupe_option_id INT NOT NULL, INDEX IDX_5A8600B0F750CE58 (groupe_option_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE `option` ADD CONSTRAINT FK_5A8600B0F750CE58 FOREIGN KEY (groupe_option_id) REFERENCES groupe_option (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `option` DROP FOREIGN KEY FK_5A8600B0F750CE58');
        $this->addSql('DROP TABLE `option`');
    }
}
