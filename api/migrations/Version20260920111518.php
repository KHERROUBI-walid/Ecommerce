<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260920111518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formule (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, prix NUMERIC(10, 2) NOT NULL, actif TINYINT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE formule_produit (id INT AUTO_INCREMENT NOT NULL, quantite INT NOT NULL, obligatoire TINYINT NOT NULL, formule_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_6B9E01972A68F4D1 (formule_id), INDEX IDX_6B9E0197F347EFB (produit_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE formule_produit ADD CONSTRAINT FK_6B9E01972A68F4D1 FOREIGN KEY (formule_id) REFERENCES formule (id)');
        $this->addSql('ALTER TABLE formule_produit ADD CONSTRAINT FK_6B9E0197F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formule_produit DROP FOREIGN KEY FK_6B9E01972A68F4D1');
        $this->addSql('ALTER TABLE formule_produit DROP FOREIGN KEY FK_6B9E0197F347EFB');
        $this->addSql('DROP TABLE formule');
        $this->addSql('DROP TABLE formule_produit');
    }
}
