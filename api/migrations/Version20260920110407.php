<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260920110407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_groupe_option (produit_id INT NOT NULL, groupe_option_id INT NOT NULL, INDEX IDX_1FE65A54F347EFB (produit_id), INDEX IDX_1FE65A54F750CE58 (groupe_option_id), PRIMARY KEY (produit_id, groupe_option_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE produit_groupe_option ADD CONSTRAINT FK_1FE65A54F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_groupe_option ADD CONSTRAINT FK_1FE65A54F750CE58 FOREIGN KEY (groupe_option_id) REFERENCES groupe_option (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit_groupe_option DROP FOREIGN KEY FK_1FE65A54F347EFB');
        $this->addSql('ALTER TABLE produit_groupe_option DROP FOREIGN KEY FK_1FE65A54F750CE58');
        $this->addSql('DROP TABLE produit_groupe_option');
    }
}
